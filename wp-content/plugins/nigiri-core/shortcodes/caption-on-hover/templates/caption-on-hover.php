<div class="eltdf-caption-on-hover-holder <?php echo esc_attr($holder_classes); ?>">
	<?php  if (!empty($custom_link)) { ?>
	<a itemprop="url" class="eltdf-caption-on-hover-link" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>"></a>
	<?php } ?>
	<div class="eltdf-coh-image">
        <?php if(is_array($image_size) && count($image_size)) : ?>
	        <?php echo nigiri_elated_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
        <?php else: ?>
	        <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
        <?php endif; ?>
    </div>
	<?php if ($caption_behavior === 'follow-info') { ?>
		<div class="eltdf-caption-follow-info-title-source"><?php echo esc_html($title); ?></div>
	<?php } else { ?>
		<div class="eltdf-coh-title-holder" <?php echo nigiri_elated_get_inline_attrs($this_object->getParallaxData($params)); ?>>
			<div class="eltdf-title-inner">
				<?php if(!empty($title)) { ?>
					<span class="eltdf-coh-title"><?php echo esc_html($title); ?></span>
				<?php } ?>
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200.711 73.909" enable-background="new 0 0 200.711 73.909 xml:space="preserve">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M67.353,66.326c2.49,2.601,9.813,1.74,16.044,1.74c24.737,0,49.594,0,74.985,0
				 c6.225,0,13.229-1.265,14.304,3.282c-2.241,3.532-9.616,2.319-15.85,2.319c-20.122,0-41.549,0-61.65,0
				 c-8.275,0-16.455,0.542-24.547,0c-3.367-0.227-7.008-1.326-10.82-1.932c-3.697-0.591-7.471-0.831-11.406-1.159
				 c-2.375-0.2-5.406-1.429-5.604-2.901c-0.225-1.707,2.547-2.639,2.319-3.861c-0.341-1.852-7.082-1.564-8.888-2.128
				 c-1.538-0.479-2.982-1.583-4.834-1.933c-3.169-0.595-4.644-0.341-7.15-1.353c-3.626-1.465-5.554-4.049-8.891-5.798
				 c-0.384-0.202-0.938,0-1.353-0.194c-0.301-0.144-0.339-0.685-0.58-0.774c-0.557-0.2-1.147,0.371-1.354-0.384
				 c-2.922,0.324-6-0.304-9.274-0.195c-0.396-0.349-0.563-0.888-1.354-0.384c0.081-0.961-0.059-0.634-0.774-0.582
				 c0.217-0.788-1.283-3.356-0.386-4.252c0.461-0.463,3.043-0.011,3.865,0.579c2.904-0.647,5.186,0.709,8.506-0.579
				 c0.412-1.708-2.793-2.609-2.127-5.8c2.119-3.654,8.646,0.563,10.436-4.055c-1.913-2.831-5.604-1.591-9.469-2.13
				 c-3-0.414-7.397-2.617-7.346-5.215c0.046-2.235,3.007-3.562,5.221-3.865c2.357-0.328,5.957,0.972,7.15,0
				 c1.65-1.348-0.287-3.594,1.932-5.221c0.18-1.505-1.348-1.995-1.353-3.673c-0.005-1.191,1.321-1.943,1.353-3.091
				 c0.033-1.321-1.453-2.157-1.353-3.48c0.194-2.623,3.497-3.529,6.376-2.316c3.59-0.561,4.986-6.336,8.699-6.958
				 c0.958-0.163,2.539,0.319,3.865,0.387c4.979,0.254,10.814,0.752,16.041,1.74c1.684,0.316,3.199,1.009,4.636,1.158
				 c7.513,0.777,15.946,0.387,24.548,0.387c20.566,0,42.028,0,63.006,0c4.629,0,10.393-0.655,13.527,0.385
				 c1.732,0.574,3.102,2.273,4.254,2.706c5.766,2.166,14.215,1.053,19.52,3.094c3.01,1.158,4.715,1.413,4.252,6.571
				 c-0.834,1.743-2.279,2.874-4.447,3.286c-0.124,1.361-0.205,1.835,0,2.896c5.262,1.995,18.697-2.636,19.33,3.675
				 c-1.805,4.812-8.26,2.035-12.563,2.896c-0.639,3.591,1.6,6.349,0,9.665c1.754,0.628,3.183,1.583,3.864,3.286
				 c-0.996,4.482-8.184,2.771-13.337,3.094c0.468,1.047,2.11,1.567,2.706,3.285c1.986,0.463,3.329,1.567,4.255,3.091
				 c-0.536,1.786-2.014,2.631-3.48,3.48c0.054,1.104,0.089,2.228,0.384,3.091c-0.547,2.06-2.547,2.388-4.443,3.286
				 c-1.48,0.703-2.623,2.154-4.249,2.706c-3.248,1.099-7.341-0.179-11.405,0.579c-1.191,0.139-1.033,2.298-2.316,1.74
				 c0.486,0.23-0.77,0.477-1.549,0.579c-3.447,0.455-7.398-0.222-11.015-0.191c-9.196,0.072-18.192-0.104-26.864,0.191
				 c-11.297,0.388-25.736-0.229-39.232-0.191c-3.736,0.011-7.688,0.698-11.406-0.774C69.482,66.521,68.234,66.239,67.353,66.326z"/>
				</svg>
			</div>
		</div>
	<?php } ?>
</div>