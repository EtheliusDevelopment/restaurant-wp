<?php

if ( ! function_exists( 'nigiri_elated_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function nigiri_elated_search_body_class( $classes ) {
		$classes[] = 'eltdf-slide-from-header-bottom';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'nigiri_elated_search_body_class' );
}

if ( ! function_exists( 'nigiri_elated_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function nigiri_elated_get_search() {
		nigiri_elated_load_search_template();
	}
	
	add_action( 'nigiri_elated_action_before_page_header_html_close', 'nigiri_elated_get_search' );
	add_action( 'nigiri_elated_action_before_mobile_header_html_close', 'nigiri_elated_get_search' );
}

if ( ! function_exists( 'nigiri_elated_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function nigiri_elated_load_search_template() {
		$parameters = array(
			'search_submit_icon_class' => nigiri_elated_get_search_submit_icon_class()
		);

        nigiri_elated_get_module_template_part( 'types/slide-from-header-bottom/templates/slide-from-header-bottom', 'search', '', $parameters );
	}
}