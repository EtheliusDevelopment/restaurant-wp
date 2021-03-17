<?php
namespace NigiriCore\CPT\Shortcodes\DualImageShowcase;

use NigiriCore\Lib;

class DualImageShowcase implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_dual_image_showcase';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Dual Image Showcase', 'nigiri-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'icon'                      => 'icon-wpb-dual-iamge-showcase extended-custom-icon',
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
							'param_name'  => 'image_foreground',
							'heading'     => esc_html__( 'Image Foreground', 'nigiri-core' ),
							'description' => esc_html__( 'Select image from media library', 'nigiri-core' )
						),
						
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image_background',
							'heading'     => esc_html__( 'Image Background', 'nigiri-core' ),
							'description' => esc_html__( 'Select image from media library', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'parallax_items',
							'heading'     => esc_html__( 'Enable Parallax Items', 'nigiri-core' ),
							'description' => esc_html__( 'If set to yes, parallax effect will be triggered only on non-touch devices.', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
							'save_always' => true,
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'y_axis_translation_foreground',
							'heading'     => esc_html__( 'Y Axis Translation Foreground Image', 'nigiri-core' ),
							'description' => esc_html__( 'Maximum movement in pixels. Negative value changes parallax direction.', 'nigiri-core' ),
							'value'       => esc_html__( '0', 'nigiri-core' ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'parallax_items', 'value' => array( 'yes' ) )
						),
						
						array(
							'type'        => 'textfield',
							'param_name'  => 'y_axis_translation_background',
							'heading'     => esc_html__( 'Y Axis Translation Background Image', 'nigiri-core' ),
							'description' => esc_html__( 'Maximum movement in pixels. Negative value changes parallax direction.', 'nigiri-core' ),
							'value'       => esc_html__( '0', 'nigiri-core' ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'parallax_items', 'value' => array( 'yes' ) )
						),
						array(
                            'type'       => 'dropdown',
                            'param_name' => 'images_position',
                            'heading'    => esc_html__( 'Images Position', 'nigiri-core' ),
                            'value'      => array(
                                esc_html__( 'Images Right From Content', 'nigiri-core' )   => 'right',
                                esc_html__( 'Images Left From Content', 'nigiri-core' )    => 'left'
                            ),
                            'save_always' => true
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'content_alignment',
                            'heading'    => esc_html__( 'Content Alignment', 'nigiri-core' ),
                            'value'      => array(
                            	esc_html__( 'Left', 'nigiri-core' )      => 'left',
                                esc_html__( 'Right', 'nigiri-core' )     => 'right',
                                esc_html__( 'Center', 'nigiri-core' )    => 'center'
                            ),
                            'save_always' => true
                        ),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_bottom_margin',
							'heading'    => esc_html__( 'Title Bottom Margin (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle',
							'heading'    => esc_html__( 'Subtitle', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'subtitle_tag',
							'heading'     => esc_html__( 'Subtitle Tag', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'       => esc_html__( 'Subtitle Style', 'nigiri-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'       => esc_html__( 'Subtitle Style', 'nigiri-core' )
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
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_top_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'nigiri-core' )
						),
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'enable_button',
                            'heading'     => esc_html__( 'Enable Button', 'nigiri-core' ),
                            'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
                            'save_always' => true,
                            'description' => esc_html__( 'If you set "yes" button will be shown below text area.', 'nigiri-core' )
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'button_text',
                            'heading'     => esc_html__( 'Button Text', 'nigiri-core' ),
                            'description' => esc_html__( 'Enter Button text here. Default is "Shop Now".', 'nigiri-core' ),
                            'dependency'  => array( 'element' => 'enable_button', 'value' => 'yes' ),
                            'group'       => esc_html__( 'Button', 'nigiri-core' )
                        ), 
                         array(
                            'type'       => 'textfield',
                            'param_name' => 'custom_link',
                            'heading'    => esc_html__( 'Custom Link', 'nigiri-core' ),
                            'dependency'  => array( 'element' => 'enable_button', 'value' => 'yes' ),
                            'group'       => esc_html__( 'Button', 'nigiri-core' )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'custom_link_target',
                            'heading'    => esc_html__( 'Custom Link Target', 'nigiri-core' ),
                            'value'      => array_flip( nigiri_elated_get_link_target_array() ),
                            'dependency' => array( 'element' => 'custom_link', 'not_empty' => true ),
                            'group'       => esc_html__( 'Button', 'nigiri-core' )
                        ),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'                   => '',
			'image_foreground'               => '',
			'image_background'               => '',
			'parallax_items'                 => 'no',
			'y_axis_translation_foreground'  => '',
			'y_axis_translation_background'  => '',
			'images_position'	             => 'right',
			'content_alignment'              => 'left',
			'title'                          => '',
			'title_tag'                      => 'h3',
			'title_color'                    => '',
			'title_top_margin'               => '',
			'title_bottom_margin'            => '',
			'subtitle'                       => '',
			'subtitle_color'                 => '',
			'subtitle_tag'                   => 'h6',
			'text'                           => '',
			'text_color'                     => '',
			'text_top_margin'                => '',
			'enable_button'                  => '',
			'button_text'                    => 'Shop Now',
			'custom_link'                    => '',
			'custom_link_target'             => '_self'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['image']              = $this->getImage( $params );
		$params['title_tag']          = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['subtitle_tag']       = ! empty( $params['subtitle_tag'] ) ? $params['subtitle_tag'] : $args['subtitle_tag'];
		$params['title_styles']       = $this->getTitleStyles( $params );
		$params['subtitle_styles']    = $this->getSubtitleStyles( $params );
		$params['text_styles']        = $this->getTextStyles( $params );
		$params['holder_data_bckg']   = $this->getHolderDataAttrBackground($params);
		$params['holder_data_frg']    = $this->getHolderDataAttrForeground($params);
		
		$html = nigiri_core_get_shortcode_module_template_part( 'templates/dual-image-showcase', 'dual-image-showcase', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['images_position'] ) ? 'eltdf-dual-image-showcase-' . esc_attr( $params['images_position'] ) : '';
		$holderClasses[] = ! empty( $params['content_alignment'] ) ? 'eltdf-text-align-' . esc_attr( $params['content_alignment'] ) : '';
		
		if ( $params['parallax_items'] === 'yes' ) {
			$holderClasses[] = 'eltdf-parallax-items';
		}
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderDataAttrBackground( $params ) {
		$data = array();
		
		if ( $params['parallax_items'] === 'yes' && $params['y_axis_translation_background'] !== '' ) {
			$data['data-y-axis-translation'] = $params['y_axis_translation_background'];
		}
		
		return $data;
	}
	
	private function getHolderDataAttrForeground( $params ) {
		$data = array();
		
		if ( $params['parallax_items'] === 'yes' && $params['y_axis_translation_foreground'] !== '' ) {
			$data['data-y-axis-translation'] = $params['y_axis_translation_foreground'];
		}
		
		return $data;
	}
	
	private function getImage( $params ) {
		$image = array();
		
		if ( ! empty( $params['image'] ) ) {
			$id = $params['image'];
			
			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $image;
	}
	
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( $params['title_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . nigiri_elated_filter_px( $params['title_top_margin'] ) . 'px';
		}

		if ( $params['title_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . nigiri_elated_filter_px( $params['title_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getSubtitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['subtitle_color'] ) ) {
			$styles[] = 'color: ' . $params['subtitle_color'];
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
}