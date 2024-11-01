<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionPdfInvoicetFrontendAjax')) {
    class wcFusionPdfInvoicetFrontendAjax
    {

        public $base_admin;
        public $wffc_carts = array();
        public $wfc_settings = array();

        public function __construct ($base_admin)
        {

            $this->base_admin = $base_admin;

            //add_action ('wp_ajax_#', array($this, 'wcfusion_#'));

        }

        public function wcfusion_init_(){

            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/#.php";
            wp_die ();
        }


    }

}