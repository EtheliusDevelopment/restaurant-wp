<?php

if(!function_exists('nigiri_core_add_circle_carousel_shortcodes')) {
    function nigiri_core_add_circle_carousel_shortcodes($shortcodes_class_name) {
        $shortcodes = array(
            'NigiriCore\CPT\Shortcodes\CircleCarousel\CircleCarousel'
        );

        $shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

        return $shortcodes_class_name;
    }

    add_filter('nigiri_core_filter_add_vc_shortcode', 'nigiri_core_add_circle_carousel_shortcodes');
}

if( !function_exists('nigiri_core_set_circle_carousel_custom_style_for_vc_shortcodes') ) {
	/**
	 * Function that set custom css style for clients carousel shortcode
	 */
	function nigiri_core_set_circle_carousel_custom_style_for_vc_shortcodes($style) {
		$current_style = '.wpb_content_element.wpb_eltdf_circle_carousel_item > .wpb_element_wrapper {
			background-color: #f4f4f4;
		}';
		
		$style = $style . $current_style;
		
		return $style;
	}
	
	add_filter('nigiri_core_filter_add_vc_shortcodes_custom_style', 'nigiri_core_set_circle_carousel_custom_style_for_vc_shortcodes');
}

if( !function_exists('nigiri_core_set_circle_carousel_icon_class_name_for_vc_shortcodes') ) {
    /**
     * Function that set custom icon class name for clients carousel shortcode to set our icon for Visual Composer shortcodes panel
     */
    function nigiri_core_set_circle_carousel_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
        $shortcodes_icon_class_array[] = '.icon-wpb-circle-carousel';


        return $shortcodes_icon_class_array;
    }

    add_filter('nigiri_core_filter_add_vc_shortcodes_custom_icon_class', 'nigiri_core_set_circle_carousel_icon_class_name_for_vc_shortcodes');
}