<div class="eltdf-circle-carousel" <?php echo nigiri_elated_get_inline_attrs($slider_data, true); ?>>
	<div class="eltdf-circle-carousel-slider">
		<?php foreach ($images as $image) { ?>
			<img src="<?php echo esc_url($image['url'])?>" alt="<?php echo esc_attr($image['title']); ?>" width="<?php echo esc_attr($image['width']); ?>" height="<?php echo esc_attr($image['height']); ?>">
		<?php } ?>
	</div>

	<div class="eltdf-circle-carousel-navigation clearfix">
		<div class="eltdf-prev-icon-holder">
			<?php echo nigiri_elated_icon_collections()->renderIcon( 'ion-ios-arrow-left', 'ion_icons' ); ?>
			<div class="eltdf-nav-text-holder eltdf-prev">
				<span class="eltdf-prev-text"><?php esc_html_e('Prev', 'nigiri-core')?></span>
			</div>
		</div>
        <div class="eltdf-next-icon-holder">
			<?php echo nigiri_elated_icon_collections()->renderIcon( 'ion-ios-arrow-right', 'ion_icons' ); ?>
	        <div class="eltdf-nav-text-holder eltdf-next">
	            <span class="eltdf-next-text"><?php esc_html_e('Next', 'nigiri-core')?></span>
	        </div>
		</div>
	</div>
</div>