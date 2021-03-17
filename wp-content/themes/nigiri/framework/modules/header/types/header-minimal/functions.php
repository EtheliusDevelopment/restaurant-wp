<?php

if ( ! function_exists( 'nigiri_elated_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function nigiri_elated_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'NigiriElatedNamespace\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'nigiri_elated_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function nigiri_elated_init_register_header_minimal_type() {
		add_filter( 'nigiri_elated_filter_register_header_type_class', 'nigiri_elated_register_header_minimal_type' );
	}
	
	add_action( 'nigiri_elated_action_before_header_function_init', 'nigiri_elated_init_register_header_minimal_type' );
}

if ( ! function_exists( 'nigiri_elated_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function nigiri_elated_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'nigiri' );
		
		return $menus;
	}
	
	if ( nigiri_elated_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'nigiri_elated_filter_register_headers_menu', 'nigiri_elated_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'nigiri_elated_get_fullscreen_menu_icon_class' ) ) {
	/**
	 * Loads full screen menu icon class
	 */
	function nigiri_elated_get_fullscreen_menu_icon_class() {
		$classes = array(
			'eltdf-fullscreen-menu-opener'
		);
		
		$classes[] = nigiri_elated_get_icon_sources_class( 'fullscreen_menu', 'eltdf-fullscreen-menu-opener' );
		
		return $classes;
	}
}

if ( ! function_exists( 'nigiri_elated_register_header_minimal_full_screen_menu_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function nigiri_elated_register_header_minimal_full_screen_menu_widgets() {
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_above',
				'name'          => esc_html__( 'Fullscreen Menu Top', 'nigiri' ),
				'description'   => esc_html__( 'This widget area is rendered above full screen menu', 'nigiri' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-above-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="eltdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'fullscreen_menu_below',
				'name'          => esc_html__( 'Fullscreen Menu Bottom', 'nigiri' ),
				'description'   => esc_html__( 'This widget area is rendered below full screen menu', 'nigiri' ),
				'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-below-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="eltdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( nigiri_elated_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_action( 'widgets_init', 'nigiri_elated_register_header_minimal_full_screen_menu_widgets' );
	}
}