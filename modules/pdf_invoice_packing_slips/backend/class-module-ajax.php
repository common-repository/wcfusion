<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('wcFusionPdfInvoiceAjax')) {
    class wcFusionPdfInvoiceAjax
    {


        public $base_admin;

        public function __construct($base_admin)
        {

            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wcfusion_save_pdf_invoice_settings', array($this, 'wcfusion_save_pdf_invoice_settings') );

            add_action ('wp_ajax_wcfusion_pdf_invoice', array($this, 'wcfusion_pdf_invoice'));
            add_action( 'wp_ajax_nopriv_wcfusion_pdf_invoice', array($this, 'wcfusion_pdf_invoice') );

            add_action ('wp_ajax_wcfusion_pdf_shipping_slip', array($this, 'wcfusion_pdf_shipping_slip'));
            add_action( 'wp_ajax_nopriv_wcfusion_pdf_shipping_slip', array($this, 'wcfusion_pdf_shipping_slip') );

        }

        public function wcfusion_pdf_invoice(){
            $order_id = $_GET['order_id'];
            $document_type = $_GET['document_type'];
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/generate-pdf-invoice.php";
            die();
        }

        public function wcfusion_pdf_shipping_slip(){
            $order_id = $_GET['order_id'];
            $document_type = $_GET['document_type'];
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/generate-pdf-shipping-slip.php";
            die();
        }

        function wcfusion_save_pdf_invoice_settings() {
            include_once WCFUSION_MODULES_PATH . "/" . $this->base_admin->module_slug . "/backend/api/save-settings.php";
            wp_die();
        }

    }
}
