<?php

if ( ! function_exists( 'nigiri_elated_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function nigiri_elated_register_icon_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_icon_widget' );
}