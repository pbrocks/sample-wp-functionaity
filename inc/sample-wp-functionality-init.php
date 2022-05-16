<?php
/**
 * Initialize redirection functionality on activation.
 *
 * @since 0.1.0
 * @package sample_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( "You can't do anything by accessing this file directly." );
}

// phpcs:ignoreFile
// 

add_action( 'update_pharmacy_data', 'pharmacy_updates_hourly' );
/**
 * Update Pharmacy Picker data hourly.
 * 
 * @return [type] [description]
 */
function pharmacy_updates_hourly() {
	$dynamics_token = get_dynamics_access_token();
	$updated_pharmacies = get_updated_pharmacy_data_from_dynamics( $dynamics_token );
	$pharmacy_json = prepare_cleaned_accounts_json( $updated_pharmacies );
	return $pharmacy_json;
}

/**
 * [get_dynamics_access_token]
 *
 * Get a token in order to request updated Pharmacy info.
 *
 * @return void
 */
function get_dynamics_access_token() {
	$curl = curl_init();
	$login_array = array(
		'client_id' => '037560d4-1c01-4100-baf7-1cafaca665e1',
		'client_secret' => 'qQbA7MAfgoNwIVD0BHQA6t32rlouNqreIfOJ+wuyilI=',
		'grant_type' => 'password',
		'username' => 'apiconnection@rxaap.com',
		'password' => 'tWhPkFxWb8C8xNx2',
		'resource' => 'https://rxaapdev.crm.dynamics.com',
	);
	$authurl = 'https://login.microsoftonline.com/34d5597d-bfc0-4189-9351-f96dce7c7665/oauth2/token';

	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => $authurl,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $login_array,
			CURLOPT_HTTPHEADER => array(
				'Cookie: fpc=AvOea24rkKFGpTdeFARLfR3hhzBTAQAAAAiVhNkOAAAA; stsservicecookie=estsfd; x-ms-gateway-slice=estsfd',
			),
		)
	);

	$response = curl_exec( $curl );
	curl_close( $curl );
	$decoded = json_decode( $response );
	set_transient( 'connection_jwt_access', $decoded->access_token, 3600 );
	write_to_error_log( 'On Line ' . __LINE__ . ' of ' . __FUNCTION__ . ' => ' . $decoded->access_token );
	return $decoded->access_token;
}

/**
 * [get_updated_pharmacy_data_from_dynamics]
 *
 * @param string $authorization_token
 * @return void
 */
function get_updated_pharmacy_data_from_dynamics( $authorization_token ) {
	$curl = curl_init();

	if ( empty( $authorization_token ) ) {
		$authorization_token = get_transient( 'connection_jwt_access' );
	}

	$api_url = 'https://rxaapdev.crm.dynamics.com/api/data/v9.1/accounts?$select=accountid,new_api_account,new_pmid,name,new_corporatename,emailaddress1,new_generalemail2,address1_line1,address1_city,address1_stateorprovince,statecode&$filter=statecode%20eq%201';
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => $api_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				"Authorization: Bearer $authorization_token",
				'Cookie: ARRAffinity=93a117821ee7ca52c54fbc45d5388ec585622ae6dfe550676a6c8ffd85037da8; ReqClientId=88ea70fb-dd21-4426-b0c2-c337cb832475; orgId=0a63888f-3213-4879-99de-4410c10cb216',
			),
		)
	);

	$response = curl_exec( $curl );
	curl_close( $curl );

	if ( $response ) {
		$data = json_decode( $response );
		$dynamics_data = $data->value;
	}

	if ( isset( $data ) ) {
		set_transient( 'dynamics_updated_accounts', $dynamics_data, WEEK_IN_SECONDS );
	}
}

/**
 * [prepare_cleaned_accounts_json]
 *
 * @return void
 */
function prepare_cleaned_accounts_json( $current_accounts ) {
	if ( empty( $current_accounts ) ) {
		$current_accounts = get_transient( 'dynamics_updated_accounts' );
	}
	foreach ( $current_accounts as $index => $object ) {
		$new_array[ $index ]['searchable'] = '';
		foreach ( $object as $key => $value ) {
			$avoid = array( '@odata.etag', 'new_corporatename', 'new_generalemail2', 'new_apipurchasesdaterange', 'statecode' );
			if ( in_array( $key, $avoid ) ) {
				continue;
			}
			if ( 'new_pmid' === $key ) {
				$new_array[ $index ]['pmid'] = trim( $value );
				$new_array[ $index ]['searchable'] .= trim( $value ) . ' | ';
			} elseif ( 'name' === $key ) {
				$new_array[ $index ]['pharmacy_name'] = trim( $value );
				$new_array[ $index ]['searchable'] .= trim( $value ) . ' | ';
			} elseif ( 'address1_line1' === $key ) {
				$new_array[ $index ]['street_address'] = trim( $value );
				$new_array[ $index ]['searchable'] .= trim( $value ) . ' | ';
			} elseif ( 'address1_city' === $key ) {
				$new_array[ $index ]['city_name'] = trim( $value );
				$new_array[ $index ]['searchable'] .= trim( $value ) . ' | ';
			} elseif ( 'address1_stateorprovince' === $key ) {
				$new_array[ $index ]['state_name'] = trim( $value );
				$new_array[ $index ]['searchable'] .= trim( $value );
			} elseif ( 'emailaddress1' === $key ) {
				$new_array[ $index ]['email'] = strtolower( trim( $value ) );
				$new_array[ $index ]['searchable'] .= trim( $value ) . ' | ';
			} else {
				$new_array[ $index ][ $key ] = $value;
			}
		}
	}
	set_transient( 'dynamics_cleaned_accounts', json_encode( $new_array ), WEEK_IN_SECONDS );
	return json_encode( $new_array );
}

add_filter( 'custom_menu_order', '__return_true' );
add_filter( 'menu_order', 'sample_dashboard_menus_custom_order' );
/**
 * [sample_dashboard_menus_custom_order] Create custom order of admin menus.
 *
 * @return array
 */
function sample_dashboard_menus_custom_order() {
	return array(
		'index.php',
		'wpengine-common',
		'wpa0',
		'edit.php?post_type=page',
		'edit.php',
		'ef-settings',
		'ultimatemember',
		'gf_edit_forms',
		'metaslider',
		'mapsvg-config',
		'mo_api_authentication_settings',
	);
}

add_action( 'admin_enqueue_scripts', 'admin_scripts_needed' );
/**
 * [admin_scripts_needed]
 *
 * @return void
 */
function admin_scripts_needed() {
	wp_register_style( 'mapsvg-config', plugins_url( 'css/mapsvg-config.css', __FILE__ ), array(), filemtime( plugin_dir_path( __FILE__ ) . 'css/mapsvg-config.css' ) );
	if ( 'toplevel_page_mapsvg-config' === get_current_screen()->base ) {
		wp_enqueue_style( 'mapsvg-config' );
	}
}

/**
 * [sample_get_active_organizations]
 *
 * pbrocks move
 *
 * @return array Orgs from Groups.
 */
function sample_get_active_organizations() {
	$current_user = wp_get_current_user();
	// print_r($current_user);
	if ( current_user_can( 'administrator' ) || current_user_can( 'um_sample-super-admin' ) ) {
		$orgs_groups = get_transient( 'all_active_orgs' );
		if ( ! $orgs_groups ) {
			$org_parent = Groups_Group::read_by_name( 'Organizations' );
			$groups     = Groups_Group::get_groups(
				array(
					'order_by' => 'name',
					'order'    => 'ASC',
				)
			);
			foreach ( $groups as $key => $group ) {
				if ( null !== $group->parent_id && $org_parent->group_id === $group->parent_id ) {
					// $orgs_groups[ $group->group_id ] = stripslashes( $group->name );
					$orgs_groups[ $group->name ] = stripslashes( $group->name );
				}
			}
			ksort( $orgs_groups );
			set_transient( 'all_active_orgs', $orgs_groups, DAY_IN_SECONDS );
		}
		return $orgs_groups;
	} else {
		$user_id         = get_current_user_id();
		$groups_user_obj = new Groups_User( $user_id );
		$org_parent      = Groups_Group::read_by_name( 'Organizations' );

		$orgs_pharms = $groups_user_obj->groups;
		if ( ! empty( $orgs_pharms ) ) {
			foreach ( $orgs_pharms as $key => $group ) {
				if ( null !== $group->parent_id && $org_parent->group_id === $group->parent_id ) {
					// $group_return[ $group->group_id ] = stripslashes( $group->name );
					$group_return[ $group->name ] = stripslashes( $group->name );
				}
			}
			return $group_return;
		} else {
			$group_return[] = 'You do not belong to an organization';
		}
	}
	return $group_return;
}

/**
 * [sample_get_active_pharmacies]
 *
 * pbrocks move
 *
 * @return array Pharms from Groups.
 */
function sample_get_active_pharmacies() {
	$current_user = wp_get_current_user();
	if ( current_user_can( 'administrator' ) || current_user_can( 'um_sample-super-admin' ) ) {
		$pharms_groups = get_transient( 'all_active_pharms' );

		if ( ! $pharms_groups ) {
			$pharm_parent = Groups_Group::read_by_name( 'Organizations' );
			$groups       = Groups_Group::get_groups(
				array(
					'order_by' => 'name',
					'order'    => 'ASC',
				)
			);
			foreach ( $groups as $key => $group ) {
				if ( null !== $group->parent_id && $pharm_parent->group_id !== $group->parent_id ) {
					$pharms_groups[ $group->name ] = stripslashes( $group->name );
				}
			}

			ksort( $pharms_groups );
			set_transient( 'all_active_pharms', $pharms_groups, DAY_IN_SECONDS );
		}
		return $pharms_groups;
	} else {
		//$user_id = um_profile_id();
		$user_id = $current_user->ID;
		
		$groups_user_obj = new Groups_User( $user_id );
		$org_parent      = Groups_Group::read_by_name( 'Organizations' );

		$orgs_pharms = $groups_user_obj->groups;
		if ( ! empty( $orgs_pharms ) ) {
			foreach ( $orgs_pharms as $key => $group ) {
				if ( ! empty( $group->parent_id ) && $org_parent->group_id !== $group->parent_id ) {
					// $pharm_return[ $group->group_id ] = stripslashes( $group->name );
					$pharms_groups[ $group->name ] = stripslashes( $group->name );
				}
			}
			// We only get here if the Org_Owner, for example does not have
			// any pharmacies explicitly in "pharmacy_names"
			// Now we can make use of the organization call back function
			// to return the organizations for which we should get the pharmacies
			$user_orgs = sample_get_active_organizations();
			$user_pharmacies = array();
			foreach( $user_orgs as $organization ) {
			    $my_org_group = Groups_Group::read_by_name( $organization );
			    $my_org_group_id = $my_org_group->group_id;
			    $this_org_pharmacies = Groups_Group::get_groups( array( 'parent_id' => $my_org_group_id ) );
			    $user_pharmacies = array_merge( $user_pharmacies, $this_org_pharmacies );
			}
			foreach( $user_pharmacies as $group ) {
				$pharms_groups[ $group->name ] = stripslashes( $group->name );
			}

		} else {
			$pharms_groups[] = 'You do not belong to a pharmacy';
		}
	}
	return $pharms_groups;
}

/**
 * [sample_get_active_user_roles]
 *
 * pbrocks move
 *
 * @return array Roles array.
 */
function sample_get_active_user_roles() {
	$wp_roles      = wp_roles();
	$wp_role_names = $wp_roles->role_names;
	unset( $wp_role_names['um_pharmacy-azure-integration'] );
	unset( $wp_role_names['um_registered'] );
	unset( $wp_role_names['um_marketing-manager'] );
	unset( $wp_role_names['um_marketing-editor'] );
	unset( $wp_role_names['um_territory-manager'] );
	unset( $wp_role_names['um_sample-employee'] );
	switch ( true ) {
		case current_user_can( 'um_org-owner' ):
			unset( $wp_role_names['um_sample-super-admin'] );
			unset( $wp_role_names['um_sample-super-admin'] );
			unset( $wp_role_names['um_marketing-manager'] );
			break;
		case current_user_can( 'um_org-admin' ):
			unset( $wp_role_names['administrator'] );
			unset( $wp_role_names['um_sample-super-admin'] );
			unset( $wp_role_names['um_marketing-manager'] );
			break;
		case current_user_can( 'um_pharmacy-manager' ):
			unset( $wp_role_names['administrator'] );
			unset( $wp_role_names['um_sample-super-admin'] );
			unset( $wp_role_names['um_org-owner'] );
			unset( $wp_role_names['um_org-admin'] );
			unset( $wp_role_names['um_marketing-manager'] );
			break;
		case current_user_can( 'um_pharmacy-tech' ):
			unset( $wp_role_names['administrator'] );
			unset( $wp_role_names['um_sample-super-admin'] );
			unset( $wp_role_names['um_org-owner'] );
			unset( $wp_role_names['um_org-admin'] );
			unset( $wp_role_names['um_pharmacy-manager'] );
			break;
	}

	return $wp_role_names;
}

if ( ! function_exists( 'write_to_error_log' ) ) {
	function write_to_error_log( $log ) {
		if ( is_array( $log ) || is_object( $log ) ) {
			error_log( print_r( $log, true ) );
		} else {
			error_log( $log );
		}
	}
}
