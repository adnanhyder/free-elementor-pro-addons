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
		return __( 'Free Addon Profile Card', 'mdxwp' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return array( 'mdxwpfepa-pack' );
	}

	public function get_custom_help_url(): string {
		return 'https://example.com/widget-name';
	}

	protected function _register_controls() {
		// Start a new section
		$this->start_controls_section(
			'section_custom_html', // Section ID
			array(
				'label' => __( 'Custom HTML Options', 'mdxwp' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		//add profile card style
		$this->add_control(
			'profile_card_style',
			array(
				'label'   => __( 'Profile Card Style', 'mdxwp' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'card_style_1',
				'options' => array(
					'card_style_1' => __( 'Card Style 1', 'mdxwp' ),
					'card_style_2' => __( 'Card Style 2', 'mdxwp' ),
					'card_style_3' => __( 'Card Style 3', 'mdxwp' ),
					'card_style_4' => __( 'Card Style 4', 'mdxwp' ),
					'card_style_5' => __( 'Card Style 5', 'mdxwp' ),
				),
			)
		);
		//add name or title of profile
		$this->add_control(
			'name',
			array(
				'label'       => __( 'Name', 'mdxwp' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'John Doe',
				'placeholder' => __( 'Enter name', 'mdxwp' ),
			)
		);
		//add position of profile
		$this->add_control(
			'position',
			array(
				'label'       => __( 'Position', 'mdxwp' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'Developer',
				'placeholder' => __( 'Enter position', 'mdxwp' ),
			)
		);
		// toggle between description show and not
		$this->add_control(
			'display_description',
			array(
				'label'        => __( 'Display Profile Description', 'mdxwp' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'mdxwp' ),
				'label_off'    => __( 'Hide', 'mdxwp' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		// Profile description content to show
		$this->add_control(
			'description',
			array(
				'label'       => __( 'Description', 'mdxwp' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
				'placeholder' => __( 'Enter description', 'mdxwp' ),
				'condition'   => array(
					'display_description' => 'yes',
				),
			)
		);
		//Profile image to show
		$this->add_control(
			'profile_image',
			array(
				'label'   => __( 'Profile Image', 'mdxwp' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => '',
				),
			)
		);
		// Always close the section
		$this->end_controls_section();

	}

	protected function render(): void {
		$settings            = $this->get_settings_for_display();
		$name                = esc_html( $settings['name'] );
		$position            = esc_html( $settings['position'] );
		$description         = esc_html( $settings['description'] );
		$profile_image_url   = $settings['profile_image']['url'];
		$display_description = $settings['display_description'];
		?>
        <div class="custom-profile-card <?php echo esc_attr( $settings['profile_card_style'] ); ?>">
			<?php if ( $profile_image_url ) : ?>
                <div class="profile-image">
                    <img src="<?php echo esc_url( $profile_image_url ); ?>" alt="<?php echo esc_attr( $name ); ?>">
                </div>
			<?php endif; ?>
            <div class="profile-content">
                <h3><?php echo $name; ?></h3>
                <p class="position"><?php echo $position; ?></p>
				<?php if ( $display_description && $description ) : ?>
                    <p class="description"><?php echo $description; ?></p>
				<?php endif; ?>
            </div>
        </div>
		<?php
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
