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

			// Enqueue custom scripts.
			add_action( 'admin_enqueue_scripts', array( $this, 'wpgb_op_enqueue_scripts' ) );
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

		/**
		 * Enqueue custom admin scripts.
		 *
		 * @param string $hook_suffix The current admin page.
		 * @return void
		 */
		public function wpgb_op_enqueue_scripts( $hook_suffix ) {
			if ( 'toplevel_page_wpgb-options-page' !== $hook_suffix ) {
				return;
			}

			// Automatically load imported dependencies and assets version.
			$asset_file = include trailingslashit( WPGB_OP_PATH ) . 'build/index.asset.php';

			// Enqueue CSS dependencies.
			foreach ( $asset_file['dependencies'] as $style ) {
				wp_enqueue_style( $style );
			}

			// Load our app.js.
			wp_register_script(
				'wpgb-settings-script',
				trailingslashit( WPGB_OP_URL ) . 'build/index.js',
				$asset_file['dependencies'],
				$asset_file['version'],
				true
			);
			wp_enqueue_script( 'wpgb-settings-script' );
		}
	}
	new WPGB_Option_Page_Admin();
}
