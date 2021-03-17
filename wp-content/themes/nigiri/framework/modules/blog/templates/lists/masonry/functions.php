<?php

if ( ! function_exists( 'nigiri_elated_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function nigiri_elated_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'nigiri' );
		
		return $templates;
	}
	
	add_filter( 'nigiri_elated_filter_register_blog_templates', 'nigiri_elated_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'nigiri_elated_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function nigiri_elated_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'nigiri' );
		
		return $options;
	}
	
	add_filter( 'nigiri_elated_filter_blog_list_type_global_option', 'nigiri_elated_set_blog_masonry_type_global_option' );
}