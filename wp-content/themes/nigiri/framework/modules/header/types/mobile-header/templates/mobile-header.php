<?php do_action('nigiri_elated_action_before_mobile_header'); ?>

<header class="eltdf-mobile-header">
	<?php do_action('nigiri_elated_action_after_mobile_header_html_open'); ?>
	
	<div class="eltdf-mobile-header-inner">
		<div class="eltdf-mobile-header-holder">
			<div class="eltdf-grid">
				<div class="eltdf-vertical-align-containers">
					<div class="eltdf-vertical-align-containers">
						<div class="eltdf-position-left"><!--
						 --><div class="eltdf-position-left-inner">
								<?php nigiri_elated_get_mobile_logo(); ?>
							</div>
						</div>
						<?php if($show_navigation_opener) : ?>
							<div <?php nigiri_elated_class_attribute( $mobile_icon_class ); ?>>
								<a href="javascript:void(0)">
									<span class="eltdf-mobile-menu-icon">
										<?php echo nigiri_elated_get_icon_sources_html( 'mobile' ); ?>
									</span>
									<?php if(!empty($mobile_menu_title)) { ?>
										<h5 class="eltdf-mobile-menu-text"><?php echo esc_attr($mobile_menu_title); ?></h5>
									<?php } ?>
								</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php nigiri_elated_get_mobile_nav(); ?>
	</div>
	
	<?php do_action('nigiri_elated_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('nigiri_elated_action_after_mobile_header'); ?>