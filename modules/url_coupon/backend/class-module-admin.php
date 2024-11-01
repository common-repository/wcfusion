<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionUrlCouponAdmin')) {
    class wcFusionUrlCouponAdmin
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            add_action ('admin_enqueue_scripts', array($this, 'wcfusion_module_admin_enqueue'));

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            $this->utils = new UrlCouponUtils($this);
            new wcFusionUrlCouponAjax($this);



            add_filter( 'woocommerce_coupon_data_tabs', array( $this->utils, 'wcfusion_url_coupon_admin_data_tab' ), 10, 1 );
            add_action( 'woocommerce_coupon_data_panels', array( $this->utils, 'wcfusion_url_coupon_admin_data_panel' ) );
            add_action( 'save_post', array( $this->utils, 'wcfusion_save_url_coupon_data'), 10, 1 );

            add_action( 'template_redirect', array( $this->utils, 'wcfusion_implement_url_coupon' ), 10, 2 );
            add_action( 'woocommerce_thankyou', array($this->utils, 'wcfusion_session_unset'), 10, 2 );
            add_action( 'woocommerce_cart_totals_before_order_total', array($this->utils, 'wcfusion_session_unset'), 10, 2 );
            add_filter('woocommerce_coupon_message', array($this->utils, 'wcfusion_coupon_success_mesage'), 10, 3);

        }


        function wcfusion_module_admin_enqueue ($page)
        {
            if ($page == "toplevel_page_wcfusion-dashboard") {

                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "admin", "admin.css");
                $this->base_admin->utils->module_enqueue_script ($this->module_slug, "admin", "admin.js", array('jquery'));

            }
        }


        function wcfusion_module_dashboard ()
        {
            include_once WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";
        }

    }
}

