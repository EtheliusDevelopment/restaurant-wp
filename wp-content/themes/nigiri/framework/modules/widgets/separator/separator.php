<?php

class NigiriElatedClassSeparatorWidget extends NigiriElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_separator_widget',
			esc_html__( 'Nigiri Separator Widget', 'nigiri' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'nigiri' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'nigiri' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'nigiri' ),
					'full-width' => esc_html__( 'Full Width', 'nigiri' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'nigiri' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'nigiri' ),
					'left'   => esc_html__( 'Left', 'nigiri' ),
					'right'  => esc_html__( 'Right', 'nigiri' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'nigiri' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'nigiri' ),
					'dashed' => esc_html__( 'Dashed', 'nigiri' ),
					'dotted' => esc_html__( 'Dotted', 'nigiri' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'nigiri' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'nigiri' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'nigiri' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'nigiri' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'nigiri' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget eltdf-separator-widget">';
			echo do_shortcode( "[eltdf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}