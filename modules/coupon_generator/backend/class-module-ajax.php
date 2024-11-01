<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionCouponGeneratorAjax')) {
    class wcFusionCouponGeneratorAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wcfusion_coupon_generator_init', array($this, 'wcfusion_coupon_generator_init') );
            add_action( 'wp_ajax_wcfusion_coupon_generator_get_terms', array($this, 'wcfusion_coupon_generator_get_terms') );

        }

        function wcfusion_coupon_generator_init() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/create_bulk_coupon.php";
            wp_die();
        }

        function wcfusion_coupon_generator_get_terms() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/get_woo_terms.php";
            wp_die();
        }


    }
}
