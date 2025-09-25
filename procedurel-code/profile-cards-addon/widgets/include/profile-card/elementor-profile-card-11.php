<!-- Start Profile Card 11 -->
<?php use Elementor\Icons_Manager; ?>
<div class="profile-card-style-11" style="background-image: url(<?php echo esc_url($settings['profile_image']['url']); ?>);" alt="<?php echo esc_attr($settings['name']); ?>">
    <div class="triangle-div">
    </div>
    <div class="title">
        <div class="name"><?php echo esc_attr($settings['name']); ?></div>
        <div class="position"><?php echo esc_attr($settings['position']); ?></div>
        <div class="description"><?php echo wp_kses_post($settings['profile_description']); ?></div>
    </div>

    <?php
    if ($settings['display_social_icon'] == 'yes') {

        echo '<div class="elementor-social-icons-wrapper team-member__socialmedia">';
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
        echo '</div>';
    } else {
        ?> 
        <div class="elementor-social-icons-wrapper" style="display:none;">                        
        </div> 
        <?php
    }
    ?>

</div>