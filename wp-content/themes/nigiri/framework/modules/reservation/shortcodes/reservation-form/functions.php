<?php

if(!function_exists('nigiri_elated_add_reservation_form_shortcodes')) {
	function nigiri_elated_add_reservation_form_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'NigiriCore\CPT\Shortcodes\ReservationForm\ReservationForm'
		);

		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);

		return $shortcodes_class_name;
	}

	if(nigiri_elated_core_plugin_installed()) {
		add_filter('nigiri_core_filter_add_vc_shortcode', 'nigiri_elated_add_reservation_form_shortcodes');
	}
}