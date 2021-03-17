<div class="eltdf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo nigiri_elated_get_inline_style($holder_styles); ?>>
	<?php if (!empty($section_title_image)) { ?>
		<div class="eltdf-section-title-image">
			<img src="<?php echo esc_url( $section_title_image) ?>" alt="<?php esc_attr_e('Section Title Image', 'nigiri-core'); ?>">
		</div>
	<?php } ?>
	<div class="eltdf-st-inner">
		<?php if(!empty($subtitle)) { ?>
			<<?php echo esc_attr($subtitle_tag); ?> class="eltdf-st-subtitle" <?php echo nigiri_elated_get_inline_style($subtitle_styles); ?>>
				<?php echo wp_kses($subtitle, array('br' => true)); ?>
			</<?php echo esc_attr($subtitle_tag); ?>>
		<?php } ?>
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="eltdf-st-title" <?php echo nigiri_elated_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
		<?php if (!empty($signature_image)) { ?>
			<div class="eltdf-signature-image">
				<img src="<?php echo esc_url( $signature_image) ?>" alt="<?php esc_attr_e('Signature Image', 'nigiri-core'); ?>">
			</div>
		<?php } ?>
		<?php if(!empty($text)) { ?>
			<<?php echo esc_attr($text_tag); ?> class="eltdf-st-text" <?php echo nigiri_elated_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true)); ?>
			</<?php echo esc_attr($text_tag); ?>>
		<?php } ?>
		<?php if($enable_button === 'yes') {
            
            echo nigiri_elated_get_button_html(array(
                'link'                   => $custom_link ,
                'target'				 => $custom_link_target,
                'text'                   => $button_text,
                'type'                   => 'outline',
                'animation'              => 'yes',
                'custom_class'           => 'eltdf-section-title-button'
            ));

         } ?>
	</div>
</div>