<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionProductStickyBarFrontendAjax')) {
    class wcFusionProductStickyBarFrontendAjax
    {

        public $base_admin;

        public function __construct ($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action ('wp_ajax_wcfusion_product_sticky_bar_settings', array($this, 'wcfusion_product_sticky_bar_settings'));

            add_action ('wp_ajax_wcfusion_psb_add_to_cart', array( $this, 'wcfusion_psb_add_to_cart'));
            add_action('wp_ajax_nopriv_wcfusion_psb_add_to_cart',  array( $this,'wcfusion_psb_add_to_cart'));

        }

        function wcfusion_product_sticky_bar_settings ()
        {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/product-sticky-bar-settings.php";
            wp_die ();
        }

        // define
        public function wcfusion_psb_add_to_cart(){
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/frontend/api/psb-add-to-cart.php";
            wp_die ();
        }

    }

}