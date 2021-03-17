<?php do_action('nigiri_elated_action_after_sticky_header'); ?>

<div class="eltdf-sticky-header">
    <?php do_action('nigiri_elated_action_after_sticky_menu_html_open'); ?>
    <div class="eltdf-sticky-holder">
        <?php if ($sticky_header_in_grid && nigiri_elated_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ) : ?>
        <div class="eltdf-grid">
            <?php endif; ?>
            <div class=" eltdf-vertical-align-containers">
                <div class="eltdf-position-left"><!--
                 --><div class="eltdf-position-left-inner">
                        <?php if (!$hide_logo) {
                            nigiri_elated_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="eltdf-position-right"><!--
                 --><div class="eltdf-position-right-inner">
                        <a href="javascript:void(0)" <?php nigiri_elated_class_attribute( $fullscreen_menu_icon_class ); ?>>
                            <span class="eltdf-fullscreen-menu-close-icon">
                                <?php echo nigiri_elated_get_icon_sources_html( 'fullscreen_menu', true ); ?>
                            </span>
                            <span class="eltdf-fullscreen-menu-opener-icon">
                                <?php echo nigiri_elated_get_icon_sources_html( 'fullscreen_menu' ); ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($sticky_header_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php do_action('nigiri_elated_action_after_sticky_header'); ?>
