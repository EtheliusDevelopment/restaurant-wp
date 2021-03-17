<?php

if ( ! function_exists( 'nigiri_elated_map_sidebar_meta' ) ) {
	function nigiri_elated_map_sidebar_meta() {
		$eltdf_sidebar_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'nigiri_elated_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'nigiri' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'nigiri' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'nigiri' ),
				'parent'      => $eltdf_sidebar_meta_box,
                'options'       => nigiri_elated_get_custom_sidebars_options( true )
			)
		);
		
		$eltdf_custom_sidebars = nigiri_elated_get_custom_sidebars();
		if ( count( $eltdf_custom_sidebars ) > 0 ) {
			nigiri_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'nigiri' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'nigiri' ),
					'parent'      => $eltdf_sidebar_meta_box,
					'options'     => $eltdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_sidebar_meta', 31 );
}