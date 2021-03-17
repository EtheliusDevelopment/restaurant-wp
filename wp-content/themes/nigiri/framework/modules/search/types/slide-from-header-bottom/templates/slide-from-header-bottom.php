<div class="eltdf-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="eltdf-form-holder">
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'nigiri' ); ?>" name="s" class="eltdf-search-field" autocomplete="off" />
			<button type="submit" <?php nigiri_elated_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo nigiri_elated_get_icon_sources_html( 'search', false, array( 'search' => 'yes' ) ); ?>
			</button>
		</div>
	</form>
</div>