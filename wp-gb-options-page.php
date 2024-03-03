<?php
/**
 * Plugin Name:       WP options page - Gutenberg
 * Plugin URI:        https://github.com/Hackkzy/wp-gb-options-page
 * Description:       WordPress custom options page using Gutenberg components
 * Version:           1.0.0
 * Author:            Hackkzy
 * Author URI:        https://github.com/Hackkzy
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpgb-options-page
 * Domain Path:       /languages
 *
 * @package           WPGB_Options_Page
 */

/**
 * Defining Constants.
 *
 * @package    WPGB_Options_Page
 */
if ( ! defined( 'WPGB_OP_VERSION' ) ) {
	/**
	 * The version of the plugin.
	 */
	define( 'WPGB_OP_VERSION', 'PLUGIN_VERSION' );
}

if ( ! defined( 'WPGB_OP_PATH' ) ) {
	/**
	 *  The server file system path to the plugin directory.
	 */
	define( 'WPGB_OP_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'WPGB_OP_URL' ) ) {
	/**
	 * The url to the plugin directory.
	 */
	define( 'WPGB_OP_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'WPGB_OP_BASE_NAME' ) ) {
	/**
	 * The url to the plugin directory.
	 */
	define( 'WPGB_OP_BASE_NAME', plugin_basename( __FILE__ ) );
}

/**
 * Apply translation file as per WP language.
 */
function wpgb_op_text_domain_loader() {

	// Get mo file as per current locale.
	$mofile = WPGB_OP_PATH . 'languages/' . get_locale() . '.mo';

	// If file does not exists, then apply default mo.
	if ( ! file_exists( $mofile ) ) {
		$mofile = WPGB_OP_PATH . 'languages/default.mo';
	}

	load_textdomain( 'wpgb-options-page', $mofile );
}

add_action( 'plugins_loaded', 'wpgb_op_text_domain_loader' );

/**
 * Setting link for plugin.
 *
 * @param  array $links Array of plugin setting link.
 * @return array
 */
function wpgb_op_setting_page_link( $links ) {

	$settings_link = sprintf(
		'<a href="%1$s">%2$s</a>',
		esc_url( admin_url( 'admin.php?page=wpgb-options-page' ) ), // Change settings page slug.
		esc_html__( 'Settings', 'wpgb-options-page' )
	);

	array_unshift( $links, $settings_link );
	return $links;
}
add_filter( 'plugin_action_links_' . WPGB_OP_BASE_NAME, 'wpgb_op_setting_page_link' );

// Include plugin related files here.
require WPGB_OP_PATH . '/app/admin/class-wpgb-option-page-admin.php';
