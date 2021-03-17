<?php

if ( ! function_exists( 'nigiri_elated_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function nigiri_elated_reset_options_map() {
		
		nigiri_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'nigiri' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = nigiri_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'nigiri' )
			)
		);
		
		nigiri_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'nigiri' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'nigiri' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'nigiri_elated_action_options_map', 'nigiri_elated_reset_options_map', nigiri_elated_set_options_map_position( 'reset' ) );
}