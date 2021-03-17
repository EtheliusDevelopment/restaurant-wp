<?php

if ( ! function_exists( 'nigiri_elated_map_post_link_meta' ) ) {
	function nigiri_elated_map_post_link_meta() {
		$link_post_format_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'nigiri' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'nigiri' ),
				'description' => esc_html__( 'Enter link', 'nigiri' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_post_link_meta', 24 );
}