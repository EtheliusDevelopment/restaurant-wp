<?php

if ( ! function_exists( 'nigiri_core_add_highlight_shortcodes' ) ) {
	function nigiri_core_add_highlight_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'NigiriCore\CPT\Shortcodes\Highlight\Highlight'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'nigiri_core_filter_add_vc_shortcode', 'nigiri_core_add_highlight_shortcodes' );
}