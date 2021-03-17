<?php
namespace NigiriCore\CPT\Shortcodes\InfoBox;

use NigiriCore\Lib;

class InfoBox implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_info_box';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Info Box', 'nigiri-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'icon'                      => 'icon-wpb-info-box extended-custom-icon',
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
							'heading'     => esc_html__( 'Image', 'nigiri-core' ),
							'description' => esc_html__( 'Select image from media library', 'nigiri-core' )
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
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'subtitle',
							'heading'    => esc_html__( 'Subtitle', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'subtitle_tag',
							'heading'     => esc_html__( 'Subtitle Tag', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'subtitle', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'nigiri-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'signature_image',
							'heading'     => esc_html__( 'Signature Image', 'nigiri-core' ),
							'description' => esc_html__( 'Select image from media library', 'nigiri-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_button',
							'heading'    => esc_html__( 'Enable Button', 'nigiri-core' ),
							'value'      => array_flip( nigiri_elated_get_yes_no_select_array( false ) )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'button_text',
							'heading'    => esc_html__( 'Button Text', 'nigiri-core' ),
							'description' => esc_html__( 'Default value is "Buton Text" ', 'nigiri-core' ),
							'dependency' => Array( 'element' => 'enable_button', 'value' => 'yes' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'custom_link',
							'heading'    => esc_html__( 'Custom Link', 'nigiri-core' ),
							'dependency' => Array( 'element' => 'enable_button', 'value' => 'yes' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'custom_link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'nigiri-core' ),
							'value'      => array_flip( nigiri_elated_get_link_target_array() ),
							'dependency' => Array( 'element' => 'custom_link', 'not_empty' => true ) 
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_appear_animation',
							'heading'     => esc_html__( 'Enable Appear Animation', 'nigiri-core' ),
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
			'title'                   => '',
			'title_tag'               => 'h2',
			'title_color'             => '',
			'subtitle'                => '',
			'subtitle_tag'            => 'h6',
			'subtitle_color'          => '',
			'signature_image'         => '',
			'enable_button'           => '',
			'button_text'             => 'Button Text',
			'custom_link'             => '',
			'custom_link_target'      => '_self',
			'enable_appear_animation' => 'no',

		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['image']              = $this->getImage( $params );
		$params['signature_image']    = $this->getSignatureImage( $params );
		$params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];
		$params['title_tag']          = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']       = $this->getTitleStyles( $params );
		$params['subtitle_tag']       = ! empty( $params['subtitle_tag'] ) ? $params['subtitle_tag'] : $args['subtitle_tag'];
		$params['subtitle_styles']    = $this->getSubtitleStyles( $params );
		
		
		$html = nigiri_core_get_shortcode_module_template_part( 'templates/info-box', 'info-box', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['enable_appear_animation'] === 'yes' ? 'eltdf-appear-animation' : '';
		
		return implode( ' ', $holderClasses );
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

	private function getSignatureImage( $params ) {
		$signature_image = array();
		
		if ( ! empty( $params['signature_image'] ) ) {
			$id = $params['signature_image'];
			
			$signature_image['image_id'] = $id;
			$signature_image_original    = wp_get_attachment_image_src( $id, 'full' );
			$signature_image['url']      = $signature_image_original[0];
			$signature_image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $signature_image;
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
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		return implode( ';', $styles );
	}
}