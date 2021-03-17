<?php

if ( ! function_exists( 'nigiri_elated_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function nigiri_elated_register_search_opener_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_search_opener_widget' );
}