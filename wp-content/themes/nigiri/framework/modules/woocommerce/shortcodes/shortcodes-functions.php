<?php

if ( ! function_exists( 'nigiri_elated_include_woocommerce_shortcodes' ) ) {
	function nigiri_elated_include_woocommerce_shortcodes() {
		foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( nigiri_elated_core_plugin_installed() ) {
		add_action( 'nigiri_core_action_include_shortcodes_file', 'nigiri_elated_include_woocommerce_shortcodes' );
	}
}
