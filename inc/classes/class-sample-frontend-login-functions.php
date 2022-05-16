<?php
/**
 * Class to build Login Redirects.
 *
 * @package aap_wp_functionality
 * @since 0.3.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class to build Login Redirects.
 *
 * @since 0.3.1
 */
class Sample_Frontend_Login_Functions {


	/**
	 * Main construct
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		add_action( 'template_redirect', array( $this, 'redirect_away_from_private' ) );
		add_action( 'login_enqueue_scripts', array( $this, 'aap_wp_login_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'aap_registration_form_script' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'aap_wp_profitamp_scripts' ), 10, 1 );
		add_filter( 'login_redirect', array( $this, 'aap_login_redirect' ), 11, 3 );
		remove_action( 'um_registration_complete', 'um_check_user_status', 100, 2 );
		add_action( 'um_registration_complete', array( $this, 'aap_um_check_user_status' ), 1, 2 );
	}

	// phpcs:disable
	/**
	 * Check user status and redirect it after registration
	 *
	 * @param $user_id
	 * @param $args
	 */
	public function aap_um_check_user_status( $user_id, $args ) {
		$status = um_user( 'account_status' );

		/**
		 * UM hook
		 *
		 * @type action
		 * @title um_post_registration_{$status}_hook
		 * @description After complete UM user registration.
		 * @input_vars
		 * [{"var":"$user_id","type":"int","desc":"User ID"},
		 * {"var":"$args","type":"array","desc":"Form data"}]
		 * @change_log
		 * ["Since: 2.0"]
		 * @usage add_action( 'um_post_registration_{$status}_hook', 'function_name', 10, 2 );
		 * @example
		 * <?php
		 * add_action( 'um_post_registration_{$status}_hook', 'my_post_registration', 10, 2 );
		 * function my_post_registration( $user_id, $args ) {
		 *     // your code here
		 * }
		 * ?>
		 */
		do_action( "um_post_registration_{$status}_hook", $user_id, $args );

		if ( ! is_admin() ) {
			do_action( "track_{$status}_user_registration" );

			if ( $status == 'approved' ) {
				// UM()->user()->auto_login( $user_id );
				UM()->user()->generate_profile_slug( $user_id );

				// wp_die( 'we arrive here ' . basename(__FILE__ ) );
				/**
				 * UM hook
				 *
				 * @type action
				 * @title um_registration_after_auto_login
				 * @description After complete UM user registration and autologin.
				 * @input_vars
				 * [{"var":"$user_id","type":"int","desc":"User ID"}]
				 * @change_log
				 * ["Since: 2.0"]
				 * @usage add_action( 'um_registration_after_auto_login', 'function_name', 10, 1 );
				 * @example
				 * <?php
				 * add_action( 'um_registration_after_auto_login', 'my_registration_after_auto_login', 10, 1 );
				 * function my_registration_after_auto_login( $user_id ) {
				 *     // your code here
				 * }
				 * ?>
				 */
				do_action( 'um_registration_after_auto_login', $user_id );

				// Priority redirect
				if ( isset( $args['redirect_to'] ) ) {
					exit( wp_safe_redirect( urldecode( $args['redirect_to'] ) ) );
				}

				um_fetch_user( $user_id );

				if ( um_user( 'auto_approve_act' ) == 'redirect_url' && um_user( 'auto_approve_url' ) !== '' ) {
					exit( wp_redirect( um_user( 'auto_approve_url' ) ) );
				}

				if ( um_user( 'auto_approve_act' ) == 'redirect_profile' ) {
					exit( wp_redirect( um_user_profile_url() ) );
				}
			} else {
				if ( um_user( $status . '_action' ) == 'redirect_url' && um_user( $status . '_url' ) != '' ) {
					/**
					 * UM hook
					 *
					 * @type filter
					 * @title um_registration_pending_user_redirect
					 * @description Change redirect URL for pending user after registration
					 * @input_vars
					 * [{"var":"$url","type":"string","desc":"Redirect URL"},
					 * {"var":"$status","type":"string","desc":"User status"},
					 * {"var":"$user_id","type":"int","desc":"User ID"}]
					 * @change_log
					 * ["Since: 2.0"]
					 * @usage
					 * <?php add_filter( 'um_registration_pending_user_redirect', 'function_name', 10, 3 ); ?>
					 * @example
					 * <?php
					 * add_filter( 'um_registration_pending_user_redirect', 'my_registration_pending_user_redirect', 10, 3 );
					 * function my_registration_pending_user_redirect( $url, $status, $user_id ) {
					 *     // your code here
					 *     return $url;
					 * }
					 * ?>
					 */
					$redirect_url = apply_filters( 'um_registration_pending_user_redirect', um_user( $status . '_url' ), $status, um_user( 'ID' ) );

					exit( wp_redirect( $redirect_url ) );
				}

				if ( um_user( $status . '_action' ) == 'show_message' && um_user( $status . '_message' ) != '' ) {
					$url = UM()->permalinks()->get_current_url();
					$url = add_query_arg( 'message', esc_attr( $status ), $url );
					// add only priority role to URL
					$url = add_query_arg( 'um_role', esc_attr( um_user( 'role' ) ), $url );
					$url = add_query_arg( 'um_form_id', esc_attr( $args['form_id'] ), $url );

					exit( wp_redirect( $url ) );
				}
			}
		}
	}
	// phpcs:enable

	/**
	 * [redirect_away_from_private]
	 *
	 * Only allow logged in users to land on Organizations and Pharmacies.
	 *
	 * @return void
	 */
	public function redirect_away_from_private() {
		if ( 'rxaap_organization' === get_post_type() || 'rxaap_pharmacy' === get_post_type() ) {
			if ( ! is_user_logged_in() ) {
				wp_safe_redirect( home_url() );
				exit;
			}
		}
	}

	/**
	 * [aap_wp_profitamp_animation_scripts]
	 *
	 * @since 1.0.0
	 *
	 * @param string $hook Hook.
	 *
	 * @return void
	 */
	public function aap_wp_profitamp_scripts( $hook ) {
		// create my own version codes.
		$my_js_ver = gmdate( 'ymd-Gis', filemtime( plugin_dir_path( __DIR__ ) . 'js/profitamp-animation.js' ) );
		wp_register_script(
			'profitamp-page-animation',
			plugins_url( '/js/profitamp-animation.js', __DIR__ ),
			array( 'jquery' ),
			$my_js_ver,
			false
		);
		$has_registered = wp_register_style( 'profitamp-animation-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1' );
		if ( is_page( 'profitamp' ) ) {
			wp_enqueue_script( 'profitamp-page-animation' );
			wp_enqueue_style( 'profitamp-animation-style' );
		}
	}

	/**
	 * [aap_registration_form_script]
	 *
	 * @return void
	 */
	public function aap_registration_form_script() {
		wp_register_script(
			'turn-autocomplete-off',
			plugins_url( 'js/turn-autocomplete-off.js', __DIR__ ),
			array(),
			filemtime( plugin_dir_path( __DIR__ ) . 'js/turn-autocomplete-off.js' ),
			true
		);
	}

	/**
	 * [aap_wp_login_scripts]
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function aap_wp_login_scripts() {
		wp_deregister_style( 'login-style' );
		wp_register_style( 'login-style', plugins_url( 'css/login-style.css', __DIR__ ), time(), 1.0 );
		wp_enqueue_style( 'login-style' );
	}


	/**
	 * [aap_login_redirect]
	 *
	 * @param  [type] $redirect_to [description].
	 * @param  [type] $request     [description].
	 * @param  [type] $user        [description].
	 * @return [type]              [description].
	 */
	public function aap_login_redirect( $redirect_to, $request, $user ) {
		$options = get_option( 'login_redirect_settings' );

		if ( isset( $user->roles ) && is_array( $user->roles ) ) {
			$um_roles = get_option( 'um_roles', array() );
			foreach ( $um_roles as $role ) {
				if ( in_array( 'um_' . $role, $user->roles, true ) ) {
					$role_meta = get_option( 'um_role_' . $role . '_meta', array() );

					if ( 'redirect_admin' === $role_meta['_um_after_login'] ) {
						$redirect_to = get_admin_url();
					} elseif ( 'redirect_profile' === $role_meta['_um_after_login'] ) {
						$redirect_to = get_permalink( UM()->options()->get( 'core_account' ) );
					} else {
						$redirect_to = $role_meta['_um_login_redirect_url'] ?? home_url();
					}
				}
			}
		}

		return $redirect_to;
	}

	/**
	 * After insert a new user
	 * run at frontend and backend
	 *
	 * @param integer $user_id The UserID.
	 * @param array   $args Query Arguments.
	 * @return void
	 */
	public function aap_um_after_insert_user( $user_id, $args ) {
		if ( empty( $user_id ) || ( is_object( $user_id ) && is_a( $user_id, 'WP_Error' ) ) ) {
			return;
		}

		UM()->user()->remove_cached_queue();

		um_fetch_user( $user_id );
		if ( ! empty( $args['submitted'] ) ) {
			UM()->user()->set_registration_details( $args['submitted'], $args );
		}

		$status = um_user( 'status' );
		if ( empty( $status ) ) {
			um_fetch_user( $user_id );
			$status = um_user( 'status' );
		}

		$user = wp_get_current_user();
		if ( in_array( 'administrator', (array) $user->roles, true ) && false !== strpos( $args['_wp_http_referer'], 'create-an-account' ) ) {
			$status = 'approved';
		}

		/* save user status */
		UM()->user()->set_status( $status );

		/* create user uploads directory */
		UM()->uploader()->get_upload_user_base_dir( $user_id, true );

		/**
		 * UM hook
		 *
		 * @type action
		 * @title um_registration_set_extra_data
		 * @description Hook that runs after insert user to DB and there you can set any extra details
		 * @input_vars
		 * [{"var":"$user_id","type":"int","desc":"User ID"},
		 * {"var":"$args","type":"array","desc":"Form data"}]
		 * @change_log
		 * ["Since: 2.0"]
		 * @usage add_action( 'um_registration_set_extra_data', 'function_name', 10, 2 );
		 * @example
		 * <?php
		 * add_action( 'um_registration_set_extra_data', 'my_registration_set_extra_data', 10, 2 );
		 * function my_registration_set_extra_data( $user_id, $args ) {
		 *     // your code here
		 * }
		 * ?>
		 */
		do_action( 'um_registration_set_extra_data', $user_id, $args );
	}
}
new Sample_Frontend_Login_Functions();
