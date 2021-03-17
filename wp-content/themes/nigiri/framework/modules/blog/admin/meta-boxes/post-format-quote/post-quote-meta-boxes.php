<?php

if ( ! function_exists( 'nigiri_elated_map_post_quote_meta' ) ) {
	function nigiri_elated_map_post_quote_meta() {
		$quote_post_format_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'nigiri' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'nigiri' ),
				'description' => esc_html__( 'Enter Quote text', 'nigiri' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'nigiri' ),
				'description' => esc_html__( 'Enter Quote author', 'nigiri' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_post_quote_meta', 25 );
}