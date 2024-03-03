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
		}

	}
	new WPGB_Option_Page_Admin();
}
