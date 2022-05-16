<?php
/**
 * Build Diagnostics Admin Menu.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignoreFile.

add_shortcode( 'sample-pharmacy-search', 'sample_pharmacy_search', 11 );
/**
 * Add a page to the notes menu.
 *
 * @since 1.0.0
 *
 * @return string
 */
function sample_pharmacy_search() {
	wp_enqueue_script( 'sample-autocomplete-instance' );
	wp_enqueue_script( 'sample-ms-default-powerbi-client' );
	wp_enqueue_script( 'sample-embedded-power-bi-reports' );
	wp_enqueue_style( 'sample-embedded-power-bi-reports' );

	$shortcode_content = sample_search_input_fields();

	return $shortcode_content;
}
/**
 * [sample_search_input_fields description]
 *
 * @return [type] [description]
 */
function sample_search_input_fields() {
	$authentication_token = generate_authentication_token();
	$input_fields         = '
	<div id="pharmacy-picker">
		<div class="input-fields">
			<div class="title-field">
				<input type="text" size="115" id="search-target" placeholder="Select a pharmacy by name or PMID" />
				<button id="show-search-selection">Get PMID</button>
				<button id="sample-clear-search" onclick="clearSearchInput()">X</button>
			</div>
			<div id="results-fields">
				<div class="input-field">
					<label>Account ID: </label>
					<input type="text" disabled id="accountid"/>
				</div>
				<div class="input-field">
					<label>Company: </label>
					<input type="text" disabled id="pharmacy_name"/>
				</div>
				<div class="input-field">
					<label>Email: </label>
					<input type="text" disabled id="email"/>
				</div>
				<div class="input-field">
					<label>Street: </label>
					<input type="text" disabled id="street_address"/>
				</div>
				<div class="input-field">
					<label>City: </label>
					<input type="text" disabled id="city_name"/>
				</div>
				<div class="input-field">
					<label>State: </label>
					<input type="text" disabled id="state_name"/>
				</div>
				<div class="input-field">
					<label>PMID: </label>
					<input type="text" value="sample" disabled id="pmid"/>
				</div>
				<div class="input-field">
					<label>API Account: </label>
					<input type="text" disabled id="new_api_account"/>
				</div>
			</div>
		</div>
	</div>';
	return $input_fields;
}

add_action( 'admin_enqueue_scripts', 'pharmacy_search_scripts' );
add_action( 'wp_enqueue_scripts', 'pharmacy_search_scripts' );
/**
 * [pharmacy_search_scripts]
 *
 * @return void
 */
function pharmacy_search_scripts() {
	$data_input = get_transient( 'dynamics_cleaned_accounts' );

	wp_enqueue_style( 'sample-autocomplete-vanilla', plugins_url( 'css/autocomplete.css', __FILE__ ), array(), '1.12' );
	wp_register_script( 'sample-autocomplete-vanilla', plugins_url( 'js/sample-autocomplete-vanilla.js', __FILE__ ), array(), '1.12', false );
	wp_register_script( 'sample-autocomplete-instance', plugins_url( 'js/sample-autocomplete-instance.js', __FILE__ ), array( 'sample-autocomplete-vanilla' ), '1.2.1', true );
	wp_localize_script(
		'sample-autocomplete-instance',
		'pharmacy_picker_object',
		array(
			'pharmacy_picker_ajaxurl' => admin_url( 'admin-ajax.php' ),
			'data_array'              => json_decode( $data_input ),
			'report_response'         => get_transient( 'powerbi_auth_token' ),
			'report_id'               => '8be350e2-292d-484d-aa4b-1fd6acdd8bf5',
			'embed_url'               => 'https://app.powerbi.com/rdlEmbed?reportId=8be350e2-292d-484d-aa4b-1fd6acdd8bf5&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly9XQUJJLVVTLU5PUlRILUNFTlRSQUwtQi1yZWRpcmVjdC5hbmFseXNpcy53aW5kb3dzLm5ldCIsImVtYmVkRmVhdHVyZXMiOnsibW9kZXJuRW1iZWQiOnRydWUsImFuZ3VsYXJPbmx5UmVwb3J0RW1iZWQiOnRydWUsImNlcnRpZmllZFRlbGVtZXRyeUVtYmVkIjp0cnVlLCJ1c2FnZU1ldHJpY3NWTmV4dCI6dHJ1ZSwic2tpcFpvbmVQYXRjaCI6dHJ1ZX19',
		)
	);
}
/**
 * [pharmacy_search_results]
 *
 * @return void
 */
function pharmacy_search_results() {
	$authorization_token = generate_authentication_token();

	$header = array(
		'Authorization' => 'Bearer ' . $authorization_token,
		'Content-Type'  => 'application/json',
	);

	$group_id  = '6108d304-eae1-4080-ad3b-a3dc694e32a2';
	$report_id = '8be350e2-292d-484d-aa4b-1fd6acdd8bf5';

	$url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $group_id . '/reports/' . $report_id . '/generatetoken';

	$pmid = 100018;

	$request_type = 'POST';

	$data = '{
		"accessLevel":"View",
		"identities": [{
			"username": "' . $pmid . '",
			"reports": [
				"' . $report_id . '"
			]
		}] 
	}';

	$wp_args = array(
		'method'      => $request_type,
		'timeout'     => 0,
		'redirection' => 10,
		'httpversion' => '1.1',
		'headers'     => $header,
		'body'        => $data,
	);

	$response = wp_remote_request( $url, $wp_args );

	$result = json_decode( wp_remote_retrieve_body( $response ) );

	return $result;
}

function generate_authentication_token() {
	$url = '';
	if ( defined( 'Sample_EMBEDDED_POWERBI_TENANT_ID' ) ) {
		$url = 'https://login.microsoftonline.com/' . Sample_EMBEDDED_POWERBI_TENANT_ID . '/oauth2/token';
	}

	$request_type = 'POST';

	$client_id = '';
	if ( defined( 'Sample_EMBEDDED_POWERBI_CLIENT_ID' ) ) {
		$client_id = Sample_EMBEDDED_POWERBI_CLIENT_ID;
	}

	$client_secret = '';
	if ( defined( 'Sample_EMBEDDED_POWERBI_CLIENT_SECRET' ) ) {
		$client_secret = Sample_EMBEDDED_POWERBI_CLIENT_SECRET;
	}

	$data = array(
		'client_id'     => $client_id,
		'client_secret' => $client_secret,
		'resource'      => 'https://analysis.windows.net/powerbi/api',
		'grant_type'    => 'client_credentials',
	);

	$header = array(
		'Cookie: fpc=Al0nUhaWbxNOqoFdAhBkvat8Pz5GAQAAADh9xNgOAAAA; stsservicecookie=estsfd; x-ms-gateway-slice=estsfd',
	);

	$wp_args = array(
		'method'      => $request_type,
		'timeout'     => 0,
		'redirection' => 10,
		'httpversion' => '1.1',
		'headers'     => $header,
		'body'        => $data,
	);

	$response = wp_remote_request( $url, $wp_args );

	$result = json_decode( wp_remote_retrieve_body( $response ) );

	if ( ! empty( $result->access_token ) ) {
		write_to_error_log( '<p>Access token set on line ' . __LINE__ . '</p>' . $result->access_token );
		set_transient( 'generated_authentication_token', $result->access_token, DAY_IN_SECONDS );
		return $result->access_token;
	} else {
		return 'problem';
		return false;
	}
}

function second_generate_groups( $authorization_token ) {
	$url = 'https://api.powerbi.com/v1.0/myorg/groups';

	$request_type = 'GET';

	$data = array();

	$header = array(
		'Authorization' => 'Bearer ' . $authorization_token,
	);

	$wp_args = array(
		'method'      => $request_type,
		'timeout'     => 0,
		'redirection' => 10,
		'httpversion' => '1.1',
		'headers'     => $header,
		'body'        => $data,
	);

	$object = wp_remote_request( $url, $wp_args );

	$response = (array) $object;

	if ( ! empty( $response['value'] ) && is_array( $response['value'] ) ) {
		// POWER_BI_GROUP_NAME defined in wp-config.php.
		if ( ! defined( 'POWER_BI_GROUP_NAME' ) ) {
			define( 'POWER_BI_GROUP_NAME', 'RXSample UAT' );
		}

		// Looking for the group/workspace.
		foreach ( $response['value'] as $group ) {
			if ( ! empty( $group['id'] ) &&
				! empty( $group['name'] ) &&
				POWER_BI_GROUP_NAME === $group['name']
			) {
				// echo $group['id'];
				// The group id for the workspace.
				return $group['id'];
			}
		}
	}
	return 'returned false on Line ' . __LINE__;
}

/**
 * This generates the report details.
 *
 * @since 0.8.4
 *
 * @param string $group_id               From the 2nd step.
 * @param string $authorization_token    From the 1st step.
 * @param string $report_name            Passed in from the shortcode.
 *
 * @return array|false
 */
function third_generate_report_details( $group_id, $authorization_token, $report_name = null ) {
	$url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $group_id . '/reports';

	$request_type = 'GET';

	$data = array();

	$header = array(
		'Authorization' => 'Bearer ' . $authorization_token,
	);

	// $response = $this->do_remote_request_calls( $url, $request_type, $data, $header );
	$wp_args = array(
		'method'      => $request_type,
		'timeout'     => 0,
		'redirection' => 10,
		'httpversion' => '1.1',
		'headers'     => $header,
		'body'        => $data,
	);

	$response = wp_remote_request( $url, $wp_args );
	$result   = json_decode( wp_remote_retrieve_body( $response ) );
	return $result;

	if ( $response ) {
		set_transient( 'sample_available_aad_reports', $response['value'], WEEK_IN_SECONDS );
	}

	if ( null === $report_name ) {
		return $response;
	}

	if ( ! empty( $response['value'] ) && is_array( $response['value'] ) ) {
		foreach ( $response['value'] as $report_info ) {
			if ( ! empty( $report_info['id'] ) &&
				! empty( $report_info['name'] ) &&
				$report_info['name'] === $report_name
			) {
				// The report info for required report.
				return $report_info;
			}
		}
	}
	return false;
}


function generate_embedded_bi_report_content() {
	$reportID       = '882b4c19-6b79-47ea-8a27-901ddbc38b8f';
	$reportName     = 'Proven Benefits Report';
	$reportEmbedUrl = 'https://app.powerbi.com/rdlEmbed?reportId=882b4c19-6b79-47ea-8a27-901ddbc38b8f&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly9XQUJJLVVTLU5PUlRILUNFTlRSQUwtQi1yZWRpcmVjdC5hbmFseXNpcy53aW5kb3dzLm5ldCIsImVtYmVkRmVhdHVyZXMiOnsibW9kZXJuRW1iZWQiOnRydWUsImFuZ3VsYXJPbmx5UmVwb3J0RW1iZWQiOnRydWUsImNlcnRpZmllZFRlbGVtZXRyeUVtYmVkIjp0cnVlLCJ1c2FnZU1ldHJpY3NWTmV4dCI6dHJ1ZSwic2tpcFpvbmVQYXRjaCI6dHJ1ZX19';

	$reportID       = '8be350e2-292d-484d-aa4b-1fd6acdd8bf5';
	$reportName     = 'Master Purchase Report';
	$reportEmbedUrl = 'https://app.powerbi.com/rdlEmbed?reportId=8be350e2-292d-484d-aa4b-1fd6acdd8bf5&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly9XQUJJLVVTLU5PUlRILUNFTlRSQUwtQi1yZWRpcmVjdC5hbmFseXNpcy53aW5kb3dzLm5ldCIsImVtYmVkRmVhdHVyZXMiOnsibW9kZXJuRW1iZWQiOnRydWUsImFuZ3VsYXJPbmx5UmVwb3J0RW1iZWQiOnRydWUsImNlcnRpZmllZFRlbGVtZXRyeUVtYmVkIjp0cnVlLCJ1c2FnZU1ldHJpY3NWTmV4dCI6dHJ1ZSwic2tpcFpvbmVQYXRjaCI6dHJ1ZX19';

	$authorization_token = generate_authentication_token();
	if ( $authorization_token ) {
		$transient2['class']               = __CLASS__;
		$transient2['authorization_token'] = $authorization_token;
	}

	$group_id = second_generate_groups( $authorization_token );
	if ( $group_id ) {
		$transient2['group_id'] = $group_id;
	}

	$report_details = third_generate_report_details( $group_id, $authorization_token, $reportName );

	write_to_error_log( 'Trying ' . __LINE__ . ' sample 8be350e2-292d-484d-aa4b-1fd6acdd8bf5 group_id ' . $group_id );

	$get_token    = pharmacy_search_results();
	$report_token = $get_token->token;
	$info_data    = '<pre>$report_token ' . print_r( $report_token, true ) . '</pre>';

	// The microsoft powerbi javascript library.
	wp_enqueue_script( 'sample-ms-default-powerbi-client' );
	write_to_error_log( 'On Line ' . __LINE__ . ' sample-ms-default-powerbi-client is enqueued ' );
	// Configuration javascript.
	wp_enqueue_script( 'sample-embedded-power-bi-reports' );
	write_to_error_log( 'On Line ' . __LINE__ . ' sample-embedded-power-bi-reports js is enqueued ' );
	// Embedded Power Bi CSS.
	wp_enqueue_style( 'sample-embedded-power-bi-reports' );
	write_to_error_log( 'On Line ' . __LINE__ . ' sample-embedded-power-bi-reports style is enqueued ' );
	// Customized configuration settings.
	$power_bi_config_js = <<<EOT
		// Embed application token.
		// from generate token step (1-AccessToken.php).
		var rx_sample_txtAccessToken = "$report_token"; 

		// Embed URL.
		// from report details result (3-GetReportDetails.php).
		var rx_sample_txtEmbedUrl = "$reportEmbedUrl";

		// Report Id.
		// from report details result (3-GetReportDetails.php).
		var rx_sample_txtEmbedReportId = "$reportID";
EOT;

	wp_add_inline_script( 'sample-embedded-power-bi-reports', $power_bi_config_js, 'before' );

	// The position and z-index make sure the footerswoosh is not partially hidden.
	$embed_html = <<<HTM
		<div id="powerbi-container-header"></div>
		<div class="power-bi-embed-container"></div>
HTM;

	return $embed_html;
}
