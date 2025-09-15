<?php

namespace xpert;

use xpert\Core\Core_Functionality;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class xpert_Init
{
    private static $instance = null;

    private function __construct()
    {
        // Private constructor to prevent direct instantiation.
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init()
    {
        // Defer initialization to plugins_loaded hook.
        add_action('plugins_loaded', [$this, 'initializePlugin']);
    }

    public function initializePlugin()
    {
        if (!class_exists('WooCommerce')) {
            add_action('wp_footer', [$this, 'displayFallbackMessage']);
        } else {
            add_action('wp_enqueue_scripts', [$this, 'enqueueFrontendAssets']);
            add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
        }

        // Test output.
        //add_action('wp_footer', [$this, 'displayTestMessage']);
    }

    public function enqueueFrontendAssets()
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

    public function enqueueAdminAssets()
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

    public function displayTestMessage()
    {
        echo '<div style="color: red; padding: 10px; border: 1px solid red;">xpert Core is active! (Test Message)</div>';
    }

    public function displayFallbackMessage()
    {
        echo '<div style="color: orange; padding: 10px; border: 1px solid orange;">xpert Core: WooCommerce not found. Please install/activate WooCommerce.</div>';
    }

    // Magic methods must be public.
    public function __clone()
    {
    }

    public function __wakeup()
    {
    }
}