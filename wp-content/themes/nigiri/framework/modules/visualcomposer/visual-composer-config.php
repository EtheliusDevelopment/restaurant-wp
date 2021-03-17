<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'nigiri_elated_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function nigiri_elated_configure_visual_composer_frontend_editor() {
		/* *
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'nigiri_elated_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'nigiri_elated_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function nigiri_elated_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'nigiri' ),
				'value'      => array(
					esc_html__( 'Full Width', 'nigiri' ) => 'full-width',
					esc_html__( 'In Grid', 'nigiri' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Elated Anchor ID', 'nigiri' ),
				'description' => esc_html__( 'For example "home"', 'nigiri' ),
				'group'       => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'nigiri' ),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'nigiri' ),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Elated Background Position', 'nigiri' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'nigiri' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'nigiri' ),
				'value'       => array(
					esc_html__( 'Never', 'nigiri' )        => '',
					esc_html__( 'Below 1280px', 'nigiri' ) => '1280',
					esc_html__( 'Below 1024px', 'nigiri' ) => '1024',
					esc_html__( 'Below 768px', 'nigiri' )  => '768',
					esc_html__( 'Below 680px', 'nigiri' )  => '680',
					esc_html__( 'Below 480px', 'nigiri' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'nigiri' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Elated Parallax Background Image', 'nigiri' ),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Elated Parallax Speed', 'nigiri' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'nigiri' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Elated Parallax Section Height (px)', 'nigiri' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'nigiri' ),
				'value'      => array(
					esc_html__( 'Default', 'nigiri' ) => '',
					esc_html__( 'Left', 'nigiri' )    => 'left',
					esc_html__( 'Center', 'nigiri' )  => 'center',
					esc_html__( 'Right', 'nigiri' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'nigiri' ),
				'value'      => array(
					esc_html__( 'Full Width', 'nigiri' ) => 'full-width',
					esc_html__( 'In Grid', 'nigiri' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'nigiri' ),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'nigiri' ),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Elated Background Position', 'nigiri' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'nigiri' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'nigiri' ),
				'value'       => array(
					esc_html__( 'Never', 'nigiri' )        => '',
					esc_html__( 'Below 1280px', 'nigiri' ) => '1280',
					esc_html__( 'Below 1024px', 'nigiri' ) => '1024',
					esc_html__( 'Below 768px', 'nigiri' )  => '768',
					esc_html__( 'Below 680px', 'nigiri' )  => '680',
					esc_html__( 'Below 480px', 'nigiri' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'nigiri' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'nigiri' ),
				'value'      => array(
					esc_html__( 'Default', 'nigiri' ) => '',
					esc_html__( 'Left', 'nigiri' )    => 'left',
					esc_html__( 'Center', 'nigiri' )  => 'center',
					esc_html__( 'Right', 'nigiri' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'nigiri' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( nigiri_elated_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Elated Enable Passepartout', 'nigiri' ),
					'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Elated Settings', 'nigiri' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Elated Passepartout Size', 'nigiri' ),
					'value'       => array(
						esc_html__( 'Tiny', 'nigiri' )   => 'tiny',
						esc_html__( 'Small', 'nigiri' )  => 'small',
						esc_html__( 'Normal', 'nigiri' ) => 'normal',
						esc_html__( 'Large', 'nigiri' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'nigiri' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Elated Disable Side Passepartout', 'nigiri' ),
					'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'nigiri' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Elated Disable Top Passepartout', 'nigiri' ),
					'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'nigiri' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'nigiri_elated_vc_row_map' );
}