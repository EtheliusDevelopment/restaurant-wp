<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="eltdf-post-content">
        <div class="eltdf-post-heading">
            <?php nigiri_elated_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="eltdf-post-text">
            <div class="eltdf-post-text-inner">
                <div class="eltdf-post-info-top">
                    <?php nigiri_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    <?php nigiri_elated_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    <?php nigiri_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                </div>
                <div class="eltdf-post-text-main">
                    <?php nigiri_elated_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php the_content(); ?>
                    <?php do_action('nigiri_elated_action_single_link_pages'); ?>
                </div>
	            <?php if(comments_open() || ( nigiri_elated_core_plugin_installed() && function_exists('nigiri_elated_get_like') ) ) { ?>
	                <div class="eltdf-post-info-bottom clearfix">
	                    <div class="eltdf-post-info-bottom-left">
	                        <?php nigiri_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
	                        <?php nigiri_elated_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
	                    </div>
	                    <div class="eltdf-post-info-bottom-right">
	                        <span class="eltdf-blog-list-bottom-line"></span>
	                    </div>
	                </div>
	            <?php } ?>
            </div>
        </div>
    </div>
</article>