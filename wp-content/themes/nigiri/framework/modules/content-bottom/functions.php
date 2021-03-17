<?php

if ( ! function_exists( 'nigiri_elated_get_content_bottom_area' ) ) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function nigiri_elated_get_content_bottom_area() {
		$parameters = array();
		
		//Current page id
		$id = nigiri_elated_get_page_id();
		
		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = nigiri_elated_get_meta_field_intersect( 'enable_content_bottom_area', $id );
		
		if ( $parameters['content_bottom_area'] === 'yes' ) {
			
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = nigiri_elated_get_meta_field_intersect( 'content_bottom_sidebar_custom_display', $id );
			//Content bottom area in grid
			$parameters['grid_class'] = ( nigiri_elated_get_meta_field_intersect( 'content_bottom_in_grid', $id ) ) === 'yes' ? 'eltdf-grid' : 'eltdf-full-width';
			
			$parameters['content_bottom_style'] = array();

			//Content bottom area position
			$content_bottom_position = nigiri_elated_get_meta_field_intersect( 'content_bottom_position', $id );
			if ( $content_bottom_position !== '' ) {
				$parameters['content_bottom_style'][] = 'text-align: ' . $content_bottom_position;
			}

			//Content bottom area padding
			$content_bottom_padding = nigiri_elated_get_meta_field_intersect( 'content_bottom_padding', $id );
			if ( $content_bottom_padding !== '' ) {
				$parameters['content_bottom_style'][] = 'padding: ' . $content_bottom_padding;
			}

			//Content bottom area background color
			$background_color = nigiri_elated_get_meta_field_intersect( 'content_bottom_background_color', $id );
			if ( $background_color !== '' ) {
				$parameters['content_bottom_style'][] = 'background-color: ' . $background_color;
			}
			
			if ( is_active_sidebar( $parameters['content_bottom_area_sidebar'] ) ) {
				nigiri_elated_get_module_template_part( 'templates/content-bottom-area', 'content-bottom', '', $parameters );
			}
		}
	}
	
	add_action( 'nigiri_elated_action_before_footer_content', 'nigiri_elated_get_content_bottom_area' );
}