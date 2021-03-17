<?php

if ( ! function_exists( 'nigiri_core_register_widgets' ) ) {
	function nigiri_core_register_widgets() {
		$widgets = apply_filters( 'nigiri_core_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'nigiri_core_register_widgets' );
}