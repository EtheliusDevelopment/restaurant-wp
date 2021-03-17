<?php

if ( ! function_exists( 'nigiri_elated_map_woocommerce_meta' ) ) {
	function nigiri_elated_map_woocommerce_meta() {
		
		$woocommerce_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'nigiri' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'nigiri' ),
				'description' => esc_html__( 'Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'nigiri' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'nigiri' ),
					'small'              => esc_html__( 'Small', 'nigiri' ),
					'large-width'        => esc_html__( 'Large Width', 'nigiri' ),
					'large-height'       => esc_html__( 'Large Height', 'nigiri' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'nigiri' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'nigiri' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'nigiri' ),
				'options'       => nigiri_elated_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'nigiri' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_woocommerce_meta', 99 );
}