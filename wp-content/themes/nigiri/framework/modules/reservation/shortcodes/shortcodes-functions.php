<?php

if(!function_exists('nigiri_elated_include_timetable_shortcodes')) {
	function nigiri_elated_include_timetable_shortcodes() {
		foreach(glob(ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/reservation/shortcodes/*/load.php') as $shortcode_load) {
			include_once $shortcode_load;
		}
	}

	if(nigiri_elated_core_plugin_installed()) {
		add_action('nigiri_core_action_include_shortcodes_file', 'nigiri_elated_include_timetable_shortcodes');
	}
}

if ( ! function_exists( 'nigiri_elated_set_reservation_form_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for blog shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function nigiri_elated_set_reservation_form_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-reservation-form';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( nigiri_elated_core_plugin_installed() ) {
		add_filter( 'nigiri_core_filter_add_vc_shortcodes_custom_icon_class', 'nigiri_elated_set_reservation_form_icon_class_name_for_vc_shortcodes' );
	}
}