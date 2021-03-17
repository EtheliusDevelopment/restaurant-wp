<?php

if ( ! function_exists( 'nigiri_elated_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function nigiri_elated_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'nigiri_elated_filter_header_vertical_hide_meta_boxes', $hide_dep_options = array( '' => '' ) );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'nigiri_elated_header_vertical_area_meta_options_map' ) ) {
	function nigiri_elated_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = nigiri_elated_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta' => $hide_dep_options
					)
				)
			)
		);
		
		nigiri_elated_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'nigiri' )
			)
		);
		
		$nigiri_custom_sidebars = nigiri_elated_get_custom_sidebars();
		if ( count( $nigiri_custom_sidebars ) > 0 ) {
			nigiri_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'nigiri' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'nigiri' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $nigiri_custom_sidebars
				)
			);
		}
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'nigiri' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'nigiri' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'nigiri' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'nigiri' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'nigiri' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'nigiri' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'nigiri' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'nigiri' ),
				'description'   => esc_html__( 'Set border on vertical area', 'nigiri' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
		$vertical_header_border_container = nigiri_elated_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'dependency' => array(
					'show' => array(
						'eltdf_vertical_header_border_meta'  => 'yes'
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'nigiri' ),
				'description' => esc_html__( 'Choose color of border', 'nigiri' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'nigiri' ),
				'description'   => esc_html__( 'Set content in vertical center', 'nigiri' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'nigiri_elated_action_additional_header_area_meta_boxes_map', 'nigiri_elated_header_vertical_area_meta_options_map', 10, 1 );
}