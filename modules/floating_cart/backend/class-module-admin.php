<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('wcFusionFloatingCartAdmin')) {
    class wcFusionFloatingCartAdmin
    {

        public $utils;
        public $base_admin;
        public $module_slug;
        public $module_title;
        public $wffc_settings = array();

        public function __construct ($base_admin, $module_slug, $module_title)
        {
            $this->base_admin = $base_admin;
            $this->module_slug = $module_slug;
            $this->module_title = $module_title;

            add_action ('admin_enqueue_scripts', array($this, 'wcfusion_module_admin_enqueue'));

            if (!$this->base_admin->db->getModuleStatus ($this->module_slug)) {
                return;
            }

            $this->utils = new FloatingCartUtils($this);
            new wcFusionFloatingCartAjax($this);

            $this->wffc_settings = get_option('wcfusion_floating_cart_settings', false);

        }


        function wcfusion_module_admin_enqueue ($page)
        {
            if ($page == "toplevel_page_wcfusion-dashboard") {
                $this->base_admin->utils->module_enqueue_style ($this->module_slug, "admin", "admin.css");
                $this->base_admin->utils->module_enqueue_script ($this->module_slug, "admin", "admin.js", array('jquery','wp-color-picker'));

                wp_localize_script( "wcfusion-".$this->module_slug."-admin", 'wffc_admin_object', array(
                    'wffc_settings' => !empty($this->wffc_settings) ? json_encode ($this->wffc_settings) : json_encode( array() )
                ));
            }
        }


        function wcfusion_module_dashboard ()
        {
            $auto_open_cart     = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_auto_open_cart'] ) ? 'yes' : 'no';
            $cart_item_order    = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_cart_item_order'] ) ? $this->wffc_settings['wffc_cart_item_order'] : 'asc';
            $bascket_count      = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_bascket_count'] ) ? $this->wffc_settings['wffc_bascket_count'] : 'number_of_items';
            $empty_cart_url     = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_redirect_url_empty_cart_btn'] ) ? $this->wffc_settings['wffc_redirect_url_empty_cart_btn'] : '';
            $dont_show_pages    = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_dont_show_cart_pages'] ) ? explode(',',$this->wffc_settings['wffc_dont_show_cart_pages']) : array();

            // header settings
            $show_notification          = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_header_notification'] ) ? 'yes' : 'no';
            $show_header_basket_icon    = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_header_basket_icon'] ) ? 'yes' : 'no';
            $show_header_close_icon     = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_header_close_icon'] ) ? 'yes' : 'no';
            $notification_duractions    = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_notification_duractions'] ) ? $this->wffc_settings['wffc_notification_duractions'] : '2000';

            // body settings
            $show_product_image         = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_product_image'] ) ? 'yes' : 'no';
            $show_product_name          = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_product_name'] ) ? 'yes' : 'no';
            $show_product_price         = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_product_price'] ) ? 'yes' : 'no';
            $show_product_price_total   = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_product_price_total'] ) ? 'yes' : 'no';
            $show_product_meta          = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_product_meta'] ) ? 'yes' : 'no';
            $show_product_sale_count    = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_product_sale_count'] ) ? 'yes' : 'no';
            $link_to_single_product     = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_link_to_single_product'] ) ? 'yes' : 'no';
            $delete_item_form_cart      = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_delete_item_form_cart'] ) ? 'yes' : 'no';
            $allowed_quantity_update    = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_allowed_quantity_update'] ) ? 'yes' : 'no';
            $show_variable_product_name = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_variable_product_name'] ) ? 'yes' : 'no';

            // footer settings
            $show_subtotal          = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_subtotal'] ) ? 'yes' : 'no';
            $show_discount          = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_discount'] ) ? 'yes' : 'no';
            $show_tax               = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_tax'] ) ? 'yes' : 'no';
            $show_shipping_amount   = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_shipping_amount'] ) ? 'yes' : 'no';
            $show_cart_total        = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_cart_total'] ) ? 'yes' : 'no';
            $show_coupon            = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_coupon'] ) ? 'yes' : 'no';

            // suggested products settings
            $enamble_suggested_product = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_enamble_suggested_product'] ) ? 'yes' : 'no';
            $show_suggested_product_title = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_suggested_product_title'] ) ? 'yes' : 'no';
            $show_suggested_product_image = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_suggested_product_image'] ) ? 'yes' : 'no';
            $show_suggested_product_price = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_suggested_product_price'] ) ? 'yes' : 'no';
            $show_suggested_patcb = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_suggested_product_add_to_cart_btn'] ) ? 'yes' : 'no';
            $show_suggested_product_type = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_suggested_product_type'] ) ? $this->wffc_settings['wffc_show_suggested_product_type'] : '';
            $show_suggested_product_numer = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_suggested_product_numer'] ) ? $this->wffc_settings['wffc_show_suggested_product_numer'] : 4;
            $show_suggested_products = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_show_suggested_products'] ) ? explode (',', $this->wffc_settings['wffc_show_suggested_products']) : array();

            // typography settings
            $wffc_heading_title = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_heading_title'] ) ? $this->wffc_settings['wffc_heading_title'] : 'Your Shopping Cart';
            $wffct_continue_btn_text = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffct_continue_btn_text'] ) ? $this->wffc_settings['wffct_continue_btn_text'] : 'Continue Shopping';
            $wffc_view_cart_text = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_view_cart_text'] ) ? $this->wffc_settings['wffc_view_cart_text'] : 'View Cart';
            $wffc_checkout_btn_text = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_checkout_btn_text'] ) ? $this->wffc_settings['wffc_checkout_btn_text'] : 'Checkout';
            $wffc_empty_cart_message = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_empty_cart_message'] ) ? $this->wffc_settings['wffc_empty_cart_message'] : 'No items in cart';
            $wffc_shop_btn_text = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_shop_btn_text'] ) ? $this->wffc_settings['wffc_shop_btn_text'] : 'Back to Shop';
            $wffc_subtotal_text = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_subtotal_text'] ) ? $this->wffc_settings['wffc_subtotal_text'] : 'Subtotal';
            $wffc_freeshipping_message = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_freeshipping_message'] ) ? $this->wffc_settings['wffc_freeshipping_message'] : 'Congrats! You get free shipping.';

            // redirect urls
            $wffc_continue_btn_url = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_continue_btn_url'] ) ? $this->wffc_settings['wffc_continue_btn_url'] : home_url() . '/shop';
            $wffc_view_cart_btn_url = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_view_cart_btn_url'] ) ? $this->wffc_settings['wffc_view_cart_btn_url'] : home_url() . '/cart';
            $wffc_checkout_btn_url = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wffc_checkout_btn_url'] ) ? $this->wffc_settings['wffc_checkout_btn_url'] : home_url() . '/checkout';

            //general style
            $wcfusion_fc_width = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fc_width'] ) ? $this->wffc_settings['wcfusion_fc_width'] : '460';
            $wcfusion_fcbfs_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcbfs_style'] ) ? $this->wffc_settings['wcfusion_fcbfs_style'] : '16';
            $wcfusion_fc_open_from = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fc_open_from'] ) ? $this->wffc_settings['wcfusion_fc_open_from'] : 'right';

            // header style settings
            $wcfusion_fchta_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fchta_style'] ) ? $this->wffc_settings['wcfusion_fchta_style'] : '';
            $wcfusion_fchbis_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fchbis_style'] ) ? $this->wffc_settings['wcfusion_fchbis_style'] : '35';
            $wcfusion_fchcia_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fchcia_style'] ) ? $this->wffc_settings['wcfusion_fchcia_style'] : '';
            $wcfusion_fcci_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcci_style'] ) ? $this->wffc_settings['wcfusion_fcci_style'] : '';
            $wcfusion_fccis_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fccis_style'] ) ? $this->wffc_settings['wcfusion_fccis_style'] : '25';
            $wcfusion_fchfs_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fchfs_style'] ) ? $this->wffc_settings['wcfusion_fchfs_style'] : '21';

            //cart content style
            $wcfusion_fcccdis_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcccdis_style'] ) ? $this->wffc_settings['wcfusion_fcccdis_style'] : '20';
            $wcfusion_fccdi_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fccdi_style'] ) ? $this->wffc_settings['wcfusion_fccdi_style'] : '';
            $wcfusion_fcccfs_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcccfs_style'] ) ? $this->wffc_settings['wcfusion_fcccfs_style'] : '16';

            //Cart Content Product Style
            $wcfusion_fcccpiw_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcccpiw_style'] ) ? $this->wffc_settings['wcfusion_fcccpiw_style'] : '20';

            $wcfusion_fciptfs_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fciptfs_style'] ) ? $this->wffc_settings['wcfusion_fciptfs_style'] : '16';
            $wcfusion_fccpid_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fccpid_style'] ) ? $this->wffc_settings['wcfusion_fccpid_style'] : '';

            // suggested product
            $wcfusion_fcspiw_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcspiw_style'] ) ? $this->wffc_settings['wcfusion_fcspiw_style'] : '80';
            $wcfusion_fcspfs_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcspfs_style'] ) ? $this->wffc_settings['wcfusion_fcspfs_style'] : '16';
            $wcfusion_fcspbg_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcspbg_style'] ) ? $this->wffc_settings['wcfusion_fcspbg_style'] : '#fff';
            $wcfusion_fccpid_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fccpid_style'] ) ? $this->wffc_settings['wcfusion_fccpid_style'] : 'after_totals';

            // footer style
            $wcfusion_fcfpf_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcfpf_style'] ) ? 'yes' : 'no';
            $wcfusion_fcfp_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcfp_style'] ) ? $this->wffc_settings['wcfusion_fcfp_style'] : '';

            // basket style
            $wcfusion_fcbs_enable = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcbs_enable'] ) ? $this->wffc_settings['wcfusion_fcbs_enable'] : 'show_always';
            $wcfusion_fcbs_shape = !empty( $this->wffc_settings ) && !empty( $this->wffc_settings['wcfusion_fcbs_shape'] ) ? $this->wffc_settings['wcfusion_fcbs_shape'] : '100';
            $wcfusion_fcbs_icon_size = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcbs_icon_size'] ) ? $this->wffc_settings['wcfusion_fcbs_icon_size'] : '35';
            $wcfusion_fc_sc_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fc_sc_style'] ) ? 'yes' : 'no';

            $wcfusion_fcbp_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcbp_style'] ) ? $this->wffc_settings['wcfusion_fcbp_style'] : 'bottom_right';
            $wcfusion_fcbov_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcbov_style'] ) ? $this->wffc_settings['wcfusion_fcbov_style'] : '110';
            $wcfusion_fcboh_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcboh_style'] ) ? $this->wffc_settings['wcfusion_fcboh_style'] : '60';
            $wcfusion_fcbcp_style = !empty( $this->wffc_settings ) && isset( $this->wffc_settings['wcfusion_fcbcp_style'] ) ? $this->wffc_settings['wcfusion_fcbcp_style'] : 'top_left';


            // load view
            include_once WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/dashboard.php";
        }

    }
}
