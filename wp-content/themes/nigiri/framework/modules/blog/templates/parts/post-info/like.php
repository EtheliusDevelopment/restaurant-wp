<?php if(nigiri_elated_core_plugin_installed()) { ?>
    <div class="eltdf-blog-like">
        <?php if( function_exists('nigiri_elated_get_like') ) nigiri_elated_get_like(); ?>
    </div>
<?php } ?>