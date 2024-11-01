<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionAdmin')) {
    class wcFusionAdmin
    {

        public $utils;
        public $db;
        public function __construct()
        {

            $this->utils = new wcFusionUtils();
            $this->db = new wcFusionDB();

            $this->utils->init($this);
            $this->db->init($this);
            new wcFusionAdminAjax($this);

            add_action("admin_menu", array($this, 'wcfusion_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'wcfusion_admin_enqueue'));
            add_action( 'plugin_action_links_' . WCFUSION_BASE_PATH, array( $this, 'wcfusion_action_links') );

        }


        function wcfusion_action_links($links) {
            $settings_url = add_query_arg( 'page', 'wcfusion-dashboard', get_admin_url() . 'admin.php' );
            $setting_arr = array('<a href="' . esc_url( $settings_url ) . '">Dashboard</a>');
            $pro_arr = array('<a target="_blank" href="https://wcfusion.com"><span style="color: #6E32C9; font-weight: bold;">Get Pro</span></a>');
            $links = array_merge($setting_arr, $links, $pro_arr);
            return $links;
        }

        function wcfusion_admin_menu()
        {
            $icon_url = WCFUSION_IMG_DIR . "wcfusion_icon.svg";
            add_menu_page("wcFusion", "wcFusion", 'manage_options', "wcfusion-dashboard", array($this, 'wcfusion_admin_dashboard'), $icon_url, 6);
        }

        function wcfusion_admin_enqueue( $page ) {
            $screen = get_current_screen();

            if ( in_array( $screen->id, ["toplevel_page_wcfusion-dashboard"] ) ) {

                $this->utils->enqueue_style('admin', 'admin.css');
                $this->utils->enqueue_style('toastr', 'toastr.min.css');
                $this->utils->enqueue_style('select2', 'select2.min.css');
                $this->utils->enqueue_style('responsive', 'responsive.css');

                $this->utils->enqueue_script('admin', 'admin.js', array('jquery'));
                $this->utils->enqueue_script('toastr', 'toastr.min.js', array('jquery'));
                $this->utils->enqueue_script('select2', 'select2.min.js', array('jquery'));
                $this->utils->enqueue_script ("data-tables", "data-tables.js", array('jquery'));
            }

        }

        function wcfusion_admin_dashboard()
        {
            include_once WCFUSION_PATH . "backend/templates/dashboard.php";

        }

    }
}


new wcFusionAdmin();