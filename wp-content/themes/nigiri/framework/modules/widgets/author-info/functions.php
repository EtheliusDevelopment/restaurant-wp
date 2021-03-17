<?php

if ( ! function_exists( 'nigiri_elated_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function nigiri_elated_register_author_info_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_author_info_widget' );
}