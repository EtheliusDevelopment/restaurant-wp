<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'nigiri_elated_map_blog_meta' ) ) {
	function nigiri_elated_map_blog_meta() {
		$eltdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'nigiri' ),
				'name'  => 'blog_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'nigiri' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'nigiri' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'nigiri' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'nigiri' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltdf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'nigiri' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'nigiri' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'nigiri' ),
					'in-grid'    => esc_html__( 'In Grid', 'nigiri' ),
					'full-width' => esc_html__( 'Full Width', 'nigiri' )
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'nigiri' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'nigiri' ),
				'parent'      => $blog_meta_box,
				'options'     => nigiri_elated_get_number_of_columns_array( true, array( 'one', 'six' ) )
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'nigiri' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'nigiri' ),
				'options'     => nigiri_elated_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'nigiri' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'nigiri' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'nigiri' ),
					'fixed'    => esc_html__( 'Fixed', 'nigiri' ),
					'original' => esc_html__( 'Original', 'nigiri' )
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'nigiri' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'nigiri' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'nigiri' ),
					'standard'        => esc_html__( 'Standard', 'nigiri' ),
					'load-more'       => esc_html__( 'Load More', 'nigiri' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'nigiri' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'nigiri' )
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'nigiri' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'nigiri' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_blog_meta', 30 );
}