<?php if ( $show_sidebar ) { ?>
	<div class="eltdf-social-sidebar-holder eltdf-social-sidebar" <?php nigiri_elated_inline_style( $sidebar_styles ); ?>>
		<div class="eltdf-ss-inner">
			<?php if ( is_array( $networks ) && count( $networks ) ) {
				foreach ( $networks as $network ) {
					if ( isset( $network['link'] ) && $network['link'] !== '' ) { ?>
						<a itemprop="url" href="<?php echo esc_url( $network['link'] ); ?>" target="_blank">
							<span><?php echo esc_html( $network['icon'] ); ?></span>
						</a>
					<?php }
				}
			} ?>
		</div>
	</div>
<?php }

