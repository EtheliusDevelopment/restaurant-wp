<?php

if ( ! function_exists( 'nigiri_elated_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function nigiri_elated_register_custom_font_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_custom_font_widget' );
}