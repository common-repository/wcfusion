<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionOneClickCheckoutAjax')) {
    class wcFusionOneClickCheckoutAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wcfusion_save_one_click_checkout_settings', array($this, 'wcfusion_save_one_click_checkout_settings') );

        }

        function wcfusion_save_one_click_checkout_settings() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/save-settings.php";
            wp_die();
        }


    }
}
