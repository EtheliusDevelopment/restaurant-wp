<?php
namespace NigiriCore\CPT\Shortcodes\IconWithText;

use NigiriCore\Lib;

class IconWithText implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_icon_with_text';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Icon With Text', 'nigiri-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-icon-with-text extended-custom-icon',
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array_merge(
						array(
							array(
								'type'        => 'textfield',
								'param_name'  => 'custom_class',
								'heading'     => esc_html__( 'Custom CSS Class', 'nigiri-core' ),
								'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'nigiri-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'type',
								'heading'     => esc_html__( 'Type', 'nigiri-core' ),
								'value'       => array(
									esc_html__( 'Icon Left From Text', 'nigiri-core' )  => 'icon-left',
									esc_html__( 'Icon Left From Title', 'nigiri-core' ) => 'icon-left-from-title',
									esc_html__( 'Icon Top', 'nigiri-core' )             => 'icon-top'
								),
								'save_always' => true
							)
						),
						nigiri_elated_icon_collections()->getVCParamsArray(),
						array(
							array(
								'type'       => 'attach_image',
								'param_name' => 'custom_icon',
								'heading'    => esc_html__( 'Custom Icon', 'nigiri-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'icon_type',
								'heading'    => esc_html__( 'Icon Type', 'nigiri-core' ),
								'value'      => array(
									esc_html__( 'Normal', 'nigiri-core' ) => 'eltdf-normal',
									esc_html__( 'Circle', 'nigiri-core' ) => 'eltdf-circle',
									esc_html__( 'Square', 'nigiri-core' ) => 'eltdf-square'
								),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'icon_size',
								'heading'    => esc_html__( 'Icon Size', 'nigiri-core' ),
								'value'      => array(
									esc_html__( 'Medium', 'nigiri-core' )     => 'eltdf-icon-medium',
									esc_html__( 'Tiny', 'nigiri-core' )       => 'eltdf-icon-tiny',
									esc_html__( 'Small', 'nigiri-core' )      => 'eltdf-icon-small',
									esc_html__( 'Large', 'nigiri-core' )      => 'eltdf-icon-large',
									esc_html__( 'Very Large', 'nigiri-core' ) => 'eltdf-icon-huge'
								),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'custom_icon_size',
								'heading'    => esc_html__( 'Custom Icon Size (px)', 'nigiri-core' ),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'shape_size',
								'heading'    => esc_html__( 'Shape Size (px)', 'nigiri-core' ),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'icon_margin',
								'heading'     => esc_html__( 'Icon Margin', 'nigiri-core' ),
								'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'nigiri-core' ),
								'group'       => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_color',
								'heading'    => esc_html__( 'Icon Color', 'nigiri-core' ),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_hover_color',
								'heading'    => esc_html__( 'Icon Hover Color', 'nigiri-core' ),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_background_color',
								'heading'    => esc_html__( 'Icon Background Color', 'nigiri-core' ),
								'dependency' => array(
									'element' => 'icon_type',
									'value'   => array( 'eltdf-square', 'eltdf-circle' )
								),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_hover_background_color',
								'heading'    => esc_html__( 'Icon Hover Background Color', 'nigiri-core' ),
								'dependency' => array(
									'element' => 'icon_type',
									'value'   => array( 'eltdf-square', 'eltdf-circle' )
								),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_border_color',
								'heading'    => esc_html__( 'Icon Border Color', 'nigiri-core' ),
								'dependency' => array(
									'element' => 'icon_type',
									'value'   => array( 'eltdf-square', 'eltdf-circle' )
								),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_border_hover_color',
								'heading'    => esc_html__( 'Icon Border Hover Color', 'nigiri-core' ),
								'dependency' => array(
									'element' => 'icon_type',
									'value'   => array( 'eltdf-square', 'eltdf-circle' )
								),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'icon_border_width',
								'heading'    => esc_html__( 'Border Width (px)', 'nigiri-core' ),
								'dependency' => array(
									'element' => 'icon_type',
									'value'   => array( 'eltdf-square', 'eltdf-circle' )
								),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'icon_animation',
								'heading'    => esc_html__( 'Icon Animation', 'nigiri-core' ),
								'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'icon_animation_delay',
								'heading'    => esc_html__( 'Icon Animation Delay (ms)', 'nigiri-core' ),
								'dependency' => array( 'element' => 'icon_animation', 'value' => array( 'yes' ) ),
								'group'      => esc_html__( 'Icon Settings', 'nigiri-core' )
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
								'group'       => esc_html__( 'Text Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'title_color',
								'heading'    => esc_html__( 'Title Color', 'nigiri-core' ),
								'dependency' => array( 'element' => 'title', 'not_empty' => true ),
								'group'      => esc_html__( 'Text Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'title_top_margin',
								'heading'    => esc_html__( 'Title Top Margin (px)', 'nigiri-core' ),
								'dependency' => array( 'element' => 'title', 'not_empty' => true ),
								'group'      => esc_html__( 'Text Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'textarea',
								'param_name' => 'text',
								'heading'    => esc_html__( 'Text', 'nigiri-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'text_style',
								'heading'    => esc_html__( 'Text Style', 'nigiri-core' ),
								'value'      => array(
									esc_html__( 'Default', 'nigiri-core' ) => '',
									esc_html__( 'Italic', 'nigiri-core' )  => 'italic'
								),
								'dependency' => array( 'element' => 'text', 'not_empty' => true ),
								'group'      => esc_html__( 'Text Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'text_color',
								'heading'    => esc_html__( 'Text Color', 'nigiri-core' ),
								'dependency' => array( 'element' => 'text', 'not_empty' => true ),
								'group'      => esc_html__( 'Text Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'text_top_margin',
								'heading'    => esc_html__( 'Text Top Margin (px)', 'nigiri-core' ),
								'dependency' => array( 'element' => 'text', 'not_empty' => true ),
								'group'      => esc_html__( 'Text Settings', 'nigiri-core' )
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'link',
								'heading'     => esc_html__( 'Link', 'nigiri-core' ),
								'description' => esc_html__( 'Set link around icon and title', 'nigiri-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'target',
								'heading'    => esc_html__( 'Target', 'nigiri-core' ),
								'value'      => array_flip( nigiri_elated_get_link_target_array() ),
								'dependency' => array( 'element' => 'link', 'not_empty' => true ),
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'text_padding',
								'heading'     => esc_html__( 'Text Padding (px)', 'nigiri-core' ),
								'description' => esc_html__( 'Set left or top padding dependence of type for your text holder. Default value is 13 for left type and 25 for top icon with text type', 'nigiri-core' ),
								'dependency'  => array( 'element' => 'type', 'value'   => array( 'icon-left', 'icon-top' ) ),
								'group'       => esc_html__( 'Text Settings', 'nigiri-core' )
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'enable_icon_box',
								'heading'    => esc_html__( 'Enable Border Box', 'nigiri-core' ),
								'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
								'dependency'  => array( 'element' => 'type', 'value'   => 'icon-left' )
							),
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'                => '',
			'type'                        => 'icon-left',
			'custom_icon'                 => '',
			'icon_type'                   => 'eltdf-normal',
			'icon_size'                   => 'eltdf-icon-medium',
			'custom_icon_size'            => '',
			'shape_size'                  => '',
			'icon_margin'                 => '',
			'icon_color'                  => '',
			'icon_hover_color'            => '',
			'icon_background_color'       => '',
			'icon_hover_background_color' => '',
			'icon_border_color'           => '',
			'icon_border_hover_color'     => '',
			'icon_border_width'           => '',
			'icon_animation'              => '',
			'icon_animation_delay'        => '',
			'title'                       => '',
			'title_tag'                   => 'h4',
			'title_color'                 => '',
			'title_top_margin'            => '',
			'text'                        => '',
			'text_style'                  => '',
			'text_color'                  => '',
			'text_top_margin'             => '',
			'link'                        => '',
			'target'                      => '_self',
			'text_padding'                => '',
			'enable_icon_box'             =>''
		);
		$default_atts = array_merge( $default_atts, nigiri_elated_icon_collections()->getShortcodeParams() );
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		
		$params['icon_parameters'] = $this->getIconParameters( $params );
		$params['holder_classes']  = $this->getHolderClasses( $params );
		$params['content_styles']  = $this->getContentStyles( $params );
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['text_styles']     = $this->getTextStyles( $params );
		$params['target']          = ! empty( $params['target'] ) ? $params['target'] : $default_atts['target'];
		
		return nigiri_core_get_shortcode_module_template_part( 'templates/iwt', 'icon-with-text', $params['type'], $params );
	}
	
	private function getIconParameters( $params ) {
		$params_array = array();
		
		if ( empty( $params['custom_icon'] ) ) {
			$iconPackName = nigiri_elated_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
			
			$params_array['icon_pack']     = $params['icon_pack'];
			$params_array[ $iconPackName ] = $params[ $iconPackName ];
			
			if ( ! empty( $params['icon_size'] ) ) {
				$params_array['size'] = $params['icon_size'];
			}
			
			if ( ! empty( $params['custom_icon_size'] ) ) {
				$params_array['custom_size'] = nigiri_elated_filter_px( $params['custom_icon_size'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_type'] ) ) {
				$params_array['type'] = $params['icon_type'];
			}
			
			if ( ! empty( $params['shape_size'] ) ) {
				$params_array['shape_size'] = nigiri_elated_filter_px( $params['shape_size'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_border_color'] ) ) {
				$params_array['border_color'] = $params['icon_border_color'];
			}
			
			if ( ! empty( $params['icon_border_hover_color'] ) ) {
				$params_array['hover_border_color'] = $params['icon_border_hover_color'];
			}
			
			if ( $params['icon_border_width'] !== '' ) {
				$params_array['border_width'] = nigiri_elated_filter_px( $params['icon_border_width'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_background_color'] ) ) {
				$params_array['background_color'] = $params['icon_background_color'];
			}
			
			if ( ! empty( $params['icon_hover_background_color'] ) ) {
				$params_array['hover_background_color'] = $params['icon_hover_background_color'];
			}

			if ( ! empty( $params['icon_margin'])) {
				$params_array['margin'] = $params['icon_margin'];
			}
			
			$params_array['icon_color'] = $params['icon_color'];
			
			if ( ! empty( $params['icon_hover_color'] ) ) {
				$params_array['hover_icon_color'] = $params['icon_hover_color'];
			}
			
			$params_array['icon_animation']       = $params['icon_animation'];
			$params_array['icon_animation_delay'] = $params['icon_animation_delay'];
		}
		
		return $params_array;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array( 'eltdf-iwt', 'clearfix' );
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'eltdf-iwt-' . $params['type'] : '';
		$holderClasses[] = ! empty( $params['icon_size'] ) ? 'eltdf-iwt-' . str_replace( 'eltdf-', '', $params['icon_size'] ) : '';

		if ( $params['enable_icon_box'] === 'yes' ) {
			$holderClasses[] = 'eltdf-iwt-has-border-box';
		}
		
		return $holderClasses;
	}
	
	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['text_padding'] !== '' && $params['type'] === 'icon-left' ) {
			$styles[] = 'padding-left: ' . nigiri_elated_filter_px( $params['text_padding'] ) . 'px';
		}
		
		if ( $params['text_padding'] !== '' && $params['type'] === 'icon-top' ) {
			$styles[] = 'padding-top: ' . nigiri_elated_filter_px( $params['text_padding'] ) . 'px';
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

		if ( ! empty( $params['text_style'] ) ) {
			$styles[] = 'font-style: ' . $params['text_style'];
		}

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . nigiri_elated_filter_px( $params['text_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}