<div class="eltdf-info-box-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="eltdf-ib-image">
        <?php echo wp_get_attachment_image($image['image_id'], 'full'); ?>
    </div>
    <div class="eltdf-ib-text-holder">
        <?php if(!empty($subtitle)) { ?>
            <<?php echo esc_attr($subtitle_tag); ?> class="eltdf-ib-subtitle" <?php echo nigiri_elated_get_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
        <?php } ?>
        <?php if(!empty($title)) { ?>
            <<?php echo esc_attr($title_tag); ?> class="eltdf-ib-title" <?php echo nigiri_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        <?php } ?>
    </div>
    <div class="eltdf-ib-signature-image">
        <?php echo wp_get_attachment_image($signature_image['image_id'], 'full'); ?>
    </div>
    <?php if ( $enable_button === 'yes') {  ?>
    <?php  
        echo nigiri_elated_get_button_html(array(
            'link'            => $custom_link ,
            'target'          => $custom_link_target,
            'text'            => $button_text,
            'type'            => 'outline',
            'animation'       => 'yes',
            'custom_class'    => 'eltdf-ib-button'
        )); 
    ?>
    <?php } ?>
</div>