<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionOneClickCheckoutUtils')) {
    class wcFusionOneClickCheckoutUtils
    {
        public $base_admin;
        public $coupon_id;

        public function __construct ($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        /*
         * define save settings data
         * @param post_data array()
         *
         * return void
         *
         * Author : WPCommerz
         * Develop on : 21-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function save_settings ($data = array())
        {
            $result = false;
            if (!empty($data)) {
                update_option ('wcfusion_one_click_checkout_settings', $data);
                $result = true;
            }
            return $result;
        }

    }
}
