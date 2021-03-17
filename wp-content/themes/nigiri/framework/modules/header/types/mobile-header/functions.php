<?php

if ( ! function_exists( 'nigiri_elated_include_mobile_header_menu' ) ) {
	function nigiri_elated_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'nigiri' );
		
		return $menus;
	}
	
	add_filter( 'nigiri_elated_filter_register_headers_menu', 'nigiri_elated_include_mobile_header_menu' );
}

if ( ! function_exists( 'nigiri_elated_mobile_header_class' ) ) {
	function nigiri_elated_mobile_header_class( $classes ) {
		$classes[] = 'eltdf-default-mobile-header';
		
		$classes[] = 'eltdf-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'nigiri_elated_mobile_header_class' );
}

if ( ! function_exists( 'nigiri_elated_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function nigiri_elated_get_mobile_header( $slug = '', $module = '' ) {
		if ( nigiri_elated_is_responsive_on() ) {
			$mobile_menu_title = nigiri_elated_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' ) ? true : false;
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title,
				'mobile_icon_class'		 => nigiri_elated_get_mobile_navigation_icon_class()
			);

            $module = apply_filters('nigiri_elated_filter_mobile_menu_module', 'header/types/mobile-header');
            $slug = apply_filters('nigiri_elated_filter_mobile_menu_slug', '');
            $parameters = apply_filters('nigiri_elated_filter_mobile_menu_parameters', $parameters);

            nigiri_elated_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'nigiri_elated_action_after_wrapper_inner', 'nigiri_elated_get_mobile_header', 20 );
}

if ( ! function_exists( 'nigiri_elated_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function nigiri_elated_get_mobile_logo() {
		$show_logo_image = nigiri_elated_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$mobile_logo_image = nigiri_elated_get_meta_field_intersect( 'logo_image_mobile', nigiri_elated_get_page_id() );
			$header_height     = nigiri_elated_set_default_mobile_menu_height_for_header_types();
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : nigiri_elated_get_meta_field_intersect( 'logo_image', nigiri_elated_get_page_id() );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = nigiri_elated_get_image_dimensions( $logo_image );
			
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			}else if ( ! empty( $header_height ) && empty( $logo_dimensions ) ) {
				$logo_styles = 'height: ' . intval( $header_height / 2 ) . 'px;'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_styles'     => $logo_styles
			);
			
			nigiri_elated_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'nigiri_elated_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function nigiri_elated_get_mobile_nav() {
		nigiri_elated_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}

if ( ! function_exists( 'nigiri_elated_mobile_header_per_page_js_var' ) ) {
    function nigiri_elated_mobile_header_per_page_js_var( $perPageVars ) {
        $perPageVars['eltdfMobileHeaderHeight'] = nigiri_elated_set_default_mobile_menu_height_for_header_types();

        return $perPageVars;
    }

    add_filter( 'nigiri_elated_filter_per_page_js_vars', 'nigiri_elated_mobile_header_per_page_js_var' );
}

if ( ! function_exists( 'nigiri_elated_get_mobile_navigation_icon_class' ) ) {
	/**
	 * Loads mobile navigation icon class
	 */
	function nigiri_elated_get_mobile_navigation_icon_class() {
		$classes = array(
			'eltdf-mobile-menu-opener'
		);
		
		$classes[] = nigiri_elated_get_icon_sources_class( 'mobile', 'eltdf-mobile-menu-opener' );

		return $classes;
	}
}