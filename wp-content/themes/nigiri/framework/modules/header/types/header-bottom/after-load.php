<?php

if ( ! function_exists( 'nigiri_elated_disable_behaviors_for_header_bottom' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function nigiri_elated_disable_behaviors_for_header_bottom( $allow_behavior ) {
		return false;
	}
	
	if ( nigiri_elated_check_is_header_type_enabled( 'header-bottom', nigiri_elated_get_page_id() ) ) {
		add_filter( 'nigiri_elated_filter_allow_sticky_header_behavior', 'nigiri_elated_disable_behaviors_for_header_bottom' );
		add_filter( 'nigiri_elated_filter_allow_content_boxed_layout', 'nigiri_elated_disable_behaviors_for_header_bottom' );

        remove_action('nigiri_elated_action_after_wrapper_inner', 'nigiri_elated_get_header');
        add_action('nigiri_elated_action_before_main_content', 'nigiri_elated_get_header');
	}
}