<?php

namespace NigiriCore\CPT\Shortcodes\ProductListCarousel;

use NigiriCore\Lib;

class ProductListCarousel implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_product_list_carousel';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Product List - Carousel', 'nigiri' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list-carousel extended-custom-icon',
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'nigiri' ),
							'value'       => array(
								esc_html__( 'Standard', 'nigiri' ) => 'standard',
								esc_html__( 'Simple', 'nigiri' )   => 'simple'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'nigiri' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'nigiri' ),
							'value'       => array_flip( nigiri_elated_get_space_between_items_array() ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'standard' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'nigiri' ),
							'value'       => array_flip( nigiri_elated_get_query_order_by_array( false, array( 'on-sale' => esc_html__( 'On Sale', 'nigiri' ) ) ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'nigiri' ),
							'value'       => array_flip( nigiri_elated_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'nigiri' ),
							'value'       => array(
								esc_html__( 'Category', 'nigiri' ) => 'category',
								esc_html__( 'Tag', 'nigiri' )      => 'tag',
								esc_html__( 'Id', 'nigiri' )       => 'id'
							),
							'save_always' => true,
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'nigiri' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'nigiri' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'nigiri' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__( 'Image Proportions', 'nigiri' ),
							'param_name'  => 'image_size',
							'value'       => array(
								esc_html__( 'Default', 'nigiri' )        => '',
								esc_html__( 'Original', 'nigiri' )       => 'full',
								esc_html__( 'Square', 'nigiri' )         => 'square',
								esc_html__( 'Landscape', 'nigiri' )      => 'landscape',
								esc_html__( 'Portrait', 'nigiri' )       => 'portrait',
								esc_html__( 'Medium', 'nigiri' )         => 'medium',
								esc_html__( 'Large', 'nigiri' )          => 'large',
								esc_html__( 'Shop Single', 'nigiri' )    => 'woocommerce_single',
								esc_html__( 'Shop Thumbnail', 'nigiri' ) => 'woocommerce_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'nigiri' ),
							'value'       => array(
								esc_html__( 'One', 'nigiri' )   => '1',
								esc_html__( 'Two', 'nigiri' )   => '2',
								esc_html__( 'Three', 'nigiri' ) => '3',
								esc_html__( 'Four', 'nigiri' )  => '4',
								esc_html__( 'Five', 'nigiri' )  => '5',
								esc_html__( 'Six', 'nigiri' )   => '6'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'nigiri' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'nigiri' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'nigiri' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'nigiri' ),
							'group'       => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'nigiri' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'nigiri' ),
							'group'       => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'nigiri' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'slider_navigation_skin',
							'heading'    => esc_html__( 'Slider Navigation Skin', 'nigiri' ),
							'value'      => array(
								esc_html__( 'Default', 'nigiri' ) => 'default',
								esc_html__( 'Light', 'nigiri' )   => 'light'
							),
							'dependency' => array( 'element' => 'slider_navigation', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'nigiri' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'slider_pagination_skin',
							'heading'    => esc_html__( 'Slider Pagination Skin', 'nigiri' ),
							'value'      => array(
								esc_html__( 'Default', 'nigiri' ) => 'default',
								esc_html__( 'Light', 'nigiri' )   => 'light'
							),
							'dependency' => array( 'element' => 'slider_pagination', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'slider_pagination_pos',
							'heading'    => esc_html__( 'Slider Pagination Position', 'nigiri' ),
							'value'      => array(
								esc_html__( 'Below Carousel', 'nigiri' )  => 'bellow-slider',
								esc_html__( 'Inside Carousel', 'nigiri' ) => 'inside-slider'
							),
							'dependency' => array( 'element' => 'slider_pagination', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'nigiri' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'nigiri' ),
							'description' => esc_html__( 'Number of characters', 'nigiri' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'nigiri' ),
							'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'nigiri' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'nigiri' ),
							'value'      => array(
								esc_html__( 'Default', 'nigiri' ) => 'default',
								esc_html__( 'Light', 'nigiri' )   => 'light',
								esc_html__( 'Dark', 'nigiri' )    => 'dark'
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'nigiri' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'nigiri' ),
							'group'      => esc_html__( 'Product Info Style', 'nigiri' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                    => 'standard',
			'number_of_posts'         => '8',
			'space_between_items'     => 'normal',
			'orderby'                 => 'date',
			'order'                   => 'ASC',
			'taxonomy_to_display'     => 'category',
			'taxonomy_values'         => '',
			'image_size'              => 'full',
			'number_of_visible_items' => '1',
			'slider_loop'             => 'yes',
			'slider_autoplay'         => 'yes',
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'       => 'yes',
			'slider_navigation_skin'  => 'default',
			'slider_pagination'       => 'yes',
			'slider_pagination_skin'  => 'default',
			'slider_pagination_pos'   => 'bellow-slider',
			'display_title'           => 'yes',
			'title_tag'               => 'h4',
			'title_transform'         => '',
			'display_category'        => 'no',
			'display_excerpt'         => 'no',
			'excerpt_length'          => '20',
			'display_rating'          => 'yes',
			'display_price'           => 'yes',
			'display_button'          => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => ''
		);
		$params = shortcode_atts( $default_atts, $atts );
		
		$params['class_name'] = 'plc';
		$params['type']       = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['title_tag']  = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		$additional_params['holder_data']    = $this->getProductListCarouselDataAttributes( $params );
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = nigiri_elated_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list-carousel', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'eltdf-' . $params['type'] . '-layout' : 'eltdf-' . $default_atts['type'] . '-layout';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'eltdf-' . $params['space_between_items'] . '-space' : 'eltdf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = $this->getCarouselClasses( $params, $default_atts );
		
		return implode( ' ', $holderClasses );
	}
	
	private function getCarouselClasses( $params ) {
		$carouselClasses   = array();
		$carouselClasses[] = ! empty( $params['slider_navigation_skin'] ) ? 'eltdf-plc-nav-' . $params['slider_navigation_skin'] . '-skin' : '';
		$carouselClasses[] = ! empty( $params['slider_pagination_pos'] ) ? 'eltdf-plc-pag-' . $params['slider_pagination_pos'] : '';
		$carouselClasses[] = ! empty( $params['slider_pagination_skin'] ) ? 'eltdf-plc-pag-' . $params['slider_pagination_skin'] . '-skin' : '';
		
		return implode( ' ', $carouselClasses );
	}
	
	private function getProductListCarouselDataAttributes( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = ! empty( $params['number_of_visible_items'] ) && $params['type'] !== 'simple' ? $params['number_of_visible_items'] : '1';
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
		
		return $slider_data;
	}
	
	public function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['post__in'] = $ids;
		}
		
		return $queryArray;
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getShaderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}
		
		return implode( ';', $styles );
	}
}