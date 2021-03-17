<?php

if ( ! function_exists( 'nigiri_elated_footer_options_map' ) ) {
	function nigiri_elated_footer_options_map() {

		nigiri_elated_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'nigiri' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = nigiri_elated_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'nigiri' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

        nigiri_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'nigiri' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'nigiri' ),
                'parent'        => $footer_panel,
            )
        );

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'nigiri' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = nigiri_elated_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_top_in_grid',
				'parent'        => $show_footer_top_container,
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer Top in Grid', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will place Footer Top content in grid', 'nigiri' )
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4 4 4',
				'label'         => esc_html__( 'Footer Top Columns', 'nigiri' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'nigiri' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'nigiri' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'nigiri' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'nigiri' ),
					'left'   => esc_html__( 'Left', 'nigiri' ),
					'center' => esc_html__( 'Center', 'nigiri' ),
					'right'  => esc_html__( 'Right', 'nigiri' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'nigiri' ),
				'description' => esc_html__( 'Set background color for top footer area', 'nigiri' ),
				'parent'      => $show_footer_top_container
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'nigiri' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = nigiri_elated_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_bottom_in_grid',
				'parent'        => $show_footer_bottom_container,
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer Bottom in Grid', 'nigiri' ),
				'description'   => esc_html__( 'Enabling this option will place Footer Bottom content in grid', 'nigiri' )
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Bottom Columns', 'nigiri' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'nigiri' ),
				'options'       => array(
					'12'    => '1',
					'6 6'   => '2',
					'4 4 4' => '3',
					'3 3 3 3' => '4'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		nigiri_elated_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'nigiri' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'nigiri' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'nigiri_elated_action_options_map', 'nigiri_elated_footer_options_map', nigiri_elated_set_options_map_position( 'footer' ) );
}