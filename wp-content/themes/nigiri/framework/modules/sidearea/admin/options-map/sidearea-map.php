<?php

if ( ! function_exists( 'nigiri_elated_sidearea_options_map' ) ) {
	function nigiri_elated_sidearea_options_map() {

        nigiri_elated_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'nigiri'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = nigiri_elated_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'nigiri'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'nigiri'),
                'description'   => esc_html__('Choose a type of Side Area', 'nigiri'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'nigiri'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'nigiri'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'nigiri'),
                ),
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'nigiri'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'nigiri'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = nigiri_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'nigiri'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'nigiri'),
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'nigiri'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'nigiri'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'nigiri'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'nigiri'),
                'options'       => nigiri_elated_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = nigiri_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'nigiri'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'nigiri'),
                'options'       => nigiri_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = nigiri_elated_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'nigiri'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'nigiri'),
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'nigiri'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'nigiri'),
            )
        );

        $side_area_icon_style_group = nigiri_elated_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'nigiri'),
                'description' => esc_html__('Define styles for Side Area icon', 'nigiri')
            )
        );

        $side_area_icon_style_row1 = nigiri_elated_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'nigiri')
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'nigiri')
            )
        );

        $side_area_icon_style_row2 = nigiri_elated_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'nigiri')
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'nigiri')
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'nigiri'),
                'description' => esc_html__('Choose a background color for Side Area', 'nigiri')
            )
        );

        nigiri_elated_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_background_image',
				'label'       => esc_html__( 'Background Image', 'nigiri' ),
				'description' => esc_html__( 'Choose a background image for Side Area', 'nigiri' )
			)
		);

        nigiri_elated_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'nigiri'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'nigiri'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        nigiri_elated_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'nigiri'),
                'description'   => esc_html__('Choose text alignment for side area', 'nigiri'),
                'options'       => array(
                    ''       => esc_html__('Default', 'nigiri'),
                    'left'   => esc_html__('Left', 'nigiri'),
                    'center' => esc_html__('Center', 'nigiri'),
                    'right'  => esc_html__('Right', 'nigiri')
                )
            )
        );
    }

    add_action('nigiri_elated_action_options_map', 'nigiri_elated_sidearea_options_map', nigiri_elated_set_options_map_position( 'sidearea' ) );
}