<?php if($image_position === 'top') { ?>
<div class="eltdf-vertical-image-info-holder <?php echo esc_attr($holder_classes); ?>">
	<?php if ( ! empty( $image ) ) { ?>
		<div class="eltdf-vii-image" <?php echo nigiri_elated_get_inline_style( $image_styles ); ?> <?php echo nigiri_elated_get_inline_attrs($this_object->getParallaxData($params)); ?>>
			<?php if ( is_array( $image_size ) && count( $image_size ) ) : ?>
				<?php echo nigiri_elated_generate_thumbnail( $image, null, $image_size[0], $image_size[1] ); ?>
			<?php else: ?>
				<?php echo wp_get_attachment_image( $image, $image_size ); ?>
			<?php endif; ?>
		</div>
	<?php } ?>
    <div class="eltdf-vii-text-holder">
	    <?php if ( ! empty( $title_image ) ) { ?>
		    <div class="eltdf-vii-title-image">
			    <?php echo wp_get_attachment_image($title_image, 'full'); ?>
		    </div>
	    <?php } ?>
        <?php if(!empty($title)) { ?>
            <<?php echo esc_attr($title_tag); ?> class="eltdf-vii-title" <?php echo nigiri_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        <?php } ?>
		<?php if(!empty($text)) { ?>
            <p class="eltdf-vii-text" <?php echo nigiri_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
    </div>
</div>
<?php } else { ?>
<div class="eltdf-vertical-image-info-holder eltdf-vertical-image-bottom <?php echo esc_attr($holder_classes); ?>">
    <div class="eltdf-vii-text-holder">
	    <?php if ( ! empty( $title_image ) ) { ?>
		    <div class="eltdf-vii-title-image">
			    <?php echo wp_get_attachment_image($title_image, 'full'); ?>
		    </div>
	    <?php } ?>
        <?php if(!empty($title)) { ?>
            <<?php echo esc_attr($title_tag); ?> class="eltdf-vii-title" <?php echo nigiri_elated_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
        <?php } ?>
        <?php if(!empty($text)) { ?>
            <p class="eltdf-vii-text" <?php echo nigiri_elated_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
    </div>
	<?php if ( ! empty( $image ) ) { ?>
		<div class="eltdf-vii-image" <?php echo nigiri_elated_get_inline_style( $image_styles ); ?> <?php echo nigiri_elated_get_inline_attrs($this_object->getParallaxData($params)); ?>>
			<?php if ( is_array( $image_size ) && count( $image_size ) ) : ?>
				<?php echo nigiri_elated_generate_thumbnail( $image, null, $image_size[0], $image_size[1] ); ?>
			<?php else: ?>
				<?php echo wp_get_attachment_image( $image, $image_size ); ?>
			<?php endif; ?>
		</div>
	<?php } ?>
</div>
<?php } ?>