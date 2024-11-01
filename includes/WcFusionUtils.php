<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'wcFusionUtils' ) ) {
    class wcFusionUtils
    {
        public $base_admin;
        public $modules = array();
        public $modules_obj = array();

        public function __construct()
        {

        }

        public function init($base_admin){
            $this->base_admin = $base_admin;
            $this->init_all_modules();
        }

        function init_all_modules() {
            $host = sanitize_text_field($_SERVER['HTTP_HOST']);
            if( 'localhost' == $host){
                $directories = glob(WCFUSION_MODULES_PATH . '\*' , GLOB_ONLYDIR);
                foreach ($directories as $module){
                    $qa_path = explode("\\", $module);
                    $qa_path = $qa_path[count($qa_path) - 1];

                    include_once WCFUSION_MODULES_PATH . "/" . $qa_path . "/config.php";
                    $this->modules[] = array("module_slug" => $module_slug, "module_title" => $module_title);
                }
            }else{
                $directories = glob(WCFUSION_MODULES_PATH . '/*' , GLOB_ONLYDIR);
                foreach ($directories as $module){
                    $qa_path = explode("\\", $module);
                    $qa_path = $qa_path[count($qa_path) - 1];

                    include_once $qa_path . "/config.php";
                    $this->modules[] = array("module_slug" => $module_slug, "module_title" => $module_title);
                }
            }


        }

        function enqueue_style( $name, $src = '', $deps = array(), $ver = WCFUSION_VERSION, $media = 'all' ) {
            $handle = "wcfusion-".$name;
            $src = WCFUSION_CSS_DIR . $src;
            _wp_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );
            $wp_styles = wp_styles();
            if ( $src ) {
                $_handle = explode( '?', $handle );
                $wp_styles->add( $_handle[0], $src, $deps, $ver, $media );
            }
            $wp_styles->enqueue( $handle );
        }

        function enqueue_script( $name, $src = '', $deps = array(), $ver = WCFUSION_VERSION, $in_footer = false ) {
            $handle = "wcfusion-".$name;
            $src = WCFUSION_JS_DIR . $src;
            _wp_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );
            $wp_scripts = wp_scripts();
            if ( $src || $in_footer ) {
                $_handle = explode( '?', $handle );
                if ( $src ) {
                    $wp_scripts->add( $_handle[0], $src, $deps, $ver );
                }
                if ( $in_footer ) {
                    $wp_scripts->add_data( $_handle[0], 'group', 1 );
                }
            }
            $wp_scripts->enqueue( $handle );
        }


        function module_enqueue_style( $module_slug, $name, $src = '', $deps = array(), $ver = WCFUSION_VERSION, $media = 'all' ) {
            $handle = "wcfusion-".$module_slug."-".$name;
            $src = WCFUSION_MODULES_DIR . $module_slug .'/assets/css/' . $src;
            _wp_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );
            $wp_styles = wp_styles();
            if ( $src ) {
                $_handle = explode( '?', $handle );
                $wp_styles->add( $_handle[0], $src, $deps, $ver, $media );
            }
            $wp_styles->enqueue( $handle );
        }

        function module_enqueue_script( $module_slug, $name, $src = '', $deps = array(), $ver = WCFUSION_VERSION, $in_footer = false ) {
            $handle = "wcfusion-".$module_slug."-".$name;
            $src = WCFUSION_MODULES_DIR . $module_slug .'/assets/js/' . $src;
            _wp_scripts_maybe_doing_it_wrong( __FUNCTION__, $handle );
            $wp_scripts = wp_scripts();
            if ( $src || $in_footer ) {
                $_handle = explode( '?', $handle );
                if ( $src ) {
                    $wp_scripts->add( $_handle[0], $src, $deps, $ver );
                }
                if ( $in_footer ) {
                    $wp_scripts->add_data( $_handle[0], 'group', 1 );
                }
            }
            $wp_scripts->enqueue( $handle );
        }

        /*
         * define wcfusion_update_postmeta
         *
         * @param1 $post_id (int)
         * @param2 $data [] // post meta data with valid meta key
         *
         * return void
         *
         * Author WPCommarze
         * Create At 20-02-2022
         * Update At -
         * Develop by Sazzad
         **/
        public function wcfusion_update_postmeta ( $post_id = '', $data = array() ){
            if( empty( $post_id ) || empty( $data ) || !is_array ( $data ) ){
                return;
            }

            foreach ( $data as $meta_key => $meta_val ) {
                if( !empty( $meta_key ) ){
                    update_post_meta( $post_id, $meta_key, $meta_val );
                }
            }
            return true;
        }

    }
}
