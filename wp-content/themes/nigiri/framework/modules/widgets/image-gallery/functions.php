<?php

if ( ! function_exists( 'nigiri_elated_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function nigiri_elated_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_image_gallery_widget' );
}