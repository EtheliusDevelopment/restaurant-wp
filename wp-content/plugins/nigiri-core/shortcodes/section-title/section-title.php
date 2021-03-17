<?php
namespace NigiriCore\CPT\Shortcodes\SectionTitle;

use NigiriCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_section_title';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Section Title', 'nigiri-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'nigiri-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'nigiri-core' )
						),

						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'nigiri-core' ),
							'value'       => array(
								esc_html__( 'Default', 'nigiri-core' ) => '',
								esc_html__( 'Left', 'nigiri-core' )    => 'left',
								esc_html__( 'Center', 'nigiri-core' )  => 'center',
								esc_html__( 'Right', 'nigiri-core' )   => 'right'
							),
							'save_always' => true,						
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'title_image',
							'heading'     => esc_html__( 'Title Section Image', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding',
							'heading'    => esc_html__( 'Holder Side Padding (px or %)', 'nigiri-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'nigiri-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'signature_image',
							'heading'     => esc_html__( 'Custom Signature Image', 'nigiri-core' )
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
							'group'      => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_bold_words',
							'heading'     => esc_html__( 'Words with Bold Font Weight', 'nigiri-core' ),
							'description' => esc_html__( 'Enter the positions of the words you would like to display in a "bold" font weight. Separate the positions with commas (e.g. if you would like the first, second, and third word to have a light font weight, you would enter "1,2,3")', 'nigiri-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_light_words',
							'heading'     => esc_html__( 'Words with Light Font Weight', 'nigiri-core' ),
							'description' => esc_html__( 'Enter the positions of the words you would like to display in a "light" font weight. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a light font weight, you would enter "1,3,4")', 'nigiri-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_break_words',
							'heading'     => esc_html__( 'Position of Line Break', 'nigiri-core' ),
							'description' => esc_html__( 'Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter "3")', 'nigiri-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_break_words',
							'heading'     => esc_html__( 'Disable Line Break for Smaller Screens', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
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
							'value'       => array_flip( nigiri_elated_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'       => esc_html__( 'Subtitle Style', 'nigiri-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'      => esc_html__( 'Subtitle Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle_font_size',
							'heading'    => esc_html__( 'Subtitle Font Size (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'      => esc_html__( 'Subtitle Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle_line_height',
							'heading'    => esc_html__( 'Subtitle Line Height (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'      => esc_html__( 'Subtitle Style', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'subtitle_font_weight',
							'heading'     => esc_html__( 'Subtitle Font Weight', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'       => esc_html__( 'Subtitle Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle_margin',
							'heading'    => esc_html__( 'Subtitle Bottom Margin (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
							'group'      => esc_html__( 'Subtitle Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_tag',
							'heading'     => esc_html__( 'Text Tag', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_title_tag( true, array( 'p' => 'p', 'div' => 'Custom' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'nigiri-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_font_size',
							'heading'    => esc_html__( 'Text Font Size (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_line_height',
							'heading'    => esc_html__( 'Text Line Height (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_font_weight',
							'heading'     => esc_html__( 'Text Font Weight', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'text', 'not_empty' => true ),
							'group'       => esc_html__( 'Text Style', 'nigiri-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_margin',
							'heading'    => esc_html__( 'Text Bottom Margin (px)', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
							'group'      => esc_html__( 'Text Style', 'nigiri-core' )
						),
						array(
                            'type'        => 'dropdown',
                            'param_name'  => 'enable_button',
                            'heading'     => esc_html__( 'Enable Button', 'nigiri-core' ),
                            'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
                            'save_always' => true,
                            'description' => esc_html__( 'If you set "yes" button will be shown below text area.', 'frappe-core' )
                        ),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'button_text',
                            'heading'     => esc_html__( 'Button Text', 'nigiri-core' ),
                            'description' => esc_html__( 'Enter Button text here. Default is "Button Text".', 'nigiri-core' ),
                            'dependency'  => array( 'element' => 'enable_button', 'value' => 'yes' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'custom_link',
                            'heading'    => esc_html__( 'Custom Link', 'nigiri-core' )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'custom_link_target',
                            'heading'    => esc_html__( 'Custom Link Target', 'nigiri-core' ),
                            'value'      => array_flip( nigiri_elated_get_link_target_array()),
                            'dependency' => array( 'element' => 'custom_link', 'not_empty' => true )
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'        	  => '',
			'position'      	      => '',
			'title_image'             => '',
			'signature_image'         => '',
 			'holder_padding'      	  => '',
			'title'               	  => '',
			'title_tag'           	  => 'h1',
			'title_color'         	  => '',
			'title_bold_words'   	  => '',
			'title_light_words'   	  => '',
			'title_break_words'   	  => '',
			'disable_break_words'	  => '',
			'subtitle'            	  => '',
			'subtitle_tag'        	  => 'h6',
			'subtitle_color'          => '',
			'subtitle_font_size'      => '',
			'subtitle_line_height'    => '',
			'subtitle_font_weight'    => '',
			'subtitle_margin'         => '',
			'text'            	 	  => '',
			'text_tag'        	  	  => 'p',
			'text_color'          	  => '',
			'text_font_size'      	  => '',
			'text_line_height'   	  => '',
			'text_font_weight'    	  => '',
			'text_margin'        	  => '',
			'enable_button'           => '',
			'button_text'             => 'button text',
			'custom_link'             => '',
            'custom_link_target'      => '_self'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] 	   = $this->getHolderClasses( $params );
		$params['holder_styles'] 	   = $this->getHolderStyles( $params );
		$params['title']         	   = $this->getModifiedTitle( $params );
		$params['title_tag']      	   = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']   	   = $this->getTitleStyles( $params );
		$params['subtitle_tag']   	   = ! empty( $params['subtitle_tag'] ) ? $params['subtitle_tag'] : $args['subtitle_tag'];
		$params['subtitle_styles']     = $this->getSubtitleStyles( $params );
		$params['text_tag']   	       = ! empty( $params['text_tag'] ) ? $params['text_tag'] : $args['text_tag'];
		$params['text_styles']    	   = $this->getTextStyles( $params );
		$params['section_title_image'] = $this->getSectionTitleImage( $params );
		$params['signature_image']     = $this->getSignatureImage( $params );
		
		$html = nigiri_core_get_shortcode_module_template_part( 'templates/section-title', 'section-title', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['disable_break_words'] === 'yes' ? 'eltdf-st-disable-title-break' : '';
		$holderClasses[] = ! empty( $params['position'] ) ? 'eltdf-position-' . $params['position'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding: 0 ' . $params['holder_padding'];
		}
		
		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$title_bold_words  = str_replace( ' ', '', $params['title_bold_words'] );
		$title_light_words = str_replace( ' ', '', $params['title_light_words'] );
		$title_break_words = str_replace( ' ', '', $params['title_break_words'] );
		
		if ( ! empty( $title ) ) {
			$bold_words  = explode( ',', $title_bold_words );
			$light_words = explode( ',', $title_light_words );
			$split_title = explode( ' ', $title );
			
			if ( ! empty( $title_bold_words ) ) {
				foreach ( $bold_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="eltdf-st-title-bold">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			if ( ! empty( $title_light_words ) ) {
				foreach ( $light_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="eltdf-st-title-light">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			if ( ! empty( $title_break_words ) ) {
				if ( ! empty( $split_title[ $title_break_words - 1 ] ) ) {
					$split_title[ $title_break_words - 1 ] = $split_title[ $title_break_words - 1 ] . '<br />';
				}
			}
			
			$title = implode( ' ', $split_title );
		}
		
		return $title;
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getSubtitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['subtitle_color'] ) ) {
			$styles[] = 'color: ' . $params['subtitle_color'];
		}
		
		if ( ! empty( $params['subtitle_font_size'] ) ) {
			$styles[] = 'font-size: ' . nigiri_elated_filter_px( $params['subtitle_font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['subtitle_line_height'] ) ) {
			$styles[] = 'line-height: ' . nigiri_elated_filter_px( $params['subtitle_line_height'] ) . 'px';
		}
		
		if ( ! empty( $params['subtitle_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['subtitle_font_weight'];
		}
		
		if ( $params['subtitle_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . nigiri_elated_filter_px( $params['subtitle_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( ! empty( $params['text_font_size'] ) ) {
			$styles[] = 'font-size: ' . nigiri_elated_filter_px( $params['text_font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['text_line_height'] ) ) {
			$styles[] = 'line-height: ' . nigiri_elated_filter_px( $params['text_line_height'] ) . 'px';
		}
		
		if ( ! empty( $params['text_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['text_font_weight'];
		}
		
		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . nigiri_elated_filter_px( $params['text_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getSectionTitleImage($params) {
		$title_image = '';

		$title_image = wp_get_attachment_url( $params['title_image'] );
	
		return  $title_image;
	}

	private function getSignatureImage($params) {
		$signature_image = '';

		$signature_image = wp_get_attachment_url( $params['signature_image'] );
	
		return  $signature_image;
	}
}