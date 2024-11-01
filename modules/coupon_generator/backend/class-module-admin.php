<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionCouponGeneratorAdmin')) {
    class wcFusionCouponGeneratorAdmin
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

            $this->utils = new wcFusionCouponGeneratorUtils($this);
            new wcFusionCouponGeneratorAjax($this);

            add_action ('admin_enqueue_scripts', array($this, 'wcfusion_module_admin_enqueue'));

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

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

