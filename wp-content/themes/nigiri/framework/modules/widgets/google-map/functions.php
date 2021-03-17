<?php

if ( ! function_exists( 'nigiri_elated_register_google_map_widget' ) ) {
	/**
	 * Function that register opening hours widget
	 */
	function nigiri_elated_register_google_map_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassGoogleMapWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_google_map_widget' );
}