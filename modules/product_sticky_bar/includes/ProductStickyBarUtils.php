<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( ! class_exists( 'ProductStickyBarUtils' ) ) {
    class ProductStickyBarUtils
    {
        public $base_admin;

        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;
        }

        public function init_product_sticky_bar_settings ($post_data){
            if(!empty($post_data)){
                update_option( 'wcfusion_psb_settings', json_encode($post_data) );
            }

            return True;
        }

        public function getWooProducts()
        {

            $results = array();
            $args = array('post_type' => 'product', 'posts_per_page' => -1);
            foreach (get_posts($args) as $product) {
                $results[] = array("id" => $product->ID, "text" => $product->post_title);
            }
            return $results;
        }


    }
}
