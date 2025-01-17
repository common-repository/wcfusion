<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('AutoApplyCouponUtils')) {
    class AutoApplyCouponUtils
    {
        public $base_admin;

        public function __construct ($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        public function woofusionadd_apply_coupon_automatically ()
        {
            if (!class_exists ('WooCommerce')) {
                return;
            }

            global $woocommerce;

            // get auto apply coupon list
            $auto_apply_coupons = get_option ('wcfusion_auto_apply_coupons');

            $url_coupon_id = ( isset( $_SESSION['url_coupon_id'] ) && !empty( $_SESSION['url_coupon_id'] ) ) ? $_SESSION['url_coupon_id'] : '';
            $url_coupon_force_apply = 'no';

            if( !empty( $url_coupon_id ) ){
                $url_coupon_force_apply = get_post_meta ($url_coupon_id, 'wcfusion_force_apply_url_coupon', true) ? get_post_meta ($url_coupon_id, 'wcfusion_force_apply_url_coupon', true) : 'no';
            }

            // generate new auto apply coupon data for
            if (!empty($auto_apply_coupons) && $url_coupon_force_apply !== 'yes') {
                foreach ($auto_apply_coupons as $key => $coupon) {
                    $coupon_code = $coupon['coupon_code'];
                    $coupon = new \WC_Coupon($coupon_code);
                    $discounts = new \WC_Discounts(WC ()->cart);
                    $valid_response = $discounts->is_coupon_valid ($coupon);

                    if (!is_wp_error ($valid_response)) {
                        // add discount if not exits
                        if (!$woocommerce->cart->has_discount (sanitize_text_field ($coupon_code))) {
                            $woocommerce->cart->add_discount (sanitize_text_field ($coupon_code));
                        }
                    }
                }
            }

        }

        // define add to auto apply list
        public function add_into_auto_apply_coupon_list ($addedItems = [])
        {
            $result = false;
            if (!class_exists ('WooCommerce')) {
                return $result;
            }
            if (!empty($addedItems) && is_array ($addedItems)) {
                // get auto coupon options data
                $auto_apply_coupons = get_option ('wcfusion_auto_apply_coupons');

                foreach ($addedItems as $index => $item) {
                    $auto_apply_coupons[$item['ID']] = array('ID' => $item['ID'], 'coupon_code' => $item['coupon_code']);
                }

                if (update_option ('wcfusion_auto_apply_coupons', $auto_apply_coupons)) {
                    $result = true;
                }
            }

            return $result;
        }

        // define add to auto apply list
        public function remove_into_auto_apply_coupon_list ($deleteItems = [])
        {
            $result = false;
            if (!class_exists ('WooCommerce')) {
                return $result;
            }
            if (!empty($deleteItems) && is_array ($deleteItems)) {
                // get auto coupon options data
                $auto_apply_coupons = get_option ('wcfusion_auto_apply_coupons');

                foreach ($deleteItems as $index => $dlItem) {
                    $auto_apply_coupons = $this->removeElementWithValue ($auto_apply_coupons, $dlItem['ID']);
                }

                if (update_option ('wcfusion_auto_apply_coupons', $auto_apply_coupons)) {
                    $result = true;
                }
            }

            return $result;
        }

        // define toggle auto coupon apply list
        public function toggle_auto_apply_coupon_list ($data = [])
        {
            $result = false;

            if (!class_exists ('WooCommerce')) {
                return $result;
            }

            if (!empty($data) && is_array ($data)) {

                $toggle_type = !empty($data['toggole_type']) ? $data['toggole_type'] : '';
                $coupon_data = !empty($data['coupon_data']) ? $data['coupon_data'] : [];

                // get auto coupon options data
                $auto_apply_coupons = get_option ('wcfusion_auto_apply_coupons');
                $auto_apply_coupons = (!empty($auto_apply_coupons) && is_array ($auto_apply_coupons)) ? $auto_apply_coupons : array();

                if (!empty($coupon_data) && !empty($toggle_type)) {

                    if ($toggle_type == 'add') {

                        foreach ($coupon_data as $index => $item) {
                            $auto_apply_coupons[$item['ID']] = array('ID' => $item['ID'], 'coupon_code' => $item['coupon_code']);
                        }

                    } else {
                        foreach ($coupon_data as $index => $dlItem) {
                            $auto_apply_coupons = $this->removeElementWithValue ($auto_apply_coupons, $dlItem['ID']);
                        }
                    }

                    if (update_option ('wcfusion_auto_apply_coupons', $auto_apply_coupons)) {
                        $result = true;
                    }
                }

            }

            return $result;
        }

        // define removeElementWithValue
        public function removeElementWithValue ($data, $remove_key)
        {
            foreach ($data as $key => $row) {
                unset($data[$remove_key]);
            }
            return $data;
        }

        /**
         * woofusion session unset.
         *
         * @return void
         *
         * Author : WPCommerz
         * Version : 1.0
         * Develop on : 24-02-2022
         * Update on : -
         * Develop by : Sm. Sazzad
         */
        public function wcfusion_session_unset(){
            unset($_SESSION['url_coupon_id']);
        }

    }
}