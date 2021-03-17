<?php

if ( ! function_exists( 'nigiri_elated_map_post_gallery_meta' ) ) {
	
	function nigiri_elated_map_post_gallery_meta() {
		$gallery_post_format_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'nigiri' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		nigiri_elated_add_multiple_images_field(
			array(
				'name'        => 'eltdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'nigiri' ),
				'description' => esc_html__( 'Choose your gallery images', 'nigiri' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_post_gallery_meta', 21 );
}
