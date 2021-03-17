<?php

if ( ! function_exists( 'nigiri_elated_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function nigiri_elated_register_social_icons_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_social_icons_widget' );
}