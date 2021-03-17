<?php

if ( ! function_exists( 'nigiri_elated_centered_title_type_options_meta_boxes' ) ) {
	function nigiri_elated_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'nigiri' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'nigiri' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_additional_title_area_meta_boxes', 'nigiri_elated_centered_title_type_options_meta_boxes', 5 );
}