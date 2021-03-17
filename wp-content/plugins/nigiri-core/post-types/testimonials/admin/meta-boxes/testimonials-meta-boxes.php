<?php

if ( ! function_exists( 'nigiri_core_map_testimonials_meta' ) ) {
	function nigiri_core_map_testimonials_meta() {
		$testimonial_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'nigiri-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'nigiri-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'nigiri-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'nigiri-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'nigiri-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'nigiri-core' ),
				'description' => esc_html__( 'Enter author name', 'nigiri-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);

		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_signature_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Signature Image', 'nigiri-core' ),
				'description' => esc_html__( 'Upload an image which will be testimonial signature', 'nigiri-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'nigiri-core' ),
				'description' => esc_html__( 'Enter author job position', 'nigiri-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_core_map_testimonials_meta', 95 );
}