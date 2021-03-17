<?php

if ( ! function_exists( 'nigiri_elated_get_hide_dep_for_header_logo_area_meta_boxes' ) ) {
	function nigiri_elated_get_hide_dep_for_header_logo_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'nigiri_elated_filter_header_logo_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'nigiri_elated_get_hide_dep_for_header_logo_area_widgets_meta_boxes' ) ) {
	function nigiri_elated_get_hide_dep_for_header_logo_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'nigiri_elated_filter_header_logo_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'nigiri_elated_header_logo_area_meta_options_map' ) ) {
	function nigiri_elated_header_logo_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = nigiri_elated_get_hide_dep_for_header_logo_area_meta_boxes();
		$hide_dep_widgets = nigiri_elated_get_hide_dep_for_header_logo_area_widgets_meta_boxes();
		
		$logo_area_container = nigiri_elated_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		nigiri_elated_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_area_style',
				'title'  => esc_html__( 'Logo Area Style', 'nigiri' )
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_header_widget_logo_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Logo Area Widget', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the logo area', 'nigiri' ),
				'parent'        => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$nigiri_custom_sidebars = nigiri_elated_get_custom_sidebars();
		if ( count( $nigiri_custom_sidebars ) > 0 ) {
			nigiri_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_logo_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Logo Area', 'nigiri' ),
					'description' => esc_html__( 'Choose custom widget area to display in header logo area"', 'nigiri' ),
					'parent'      => $logo_area_container,
					'options'     => $nigiri_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'eltdf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_logo_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area In Grid', 'nigiri' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'nigiri' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_container = nigiri_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'eltdf_logo_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'nigiri' ),
				'description' => esc_html__( 'Set grid background color for logo area', 'nigiri' ),
				'parent'      => $logo_area_in_grid_container
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'nigiri' ),
				'description' => esc_html__( 'Set grid background transparency for logo area (0 = fully transparent, 1 = opaque)', 'nigiri' ),
				'parent'      => $logo_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_logo_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'nigiri' ),
				'description'   => esc_html__( 'Set border on grid logo area', 'nigiri' ),
				'parent'        => $logo_area_in_grid_container,
				'default_value' => '',
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
		$logo_area_in_grid_border_container = nigiri_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_in_grid_border_container',
				'parent'          => $logo_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'eltdf_logo_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'nigiri' ),
				'description' => esc_html__( 'Set border color for grid area', 'nigiri' ),
				'parent'      => $logo_area_in_grid_border_container
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'nigiri' ),
				'description' => esc_html__( 'Choose a background color for logo area', 'nigiri' ),
				'parent'      => $logo_area_container
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'nigiri' ),
				'description' => esc_html__( 'Choose a transparency for the logo area background color (0 = fully transparent, 1 = opaque)', 'nigiri' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_logo_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Logo Area Border', 'nigiri' ),
				'description'   => esc_html__( 'Set border on logo area', 'nigiri' ),
				'parent'        => $logo_area_container,
				'default_value' => '',
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
		$logo_area_border_bottom_color_container = nigiri_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'logo_area_border_bottom_color_container',
				'parent'          => $logo_area_container,
				'dependency' => array(
					'show' => array(
						'eltdf_logo_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'nigiri' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'nigiri' ),
				'parent'      => $logo_area_border_bottom_color_container
			)
		);

		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_area_height_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Height', 'nigiri' ),
				'description' => esc_html__( 'Enter logo area height (default is 90px)', 'nigiri' ),
				'parent'      => $logo_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px', 'nigiri' )
				)
			)
		);
		
		do_action( 'nigiri_elated_action_header_logo_area_additional_meta_boxes_map', $logo_area_container );
	}
	
	add_action( 'nigiri_elated_action_header_logo_area_meta_boxes_map', 'nigiri_elated_header_logo_area_meta_options_map', 10, 1 );
}