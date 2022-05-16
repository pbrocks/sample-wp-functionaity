<?php
/**
 * Class to build Block Patterns.
 *
 * @since 0.1.0
 * @package aap_wp_functionality
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
		add_action( 'enqueue_block_assets', array( $this, 'aap_wp_block_pattern_scripts' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'aap_wp_editor_block_pattern_scripts' ) );
		add_action( 'init', array( $this, 'aap_marketing_homepage_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_become_member_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_api_customer_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_profit_amp_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_covers_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_gravity_forms_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_round_images_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_sections_block_pattern' ) );
		add_action( 'init', array( $this, 'aap_marketing_pages_pattern_categories' ) );
	}

	/**
	 * [aap_wp_block_pattern_scripts description]
	 *
	 * @since 1.0.0
	 */
	public function aap_wp_block_pattern_scripts() {
		wp_register_style( 'block-pattern', plugins_url( 'css/block-pattern.css', __DIR__ ), array(), time() );
		wp_register_style( 'block-styles', plugins_url( 'css/block-styles.css', __DIR__ ), array(), time() );
		wp_enqueue_style( 'block-pattern' );
		wp_enqueue_style( 'block-styles' );
	}
	/**
	 * [aap_wp_editor_block_pattern_scripts description]
	 *
	 * @since 1.0.0
	 */
	public function aap_wp_editor_block_pattern_scripts() {
		wp_register_style(
			'editor-styles',
			plugins_url( 'css/editor-styles.css', __DIR__ ),
			array(),
			filemtime( plugin_dir_path( __DIR__ ) . '/css/editor-styles.css' )
		);
		wp_register_script(
			'aap-block-adjustments',
			plugins_url( 'js/aap-block-adjustments.js', __DIR__ ),
			array(),
			filemtime( plugin_dir_path( __DIR__ ) . '/js/aap-block-adjustments.js' ),
			true
		);
		wp_enqueue_style( 'editor-styles' );
		wp_enqueue_script( 'aap-block-adjustments' );
	}

	/**
	 * [aap_marketing_pages_pattern_categories]
	 * Check first if the register_block_pattern_category exists.
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_pages_pattern_categories() {
		if ( ! function_exists( 'register_block_pattern_category' ) ) {
			return;
		}

		register_block_pattern_category(
			'rxaap-covers',
			array(
				'label' => __( 'RxSample Hero Covers', 'rxaap-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxaap-gravity-forms',
			array(
				'label' => __( 'RxSample Gravity Forms', 'rxaap-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxaap-round-images',
			array(
				'label' => __( 'RxSample Round Images', 'rxaap-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxaap-sections',
			array(
				'label' => __( 'RxSample Sections', 'rxaap-blocks' ),
			)
		);
		register_block_pattern_category(
			'rxaap-pages',
			array(
				'label' => __( 'RxSample Pages', 'rxaap-blocks' ),
			)
		);
	}

	/**
	 * [aap_marketing_homepage_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
	 */
	public function aap_marketing_homepage_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$content = $this->aap_marketing_homepage_content();
			register_block_pattern(
				'rxaap-blocks/homepage',
				array(
					'title'       => __( 'Homepage', 'rxaap-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $content ),
					'categories'  => array( 'rxaap-pages' ),
					'keywords'    => array( 'homepage' ),
				)
			);
		}
	}

	/**
	 * [aap_marketing_become_member_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
	 */
	public function aap_marketing_become_member_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$become_member = $this->aap_marketing_aap_member_content();
			register_block_pattern(
				'rxaap-blocks/become-member',
				array(
					'title'       => __( 'Become a Member', 'rxaap-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $become_member ),
					'categories'  => array( 'rxaap-pages' ),
					'keywords'    => array( 'become-member' ),
				)
			);
		}
	}

	/**
	 * [aap_marketing_api_customer_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/
	 */
	public function aap_marketing_api_customer_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$api_customer = $this->aap_marketing_api_customer_content();
			register_block_pattern(
				'rxaap-blocks/api-customer',
				array(
					'title'       => __( 'API Customer', 'rxaap-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $api_customer ),
					'categories'  => array( 'rxaap-pages' ),
					'keywords'    => array( 'api-customer' ),
				)
			);
		}
	}

	/**
	 * [aap_marketing_profit_amp_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 */
	public function aap_marketing_profit_amp_block_pattern() {
		if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {
			$profit_amp = $this->aap_marketing_profit_amp_content();
			register_block_pattern(
				'rxaap-blocks/profit-amp',
				array(
					'title'       => __( 'ProfitAmp', 'rxaap-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $profit_amp ),
					'categories'  => array( 'rxaap-pages' ),
					'keywords'    => array( 'profit-amp' ),
				)
			);
		}
	}

	/**
	 * [aap_marketing_covers_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_covers_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$covers = $this->aap_marketing_cover_content();

		foreach ( $covers as $key => $cover ) {
			register_block_pattern(
				'rxaap-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxaap-blocks' ),
					'description' => _x( 'Five cover page with hero image, media-text, and .', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $covers[ $key ] ),
					'categories'  => array( 'rxaap-covers' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}

	/**
	 * [aap_marketing_gravity_forms_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_gravity_forms_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$gravity_forms = $this->aap_marketing_gravity_forms();

		foreach ( $gravity_forms as $key => $gravity ) {
			register_block_pattern(
				'rxaap-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxaap-blocks' ),
					'description' => _x( 'Gravity Forms Sections.', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $gravity_forms[ $key ] ),
					'categories'  => array( 'rxaap-gravity-forms' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}
	/**
	 * [aap_marketing_round_images_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_round_images_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$round_images = $this->aap_marketing_round_content();

		foreach ( $round_images as $key => $round ) {
			register_block_pattern(
				'rxaap-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxaap-blocks' ),
					'description' => _x( 'Sections with round images.', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $round_images[ $key ] ),
					'categories'  => array( 'rxaap-round-images' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}
	/**
	 * [aap_marketing_sections_block_pattern]
	 *
	 * Register block patterns.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_sections_block_pattern() {
		if ( ! class_exists( 'WP_Block_Patterns_Registry' ) ) {
			return;
		}

		$sections = $this->aap_marketing_section_content();

		foreach ( $sections as $key => $section ) {
			register_block_pattern(
				'rxaap-blocks/' . preg_replace( '/_+/', '-', $key ),
				array(
					// phpcs:ignore
					'title'       => __( ucwords( preg_replace( '/_+/', ' ', $key ) ), 'rxaap-blocks' ),
					'description' => _x( 'Five section page with hero image, media-text, and .', 'Block pattern description', 'rxaap-blocks' ),
					'content'     => trim( $sections[ $key ] ),
					'categories'  => array( 'rxaap-sections' ),
					'keywords'    => array( preg_replace( '/_+/', '-', $key ) ),
				)
			);
		}
	}

	/**
	 * [aap_marketing_homepage_content]
	 *
	 * Returns homepage content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_homepage_content() {
		require __DIR__ . '/marketing-pages/homepage-content.php';

		return $homepage_content;
	}

	/**
	 * [aap_marketing_aap_member_content]
	 *
	 * Returns aap member content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_aap_member_content() {
		require __DIR__ . '/marketing-pages/become-member.php';

		return $become_member;
	}

	/**
	 * [aap_marketing_api_customer_content]
	 *
	 * Returns api customer content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_api_customer_content() {
		require __DIR__ . '/marketing-pages/api-customer.php';

		return $api_customer;
	}

	/**
	 * [aap_marketing_profit_amp_content]
	 *
	 * Returns profitamp content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_profit_amp_content() {
		require __DIR__ . '/marketing-pages/profit-amp.php';

		return $profit_amp;
	}

	/**
	 * [aap_marketing_cover_content]
	 *
	 * Returns marketing cover content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_cover_content() {
		require __DIR__ . '/marketing-pages/cover-content.php';

		return $covers;
	}

	/**
	 * [aap_marketing_gravity_forms]
	 *
	 * Returns marketing gravity forms.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_gravity_forms() {
		require __DIR__ . '/marketing-pages/gravity-forms.php';

		return $gravity_forms;
	}
	/**
	 * [aap_marketing_round_content]
	 *
	 * Returns marketing sections with round images.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_round_content() {
		require __DIR__ . '/marketing-pages/round-images.php';

		return $round_images;
	}
	/**
	 * [aap_marketing_section_content]
	 *
	 * Returns marketing section content.
	 *
	 * @link https://developer.wordpress.org/block-editor/developers/block-profit/block-patterns/
	 *
	 * @return [type] [description]
	 */
	public function aap_marketing_section_content() {
		require __DIR__ . '/marketing-pages/section-content.php';

		return $sections;
	}
}
new Sample_WP_Block_Patterns();
