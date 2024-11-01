<?php

if ($this->base_admin->base_admin->db->getModuleStatus($this->base_admin->module_slug)) {

    check_ajax_referer('woofusionfcf_hashkey', 'security');

    $post_data = array();
    $res_data = array();

    ob_start();
    ?>

	<div id="wcfusion-fct-body" class="wcfusion-fct-wrap">
		<div class="wcfusion-fct-content-wrap">

			<div class="wcfusion-fct-content">

				<div class="wcfusion-fct-loader" style="display: none;">
					<p>Cart updating..</p>
					<img src="<?php echo WCFUSION_IMG_DIR . 'popup_spinner.svg'; ?>"
					     alt="woofusion foloating cart loader">
				</div>

				<header class="fct-header">

					<div class="wcfusion-fct-notice wcfusion-fct-success" style="display: none;"></div>


					<div class="wcfusion-fct-left-header wffc-d-flex">
                        <?php
                        if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_header_basket_icon'])) { ?>
							<span class="wcfusion-cart-icon" data-cart_icon="demo-icon icon-basket6">
                                    <i class="demo-icon icon-basket2"></i>
                                </span>
                        <?php }
                        ?>
						<h4><?php echo !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_heading_title']) ? $this->wfc_settings['wffc_heading_title'] : 'Your Shopping Cart'; ?></h4>
					</div>
                    <?php
                    if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_header_close_icon'])) {
                        ?>

                        <div class="fct-right-header">
                            <svg fill="#000000" class="fct-window-remove" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 48 48" width="25px" height="25px">
                                <path
                                        d="M 38.982422 6.9707031 A 2.0002 2.0002 0 0 0 37.585938 7.5859375 L 24 21.171875 L 10.414062 7.5859375 A 2.0002 2.0002 0 0 0 8.9785156 6.9804688 A 2.0002 2.0002 0 0 0 7.5859375 10.414062 L 21.171875 24 L 7.5859375 37.585938 A 2.0002 2.0002 0 1 0 10.414062 40.414062 L 24 26.828125 L 37.585938 40.414062 A 2.0002 2.0002 0 1 0 40.414062 37.585938 L 26.828125 24 L 40.414062 10.414062 A 2.0002 2.0002 0 0 0 38.982422 6.9707031 z"/>
                            </svg>
                        </div>

                    <?php } ?>
				</header>


				<div class="wcfusion-fct-items-and-footer">
                    <div class="wffc-appply-coupon-loader" style="display: none;">
                        <img src="<?php echo WCFUSION_IMG_DIR . 'popup_spinner.svg'; ?>" alt="woofusion apply coupon loader">
                    </div>

					<section class="fct-product-list">
						<ul>

                            <?php

                            $cart_orderby = !empty($this->wfc_settings) && isset($this->wfc_settings['wffc_cart_item_order']) ? $this->wfc_settings['wffc_cart_item_order'] : 'asc';
                            $redirect_url_empty_cart = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_redirect_url_empty_cart_btn']) ? $this->wfc_settings['wffc_redirect_url_empty_cart_btn'] : home_url() . '/shop/';

                            if ($cart_orderby === 'desc') {
                                $cart_contents = WC()->cart->get_cart_contents();
                                $reversed_contents = array_reverse($cart_contents);
                                $wffc_carts = WC()->cart->set_cart_contents($reversed_contents);
                            }

                            // get cart info
                            $wffc_carts = WC()->cart->get_cart();

                            ?>
							<!--start empty cart content -->
							<li style="display: none;" class="wffc-empty-cart-content wfct-button">
								<p>
                                    <?php
                                    $wffc_empty_cart_message = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_empty_cart_message']) ? $this->wfc_settings['wffc_empty_cart_message'] : 'No item in cart';
                                    _e($wffc_empty_cart_message, 'wcfusion');
                                    ?>
								</p>
								<div class="fct-continue-shopping">
									<a href="<?php echo $redirect_url_empty_cart; ?>">
                                        <?php
                                        $wffc_shop_btn_text = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_shop_btn_text']) ? $this->wfc_settings['wffc_shop_btn_text'] : 'Back to Shop';
                                        _e($wffc_shop_btn_text, 'wofusion')
                                        ?>
									</a>
								</div>
							</li><!--/.end empty cart content -->

                            <?php

                            foreach ($wffc_carts as $cart_item_key => $cart_item) {
                                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                                if (!$_product || !$_product->exists() || $cart_item['quantity'] < 0 || !apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) continue;
                                $product_permalink = (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_link_to_single_product'])) ? apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key) : '';
                                $product_name = $_product->get_name();

                                if ($_product->get_type() === 'variation') {
                                    $product_name = $_product->get_title();
                                    $cart_item['data']->set_name($_product->get_title());
                                }

                                $product_name = apply_filters('woocommerce_cart_item_name', $product_name, $cart_item, $cart_item_key);
                                $product_name = $product_permalink ? sprintf('<a href="%s">%s</a>', $product_permalink, $product_name) : '<a href="javascript:void(0)">' . $product_name . '</a>';
                                $product_meta = wc_get_formatted_cart_item_data($cart_item);
                                $product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                $product_subtotal = apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                $thumbnail = $product_permalink ? sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail) : $thumbnail;

                                ?>

                                <?php
                                if(!$this->wfc_settings) { ?>
                                    <li style="" class="wffc-empty-cart-settings-content">
                                        <span>Please save settings first in your dashboard!</span>
                                    </li>
                                <?php }else{ ?>

                                    <li class="wcfusion-fct-item-<?php echo $product_id; ?>">
                                        <div class="fct-product-item">
                                            <?php
                                            if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_product_image'])) { ?>
                                                <div class="fct-cart-img">
                                                    <?php echo $thumbnail; ?>
                                                </div>
                                            <?php }
                                            ?>

                                            <div class="fct-cart-product">
                                                <?php
                                                if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_product_name'])) { ?>
                                                    <div class="fct-cart-product-name">
                                                        <?php echo $product_name; ?>
                                                    </div>
                                                <?php }
                                                ?>


                                                <?php
                                                if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_allowed_quantity_update'])) { ?>
                                                    <div class="fct-cart-product-qt">
                                                        <input type="button" class="wcfusion-fct-decrement-pqty" value="-"
                                                               data-product_id="<?php echo $product_id; ?>"
                                                               data-cart_item_key="<?php echo $cart_item_key ?>"/>
                                                        <input class="wcfusion-fct-pqty-<?php echo $product_id; ?>" data-product_id="<?php echo $product_id; ?>" data-cart_item_key="<?php echo $cart_item_key ?>"
                                                               type="text" name="quantity" onblur="wcfusion_qty_update(this);"
                                                               value="<?php echo $cart_item['quantity']; ?>" maxlength="2"
                                                               max="100" size="1"
                                                               id="number"/>
                                                        <input type="button" class="wcfusion-fct-increment-pqty"
                                                               data-product_id="<?php echo $product_id; ?>"
                                                               data-cart_item_key="<?php echo $cart_item_key ?>" value="+"/>
                                                    </div>
                                                <?php }
                                                ?>

                                                <?php
                                                if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_product_price'])) {
                                                    ?>
                                                    <span class="wffc-qty-price"> Unit Price : <?php echo $product_price; ?> </span>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="fct-product-action">
                                            <?php
                                            if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_delete_item_form_cart'])) {
                                                $wffc_item_remove_icon = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_item_remove_icon'] ) ? $this->wffc_settings['wffc_item_remove_icon'] : 'icon-cancel1';
                                                ?>
                                                <button class="wcfusion-fct-remove-item"
                                                        data-product_id="<?php echo $product_id; ?>"
                                                        data-cart_item_key="<?php echo $cart_item_key ?>">
                                                    <i class="demo-icon <?php echo $wffc_item_remove_icon; ?>"></i>
                                                </button>
                                            <?php } ?>

                                            <div class="fct-product-price">
                                                <?php
                                                if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_product_price_total'])) {
                                                    ?>
                                                    <p class="wcfusion-fct-psubtotal-<?php echo $product_id; ?>"><?php echo $product_subtotal; ?></p>
                                                <?php } else { ?>
                                                    <p class="wcfusion-fct-psubtotal-<?php echo $product_id; ?>"><?php echo $product_price; ?></p>
                                                <?php }
                                                ?>
                                            </div>

                                        </div>
                                    </li>

                                <?php } ?>

                                <?php
                            } ?>

						</ul>
					</section>

				</div>


				<footer class="fct-footer">

                    <?php
                    if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_coupon'])) { ?>
						<section class="fct-coupon">
							<p>Got a discount code?</p>
							<div class="fct-coupon-filed wfct-button">
								<input name="wffc_coupon_code" id="wffc_coupon_code" class="wffc-coupon-code" type="text" value="" placeholder="Enter discount code">
								<button onclick="wffc_trigger_apply_coupon();" id="wffc_apply_coupon_btn" class="wffc-apply-coupon-btn">Apply</button>
							</div>
						</section>
                    <?php }
                    ?>

                    <?php
                    if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_subtotal'])) { ?>
						<section class="fct-subtotal">
							<ul>
								<li>
									<div class="total-text">
                                        <?php
                                        $wffc_subtotal_text = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_subtotal_text']) ? $this->wfc_settings['wffc_subtotal_text'] : 'Subtotal';
                                        _e($wffc_subtotal_text, 'wofusion');
                                        ?>
									</div>
									<div class="total-amount wcfusion-fct-cartsubtotal"><?php echo WC()->cart->get_cart_subtotal(); ?></div>
								</li>
							</ul>
						</section>
                    <?php }
                    ?>

                    <?php
                    if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_discount'])) { ?>
						<section class="fct-discount-coupon">
							<ul>
								<li>
									<div class="total-text">
                                        Discount : <span class="wffc-applied-coupons"><?php echo implode (', ', WC()->cart->applied_coupons); ?></span>
                                    </div>
									<div class="total-amount wffc-coupon-discount-total">
										<span>
                                            <?php
                                            echo wc_price(WC()->cart->get_cart_discount_total());
                                            ?>
                                        </span>
									</div>
								</li>
							</ul>
						</section>
                    <?php }
                    ?>

                    <?php
                    if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_shipping_amount'])) {
                        $shippingTotal = WC()->cart->get_cart_shipping_total();
                        ?>
						<section class="fct-shipping-amount">
							<ul>
								<li>
									<div class="total-text"><?php _e('Shipping', 'wofusion') ?></div>
									<div class="total-amount wcfusion-fct-shippingtotal"><?php echo $shippingTotal == 'Free!' ? '0.00$' : $shippingTotal; ?></div>
								</li>
							</ul>
						</section>
                    <?php }
                    ?>
                    <?php
                    if (!empty($this->wfc_settings) && isset($this->wfc_settings['wffc_show_cart_total'])) { ?>
						<ul>
							<li>
								<div class="total-text"><?php _e('Total Amount', 'wofusion') ?></div>
								<div class="total-amount wcfusion-fct-carttotal"><?php echo WC()->cart->get_total(); ?></div>
							</li>
						</ul>
                    <?php } ?>

					<div class="fct-view-card wfct-button">
                        <?php
                        $wffc_view_cart_btn_url = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_view_cart_btn_url']) ? $this->wfc_settings['wffc_view_cart_btn_url'] : home_url() . '/cart/';
                        ?>
						<a href="<?php echo $wffc_view_cart_btn_url; ?>" target="_blank">

                            <?php
                            $wffc_view_cart_text = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_view_cart_text']) ? $this->wfc_settings['wffc_view_cart_text'] : 'View Cart';
                            _e($wffc_view_cart_text, 'wcfusion');
                            ?>

						</a>
					</div>
					<div class="fct-continue-shopping wfct-button">
                        <?php
                        $wffc_continue_btn_url = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_continue_btn_url']) ? $this->wfc_settings['wffc_continue_btn_url'] : home_url() . '/shop/';
                        ?>
						<a href="<?php echo $wffc_continue_btn_url; ?>" target="_blank">

                            <?php
                            $wffct_continue_btn_text = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffct_continue_btn_text']) ? $this->wfc_settings['wffct_continue_btn_text'] : 'Continue Shopping';
                            _e($wffct_continue_btn_text, 'wcfusion');
                            ?>

						</a>
					</div>
					<div class="fct-checkout wfct-button">
                        <?php
                        $wffc_checkout_btn_url = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_checkout_btn_url']) ? $this->wfc_settings['wffc_checkout_btn_url'] : home_url() . '/checkout/';
                        ?>
						<a href="<?php echo $wffc_checkout_btn_url; ?>" target="_blank">

                            <?php
                            $wffc_view_cart_text = !empty($this->wfc_settings) && !empty($this->wfc_settings['wffc_checkout_btn_text']) ? $this->wfc_settings['wffc_checkout_btn_text'] : 'Checkout';
                            _e($wffc_view_cart_text, 'wcfusion');
                            ?>

						</a>
					</div>

				</footer>
			</div>
		</div>
	</div>

    <?php

    $content = ob_get_clean();

    if (!empty($this->wfc_settings) && ($this->wfc_settings['wffc_bascket_count'] == 'number_of_products')) {
        $cart_contents_count = count(WC()->cart->get_cart());
    } else {
        $cart_contents_count = WC()->cart->get_cart_contents_count();
    }

    $result = array("status" => 'true', 'res_data' => $content, 'cart_contents_count' => $cart_contents_count);

} else {
    $result = array("status" => 'false', 'res_data' => array(), 'number_of_products' => 0, 'number_of_items' => 0);
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
