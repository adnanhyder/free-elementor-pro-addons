<!-- Start Profile Card 1 -->

<div class="profile-card-style-1">
    <div class=" column column-block">
        <div class="team-member">
            <div class="team-member-profile">
                <img src="<?php echo esc_url($settings['profile_image']['url']); ?>" class="img img-responsive" sizes="(max-width: 700px) 100vw, 700px" width="700" height="700" alt="<?php echo esc_attr($settings['name']); ?>">
            </div>
            <div class="team-member-info elementor-content-background-color-wrapper">
                <!-- Description -->
                <p class="profile-description elementor-profile-description-wrapper"><?php echo wp_kses_post($settings['profile_description']); ?></p>
                <h4 class="profile-name elementor-profile-name-wrapper"><?php echo esc_attr($settings['name']); ?></h4>
                <p class="profile-position elementor-profile-position-wrapper"><?php echo esc_attr($settings['position']); ?></p>
            </div>

            <?php
            if ($settings['display_social_icon'] == 'yes') {

                echo '<div class="elementor-social-icons-wrapper team-member__socialmedia">';
                $index = 0;
                foreach ($settings['social_icon_list'] as $items => $item) {

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
                echo '</div>';
            } else {
                ?> 
                <div class="elementor-social-icons-wrapper" style="display:none;">                        
                </div> 
            <?php } ?>
        </div>
    </div>
</div>
<!-- End Profile Card -->
