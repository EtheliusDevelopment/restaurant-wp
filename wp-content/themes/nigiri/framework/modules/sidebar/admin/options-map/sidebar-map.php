<?php

if ( ! function_exists( 'nigiri_elated_sidebar_options_map' ) ) {
	function nigiri_elated_sidebar_options_map() {
		
		nigiri_elated_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'nigiri' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = nigiri_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'nigiri' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		nigiri_elated_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'nigiri' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'nigiri' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => nigiri_elated_get_custom_sidebars_options()
		) );
		
		$nigiri_custom_sidebars = nigiri_elated_get_custom_sidebars();
		if ( count( $nigiri_custom_sidebars ) > 0 ) {
			nigiri_elated_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'nigiri' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'nigiri' ),
				'parent'      => $sidebar_panel,
				'options'     => $nigiri_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'nigiri_elated_action_options_map', 'nigiri_elated_sidebar_options_map', nigiri_elated_set_options_map_position( 'sidebar' ) );
}