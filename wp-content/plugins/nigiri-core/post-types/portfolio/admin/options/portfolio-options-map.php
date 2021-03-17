<?php

if ( ! function_exists( 'nigiri_elated_portfolio_options_map' ) ) {
	function nigiri_elated_portfolio_options_map() {
		
		nigiri_elated_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'nigiri-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = nigiri_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'nigiri-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'nigiri-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'nigiri-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'nigiri-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'nigiri-core' ),
				'parent'        => $panel_archive,
				'options'       => nigiri_elated_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'nigiri-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'nigiri-core' ),
				'default_value' => 'normal',
				'options'       => nigiri_elated_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'nigiri-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'nigiri-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'nigiri-core' ),
					'landscape' => esc_html__( 'Landscape', 'nigiri-core' ),
					'portrait'  => esc_html__( 'Portrait', 'nigiri-core' ),
					'square'    => esc_html__( 'Square', 'nigiri-core' )
				)
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'nigiri-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'nigiri-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'nigiri-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'nigiri-core' )
				)
			)
		);
		
		$panel = nigiri_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'nigiri-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'nigiri-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'nigiri-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'nigiri-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'nigiri-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => nigiri_elated_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'nigiri-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'nigiri-core' ),
				'default_value' => 'normal',
				'options'       => nigiri_elated_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = nigiri_elated_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'nigiri-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'nigiri-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => nigiri_elated_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'nigiri-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'nigiri-core' ),
				'default_value' => 'normal',
				'options'       => nigiri_elated_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		nigiri_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'nigiri-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'nigiri-core' ),
					'yes' => esc_html__( 'Yes', 'nigiri-core' ),
					'no'  => esc_html__( 'No', 'nigiri-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'nigiri-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'nigiri-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'nigiri-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'nigiri-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'nigiri-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'nigiri-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'nigiri-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = nigiri_elated_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'nigiri-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'nigiri-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'nigiri-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'nigiri-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_options_map', 'nigiri_elated_portfolio_options_map', nigiri_elated_set_options_map_position( 'portfolio' ) );
}