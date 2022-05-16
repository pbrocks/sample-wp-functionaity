<?php
/**
 * Initialize customizer functionality.
 *
 * @since 0.8.5
 * @package aap_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( "You can't do anything by accessing this file directly." );
}

// phpcs:ignoreFile

add_action( 'customize_register', 'aap_footer_swoosh_customizer_init', 14 );
/**
 * Add to customizer.
 *
 * @author provisions
 * @param array $wp_customize WP_Customize_Manager.
 * @return void
 */
function aap_footer_swoosh_customizer_init( $wp_customize ) {
	$wp_customize->add_panel(
		'aap__customizer_panel',
		array(
			'title'    => _x( 'Sample Customizer', 'sample-wp-functionality' ),
			'priority' => 5,
		)
	);

	$wp_customize->add_section(
		'aap_footer_swoosh_section',
		array(
			'title'    => _x( 'Adjust Sample Footer Swoosh', 'customizer menu section', 'sample-wp-functionality' ),
			'panel'    => 'aap__customizer_panel',
			'priority' => 4,
		)
	);

	$wp_customize->add_setting(
		'aap_footer_logo_image',
		array(
			'default'    => plugins_url( '/inc/images/aap-logo.png', __DIR__ ),
			'type'       => 'option',
			'capability' => 'manage_options',
			'transport'  => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
			$wp_customize,
			'aap_footer_logo_image',
			array(
				'label'       => __( 'Sample Footer Logo', 'sample-wp-functionality' ),
				'section'     => 'aap_footer_swoosh_section',
				'description' => 'aap_footer_logo_image - aap_footer_swoosh',
				'settings'    => 'aap_footer_logo_image',
			)
		)
	);

	$wp_customize->add_setting(
		'aap_footer_logo_width',
		array(
			'default'    => 200,
			'type'       => 'option',
			'capability' => 'manage_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Per_Customizer_Range_Control(
			$wp_customize,
			'aap_footer_logo_width',
			array(
				'type'        => 'range-value',
				'section'     => 'aap_footer_swoosh_section',
				'settings'    => 'aap_footer_logo_width',
				'label'       => __( 'Footer Logo Width' ),
				'input_attrs' => array(
					'min'    => 100,
					'max'    => 350,
					'step'   => 1,
					'suffix' => 'px',
				),
			)
		)
	);

	$wp_customize->add_setting(
		'aap_raise_footer_swoosh_iphone',
		array(
			'default'    => 5,
			'type'       => 'option',
			'capability' => 'manage_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Per_Customizer_Range_Control(
			$wp_customize,
			'aap_raise_footer_swoosh_iphone',
			array(
				'type'        => 'range-value',
				'section'     => 'aap_footer_swoosh_section',
				'settings'    => 'aap_raise_footer_swoosh_iphone',
				'label'       => __( 'iPhone Raise Footer Swoosh' ),
				'description' => __( 'This value and the ones following allow you to adjust the footer swoosh image for different breakpoints. Adjust the value here for iPhone or Android phones.' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 30,
					'step'   => 1,
					'suffix' => 'rem',
				),
			)
		)
	);

	$wp_customize->add_setting(
		'aap_raise_footer_swoosh_tablet',
		array(
			'default'    => 10,
			'type'       => 'option',
			'capability' => 'manage_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Per_Customizer_Range_Control(
			$wp_customize,
			'aap_raise_footer_swoosh_tablet',
			array(
				'type'        => 'range-value',
				'section'     => 'aap_footer_swoosh_section',
				'settings'    => 'aap_raise_footer_swoosh_tablet',
				'label'       => __( 'Tablet Raise Footer Swoosh' ),
				'description' => __( 'Adjust the value above for raising footer swoosh for Tablets.' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 40,
					'step'   => 1,
					'suffix' => 'rem',
				),
			)
		)
	);

	$wp_customize->add_setting(
		'aap_raise_footer_swoosh_sm_desktop',
		array(
			'default'    => 15,
			'type'       => 'option',
			'capability' => 'manage_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Per_Customizer_Range_Control(
			$wp_customize,
			'aap_raise_footer_swoosh_sm_desktop',
			array(
				'type'        => 'range-value',
				'section'     => 'aap_footer_swoosh_section',
				'settings'    => 'aap_raise_footer_swoosh_sm_desktop',
				'label'       => __( 'Small Desktop Raise Footer Swoosh' ),
				'description' => __( 'Adjust the value above for raising footer swoosh for Small Desktops.' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					'suffix' => 'rem',
				),
			)
		)
	);

	$wp_customize->add_setting(
		'aap_raise_footer_swoosh_desktop',
		array(
			'default'    => 20,
			'type'       => 'option',
			'capability' => 'manage_options',
			'transport'  => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Per_Customizer_Range_Control(
			$wp_customize,
			'aap_raise_footer_swoosh_desktop',
			array(
				'type'        => 'range-value',
				'section'     => 'aap_footer_swoosh_section',
				'settings'    => 'aap_raise_footer_swoosh_desktop',
				'label'       => __( 'Desktop Raise Footer Swoosh' ),
				'description' => __( 'Adjust the value above for raising footer swoosh for Large Desktops.' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					'suffix' => 'rem',
				),
			)
		)
	);

}

add_action( 'customize_register', 'aap_global_scripts_init', 14 );
/**
 * Add to customizer.
 *
 * @author provisions
 * @param array $wp_customize WP_Customize_Manager.
 * @return void
 */
function aap_global_scripts_init( $wp_customize ) {
	$wp_customize->add_section(
		'aap_global_scripts_section',
		array(
			'title'    => _x( 'Sample Global Scripts', 'customizer menu section', 'sample-wp-functionality' ),
			'panel'    => 'aap__customizer_panel',
			'priority' => 5,
		)
	);

	$wp_customize->add_setting(
		'aap_live_chat_js_code',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'aap_sanitize_customizer_js_code',
			'sanitize_js_callback' => 'aap_escape_customizer_js_output',
		)
	);

	$wp_customize->add_control(
		'aap_live_chat_js_code',
		array(
			'label'       => esc_html__( 'Live Chat JS code', 'sample-wp-functionality' ),
			'section'     => 'aap_global_scripts_section',
			'type'        => 'textarea',
			'settings'    => 'aap_live_chat_js_code',
			'description' => 'aap_live_chat_js_code => aap_global_scripts_section',
		)
	);

	$wp_customize->add_setting(
		'aap_act_on_js_code',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'aap_sanitize_customizer_js_code',
			'sanitize_js_callback' => 'aap_escape_customizer_js_output',
		)
	);

	$wp_customize->add_control(
		'aap_act_on_js_code',
		array(
			'label'       => esc_html__( 'Act On JS code', 'sample-wp-functionality' ),
			'section'     => 'aap_global_scripts_section',
			'type'        => 'textarea',
			'settings'    => 'aap_act_on_js_code',
			'description' => 'aap_act_on_js_code => aap_global_scripts_section',
		)
	);

	$wp_customize->add_setting(
		'aap_brightedge_js_code',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'aap_sanitize_customizer_js_code',
			'sanitize_js_callback' => 'aap_escape_customizer_js_output',
		)
	);

	$wp_customize->add_control(
		'aap_brightedge_js_code',
		array(
			'label'       => esc_html__( 'BrightEdge JS code', 'sample-wp-functionality' ),
			'section'     => 'aap_global_scripts_section',
			'type'        => 'textarea',
			'settings'    => 'aap_brightedge_js_code',
			'description' => 'aap_brightedge_js_code => aap_global_scripts_section',
		)
	);

	$wp_customize->add_setting(
		'aap_google_adroll_js_code',
		array(
			'type' => 'option',
			'sanitize_callback'    => 'aap_sanitize_customizer_js_code',
			'sanitize_js_callback' => 'aap_escape_customizer_js_output',
		)
	);

	$wp_customize->add_control(
		'aap_google_adroll_js_code',
		array(
			'label'       => esc_html__( 'Google AdRoll JS code', 'sample-wp-functionality' ),
			'section'     => 'aap_global_scripts_section',
			'type'        => 'textarea',
			'settings'    => 'aap_google_adroll_js_code',
			'description' => 'aap_google_adroll_js_code => aap_global_scripts_section',
		)
	);
}

add_action( 'wp_enqueue_scripts', 'aap_customizer_inline_styles_method', 12 );
/**
 * Add color styling from theme
 */
function aap_customizer_inline_styles_method() {
	wp_enqueue_style(
		'aap-customizer-style',
		plugins_url(
			'css/aap-customizer-style.css',
			__FILE__
		),
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . 'css/aap-customizer-style.css' )
	);
		$width             = get_option( 'aap_footer_logo_width' );
		$iphone_swoosh     = get_option( 'aap_raise_footer_swoosh_iphone', 5 );
		$tablet_swoosh     = get_option( 'aap_raise_footer_swoosh_tablet', 10 );
		$sm_desktop_swoosh = get_option( 'aap_raise_footer_swoosh_sm_desktop', 15 );
		$desktop_swoosh    = get_option( 'aap_raise_footer_swoosh_desktop', 20 );
		$customizer_css    = "
                footer.site-header .site-logo .custom-logo {
                        width: {$width}px;
                }
                footer .site-logo .custom-logo {
                        width: {$width}px;
                }
				.footer-section {
					margin-top: -{$iphone_swoosh}rem;
				}
                @media only screen and (min-width: 500px) {
					.footer-section {
						margin-top: -{$tablet_swoosh}rem;
					}
				}

				@media only screen and (min-width: 900px) {
					.footer-section {
						margin-top: -{$sm_desktop_swoosh}rem;
					}
				}

				@media only screen and (min-width: 1500px) {
					.footer-section {
						margin-top: -{$desktop_swoosh}rem;
					}
				}


                ";
		wp_add_inline_style( 'aap-customizer-style', $customizer_css );
}

// script input sanitization function
function aap_sanitize_customizer_js_code( $input ) {
	return $input;
}

// output escape function
function aap_escape_customizer_js_output( $input ) {
	return $input;
}

add_action( 'wp_print_footer_scripts', 'aap_global_scripts_customizer' );
function aap_global_scripts_customizer() {
	$footer_script_1 = get_option( 'aap_live_chat_js_code' );
	$footer_script_2 = get_option( 'aap_act_on_js_code' );
	$footer_script_3 = get_option( 'aap_google_adroll_js_code' );
	$footer_script_4 = get_option( 'aap_brightedge_js_code' );
	?>
	<script>
		(function(){
			<?php
				echo ( $footer_script_1 ?? '' );
				echo ( $footer_script_2 ?? '' );
				echo ( $footer_script_3 ?? '' );
				echo ( $footer_script_4 ?? '' );
			?>
		})();
	</script>
	<?php
}
