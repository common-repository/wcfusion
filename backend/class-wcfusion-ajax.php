<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionAdminAjax')) {
    class wcFusionAdminAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;
            add_action( 'wp_ajax_wcfusion_update_module_status', array($this, 'wcfusion_update_module_status') );
            add_action( 'wp_ajax_wcfusion_update_all_module_status', array($this, 'wcfusion_update_all_module_status') );

        }

        function wcfusion_update_module_status() {
            include_once WCFUSION_PATH . "backend/api/update_module_status.php";
            wp_die();
        }

        /**
         * wcfusion_update_all_module_status
         */
        function wcfusion_update_all_module_status(){
            include_once WCFUSION_PATH . "backend/api/update_all_module_status.php";
            wp_die();
        }

    }
}
