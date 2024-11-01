<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionFloatingCartFrontend')) {
    class wcFusionFloatingCartFrontend
    {

        public $base_admin;
        public $module_slug;
        public $module_title;
        public $show_in;
        public $wfc_settings;
        public $wffc_carts = array();
        public $current_pages_id = '';
        public $dont_show_pages = array();

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            add_action ('wp_enqueue_scripts', array($this, 'wcfusion_module_frontend_enqueue'));

            if( $this->base_admin->db->getModuleStatus($this->module_slug) !== 1 ) {
                return;
            }

//            if( !class_exists('\Woocommerce') ){
//                echo _e('Please setup WooCommerce Plugin', 'wcfusion');
//                return;
//            }

            // get cart settings data
            $this->wfc_settings = get_option('wcfusion_floating_cart_settings', false);

            // load ajax controller
            new wcFusionFloatingCartFrontendAjax($this);

            add_filter( 'woocommerce_loop_add_to_cart_args', array($this, 'wcfusion_woocommerce_loop_add_to_cart_args'), 10, 2 );

            add_action('wp_head', array( $this, 'wcfusion_fc_custom_styles'), 100);

            if( !empty($this->wfc_settings) && !empty( $this->wfc_settings['wffc_dont_show_cart_pages'] ) ){
                $this->dont_show_pages = explode (',', $this->wfc_settings['wffc_dont_show_cart_pages']);
            }

            add_action('template_redirect', function(){
                if( ! in_array ( get_the_ID(), $this->dont_show_pages ) ){
                    add_action ('wp_footer', array($this, 'wcfusion_load_floating_cart'), 10, 2);
                }
            });

        }

        public function wcfusion_fc_custom_styles(){
            include_once WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/frontend/templates/views/inline-style.php";
        }

        function wcfusion_module_frontend_enqueue ()
        {

            $this->base_admin->utils->module_enqueue_style ($this->module_slug, "frontend", "frontend.css");
            $this->base_admin->utils->module_enqueue_script ($this->module_slug, "frontend", "frontend.js", array('jquery'));

            //ntigrat inline style
            $wffc_inline_style = include_once WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/frontend/templates/views/inline-style.php";
            wp_add_inline_style( "wcfusion-".$this->module_slug."inline-style-frontend", $wffc_inline_style );

            // create localize
            wp_localize_script( "wcfusion-".$this->module_slug."-frontend", 'wcfusion_fc_fronted_object', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'security' => wp_create_nonce( 'woofusionfcf_hashkey' ),
                'wcfusion_fc_settings' => !empty($this->wfc_settings) ? json_encode ($this->wfc_settings) : json_encode( array() )
            ));
        }


        public function wcfusion_load_floating_cart(){

            include_once WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/frontend/templates/views/floating-cart-content.php";

        }

        public function wcfusion_woocommerce_loop_add_to_cart_args($wp_parse_args, $product){
            // initialize
            $custom_class = 'wcfusion_added_to_cart';

            // not empty
            if ( ! empty ( $custom_class ) && $product->get_type() == 'simple' ) {
                // add style class
                $wp_parse_args['class'] = implode(
                    ' ',
                    array_filter(
                        array(
                            'button' . ' ' . $custom_class,
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                );
            }

            return $wp_parse_args;
        }

    }
}