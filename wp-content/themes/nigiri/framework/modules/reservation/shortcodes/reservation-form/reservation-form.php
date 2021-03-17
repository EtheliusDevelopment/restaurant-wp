<?php
namespace NigiriCore\CPT\Shortcodes\ReservationForm;

use NigiriCore\Lib;

class ReservationForm implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'eltdf_reservation_form';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Reservation Form', 'nigiri'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by NIGIRI', 'nigiri'),
			'icon'                      => 'icon-wpb-reservation-form extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'param_name'  => 'open_table_id',
					'heading'     => esc_html__('OpenTable ID', 'nigiri'),
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'param_name'  => 'skin',
					'heading'     => esc_html__('Skin', 'nigiri'),
					'value'       => array(
						esc_html__( 'Default', 'nigiri' ) => '',
						esc_html__( 'Light', 'nigiri' )   => 'light',
					),
					'save_always' => true,
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'open_table_id' => '',
			'skin'          => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['holder_class'] = $this->holderClass($params);

		if($params['open_table_id'] === '' ) {
			$params['open_table_id'] = nigiri_elated_options()->getOptionValue('open_table_id');
		}

		return nigiri_elated_get_reservation_form_module_template_part('templates/reservation-form', 'reservation-form', '', $params);
	}

	public function holderClass($params) {
		$class = array();

		if ( $params['skin'] !== '' ) {
			$class[] = 'eltdf-rf-' . esc_attr( $params['skin'] );
		}

		return implode( ' ', $class );
	}
}


