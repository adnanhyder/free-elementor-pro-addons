<?php
/**
 * Plugin Name: Free elementor pro addon
 * Plugin URI: https://wordpress.org/plugins/simple-voting-system-formally-fc-feedback
 * Description: WordPress plugin allows website visitors to vote on various articles
 * Version: 1.0.0
 * php version 8.0.0
 * Author: Adnan Hyder Pervez
 * Author URI: https://profiles.wordpress.org/adnanhyder/
 * Developer: Adnan
 * Developer URI: 12345adnan@gmail.com
 * Text Domain: mdxwp
 * Domain Path: /languages
 *
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @category Plugin
 * @package  mdxwpfepa-Pack
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */

use MDXWPFEPA_Pack\MDXWPFEPA_Core;

defined( 'ABSPATH' ) || exit;



if ( ! defined( 'MDXWPFEPA_PLUGIN_FILE' ) ) {
	define( 'MDXWPFEPA_PLUGIN_FILE', __FILE__ );
}

if ( ! defined( 'MDXWPFEPA_PLUGIN_VERSION' ) ) {
	define( 'MDXWPFEPA_PLUGIN_VERSION', '1.0.0' );
}

if ( ! defined( 'MDXWPFEPA_PLUGIN_DIR' ) ) {
	define( 'MDXWPFEPA_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'MDXWPFEPA_INCLUDES_DIR' ) ) {
	define( 'MDXWPFEPA_INCLUDES_DIR', MDXWPFEPA_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'includes' );
}

if ( ! defined( 'MDXWPFEPA_VENDOR_DIR' ) ) {
	define( 'MDXWPFEPA_VENDOR_DIR', MDXWPFEPA_PLUGIN_DIR . DIRECTORY_SEPARATOR . 'vendor' );
}

if ( ! defined( 'MDXWPFEPA_PLUGIN_SRC_URL' ) ) {
	define( 'MDXWPFEPA_PLUGIN_SRC_URL', plugin_dir_url( MDXWPFEPA_PLUGIN_FILE ) . 'src' );
}

$loader = include_once MDXWPFEPA_VENDOR_DIR . DIRECTORY_SEPARATOR . 'autoload.php';

if ( ! $loader ) {
	throw new Exception( 'vendor/autoload.php missing please run `composer install`' );
}

/**
 * Activation and Deactivation hooks for WordPress
 */

if ( ! function_exists( 'mdxwpfepa_extension_activate' ) ) {
	/**
	 * Activation Hook for WordPress.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function mdxwpfepa_extension_activate() {
		// Add any Activation tasks here
		// (e.g., Removal of free version, Create Databases).
	}

	register_activation_hook( __FILE__, 'mdxwpfepa_extension_activate' );
}

if ( ! function_exists( 'mdxwpfepa_extension_deactivate' ) ) {
	/**
	 * Deactivation hook for WordPress.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function mdxwpfepa_extension_deactivate() {
		// Add any deactivation tasks here (e.g., cleanup, data removal).
		// This code will be executed once when the plugin is deactivated.
	}

	register_deactivation_hook( __FILE__, 'mdxwpfepa_extension_deactivate' );
}

if ( ! function_exists( 'mdxwpfepa_initialize' ) ) {
	/**
	 * Initialize the plugin.
	 *
	 * @since  1.0.0
	 * @return MDXWPFEPA_Core Instance of the MDXWPFEPA_Core class.
	 */
	function mdxwpfepa_initialize(): ?MDXWPFEPA_Core {

		static $fc;

		if ( ! isset( $fc ) ) {
			$fc = MDXWPFEPA_Core::instance();
		}

		$GLOBALS['mdxwpfepa_feedback'] = $fc;

		return $fc;
	}

	add_action( 'plugins_loaded', 'mdxwpfepa_initialize', 10 );
}
