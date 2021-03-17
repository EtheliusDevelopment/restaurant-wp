<?php

if ( ! function_exists( 'nigiri_elated_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function nigiri_elated_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'nigiri_elated_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'nigiri_elated_header_standard_meta_map' ) ) {
	function nigiri_elated_header_standard_meta_map( $parent ) {
		$hide_dep_options = nigiri_elated_get_hide_dep_for_header_standard_meta_boxes();
		
		nigiri_elated_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'nigiri' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'nigiri' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'nigiri' ),
					'left'   => esc_html__( 'Left', 'nigiri' ),
					'right'  => esc_html__( 'Right', 'nigiri' ),
					'center' => esc_html__( 'Center', 'nigiri' )
				),
				'dependency' => array(
					'hide' => array(
						'eltdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_additional_header_area_meta_boxes_map', 'nigiri_elated_header_standard_meta_map' );
}