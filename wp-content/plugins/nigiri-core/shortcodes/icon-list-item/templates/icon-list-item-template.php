<?php $icon_html = nigiri_elated_icon_collections()->renderIcon($icon, $icon_pack, $params); ?>
<div class="eltdf-icon-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo nigiri_elated_get_inline_style($holder_styles); ?>>
	<?php if(!empty($link)) : ?>
		<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
	<?php endif; ?>
	<div class="eltdf-il-icon-holder">
		<?php echo wp_kses_post($icon_html); ?>
	</div>
	<p class="eltdf-il-text" <?php echo nigiri_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></p>
	<?php if(!empty($link)) : ?>
		</a>
	<?php endif; ?>
</div>