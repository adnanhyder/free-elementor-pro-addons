<!-- Start Profile Card 10 -->
<?php use Elementor\Icons_Manager; ?>
<div class="profile-card-style-10 text-center elementor-content-background-color-wrapper" >
    <div class="profile-name elementor-profile-name-wrapper"><?php echo esc_attr($settings['name']); ?></div>
    <div class="profile-position elementor-profile-position-wrapper"><?php echo esc_attr($settings['position']); ?></div>
    <img src="<?php echo esc_url($settings['profile_image']['url']); ?>" style="width: 100px; height: 100px" class="img img-responsive" alt="<?php echo esc_attr($settings['name']); ?>">
    <p class="profile-description elementor-profile-description-wrapper"><?php echo wp_kses_post($settings['profile_description']); ?></p>
    <div class="profile-icons">
        <!-- social icon -->
        <div class="elementor-social-icons-wrapper">
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
<!-- End Profile Card -->