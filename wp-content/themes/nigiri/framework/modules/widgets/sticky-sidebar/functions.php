<?php

if ( ! function_exists( 'nigiri_elated_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function nigiri_elated_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_sticky_sidebar_widget' );
}