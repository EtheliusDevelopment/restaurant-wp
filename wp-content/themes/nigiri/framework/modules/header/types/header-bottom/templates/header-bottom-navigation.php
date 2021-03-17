<?php do_action('nigiri_elated_action_before_top_navigation'); ?>
<nav class="eltdf-header-bottom-menu eltdf-main-menu eltdf-drop-down">
    <?php
    wp_nav_menu(array(
        'theme_location'  => 'header-bottom-navigation',
        'container'       => '',
        'container_class' => '',
        'menu_class'      => 'clearfix',
        'menu_id'         => '',
        'fallback_cb'     => 'top_navigation_fallback',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'walker'          => new NigiriElatedClassTopNavigationWalker()
    ));
    ?>
</nav>
<?php do_action('nigiri_elated_action_after_top_navigation'); ?>