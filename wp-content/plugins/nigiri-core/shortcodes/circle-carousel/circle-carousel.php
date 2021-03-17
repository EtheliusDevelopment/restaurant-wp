<?php
namespace NigiriCore\CPT\Shortcodes\CircleCarousel;

use NigiriCore\Lib;

class CircleCarousel implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_circle_carousel';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name'     => esc_html__( 'Circle Carousel', 'nigiri-core' ),
			'base'     => $this->getBase(),
			'category' => esc_html__( 'by NIGIRI', 'nigiri-core' ),
			'icon'     => 'icon-wpb-circle-carousel extended-custom-icon',
			'params'   => array(
				array(
					'type'			=> 'attach_images',
					'param_name'	=> 'images',
					'heading'		=>  esc_html__('Images', 'nigiri-core'),
					'description'	=> esc_html__('Select images from media library', 'nigiri-core')
				),
				array(
					'type'			=> 'textfield',
					'param_name'	=> 'image_size',
					'heading'		=> esc_html__('Image Size', 'nigiri-core'),
					'description'	=> esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'nigiri-core')
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'slider_height',
					'heading'     => esc_html__( 'Carousel Height (px)', 'nigiri-core' ),
					'description' => esc_html__( 'Default value is 500', 'nigiri-core' )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'autoplay',
					'heading'     => esc_html__( 'Carousel Auto Play (ms)', 'nigiri-core' ),
					'description' => esc_html__( 'The speed in milliseconds to wait before auto-rotating. Positive value for a left to right movement, negative for a right to left. Zero to turn off. Default value is 3000.', 'nigiri-core' )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'speed',
					'heading'     => esc_html__( 'Carousel Speed (ms)', 'nigiri-core' ),
					'description' => esc_html__( 'Time in milliseconds it takes to rotate the carousel. Default value is 800.', 'nigiri-core' )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'separation',
					'heading'     => esc_html__( 'Carousel Separation (px)', 'nigiri-core' ),
					'description' => esc_html__( 'The amount if pixels to separate each item from one another. Default value is 80.', 'nigiri-core' )
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'flanking_items',
					'heading'     => esc_html__( 'Carousel Flanking Items', 'nigiri-core' ),
					'description' => esc_html__( 'The amount of visible images on either side of the center item at any time. Default value is 2.', 'nigiri-core' ),
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'edge_fade_enabled',
					'heading'     => esc_html__( 'Enable Carousel Edge Fade', 'nigiri-core' ),
					'description' => esc_html__( 'When true, items fade off into nothingness when reaching the edge. Otherwise, they will move to a hidden position behind the center item.', 'nigiri-core' ),
					'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
					'save_always' => true
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'size_multiplier',
					'heading'     => esc_html__( 'Carousel Multiplier Size', 'nigiri-core' ),
					'description' => esc_html__( 'How much the items should increase/decrease by as they span out (a value of 0.5 will reduce each items size by half). Default value is 0.8.', 'nigiri-core' )
				),
				array(
                    'type'        => 'dropdown',
                    'param_name'  => 'navigation',
                    'heading'     => esc_html__('Enable Carousel Navigation', 'nigiri-core'),
                    'value'       => array_flip( nigiri_elated_get_yes_no_select_array( false, true ) ),
                    'save_always' => true,
                )
			)
		));
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'images'            => '',
			'image_size'        => 'thumbnail',
			'slider_height'     => '500',
			'autoplay'          => '3000',
			'speed'             => '800',
			'separation'        => '80',
			'flanking_items'    => '',
			'edge_fade_enabled' => 'false',
			'size_multiplier'   => '',
			'navigation'        => 'yes'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['image_size']  = $this->getImageSize( $params['image_size'] );
		$params['images']      = $this->getGalleryImages( $params );
		$params['slider_data'] = $this->getSliderData( $params, $args );
		
		$html = nigiri_core_get_shortcode_module_template_part( 'templates/circle-carousel-template', 'circle-carousel', '', $params );
		
		return $html;
	}
	
	private function getSliderData( $params, $args ) {
		
		$slider_data                         = array();
		$slider_data['data-height']          = ! empty( $params['slider_height'] ) ? nigiri_elated_filter_px( $params['slider_height'] ) : nigiri_elated_filter_px( $args['slider_height'] );
		$slider_data['data-autoplay']        = $params['autoplay'] !== '' ? $params['autoplay'] : $args['autoplay'];
		$slider_data['data-speed']           = ! empty( $params['speed'] ) ? $params['speed'] : $args['speed'];
		$slider_data['data-separation']      = ! empty( $params['separation'] ) ? nigiri_elated_filter_px( $params['separation'] ) : nigiri_elated_filter_px( $args['separation'] );
		$slider_data['data-flankingitems']   = ! empty( $params['flanking_items'] ) ? $params['flanking_items'] : $args['flanking_items'];
		$slider_data['data-edgefadeenabled'] = ! empty( $params['edge_fade_enabled'] ) ? $params['edge_fade_enabled'] : $args['edge_fade_enabled'];
		$slider_data['data-sizemultiplier']  = ! empty( $params['size_multiplier'] ) ? $params['size_multiplier'] : $args['size_multiplier'];
		$slider_data['data-navigation']      = ! empty( $params['navigation'] ) ? $params['navigation'] : $args['navigation'];
		
		return $slider_data;
	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {

		$images = array();

		if ($params['images'] !== '') {

			$size = $params['image_size'];
			$image_ids = explode(',', $params['images']);

			foreach ($image_ids as $id) {

				$img = wp_get_attachment_image_src($id, $size);

				$image['url'] = $img[0];
				$image['width'] = $img[1];
				$image['height'] = $img[2];
				$image['title'] = get_the_title($id);

				$images[] = $image;
			}
		}

		return $images;
	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		//Remove whitespaces
		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if ( !empty($matches[0]) ) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} elseif ( in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full') )) {
			return $image_size;
		} else {
			return 'thumbnail';
		}
	}
}