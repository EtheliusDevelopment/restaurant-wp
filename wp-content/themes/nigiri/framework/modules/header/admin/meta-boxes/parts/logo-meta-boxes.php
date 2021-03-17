<?php

if ( ! function_exists( 'nigiri_elated_logo_meta_box_map' ) ) {
	function nigiri_elated_logo_meta_box_map() {
		
		$logo_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'nigiri_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'nigiri' ),
				'name'  => 'logo_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'nigiri' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'nigiri' ),
				'parent'      => $logo_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'nigiri' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'nigiri' ),
				'parent'      => $logo_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'nigiri' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'nigiri' ),
				'parent'      => $logo_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'nigiri' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'nigiri' ),
				'parent'      => $logo_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'nigiri' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'nigiri' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_logo_meta_box_map', 47 );
}