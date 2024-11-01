<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionProductStickyBarAjax')) {
    class wcFusionProductStickyBarAjax
    {

        public $base_admin;

        public function __construct ($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action ('wp_ajax_wcfusion_product_sticky_bar_settings', array($this, 'wcfusion_product_sticky_bar_settings'));

        }

        function wcfusion_product_sticky_bar_settings ()
        {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/settings_product_sticky_bar.php";
            wp_die ();
        }

    }

}