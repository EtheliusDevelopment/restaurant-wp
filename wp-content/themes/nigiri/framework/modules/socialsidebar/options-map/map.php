<?php
if(!function_exists('nigiri_elated_social_sidebar_options')){

	function nigiri_elated_social_sidebar_options(){

		$networks = array(
			'tripadvisor' => array(
                'url'   => 'https://www.tripadvisor.com/',
                'title' => esc_html__('Tripadvisor', 'nigiri')
            ),
            'instagram' => array(
				'url'   => 'https://www.instagram.com/',
				'title' => esc_html__('Instagram', 'nigiri')
			),
            'twitter' => array(
                'url'   => 'https://twitter.com/',
                'title' => esc_html__('Twitter', 'nigiri')
            ),
            'facebook' => array(
				'url'   => 'https://www.facebook.com/',
				'title' => esc_html__('Facebook', 'nigiri')
			),
		);
		

		/**
		 * Enable Social Sidebar
		 */
		$social_sidebar = nigiri_elated_add_admin_panel(
			array(
				'title' => esc_html__('Social Sidebar', 'nigiri'),
				'name' => 'social_sidebar',
				'page' => '_social_page'
			)
		);

        nigiri_elated_add_admin_field(array(
			'type' => 'yesno',
			'name' => 'enable_social_sidebar',
			'default_value' => 'no',
			'label' => esc_html__('Enable Social Sidebar', 'nigiri'),
			'description' => esc_html__('Enabling this option will show social sidebar', 'nigiri'),
			'parent' => $social_sidebar
		));

		$social_sidebar_networks = nigiri_elated_add_admin_container(
			array(
				'name'       => 'social_sidebar_networks',
				'parent'     => $social_sidebar,
				'dependency' => array(
					'show' => array(
						'enable_social_sidebar'  => 'yes'
					)
				)
			)
		);

		foreach ($networks as $network_key => $network){

			nigiri_elated_add_admin_field(array(
				'type' => 'text',
				'name' => 'social_sidebar_'.$network_key,
				'default_value' => esc_url($network['url']),
				'label' => esc_attr($network['title']).' '.esc_html__('Url', 'nigiri'),
				'parent' => $social_sidebar_networks
			));

		}

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'social_sidebar_width',
				'default_value' => '',
				'label'         => esc_html__( 'Social Sidebar Width', 'nigiri' ),
				'parent'        => $social_sidebar_networks,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'nigiri' )
				)
			)
		);

		/**
		 * Enable Contact Sidebar
		 */
		$contact_sidebar = nigiri_elated_add_admin_panel(
			array(
				'title' => esc_html__('Contact Sidebar', 'nigiri'),
				'name' => 'contact_sidebar',
				'page' => '_social_page'
			)
		);

        nigiri_elated_add_admin_field(array(
			'type' => 'yesno',
			'name' => 'enable_contact_sidebar',
			'default_value' => 'no',
			'label' => esc_html__('Enable Contact Sidebar', 'nigiri'),
			'description' => esc_html__('Enabling this option will show contact sidebar', 'nigiri'),
			'parent' => $contact_sidebar
		));

		$contact_sidebar_content = nigiri_elated_add_admin_container(
			array(
				'name'       => 'contact_sidebar_content',
				'parent'     => $contact_sidebar,
				'dependency' => array(
					'show' => array(
						'enable_contact_sidebar'  => 'yes'
					)
				)
			)
		);

		nigiri_elated_add_admin_field(array(
			'type' => 'text',
			'name' => 'contact_sidebar_title',
			'default_value' => '',
			'label' => esc_html__('Contact Title', 'nigiri'),
			'parent' => $contact_sidebar_content
		));

		nigiri_elated_add_admin_field(array(
			'type' => 'text',
			'name' => 'contact_sidebar_number',
			'default_value' => '',
			'label' => esc_html__('Contact Number', 'nigiri'),
			'parent' => $contact_sidebar_content
		));

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'contact_sidebar_width',
				'default_value' => '',
				'label'         => esc_html__( 'Contact Sidebar Width', 'nigiri' ),
				'parent'        => $contact_sidebar_content,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'nigiri' )
				)
			)
		);

	}

	add_action('nigiri_elated_action_social_options', 'nigiri_elated_social_sidebar_options');

}