<?php

if ($this->base_admin->base_admin->db->getModuleStatus ($this->base_admin->module_slug)) {

    $order = $this->base_admin->utils->get_order_by_id ($order_id);
    $currency_code = get_option ('woocommerce_currency');
    $currency_symbol = get_woocommerce_currency_symbol ($currency_code);

    ob_start ();
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Order Shipping Slip">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .wfpdf_invoice_customize-inner {
                margin: 0px;
                padding: 0px;
                font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            }

            .wfpdf_invc_clearfix::after {
                display: block;
                clear: both;
                content: "";
            }

            .wfpdf_invc_row {
                width: 100%;
                display: block;
            }

            .wfpdf_invc_col_12 {
                width: 100%;
                display: block;
            }

            .wfpdf_invc_col_9 {
                width: 70%;
                display: block;
            }

            .wfpdf_invc_col_8 {
                width: 66.666%;
                display: block;
            }

            .wfpdf_invc_col_6 {
                width: 50%;
                display: block;
            }

            .wfpdf_invc_col_4 {
                width: 33.333%;
                display: block;
            }

            .wfpdf_invc_sidebar_right_4 {
                width: 28%;
                display: block;
            }

            .wfpdf_invc_col_3 {
                width: 25%;
                display: block;
            }

            .wfpdf_invc_col_2 {
                width: 16.666%;
                display: block;
            }

            .wfpdf_invc_float_left {
                float: left;
            }

            .wfpdf_invc_float_right {
                float: right;
            }

            .wfpdf_invc_text-left {
                text-align: left;
            }

            .wfpdf_invc_text-center {
                text-align: center;
            }

            .wfpdf_invc_text-right {
                text-align: right;
            }

            .wfpdf_invc_text_bold {
                font-weight: bold;
            }

            .wcfusion_pdf_invoice_customize_left {
                width: 100%;
                display: block;
            }

            .wfpdf_shipping_label_container {
                min-height: 0;
            }
            .wfpdf_shipping_label_header {
                background: inherit;
                padding: 0 0;
            }
            .wfpdf_shipping_label_val ul,
            .wfpdf_shipping_label ul {
                padding: 0;
                margin-top: 5px;
                list-style: none;
            }
            .wfpdf_shipping_label_val ul li {
                margin-bottom: 1px;
            }
            .wfpdf_shipping_label_to {
                margin-top: 15px;
            }
            .wfpdf_shipping_label_header,
            .shipping_label_email_tel {
                font-weight: bold;
            }

            .wfpdf_invoice_main {
                width: 100%;
                color: #202020;
                font-size: 12px;
                font-weight: 400;
                box-sizing: border-box;
                background: #fff;
                height: auto;
                position: relative;
            }

            .wfcpi_loader {
                position: absolute;
                top: 0px;
                left: 0;
                background: #6E32C93D;
                right: 0;
                width: 100%;
                bottom: 0;
            }

            .wfcpi_loader img {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .wfpdf_invc_doc_title {
                color: #6E32C9;
                font-size: 30px;
                font-weight: bold;
                line-height: 22px;
            }

            .wfpdf_company_logo_img {
                width: 120px;
                max-width: 100%;
                height: 110px;
            }

            .wfpdf_invoice_data {
                line-height: 16px;
                font-size: 12px;
                border: 0px solid #fff;
            }

            .wfpdf_invoice_number,
            .wfpdf_invoice_number_val {
                line-height: 18px;
            }

            .wfpdf_invoice_number {
                color: #000;
                font-size: 18px;
                font-weight: normal;
                height: auto;
            }

            .wfpdf_invc_hr {
                height: 1px;
                font-size: 0px;
                padding: 0px;
                background: #cccccc;
                margin-bottom: 20px;
            }

            .wfpdf_address-field-header {
                font-weight: bold;
                font-size: 12px;
                background: #F6F5FA;
                color: #000;
                padding: 7px;
            }

            .wfpdf_company_address,
            .wfpdf_billing_address,
            .wfpdf_shipping_address,
            .wfpi_email_phone {
                padding: 0 15px;
            }

            .wfpdf_billing_address_val {
                margin-top: 10px;
            }

            .wfpdf_billing_address_val ul,
            .wfpi_email_phone ul {
                list-style: none;
                padding: 0 0 0 7px;
                margin: 0;
            }

            .wfpdf_billing_address_val ul li {
                margin-bottom: 3px;
            }

            .wfpdf_company_address {
                padding-left: 0;
            }

            .wfpdf_shipping_address {
                padding-right: 0;
            }

            .wfpdf_position_relative {
                position: relative;
            }

            .wfpdf_product_table_head_product {
                width: 30%;
            }

            .wfpdf_payment_left_column {
                width: 60%;
            }

            .wfpdf_payment_right_column {
                width: 14%;
            }

            .wfpdf_product_table_payment_total {
                border-collapse: collapse;
            }

        </style>
    </head>
    <body>


    <div class="wfpdf_invoice_main">

        <div class="wfpdf_invc_row wfpdf_invc_clearfix" style="margin-top:10px;">

            <div class="wfpdf_invc_col_6 wfpdf_invc_float_left wfpdf_invc_text-left">
                <div class="wfpdf_shipping_label">
                    <div class="wfpdf_company_logo">
                        <div class="wfpdf_company_logo_img_box">
                            <img class="wfpdf_company_logo_img"
                                 src="<?php echo !empty($this->base_admin->wfpi_settings) && !empty($this->base_admin->wfpi_settings['wfpi_shop_logo']) ? $this->base_admin->wfpi_settings['wfpi_shop_logo'] : WCFUSION_MODULES_DIR . "/" . $this->base_admin->module_slug . '/assets/img/no-image.jpg'; ?>"
                                 alt="Shop Logo">
                        </div>
                    </div>
                </div>
            </div>

            <div class="wfpdf_invc_col_6 wfpdf_invc_float_right wfpdf_invc_text-right">
                <div class="wfpdf_invc_data">
                    <div class="wfpdf_shipping_label_data">

                        <div class="wfpdf_shipping_order_data wfcpss_order_number">
                            <span class="wfpdf_shipping_order_label">Order No: </span>
                            <span class="wfpdf_shipping_order_val wfpdf_invc_text_bold"><?php echo $order->get_order_number (); ?></span>
                        </div>

                        <div class="wfpdf_shipping_weight wfcpss_weight">
                            <span class="wfpdf_shipping_weight_label">Weight: </span>
                            <span class="wfpdf_shipping_weight_val wfpdf_invc_text_bold">
                                            <?php
                                            $total_weight = 0;

                                            foreach ($order->get_items () as $item_id => $product_item) {
                                                $quantity = $product_item->get_quantity ();
                                                $product = $product_item->get_product ();
                                                $product_weight = $product->get_weight () ? $product->get_weight () : 0;
                                                $total_weight += $product_weight * $quantity;
                                            }

                                            echo $total_weight . get_option ('woocommerce_weight_unit');
                                            ?>
                                        </span>
                        </div>

                        <div class="wfpdf_shipping_date wfcpss_shipping_date">
                            <span class="wfpdf_shipping_date_label">Ship Date: </span>
                            <span class="wfpdf_shipping_date_val wfpdf_invc_text_bold"><?php echo date ('Y-m-d') ?></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="wfpdf_invc_row wfpdf_shipping_label_area wfpdf_invc_clearfix">

            <div class="wfpdf_invc_col_6 wfpdf_shipping_label_to wfpdf_invc_float_left">
                <div class="wfpdf_shipping_label wfcpss_from_address">
                    <div class="wfpdf_shipping_label_header">From:</div>
                    <div class="wfpdf_shipping_label_val">
                        <ul>
                            <li class=""><?php echo $this->base_admin->shop_info['shop_name']; ?></li>
                            <li class=""><?php echo $this->base_admin->shop_info['address1']; ?></li>
                            <li class=""><?php echo $this->base_admin->shop_info['city']; ?></li>
                            <li class=""><?php echo WC ()->countries->states[$this->base_admin->shop_info['country']][$this->base_admin->shop_info['state']]; ?></li>
                            <li class=""><?php echo WC ()->countries->countries[$this->base_admin->shop_info['country']]; ?></li>
                            <li class=""><?php echo $this->base_admin->shop_info['postcode']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="wfpdf_invc_col_6 wfpdf_shipping_label_to wfpdf_invc_float_left">
                <div class="wfpdf_shipping_label">
                    <div class="wfpdf_shipping_label_header">To:</div>
                    <div class="wfpdf_shipping_label_val">
                        <?php
                        $shipping_aadress = $order->get_address ('shipping');
                        if (!empty($shipping_aadress)) { ?>
                            <ul>
                                <li class=""><?php echo $shipping_aadress['first_name']; ?></li>
                                <li class=""><?php echo $shipping_aadress['address_1']; ?></li>
                                <li class=""><?php echo $shipping_aadress['city']; ?></li>
                                <li class=""><?php echo !empty($shipping_aadress['country']) && !empty($shipping_aadress['state']) ? WC ()->countries->states[$shipping_aadress['country']][$shipping_aadress['state']] : ''; ?></li>
                                <li class=""><?php echo !empty($shipping_aadress['country']) ? WC ()->countries->countries[$shipping_aadress['country']] : ''; ?></li>
                                <li class=""><?php echo $shipping_aadress['postcode']; ?></li>
                            </ul>
                        <?php } ?>
                    </div>

                    <?php
                    $billing_aadress = $order->get_address ('billing');
                    if (!empty($billing_aadress)) {
                        ?>
                        <ul>
                            <li class="wfcpss_email"> <?php echo $billing_aadress['email']; ?></li>
                            <li class="wfcpss_phone_number"> <?php echo $billing_aadress['phone']; ?></li>
                        </ul>
                    <?php } ?>

                </div>
            </div>

        </div>

    </div>
    </body>
    </html>

    <?php

    $content = ob_get_clean ();
    $this->base_admin->utils->wcfusion_generate_pdf_invoice ($content, $order_id, 'shipping-slip');

}
?>