<?php
namespace NigiriCore\CPT\Shortcodes\VerticalSplitSliderLeftPanel;

use NigiriCore\Lib;

class VerticalSplitSliderLeftPanel implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_vertical_split_slider_left_panel';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Left Sliding Panel', 'nigiri-core' ),
					'base'                    => $this->base,
					'as_parent'               => array( 'only' => 'eltdf_vertical_split_slider_content_item' ),
					'as_child'                => array( 'only' => 'eltdf_vertical_split_slider' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by NIGIRI', 'nigiri-core' ),
					'icon'                    => 'icon-wpb-vertical-split-slider-left-panel extended-custom-icon',
					'show_settings_on_create' => false,
					'js_view'                 => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'right_interspace',
							'heading'     => esc_html__( 'Right Interspace (px)', 'nigiri-core' ),
							'description' => esc_html__( 'Enter value in px to define right interspace', 'nigiri-core' )
						),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'right_interspace' => ''
		);
		$params = shortcode_atts( $args, $atts );

		$left_slider_styles = array();
		if ( ! empty( $params['right_interspace'] ) ) {
			$left_slider_styles[] = 'padding-right: ' . nigiri_elated_filter_px( $params['right_interspace'] ) . 'px';
		}

		$html = '<div class="eltdf-vss-ms-left" ' . nigiri_elated_get_inline_style( $left_slider_styles ) . '>';
			$html .= do_shortcode( $content );
		$html .= '</div>';
		
		return $html;
	}
}
