<?php do_action('nigiri_elated_action_before_page_header'); ?>

<aside class="eltdf-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
	<div class="eltdf-vertical-menu-area-inner">
		<div class="eltdf-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			nigiri_elated_get_logo();
		} ?>
		<?php nigiri_elated_get_header_vertical_main_menu(); ?>
		<div class="eltdf-vertical-area-widget-holder">
			<?php nigiri_elated_get_header_vertical_widget_areas(); ?>
		</div>
	</div>
</aside>

<?php do_action('nigiri_elated_action_after_page_header'); ?>