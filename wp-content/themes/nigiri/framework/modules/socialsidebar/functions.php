<?php

if ( ! function_exists( 'nigiri_elated_get_social_sidebar' ) ) {
	function nigiri_elated_get_social_sidebar() {
		$show_social_sidebar   = nigiri_elated_get_meta_field_intersect( 'enable_social_sidebar' ) === 'yes' ? true : false;
		$social_sidebar_styles = array();
		
		if ( $show_social_sidebar ) {
			$social_sidebar_width = nigiri_elated_get_meta_field_intersect( 'social_sidebar_width' );
			
			if ( ! empty( $social_sidebar_width ) ) {
				if ( ! nigiri_elated_string_ends_with( $social_sidebar_width, '%' ) && ! nigiri_elated_string_ends_with( $social_sidebar_width, 'px' ) ) {
					$social_sidebar_width .= 'px';
				}
				
				$social_sidebar_styles[] = 'width: ' . $social_sidebar_width;
			}
		}
		
		$parameters = array(
			'networks'       => nigiri_elated_get_social_sidebar_networks(),
			'show_sidebar'   => $show_social_sidebar,
			'sidebar_styles' => $social_sidebar_styles
		);
		
		nigiri_elated_get_module_template_part( 'templates/social-sidebar', 'socialsidebar', '', $parameters );
	}
	
	add_action( 'nigiri_elated_action_after_wrapper_inner', 'nigiri_elated_get_social_sidebar', 10 );
}

if ( ! function_exists( 'nigiri_elated_get_contact_sidebar' ) ) {
	function nigiri_elated_get_contact_sidebar() {
		$show_contact_sidebar   = nigiri_elated_get_meta_field_intersect( 'enable_contact_sidebar' ) === 'yes' ? true : false;
		$contact_title          = nigiri_elated_get_meta_field_intersect( 'contact_sidebar_title' );
		$contact_number         = nigiri_elated_get_meta_field_intersect( 'contact_sidebar_number' );
		$contact_sidebar_styles = array();
		
		if ( $show_contact_sidebar ) {
			$contact_sidebar_width = nigiri_elated_get_meta_field_intersect( 'contact_sidebar_width' );
			
			if ( ! empty( $contact_sidebar_width ) ) {
				if ( ! nigiri_elated_string_ends_with( $contact_sidebar_width, '%' ) && ! nigiri_elated_string_ends_with( $contact_sidebar_width, 'px' ) ) {
					$contact_sidebar_width .= 'px';
				}
				
				$contact_sidebar_styles[] = 'width: ' . $contact_sidebar_width;
			}
		}
		
		$parameters = array(
			'title'                => $contact_title,
			'number'               => $contact_number,
			'show_contact_sidebar' => $show_contact_sidebar,
			'sidebar_styles'       => $contact_sidebar_styles
		);
		
		nigiri_elated_get_module_template_part( 'templates/contact-sidebar', 'socialsidebar', '', $parameters );
	}
	
	add_action( 'nigiri_elated_action_after_wrapper_inner', 'nigiri_elated_get_contact_sidebar', 10 );
}

if ( ! function_exists( 'nigiri_elated_get_social_sidebar_networks' ) ) {
	function nigiri_elated_get_social_sidebar_networks() {
		$helper_array = nigiri_elated_get_social_sidebar_networks_array();
		$networks     = array();
		
		foreach ( $helper_array as $network_key => $network ) {
			$networks[ $network_key ] = array(
				'icon' => $network['icon'],
				'link' => nigiri_elated_options()->getOptionValue( 'social_sidebar_' . $network_key )
			);
		}
		
		return $networks;
	}
}

if ( ! function_exists( 'nigiri_elated_get_social_sidebar_networks_array' ) ) {
	function nigiri_elated_get_social_sidebar_networks_array() {
		$helper_array = array(
			'tripadvisor' => array(
				'icon' => esc_html__( 'Tripadvisor', 'nigiri' ),
			),
			
			'instagram' => array(
				'icon' => esc_html__( 'Instagram', 'nigiri' ),
			),
			
			'twitter' => array(
				'icon' => esc_html__( 'Twitter', 'nigiri' ),
			),
			
			'facebook' => array(
				'icon' => esc_html__( 'Facebook', 'nigiri' ),
			)
		);
		
		return $helper_array;
	}
}