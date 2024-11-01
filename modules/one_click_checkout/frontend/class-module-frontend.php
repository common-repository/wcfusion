<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionOneClickCheckoutFrontend')) {
    class wcFusionOneClickCheckoutFrontend
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;
        public $wfocc_settings = array();

        public function __construct ($base_admin, $module_slug, $module_title){
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            new wcFusionOneClickCheckoutFrontendAjax($this);
         
            add_action ('wp_enqueue_scripts', array($this, 'wcfusion_module_frontend_enqueue'));
            add_action('wp_enqueue_scripts', array($this,'wfocc_custom_styling'));

            $this->wfocc_settings = get_option( 'wcfusion_one_click_checkout_settings', false );
            $this->init_cart_and_checkout_controls();

            $enableRedirectTo  =  isset($this->wfocc_settings['wfocc_enable_redirect_to_cart']) ? 'yes' : 'no';

            if( 'yes' ==  $enableRedirectTo ){
                add_filter( 'woocommerce_add_to_cart_redirect', array($this,'wfocc_redirect_to_selected_page') );
            }

        }

        public function wcfusion_module_frontend_enqueue ($page) {

            $this->base_admin->utils->module_enqueue_style ($this->module_slug, "frontend", "frontend.css");
            $this->base_admin->utils->module_enqueue_script ($this->module_slug, "frontend", "frontend.js", array('jquery'));

            
             // create localize
             wp_localize_script( "wcfusion-".$this->module_slug."-frontend", 'wcfusion_occ_frontend_object', array(
                'ajaxurl' => admin_url( 'admin-ajax.php' ),
                'security' => wp_create_nonce( 'wcfusion_occ_hashkey' ),
                'wcfusion_occ_settings' => !empty( $this->wfocc_settings) ? json_encode ( $this->wfocc_settings) : json_encode( array() )
            ));

        }

        public function init_cart_and_checkout_controls() {

            if (!empty($this->wfocc_settings)) {

                $wfocc_disable_cart                  = isset($this->wfocc_settings['wfocc_disable_cart']) ? 'yes' : 'no';
                $wfocc_enable_redirect               = isset($this->wfocc_settings['wfocc_enable_redirect_to_cart']) ? 'yes' : 'no';
                $wfocc_enable_single_page            = isset($this->wfocc_settings['wfocc_enable_single_page']) ? 'yes' : 'no';
                $wfocc_continue_shopping             = isset($this->wfocc_settings['wfocc_disable_continue_shopping_button']) ? 'yes' : 'no';
                $wfocc_change_cart_btn_text          = isset($this->wfocc_settings['wfocc_change_add_to_cart_button_text']) ? 'yes' : 'no';
                $wfocc_enable_bnb_on_product         = isset($this->wfocc_settings['wfocc_enable_buy_now_button_on_product']) ? 'yes' : 'no';
                $wfocc_enable_bnb_on_product_archive = isset($this->wfocc_settings['wfocc_enable_buy_now_button_on_product_archive']) ? 'yes': 'no';
                $wfocc_remove_order_comment          = isset($this->wfocc_settings['wfocc_remove_order_comment']) ? 'yes' : 'no';
                $wfocc_remove_coupon_form            = isset($this->wfocc_settings['wfocc_remove_coupon_form']) ? 'yes' : 'no';
                $wfocc_remove_policy_text            = isset($this->wfocc_settings['wfocc_remove_policy_text']) ? 'yes' : 'no';

                $wfocc_remove_billing_fields = !empty($this->wfocc_settings) && !empty($this->wfocc_settings['wfocc_remove_billing_fields']) ? explode (',',$this->wfocc_settings['wfocc_remove_billing_fields']) : array();

                $wfocc_remove_shipping_fields = !empty($this->wfocc_settings) && !empty($this->wfocc_settings['wfocc_remove_shipping_fields']) ? explode (',',$this->wfocc_settings['wfocc_remove_shipping_fields']) : array();
            

                //Disable cart  Switcher
                if ( 'yes' === $wfocc_disable_cart ) {
                    add_action('template_redirect', array($this, 'wfocc_cart_redirect'));
                    remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 10);
                }

                //Enable cart redirect Switcher
                if ( 'yes' === $wfocc_enable_redirect ) {
                    // Unset all options related to the cart
                    update_option( 'woocommerce_enable_ajax_add_to_cart', 'no' );
                }else{
                    update_option( 'woocommerce_enable_ajax_add_to_cart', 'yes' );
                }

                //Enable single page Switcher
                if( 'yes' ===  $wfocc_enable_single_page ){
                    add_filter( 'the_content', array($this,'single_page_template') ) ;
                }

                //Enable continue shopping
                if( 'yes' ===  $wfocc_continue_shopping ){
                    add_filter( 'wc_add_to_cart_message_html', array($this,'remove_continue_shopping_button'));
                }

                //Enable change cart btn_text
                if( 'yes' ===  $wfocc_change_cart_btn_text ){
                    add_filter('woocommerce_product_single_add_to_cart_text', array($this, 'wfocc_custom_single_add_to_cart_text'), 10, 2);     
                    add_filter('woocommerce_product_add_to_cart_text', array($this, 'wfocc_custom_product_add_to_cart_text'), 10, 2);
                }

                //Enable Buy now button on product page
                if( 'yes' ===  $wfocc_enable_bnb_on_product ){
                    add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'wfocc_add_quick_buy_button' ), 99 );   
                }

                //Enable Buy now button on product page Archive
                if( 'yes' ===  $wfocc_enable_bnb_on_product_archive ){
                    add_action( 'woocommerce_after_shop_loop_item', array( $this, 'wfocc_add_shop_quick_buy_button' ), 11 );
                }

                //Remove Order comment
                if( 'yes' ===  $wfocc_remove_order_comment ){
                    add_filter( 'woocommerce_checkout_fields' , [ $this,'wfocc_remove_order_comment' ] );                 
                }

                //Remove Order coupon
                if( 'yes' === $wfocc_remove_coupon_form ){
                    add_filter( 'woocommerce_coupons_enabled', array($this,'wfocc_remove_coupon') );                 
                }
     

            }

        }

        public function single_page_template($content) {
            global $post;
            $cart_id = wc_get_page_id('checkout');
            if ($post->ID == $cart_id) {
                
                ob_start();
                if ( !is_wc_endpoint_url( 'order-received' ) ){
                    echo do_shortcode('[woocommerce_cart]');
                }
                echo do_shortcode('[woocommerce_checkout]');
                
                $output = ob_get_contents();
                ob_end_clean();
                $content = $output;
            }
            return $content;
        }

        public function wfocc_redirect_to_selected_page( $url ) {
            if (defined('DOING_AJAX') && DOING_AJAX) return "";

            wc_clear_notices();

            $default_checkout =  wc_get_page_permalink( 'checkout' );
            $enable_redirect_to  =  isset($this->wfocc_settings['wfocc_enable_redirect_to_cart']) ? 'yes' : 'no';
            $enable_custom_url   =  isset($this->wfocc_settings['wfocc_enable_custom_url']) ? 'yes' : 'no';
            $custom_redirect_url = !empty( $this->wfocc_settings ) && !empty($this->wfocc_settings['wfocc_redirect_to_custom_url']) ? $this->wfocc_settings['wfocc_redirect_to_custom_url'] : $default_checkout; 
            $page_url =  !empty( $this->wfocc_settings ) && !empty($this->wfocc_settings['wfocc_redirect_to_page']) ? $this->wfocc_settings['wfocc_redirect_to_page'] : $default_checkout;

            if( 'yes' === $enable_redirect_to ){
                if( 'yes' ===  $enable_custom_url ){
                    $url = $custom_redirect_url;
                }else{
                    $url =  $page_url;
                }
            }

            return $url;
      
        }

        public function wfocc_cart_redirect($permalink) {
                $cart_id = wc_get_page_id('cart');
                $checkout_id = wc_get_page_id('checkout');
        
                if($cart_id == $checkout_id) { return; }
        
                if ( ! is_cart() ) { return; }
                if ( WC()->cart->get_cart_contents_count() == 0 ) {
                    wp_redirect( apply_filters( 'wfocc_redirect', wc_get_page_permalink( 'shop' ) ) );
                    exit;
                }
        
                // Redirect to checkout page
                wp_redirect( wc_get_checkout_url(), '301' );
                exit;
        }

        public function woocommerce_widget_shopping_cart_proceed_to_checkout() {
            echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">' . esc_html_e( 'View cart', 'woocommerce' ) . '</a>';
        }

        public function remove_continue_shopping_button( $string, $product_id = 0 ) {
            $start = strpos( $string, '<a href=' ) ?: 0;
            $end = strpos( $string, '</a>', $start ) ?: 0;
            return substr( $string, $end ) ?: $string;
        }

        public function wfocc_custom_single_add_to_cart_text( $button_text, $product){

            $wfocc_add_to_cart_btn_text =  !empty( $this->wfocc_settings ) && !empty($this->wfocc_settings['wfocc_cart_button_text']) ? $this->wfocc_settings['wfocc_cart_button_text'] : 'Add to cart'; 

            $button_text = $wfocc_add_to_cart_btn_text;
            return $button_text; 
        }

        public function wfocc_custom_product_add_to_cart_text( $button_text, $product){

           $wfocc_add_to_cart_btn_text =  !empty( $this->wfocc_settings ) && !empty($this->wfocc_settings['wfocc_cart_button_text']) ? $this->wfocc_settings['wfocc_cart_button_text'] : 'Add to cart'; 

           $wfocc_select_options_btn_text =  !empty( $this->wfocc_settings ) && !empty($this->wfocc_settings['wfocc_select_options_button_text']) ? $this->wfocc_settings['wfocc_select_options_button_text'] : 'Select Options';

           $wfocc_read_more_btn_text =  !empty( $this->wfocc_settings ) && !empty($this->wfocc_settings['wfocc_read_more_button_text']) ? $this->wfocc_settings['wfocc_read_more_button_text'] : 'Read More'; 

           $product_price =  $product->get_regular_price();

            if($product->is_type('variable')){
                $button_text = $wfocc_select_options_btn_text; 
            }else if( empty($product_price) ){
                $button_text = $wfocc_read_more_btn_text;
            }else{
                if($product->is_in_stock()){
                    $button_text = $wfocc_add_to_cart_btn_text; 
                }else{
                    $button_text = $wfocc_read_more_btn_text; 
                }
            }
            return $button_text;
        }

        public function wfocc_add_quick_buy_button() {
            global $product;
            $product_id    = $product->get_id();
            $product_price = $product->get_regular_price();

            $class = !empty($this->wfocc_settings['wfocc_buy_btn_position_on_product']) ? $this->wfocc_settings['wfocc_buy_btn_position_on_product'] : '';

            $buy_btn_redirect = !empty($this->wfocc_settings['wfocc_buy_btn_redirect_on_product']) ? $this->wfocc_settings['wfocc_buy_btn_redirect_on_product'] : wc_get_checkout_url();
            $wfocc_buy_btn_label = !empty($this->wfocc_settings['wfocc_buy_btn_label_on_product']) ? $this->wfocc_settings['wfocc_buy_btn_label_on_product'] : 'Buy Now';

             if( !empty($product_price) ){
                echo '<a href="'. $buy_btn_redirect.'" class="button wfocc_single_product_buy_now  wfocc_'.$class.'" type="submit" name="wfocc_quick_checkout" value="'.esc_attr($product_id).'">'.$wfocc_buy_btn_label.'</a>';
            }

            if ($product->get_type() == 'variable'){
                echo '<a  data-redirect="'.$buy_btn_redirect.'"  href="javascript:void(0)" class="wfocc_variation_btn_disabled button wfocc_single_product_buy_now  wfocc_'.$class.'" type="submit" name="wfocc_quick_checkout" value="'.esc_attr($product_id).'">'.$wfocc_buy_btn_label.'</a>';
            }
                        
            
        }

        public function wfocc_add_shop_quick_buy_button(){
            global $product;
            $product_price = $product->get_regular_price();

            $class = !empty($this->wfocc_settings['wfocc_buy_btn_position_on_product_archive']) ? $this->wfocc_settings['wfocc_buy_btn_position_on_product_archive'] : '';
            $buy_btn_redirect = !empty($this->wfocc_settings['wfocc_buy_btn_redirect_on_product_archive']) ? $this->wfocc_settings['wfocc_buy_btn_redirect_on_product_archive'] : wc_get_checkout_url();
            $wfocc_buy_btn_label = !empty($this->wfocc_settings['wfocc_buy_btn_label_on_product_archive']) ? $this->wfocc_settings['wfocc_buy_btn_label_on_product_archive'] : 'Buy Now';

            if( $product->is_in_stock() && !empty( $product_price ) ){
                echo '<a href="'. $buy_btn_redirect.'" class="button wfocc_product_archive_buy_now wfoccpa_'.$class.'" type="submit" name="wfocc_quick_checkout" value="">'.$wfocc_buy_btn_label.'</a>';
            }
                  
        }

        public function wfocc_custom_styling(){

            $buy_btn_width = !empty($this->wfocc_settings['wfocc_buy_btn_size_on_product']) ? $this->wfocc_settings['wfocc_buy_btn_size_on_product'].'px' : 'fit-content';
            $pa_buy_btn_width = !empty($this->wfocc_settings['wfocc_buy_btn_size_on_product_archive']) ? $this->wfocc_settings['wfocc_buy_btn_size_on_product_archive'].'px' : 'fit-content';

            $wfocc_buy_now_btn_color = !empty( $this->wfocc_settings ) && isset( $this->wfocc_settings['wfocc_buy_now_btn_color'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_color'] : '#ffffff';
            $wfocc_buy_now_btn_bg_color = !empty( $this->wfocc_settings ) && isset( $this->wfocc_settings['wfocc_buy_now_btn_bg_color'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_bg_color'] : '#0170B9';

            $wfocc_bnb_product_mt = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_mt'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_mt'].'px' : '0px';
            $wfocc_bnb_product_mb = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_mb'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_mb'].'px' : '0px';
            $wfocc_bnb_product_ml = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_ml'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_ml'].'px' : '0px';
            $wfocc_bnb_product_mr = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_mr'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_mr'].'px' : '0px';

            $wfocc_bnb_product_archive_mt = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mt'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mt'].'px' : '0px';
            $wfocc_bnb_product_archive_mb = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mb'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mb'].'px' : '0px';

            $wfocc_buy_now_product_archive_btn_ml = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_archive_ml'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_ml'].'px' : '0px';
            $wfocc_buy_now_product_archive_btn_mr = !empty( $this->wfocc_settings ) && !empty( $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mr'] ) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mr'].'px' : '0px';

            
            $custom_style    = '';

            $custom_style .= "a.button.wfocc_single_product_buy_now{
                width: $buy_btn_width;
                color: $wfocc_buy_now_btn_color;
                background-color:  $wfocc_buy_now_btn_bg_color;            
                text-align: center;
                border-radius: 3 !important;
                padding: 15px 30px !important;
                margin-top: $wfocc_bnb_product_mt !important;
                margin-bottom:$wfocc_bnb_product_mb !important;
                margin-left: $wfocc_bnb_product_ml !important;
                margin-right:$wfocc_bnb_product_mr !important;
        
            }";

            $custom_style .= "a.button.wfocc_single_product_buy_now:hover{
                color: #ffffff;
                background-color: #000;            
            }";

            $custom_style .= "a.button.wfocc_product_archive_buy_now{
                width: $pa_buy_btn_width;
                color: $wfocc_buy_now_btn_color;
                background-color:  $wfocc_buy_now_btn_bg_color;
                text-align: center;
                border-radius: 3 !important;
                padding: 15px 30px !important;
                margin-top: $wfocc_bnb_product_archive_mt !important;
                margin-bottom: $wfocc_bnb_product_archive_mb !important;
                margin-left: $wfocc_buy_now_product_archive_btn_ml !important;
                margin-right: $wfocc_buy_now_product_archive_btn_mr !important;
            }";

            $custom_style .= "a.button.wfocc_product_archive_buy_now:hover{
                color: #ffffff;
                background-color:#000;
            } ";
      
            wp_register_style('wfocc-stylesheet', false);
            wp_enqueue_style('wfocc-stylesheet', false);
            wp_add_inline_style('wfocc-stylesheet', $custom_style, true);
        }

        // Remove checkout page order comment
        public function wfocc_remove_order_comment($fields ){
            unset($fields['order']['order_comments']);
            return $fields;
        }

        //Remove checkout order coupon form
        public function wfocc_remove_coupon( $enabled ) {
            if ( is_checkout() ) {
                $enabled = false;
            }
            return $enabled;
        }

    }
}
