<?php
/*
Plugin Name: Profile Card Addon
Description: A Profile Card Addon for Elementor widget plugin.
Version: 1.0.0
Author: Zeeshan
License: GPL2
textdoamin:
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if Elementor is active
function profile_card_elementor_widget_check_elementor() {
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', function () {
			echo '<div class="notice notice-error"><p>Elementor must be installed and activated to use Custom Elementor Widget.</p></div>';
		} );

		return false;
	}

	return true;
}

// Register the custom widget
function register_profile_card_elementor_widget() {
	if ( ! profile_card_elementor_widget_check_elementor() ) {
		return;
	}
	require_once plugin_dir_path( __FILE__ ) . 'widgets/profile-cards.php';
	\Elementor\Plugin::instance()->widgets_manager->register( new \Custom_Elementor_Widget() );
}

add_action( 'elementor/widgets/register', 'register_profile_card_elementor_widget' );

// register custom category for plugin
function add_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'profile-card-pack',
		array(
			'title' => esc_html__( 'Zee Addons Pack', 'profile-card-addon' ),
			'icon'  => 'fa fa-plug',
		)
	);

}
add_action( 'elementor/elements/categories_registered', 'add_widget_categories' );

// Initialize the plugin
function profile_card_elementor_widget_init() {
	// Enqueue styles and scripts if needed
	add_action( 'elementor/frontend/after_enqueue_styles', function () {
		wp_enqueue_style( 'custom-elementor-widget', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
	} );
}

add_action( 'plugins_loaded', 'profile_card_elementor_widget_init' );

// register custom category for plugin

