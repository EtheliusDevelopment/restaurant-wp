<?php

if ( ! function_exists( 'nigiri_elated_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function nigiri_elated_register_separator_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_separator_widget' );
}