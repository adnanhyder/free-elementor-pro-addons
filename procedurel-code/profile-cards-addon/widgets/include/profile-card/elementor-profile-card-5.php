<!-- Start Profile Card 5 -->
<?php use Elementor\Icons_Manager; ?>
<div class="profile-card-style-5 text-center">
    <div id="ct-team-member-2" class="ct-team-member-layout ">
        <div class="ct-team-member-inner elementor-content-background-color-wrapper">
            <div class="ct-team-image">
                <img src="<?php echo esc_url($settings['profile_image']['url']); ?>" width="255" height="320"class="img img-responsive" alt="<?php echo esc_attr($settings['name']); ?>">
                <div class="profile-icons">
                    <!-- social icon -->
                    <div class="elementor-social-icons-wrapper ct-team-social">
                        <p class="profile-description elementor-profile-description-wrapper"><?php echo wp_kses_post($settings['profile_description']); ?></p>
                        <?php
                        if ($settings['display_social_icon'] == 'yes') {
                            $index = 0;
                            foreach ($settings['social_icon_list'] as $index => $item) {

                                $link_key = 'link_' . $index;

                                $this->add_render_attribute($link_key, 'href',  esc_url($item['link']['url']));

                                if ($item['link']['is_external']) {
                                    $this->add_render_attribute($link_key, 'target', '_blank');
                                }

                                if ($item['link']['nofollow']) {
                                    $this->add_render_attribute($link_key, 'rel', 'nofollow');
                                }
                                $social= "";
                                ?>

                                <a class="elementor-icon elementor-social-icon elementor-social-icon-<?php echo esc_attr($social . $class_animation); ?>" <?php echo esc_attr($this->get_render_attribute_string($link_key)); ?>>
                                    <?php Icons_Manager::render_icon($item['social'], [ 'aria-hidden' => 'true' ]); ?>
                                </a>
                            <?php
                            $index++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="ct-team-holder">
                <h3 class="ct-team-title profile-name elementor-profile-name-wrapper"><?php echo esc_attr($settings['name']); ?></h3>
                <!-- position -->
                <div class="ct-team-position text-gradient2 subtitle profile-position elementor-profile-position-wrapper"><?php echo esc_attr($settings['position']); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Card -->
