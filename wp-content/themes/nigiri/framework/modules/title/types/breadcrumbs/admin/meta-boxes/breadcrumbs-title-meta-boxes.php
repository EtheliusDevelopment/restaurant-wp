<?php

if ( ! function_exists( 'nigiri_elated_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function nigiri_elated_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'nigiri' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'nigiri' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'nigiri_elated_action_additional_title_area_meta_boxes', 'nigiri_elated_breadcrumbs_title_type_options_meta_boxes' );
}