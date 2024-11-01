<?php
// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

use Dompdf\Dompdf;

if (!class_exists ('wcFusionPdfInvoiceUtils')) {
    class wcFusionPdfInvoiceUtils
    {
        public $base_admin;
        public $wfpi_settings = array();
        public $dompdf;

        public function __construct ($base_admin)
        {
            $this->base_admin = $base_admin;
            // get settings data
            $this->wfpi_settings = get_option( 'wcfusion_pdf_invoice_settings', false );

            $this->dompdf = new Dompdf();
        }

        /*
         * define save settings data
         * @param post_data array()
         *
         * return void
         *
         * Author : WPCommerz
         * Develop on : 21-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function save_settings ($data = array())
        {
            $result = false;
            if (!empty($data)) {
                update_option ('wcfusion_pdf_invoice_settings', $data);
                $result = true;
            }

            return $result;
        }

        /*
         * define get last order id
         * @param
         *
         * return last order id
         *
         * Author : WPCommerz
         * Develop on : 23-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function get_last_order_id ()
        {
            global $wpdb;
            $statuses = array_keys (wc_get_order_statuses ());
            $statuses = implode ("','", $statuses);

            // Getting last Order ID (max value)
            $results = $wpdb->get_col ("
                SELECT MAX(ID) FROM {$wpdb->prefix}posts
                WHERE post_type LIKE 'shop_order'
                AND post_status IN ('$statuses')
            ");
            return reset ($results);
        }

        /*
         * define get last order
         * @param
         *
         * return last order object
         *
         * Author : WPCommerz
         * Develop on : 28-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function get_order_by_id ($order_id=null)
        {
            $args = array(
                'ID' => !empty($order_id) ? $order_id : $this->get_last_order_id(),
            );
            $order = wc_get_orders( $args );
            return !empty($order) && isset($order[0]) ? $order[0] : array();
        }

        /*
         * define generate invoice numer
         * @param $order_number - int
         *
         * return invoice number
         *
         * Author : WPCommerz
         * Develop on : 28-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function generate_invoice_number($order_number = null){
            $invoice_start_number = 1001;
            if(!empty($this->wfpi_settings)){
                $order_number_as_invoice = isset($this->wfpi_settings['wfpi_ordernumber_as_invoice_number']) ? 'yes' : 'no';

                if( $order_number_as_invoice == 'yes' && !empty($order_number)){
                    $invoice_start_number = $order_number;
                }else{
                    $invoice_start_number = !empty($this->wfpi_settings['wfpi_invoice_start_number']) ? $this->wfpi_settings['wfpi_invoice_start_number'] : 1001;
                }
            }

            return $invoice_start_number;
        }

        /*
         * define generate pdf invoice
         * @param
         *
         * return pdf invoice
         *
         * Author : WPCommerz
         * Develop on : 28-03-2022
         * Update on : -
         *
         * Develop By : Sm. Sazzad
         **/
        public function wcfusion_generate_pdf_invoice($content, $order_id, $type='invoice'){
            $options = $this->dompdf->getOptions();
            $options->set(array('isRemoteEnabled' => true));
            $this->dompdf->setOptions($options);

            $this->dompdf->loadHtml($content);
            // (Optional) Setup the paper size and orientation
            $this->dompdf->setPaper('A4');

            // Render the HTML as PDF
            $this->dompdf->render();

            $newtab = ( !empty($this->base_admin->wfpi_settings) && ($this->base_admin->wfpi_settings['wfpi_display_download'] == 'display_new_window') ) ? array('Attachment'=>0) : null;

            if( $type == 'shipping-slip' ){

                $this->dompdf->stream('shipping-slip-'.$order_id.'.pdf', null);

            }else{
                // Output the generated PDF to Browser
                $this->dompdf->stream('order-invoice-'.$order_id.'.pdf', $newtab);
            }

        }

    }
}
