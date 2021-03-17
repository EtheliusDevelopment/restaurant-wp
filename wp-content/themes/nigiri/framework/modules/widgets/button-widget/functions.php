<?php

if ( ! function_exists( 'nigiri_elated_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function nigiri_elated_register_button_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_button_widget' );
}