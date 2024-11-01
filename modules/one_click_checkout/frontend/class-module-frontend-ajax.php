<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionOneClickCheckoutFrontendAjax')) {
    class wcFusionOneClickCheckoutFrontendAjax {

        public $base_admin;
        public $wfocc_settings = array();
    
        public function __construct ($base_admin) {

            $this->base_admin = $base_admin;
            $this->wfocc_settings = get_option( 'wcfusion_one_click_checkout_settings', false );

        }


    }

}