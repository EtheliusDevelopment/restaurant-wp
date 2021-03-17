<?php

class NigiriElatedClassButtonWidget extends NigiriElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_button_widget',
			esc_html__( 'Nigiri Button Widget', 'nigiri' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'nigiri' ) )
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
					'solid'   => esc_html__( 'Solid', 'nigiri' ),
					'outline' => esc_html__( 'Outline', 'nigiri' ),
					'simple'  => esc_html__( 'Simple', 'nigiri' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'nigiri' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'nigiri' ),
					'medium' => esc_html__( 'Medium', 'nigiri' ),
					'large'  => esc_html__( 'Large', 'nigiri' ),
					'huge'   => esc_html__( 'Huge', 'nigiri' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'nigiri' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'nigiri' ),
				'default' => esc_html__( 'Button Text', 'nigiri' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'nigiri' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'nigiri' ),
				'options' => nigiri_elated_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'nigiri' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'nigiri' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'nigiri' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'nigiri' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'nigiri' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'nigiri' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'nigiri' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'nigiri' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'nigiri' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'nigiri' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'nigiri' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'nigiri' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget eltdf-button-widget">';
			echo do_shortcode( "[eltdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}