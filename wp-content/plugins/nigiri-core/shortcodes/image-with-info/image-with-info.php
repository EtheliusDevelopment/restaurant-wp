<?php
namespace NigiriCore\CPT\Shortcodes\ImageWithInfo;

use NigiriCore\Lib;

class ImageWithInfo implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_image_with_info';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Image With Info', 'nigiri-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'icon'                      => 'icon-wpb-image-with-info extended-custom-icon',
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
							'type'        => 'dropdown',
							'param_name'  => 'enable_image_shadow',
							'heading'     => esc_html__( 'Enable Image Shadow', 'nigiri-core' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false ) ),
							'save_always' => true
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
							'value'      => array_flip( nigiri_elated_get_link_target_array() ),
							'dependency' => array( 'element' => 'custom_link', 'not_empty' => true )
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
							'type'       => 'dropdown',
							'param_name' => 'title_position',
							'heading'    => esc_html__( 'Title Position', 'nigiri-core' ),
							'value'      => array(
								esc_html__( 'Left', 'nigiri-core' )    => 'eltdf-title-left',
								esc_html__( 'Top', 'nigiri-core' ) 	 => 'eltdf-title-top',
								esc_html__( 'Right', 'nigiri-core' )   => 'eltdf-title-right',
								esc_html__( 'Bottom', 'nigiri-core' )  => 'eltdf-title-bottom'
							)
						),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'        => '',
			'image'               => '',
			'enable_image_shadow' => 'no',
			'custom_link'         => '',
			'custom_link_target'  => '_self',
			'title'               => '',
			'title_tag'           => 'h4',
			'title_color'         => '',
			'title_top_margin'    => '',
			'title_position'      => 'eltdf-title-left'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['image']              = $this->getImage( $params );
		$params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];
		$params['title_tag']          = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']       = $this->getTitleStyles( $params );
		
		$html = nigiri_core_get_shortcode_module_template_part( 'templates/image-with-info', 'image-with-info', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['enable_image_shadow'] === 'yes' ? 'eltdf-has-shadow' : '';
		$holderClasses[] = $params['title_position'];
		
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
	
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		return implode( ';', $styles );
	}
}