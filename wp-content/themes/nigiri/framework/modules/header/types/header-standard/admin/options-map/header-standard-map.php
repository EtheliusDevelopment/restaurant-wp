<?php

if ( ! function_exists( 'nigiri_elated_get_hide_dep_for_header_standard_options' ) ) {
	function nigiri_elated_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'nigiri_elated_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'nigiri_elated_header_standard_map' ) ) {
	function nigiri_elated_header_standard_map( $parent ) {
		$hide_dep_options = nigiri_elated_get_hide_dep_for_header_standard_options();
		
		nigiri_elated_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'nigiri' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'nigiri' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'nigiri' ),
					'left'   => esc_html__( 'Left', 'nigiri' ),
					'center' => esc_html__( 'Center', 'nigiri' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_additional_header_menu_area_options_map', 'nigiri_elated_header_standard_map' );
}