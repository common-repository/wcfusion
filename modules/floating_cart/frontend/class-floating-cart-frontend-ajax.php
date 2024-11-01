<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionFloatingCartFrontendAjax')) {
    class wcFusionFloatingCartFrontendAjax
    {

        public $base_admin;
        public $wffc_carts = array();
        public $wfc_settings = array();

        public function __construct ($base_admin)
        {

            $this->base_admin = $base_admin;

            // get cart settings data
            $this->wfc_settings = get_option('wcfusion_floating_cart_settings', false);

            add_action ('wp_ajax_wcfusion_init_floating_cart_content', array($this, 'wcfusion_init_floating_cart_content'));
            add_action( 'wp_ajax_nopriv_wcfusion_init_floating_cart_content', array($this, 'wcfusion_init_floating_cart_content') );

            add_action ('wp_ajax_wcfusion_floating_cart_update', array($this, 'wcfusion_floating_cart_update'));
            add_action( 'wp_ajax_nopriv_wcfusion_floating_cart_update', array($this, 'wcfusion_floating_cart_update') );

            add_action ('wp_ajax_wcfusion_floating_cart_apply_coupon', array($this, 'wcfusion_floating_cart_apply_coupon'));
            add_action( 'wp_ajax_nopriv_wcfusion_floating_cart_apply_coupon', array($this, 'wcfusion_floating_cart_apply_coupon') );

            add_action ('wc_ajax_wcfusion_floating_cart_add_item', array($this, 'wcfusion_floating_cart_add_item'));

        }

        public function wcfusion_init_floating_cart_content(){

            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/init-floating-cart-content.php";
            wp_die ();
        }

        public function wcfusion_floating_cart_update ()
        {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/floating-cart-update.php";
            wp_die ();
        }

        public function wcfusion_floating_cart_apply_coupon ()
        {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/apply-coupon.php";
            wp_die ();
        }

        /*
         * apply floating cart qty update
         * @param post_data array()
         *
         * return void
         *
         * Author : WPCommerz
         * Develop on : 07-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function apply_floating_cart_qty_update( $data = array() ) {
            $result = array();

            if(!empty($data)){

                $cart_item_key 	= sanitize_text_field( $data['cart_item_key'] );
                $product_id = (int) $data['product_id'];
                $new_qty 	= (int) $data['product_qty'];

                if( !is_numeric( $new_qty ) || $new_qty < 0 || !$cart_item_key ){
                    return;
                }

                $cart_item  = WC()->cart->get_cart_item( $cart_item_key );

                if( !empty($cart_item) ){

                    $updated = $new_qty == 0 ? WC()->cart->remove_cart_item( $cart_item_key ) : WC()->cart->set_quantity( $cart_item_key, $new_qty );

                    if( $updated ){

                        $notice_type = 'success';

                        if( $new_qty == 0 ){
                            $notice = 'Item removed';
                        }
                        else{
                            $notice ='Item updated';
                        }
                    }else{
                        $notice_type = 'error';
                        $notice = 'Opps: something is wrong!';
                    }

                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_subtotal = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $new_qty ), $cart_item, $cart_item_key );

                    if( !empty( $this->wfc_settings ) && ($this->wfc_settings['wffc_bascket_count'] == 'number_of_products') ){
                        $cart_contents_count = count(WC()->cart->get_cart());
                    }else{
                        $cart_contents_count = WC()->cart->get_cart_contents_count();
                    }

                    $discount_total = number_format (WC()->cart->get_cart_discount_total(),2) . get_woocommerce_currency_symbol(get_option('woocommerce_currency'));
                    $result = array( 'notice_type' => $notice_type, 'notice' => $notice, 'new_qty' => $new_qty, 'product_subtotal' => $product_subtotal, 'cart_subtotal' => WC()->cart->get_cart_subtotal(), 'coupon_discount_total' => $discount_total, 'cart_total' => WC()->cart->get_total(), 'cart_contents_count' => $cart_contents_count );
                }
            }

            return $result;

        }

        /*
         * add coupon in cart
         * @param post_data array()
         *
         * return void
         *
         * Author : WPCommerz
         * Develop on : 11-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function wcfusion_add_coupon_in_cart ($data = array()){

            $result = array();
            global $woocommerce;

            if (!empty($data) && !empty($data['coupon_code'])) {

                $coupon_code    = $data['coupon_code'];
                $coupon         = new \WC_Coupon($coupon_code);
                $discounts      = new \WC_Discounts(WC ()->cart);
                $valid_response = $discounts->is_coupon_valid ($coupon);

                if (!is_wp_error ($valid_response)) {
                    // add discount if not exits
                    if (!$woocommerce->cart->has_discount (sanitize_text_field ($coupon_code))) {
                        $woocommerce->cart->add_discount (sanitize_text_field ($coupon_code));
                        $notice_type    = 'success';
                        $notice         = __ ('Coupon applied successfully!!', 'wcfusion');
                    } else {
                        $notice_type    = 'error';
                        $notice         = __ ('Opps: Coupon already applied!');
                    }
                } else {
                    $notice_type    = 'error';
                    $notice         = __ ('Opps: something is wrong!');
                }


                $applied_coupons    = implode (', ', WC()->cart->applied_coupons);
                $discount_total     = number_format (WC ()->cart->get_cart_discount_total (), 2) . get_woocommerce_currency_symbol (get_option ('woocommerce_currency'));

                $result = array(
                        'notice_type'           => $notice_type,
                        'notice'                => $notice,
                        'applied_coupons'       => $applied_coupons,
                        'cart_subtotal'         => WC ()->cart->get_cart_subtotal (),
                        'coupon_discount_total' => $discount_total,
                        'cart_total'            => WC ()->cart->get_total ()
                );

            }

            return $result;

        }

        public function wcfusion_floating_cart_add_item(){
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/floating-cart-refresh.php";
            wp_die ();
        }

    }

}