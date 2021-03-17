<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Eltdf_Pricing_List_Carousel extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'nigiri_core_add_pricing_list_carousel_shortcode' ) ) {
	function nigiri_core_add_pricing_list_carousel_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'NigiriCore\CPT\Shortcodes\PricingList\PricingListCarousel'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'nigiri_core_filter_add_vc_shortcode', 'nigiri_core_add_pricing_list_carousel_shortcode' );
}

if ( ! function_exists( 'nigiri_core_set_pricing_list_carousel_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for team carousel shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function nigiri_core_set_pricing_list_carousel_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
        $shortcodes_icon_class_array[] = '.icon-wpb-pricing-list-carousel';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'nigiri_core_filter_add_vc_shortcodes_custom_icon_class', 'nigiri_core_set_pricing_list_carousel_icon_class_name_for_vc_shortcodes' );
}