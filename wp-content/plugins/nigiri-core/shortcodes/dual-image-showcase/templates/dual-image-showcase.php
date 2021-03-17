<div class="eltdf-dual-image-showcase-holder <?php echo esc_attr($holder_classes); ?>" >
    <?php if( $images_position === 'right') { ?>
        <div class="eltdf-dis-text-holder">
            <?php if(!empty($subtitle)) { ?>
                <<?php echo esc_attr($subtitle_tag); ?> class="eltdf-dis-subtitle" <?php echo nigiri_elated_get_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
            <?php } ?>
            <?php if(!empty($title)) { ?>
                <<?php echo esc_attr($title_tag); ?> class="eltdf-dis-title" <?php echo nigiri_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            <?php } ?>
    		<?php if(!empty($text)) { ?>
                <p class="eltdf-dis-text" <?php echo nigiri_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
            <?php } ?>
             <?php if($enable_button === 'yes') { 
                    
                echo nigiri_elated_get_button_html(array(
                    'link'                   => $custom_link,
                    'target'                 => $custom_link_target,
                    'text'                   => $button_text,
                    'type'                   => 'outline',
                    'animation'              => 'yes',
                    'custom_class'           => 'eltdf-dual-image-showcase-button'
                )); 

             } ?>
        </div>
        <div class="eltdf-dis-inner-holder">
	        <?php if ( ! empty( $image_background ) ) { ?>
		        <div class="eltdf-background-image-holder" <?php echo nigiri_elated_get_inline_attrs( $holder_data_bckg ); ?>>
			        <?php echo wp_get_attachment_image( $image_background, 'full' ); ?>
		        </div>
	        <?php } ?>
	        <?php if ( ! empty( $image_foreground ) ) { ?>
		        <div class="eltdf-foreground-image-holder" <?php echo nigiri_elated_get_inline_attrs( $holder_data_frg ); ?>>
			        <?php echo wp_get_attachment_image( $image_foreground, 'full' ); ?>
		        </div>
	        <?php } ?>
        </div>
    <?php } else { ?>
        <div class="eltdf-dis-inner-holder">
	        <?php if ( ! empty( $image_background ) ) { ?>
		        <div class="eltdf-background-image-holder" <?php echo nigiri_elated_get_inline_attrs( $holder_data_bckg ); ?>>
			        <?php echo wp_get_attachment_image( $image_background, 'full' ); ?>
		        </div>
	        <?php } ?>
	        <?php if ( ! empty( $image_foreground ) ) { ?>
		        <div class="eltdf-foreground-image-holder" <?php echo nigiri_elated_get_inline_attrs( $holder_data_frg ); ?>>
			        <?php echo wp_get_attachment_image( $image_foreground, 'full' ); ?>
		        </div>
	        <?php } ?>
        </div>
        <div class="eltdf-dis-text-holder">
            <?php if(!empty($subtitle)) { ?>
                <<?php echo esc_attr($subtitle_tag); ?> class="eltdf-dis-subtitle" <?php echo nigiri_elated_get_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
            <?php } ?>
            <?php if(!empty($title)) { ?>
                <<?php echo esc_attr($title_tag); ?> class="eltdf-dis-title" <?php echo nigiri_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            <?php } ?>
            <?php if(!empty($text)) { ?>
                <p class="eltdf-dis-text" <?php echo nigiri_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
            <?php } ?>
             <?php if($enable_button === 'yes') { 
                    
                echo nigiri_elated_get_button_html(array(
                    'link'                   => $custom_link,
                    'target'                 => $custom_link_target,
                    'text'                   => $button_text,
                    'type'                   => 'outline',
                    'animation'              => 'yes',
                    'custom_class'           => 'eltdf-dual-image-showcase-button'
                )); 

             } ?>
        </div>
    <?php } ?>
</div>