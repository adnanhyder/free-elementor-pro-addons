<?php

class Custom_Elementor_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'profile_card_addon';
	}

	public function get_title() {
		return __( 'ZEE Profile Card', 'profile-card-addon' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'profile-card-pack' ];
	}

	protected function register_controls() {
		// Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Profile Card Item', 'profile-card-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		//add profile card style
		$this->add_control(
			'profile_card_style',
			array(
				'label'   => __( 'Profile Card Style', 'profile-card-addon' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'profile-card-style-1',
				'options' => array(
					'profile-card-style-1' => __( 'Card Style 1', 'profile-card-addon' ),
					'profile-card-style-2' => __( 'Card Style 2', 'profile-card-addon' ),
					'profile-card-style-3' => __( 'Card Style 3', 'profile-card-addon' ),
					'profile-card-style-4' => __( 'Card Style 4', 'profile-card-addon' ),
					'profile-card-style-5' => __( 'Card Style 5', 'profile-card-addon' ),
				),
			)
		);
		//add profile card Width
		$this->add_control(
			'profile_card_width',
			array(
				'label'   => __( 'profile card width', 'profile-card-addon' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'profile-card-w-20',
				'options' => array(
					'profile-card-w-20'  => __( 'Card Width 20%', 'profile-card-addon' ),
					'profile-card-w-25'  => __( 'Card Width 25%', 'profile-card-addon' ),
					'profile-card-w-33'  => __( 'Card Width 33%', 'profile-card-addon' ),
					'profile-card-w-50'  => __( 'Card Width 50%', 'profile-card-addon' ),
					'profile-card-w-100' => __( 'Card Width 100%', 'profile-card-addon' ),
				),
			)
		);
		//add name or title of profile
		$this->add_control(
			'name',
			array(
				'label'       => __( 'Name', 'profile-card-addon' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'John Doe',
				'placeholder' => __( 'Enter name', 'profile-card-addon' ),
			)
		);
		//add position of profile
		$this->add_control(
			'position',
			array(
				'label'       => __( 'Position', 'profile-card-addon' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => 'Developer',
				'placeholder' => __( 'Enter position', 'profile-card-addon' ),
			)
		);
		// toggle between description show and not
		$this->add_control(
			'display_description',
			array(
				'label'        => __( 'Display Profile Description', 'profile-card-addon' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'profile-card-addon' ),
				'label_off'    => __( 'Hide', 'profile-card-addon' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'profile_description',
			array(
				'label'       => __( 'Description', 'profile-card-addon' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
				'placeholder' => __( 'Enter description', 'profile-card-addon' ),
				'condition'   => array(
					'display_description' => 'yes',
				),
			)
		);
		//Profile image to show
		$this->add_control(
			'profile_image',
			array(
				'label'   => __( 'Profile Image', 'profile-card-addon' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => '',
				),
			)
		);
		// Always close the section
		$this->end_controls_section();

		// Style Section
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Name', 'profile-card-addon' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// Tab: Name
		// Tab: Card
		$this->start_controls_tab(
			'tab_profile_name',
			[ 'label' => __( 'Name', 'profile-card-addon' ) ]
		);

		//card background
		$this->add_control(
			'background_color',
			[
				'label'     => __( 'Background Color', 'profile-card-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-content-background-color-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);
		//card content color name
		$this->add_control(
			'name_color',
			[
				'label'     => __( 'Name Color', 'profile-card-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-profile-name-wrapper' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'name_typography',
				'label'    => __( 'Name Typography', 'custom-elementor-widget' ),
				'selector' => '{{WRAPPER}} .elementor-profile-name-wrapper',
			]
		);
		$this->end_controls_tab();


		//card content color position
		$this->add_control(
			'position_color',
			[
				'label'     => __( 'Position Color', 'profile-card-addon' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-profile-position-wrapper' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'position_typography',
				'label'    => __( 'Position Typography', 'profile-card-addon' ),
				'selector' => '{{WRAPPER}} .elementor-profile-position-wrapper',
			]
		);


		$this->end_controls_section();
	}

	protected function render() {
		$settings          = $this->get_settings_for_display();
		$profile_image_url = ! empty( $settings['profile_image']['url'] ) ? esc_url( $settings['profile_image']['url'] ) : '';
		?>
        <div class="<?php echo esc_attr( $settings['profile_card_style'] ); ?> <?php echo esc_attr( $settings['profile_card_width'] ); ?>">
            <div class=" column column-block">
                <div class="team-member">
                    <div class="team-member-profile">
						<?php if ( ! empty( $profile_image_url ) ) : ?>
                            <img src="<?php echo $profile_image_url; ?>" class="img img-responsive"
                                 sizes="(max-width: 700px) 100vw, 700px" width="700" height="700"
                                 alt="<?php echo esc_attr( $settings['name'] ); ?>">
						<?php endif; ?>
                    </div>
                    <div class="team-member-info elementor-content-background-color-wrapper">
						<?php if ( $settings['display_description'] === 'yes' && ! empty( $settings['profile_description'] ) ) : ?>
                            <!-- Description -->
                            <p class="profile-description elementor-profile-description-wrapper"><?php echo esc_html( $settings['profile_description'] ); ?></p>
						<?php endif; ?>
                        <h4 class="profile-name elementor-profile-name-wrapper"><?php echo esc_html( $settings['name'] ); ?></h4>
                        <p class="profile-position elementor-profile-position-wrapper"><?php echo esc_html( $settings['position'] ); ?></p>
                    </div>

                    <div class="elementor-social-icons-wrapper team-member__socialmedia">
                        <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-animation-grow"
                           href="&quot;&quot;" target="&quot;_blank&quot;">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fab-facebook" viewBox="0 0 512 512"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                            </svg>
                        </a>
                        <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-animation-grow"
                           href="&quot;&quot;" target="&quot;_blank&quot;">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fab-first-order" viewBox="0 0 448 512"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.9 229.2c.1-.1.2-.3.3-.4 0 .1 0 .3-.1.4h-.2zM224 96.6c-7.1 0-14.6.6-21.4 1.7l3.7 67.4-22-64c-14.3 3.7-27.7 9.4-40 16.6l29.4 61.4-45.1-50.9c-11.4 8.9-21.7 19.1-30.6 30.9l50.6 45.4-61.1-29.7c-7.1 12.3-12.9 25.7-16.6 40l64.3 22.6-68-4c-.9 7.1-1.4 14.6-1.4 22s.6 14.6 1.4 21.7l67.7-4-64 22.6c3.7 14.3 9.4 27.7 16.6 40.3l61.1-29.7L97.7 352c8.9 11.7 19.1 22.3 30.9 30.9l44.9-50.9-29.5 61.4c12.3 7.4 25.7 13.1 40 16.9l22.3-64.6-4 68c7.1 1.1 14.6 1.7 21.7 1.7 7.4 0 14.6-.6 21.7-1.7l-4-68.6 22.6 65.1c14.3-4 27.7-9.4 40-16.9L274.9 332l44.9 50.9c11.7-8.9 22-19.1 30.6-30.9l-50.6-45.1 61.1 29.4c7.1-12.3 12.9-25.7 16.6-40.3l-64-22.3 67.4 4c1.1-7.1 1.4-14.3 1.4-21.7s-.3-14.9-1.4-22l-67.7 4 64-22.3c-3.7-14.3-9.1-28-16.6-40.3l-60.9 29.7 50.6-45.4c-8.9-11.7-19.1-22-30.6-30.9l-45.1 50.9 29.4-61.1c-12.3-7.4-25.7-13.1-40-16.9L241.7 166l4-67.7c-7.1-1.2-14.3-1.7-21.7-1.7zM443.4 128v256L224 512 4.6 384V128L224 0l219.4 128zm-17.1 10.3L224 20.9 21.7 138.3v235.1L224 491.1l202.3-117.7V138.3zM224 37.1l187.7 109.4v218.9L224 474.9 36.3 365.4V146.6L224 37.1zm0 50.9c-92.3 0-166.9 75.1-166.9 168 0 92.6 74.6 167.7 166.9 167.7 92 0 166.9-75.1 166.9-167.7 0-92.9-74.9-168-166.9-168z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

		<?php
	}

	protected function content_template() {
		?>
        <#
        var profile_image_url = settings.profile_image.url ? settings.profile_image.url : '';
        var profile_card_style = settings.profile_card_style;
        var profile_card_width = settings.profile_card_width;
        var name = settings.name;
        var position = settings.position;
        var profile_description = settings.profile_description;
        var display_description = settings.display_description;
        #>
        <div class="{{{ profile_card_style }}} {{{ profile_card_width }}}">
            <div class="column column-block">
                <div class="team-member">
                    <div class="team-member-profile">
                        <# if (profile_image_url) { #>
                        <img src="{{{ profile_image_url }}}" class="img img-responsive"
                             sizes="(max-width: 700px) 100vw, 700px" width="700" height="700" alt="{{{ name }}}">
                        <# } #>
                    </div>
                    <div class="team-member-info elementor-content-background-color-wrapper">
                        <# if (display_description === 'yes' && profile_description) { #>
                        <p class="profile-description elementor-profile-description-wrapper">{{{ profile_description
                            }}}</p>
                        <# } #>
                        <h4 class="profile-name elementor-profile-name-wrapper">{{{ name }}}</h4>
                        <p class="profile-position elementor-profile-position-wrapper">{{{ position }}}</p>
                    </div>
                    <div class="elementor-social-icons-wrapper team-member__socialmedia">
                        <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-animation-grow"
                           href="&quot;&quot;" target="_blank">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fab-facebook" viewBox="0 0 512 512"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                            </svg>
                        </a>
                        <a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-animation-grow"
                           href="&quot;&quot;" target="_blank">
                            <svg aria-hidden="true" class="e-font-icon-svg e-fab-first-order" viewBox="0 0 448 512"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.9 229.2c.1-.1.2-.3.3-.4 0 .1 0 .3-.1.4h-.2zM224 96.6c-7.1 0-14.6.6-21.4 1.7l3.7 67.4-22-64c-14.3 3.7-27.7 9.4-40 16.6l29.4 61.4-45.1-50.9c-11.4 8.9-21.7 19.1-30.6 30.9l50.6 45.4-61.1-29.7c-7.1 12.3-12.9 25.7-16.6 40l64.3 22.6-68-4c-.9 7.1-1.4 14.6-1.4 22s.6 14.6 1.4 21.7l67.7-4-64 22.6c3.7 14.3 9.4 27.7 16.6 40.3l61.1-29.7L97.7 352c8.9 11.7 19.1 22.3 30.9 30.9l44.9-50.9-29.5 61.4c12.3 7.4 25.7 13.1 40 16.9l22.3-64.6-4 68c7.1 1.1 14.6 1.7 21.7 1.7 7.4 0 14.6-.6 21.7-1.7l-4-68.6 22.6 65.1c14.3-4 27.7-9.4 40-16.9L274.9 332l44.9 50.9c11.7-8.9 22-19.1 30.6-30.9l-50.6-45.1 61.1 29.4c7.1-12.3 12.9-25.7 16.6-40.3l-64-22.3 67.4 4c1.1-7.1 1.4-14.3 1.4-21.7s-.3-14.9-1.4-22l-67.7 4 64-22.3c-3.7-14.3-9.1-28-16.6-40.3l-60.9 29.7 50.6-45.4c-8.9-11.7-19.1-22-30.6-30.9l-45.1 50.9 29.4-61.1c-12.3-7.4-25.7-13.1-40-16.9L241.7 166l4-67.7c-7.1-1.2-14.3-1.7-21.7-1.7zM443.4 128v256L224 512 4.6 384V128L224 0l219.4 128zm-17.1 10.3L224 20.9 21.7 138.3v235.1L224 491.1l202.3-117.7V138.3zM224 37.1l187.7 109.4v218.9L224 474.9 36.3 365.4V146.6L224 37.1zm0 50.9c-92.3 0-166.9 75.1-166.9 168 0 92.6 74.6 167.7 166.9 167.7 92 0 166.9-75.1 166.9-167.7 0-92.9-74.9-168-166.9-168z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
		<?php
	}
}

