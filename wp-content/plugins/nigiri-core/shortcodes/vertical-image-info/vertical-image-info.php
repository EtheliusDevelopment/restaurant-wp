<?php
namespace NigiriCore\CPT\Shortcodes\VerticalImageInfo;

use NigiriCore\Lib;

class VerticalImageInfo implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_vertical_image_info';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Vertical Image Info', 'nigiri-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'icon'                      => 'icon-wpb-vertical-image-info extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'nigiri-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'nigiri-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Main Image', 'nigiri-core' ),
							'description' => esc_html__( 'Select image from media library', 'nigiri-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'nigiri-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_appear_animation',
							'heading'     => esc_html__( 'Enable Appear Animation', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_parallax_image',
							'heading'     => esc_html__( 'Enable Parallax Image', 'edge-core' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, false ) ),
							'description' => esc_html__( 'Enabling this option will trigger parallax scrolling effect for image.', 'edge-core' ),
							'dependency' => array( 'element' => 'image', 'not_empty' => true ),
							'save_always' => true
						),
						array(
                            'type'       => 'dropdown',
                            'param_name' => 'image_position',
                            'heading'    => esc_html__( 'Main Image Position', 'nigiri-core' ),
                            'value'      => array(
                                esc_html__( 'Top', 'nigiri-core' )       => 'top',
                                esc_html__( 'Bottom', 'nigiri-core' )    => 'bottom'
                            ),
                            'save_always' => true
                        ),
						array(
							'type'       => 'textfield',
							'param_name' => 'image_top_padding',
							'heading'    => esc_html__( 'Image Top Padding (px)', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'nigiri-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'title_image',
							'heading'     => esc_html__( 'Title Image', 'nigiri-core' ),
							'description' => esc_html__( 'Select image from media library', 'nigiri-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'nigiri-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_top_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_top_separator',
							'heading'     => esc_html__( 'Disable Top Separator', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'            => '',
			'image'                   => '',
			'enable_appear_animation' => 'no',
			'enable_parallax_image'   => 'no',
			'image_size'              => 'full',
			'image_position'          => 'top',
			'image_top_padding'       => '',
			'title'                   => '',
			'title_image'             => '',
			'title_tag'               => 'h3',
			'title_color'             => '',
			'title_top_margin'        => '',
			'text'                    => '',
			'text_color'              => '',
			'text_top_margin'         => '',
			'disable_top_separator'   => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['image_size']     = $this->getImageSize( $params['image_size'] );
		$params['image_styles']   = $this->getImageStyles( $params );
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['text_styles']    = $this->getTextStyles( $params );
		
		$params['this_object'] = $this;
		
		$html = nigiri_core_get_shortcode_module_template_part( 'templates/vertical-image-info', 'vertical-image-info', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['disable_top_separator'] === 'yes' ? 'eltdf-disable-top-separator' : '';
		$holderClasses[] = $params['enable_appear_animation'] === 'yes' ? 'eltdf-appear-animation' : '';
		
		if ($params['enable_parallax_image'] == 'yes') {
			$holderClasses[] = 'eltdf-parallax-scroll';
		}

		return implode( ' ', $holderClasses );
	}
	
	private function getImageSize( $image_size ) {
		$image_size = trim( $image_size );
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
			return $image_size;
		} elseif ( ! empty( $matches[0] ) ) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	private function getImageStyles( $params ) {
		$styles = array();

		if ( $params['image_top_padding'] !== '' ) {
			$styles[] = 'padding-top: ' . nigiri_elated_filter_px( $params['image_top_padding'] ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( $params['title_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . nigiri_elated_filter_px( $params['title_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . nigiri_elated_filter_px( $params['text_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	function getParallaxData( $params ) {
		$itemData = array();
		
		if ($params['enable_parallax_image'] === 'yes') {
			$y_absolute = rand(-50, -70);
			$smoothness = 20; //1 is for linear, non-animated parallax
			
			$itemData['data-parallax']= '{&quot;y&quot;: '.$y_absolute.', &quot;smoothness&quot;: '.$smoothness.'}';
		}
		
		return $itemData;
	}
}