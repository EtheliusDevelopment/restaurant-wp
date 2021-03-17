<?php

if ( ! function_exists( 'nigiri_elated_map_footer_meta' ) ) {
	function nigiri_elated_map_footer_meta() {
		
		$footer_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'nigiri_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'nigiri' ),
				'name'  => 'footer_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'nigiri' ),
				'options'       => nigiri_elated_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = nigiri_elated_add_admin_container(
			array(
				'name'       => 'eltdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'eltdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
			
			nigiri_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'nigiri' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'nigiri' ),
					'options'       => nigiri_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			nigiri_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'nigiri' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'nigiri' ),
					'options'       => nigiri_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

			nigiri_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_footer_top_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer Top in Grid', 'nigiri' ),
					'description'   => esc_html__( 'Enabling this option will place Footer Top content in grid', 'nigiri' ),
					'options'       => nigiri_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'eltdf_show_footer_top_meta' => array( '', 'yes' )
						)
					)
				)
			);

			nigiri_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_footer_top_background_color_meta',
					'type'        => 'color',
					'label'       => esc_html__( 'Footer Top Background Color', 'nigiri' ),
					'description' => esc_html__( 'Set background color for top footer area', 'nigiri' ),
					'parent'      => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'eltdf_show_footer_top_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			nigiri_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'nigiri' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'nigiri' ),
					'options'       => nigiri_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

			nigiri_elated_create_meta_box_field(
				array(
					'name'          => 'eltdf_footer_bottom_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer Bottom in Grid', 'nigiri' ),
					'description'   => esc_html__( 'Enabling this option will place Footer Bottom content in grid', 'nigiri' ),
					'options'       => nigiri_elated_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'eltdf_show_footer_bottom_meta' => array( '', 'yes' )
						)
					)
				)
			);

			nigiri_elated_create_meta_box_field(
				array(
					'name'        => 'eltdf_footer_bottom_background_color_meta',
					'type'        => 'color',
					'label'       => esc_html__( 'Footer Bottom Background Color', 'nigiri' ),
					'description' => esc_html__( 'Set background color for bottom footer area', 'nigiri' ),
					'parent'      => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'eltdf_show_footer_bottom_meta' => array( '', 'yes' )
						)
					)
				)
			);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_footer_meta', 70 );
}