<?php
/**
 * Using AJAX to change hero image.
 *
 * @since 0.8.9
 * @package sample_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( "You can't do anything by accessing this file directly." );
}

// phpcs:ignoreFile

add_action( 'wp_enqueue_scripts', 'initialize_change_image_ajax_scripts' );
/**
 * [initialize_change_image_ajax_scripts]
 *
 * @return void
 */
function initialize_change_image_ajax_scripts() {
	wp_register_script( 'change-image', plugins_url( 'js/change-image.js', __FILE__ ), array(), time(), true );
	wp_localize_script(
		'change-image',
		'image_ajax_object',
		array(
			'image_ajaxurl' => admin_url( 'admin-ajax.php' ),
			'image_nonce'   => wp_create_nonce( 'image-nonce' ),
			'random_image'  => return_image_from_directory( 'rotate-cover' ),
		)
	);
	if ( is_front_page() ) {
		wp_enqueue_script( 'change-image' );
	}
}

/**
 * [return_image_from_directory]
 *
 * @param string $media_directory Folder of images.
 * @return string
 */
function return_image_from_directory( $media_directory = 'image-folder-name' ) {
	$dir      = plugin_dir_path( __FILE__ ) . "/$media_directory";
	$imgs_arr = array();
	if ( file_exists( $dir ) && is_dir( $dir ) ) {
		$dir_arr   = scandir( $dir );
		$arr_files = array_diff( $dir_arr, array( '.', '..' ) );

		foreach ( $arr_files as $file ) {
			$file_path = $dir . '/' . $file;
			$ext       = pathinfo( $file_path, PATHINFO_EXTENSION );
			if ( 'jpg' === $ext || 'jpeg' === $ext || 'png' === $ext || 'JPG' === $ext || 'JPEG' === $ext || 'PNG' === $ext ) {
				array_push( $imgs_arr, $file );
			}
		}

		$count_img_index = count( $imgs_arr ) - 1;
		$random_img      = $imgs_arr[ wp_rand( 0, $count_img_index ) ];
		return plugins_url( "/$media_directory/$random_img", __FILE__ );
	}
}
