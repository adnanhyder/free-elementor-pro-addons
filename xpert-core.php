<?php
/**
 * Plugin Name:       Free Elementor Pro Addons
 * Plugin URI:        #
 * Description:       Addons plugin for Elementor
 * Version:           1.0.1
 * Author:            Xpert code
 * Author URI:        https://
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       xpert
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Load Composer autoloader.
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Define plugin file constant correctly for plugin context.
if (!defined('xpert_PLUGIN_FILE')) {
    define('xpert_PLUGIN_FILE', __FILE__);
}

// Initialize the plugin using Singleton.
use xpert\xpert_Init;

xpert_Init::getInstance()->init();