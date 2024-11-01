<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionAutoApplyCouponAjax')) {
    class wcFusionAutoApplyCouponAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wcfusion_auto_apply_coupon_list', array($this, 'wcfusion_auto_apply_coupon_list') );
            add_action( 'wp_ajax_wcfusion_auto_apply_coupon_add', array($this, 'wcfusion_auto_apply_coupon_add') );
            add_action( 'wp_ajax_wcfusion_auto_apply_coupon_remove', array($this, 'wcfusion_auto_apply_coupon_remove') );
            add_action( 'wp_ajax_wcfusion_auto_apply_coupon_toggle', array($this, 'wcfusion_auto_apply_coupon_toggle') );

        }

        function wcfusion_auto_apply_coupon_list() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/coupon_list.php";
            wp_die();
        }

        function wcfusion_auto_apply_coupon_add() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/add_to_auto_coupon.php";
            wp_die();
        }

        function wcfusion_auto_apply_coupon_remove() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/remove_to_auto_coupon.php";
            wp_die();
        }

        function wcfusion_auto_apply_coupon_toggle() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/toggle_auto_coupon.php";
            wp_die();
        }


    }
}
