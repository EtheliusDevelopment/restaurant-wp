<?php
/**
 * Woocommerce helper functions
 */

if ( ! function_exists( 'nigiri_elated_woocommerce_meta_box_functions' ) ) {
	function nigiri_elated_woocommerce_meta_box_functions( $post_types ) {
		$post_types[] = 'product';
		
		return $post_types;
	}
	
	add_filter( 'nigiri_elated_filter_meta_box_post_types_save', 'nigiri_elated_woocommerce_meta_box_functions' );
}

if ( ! function_exists( 'nigiri_elated_woocommerce_add_social_share_option' ) ) {
	function nigiri_elated_woocommerce_add_social_share_option( $container ) {
		if ( nigiri_elated_is_woocommerce_installed() ) {
			nigiri_elated_add_admin_field(
				array(
					'type'          => 'yesno',
					'name'          => 'enable_social_share_on_product',
					'default_value' => 'no',
					'label'         => esc_html__( 'Product', 'nigiri' ),
					'description'   => esc_html__( 'Show Social Share for Product Items', 'nigiri' ),
					'parent'        => $container
				)
			);
		}
	}
	
	add_action( 'nigiri_elated_action_post_types_social_share', 'nigiri_elated_woocommerce_add_social_share_option', 10, 1 );
}

if ( ! function_exists( 'nigiri_elated_woocommerce_style_dynamics_deps' ) ) {
    function nigiri_elated_woocommerce_style_dynamics_deps( $deps ) {
        $style_dynamic_deps_array = array();
        if ( nigiri_elated_is_woocommerce_installed() && nigiri_elated_load_woo_assets() ) {
            $style_dynamic_deps_array[] = 'nigiri-elated-woo';
            if (nigiri_elated_is_responsive_on()) {
                $style_dynamic_deps_array[] = 'nigiri-elated-woo-responsive';
            }
        }

        return array_merge($deps, $style_dynamic_deps_array);
    }

    add_filter('nigiri_elated_filter_style_dynamic_deps','nigiri_elated_woocommerce_style_dynamics_deps');
}

if ( ! function_exists( 'nigiri_elated_get_woo_shortcode_module_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template name of the template to load
	 * @param string $module name of the module folder
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param array $additional_params array of additional parameters to pass to template
	 *
	 * @return html
	 * @see nigiri_elated_get_template_part()
	 */
	function nigiri_elated_get_woo_shortcode_module_template_part( $template, $module, $slug = '', $params = array(), $additional_params = array() ) {
		
		//HTML Content from template
		$html          = '';
		$template_path = 'framework/modules/woocommerce/shortcodes/' . $module;
		
		$temp = $template_path . '/' . $template;
		
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
		if ( is_array( $additional_params ) && count( $additional_params ) ) {
			extract( $additional_params );
		}
		
		$templates = array();
		
		if ( $temp !== '' ) {
			if ( $slug !== '' ) {
				$templates[] = "{$temp}-{$slug}.php";
			}
			
			$templates[] = $temp . '.php';
		}
		$located = nigiri_elated_find_template_path( $templates );
		if ( $located ) {
			ob_start();
			include( $located );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'nigiri_elated_is_woocommerce_page' ) ) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function nigiri_elated_is_woocommerce_page() {
		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			return is_woocommerce();
		} elseif ( function_exists( 'is_cart' ) && is_cart() ) {
			return is_cart();
		} elseif ( function_exists( 'is_checkout' ) && is_checkout() ) {
			return is_checkout();
		} elseif ( function_exists( 'is_account_page' ) && is_account_page() ) {
			return is_account_page();
		}
	}
}

if ( ! function_exists( 'nigiri_elated_is_woocommerce_shop' ) ) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function nigiri_elated_is_woocommerce_shop() {
		return function_exists( 'is_shop' ) && ( is_shop() || is_product() );
	}
}

if ( ! function_exists( 'nigiri_elated_get_woo_shop_page_id' ) ) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function nigiri_elated_get_woo_shop_page_id() {
		if ( nigiri_elated_is_woocommerce_installed() ) {
			//get shop page id from options table
			$shop_id = get_option( 'woocommerce_shop_page_id' );
			$page_id = ! empty( $shop_id ) ? $shop_id : '-1';
			
			return $page_id;
		}
	}
}

if ( ! function_exists( 'nigiri_elated_is_product_category' ) ) {
	function nigiri_elated_is_product_category() {
		return function_exists( 'is_product_category' ) && is_product_category();
	}
}

if ( ! function_exists( 'nigiri_elated_is_product_tag' ) ) {
	function nigiri_elated_is_product_tag() {
		return function_exists( 'is_product_tag' ) && is_product_tag();
	}
}

if ( ! function_exists( 'nigiri_elated_load_woo_assets' ) ) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see nigiri_elated_is_woocommerce_page()
	 * @see nigiri_elated_has_woocommerce_shortcode()
	 * @see nigiri_elated_has_woocommerce_widgets()
	 * @return bool
	 */
	function nigiri_elated_load_woo_assets() {
		return nigiri_elated_is_woocommerce_installed() && ( nigiri_elated_is_woocommerce_page() || nigiri_elated_has_woocommerce_shortcode() || nigiri_elated_has_woocommerce_widgets() );
	}
}

if ( ! function_exists( 'nigiri_elated_return_woocommerce_global_variable' ) ) {
	function nigiri_elated_return_woocommerce_global_variable() {
		if ( nigiri_elated_is_woocommerce_installed() ) {
			global $product;
			
			return $product;
		}
	}
}

if ( ! function_exists( 'nigiri_elated_has_woocommerce_shortcode' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function nigiri_elated_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'add_to_cart',
			'add_to_cart_url',
			'product_page',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'sale_products',
			'best_selling_products',
			'top_rated_products',
			'product_attribute',
			'related_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_order_tracking',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou'
		);
		
		$woocommerce_shortcodes = apply_filters( 'nigiri_elated_filter_woocommerce_shortcodes_list', $woocommerce_shortcodes );
		
		foreach ( $woocommerce_shortcodes as $woocommerce_shortcode ) {
			$has_shortcode = nigiri_elated_has_shortcode( $woocommerce_shortcode );
			
			if ( $has_shortcode ) {
				return true;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'nigiri_elated_has_woocommerce_widgets' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function nigiri_elated_has_woocommerce_widgets() {
		$widgets_array = array(
			'eltdf_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);
		
		$widgets_array = apply_filters( 'nigiri_elated_filter_woocommerce_widgets_list', $widgets_array );
		
		foreach ( $widgets_array as $widget ) {
			$active_widget = is_active_widget( false, false, $widget );
			
			if ( $active_widget ) {
				return true;
			}
		}
		
		return false;
	}
}

if ( ! function_exists( 'nigiri_elated_add_product_to_search_types' ) ) {
    function nigiri_elated_add_product_to_search_types( $post_types ) {
        $post_types['product'] = esc_html__( 'Product', 'nigiri' );

        return $post_types;
    }

    add_filter( 'nigiri_elated_filter_search_post_type_widget_params_post_type', 'nigiri_elated_add_product_to_search_types' );
}

if ( ! function_exists( 'nigiri_elated_get_woocommerce_sale' ) ) {
	function nigiri_elated_get_woocommerce_sale( $product ) {
		$enable_percent_mark = nigiri_elated_options()->getOptionValue( 'woo_enable_percent_sign_value' );
		$price               = intval( $product->get_regular_price() );
		$sale_price          = intval( $product->get_sale_price() );
		
		if ( $price > 0 && $enable_percent_mark === 'yes' ) {
			return '-' . ( 100 - round( ( $sale_price * 100 ) / $price ) ) . '%';
		} else {
			return esc_html__( 'Sale', 'nigiri' );
		}
	}
}

if ( ! function_exists( 'nigiri_elated_woo_change_tabs_to_accordions' ) ) {
	/**
	 * Function that add accordions elements instead of tabs for single product page meta
	 * Return html
	 */
	function nigiri_elated_woo_change_tabs_to_accordions( $tabs ) {
		if ( ! empty( $tabs ) ) { ?>
			<div class="eltdf-accordion-holder eltdf-accordion eltdf-ac-simple clearfix">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<h4 class="eltdf-accordion-title <?php echo esc_attr( $key ); ?>_tab">
                        <span class="eltdf-accordion-mark">
							<span class="eltdf_icon_plus icon_plus"></span>
							<span class="eltdf_icon_minus icon_minus-06"></span>
						</span>
						<span class="eltdf-tab-title"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></span>
					</h4>
					<div class="eltdf-accordion-content">
							<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}
