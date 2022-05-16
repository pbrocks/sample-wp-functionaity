<?php
/**
 * Plugin Name:     Sample WP Functionality
 * Plugin URI:      https://github.com/pbrocks/sample-wp-functionality
 * Description:     WordPress plugin to add functionality to the site.
 * Version:         0.13.4
 * Author:          pbrocks
 * Author URI:      https://github.com/pbrocks
 * License:         GPL-2.0-or-later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     sample-wp-functionality
 *
 * @package         sample_wp_functionality
 */

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

register_activation_hook( __FILE__, 'sample_wp_functionality_install' );
/**
 * Set a transient in order to redirect upon activation.
 */
function sample_wp_functionality_install() {
	set_transient( 'sample_wp_functionality_activated', true, 30 );
	if ( ! wp_next_scheduled( 'update_pharmacy_data' ) ) {
		wp_schedule_event( time(), 'hourly', 'update_pharmacy_data' );
	}
}

register_deactivation_hook( __FILE__, 'sample_wp_functionality_uninstall' );
/**
 * Clear Pharmacy Updater hook on deactivation.
 *
 * @return void
 */
function sample_wp_functionality_uninstall() {
	wp_clear_scheduled_hook( 'update_pharmacy_data' );
}

add_action( 'plugins_loaded', 'sample_wp_functionality_php_initialization' );
/**
 * Initialize php files.
 *
 * @since 0.1.0
 */
function sample_wp_functionality_php_initialization() {
	 /**
	 * Include all php files in /inc directory.
	 */
	if ( file_exists( __DIR__ . '/inc' ) && is_dir( __DIR__ . '/inc' ) ) {
		foreach ( glob( __DIR__ . '/inc/*.php' ) as $filename ) {
			require $filename;
		}
	}

	/**
	 * Include all php files in /inc/classes directory.
	 */
	if ( file_exists( __DIR__ . '/inc/classes' ) && is_dir( __DIR__ . '/inc/classes' ) ) {
		foreach ( glob( __DIR__ . '/inc/classes/*.php' ) as $filename ) {
			require $filename;
		}
	}
}

add_action( 'plugins_loaded', 'sample_wp_functionality_load_textdomain' );
/**
 * Setup WordPress localization support
 *
 * @since 0.1.0
 */
function sample_wp_functionality_load_textdomain() {
	load_plugin_textdomain( 'sample-wp-functionality', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

add_filter( 'plugin_row_meta', 'sample_wp_functionality_plugin_row_meta', 10, 2 );
/**
 * Show row meta on the plugin screen.
 *
 * @param    mixed $links Plugin Row Meta.
 * @param    mixed $file  Plugin Base file.
 *
 * @return    array
 *
 * @since  0.1.0
 */
function sample_wp_functionality_plugin_row_meta( $links, $file ) {
	if ( strpos( $file, 'sample-wp-functionality.php' ) !== false ) {
		$new_links = array(
			'<a href="' . esc_url( 'https://github.com/pbrocks/sample-wp-functionality' ) . '" title="' . esc_attr( __( 'View Documentation', 'sample-wp-functionality' ) ) . '">' . __( 'Docs', 'sample-wp-functionality' ) . '</a>',
			'<a href="' . esc_url( 'https://github.com/pbrocks/sample-wp-functionality' ) . '" title="' . esc_attr( __( 'Visit Customer Support Forum', 'sample-wp-functionality' ) ) . '">' . __( 'Support', 'sample-wp-functionality' ) . '</a>',
		);
		$links     = array_merge( $links, $new_links );
	}
	return $links;
}
