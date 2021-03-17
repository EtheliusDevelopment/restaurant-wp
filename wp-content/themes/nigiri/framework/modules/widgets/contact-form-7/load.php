<?php

if ( nigiri_elated_contact_form_7_installed() ) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_cf7_widget' );
}

if ( ! function_exists( 'nigiri_elated_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function nigiri_elated_register_cf7_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassContactForm7Widget';
		
		return $widgets;
	}
}