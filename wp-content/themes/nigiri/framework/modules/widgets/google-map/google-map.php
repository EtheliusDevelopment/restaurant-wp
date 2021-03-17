<?php

class NigiriElatedClassGoogleMapWidget extends NigiriElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_google_map_widget',
			esc_html__( 'Nigiri Google Map Widget', 'nigiri' ),
			array( 'description' => esc_html__( 'Add a google map element to your widget areas', 'nigiri' ) )
		);
		
		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'nigiri' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'address1',
				'title' => esc_html__( 'Address', 'nigiri' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'pin',
				'title'       => esc_html__( 'Pin', 'nigiri' ),
				'description' => esc_html__( 'Set url to a pin image to be used on Google Map', 'nigiri' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'enable_snazzy_map_code',
				'title'   => esc_html__( 'Enable Predefined Snazzy Map', 'nigiri' ),
				'options' => nigiri_elated_get_yes_no_select_array( false )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'map_height',
				'title' => esc_html__( 'Map Height', 'nigiri' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$pin_id = nigiri_elated_get_attachment_id_from_url( $instance['pin'] );
		$instance['pin'] = $pin_id;

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
		?>
		<div class="widget eltdf-google-map-widget">
			<?php if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			echo do_shortcode( "[eltdf_google_map $params]" ); // XSS OK
		?>
		</div>
	<?php }
}