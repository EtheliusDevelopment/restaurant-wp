<li class="eltdf-blog-slider-item">
    <div class="eltdf-blog-slider-item-inner">
        <div class="eltdf-item-image">
            <a itemprop="url" href="<?php echo get_permalink(); ?>">
                <?php echo get_the_post_thumbnail(get_the_ID(), $image_size); ?>
            </a>
        </div>
        <div class="eltdf-item-text-wrapper">
            <div class="eltdf-item-text-holder">
                <div class="eltdf-item-text-holder-inner">
	                <?php if($post_info_date == 'yes' || $post_info_category == 'yes' || $post_info_author == 'yes' || $post_info_comments == 'yes'){ ?>
		                <div class="eltdf-item-info-section">
			                <?php
			                if ($post_info_date == 'yes') {
				                nigiri_elated_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
			                }
			                if ($post_info_category == 'yes') {
				                nigiri_elated_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
			                }
			                if ($post_info_author == 'yes') {
				                nigiri_elated_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
			                }
			                if ($post_info_comments == 'yes') {
				                nigiri_elated_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
			                }
			                ?>
		                </div>
	                <?php } ?>
	
	                <?php nigiri_elated_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

                    <?php nigiri_elated_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
                </div>
            </div>
        </div>
    </div>
</li>