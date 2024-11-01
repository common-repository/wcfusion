<?php


// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionBogoDeal')) {
    class wcFusionBogoDeal
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;

        public function __construct($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;
            $this->utils = new wcFusionBogoDealUtils($this);
            new wcFusionBogoDealAjax($this);

            add_action('admin_enqueue_scripts', array($this, 'wcfusion_module_admin_enqueue'));


            if( $this->base_admin->db->getModuleStatus($this->module_slug) === 1 ) {
                add_action('woocommerce_add_to_cart', array($this->utils, 'addGiftProduct'));
                add_action('woocommerce_update_cart_action_cart_updated', array($this->utils, 'addGiftProduct'));
                add_action('woocommerce_cart_item_removed', array($this->utils, 'addGiftProduct'));

                add_filter('woocommerce_before_calculate_totals', array($this->utils, 'displayDiscountPrice'), 10, 1 );
                add_filter( 'woocommerce_cart_item_price', array($this->utils, 'displayDiscountPriceText'), 10, 3 );
            }



        }



        public function wcfusion_module_admin_enqueue($page)
        {
            if ($page == "toplevel_page_wcfusion-dashboard") {

                $this->base_admin->utils->module_enqueue_style($this->module_slug, "admin", "admin.css");
                $this->base_admin->utils->module_enqueue_script($this->module_slug, "admin", "admin.js", array('jquery'));

            }
        }


        public function wcfusion_module_dashboard()
        {
            include_once WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";
        }




    }
}

