<?php

nigiri_elated_get_single_post_format_html( $blog_single_type );

do_action( 'nigiri_elated_action_after_article_content' );

nigiri_elated_get_module_template_part( 'templates/parts/single/author-info', 'blog' );

nigiri_elated_get_module_template_part( 'templates/parts/single/single-navigation', 'blog' );

nigiri_elated_get_module_template_part( 'templates/parts/single/related-posts', 'blog', '', $single_info_params );

nigiri_elated_get_module_template_part( 'templates/parts/single/comments', 'blog' );