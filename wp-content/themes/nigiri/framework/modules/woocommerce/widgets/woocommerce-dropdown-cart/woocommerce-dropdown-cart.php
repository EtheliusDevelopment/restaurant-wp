<?php
if ( class_exists( 'NigiriElatedClassWidget' ) ) {
    class NigiriElatedClassWoocommerceDropdownCart extends NigiriElatedClassWidget
    {
        public function __construct()
        {
            parent::__construct(
                'eltdf_woocommerce_dropdown_cart',
                esc_html__('Nigiri Woocommerce Dropdown Cart', 'nigiri'),
                array('description' => esc_html__('Display a shop cart icon with a dropdown that shows products that are in the cart', 'nigiri'),)
            );

            $this->setParams();
        }

        protected function setParams()
        {
            $this->params = array(
                array(
                    'type' => 'textfield',
                    'name' => 'woocommerce_dropdown_cart_margin',
                    'title' => esc_html__('Icon Margin', 'nigiri'),
                    'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'nigiri')
                )
            );
        }

        public function widget($args, $instance)
        {
            extract($args);

            global $woocommerce;

            $icon_styles = array();

            if ($instance['woocommerce_dropdown_cart_margin'] !== '') {
                $icon_styles[] = 'margin: ' . $instance['woocommerce_dropdown_cart_margin'];
            }

            $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

            ?>

            <div class="eltdf-shopping-cart-holder" <?php nigiri_elated_inline_style($icon_styles) ?>>
                <div class="eltdf-shopping-cart-inner">
                    <a itemprop="url" class="eltdf-header-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
                        <span class="eltdf-cart-label"><?php esc_html_e('CART', 'nigiri'); ?></span>
                        <span class="eltdf-cart-info">
				        <span class="eltdf-cart-info-total"><?php echo '(' . sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'nigiri'), WC()->cart->cart_contents_count) . ')'; ?></span>
			        </span>
                    </a>
                    <div class="eltdf-shopping-cart-dropdown">
                        <ul>
                            <?php if (!$cart_is_empty) : ?>
                                <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                                    $_product = $cart_item['data'];
                                    // Only display if allowed
                                    if (!$_product->exists() || $cart_item['quantity'] == 0) {
                                        continue;
                                    }
                                    // Get price
                                    $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                                    ?>
                                    <li>
                                        <div class="eltdf-item-image-holder">
                                            <a itemprop="url"
                                               href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                                <?php echo wp_kses($_product->get_image(), array(
                                                    'img' => array(
                                                        'src' => true,
                                                        'width' => true,
                                                        'height' => true,
                                                        'class' => true,
                                                        'alt' => true,
                                                        'title' => true,
                                                        'id' => true
                                                    )
                                                )); ?>
                                            </a>
                                        </div>
                                        <div class="eltdf-item-info-holder">
											                                            <?php if (apply_filters('nigiri_elated_woo_cart_enable_quantity', true)) { ?>
                                                <span class="eltdf-quantity"><?php esc_html_e('Quantity: ', 'nigiri');
                                                    echo esc_html($cart_item['quantity']); ?></span>
                                            <?php } ?>
                                            <h5 itemprop="name" class="eltdf-product-title">
                                                <a itemprop="url"
                                                   href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('nigiri_elated_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                            </h5>

                                            <?php echo apply_filters('nigiri_elated_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                            <?php echo apply_filters('nigiri_elated_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), esc_attr__('Remove this item', 'nigiri')), $cart_item_key); ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <li class="eltdf-cart-bottom">
                                    <div class="eltdf-subtotal-holder clearfix">
                                        <span class="eltdf-total"><?php esc_html_e('Order Total:', 'nigiri'); ?></span>
                                        <span class="eltdf-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                            'span' => array(
                                                'class' => true,
                                                'id' => true
                                            )
                                        )); ?>
									</span>
                                    </div>
                                    <div class="eltdf-btn-holder clearfix">
                                        <a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>"
                                           class="eltdf-view-cart"><span
                                                    class="eltdf-cart-btn-text"><?php esc_html_e('VIEW BAG', 'nigiri'); ?></span>></a>
                                    </div>
                                </li>
                            <?php else : ?>
                                <li class="eltdf-empty-cart"><?php esc_html_e('No products in the cart.', 'nigiri'); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
add_filter('woocommerce_add_to_cart_fragments', 'nigiri_elated_woocommerce_header_add_to_cart_fragment');

function nigiri_elated_woocommerce_header_add_to_cart_fragment($fragments) {
    global $woocommerce;

    ob_start();

    $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;

    ?>
    <div class="eltdf-shopping-cart-inner">
        <a itemprop="url" class="eltdf-header-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
	        <span class="eltdf-cart-label"><?php esc_html_e('CART', 'nigiri');?></span>
	        <span class="eltdf-cart-info">
		        <span class="eltdf-cart-info-total"><?php echo '(' . sprintf( _n('%d', '%d', WC()->cart->cart_contents_count, 'nigiri'), WC()->cart->cart_contents_count) . ')'; ?></span>
	        </span>
        </a>
        <div class="eltdf-shopping-cart-dropdown">
            <ul>
                <?php if (!$cart_is_empty) : ?>
                    <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                        $_product = $cart_item['data'];
                        // Only display if allowed
                        if (!$_product->exists() || $cart_item['quantity'] == 0) {
                            continue;
                        }
                        // Get price
                        $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                        ?>
                        <li>
                            <div class="eltdf-item-image-holder">
                                <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                    <?php echo wp_kses($_product->get_image(), array(
                                        'img' => array(
                                            'src'    => true,
                                            'width'  => true,
                                            'height' => true,
                                            'class'  => true,
                                            'alt'    => true,
                                            'title'  => true,
                                            'id'     => true
                                        )
                                    )); ?>
                                </a>
                            </div>
                            <div class="eltdf-item-info-holder">
                                <h4 itemprop="name" class="eltdf-product-title">
	                                <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('nigiri_elated_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                </h4>
		                        <?php if(apply_filters('nigiri_elated_woo_cart_enable_quantity', true)) { ?>
                                    <span class="eltdf-quantity"><?php esc_html_e('Quantity: ', 'nigiri'); echo esc_html($cart_item['quantity']); ?></span>
                                <?php } ?>
                                <?php echo apply_filters('nigiri_elated_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                <?php echo apply_filters('nigiri_elated_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__('Remove this item', 'nigiri')), $cart_item_key); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li class="eltdf-cart-bottom">
                        <div class="eltdf-subtotal-holder clearfix">
                            <span class="eltdf-total"><?php esc_html_e('Order Total:', 'nigiri'); ?></span>
                            <span class="eltdf-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                    'span' => array(
                                        'class' => true,
                                        'id'    => true
                                    )
                                )); ?>
							</span>
                        </div>
                        <div class="eltdf-btn-holder clearfix">
	                        <a itemprop="url" href="<?php echo esc_url(wc_get_cart_url()); ?>" class="eltdf-view-cart"><span class="eltdf-cart-btn-text"><?php esc_html_e('VIEW BAG', 'nigiri'); ?></span></a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="eltdf-empty-cart"><?php esc_html_e('No products in the cart.', 'nigiri'); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <?php
    $fragments['div.eltdf-shopping-cart-inner'] = ob_get_clean();

    return $fragments;
}

?>