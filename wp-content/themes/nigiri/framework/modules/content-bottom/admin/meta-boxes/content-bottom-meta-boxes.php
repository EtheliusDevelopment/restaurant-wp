<?php

if ( ! function_exists( 'nigiri_elated_map_content_bottom_meta' ) ) {
	function nigiri_elated_map_content_bottom_meta() {
		
		$content_bottom_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'nigiri_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'nigiri' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'nigiri' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'nigiri' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'eltdf_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'eltdf_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'nigiri' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'nigiri' ),
				'options'       => nigiri_elated_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'nigiri' ),
				'options'       => nigiri_elated_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);

		nigiri_elated_create_meta_box_field(
			array(
				'type'            => 'select',
				'name'            => 'eltdf_content_bottom_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Position', 'nigiri' ),
				'description'     => esc_html__( 'Select position for your content bottom area', 'nigiri' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'nigiri' ),
					'left'   => esc_html__( 'Left', 'nigiri' ),
					'right'  => esc_html__( 'Right', 'nigiri' ),
					'center' => esc_html__( 'Center', 'nigiri' )
				),
				'parent'          => $show_content_bottom_meta_container
			)
		);

		nigiri_elated_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'eltdf_content_bottom_padding_meta',
				'label'       => esc_html__( 'Content Bottom Padding', 'nigiri' ),
				'description' => esc_html__( 'Set padding for content bottom area. Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'nigiri' ),
				'parent'      => $show_content_bottom_meta_container,
				'args'        => array(
					'col_width' => 4
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'eltdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'nigiri' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'nigiri' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_content_bottom_meta', 71 );
}