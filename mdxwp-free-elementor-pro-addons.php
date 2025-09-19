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
	 * @return void
	 * @since  1.0.0
	 */
	function mdxwpfepa_extension_activate() {
		// Add any Activation tasks here
		// (e.g., Removal of free version, Create Databases).
		mdxwpfepa_is_elementor_activated();
	}

	register_activation_hook( __FILE__, 'mdxwpfepa_extension_activate' );
}


if ( ! function_exists( 'mdxwpfepa_is_elementor_activated' ) ) {
	/**
	 * Elementor activated
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function mdxwpfepa_is_elementor_activated() {
		if ( ! class_exists( '\Elementor\Plugin' ) ) {
			// Set a transient so we can show an admin notice after redirect.
			set_transient( 'mdxwpfepa_missing_elementor', true );
			update_option( 'mdxwpfepa_elementor_found', 0 );
			// Deactivate the plugin right away.
			deactivate_plugins( plugin_basename( __FILE__ ) );
		} else {
			// Elementor found and active.
			update_option( 'mdxwpfepa_elementor_found', 1 );
		}
	}
}



if ( ! function_exists( 'mdxwpfepa_admin_notice' ) ) {
	/**
	 * Deactivation hook for WordPress.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function mdxwpfepa_admin_notice() {
		if ( get_transient( 'mdxwpfepa_missing_elementor' ) ) {
			delete_transient( 'mdxwpfepa_missing_elementor' );

			echo '<div class="notice notice-error is-dismissible">';
			echo '<p>' . esc_html__( 'This plugin requires Elementor to be installed and active.', 'mdxwp' ) . '</p>';
			echo '</div>';
		}
	}


	add_action( 'admin_notices', 'mdxwpfepa_admin_notice' );

}


if ( ! function_exists( 'mdxwpfepa_extension_deactivate' ) ) {
	/**
	 * Deactivation hook for WordPress.
	 *
	 * @return void
	 * @since  1.0.0
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
	 * @return MDXWPFEPA_Core Instance of the MDXWPFEPA_Core class.
	 * @since  1.0.0
	 */
	function mdxwpfepa_initialize() {

		mdxwpfepa_is_elementor_activated();

		if ( get_option( 'mdxwpfepa_elementor_found' ) ) {
			static $fc;

			if ( ! isset( $fc ) ) {
				$fc = MDXWPFEPA_Core::instance();
			}

			$GLOBALS['mdxwpfepa_feedback'] = $fc;

			return $fc;
		}
	}

	add_action( 'plugins_loaded', 'mdxwpfepa_initialize', 10 );
}
