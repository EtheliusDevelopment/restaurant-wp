<?php


if(!function_exists('nigiri_elated_restaurant_map_map')) {
	/**
	 * Adds admin page for OpenTable integration
	 */
	function nigiri_elated_restaurant_map_map() {
		nigiri_elated_add_admin_page(array(
			'title' => esc_html__('Reservation', 'nigiri'),
			'slug'  => '_restaurant',
			'icon'  => 'fa fa-cutlery'
		));

		//#OpenTable Panel
		$panel_open_table = nigiri_elated_add_admin_panel(array(
			'page'  => '_restaurant',
			'name'  => 'panel_open_table',
			'title' => esc_html__('OpenTable', 'nigiri')
		));

		nigiri_elated_add_admin_field(array(
			'name'        => 'open_table_id',
			'type'        => 'text',
			'label'       => esc_html__('OpenTable ID', 'nigiri'),
			'description' => esc_html__('Add your restaurant\'s OpenTable ID', 'nigiri'),
			'parent'      => $panel_open_table,
			'args'        => array(
				'col_width' => 3
			)
		));
	}

	add_action('nigiri_elated_action_options_map', 'nigiri_elated_restaurant_map_map', 22);
}