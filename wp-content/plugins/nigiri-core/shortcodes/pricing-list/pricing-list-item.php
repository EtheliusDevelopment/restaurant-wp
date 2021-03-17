<?php
namespace NigiriCore\CPT\Shortcodes\PricingListItem;

use NigiriCore\Lib;

class PricingListItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_list_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Pricing List Item', 'nigiri-core'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-list-item extended-custom-icon',
			'category' => esc_html__('by NIGIRI', 'nigiri-core'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'offbeat_pricing_list'),
			'params' => array(
				array(
					'type'        => 'attach_image',
					'param_name'  => 'image',
					'heading'     => esc_html__('Image', 'nigiri-core'),
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'title',
					'heading'     => esc_html__('Title', 'nigiri-core'),
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'description',
					'heading'     => esc_html__('Description', 'nigiri-core'),
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'price',
					'heading'    => esc_html__('Price', 'nigiri-core')
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'link',
					'heading'    => esc_html__('Item Link', 'nigiri-core'),
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'target',
					'heading'     => esc_html__('Link Target', 'nigiri-core'),
					'value'       => array_flip(nigiri_elated_get_link_target_array())
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'active',
					'heading'     => esc_html__('Set this item as active', 'nigiri-core'),
					'value'       => array_flip(nigiri_elated_get_yes_no_select_array(false, false))
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'transform',
					'heading'     => esc_html__('Title Transform', 'nigiri-core'),
					'value'       => array_flip(nigiri_elated_get_text_transform_array(true))
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_title',
					'heading'    => esc_html__('Title Color', 'nigiri-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_description',
					'heading'    => esc_html__('Description Color', 'nigiri-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_price',
					'heading'    => esc_html__('Price Color', 'nigiri-core'),
					'group'      => 'Style'
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'color_separator',
					'heading'    => esc_html__('Separator Color', 'nigiri-core'),
					'group'      => 'Style'
				),
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'image'             => '',
			'title'             => '',
			'description'       => '',
			'price'             => '',
			'link'              => '',
			'target'            => '_self',
			'active'            => 'no',
			'transform'         => '',
			'color_title'       => '',
			'color_description' => '',
			'color_price'       => '',
			'color_separator'   => ''
		);
		
		$params = shortcode_atts($args, $atts);
		
		$params['title_styles']     = $this->getPricingListItemTitleStyles($params);
		$params['desc_styles']      = $this->getPricingListItemDescStyles($params);
		$params['price_styles']     = $this->getPricingListItemPriceStyles($params);
		$params['separator_styles'] = $this->getPricingListItemSeparatorStyles($params);

		extract($params);

		$html = nigiri_core_get_shortcode_module_template_part('templates/pricing-list-item', 'pricing-list', '', $params);
		
		return $html;
	}
	

	private function getPricingListItemTitleStyles($params) {
		$styles = array();

		if(!empty($params['color_title'])) {
			$styles[] = 'color: '.$params['color_title'];
		}

		if(!empty($params['transform'])) {
			$styles[] = 'text-transform: '.$params['transform'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemDescStyles($params) {
		$styles = array();

		if(!empty($params['color_description'])) {
			$styles[] = 'color: '.$params['color_description'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemPriceStyles($params) {
		$styles = array();

		if(!empty($params['color_price'])) {
			$styles[] = 'color: '.$params['color_price'];
		}

		return implode( ';', $styles );
	}

	private function getPricingListItemSeparatorStyles($params) {
		$styles = array();

		if(!empty($params['color_separator'])) {
			$styles[] = 'border-color: '.$params['color_separator'];
		}

		return implode( ';', $styles );
	}
}