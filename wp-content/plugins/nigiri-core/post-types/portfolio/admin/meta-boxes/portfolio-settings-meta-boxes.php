<?php

if ( ! function_exists( 'nigiri_core_map_portfolio_settings_meta' ) ) {
	function nigiri_core_map_portfolio_settings_meta() {
		$meta_box = nigiri_elated_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'nigiri-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		nigiri_elated_create_meta_box_field( array(
			'name'        => 'eltdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'nigiri-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'nigiri-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'nigiri-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'nigiri-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'nigiri-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'nigiri-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'nigiri-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'nigiri-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'nigiri-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'nigiri-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'nigiri-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'nigiri-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'nigiri-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'nigiri-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'eltdf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'eltdf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'nigiri-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'nigiri-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => nigiri_elated_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'nigiri-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'nigiri-core' ),
				'default_value' => '',
				'options'       => nigiri_elated_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'eltdf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'eltdf_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'nigiri-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'nigiri-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => nigiri_elated_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'nigiri-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'nigiri-core' ),
				'default_value' => '',
				'options'       => nigiri_elated_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'nigiri-core' ),
				'parent'        => $meta_box,
				'options'       => nigiri_elated_get_yes_no_select_array()
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'nigiri-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'nigiri-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'nigiri-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'nigiri-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'nigiri-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'nigiri-core' ),
				'parent'      => $meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'nigiri-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'nigiri-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'nigiri-core' ),
					'small'              => esc_html__( 'Small', 'nigiri-core' ),
					'large-width'        => esc_html__( 'Large Width', 'nigiri-core' ),
					'large-height'       => esc_html__( 'Large Height', 'nigiri-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'nigiri-core' )
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'nigiri-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'nigiri-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'nigiri-core' ),
					'large-width' => esc_html__( 'Large Width', 'nigiri-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'nigiri-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'nigiri-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_core_map_portfolio_settings_meta', 41 );
}