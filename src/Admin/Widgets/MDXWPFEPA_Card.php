<?php

namespace MDXWPFEPA_Pack\Admin\Widgets;

use Elementor\Widget_HTML;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access
}

class MDXWPFEPA_Card extends Widget_HTML {

	protected static $instance = null;

	public function __construct() {
		parent::__construct(); // Calls protected constructor of parent

	}

	public static function instance(): MDXWPFEPA_Card {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    /**
     * Hooks Loaded.
     *
     * @return void
     * @since  1.0.0
     */


    public function get_name() {
		return 'mdxwpfepa_profile_card';
	}

	public function get_title() {
		return __( 'Free Addon Profile Card test ', 'mdxwp' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return array( 'mdxwpfepa-pack2' );
	}

	public function get_keywords(): array {
		return array( 'Free Addon', 'Free Addon' );
	}

	public function get_custom_help_url(): string {
		return 'https://example.com/widget-name';
	}

	protected function register_controls() {
		// Start a new section
		$this->start_controls_section(
			'section_custom_html', // Section ID
			array(
				'label' => __( 'Custom HTML Options', 'mdxwp' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		// Add a custom control
		$this->add_control(
			'custom_note',
			array(
				'label'   => __( 'Custom Note', 'mdxwp' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'This is my extended widget', 'mdxwp' ),
			)
		);

		// Always close the section
		$this->end_controls_section();
	}

	protected function render() {
		// Original HTML output
		parent::render();

		// Extra output
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['custom_note'] ) ) {
			echo '<div class="my-addon-note">' . esc_html( $settings['custom_note'] ) . '</div>';
		}
	}

	/**
	 * Cloning is forbidden.
	 *
	 * @return void
	 * @since 1.0.0
	 *
	 */
	public function __clone() {
		// Override this PHP function to prevent unwanted copies of your instance.
		// Implement your own error or use `wc_doing_it_wrong().
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @return void
	 * @since 1.0.0
	 *
	 */
	public function __wakeup() {
		// Override this PHP function to prevent unwanted copies of your instance.
		// Implement your own error or use `wc_doing_it_wrong().
	}
}
