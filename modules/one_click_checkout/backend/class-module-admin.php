<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionOneClickCheckoutAdmin')) {
    class wcFusionOneClickCheckoutAdmin
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;
        public $wfocc_settings = array();

        public function __construct ($base_admin, $module_slug, $module_title) {
            $this->base_admin   = $base_admin;
            $this->module_slug  = $module_slug;
            $this->module_title = $module_title;

            add_action ('admin_enqueue_scripts', array($this, 'wcfusion_module_admin_enqueue'));

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            $this->utils = new wcFusionOneClickCheckoutUtils($this);
            new wcFusionOneClickCheckoutAjax($this);

            $this->wfocc_settings = get_option( 'wcfusion_one_click_checkout_settings', false );
        
        }

        public function wcfusion_module_admin_enqueue ($page) {
            if ($page == "toplevel_page_wcfusion-dashboard") {
                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "admin", "admin.css");
                $this->base_admin->utils->module_enqueue_script ($this->module_slug, "admin", "admin.js", array('jquery','wp-color-picker'));

                // create localize
                wp_localize_script( "wcfusion-".$this->module_slug."-admin", 'wcfusion_occ_admin_object', array(
                    'wcfusion_occ_settings' => !empty($this->wfocc_settings) ? json_encode ($this->wfocc_settings) : json_encode( array() )
                ));

            }
        }

        public function wcfusion_module_dashboard (){

            $wfocc_buy_now_btn_color = !empty( $this->wfocc_settings ) && isset( $this->wfocc_settings['wfocc_buy_now_btn_color'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_color'] : '#ffffff';

            $wfocc_buy_now_btn_bg_color = !empty( $this->wfocc_settings ) && isset( $this->wfocc_settings['wfocc_buy_now_btn_bg_color'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_bg_color'] : '#0170B9';

            $wfocc_buy_now_btn_hover_color = !empty( $this->wfocc_settings ) && isset( $this->wfocc_settings['wfocc_buy_now_btn_hover_color'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_hover_color'] : '#ffffff';

            $wfocc_buy_now_btn_hover_bg_color = !empty( $this->wfocc_settings ) && isset( $this->wfocc_settings['wfocc_buy_now_btn_hover_bg_color'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_hover_bg_color'] : '#000';


            //Load view
            include_once WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";
        }

    }
}
