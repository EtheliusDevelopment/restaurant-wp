<?php


if ( ! function_exists( 'nigiri_core_add_opening_hours' ) ) {
	function nigiri_core_add_opening_hours( $shortcodes_class_name ) {
		$shortcodes = array(
			'NigiriCore\CPT\Shortcodes\OpeningHours\OpeningHours'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'nigiri_core_filter_add_vc_shortcode', 'nigiri_core_add_opening_hours' );
}

if ( ! function_exists( 'nigiri_core_set_opening_hours_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for opening hours shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function nigiri_core_set_opening_hours_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-opening-hours';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'nigiri_core_filter_add_vc_shortcodes_custom_icon_class', 'nigiri_core_set_opening_hours_icon_class_name_for_vc_shortcodes' );
}