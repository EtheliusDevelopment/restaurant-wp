<?php

if ( ! function_exists( 'nigiri_elated_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function nigiri_elated_register_social_icon_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_social_icon_widget' );
}