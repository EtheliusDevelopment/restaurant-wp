<?php

if ( ! function_exists( 'nigiri_elated_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function nigiri_elated_register_blog_list_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_blog_list_widget' );
}