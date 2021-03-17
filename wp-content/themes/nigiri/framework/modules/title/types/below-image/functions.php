<?php

if ( ! function_exists( 'nigiri_elated_set_title_below_image_type_for_options' ) ) {
	/**
	 * This function set title below image type value for title options map and meta boxes
	 */
	function nigiri_elated_set_title_below_image_type_for_options( $type ) {
		$type['below-image'] = esc_html__( 'Below Image', 'nigiri' );
		
		return $type;
	}
	
	add_filter( 'nigiri_elated_filter_title_type_global_option', 'nigiri_elated_set_title_below_image_type_for_options' );
	add_filter( 'nigiri_elated_filter_title_type_meta_boxes', 'nigiri_elated_set_title_below_image_type_for_options' );
}