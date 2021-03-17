<?php
namespace NigiriCore\CPT\Shortcodes\CaptionOnHover;

use NigiriCore\Lib;

class CaptionOnHover implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_caption_on_hover';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Caption On Hover', 'nigiri-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'icon'                      => 'icon-wpb-caption-on-hover extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'nigiri-core' ),
							'description' => esc_html__( 'Select image from media library', 'nigiri-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'nigiri-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'nigiri-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'caption_behavior',
							'heading'    => esc_html__( 'Caption Behavior', 'nigiri-core' ),
							'value'      => array(
								esc_html__( 'Appear Info', 'nigiri-core' ) => 'appear-info',
								esc_html__( 'Follow Info', 'nigiri-core' ) => 'follow-info'
							)
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
							'value'      => array_flip( nigiri_elated_get_link_target_array() )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'nigiri-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_parallax_title',
							'heading'     => esc_html__( 'Enable Parallax Title', 'edge-core' ),
							'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, false ) ),
							'description' => esc_html__( 'Enabling this option will trigger parallax scrolling effect for title holder.', 'edge-core' ),
							'dependency'  => array( 'element' => 'caption_behavior', 'value' => 'appear-info' ),
							'save_always' => true
						),
						
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_position',
							'heading'     => esc_html__( 'Title Position', 'nigiri-core' ),
							'value'       => array(
								esc_html__( 'Left', 'nigiri-core' )  => 'left',
								esc_html__( 'Right', 'nigiri-core' ) => 'right'
							),
							'dependency'  => array( 'element' => 'caption_behavior', 'value' => 'appear-info' ),
							'save_always' => true
						),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'image'                 => '',
			'image_size'            => 'full',
			'caption_behavior'      => 'appear-info',
			'enable_image_shadow'   => 'no',
			'custom_link'           => '',
			'custom_link_target'    => '_self',
			'title'                 => '',
			'enable_parallax_title' => 'yes',
			'title_position'        => 'left'
		);
		$params = shortcode_atts( $args, $atts );

		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['image']              = $this->getImage( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['caption_behavior']   = ! empty( $params['caption_behavior'] ) ? $params['caption_behavior'] : $args['caption_behavior'];
		$params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];

		
		$params['this_object'] = $this;
		
		$html = nigiri_core_get_shortcode_module_template_part( 'templates/caption-on-hover', 'caption-on-hover', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['caption_behavior'] ) ? 'eltdf-caption-' . $params['caption_behavior'] : '';
		$holderClasses[] = $params['enable_image_shadow'] === 'yes' ? 'eltdf-has-shadow' : '';
		$holderClasses[] = ! empty( $params['title_position'] ) ? 'eltdf-title-' . $params['title_position'] : '';

		if ($params['enable_parallax_title'] == 'yes') {
			$holderClasses[] = 'eltdf-parallax-scroll';
		}
		
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
	
	function getParallaxData( $params ) {
		$itemData = array();
		
		if ($params['enable_parallax_title'] === 'yes') {
			$y_absolute = rand(-50, -70);
			$smoothness = 20; //1 is for linear, non-animated parallax
			
			$itemData['data-parallax']= '{&quot;y&quot;: '.$y_absolute.', &quot;smoothness&quot;: '.$smoothness.'}';
		}
		
		return $itemData;
	}
}