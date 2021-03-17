<?php

if ( ! function_exists( 'nigiri_elated_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function nigiri_elated_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'NigiriElatedClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'nigiri_core_filter_register_widgets', 'nigiri_elated_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'nigiri_elated_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function nigiri_elated_get_dropdown_cart_icon_class() {
		$classes = array(
			'eltdf-header-cart'
		);
		
		$classes[] = nigiri_elated_get_icon_sources_class( 'dropdown_cart', 'eltdf-header-cart' );
		
		return $classes;
	}
}