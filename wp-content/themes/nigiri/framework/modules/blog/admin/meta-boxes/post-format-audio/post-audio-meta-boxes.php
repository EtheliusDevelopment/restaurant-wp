<?php

if ( ! function_exists( 'nigiri_elated_map_post_audio_meta' ) ) {
	function nigiri_elated_map_post_audio_meta() {
		$audio_post_format_meta_box = nigiri_elated_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'nigiri' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'          => 'eltdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'nigiri' ),
				'description'   => esc_html__( 'Choose audio type', 'nigiri' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'nigiri' ),
					'self'            => esc_html__( 'Self Hosted', 'nigiri' )
				)
			)
		);
		
		$eltdf_audio_embedded_container = nigiri_elated_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'eltdf_audio_embedded_container'
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'nigiri' ),
				'description' => esc_html__( 'Enter audio URL', 'nigiri' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		nigiri_elated_create_meta_box_field(
			array(
				'name'        => 'eltdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'nigiri' ),
				'description' => esc_html__( 'Enter audio link', 'nigiri' ),
				'parent'      => $eltdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'eltdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'nigiri_elated_action_meta_boxes_map', 'nigiri_elated_map_post_audio_meta', 23 );
}