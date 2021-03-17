<?php

if ( ! function_exists( 'nigiri_elated_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function nigiri_elated_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_sidearea_opener_widget' );
}