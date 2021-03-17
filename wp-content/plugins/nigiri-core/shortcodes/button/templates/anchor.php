<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php nigiri_elated_inline_style($button_styles); ?> <?php nigiri_elated_class_attribute($button_classes); ?> <?php echo nigiri_elated_get_inline_attrs($button_data); ?> <?php echo nigiri_elated_get_inline_attrs($button_custom_attrs); ?>>
    <span class="eltdf-btn-text"><?php echo esc_html($text); ?><?php if ($type === 'simple') { ?><i class="eltdf-btn-text-sufix fa fa-angle-right"></i><?php } ?></span>
    <?php echo nigiri_elated_icon_collections()->renderIcon($icon, $icon_pack); ?>
</a>