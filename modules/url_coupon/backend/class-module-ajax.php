<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionUrlCouponAjax')) {
    class wcFusionUrlCouponAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wcfusion_url_coupon_list', array($this, 'wcfusion_url_coupon_list') );

        }

        function wcfusion_url_coupon_list() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/coupon_list.php";
            wp_die();
        }


    }
}
