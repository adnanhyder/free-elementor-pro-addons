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
 *  @package          xpert/elementor-addons
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Loads Composer's autoloader for PSR-4 namespaced classes.
 *
 * @since 1.0.0
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Defines the main plugin file path for internal use.
 *
 * @since 1.0.0
 */
if (!defined('XPERT_PLUGIN_FILE')) {
    define('XPERT_PLUGIN_FILE', __FILE__);
}

/**
 * Initializes the plugin if Elementor is active.
 *
 * @since 1.0.0
 */
use Xpert\xpert_Init;

add_action('plugins_loaded', function () {
    if (did_action('elementor/loaded')) {

        Xpert\xpert_Init::get_instance()->init();
    } else {
        add_action('admin_notices', function () {
            ?>
            <div class="notice notice-error">
                <p><?php esc_html_e('Xpert Elementor Addons requires Elementor to be installed and active.', 'xpert-elementor-addons'); ?></p>
            </div>
            <?php
        });
    }
});