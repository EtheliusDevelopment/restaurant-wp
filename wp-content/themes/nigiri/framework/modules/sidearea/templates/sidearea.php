<section class="eltdf-side-menu">
	<a <?php nigiri_elated_class_attribute( $close_icon_classes ); ?> href="#">
		<?php echo nigiri_elated_get_icon_sources_html( 'side_area', true ); ?>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
	<?php if ( is_active_sidebar( 'sidearea-bottom' ) ) { ?>
		<div class="eltdf-side-bottom-area">
			<?php dynamic_sidebar( 'sidearea-bottom' ); ?>
		</div>
	<?php } ?>
</section>