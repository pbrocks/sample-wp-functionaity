<?php
/**
 * This creates the framework for showing Embedded Power BI Reports.
 *
 * @since 0.8.4
 * @package aap_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignoreFile.

/**
 * The Class that creates the framework for showing Embedded Power BI Reports.
 *
 * @since 0.8.4
 */
class Sample_Embedded_Power_Bi_Reports {
	/**
	 * Main construct
	 *
	 * @since 0.8.4
	 *
	 * @return void
	 */
	public function __construct() {
		add_shortcode( 'rxaap_embedded_powerbi_report', array( $this, 'handle_embedded_bi_report_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'aap_wp_shortcode_wp_enqueue_scripts' ) );
	}

	/**
	 * Registers and/or enqueues scripts for embedding powerbi reports.
	 *
	 * @since 0.8.4
	 *
	 * @return void
	 */
	public function aap_wp_shortcode_wp_enqueue_scripts() {
		wp_register_script(
			'aap-ms-default-powerbi-client',
			plugins_url( '/js/ms-default-powerbi-client.js', __DIR__ ),
			array(),
			'1.0.0',
			true
		);

		wp_register_script(
			'aap-embedded-power-bi-reports',
			plugins_url( '/js/aap-embedded-power-bi-reports.js', __DIR__ ),
			array( 'jquery' ),
			'1.0.0',
			true
		);

		wp_register_style(
			'aap-embedded-power-bi-reports',
			plugins_url( '/css/embedded-power-bi-reports.css', __DIR__ ),
			array(),
			filemtime( plugin_dir_path( __DIR__ ) . 'css/embedded-power-bi-reports.css' ),
			'all'
		);
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
		$a = shortcode_atts(
			array(
				'report_name' => 'something',
			),
			$atts
		);

		return $this->generate_embedded_bi_report_content( $a['report_name'] );
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
		$authorization_token = $this->generate_access_token_step_one();

		$group_id = $this->generate_groups_step_two( $authorization_token );

		$report_details = $this->generate_report_details_step_three( $group_id, $authorization_token, $report_name );

		$report_token = $this->get_report_token_step_four( $group_id, $report_details['id'], $authorization_token, get_current_user_id() );

        // phpcs:ignore
        // For Testing.
        // phpcs:ignore
        //$report_token = $this->get_report_token_step_four( $group_id, $report_details['id'], $authorization_token, '9999999' );

		// The microsoft powerbi javascript library.
		wp_enqueue_script( 'aap-ms-default-powerbi-client' );

		// Configuration javascript.
		wp_enqueue_script( 'aap-embedded-power-bi-reports' );

		// Embedded Power Bi CSS.
		wp_enqueue_style( 'aap-embedded-power-bi-reports' );

		// Customized configuration settings.
		$power_bi_config_js = <<<EOT
            // Embed application token.
            // from generate token step (1-AccessToken.php).
            var rx_aap_txtAccessToken = "$report_token"; 

            // Embed URL.
            // from report details result (3-GetReportDetails.php).
            var rx_aap_txtEmbedUrl = "{$report_details['embedUrl']}";

            // Report Id.
            // from report details result (3-GetReportDetails.php).
            var rx_aap_txtEmbedReportId = "{$report_details['id']}";
EOT;

		wp_add_inline_script( 'aap-embedded-power-bi-reports', $power_bi_config_js, 'before' );

		// The position and z-index make sure the footerswoosh is not partially hidden.
		$embed_html = <<<HTM
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
	public function generate_access_token_step_one() {
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
	public function generate_groups_step_two( $authorization_token ) {
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
	public function generate_report_details_step_three( $group_id, $authorization_token, $report_name = null ) {
		$url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $group_id . '/reports';

		$request_type = 'GET';

		$data = array();

		$header = array(
			'Authorization' => 'Bearer ' . $authorization_token,
		);

		$response = $this->do_remote_request_calls( $url, $request_type, $data, $header );
		$response = json_decode( $response, true );

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
	public function get_report_token_step_four( $group_id, $report_id, $authorization_token, $user_id ) {
		$url = 'https://api.powerbi.com/v1.0/myorg/groups/' . $group_id . '/reports/' . $report_id . '/generatetoken';

		$request_type = 'POST';

		$data = '{
            "accessLevel":"View",
            "identities": [
            {
              "username": "' . $user_id . '",
              "reports": [
                  "' . $report_id . '"
              ]
            }
          ] 
        }';

		$header = array(
			'Authorization' => 'Bearer ' . $authorization_token,
			'Content-Type'  => 'application/json',
		);

		$response = $this->do_remote_request_calls( $url, $request_type, $data, $header );
		$response = json_decode( $response, true );

		if ( ! empty( $response['token'] ) ) {
			return $response['token'];
		} else {
			return false;
		}
	}
}
$power_bi_reports = new Sample_Embedded_Power_Bi_Reports();
