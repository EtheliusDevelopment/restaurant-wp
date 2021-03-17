<?php

if ( ! function_exists( 'nigiri_elated_like' ) ) {
	/**
	 * Returns NigiriElatedClassLike instance
	 *
	 * @return NigiriElatedClassLike
	 */
	function nigiri_elated_like() {
		return NigiriElatedClassLike::get_instance();
	}
}

function nigiri_elated_get_like() {
	
	echo wp_kses( nigiri_elated_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}