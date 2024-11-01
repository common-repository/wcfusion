<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('FloatingCartUtils')) {
    class FloatingCartUtils
    {
        public $base_admin;
        public $coupon_id;

        public function __construct ($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        /*
         * define floating cart settings data
         * @param post_data array()
         *
         * return void
         *
         * Author : WPCommerz
         * Develop on : 03-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function init_floating_cart_settings( $data = array() ) {
            $result = false;
            if(!empty($data)){
                update_option( 'wcfusion_floating_cart_settings', $data );
                $result = true;
            }

            return $result;
        }

    }
}
