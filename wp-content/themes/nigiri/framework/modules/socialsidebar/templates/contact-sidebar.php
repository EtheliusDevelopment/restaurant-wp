<?php if ( $show_contact_sidebar ) { ?>
	<div class="eltdf-social-sidebar-holder eltdf-contact-sidebar" <?php nigiri_elated_inline_style( $sidebar_styles ); ?>>
		<div class="eltdf-ss-inner">
			<span><?php echo esc_html( $title ); ?></span>
			<a href="tel:<?php echo esc_url( str_replace( ' ', '', $number ) ); ?>"><?php echo esc_html( $number ); ?></a>
		</div>
	</div>
<?php }