<?php

if ( ! function_exists( 'nigiri_elated_get_subscribe_popup' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function nigiri_elated_get_subscribe_popup() {
		
		if ( nigiri_elated_options()->getOptionValue( 'enable_subscribe_popup' ) === 'yes' && ( nigiri_elated_options()->getOptionValue( 'subscribe_popup_contact_form' ) !== '' || nigiri_elated_options()->getOptionValue( 'subscribe_popup_title' ) !== '' ) ) {
			nigiri_elated_load_subscribe_popup_template();
		}
	}
	
	//Get subscribe popup HTML
	add_action( 'nigiri_elated_action_before_page_header', 'nigiri_elated_get_subscribe_popup' );
}

if ( ! function_exists( 'nigiri_elated_load_subscribe_popup_template' ) ) {
	/**
	 * Loads HTML template with parameters
	 */
	function nigiri_elated_load_subscribe_popup_template() {
		$parameters                       = array();
		$parameters['title']              = nigiri_elated_options()->getOptionValue( 'subscribe_popup_title' );
		$parameters['subtitle']           = nigiri_elated_options()->getOptionValue( 'subscribe_popup_subtitle' );
		$background_image_meta            = nigiri_elated_options()->getOptionValue( 'subscribe_popup_background_image' );
		$parameters['background_styles']  = ! empty( $background_image_meta ) ? 'background-image: url(' . esc_url( $background_image_meta ) . ')' : '';
		$parameters['contact_form']       = nigiri_elated_options()->getOptionValue( 'subscribe_popup_contact_form' );
		$parameters['contact_form_style'] = nigiri_elated_options()->getOptionValue( 'subscribe_popup_contact_form_style' );
		$parameters['enable_prevent']     = nigiri_elated_options()->getOptionValue( 'enable_subscribe_popup_prevent' );
		$parameters['prevent_behavior']   = nigiri_elated_options()->getOptionValue( 'subscribe_popup_prevent_behavior' );
		
		$holder_classes   = array();
		$holder_classes[] = $parameters['enable_prevent'] === 'yes' ? 'eltdf-prevent-enable' : 'eltdf-prevent-disable';
		$holder_classes[] = ! empty( $parameters['prevent_behavior'] ) ? 'eltdf-prevent-' . $parameters['prevent_behavior'] : 'eltdf-prevent-session';
		$holder_classes[] = ! empty( $background_image_meta ) ? 'eltdf-sp-has-image' : '';
		
		$parameters['holder_classes'] = implode( ' ', $holder_classes );
		
		nigiri_elated_get_module_template_part( 'templates/subscribe-popup', 'subscribe-popup', '', $parameters );
	}
}