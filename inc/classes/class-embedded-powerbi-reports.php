<?php
/**
 * This creates the framework for showing Embedded Power BI Reports.
 *
 * @since 0.8.4
 * @package sample_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignoreFile

/**
 * The Class that creates the framework for showing Embedded Power BI Reports.
 *
 * @since 0.8.4
 */
class Embedded_PowerBi_Reports {
	/**
	 * Main construct
	 *
	 * @since 0.8.4
	 *
	 * @return void
	 */
	public function __construct() {
		add_shortcode( 'embedded-powerbi-report', array( $this, 'handle_embedded_bi_report_shortcode' ) );
	}

	/**
	 * Processes the shortcode and outputs the html.
	 *
	 * @since 0.8.4
	 *
	 * @param array $atts   An associative array of the attributes that were used in the
	 *                      shortcode.
	 *
	 * @return string
	 */
	public function handle_embedded_bi_report_shortcode( $atts ) {
		$output = shortcode_atts(
			array(
				'report_name' => 'Master Purchase Report',
			),
			$atts
		);

		return $this->generate_embedded_bi_report_content( $output['report_name'] );
	}

	/**
	 * Generates the html content for the shortcode.
	 *
	 * @since 0.8.4
	 *
	 * @param string $report_name   The name of the report passed in from the shortcode.
	 *
	 * @return string
	 */
	private function generate_embedded_bi_report_content( $report_name ) {
		$authorization_token = $this->first_generate_access_token();
		if ( $authorization_token ) {
			$transient2['class']  = __CLASS__;
			$transient2['authorization_token']  = $authorization_token;
			write_to_error_log( '$authorization_token is set with ' . $authorization_token );
		}

		$group_id = $this->second_generate_groups( $authorization_token );
		if ( $group_id ) {
			$transient2['group_id']  = $group_id;
			write_to_error_log( 'On Line ' . __LINE__ . ' $group_id is set with ' . $group_id );
		}

		$report_details = $this->third_generate_report_details( $group_id, $authorization_token, $report_name );
		if ( $report_details ) {
			$transient2['report_details']  = $report_details;
			write_to_error_log( 'On Line ' . __LINE__ . ' $report_details is set with ' . print_r( $report_details, true ) );
		} else {
			write_to_error_log( 'On line ' . __LINE__  . ' $report_details fails '  );
			write_to_error_log($report_details);
		}
		// write_to_error_log( 'Trying ' . __LINE__  . ' sample 8be350e2-292d-484d-aa4b-1fd6acdd8bf5 group_id ' . $group_id );
		
		$user_id = get_current_user_id();
		$user_id = 100442;

		$report_token = $this->request_powerbi_report( $group_id, $report_details['id'], $authorization_token, $user_id );
		if ( $report_token ) {
			$transient2['report_token']  = $report_token;
			write_to_error_log( 'On Line ' . __LINE__ . ' $report_token is set with ' . $report_token );
		}
		// set_transient( 'available_powerbi_reports', $transient2, WEEK_IN_SECONDS );
        // phpcs:ignore
        // For Testing.
        // phpcs:ignore
        $report_token = $this->request_powerbi_report( $group_id, $report_details['id'], $authorization_token, '9999999' );

		// The microsoft powerbi javascript library.
		wp_enqueue_script( 'sample-ms-default-powerbi-client' );
		// write_to_error_log( 'On Line ' . __LINE__ . ' sample-ms-default-powerbi-client is enqueued ' );

		// Configuration javascript.
		wp_enqueue_script( 'sample-embedded-power-bi-reports' );
		// write_to_error_log( 'On Line ' . __LINE__ . ' sample-embedded-power-bi-reports js is enqueued ' );

		// Embedded Power Bi CSS.
		wp_enqueue_style( 'sample-embedded-power-bi-reports' );
		// write_to_error_log( 'On Line ' . __LINE__ . ' sample-embedded-power-bi-reports style is enqueued ' );

		// Customized configuration settings.
		$power_bi_config_js = <<<EOT
            // Embed application token.
            // from generate token step (1-AccessToken.php).
            var rx_sample_txtAccessToken = "$report_token"; 

            // Embed URL.
            // from report details result (3-GetReportDetails.php).
            var rx_sample_txtEmbedUrl = "{$report_details['embedUrl']}";

            // Report Id.
            // from report details result (3-GetReportDetails.php).
            var rx_sample_txtEmbedReportId = "{$report_details['id']}";
EOT;

		wp_add_inline_script( 'sample-embedded-power-bi-reports', $power_bi_config_js, 'before' );

		// The position and z-index make sure the footerswoosh is not partially hidden.
		$embed_html = <<<HTM
            <div id="powerbi-container-header"></div>
            <div class="power-bi-embed-container"></div>
HTM;

		return $embed_html;
	}

	/**
	 * This does the curl calls
	 *
	 * @since 0.8.4
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
			'timeout'     => 0,
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
	 * This generates the authorization token.
	 *
	 * @since 0.8.4
	 *
	 * @return string|false
	 */
	public function first_generate_access_token() {
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

		$response = $this->do_remote_request_calls( $url, $request_type, $data, $header );

		$response = json_decode( $response, true );

		if ( ! empty( $response['access_token'] ) ) {
			return $response['access_token'];
		} else {
			return false;
		}
	}

	/**
	 * This generates the group id.
	 *
	 * @since 0.8.4
	 *
	 * @param string $authorization_token    From the first step.
	 *
	 * @return string|false
	 */
	public function second_generate_groups( $authorization_token ) {
		$url = 'https://api.powerbi.com/v1.0/myorg/groups';

		$request_type = 'GET';

		$data = array();

		$header = array(
			'Authorization' => 'Bearer ' . $authorization_token,
		);

		$response = $this->do_remote_request_calls( $url, $request_type, $data, $header );

		$response = json_decode( $response, true );
		// phpcs:ignore
		// echo '<pre>' . print_r( $response, true  ) . '</pre>';
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
		return false;
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
	public function third_generate_report_details( $group_id, $authorization_token, $report_name = null ) {
		$url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $group_id . '/reports';

		$request_type = 'GET';

		$data = array();

		$header = array(
			'Authorization' => 'Bearer ' . $authorization_token,
		);

		$response = $this->do_remote_request_calls( $url, $request_type, $data, $header );

		$response = json_decode( $response, true );

		if ( $response ) {
			set_transient( 'sample_available_aad_reports', $response['value'], WEEK_IN_SECONDS );
			write_to_error_log( '$response[\'value\'] from ' . __FUNCTION__ . ':' . __LINE__ . ' is set with ' . print_r( $response['value'], true ) );
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

	/**
	 * This generates the report token.
	 *
	 * @since 0.8.4
	 *
	 * @param string $group_id               From the 2nd step.
	 * @param string $report_id              From the 3rd step.
	 * @param string $authorization_token    From the 1st step.
	 * @param int    $user_id                WP User ID of current user.
	 *
	 * @return string|false
	 */
	public function request_powerbi_report( $group_id, $report_id, $authorization_token, $user_id ) {
		$url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $group_id . '/reports/' . $report_id . '/generatetoken';

		$pmid = 100442;
		$pmid = 100018;
		$pmid = 100023;
		$pmid = 109380;

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

		$header = array(
			'Authorization' => 'Bearer ' . $authorization_token,
			'Content-Type'  => 'application/json',
		);

		$response = $this->do_remote_request_calls( $url, $request_type, $data, $header );
		$response = json_decode( $response, true );

		$response['user_id'] = '$user_id = ' . $user_id;
		$response['pmid'] = '$pmid = ' . $pmid;
		$response['data'] = '$data = ' . $data;
		$token_info['token_id'] = $response['tokenId'];
		$token_info['token'] = $response['token'];
		$token_info['expiration'] = $response['expiration'];
		set_transient( 'current_powerbi_response', $response, DAY_IN_SECONDS );
		set_transient( 'current_powerbi_token', $token_info, DAY_IN_SECONDS );

		if ( ! empty( $response['token'] ) ) {
			return $response['token'];
		} else {
			return false;
		}
	}
}
$auth0_power_bi_reports = new Embedded_PowerBi_Reports();
