<?php

if ( ! function_exists( 'nigiri_elated_get_title_types_meta_boxes' ) ) {
	function nigiri_elated_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'nigiri_elated_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'nigiri' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'nigiri_elated_map_title_meta' ) ) {
	function nigiri_elated_map_title_meta() {
		$title_type_meta_boxes = nigiri_elated_get_title_types_meta_boxes();
		
		$title_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => apply_filters( 'nigiri_elated_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'nigiri' ),
				'name'  => 'title_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'nigiri' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'nigiri' ),
				'parent'        => $title_meta_box,
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = nigiri_elated_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'eltdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'eltdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'nigiri' ),
						'description'   => esc_html__( 'Choose title type', 'nigiri' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'nigiri' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'nigiri' ),
						'options'       => nigiri_elated_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				nigiri_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'nigiri' ),
						'description' => esc_html__( 'Set a height for Title Area', 'nigiri' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				nigiri_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'nigiri' ),
						'description' => esc_html__( 'Choose a background color for title area', 'nigiri' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				nigiri_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'nigiri' ),
						'description' => esc_html__( 'Choose an Image for title area', 'nigiri' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'nigiri' ),
						'description'   => esc_html__( 'Choose title area background image behavior. It does not apply to Title Below Image Type.', 'nigiri' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'nigiri' ),
							'hide'                => esc_html__( 'Hide Image', 'nigiri' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'nigiri' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'nigiri' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'nigiri' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'nigiri' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'nigiri' )
						)
					)
				);
				
				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'nigiri' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment. It does not apply to Title Below Image Type.', 'nigiri' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'nigiri' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'nigiri' ),
							'window-top'    => esc_html__( 'From Window Top', 'nigiri' )
						)
					)
				);

				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_vertical_offset_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Title Vertical Offset', 'nigiri' ),
						'description'   => esc_html__( 'Set title vertical offset relative to its current position', 'nigiri' ),
						'parent'        => $show_title_area_meta_container,
						'args' 			=> array(
							'col_width' => '3',
							'suffix' => 'px,%'
						)
					)
				);

				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'nigiri' ),
						'options'       => nigiri_elated_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				nigiri_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'nigiri' ),
						'description' => esc_html__( 'Choose a color for title text', 'nigiri' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'nigiri' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'nigiri' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				nigiri_elated_create_meta_box_field(
					array(
						'name'          => 'eltdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'nigiri' ),
						'options'       => nigiri_elated_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				nigiri_elated_create_meta_box_field(
					array(
						'name'        => 'eltdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'nigiri' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'nigiri' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'nigiri_elated_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_title_meta', 60 );
}