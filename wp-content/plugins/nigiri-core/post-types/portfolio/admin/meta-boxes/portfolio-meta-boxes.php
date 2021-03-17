<?php

if ( ! function_exists( 'nigiri_core_map_portfolio_meta' ) ) {
	function nigiri_core_map_portfolio_meta() {
		global $nigiri_elated_global_Framework;
		
		$nigiri_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$nigiri_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$nigiri_portfolio_images = new NigiriElatedClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'nigiri-core' ), '', '', 'portfolio_images' );
		$nigiri_elated_global_Framework->eltdMetaBoxes->addMetaBox( 'portfolio_images', $nigiri_portfolio_images );
		
		$nigiri_portfolio_image_gallery = new NigiriElatedClassMultipleImages( 'eltdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'nigiri-core' ), esc_html__( 'Choose your portfolio images', 'nigiri-core' ) );
		$nigiri_portfolio_images->addChild( 'eltdf-portfolio-image-gallery', $nigiri_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$nigiri_portfolio_images_videos = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'nigiri-core' ),
				'name'  => 'eltdf_portfolio_images_videos'
			)
		);
		nigiri_elated_add_repeater_field(
			array(
				'name'        => 'eltdf_portfolio_single_upload',
				'parent'      => $nigiri_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'nigiri-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'nigiri-core' ),
						'options' => array(
							'image' => esc_html__('Image','nigiri-core'),
							'video' => esc_html__('Video','nigiri-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'nigiri-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'nigiri-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'nigiri-core'),
							'vimeo' => esc_html__('Vimeo', 'nigiri-core'),
							'self' => esc_html__('Self Hosted', 'nigiri-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'nigiri-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'nigiri-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'nigiri-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$nigiri_additional_sidebar_items = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'nigiri-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		nigiri_elated_add_repeater_field(
			array(
				'name'        => 'eltdf_portfolio_properties',
				'parent'      => $nigiri_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'nigiri-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'nigiri-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'nigiri-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'nigiri-core' )
					)
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_core_map_portfolio_meta', 40 );
}