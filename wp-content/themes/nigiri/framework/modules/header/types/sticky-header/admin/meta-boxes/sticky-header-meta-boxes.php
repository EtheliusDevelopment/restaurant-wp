<?php

if ( ! function_exists( 'nigiri_elated_sticky_header_meta_boxes_options_map' ) ) {
	function nigiri_elated_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'eltdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'nigiri' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'nigiri' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		$nigiri_custom_sidebars = nigiri_elated_get_custom_sidebars();
		if ( count( $nigiri_custom_sidebars ) > 0 ) {
			nigiri_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'nigiri' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'nigiri' ),
					'parent'      => $header_meta_box,
					'options'     => $nigiri_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'eltdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}

		nigiri_elated_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'eltdf_sticky_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Sticky Header Side Padding', 'nigiri' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area side padding', 'nigiri' ),
				'parent'      => $header_meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'nigiri' )
				),
				'dependency' => array(
					'show' => array(
						'eltdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
					)
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_additional_header_area_meta_boxes_map', 'nigiri_elated_sticky_header_meta_boxes_options_map', 8, 1 );
}