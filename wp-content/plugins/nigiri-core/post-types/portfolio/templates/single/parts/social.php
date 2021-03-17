<?php if ( nigiri_elated_options()->getOptionValue( 'enable_social_share' ) == 'yes' && nigiri_elated_options()->getOptionValue( 'enable_social_share_on_portfolio-item' ) == 'yes' ) : ?>
	<div class="eltdf-ps-info-item eltdf-ps-social-share">
		<?php
		/**
		 * Available params type, icon_type and title
		 *
		 * Return social share html
		 */
		nigiri_core_get_cpt_single_module_template_part('templates/single/parts/info-title', 'portfolio', '', array( 'title' => esc_attr__('Share:', 'nigiri-core') ) );
		echo nigiri_elated_get_social_share_html( array( 'type'  => 'list', 'title' => esc_attr__( '', 'nigiri-core' ) ) ); ?>
	</div>
<?php endif; ?>