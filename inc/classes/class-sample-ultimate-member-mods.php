<?php
/**
 * Adds modifications that use Ultimate Member plugin hooks.
 *
 * @package sample_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'ultimatemember_plugin_name' ) ) {
	return;
}
/**
 * Class to enqueue the modifications for Ultimate Member plugin.
 *
 * @since 0.1.0
 */
class Sample_Ultimate_Member_Mods {






	/**
	 * Main construct.
	 *
	 * @since 0.1.0
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'template_redirect', array( $this, 'um_restrict_login_page_logged_in' ) );
		add_filter( 'um_registration_for_loggedin_users', array( $this, 'sample_wp_modify_um_registration_for_loggedin_users' ), 10, 2 );
		add_action( 'um_before_register_form_is_loaded', array( $this, 'sample_enqueue_registration_script' ), 10, 1 );

		// When a User's profile is updated.
		// The User's pharmacies are copied to a second usermeta.
		add_action( 'um_user_pre_updating_profile', array( $this, 'sample_wp_um_user_pre_updating_profile' ), 10, 2 );

		// When a User's profile is updated.
		// The User's pharmacies are sent to the Azure DB if they have changed.
		add_action( 'um_after_user_updated', array( $this, 'sample_wp_user_edited_um_profile' ), 10, 3 );

		// When a User's status is set or changed to "approved".
		// The User's pharmacies are sent to the Azure DB.
		add_action( 'um_after_user_is_approved', array( $this, 'sample_wp_um_after_user_is_approved' ), 10, 1 );

		// If a User's status is changed to anything other than "approved".
		// This will delete the User's pharmacies from the Azure DB.
		// It leaves the User's pharmacies (if any) in the WP UserMeta table.
		add_action( 'um_after_user_status_is_changed', array( $this, 'sample_wp_um_after_user_status_is_changed' ), 10, 2 );

		// Deleting a User through Ultimate Member does not trigger a status change.
		// This will make sure the User pharmacies are taken out of the Azure DB.
		add_action( 'um_delete_user', array( $this, 'sample_wp_um_delete_user' ), 10, 1 );

		add_action( 'wp_enqueue_scripts', array( $this, 'sample_wp_functionality_frontend_scripts' ) );
		add_filter( 'um_admin_user_actions_hook', array( $this, 'sample_filter_admin_user_actions' ), 10, 1 );

		// User-query arguments, member directory settings.
		add_filter( 'um_prepare_user_query_args', array( $this, 'sample_custom_um_user_query_args' ), 99, 2 );
	}

	/**
	 * [sample_wp_modify_um_registration_for_loggedin_users description]
	 * Enable registration for logged in users.
	 * Logged in users with access to the registration screen.
	 * will be able to register other users.
	 *
	 * @since 0.1.0
	 *
	 * @param bool  $enable Enable flag.
	 * @param array $args   Args passed into the function by the hook's action.
	 *
	 * @return boolean
	 */
	public function sample_wp_modify_um_registration_for_loggedin_users( $enable, $args ) {
		$enable = true;
		return $enable;
	}

	/**
	 * [sample_wp_functionality_frontend_scripts description]
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function sample_wp_functionality_frontend_scripts() {
		wp_register_style( 'ultimate-member', plugins_url( 'css/ultimate-member.css', __DIR__ ), array(), filemtime( plugin_dir_path( dirname( __DIR__ ) . '/css/ultimate-member.css' ) ) );
		wp_enqueue_style( 'ultimate-member' );
	}

	/**
	 * [sample_enqueue_registration_script]
	 *
	 * @since 0.13.0
	 * @return void
	 */
	public function sample_enqueue_registration_script() {
		wp_enqueue_script( 'turn-autocomplete-off' );
	}

	/**
	 * [um_restrict_login_page_logged_in]
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function um_restrict_login_page_logged_in() {
		if ( um_is_core_page( 'login' ) && is_user_logged_in() ) {
			wp_safe_redirect( um_get_core_page( 'user' ) );
			exit;
		}
	}

	/**
	 * [sample_filter_admin_user_actions]
	 * [sample_wp_functionality_frontend_scripts description]
	 *
	 * @since 1.0.0
	 *
	 * $actions['nothing_special'] =  array( 'label' => __( 'Nothing Special', 'sample-wp-functionality' ) );
	 * unset( $actions['um_deactivate'] );
	 * unset( $actions['um_switch_user'] );
	 *
	 * @param array $actions User actions.
	 * @return array
	 */
	public function sample_filter_admin_user_actions( $actions ) {
		unset( $actions['um_delete'] );
		return $actions;
	}

	/**
	 * This is tiggered by the um_after_user_is_approved hook action.
	 * This sends the User's pharmacies to a url endpoint.
	 *
	 * @since 0.10.7
	 *
	 * @param int $user_id    WP User ID.
	 *
	 * @return void
	 */
	public function sample_wp_um_after_user_is_approved( $user_id ) {
		// Get pharmacy ids.
		$wp_user = get_user_by( 'ID', $user_id );

		$new_user_group_names = $wp_user->get( 'pharmacy_names' );
		$new_user_group_names = stripslashes_deep( $new_user_group_names );

		$new_user_org_group_names = $wp_user->get( 'organization_names' );
		$new_user_org_group_names = stripslashes_deep( $new_user_org_group_names );

		// Translate $new_user_group_names (name strings) into group_ids.
		$new_user_group_pharmacyids     = $this->sample_wp_translate_group_names_to_group_ids( $new_user_group_names );
		$new_user_group_organizationids = $this->sample_wp_translate_group_names_to_group_ids( $new_user_org_group_names );

		// Put $new_user_group_pharmacyids into UserMeta pharmacy_group_ids.
		update_user_meta( $user_id, 'pharmacy_group_ids', $new_user_group_pharmacyids );
		update_user_meta( $user_id, 'organization_group_ids', $new_user_group_organizationids );

		// Delete user from any/all previous groups just in case there were any.
		Groups_User_Group::deleted_user( $user_id );

		// Add ITThinx groups to the user.
		$this->sample_wp_add_groups_to_user( $user_id, $new_user_group_pharmacyids );
		$this->sample_wp_add_groups_to_user( $user_id, $new_user_group_organizationids );

		$new_user_pharmacyids = $this->sample_wp_translate_group_ids_to_sample_pharmacy_ids( $new_user_group_pharmacyids );

		if ( false === $new_user_pharmacyids ) {
			return;
		}

		$action_type = 1;

		// Send pharmacyids to endpoint.
		$user_info_to_send = array(
			'userid'      => $user_id,
			'pharmacyids' => $new_user_pharmacyids,
			'actiontype'  => $action_type,
		);
		$user_info_to_send = wp_json_encode( $user_info_to_send );

		if ( ! empty( $user_info_to_send ) ) {
			$response = $this->sample_wp_send_profile_info( $user_info_to_send );
		}
	}

	/**
	 * Add ITThinx groups to a user.
	 *
	 * @since 0.10.7
	 *
	 * @param int   $user_id                    WP User ID.
	 * @param array $new_user_group_pharmacyids ITThinx group ids.
	 *
	 * @return void
	 */
	private function sample_wp_add_groups_to_user( $user_id, $new_user_group_pharmacyids ) {
		if ( empty( $new_user_group_pharmacyids ) || ! is_array( $new_user_group_pharmacyids ) ) {
			return;
		}

		foreach ( $new_user_group_pharmacyids as $group_pharmacyid ) {
			Groups_User_Group::create(
				array(
					'user_id'  => $user_id,
					'group_id' => $group_pharmacyid,
				)
			);
		}
	}

	/**
	 * Remove ITThinx groups from a user.
	 *
	 * @since 0.10.7
	 *
	 * @param int   $user_id                    WP User ID.
	 * @param array $new_user_group_pharmacyids ITThinx group ids.
	 *
	 * @return void
	 */
	private function sample_wp_delete_groups_of_user( $user_id, $new_user_group_pharmacyids ) {
		if ( empty( $new_user_group_pharmacyids ) || ! is_array( $new_user_group_pharmacyids ) ) {
			return;
		}

		foreach ( $new_user_group_pharmacyids as $group_pharmacyid ) {
			Groups_User_Group::delete( $user_id, $group_pharmacyid );
		}
	}

	/**
	 * Translates Group Names to Group ids.
	 *
	 * @since 0.10.7
	 *
	 * @param array $group_names    The names of the Groups by ITThinx.
	 *
	 * @return array|false
	 */
	private function sample_wp_translate_group_names_to_group_ids( $group_names ) {
		if ( ! method_exists( 'Groups_Group', 'read_by_name' ) ) {
			return false;
		}

		if ( ! is_array( $group_names ) ) {
			return false;
		}

		$pharmacy_group_ids = array();

		foreach ( $group_names as $group_name ) {
			$pharmacy_group = Groups_Group::read_by_name( $group_name );

			if ( false !== $pharmacy_group ) {
				$pharmacy_group_ids[] = $pharmacy_group->group_id;
			}
		}

		return $pharmacy_group_ids;
	}

	/**
	 * This is tiggered by the um_delete_user hook action.
	 * This sends the User's pharmacies to a url endpoint.
	 * The action type is set to have the endpoint remove the pharmacies.
	 * from the Azure DB.
	 *
	 * @since 0.10.7
	 *
	 * @param int   $user_id                WP User ID.
	 * @param array $specific_pharmacy_ids  The specific ids to delete.
	 *
	 * @return void
	 */
	public function sample_wp_um_delete_user( $user_id, $specific_pharmacy_ids = null ) {
		// Get pharmacy ids.
		$wp_user = get_user_by( 'ID', $user_id );

		if ( null === $specific_pharmacy_ids ) {
			$deleted_user_group_pharmacyids = $wp_user->get( 'pharmacy_group_ids' );
		} else {
			$deleted_user_group_pharmacyids = $specific_pharmacy_ids;
		}

		if ( null === $specific_pharmacy_ids ) {
			// Remove the User from the ITThinx groups.
			$this->sample_wp_delete_groups_of_user( $user_id, $deleted_user_group_pharmacyids );
		}

		$deleted_user_pharmacyids = $this->sample_wp_translate_group_ids_to_sample_pharmacy_ids( $deleted_user_group_pharmacyids );

		if ( false === $deleted_user_pharmacyids ) {
			return;
		}

		// Set action_type to "UnSet".
		$action_type = 2;

		// Send pharmacyids to endpoint.
		$user_info_to_send = array(
			'userid'      => $user_id,
			'pharmacyids' => $deleted_user_pharmacyids,
			'actiontype'  => $action_type,
		);
		$user_info_to_send = wp_json_encode( $user_info_to_send );

		if ( ! empty( $user_info_to_send ) ) {
			$response = $this->sample_wp_send_profile_info( $user_info_to_send );
		}
	}

	/**
	 * This is tiggered by the um_after_user_status_is_changed hook action.
	 * This sends the User's pharmacies to a url endpoint.
	 * The action type is set to have the endpoint remove the pharmacies.
	 * from the Azure DB.
	 *
	 * @since 0.10.7
	 *
	 * @param string $status     The UM User status.
	 * @param int    $user_id    WP User ID.
	 *
	 * @return void
	 */
	public function sample_wp_um_after_user_status_is_changed( $status, $user_id ) {
		if ( 'approved' !== $status ) {
			// Delete from all pharmacy groups and update Azure DB.
			$this->sample_wp_um_delete_user( $user_id );

			// Delete user from any/all previous groups just in case there were any.
			Groups_User_Group::deleted_user( $user_id );
		}
	}

	/**
	 * Saves the User's current pharmacy access to a second usermeta field.
	 *
	 * @since 0.10.7
	 *
	 * @param array $to_update  The fields to upate in the UM profile.
	 * @param int   $user_id    The WP User ID.
	 *
	 * @return void
	 */
	public function sample_wp_um_user_pre_updating_profile( $to_update, $user_id ) {
		$wp_user = get_user_by( 'ID', $user_id );

		$old_user_pharmacyids     = $wp_user->get( 'pharmacy_group_ids' );
		$old_user_organizationids = $wp_user->get( 'organization_group_ids' );

		update_user_meta( $user_id, 'prev_pharmacy_group_ids', $old_user_pharmacyids );
		update_user_meta( $user_id, 'prev_organization_group_ids', $old_user_organizationids );

		$this->sample_wp_delete_groups_of_user( $user_id, $old_user_pharmacyids );
		$this->sample_wp_delete_groups_of_user( $user_id, $old_user_organizationids );

		// Convert strings ( $to_update['pharmacy_names'] ) to pharmacy group_ids.
		// Translate $new_user_group_names (name strings) into group_ids.
		$new_user_group_names       = stripslashes_deep( $to_update['pharmacy_names'] );
		$new_user_group_pharmacyids = $this->sample_wp_translate_group_names_to_group_ids( $new_user_group_names );

		$new_user_org_group_names       = stripslashes_deep( $to_update['organization_names'] );
		$new_user_group_organizationids = $this->sample_wp_translate_group_names_to_group_ids( $new_user_org_group_names );

		// Put $new_user_group_pharmacyids into UserMeta pharmacy_group_ids.
		// Set new "pharmacy_group_ids" based on converted strings.
		update_user_meta( $user_id, 'pharmacy_group_ids', $new_user_group_pharmacyids );
		update_user_meta( $user_id, 'organization_group_ids', $new_user_group_organizationids );

		$this->sample_wp_add_groups_to_user( $user_id, $new_user_group_pharmacyids );
		$this->sample_wp_add_groups_to_user( $user_id, $new_user_group_organizationids );
	}

	/**
	 * Sends the pharmacy ids if necessary.
	 *
	 * @since 0.10.7
	 *
	 * @param int   $user_id    The WP User ID.
	 * @param array $args       Arguments passed in by the hook.
	 * @param array $userinfo   The fields to upate in the UM profile.
	 *
	 * @return void
	 */
	public function sample_member_updated_um_profile( $user_id, $args, $userinfo ) {
		$user_info['function'] = __FUNCTION__;
		$user_info['file']     = basename( __FILE__ );
		$user_info['user_id']  = $user_id;
		$username              = get_userdata( $user_id )->user_login;
		$user_info['args']     = $args;
		$user_info['userinfo'] = $userinfo;
		set_transient( 'just_updated_user_profile_' . $username, $user_info, MONTH_IN_SECONDS );
	}

	/**
	 * Sends the pharmacy ids if necessary.
	 *
	 * @since 0.10.7
	 *
	 * @param int   $user_id    The WP User ID.
	 * @param array $args       Arguments passed in by the hook.
	 * @param array $userinfo   The fields to upate in the UM profile.
	 *
	 * @return void
	 */
	public function sample_wp_user_edited_um_profile( $user_id, $args, $userinfo ) {
		$current_wp_user = get_user_by( 'ID', $user_id );

		// If the UM User was removed from all Orgs then remove UM User from all groups.
		$group_organizationids = $current_wp_user->get( 'organization_group_ids' );
		if ( empty( $group_organizationids ) ) {
			// Remove from pharmacy groups and update Azure DB.
			$this->sample_wp_um_delete_user( $user_id );

			// Delete user from any/all previous groups just in case there were any.
			Groups_User_Group::deleted_user( $user_id );

			update_user_meta( $user_id, 'pharmacy_names', array() );

			return;
		}

		$old_user_pharmacyids = $current_wp_user->get( 'prev_pharmacy_group_ids' );

		// This sets the action_type to "Set".
		$action_type = 1;

		// $userinfo['pharmacy_names'] will be an array of "My Pharmacy Names".
		// These "pharmacy_names" are translated in the pre profile edit action and.
		// the User's meta data "pharmacy_group_ids" is set with those values.
		$group_pharmacyids = $current_wp_user->get( 'pharmacy_group_ids' );

		// If no change has occurred, the arrays are the same.
		// There is no need to send the data.
		// Find the values that the two arrays do not share.
		$intersect         = array_intersect( $old_user_pharmacyids, $group_pharmacyids );
		$values_not_common = array_merge( array_diff( $old_user_pharmacyids, $intersect ), array_diff( $group_pharmacyids, $intersect ) );

		// If they have all values in common than nothing needs to be done.
		if ( count( $values_not_common ) <= 0 ) {
			return;
		}

		// If the new pharmacy ids set is empty.
		// then all pharmacy access has been removed.
		if ( isset( $group_pharmacyids ) ) {
			if ( count( $old_user_pharmacyids ) > 0 && count( $group_pharmacyids ) === 0 ) {
				// Delete the old pharmacies from the Azure DB.
				$this->sample_wp_um_delete_user( $user_id, $old_user_pharmacyids );
				return;
			}
		}

		// Delete the old pharmacies from the Azure DB.
		$this->sample_wp_um_delete_user( $user_id, $old_user_pharmacyids );

		$rxsample_pharmacyids = $this->sample_wp_translate_group_ids_to_sample_pharmacy_ids( $group_pharmacyids );

		if ( false === $rxsample_pharmacyids ) {
			return;
		}

		// Add the new pharmacies to the Azure DB.
		$user_info_to_send = array(
			'userid'      => $user_id,
			'pharmacyids' => $rxsample_pharmacyids,
			'actiontype'  => $action_type,
		);
		$user_info_to_send = wp_json_encode( $user_info_to_send );

		if ( ! empty( $user_info_to_send ) ) {
			$response = $this->sample_wp_send_profile_info( $user_info_to_send );
		}
	}

	/**
	 * Tranlates the Group ids to RxSample Pharmacy Ids.
	 *
	 * @since 0.10.7
	 *
	 * @param array $group_ids   Pharmacy group ids to translate.
	 *
	 * @return array
	 */
	private function sample_wp_translate_group_ids_to_sample_pharmacy_ids( $group_ids ) {
		$rxsample_pharmacy_ids = array();

		if ( ! is_array( $group_ids ) ) {
			return false;
		}

		// RxSample Pharmacy ids are in the rxsample_pharmacy post meta data.
		// Stored as "_rxsample_pharmacy_itthinx_id".
		$query_args = array(
			'post_type'  => 'rxsample_pharmacy',
			'fields'     => 'ids',
			// Setup the "meta query".
            // phpcs:ignore
            'meta_query' => array(
				array(
					'key'     => '_rxsample_pharmacy_itthinx_id',
					'value'   => $group_ids,
					// Set the compare operator.
					'compare' => 'IN',
				),
			),
		);

		$ids_of_posts_w_desired_itthinx_ids = get_posts( $query_args );

		foreach ( $ids_of_posts_w_desired_itthinx_ids as $id_of_posts_w_desired_itthinx_id ) {
			// Get Post Meta _rxsample_pharmacy_id.
			$rxsample_pharmacy_id = get_post_meta( $id_of_posts_w_desired_itthinx_id, '_rxsample_pharmacy_id', true );

			if ( ! empty( $rxsample_pharmacy_id ) ) {
				$rxsample_pharmacy_ids[] = $rxsample_pharmacy_id;
			}
		}

		return $rxsample_pharmacy_ids;
	}

	/**
	 * This composes the info to send to a url endpoint.
	 *
	 * @since 0.10.7
	 *
	 * @param string $user_info_to_send  The data that is sent to the url.
	 *
	 * @return string|false
	 */
	private function sample_wp_send_profile_info( $user_info_to_send ) {
		$url          = defined( 'Sample_AZURE_PHARMACY_ASSIGNMENT_URL' ) ? Sample_AZURE_PHARMACY_ASSIGNMENT_URL : ''; // 'https://wordpressazurefunctions-dev2.azurewebsites.net/api/AddUpdateUserPharmacyAssignment?code=dnu3p/CQEACW55bNuOYhMt9q8oaVW/mJay/HagazfueBfnvygiU8ug==';
		$request_type = 'POST';
		$header       = array(
			'Content-Type' => 'application/json',
		);

		$response = $this->do_remote_request_calls( $url, $request_type, $user_info_to_send, $header );

		return $response;
	}

	/**
	 * This does the call to the Url endpoint.
	 *
	 * @since 0.10.7
	 *
	 * @param string       $url            Where to send the cUrl request.
	 * @param string       $request_type   GET or POST.
	 * @param array|string $data           Payload to send with request.
	 * @param array        $header         The headers for the request.
	 *
	 * @return string|false
	 */
	private function do_remote_request_calls( $url, $request_type, $data = null, $header = null ) {
		$wp_args = array(
			'method'      => $request_type,
			'timeout'     => 10,
			'redirection' => 10,
			'httpversion' => '1.1',
			'headers'     => $header,
			'body'        => $data,
		);

		$response = wp_remote_request( $url, $wp_args );

		// Check for success.
		if ( ! is_wp_error( $response ) && ( 200 === $response['response']['code'] || 201 === $response['response']['code'] ) ) {
			return $response['body'];
		} else {
			return false;
		}
	}

	/**
	 * A filter function for the Organizations and Members page
	 * for each user type to only show users associated with their
	 * Organization/Pharmacy.
	 *
	 * @since 0.12.0
	 *
	 * @param array $user_query_args    Args for the User Query.
	 * @param array $dir_settings_args  UM Settings for the member directory.
	 *
	 * @return array
	 */
	public function sample_custom_um_user_query_args( $user_query_args, $dir_settings_args ) {
		$current_wp_user = wp_get_current_user();

		if ( current_user_can( 'administrator' ) || in_array( 'um_sample-super-admin', (array) $current_wp_user->roles, true ) ) {
			$user_query_args['include'] = array();
			return $user_query_args;
		}

		$users_group_names = $current_wp_user->get( 'organization_names' );

		if ( in_array( array( 'pharmacy_tech', 'pharmacy_manager' ), (array) $current_wp_user->roles, true ) ) {
			$users_group_names = $current_wp_user->get( 'pharmacy_names' );
		}

		if ( empty( $users_group_names ) || ! is_array( $users_group_names ) ) {
			$user_query_args['include'] = 'No Users';
			return $user_query_args;
		}

		$users_in_groups = array();
		foreach ( $users_group_names as $users_group_name ) {
			$group = Groups_Group::read_by_name( $users_group_name );
			if ( empty( $group ) ) {
				continue;
			}

			$group_obj = new Groups_Group( $group->group_id );
			$users     = $group_obj->__get( 'users' );

			if ( count( $users ) > 0 ) {
				foreach ( $users as $group_user ) {
					$users_in_groups[] = $group_user->user->ID;
				}
			}
		}

		if ( empty( $users_in_groups ) ) {
			$users_in_groups = 'No Users';
		}

		$user_query_args['include'] = $users_in_groups;

		return $user_query_args;
	}
}
new Sample_Ultimate_Member_Mods();
