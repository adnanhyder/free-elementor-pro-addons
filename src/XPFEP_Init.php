<?php

/**
 * Main plugin initialization class.
 *
 * @since 1.0.0
 * @package XpertElementorAddons
 */

namespace Xpert;

use xpert\Core\Core_Functionality;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class XPFEP_Init
{
    /**
     * Singleton instance.
     *
     * @since 1.0.0
     * @var XPFEP_Init|null
     */

    private static $instance = null;

    /**
     * Private constructor to prevent direct instantiation.
     *
     * @since 1.0.0
     */

    private function __construct()
    {
        // Private constructor to prevent direct instantiation.
    }

    /**
     * Gets the singleton instance.
     *
     * @return XPFEP_Init
     * @since 1.0.0
     */

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Initializes the plugin.
     *
     * @return void
     * @since 1.0.0
     */
    public function init()
    {
        // Load translations
        load_plugin_textdomain('xpert-elementor-addons', false, dirname(plugin_basename(XPERT_PLUGIN_FILE)) . '/languages');
        // Register Elementor widgets
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        //----------------- Add below other initialization tasks (e.g., admin menus, hooks)

        // Defer initialization to plugins_loaded hook.
        add_action('init', [$this, 'initialize_Plugin']);
    }

    /**
     * Registers custom Elementor widgets.
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     * @return void
     * @since 1.0.0
     */
    public function register_widgets($widgets_manager)
    {
        // Example: Register a custom widget (create this class separately)
        // $widgets_manager->register(new \xpert\Widgets\Custom_Widget());
    }

    public function initialize_Plugin()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_FrontendAssets']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_AdminAssets']);

        // Test output.
        $this->display_TestMessage();

    }

    public function enqueue_FrontendAssets()
    {
        // Enqueue frontend CSS and JS.
        wp_enqueue_style(
            'xpert-frontend-css',
            plugin_dir_url(__FILE__) . '../../assets/css/frontend.css',
            [],
            '1.0.0'
        );
        wp_enqueue_script(
            'xpert-frontend-js',
            plugin_dir_url(__FILE__) . '../../assets/js/frontend.js',
            ['jquery'],
            '1.0.0',
            true
        );
    }

    public function enqueue_AdminAssets()
    {
        // Enqueue admin CSS and JS.
        wp_enqueue_style(
            'xpert-admin-css',
            plugin_dir_url(__FILE__) . '../../assets/css/admin.css',
            [],
            '1.0.0'
        );
        wp_enqueue_script(
            'xpert-admin-js',
            plugin_dir_url(__FILE__) . '../../assets/js/admin.js',
            ['jquery'],
            '1.0.0',
            true
        );
    }

    public function display_TestMessage()
    {
        echo '<div style="color: red; padding: 10px; border: 1px solid red;">xpert Core is active! (Test Message)</div>';
    }

    public function display_FallbackMessage()
    {
        echo '<div style="color: orange; padding: 10px; border: 1px solid orange;">xpert Core: Elementor not found. Please install/activate WooCommerce.</div>';
    }

    // Magic methods must be public.
    public function __clone()
    {
    }

    public function __wakeup()
    {
    }
}