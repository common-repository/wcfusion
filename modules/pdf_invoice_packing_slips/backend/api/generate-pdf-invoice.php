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
        <meta name="description" content="Order Invoice">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .wfpdf_invoice_customize-inner {
                margin: 0px;
                padding: 0px;
                font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
            }

            /**** Default Style ****/
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

            /* woofusion pdf invoice customize left */
            .wcfusion_pdf_invoice_customize_left {
                width: 100%;
                display: block;
            }

            .wcfusion_pdf_invoice_customize_left h4 {
                color: #050505;
                font-weight: 600;
                font-size: 18px;
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

            /* Header Top Area Style*/
            .wfpdf_invc_doc_title {
                color: #6E32C9;
                font-size: 30px;
                font-weight: bold;
                line-height: 22px;
            }

            /* Header Top Area Style End */
            /* Logo & Invoice Area Style */
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

            /* Logo & Invoice Area Style End*/
            /* Address Area Style */
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

            /* Address Area Style End*/
            /* Product and Price Area */
            .wfpdf_invc_product_table {
                width: 100%;
                border-collapse: collapse;
                margin: 0px;
            }

            .wfpdf_position_relative {
                position: relative;
            }

            .wfpdf_invc_product_table_head {
                color: #2e2e2e;
                background: #F6F5FA;
            }

            .wfpdf_invc_product_table_head th {
                height: 36px;
                padding: 0px 5px;
                font-size: .75rem;
                text-align: start;
                line-height: 10px;
                border-bottom: solid 1px #cccccc;
                border-top: solid 1px #cccccc;
                font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
                text-transform: uppercase;
            }

            .wfpdf_product_table_head_product {
                width: 30%;
            }

            .wfpdf_product_table_head_total_price {
                width: 15%;
            }

            .wfpdf_invc_product_table_body td {
                padding: 5px 5px;
                border-bottom: solid 1px #cccccc;
                text-align: start;
            }

            .wfpdf_invc_product_table_body td,
            .wfpdf_invc_payment_summary_table_body td {
                font-size: 12px;
                line-height: 10px;
            }

            .wfpdf_invc_payment_summary_table {
                margin-bottom: 10px;
                width: 100%;
                border-collapse: collapse;
            }

            .wfpdf_invc_payment_summary_table_body td {
                padding: 5px 5px;
                border: none;
            }

            .wfpdf_invc_product_table_body td,
            .wfpdf_invc_payment_summary_table_body td {
                font-size: 12px;
                line-height: 10px;
            }

            .wfpdf_right_column .wfpdf_invc_product_table {
                width: 15%;
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

            .wfpdf_product_table_payment_total td {
                font-size: 13px;
                color: #000;
                height: 28px;
                border-bottom: solid 1px #cccccc;
                border-top: solid 1px #cccccc;
            }

            .wfpdf_product_table_payment_total td:nth-child(3) {
                font-weight: bold;
            }

            /* Received Seal */
            .wfpdf_invc_received_seal {
                position: absolute;
                z-index: 10;
                width: 130px;
                border-radius: 5px;
                font-size: 22px;
                height: 40px;
                line-height: 38px;
                border: 3px solid #6E32C9;
                color: #6E32C9;
                font-weight: 700;
                text-align: center;
                transform: rotate(-45deg);
                opacity: 0.5;
                top: 85px;
                left: 40%;
            }

            .wfpdf_footer {
                border-top: 1px solid #ccc;
                padding-top: 15px;
                text-align: center;
            }
        </style>
    </head>
    <body>
    <div class="wcfusion_pdf_invoice_customize_left">
        <div class="wfpdf_invoice_customize-inner">

            <div class="wfpdf_invoice_main">
                <?php
                if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_invoice_title'])) {
                    ?>
                    <div class="wfpdf_header_top wfpdf_invc_clearfix">
                        <div class="wfpdf_invc_col_6 wfpdf_invc_text-left">
                            <div class="wfpdf_invc_doc_title">INVOICE</div>
                        </div>
                    </div>
                <?php } ?>

                <div class="wfpdf_invc_row wfpdf_logo_invoice_area wfpdf_invc_clearfix"
                     style="margin-top:10px;">
                    <?php
                    if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_shop_logo'])) {
                        ?>
                        <div class="wfpdf_invc_col_6 wfpdf_invc_float_left wfpdf_invc_text-left">
                            <div class="wfpdf_company_logo">
                                <div class="wfpdf_company_logo_img_box">
                                    <img class="wfpdf_company_logo_img"
                                         src="<?php echo !empty($this->base_admin->wfpi_settings) && !empty($this->base_admin->wfpi_settings['wfpi_shop_logo']) ? $this->base_admin->wfpi_settings['wfpi_shop_logo'] : WCFUSION_MODULES_DIR . "/" . $this->base_admin->module_slug . '/assets/img/no-image.jpg'; ?>"
                                         alt="Shop Logo">
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="wfpdf_invc_col_6 wfpdf_invc_float_right wfpdf_invc_text-right">
                        <div class="wfpdf_invc_data">
                            <?php
                            if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_invoice_number'])) { ?>
                                <div class="wfpdf_invoice_data">
                                    <div class="wfpdf_invoice_number">
                                        <span class="wfpdf_invoice_number_label">INVOICE#</span>
                                        <span class="wfte_invoice_number_val wfpdf_invc_text_bold">
                                        <?php
                                        echo $this->base_admin->utils->generate_invoice_number ($order->get_order_number ());
                                        ?>
                                    </span>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="wfpdf_invoice_data">
                                <?php
                                if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_invoice_date'])) {
                                    ?>
                                    <div class="wfpdf_invoice_date">
                                        <span class="wfpdf_invoice_date_label">Invoice Date: </span>
                                        <span class="wfpdf_invoice_date_val wfpdf_invc_text_bold">
                                            <?php echo date ('Y-m-d'); ?>
                                        </span>
                                    </div>
                                <?php }
                                if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_order_number'])) { ?>

                                    <div class="wfpdf_order_number">
                                        <span class="wfpdf_order_number_label">Order No.: </span>
                                        <span class="wfpdf_order_number_val wfpdf_invc_text_bold"><?php echo $order->get_order_number (); ?></span>
                                    </div>
                                <?php }
                                if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_order_date'])) { ?>
                                    <div class="wfpdf_order_date">
                                        <span class="wfpdf_order_date_label">Order Date: </span>
                                        <span class="wfpdf_order_date_val wfpdf_invc_text_bold"><?php echo date ('Y-m-d', strtotime ($order->get_date_created ())); ?></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wfpdf_invc_row wfpdf_invc_hr wfpdf_invc_clearfix" style="margin-top:30px;"></div>

                <div class="wfpdf_invc_row wfpdf_address_area wfpdf_invc_clearfix">
                    <?php
                    if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_from_address'])) {
                        ?>
                        <div class="wfpdf_invc_col_4 wfpdf_invc_float_left wfcpi_from_address">
                            <div class="wfpdf_company_address">
                                <div class="wfpdf_address-field-header wfte_billing_address_label">
                                    From Address:
                                </div>
                                <div class="wfpdf_billing_address_val">
                                    <ul>
                                        <li class="wfpci_fa_shop_name"><?php echo $this->base_admin->shop_info['shop_name']; ?></li>
                                        <li class="wfpci_fa_address1"><?php echo $this->base_admin->shop_info['address1']; ?></li>
                                        <li class="wfpci_fa_city"><?php echo $this->base_admin->shop_info['city']; ?></li>
                                        <li class="wfpci_fa_state"><?php echo WC ()->countries->states[$this->base_admin->shop_info['country']][$this->base_admin->shop_info['state']]; ?></li>
                                        <li class="wfpci_fa_country"><?php echo WC ()->countries->countries[$this->base_admin->shop_info['country']]; ?></li>
                                        <li class="wfpci_fa_postcode"><?php echo $this->base_admin->shop_info['postcode']; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="wfpdf_invc_col_4 wfpdf_invc_float_left">
                        <?php $billing_aadress = $order->get_address ('billing'); ?>
                        <?php
                        if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_billing_address'])) { ?>
                            <div class="wfpdf_billing_address wfcpi_billing_address">
                                <div class="wfpdf_address-field-header wfte_billing_address_label">
                                    Billing Address:
                                </div>
                                <div class="wfpdf_billing_address_val">
                                    <?php
                                    if (!empty($billing_aadress)) { ?>
                                        <ul>
                                            <li class="wfpci_ba_fname"><?php $billing_aadress['first_name']; ?></li>
                                            <li class="wfpci_ba_address1"><?php echo $billing_aadress['address_1']; ?></li>
                                            <li class="wfpci_ba_city"><?php echo $billing_aadress['city']; ?></li>
                                            <li class="wfpci_ba_state"><?php echo !empty($billing_aadress['country']) && !empty($billing_aadress['state']) ? WC ()->countries->states[$billing_aadress['country']][$billing_aadress['state']] : ''; ?></li>
                                            <li class="wfpci_ba_country"><?php echo !empty($billing_aadress['country']) ? WC ()->countries->countries[$billing_aadress['country']] : ''; ?></li>
                                            <li class="wfpci_ba_postcode"><?php echo $billing_aadress['postcode']; ?></li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="wfpi_email_phone">
                            <?php
                            if (!empty($billing_aadress)) {
                                ?>
                                <ul>
                                    <?php if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_email'])) { ?>
                                        <li class="wfpci_ba_email"> <?php echo $billing_aadress['email']; ?></li>
                                    <?php }
                                    if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_phone'])) {
                                        ?>
                                        <li class="wfpci_ba_phone"> <?php echo $billing_aadress['phone']; ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                    if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_email'])) { ?>
                        <div class="wfpdf_invc_col_4 wfpdf_invc_float_right wfcpi_shipping_address">
                            <div class="wfpdf_shipping_address">
                                <div class="wfpdf_address-field-header wfte_billing_address_label">
                                    Shipping Address:
                                </div>
                                <div class="wfpdf_billing_address_val">
                                    <?php
                                    $shipping_aadress = $order->get_address ('shipping');
                                    if (!empty($shipping_aadress)) { ?>
                                        <ul>
                                            <li class="wfpci_sa_fname"><?php echo $shipping_aadress['first_name']; ?></li>
                                            <li class="wfpci_sa_address1"><?php echo $shipping_aadress['address_1']; ?></li>
                                            <li class="wfpci_sa_city"><?php echo $shipping_aadress['city']; ?></li>
                                            <li class="wfpci_sa_state"><?php echo !empty($shipping_aadress['country']) && !empty($shipping_aadress['state']) ? WC ()->countries->states[$shipping_aadress['country']][$shipping_aadress['state']] : ''; ?></li>
                                            <li class="wfpci_sa_country"><?php echo !empty($shipping_aadress['country']) ? WC ()->countries->countries[$shipping_aadress['country']] : ''; ?></li>
                                            <li class="wfpci_sa_postcode"><?php echo $shipping_aadress['postcode']; ?></li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>

                <div class="wfpdf_invc_row wfpdf_product_price_area wfpdf_invc_clearfix" style="margin-top:30px;">
                    <div class="wfpdf_invc_col_12 wfpdf_position_relative">
                        <table class="wfpdf_invc_product_table">
                            <thead class="wfpdf_invc_product_table_head">
                            <tr>
                                <th class="wfpdf_product_table_head_image">Image</th>
                                <th class="wfpdf_product_table_head_sku">SKU</th>
                                <th class="wfpdf_product_table_head_product">Product</th>
                                <th class="wfpdf_product_table_head_quantity">Quantity</th>
                                <th class="wfpdf_product_table_head_price">Price</th>
                                <th class="wfpdf_product_table_head_total_price">Total Price</th>
                            </tr>
                            </thead>
                            <tbody class="wfpdf_invc_product_table_body">
                            <?php
                            $order_items = $order->get_items ();

                            if (!empty($order_items)) {
                                foreach ($order_items as $key => $item) {
                                    $item_data = $item->get_data ();
                                    $product = $item->get_product ();
                                    ?>
                                    <tr>
                                        <td class="image_td"><img
                                                    src="<?php echo WCFUSION_MODULES_DIR . "/" . $this->base_admin->module_slug . '/assets/img/no-image.jpg'; ?>"
                                                    style="max-width:30px; max-height:30px; border-radius:25%;"
                                                    class="wfte_product_image_thumb"></td>
                                        <td class="sku_td"><?php echo $product->get_sku (); ?></td>
                                        <td class="product_td"><?php echo $item_data['name']; ?></td>
                                        <td class="quantity_td"><?php echo $item_data['quantity']; ?></td>
                                        <td class="price_td"><?php echo wc_price($product->get_price ()); ?></td>
                                        <td class="total_price_td"><?php echo wc_price($item_data['subtotal']); ?></td>
                                    </tr>
                                    <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">No item found!</td>
                                </tr>
                            <?php }
                            ?>
                            </tbody>
                        </table>
                        <table class="wfpdf_invc_payment_summary_table">
                            <tbody class="wfpdf_invc_payment_summary_table_body">
                            <tr class="wfpdf_payment_summary_table_row">
                                <td colspan="2"
                                    class="wfpdf_product_table_subtotal_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                    Subtotal
                                </td>
                                <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                    <?php echo wc_price($order->get_subtotal ()); ?>
                                </td>
                            </tr>
                            <tr class="wfpdf_payment_summary_table_row">
                                <td colspan="2"
                                    class="wfte_product_table_shipping_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                    Shipping
                                </td>
                                <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                    <?php echo wc_price($order->get_shipping_total ()); ?>
                                </td>
                            </tr>
                            <tr class="wfpdf_payment_summary_table_row">
                                <td colspan="2"
                                    class="wfpdf_product_table_cart_discount_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                    Cart Discount
                                </td>
                                <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                    <?php echo wc_price($order->get_discount_total ()); ?>
                                </td>
                            </tr>
                            <tr class="wfpdf_payment_summary_table_row">
                                <td colspan="2"
                                    class="wfpdf_product_table_order_discount_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                    Order Discount
                                </td>
                                <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                    <?php echo wc_price($order->get_discount_total ()); ?>
                                </td>
                            </tr>

                            <tr class="wfpdf_payment_summary_table_row">
                                <td colspan="2"
                                    class="wfpdf_product_table_fee_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                    Fee
                                </td>
                                <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                    <?php
                                    $fee_total = 0;
                                    $fee_total_tax = 0;
                                    foreach ($order->get_items ('fee') as $item_id => $item_fee) {
                                        $fee_name = $item_fee->get_name ();
                                        $fee_total = $item_fee->get_total ();
                                        $fee_total_tax = $item_fee->get_total_tax ();
                                    }
                                    echo wc_price($fee_total + $fee_total_tax);
                                    ?>
                                </td>
                            </tr>
                            <tr class="wfpdf_payment_summary_table_row wfpdf_product_table_payment_total">
                                <td class="wfpdf_left_column"></td>
                                <td class="wfpdf_product_table_payment_total_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                    Total
                                </td>
                                <td class="wfpdf_product_table_payment_total_val wfte_right_column wfpdf_invc_text-left wfpdf_invc_text_bold">
                                    <?php echo wc_price($order->get_total ()); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <?php
                        if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_payment_stamp'])) {
                            ?>
                            <div class="wfpdf_invc_received_seal wfte_hidden wfcpi_payment_stamp">
                                <span class="wfpdf_invc_received_seal_text">RECEIVED</span>
                            </div>
                        <?php } ?>

                    </div>
                </div>

                <?php
                if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfcpi_show_payment_method'])) {
                    ?>
                    <div class="wfpdf_invc_row wfpdf_invc_payment_method wfpdf_invc_clearfix">
                        <div class="wfpdf_invc_col_12">
                            <span class="wfte_product_table_payment_method_label" style="font-weight:normal;">Payment method: </span>
                            <span style="font-weight:normal;text-transform: uppercase;">
                            <?php echo $order->get_payment_method (); ?>
                        </span>
                        </div>
                    </div>
                <?php } ?>

                <?php
                if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfcpi_show_customer_note'])) {
                    ?>
                    <div class="wfpdf_invc_row wfpdf_invc_payment_method wfpdf_invc_clearfix" style="margin-top: 10px;">
                        <div class="wfpdf_invc_col_12">
                            <span class="wfte_product_table_payment_method_label" style="font-weight:normal;">Customer Note: </span>
                            <span style="font-weight:normal;">
                           <?php echo $order->get_customer_note ();; ?>
                        </span>
                        </div>
                    </div>
                <?php } ?>

                <?php
                if (!empty($this->base_admin->wfpi_settings) && isset($this->base_admin->wfpi_settings['wfpi_enable_footer'])) {
                    ?>
                    <div class="wfpdf_invc_row wfpdf_footer" style="position: absolute;bottom: 2%;left: 0;">
                        <div class="wfpdf_invc_col_12">
                            <div class="wfpdf_invc_footer">
                                <?php echo !empty($this->base_admin->wfpi_settings) && !empty($this->base_admin->wfpi_settings['wfpi_footer_info']) ? $this->base_admin->wfpi_settings['wfpi_footer_info'] : ''; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>
    </body>
    </html>

    <?php

    $content = ob_get_clean ();
    $this->base_admin->utils->wcfusion_generate_pdf_invoice ($content, $order_id);

}
?>