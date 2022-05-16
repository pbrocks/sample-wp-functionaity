<?php
/**
 * Class for User Modifications.
 *
 * @since 0.12.2
 * @package aap_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * [Sample_WP_User_Modifications]  User Modifications.
 */
class Sample_WP_User_Modifications {

	/**
	 * Main construct
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		add_action( 'admin_head-users.php', array( $this, 'aap_user_id_column_style' ) );
		add_action( 'admin_init', array( $this, 'aap_user_id_column_html' ) );
	}
	/**
	 * Add the user id column after the user's checkbox
	 *
	 * @param array $array  UserID.
	 * @param int   $index  UserID.
	 * @param array $insert UserID.
	 * @return array
	 */
	public function aap_array_insert( $array, $index, $insert ) {
		return array_slice( $array, 0, $index, true ) + $insert + array_slice( $array, $index, count( $array ) - $index, true );
	}

	/**
	 * [aap_user_id_column_content] User ID column content.
	 *
	 * @param  mixed   $value       UserID.
	 * @param  string  $column_name UserID.
	 * @param  integer $user_id     UserID.
	 * @return mixed
	 */
	public function aap_user_id_column_content( $value, $column_name, $user_id ) {
		if ( 'user_id' === $column_name ) {
			return $user_id;
		}
		return $value;
	}

	/**
	 * Make user id column sortable.
	 *
	 * @param array $columns The original columns.
	 * @return array $columns The filtered columns.
	 */
	public function aap_user_id_column_sortable( $columns ) {
		$columns['user_id'] = 'ID';
		return $columns;
	}

	/**
	 * [aap_user_id_column_style] Set column width.
	 *
	 * @return void
	 */
	public function aap_user_id_column_style() {
		echo '<style>.column-user_id{width: 6%}</style>';
	}

	/**
	 * [aap_user_id_column_html]
	 *
	 * @return void
	 */
	public function aap_user_id_column_html() {
		if ( ! is_multisite() ) {
			add_filter(
				'manage_users_columns',
				function ( $columns ) {
					return $this->aap_array_insert( $columns, 1, array( 'user_id' => 'ID' ) );
				}
			);
			add_filter( 'manage_users_custom_column', array( $this, 'aap_user_id_column_content' ), 10, 3 );
			add_filter( 'manage_users_sortable_columns', array( $this, 'aap_user_id_column_sortable' ) );
		} else {
			add_filter(
				'manage_users-network_columns',
				function ( $columns ) {
					return $this->aap_array_insert( $columns, 1, array( 'user_id' => 'ID' ) );
				}
			);
			add_filter( 'manage_users_custom_column', array( $this, 'aap_user_id_column_content' ), 10, 3 );
			add_filter( 'manage_users-network_sortable_columns', array( $this, 'aap_user_id_column_sortable' ) );
		}
	}
}
new Sample_WP_User_Modifications();
