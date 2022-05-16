<?php
/**
 * Class to build Block Patterns.
 *
 * @since 0.1.0
 * @package sample_wp_functionality
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignoreFile

/**
 * [Sample_WP_Block_Patterns]  Block Patterns
 */
class Sample_WP_Block_Patterns {
	/**
	 * Main construct
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		add_action( 'enqueue_block_assets', array( $this, 'sample_wp_block_pattern_scripts' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'sample_wp_editor_block_pattern_scripts' ) );
		add_action( 'init', array( $this, 'sample_marketing_homepage_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_become_member_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_api_customer_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_profit_amp_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_covers_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_gravity_forms_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_round_images_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_sections_block_pattern' ) );
		add_action( 'init', array( $this, 'sample_marketing_pages_pattern_categories' ) );
	}

	/**
	 * [sample_wp_block_pattern_scripts description]
	 *
	 * @since 1.0.0
	 */
	public function sample_wp_block_pattern_scripts() {
		wp_register_style( 'block-pattern', plugins_url( 'css/block-pattern.css', __DIR__ ), array(), time() );
		wp_register_style( 'block-styles', plugins_url( 'css/block-styles.css', __DIR__ ), array(), time() );
		wp_enqueue_style( 'block-pattern' );
		wp_enqueue_style( 'block-styles' );
	}
	/**
	 * [sample_wp_editor_block_pattern_scripts description]
	 *
	 * @since 1.0.0
	 */
	public function sample_wp_editor_block_pattern_scripts() {
		wp_register_style(
			'editor-styles',
			plugins_url( 'css/editor-styles.css', __DIR__ ),
			array(),
			filemtime( plugin_dir_path( __DIR__ ) . 'css/editor-styles.css' )
		);
		wp_register_script(
			'sample-block-adjustments',
			plugins_url( 'js/sample-block-adjustments.js', __DIR__ ),
			array(),
			filemtime( plugin_dir_path( __DIR__ ) . 'js/sample-block-adjustments.js' ),
			true
		);
		wp_enqueue_style( 'editor-styles' );
		wp_enqueue_script( 'sample-block-adjustments' );
	}

	/**
	 * [sample_marketing_pages_pattern_categories]
	 * Check first if the register_block_pattern_category exists.
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_pages_pattern_categories() {
		if ( ! function_exists( 'register_block_pattern_category' ) ) {
			return;
		}

		register_block_pattern_category(
			'rxsample-covers',
			array(
				'label' => __( 'RxSample Hero Covers', 'rxsample-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxsample-gravity-forms',
			array(
				'label' => __( 'RxSample Gravity Forms', 'rxsample-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxsample-round-images',
			array(
				'label' => __( 'RxSample Round Images', 'rxsample-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxsample-sections',
			array(
				'label' => __( 'RxSample Sections', 'rxsample-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxsample-pages',
			array(
				'label' => __( 'RxSample Pages', 'rxsample-blocks' ),
			)
		);
	}

	/**
	 * [sample_marketing_homepage_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
	 */
	public function sample_marketing_homepage_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$content = $this->sample_marketing_homepage_content();
			register_block_pattern(
				'rxsample-blocks/homepage',
				array(
					'title'       => __( 'Homepage', 'rxsample-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $content ),
					'categories'  => array( 'rxsample-pages' ),
					'keywords'    => array( 'homepage' ),
				)
			);
		}
	}

	/**
	 * [sample_marketing_become_member_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
	 */
	public function sample_marketing_become_member_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$become_member = $this->sample_marketing_sample_member_content();
			register_block_pattern(
				'rxsample-blocks/become-member',
				array(
					'title'       => __( 'Become a Member', 'rxsample-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $become_member ),
					'categories'  => array( 'rxsample-pages' ),
					'keywords'    => array( 'become-member' ),
				)
			);
		}
	}

	/**
	 * [sample_marketing_api_customer_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
	 */
	public function sample_marketing_api_customer_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$api_customer = $this->sample_marketing_api_customer_content();
			register_block_pattern(
				'rxsample-blocks/api-customer',
				array(
					'title'       => __( 'API Customer', 'rxsample-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $api_customer ),
					'categories'  => array( 'rxsample-pages' ),
					'keywords'    => array( 'api-customer' ),
				)
			);
		}
	}

	/**
	 * [sample_marketing_profit_amp_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 */
	public function sample_marketing_profit_amp_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$profit_amp = $this->sample_marketing_profit_amp_content();
			register_block_pattern(
				'rxsample-blocks/profit-amp',
				array(
					'title'       => __( 'ProfitAmp', 'rxsample-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $profit_amp ),
					'categories'  => array( 'rxsample-pages' ),
					'keywords'    => array( 'profit-amp' ),
				)
			);
		}
	}

	/**
	 * [sample_marketing_covers_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_covers_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$covers = $this->sample_marketing_cover_content();

		foreach ( $covers as $key => $cover ) {
			register_block_pattern(
				'rxsample-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxsample-blocks' ),
					'description' => _x( 'Five cover page with hero image, media-text, and .', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $covers[ $key ] ),
					'categories'  => array( 'rxsample-covers' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}

	/**
	 * [sample_marketing_gravity_forms_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_gravity_forms_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$gravity_forms = $this->sample_marketing_gravity_forms();

		foreach ( $gravity_forms as $key => $gravity ) {
			register_block_pattern(
				'rxsample-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxsample-blocks' ),
					'description' => _x( 'Gravity Forms Sections.', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $gravity_forms[ $key ] ),
					'categories'  => array( 'rxsample-gravity-forms' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}
	/**
	 * [sample_marketing_round_images_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_round_images_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$round_images = $this->sample_marketing_round_content();

		foreach ( $round_images as $key => $round ) {
			register_block_pattern(
				'rxsample-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxsample-blocks' ),
					'description' => _x( 'Sections with round images.', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $round_images[ $key ] ),
					'categories'  => array( 'rxsample-round-images' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}
	/**
	 * [sample_marketing_sections_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_sections_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$sections = $this->sample_marketing_section_content();

		foreach ( $sections as $key => $section ) {
			register_block_pattern(
				'rxsample-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxsample-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxsample-blocks' ),
					'content'     => trim( $sections[ $key ] ),
					'categories'  => array( 'rxsample-sections' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}

	/**
	 * [sample_marketing_homepage_content]
	 *
	 * Returns homepage content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_homepage_content() {
		require __DIR__ . '/marketing-pages/homepage-content.php';

		return $homepage_content;
	}

	/**
	 * [sample_marketing_sample_member_content]
	 *
	 * Returns aap member content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_sample_member_content() {
		require __DIR__ . '/marketing-pages/become-member.php';

		return $become_member;
	}

	/**
	 * [sample_marketing_api_customer_content]
	 *
	 * Returns api customer content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_api_customer_content() {
		require __DIR__ . '/marketing-pages/api-customer.php';

		return $api_customer;
	}

	/**
	 * [sample_marketing_profit_amp_content]
	 *
	 * Returns profitamp content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_profit_amp_content() {
		require __DIR__ . '/marketing-pages/profit-amp.php';

		return $profit_amp;
	}

	/**
	 * [sample_marketing_cover_content]
	 *
	 * Returns marketing cover content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_cover_content() {
		require __DIR__ . '/marketing-pages/cover-content.php';

		return $covers;
	}

	/**
	 * [sample_marketing_gravity_forms]
	 *
	 * Returns marketing gravity forms.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_gravity_forms() {
		require __DIR__ . '/marketing-pages/gravity-forms.php';

		return $gravity_forms;
	}
	/**
	 * [sample_marketing_round_content]
	 *
	 * Returns marketing sections with round images.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_round_content() {
		require __DIR__ . '/marketing-pages/round-images.php';

		return $round_images;
	}
	/**
	 * [sample_marketing_section_content]
	 *
	 * Returns marketing section content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function sample_marketing_section_content() {
		require __DIR__ . '/marketing-pages/section-content.php';

		return $sections;
	}
}
new Sample_WP_Block_Patterns();
