<?php

if ( ! function_exists( 'nigiri_elated_register_header_bottom_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function nigiri_elated_register_header_bottom_type( $header_types ) {
		$header_type = array(
			'header-bottom' => 'NigiriElatedNamespace\Modules\Header\Types\HeaderBottom'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'nigiri_elated_init_register_header_bottom_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function nigiri_elated_init_register_header_bottom_type() {
		add_filter( 'nigiri_elated_filter_register_header_type_class', 'nigiri_elated_register_header_bottom_type' );
	}
	
	add_action( 'nigiri_elated_action_before_header_function_init', 'nigiri_elated_init_register_header_bottom_type' );
}

if ( ! function_exists( 'nigiri_elated_include_header_bottom_menu' ) ) {
    /**
     * Registers additional menu navigation for theme
     */
    function nigiri_elated_include_header_bottom_menu( $menus ) {
        if ( ! array_key_exists( 'header-bottom-navigation', $menus ) ) {
            $menus['header-bottom-navigation'] = esc_html__( 'Header Bottom Navigation', 'nigiri' );
        }

        return $menus;
    }

    if ( nigiri_elated_check_is_header_type_enabled( 'header-bottom' ) ) {
        add_filter( 'nigiri_elated_filter_register_headers_menu', 'nigiri_elated_include_header_bottom_menu' );
    }
}

if ( ! function_exists( 'nigiri_elated_get_header_bottom_main_menu' ) ) {
    /**
     * Loads vertical menu HTML
     */
    function nigiri_elated_get_header_bottom_main_menu() {
        nigiri_elated_get_module_template_part( 'templates/header-bottom-navigation', 'header/types/header-bottom' );
    }
}

if ( ! function_exists( 'nigiri_elated_register_header_bottom_widgets' ) ) {
    /**
     * Registers additional widget areas for this header type
     */
    function nigiri_elated_register_header_bottom_widgets() {

        register_sidebar(
            array(
                'id'            => 'bottom_menu_right_area',
                'name'          => esc_html__( 'Bottom Menu Right', 'nigiri' ),
                'description'   => esc_html__( 'This widget area is rendered on the right in bottom menu', 'nigiri' ),
                'before_widget' => '<div class="%2$s eltdf-bottom-menu-right-widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="eltdf-widget-title">',
                'after_title'   => '</h5>'
            )
        );
    }

    if ( nigiri_elated_check_is_header_type_enabled( 'header-bottom' ) ) {
        add_action( 'widgets_init', 'nigiri_elated_register_header_bottom_widgets' );
    }
}

if ( ! function_exists( 'nigiri_elated_header_bottom_per_page_custom_styles' ) ) {
    /**
     * Return header per page styles
     */
    function nigiri_elated_header_bottom_per_page_custom_styles( $style, $class_prefix, $page_id ) {
        $header_area_style    = array();
        $header_area_selector = array( $class_prefix . '.eltdf-header-bottom .eltdf-vertical-menu-nav-holder-outer' );

        $vertical_header_background_color  = get_post_meta( $page_id, 'eltdf_vertical_header_background_color_meta', true );
        $disable_vertical_background_image = get_post_meta( $page_id, 'eltdf_disable_vertical_header_background_image_meta', true );
        $vertical_background_image         = get_post_meta( $page_id, 'eltdf_vertical_header_background_image_meta', true );
        $vertical_shadow                   = get_post_meta( $page_id, 'eltdf_vertical_header_shadow_meta', true );
        $vertical_border                   = get_post_meta( $page_id, 'eltdf_vertical_header_border_meta', true );

        if ( ! empty( $vertical_header_background_color ) ) {
            $header_area_style['background-color'] = $vertical_header_background_color;
        }

        if ( $disable_vertical_background_image == 'yes' ) {
            $header_area_style['background-image'] = 'none';
        } elseif ( $vertical_background_image !== '' ) {
            $header_area_style['background-image'] = 'url(' . $vertical_background_image . ')';
        }

        if ( $vertical_shadow == 'yes' ) {
            $header_area_style['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
        }

        if ( $vertical_border == 'yes' ) {
            $header_border_color = get_post_meta( $page_id, 'eltdf_vertical_header_border_color_meta', true );

            if ( $header_border_color !== '' ) {
                $header_area_style['border-left'] = '1px solid ' . $header_border_color;
            }
        }

        $current_style = '';

        if ( ! empty( $header_area_style ) ) {
            $current_style .= nigiri_elated_dynamic_css( $header_area_selector, $header_area_style );
        }

        $current_style = $current_style . $style;

        return $current_style;
    }

    add_filter( 'nigiri_elated_filter_add_header_page_custom_style', 'nigiri_elated_header_bottom_per_page_custom_styles', 10, 3 );
}