<?php if($query_results->max_num_pages > 1) {
	$holder_styles = $this_object->getLoadMoreStyles($params);
	?>
	<div class="eltdf-pl-loading">
		<div class="eltdf-pl-loading-bounce1"></div>
		<div class="eltdf-pl-loading-bounce2"></div>
		<div class="eltdf-pl-loading-bounce3"></div>
	</div>
	<div class="eltdf-pl-load-more-holder">
		<div class="eltdf-pl-load-more" <?php nigiri_elated_inline_style($holder_styles); ?>>
			<?php 
				echo nigiri_elated_get_button_html(array(
					'link'      => 'javascript: void(0)',
					'size'      => 'small',
					'type'      => 'outline',
					'animation' => 'yes',
					'text'      => esc_html__('LOAD MORE', 'nigiri-core')
				));
			?>
		</div>
	</div>
<?php }