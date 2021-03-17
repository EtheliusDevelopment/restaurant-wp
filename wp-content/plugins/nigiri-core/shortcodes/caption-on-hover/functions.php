<?php

if ( ! function_exists( 'nigiri_core_add_caption_on_hover_shortcodes' ) ) {
	function nigiri_core_add_caption_on_hover_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'NigiriCore\CPT\Shortcodes\CaptionOnHover\CaptionOnHover'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'nigiri_core_filter_add_vc_shortcode', 'nigiri_core_add_caption_on_hover_shortcodes' );
}

if ( ! function_exists( 'nigiri_core_set_caption_on_hover_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for caption on hover shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function nigiri_core_set_caption_on_hover_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-caption-on-hover';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'nigiri_core_filter_add_vc_shortcodes_custom_icon_class', 'nigiri_core_set_caption_on_hover_icon_class_name_for_vc_shortcodes' );
}