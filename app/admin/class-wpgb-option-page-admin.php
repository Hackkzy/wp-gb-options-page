<?php
/**
 * Class for admin methods.
 *
 * @package WPGB_Options_Page
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// If class is exist, then don't execute this.
if ( ! class_exists( 'WPGB_Option_Page_Admin' ) ) {

	/**
	 * Calls for admin methods.
	 */
	class WPGB_Option_Page_Admin {

		/**
		 * Constructor for class.
		 */
		public function __construct() {
			// Register a custom menu page for our settings.
			add_action( 'admin_menu', array( $this, 'wpgb_op_admin_menu' ) );
		}

		/**
		 * Register a custom menu page for our settings.
		 *
		 * @return void
		 */
		public function wpgb_op_admin_menu() {
			add_menu_page(
				esc_html__( 'GB Plugin Settings', 'wpgb-options-page' ),
				esc_html__( 'GB Plugin Settings', 'wpgb-options-page' ),
				'manage_options',
				'wpgb-options-page',
				array( $this, 'wpgb_op_admin_menu_callback' ),
				'dashicons-block-default',
			);
		}

		/**
		 * Admin menu callback.
		 *
		 * @return void
		 */
		public function wpgb_op_admin_menu_callback() {
			?>
			<div class="wrap">
				<h1><?php esc_html_e( 'ACF Geo Field', 'blp-acf-geo-field' ); ?></h1>
				<div id="wpgb-settings"></div>
			</div>
			<?php
		}
	}
	new WPGB_Option_Page_Admin();
}
