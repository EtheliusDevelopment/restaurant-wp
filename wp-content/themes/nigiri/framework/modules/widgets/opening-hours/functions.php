<?php

if ( ! function_exists( 'nigiri_elated_register_opening_hours_widget' ) ) {
	/**
	 * Function that register opening hours widget
	 */
	function nigiri_elated_register_opening_hours_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassOpeningHoursWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_opening_hours_widget' );
}