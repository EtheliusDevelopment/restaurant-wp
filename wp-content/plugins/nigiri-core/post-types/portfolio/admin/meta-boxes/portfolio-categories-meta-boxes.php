<?php

if ( ! function_exists( 'nigiri_elated_portfolio_category_additional_fields' ) ) {
	function nigiri_elated_portfolio_category_additional_fields() {
		
		$fields = nigiri_elated_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		nigiri_elated_add_taxonomy_field(
			array(
				'name'   => 'eltdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'nigiri-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'nigiri_elated_action_custom_taxonomy_fields', 'nigiri_elated_portfolio_category_additional_fields' );
}