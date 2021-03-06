<?php

if ( ! function_exists( 'nigiri_core_load_widget_class' ) ) {
    /**
     * Loades widget class file.
     */
    function nigiri_core_load_widget_class() {
        include_once 'widget-class.php';
    }

    add_action( 'nigiri_elated_action_before_options_map', 'nigiri_core_load_widget_class' );
}

if ( ! function_exists( 'nigiri_core_load_widgets' ) ) {
    /**
     * Loades all widgets by going through all folders that are placed directly in widgets folder
     * and loads load.php file in each. Hooks to nigiri_elated_action_before_options_map_map action
     */
    function nigiri_core_load_widgets() {

        if ( nigiri_core_theme_installed() ) {
            foreach ( glob( ELATED_FRAMEWORK_ROOT_DIR . '/modules/widgets/*/load.php' ) as $widget_load ) {
                include_once $widget_load;
            }
        }

        include_once 'widget-loader.php';
    }

    add_action( 'nigiri_elated_action_before_options_map', 'nigiri_core_load_widgets' );
}