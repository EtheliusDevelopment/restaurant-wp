<?php

if ( ! function_exists( 'nigiri_elated_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function nigiri_elated_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_recent_posts_widget' );
}