<?php
get_header();
nigiri_elated_get_title();
do_action( 'nigiri_elated_action_before_main_content' ); ?>
<div class="eltdf-container eltdf-default-page-template">
	<?php do_action( 'nigiri_elated_action_after_container_open' ); ?>
	<div class="eltdf-container-inner clearfix">
		<?php
			$nigiri_taxonomy_id   = get_queried_object_id();
			$nigiri_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$nigiri_taxonomy      = ! empty( $nigiri_taxonomy_id ) ? get_term_by( 'id', $nigiri_taxonomy_id, $nigiri_taxonomy_type ) : '';
			$nigiri_taxonomy_slug = ! empty( $nigiri_taxonomy ) ? $nigiri_taxonomy->slug : '';
			$nigiri_taxonomy_name = ! empty( $nigiri_taxonomy ) ? $nigiri_taxonomy->taxonomy : '';
			
			nigiri_core_get_archive_portfolio_list( $nigiri_taxonomy_slug, $nigiri_taxonomy_name );
		?>
	</div>
	<?php do_action( 'nigiri_elated_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
