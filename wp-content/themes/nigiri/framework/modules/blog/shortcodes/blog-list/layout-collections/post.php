<li class="eltdf-bl-item eltdf-item-space">
	<div class="eltdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			nigiri_elated_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
        <div class="eltdf-bli-content">
	        <?php if (
		                $post_info_section == 'yes' &&
				        (
			                $post_info_category == 'yes' ||
			                $post_info_tags == 'yes' ||
			                $post_info_date == 'yes' ||
			                $post_info_author == 'yes' ||
			                $post_info_comments == 'yes' ||
			                $post_info_like == 'yes' ||
			                $post_info_share == 'yes'
				        )
	                ) { ?>
                <div class="eltdf-bli-info">
	                <?php
	                    if ( $post_info_category == 'yes' ) {
			                nigiri_elated_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
		                if ( $post_info_tags == 'yes' ) {
			                nigiri_elated_get_module_template_part( 'templates/parts/post-info/tags', 'blog', '', $params );
		                }
		                if ( $post_info_date == 'yes' ) {
			                nigiri_elated_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
		                }
		                if ( $post_info_author == 'yes' ) {
			                nigiri_elated_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
		                }
		                if ( $post_info_comments == 'yes' ) {
			                nigiri_elated_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                nigiri_elated_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
		                if ( $post_info_share == 'yes' ) {
			                nigiri_elated_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
	
	        <?php nigiri_elated_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="eltdf-bli-excerpt">
		        <?php nigiri_elated_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php nigiri_elated_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
	        </div>
        </div>
	</div>
</li>