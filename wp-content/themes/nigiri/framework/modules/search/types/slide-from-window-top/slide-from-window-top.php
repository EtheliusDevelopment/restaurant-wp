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
		$classes[] = 'eltdf-search-slides-from-window-top';
		
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
	
	add_action( 'nigiri_elated_action_before_page_header', 'nigiri_elated_get_search' );
}

if ( ! function_exists( 'nigiri_elated_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function nigiri_elated_load_search_template() {
		$search_in_grid    = nigiri_elated_options()->getOptionValue( 'search_in_grid' ) == 'yes' ? true : false;
		
		$parameters = array(
			'search_in_grid'    		=> $search_in_grid,
			'search_submit_icon_class' 	=> nigiri_elated_get_search_submit_icon_class(),
			'search_close_icon_class' 	=> nigiri_elated_get_search_close_icon_class()
		);

        nigiri_elated_get_module_template_part( 'types/slide-from-window-top/templates/slide-from-window-top', 'search', '', $parameters );
	}
}