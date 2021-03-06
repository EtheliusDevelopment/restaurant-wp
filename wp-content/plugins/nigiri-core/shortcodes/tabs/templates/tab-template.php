<div class="eltdf-tabs <?php echo esc_attr($holder_classes); ?>">
	<ul class="eltdf-tabs-nav clearfix">
		<?php foreach ($tabs_titles as $tab_title) { ?>
			<li>
				<?php if(!empty($tab_title)) { ?>
					<a href="#tab-<?php echo sanitize_title($tab_title)?>"><span><?php echo esc_html($tab_title); ?></span></a>
				<?php } ?>
			</li>
		<?php } ?>
	</ul>
	<?php echo do_shortcode($content); ?>
</div>