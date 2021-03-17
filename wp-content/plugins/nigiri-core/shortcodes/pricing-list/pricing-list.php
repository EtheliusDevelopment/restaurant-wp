<?php
namespace NigiriCore\CPT\Shortcodes\PricingList;

use NigiriCore\Lib;

class PricingList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_list';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                    => esc_html__( 'Pricing list', 'nigiri-core' ),
				'base'                    => $this->base,
				'as_parent'               => array( 'only' => 'eltdf_pricing_list_item' ),
				'content_element'         => true,
				'category'                => esc_html__( 'by NIGIRI', 'nigiri-core' ),
				'icon'                    => 'icon-wpb-pricing-list extended-custom-icon',
				'show_settings_on_create' => true,
				'js_view'                 => 'VcColumnView',
				'params'                  => array(
					array(
						'type'        => 'dropdown',
						'param_name'  => 'skin',
						'heading'     => esc_html__('Skin', 'nigiri-core'),
						'value'       => array(
							esc_html__( 'Dark', 'nigiri-core' )   => '',
							esc_html__( 'Light', 'nigiri-core' )  => 'eltdf-pli-light'
						),
						'save_always' => true
					),
					array(
						'type'       => 'attach_image',
						'param_name' => 'pricing_list_background_image',
						'heading'    => esc_html__( 'Pricing List Background Image', 'nigiri-core' )
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'item_space',
						'heading'     => esc_html__('Space between items', 'nigiri-core'),
						'value'       => array(
							esc_html__( 'Normal', 'nigiri-core' ) => 'eltdf-pli-normal-space',
							esc_html__( 'Large', 'nigiri-core' )  => 'eltdf-pli-large-space'
						),
						'save_always' => true
					),
				)
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array(
			'skin'        					=> '',
			'pricing_list_background_image' => '',
			'item_space'  				    => 'eltdf-pli-normal-space'
		);

		$params = shortcode_atts($args, $atts);

		$params['title_holder_styles'] = $this->getTitleHolderStyles($params);
		$params['holder_class']        = $this->getHolderClass($params);
		$params['holder_styles']        = $this->getHolderStyles( $params );
		$params['content']             = $content;
		
		$html = nigiri_core_get_shortcode_module_template_part('templates/pricing-list', 'pricing-list', '', $params);

		return $html;
	}

	private function getTitleHolderStyles($params) {
		$styles = array();

		if(!empty($params['title_align'])) {
			$styles[] = 'text-align: '. $params['title_align'];
		}

		return implode( ';', $styles );
	}

	private function getHolderClass($params) {
		$class = array();

		if(!empty($params['skin'])) {
			$class[] = $params['skin'];
		}

		if(!empty($params['item_space'])) {
			$class[] = $params['item_space'];
		}

		return implode( ' ', $class );
	}

	private function getHolderStyles( $params ) {
		$itemStyle = array();

		$background_image_url = '';

		$background_image_url = wp_get_attachment_url( $params['pricing_list_background_image'] );

		if ( ! empty( $params['pricing_list_background_image'] ) ) {
			$itemStyle[] = 'background-image:url(' . $background_image_url .')';
			$itemStyle[] = 'background-position: center center';
			$itemStyle[] = 'background-repeat: no-repeat';
			$itemStyle[] = 'background-size: cover';
		}
		
		return implode( ';', $itemStyle );
	}
}