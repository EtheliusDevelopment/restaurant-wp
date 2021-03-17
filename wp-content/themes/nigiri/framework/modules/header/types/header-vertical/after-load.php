<?php

if ( ! function_exists( 'nigiri_elated_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function nigiri_elated_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( nigiri_elated_check_is_header_type_enabled( 'header-vertical', nigiri_elated_get_page_id() ) ) {
		add_filter( 'nigiri_elated_filter_allow_sticky_header_behavior', 'nigiri_elated_disable_behaviors_for_header_vertical' );
		add_filter( 'nigiri_elated_filter_allow_content_boxed_layout', 'nigiri_elated_disable_behaviors_for_header_vertical' );
	}
}