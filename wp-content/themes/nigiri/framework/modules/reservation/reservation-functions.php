<?php

/**

 * FUNCTIONS LIST
 * 1)  @see nigiri_elated_get_timetable_shortcode_module_template_part

**/


if ( ! function_exists( 'nigiri_elated_get_reservation_form_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return html
	 * @see nigiri_elated_get_template_part()
	 */
	function nigiri_elated_get_reservation_form_module_template_part( $template, $module, $slug = '', $params = array() ) {

		//HTML Content from template
		$html          = '';
		$template_path = 'framework/modules/reservation/shortcodes/' . $module;

		$temp = $template_path . '/' . $template;

		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}

		$templates = array();

		if ( $temp !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$temp}-{$slug}.php";
			}

			$templates[] = $temp . '.php';
		}
		$located = nigiri_elated_find_template_path( $templates );
		if ( $located ) {
			ob_start();
			include( $located );
			$html = ob_get_clean();
		}

		return $html;
	}
}