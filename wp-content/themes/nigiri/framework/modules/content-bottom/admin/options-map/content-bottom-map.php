<?php

if ( ! function_exists( 'nigiri_elated_content_bottom_options_map' ) ) {
	function nigiri_elated_content_bottom_options_map() {
		
		$panel_content_bottom = nigiri_elated_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__( 'Content Bottom Area Style', 'nigiri' )
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'enable_content_bottom_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'nigiri' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'nigiri' ),
				'parent'        => $panel_content_bottom
			)
		);
		
		$enable_content_bottom_area_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'dependency' => array(
					'show' => array(
						'enable_content_bottom_area'  => 'yes'
					)
				)
			)
		);
		
		$nigiri_custom_sidebars = nigiri_elated_get_custom_sidebars();
		
		nigiri_elated_add_admin_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'content_bottom_sidebar_custom_display',
				'default_value' => '',
				'label'         => esc_html__( 'Widget Area to Display', 'nigiri' ),
				'description'   => esc_html__( 'Choose a Content Bottom widget area to display', 'nigiri' ),
				'options'       => $nigiri_custom_sidebars,
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'content_bottom_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Display in Grid', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'nigiri' ),
				'parent'        => $enable_content_bottom_area_container
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'            => 'select',
				'name'            => 'content_bottom_position',
				'default_value'   => '',
				'label'           => esc_html__( 'Position', 'nigiri' ),
				'description'     => esc_html__( 'Select position for your content bottom area', 'nigiri' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'nigiri' ),
					'left'   => esc_html__( 'Left', 'nigiri' ),
					'right'  => esc_html__( 'Right', 'nigiri' ),
					'center' => esc_html__( 'Center', 'nigiri' )
				),
				'parent'          => $enable_content_bottom_area_container
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'        => 'text',
				'name'        => 'content_bottom_padding',
				'label'       => esc_html__( 'Content Bottom Padding', 'nigiri' ),
				'description' => esc_html__( 'Set padding for content bottom area. Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'nigiri' ),
				'parent'      => $enable_content_bottom_area_container,
				'args'        => array(
					'col_width' => 4
				)
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'content_bottom_background_color',
				'label'       => esc_html__( 'Background Color', 'nigiri' ),
				'description' => esc_html__( 'Choose a background color for Content Bottom area', 'nigiri' ),
				'parent'      => $enable_content_bottom_area_container
			)
		);
	}
	
	add_action( 'nigiri_elated_action_additional_page_options_map', 'nigiri_elated_content_bottom_options_map' );
}