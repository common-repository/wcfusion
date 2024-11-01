<?php

// get order details
$order = $this->utils->get_order_by_id();
$currency_code = get_option('woocommerce_currency');
$currency_symbol = get_woocommerce_currency_symbol( $currency_code );
?>
<div class="tab_body_title">
    <h1><?php _e ('Customize Invoice', 'wcfusion'); ?></h1>
</div>

<div class="wcfusion_customize_pdf_invoice_container wfpdf_invc_row wfpdf_invc_clearfix">
    <div class="wcfusion_customize_pdf_invoice_topbar wfpdf_invc_clearfix">
        <div class="wcfusion_customize_pdf_invoice_topbar_left wfpdf_invc_float_left">
            <h4>Invoice Layout</h4>
        </div>
        <div class="wcfusion_customize_pdf_invoice_topbar_right wfpdf_invc_float_right">
            <h4>Invoice Controls</h4>
        </div>
    </div>

    <?php
        if(!empty($order)){ ?>

            <div class="wcfusion_pdf_invoice_customize_left wfpdf_invc_col_9 wfpdf_invc_float_left">
                <div class="wfpdf_invoice_customize-inner">
                    <div class="wfpdf_invoice_container">
                        <div class="wfpdf_invoice_main">

                            <div class="wfpdf_invc_row wfpdf_header_top wfpdf_invc_clearfix wfcpi_title">
                                <div class="wfpdf_invc_col_6 wfpdf_invc_float_left wfpdf_invc_text-left">
                                    <div class="wfpdf_invc_doc_title">INVOICE</div>
                                </div>
                            </div>

                            <div class="wfpdf_invc_row wfpdf_logo_invoice_area wfpdf_invc_clearfix"
                                 style="margin-top:10px;">
                                <div class="wfpdf_invc_col_6 wfpdf_invc_float_left wfpdf_invc_text-left wfcpi_logo">
                                    <div class="wfpdf_company_logo">
                                        <div class="wfpdf_company_logo_img_box">
                                            <img class="wfpdf_company_logo_img"
                                                 src="<?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_shop_logo']) ? $this->wfpi_settings['wfpi_shop_logo'] : WCFUSION_MODULES_DIR . "/" . $this->module_slug . '/assets/img/no-image.jpg'; ?>"
                                                 alt="Shop Logo">
                                        </div>
                                    </div>
                                </div>
                                <div class="wfpdf_invc_col_6 wfpdf_invc_float_right wfpdf_invc_text-right">
                                    <div class="wfpdf_invc_data">
                                        <div class="wfpdf_invoice_data wfcpi_number">
                                            <div class="wfpdf_invoice_number">
                                                <span class="wfpdf_invoice_number_label">INVOICE#</span>
                                                <span class="wfte_invoice_number_val wfpdf_invc_text_bold">
                                                    <?php
                                                        echo $this->utils->generate_invoice_number($order->get_order_number());
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="wfpdf_invoice_data">
                                            <div class="wfpdf_invoice_date wfcpi_invoice_date">
                                                <span class="wfpdf_invoice_date_label">Invoice Date: </span>
                                                <span class="wfpdf_invoice_date_val wfpdf_invc_text_bold">
                                                    <?php echo date('Y-m-d'); ?>
                                                </span>
                                            </div>
                                            <div class="wfpdf_order_number wfcpi_order_numer">
                                                <span class="wfpdf_order_number_label">Order No.: </span>
                                                <span class="wfpdf_order_number_val wfpdf_invc_text_bold"><?php echo $order->get_order_number(); ?></span>
                                            </div>
                                            <div class="wfpdf_order_date wfcpi_order_date">
                                                <span class="wfpdf_order_date_label">Order Date: </span>
                                                <span class="wfpdf_order_date_val wfpdf_invc_text_bold"><?php echo date('Y-m-d', strtotime ($order->get_date_created())); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="wfpdf_invc_row wfpdf_invc_hr wfpdf_invc_clearfix" style="margin-top:30px;"></div>

                            <div class="wfpdf_invc_row wfpdf_address_area wfpdf_invc_clearfix">
                                <div class="wfpdf_invc_col_4 wfpdf_invc_float_left wfcpi_from_address">
                                    <div class="wfpdf_company_address">
                                        <div class="wfpdf_address-field-header wfte_billing_address_label">
                                            From Address:
                                        </div>
                                        <div class="wfpdf_billing_address_val">
                                            <ul>
                                                <li class="wfpci_fa_shop_name"><?php echo $this->shop_info['shop_name']; ?></li>
                                                <li class="wfpci_fa_address1"><?php echo $this->shop_info['address1']; ?></li>
                                                <li class="wfpci_fa_city"><?php echo $this->shop_info['city']; ?></li>
                                                <li class="wfpci_fa_state"><?php echo WC()->countries->states[$this->shop_info['country']][$this->shop_info['state']]; ?></li>
                                                <li class="wfpci_fa_country"><?php echo WC()->countries->countries[ $this->shop_info['country'] ]; ?></li>
                                                <li class="wfpci_fa_postcode"><?php echo $this->shop_info['postcode']; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="wfpdf_invc_col_4 wfpdf_invc_float_left">
                                    <?php $billing_aadress = $order->get_address('billing'); ?>
                                    <div class="wfpdf_billing_address wfcpi_billing_address">
                                        <div class="wfpdf_address-field-header wfte_billing_address_label">
                                            Billing Address:
                                        </div>
                                        <div class="wfpdf_billing_address_val">
                                            <?php
                                                if( !empty($billing_aadress) ){ ?>
                                                    <ul>
                                                        <li class="wfpci_ba_fname"><?php $billing_aadress['first_name']; ?></li>
                                                        <li class="wfpci_ba_address1"><?php echo $billing_aadress['address_1']; ?></li>
                                                        <li class="wfpci_ba_city"><?php echo $billing_aadress['city']; ?></li>
                                                        <li class="wfpci_ba_state"><?php echo !empty($billing_aadress['country']) && !empty($billing_aadress['state']) ? WC()->countries->states[$billing_aadress['country']][$billing_aadress['state']] : ''; ?></li>
                                                        <li class="wfpci_ba_country"><?php echo !empty($billing_aadress['country']) ? WC()->countries->countries[ $billing_aadress['country'] ] : ''; ?></li>
                                                        <li class="wfpci_ba_postcode"><?php echo $billing_aadress['postcode']; ?></li>
                                                    </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="wfpi_email_phone">
                                        <?php
                                            if( !empty($billing_aadress) ){
                                        ?>
                                        <ul>
                                            <li class="wfpci_ba_email"> <?php echo $billing_aadress['email']; ?></li>
                                            <li class="wfpci_ba_phone"> <?php echo $billing_aadress['phone']; ?></li>
                                        </ul>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="wfpdf_invc_col_4 wfpdf_invc_float_right wfcpi_shipping_address">
                                    <div class="wfpdf_shipping_address">
                                        <div class="wfpdf_address-field-header wfte_billing_address_label">
                                            Shipping Address:
                                        </div>
                                        <div class="wfpdf_billing_address_val">
                                            <?php
                                            $shipping_aadress = $order->get_address('shipping');
                                            if( !empty($shipping_aadress) ){ ?>
                                                <ul>
                                                    <li class="wfpci_sa_fname"><?php echo $shipping_aadress['first_name']; ?></li>
                                                    <li class="wfpci_sa_address1"><?php echo $shipping_aadress['address_1']; ?></li>
                                                    <li class="wfpci_sa_city"><?php echo $shipping_aadress['city']; ?></li>
                                                    <li class="wfpci_sa_state"><?php echo !empty($shipping_aadress['country']) && !empty($shipping_aadress['state']) ? WC()->countries->states[$shipping_aadress['country']][$shipping_aadress['state']] : ''; ?></li>
                                                    <li class="wfpci_sa_country"><?php echo !empty($shipping_aadress['country']) ? WC()->countries->countries[ $shipping_aadress['country'] ] : ''; ?></li>
                                                    <li class="wfpci_sa_postcode"><?php echo $shipping_aadress['postcode']; ?></li>
                                                </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

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
                                            $order_items = $order->get_items();

                                            if( !empty($order_items) ) {
                                                foreach ( $order_items as $key => $item ) {
                                                    $item_data = $item->get_data();
                                                    $product   = $item->get_product();
                                                    ?>
                                                    <tr>
                                                        <td class="image_td"><img
                                                                    src="<?php echo WCFUSION_MODULES_DIR . "/" . $this->module_slug . '/assets/img/no-image.jpg'; ?>"
                                                                    style="max-width:30px; max-height:30px; border-radius:25%;"
                                                                    class="wfte_product_image_thumb"></td>
                                                        <td class="sku_td"><?php echo $product->get_sku(); ?></td>
                                                        <td class="product_td"><?php echo $item_data['name']; ?></td>
                                                        <td class="quantity_td"><?php echo $item_data['quantity']; ?></td>
                                                        <td class="price_td"><?php echo wc_price($product->get_price()); ?></td>
                                                        <td class="total_price_td"><?php echo wc_price($item_data['subtotal']); ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }else{ ?>
                                                <tr><td colspan="7" style="text-align: center;">No item found!</td></tr>
                                          <?php  }
                                        ?>
                                        </tbody>
                                    </table>
                                    <table class="wfpdf_invc_payment_summary_table">
                                        <tbody class="wfpdf_invc_payment_summary_table_body">
                                        <tr class="wfpdf_payment_summary_table_row">
                                            <td colspan="2" class="wfpdf_product_table_subtotal_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                                Subtotal
                                            </td>
                                            <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                                <?php echo wc_price($order->get_subtotal()); ?>
                                            </td>
                                        </tr>
                                        <tr class="wfpdf_payment_summary_table_row">
                                            <td colspan="2" class="wfte_product_table_shipping_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                                Shipping
                                            </td>
                                            <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                                <?php echo wc_price($order->get_shipping_total()); ?>
                                            </td>
                                        </tr>
                                        <tr class="wfpdf_payment_summary_table_row">
                                            <td colspan="2" class="wfpdf_product_table_cart_discount_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                                Cart Discount
                                            </td>
                                            <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                                <?php echo wc_price($order->get_discount_total()); ?>
                                            </td>
                                        </tr>
                                        <tr class="wfpdf_payment_summary_table_row">
                                            <td colspan="2" class="wfpdf_product_table_order_discount_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                                Order Discount
                                            </td>
                                            <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                                <?php echo wc_price($order->get_discount_total()); ?>
                                            </td>
                                        </tr>
                                        <?php
                                            if( !empty($this->wfpi_settings) && $this->wfpi_settings['wfpi_in_ex_tax'] == 'include_tax'){ ?>
                                                <tr class="wfpdf_payment_summary_table_row">
                                                    <td colspan="2" class="wfpdf_product_table_order_discount_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                                        Tax
                                                    </td>
                                                    <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                                        <?php
                                                        $tax_total = 0;
                                                        foreach( $order->get_items( 'tax' ) as $item_id => $item_tax ){
                                                            $tax_total = $item_tax->get_tax_total();
                                                        }
                                                        echo wc_price($tax_total);
                                                        ?>
                                                    </td>
                                                </tr>
                                           <?php }  ?>

                                        <tr class="wfpdf_payment_summary_table_row">
                                            <td colspan="2" class="wfpdf_product_table_fee_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                                Fee
                                            </td>
                                            <td class="wfpdf_payment_right_column wfpdf_invc_text-left">
                                                <?php
                                                $fee_total = 0;
                                                $fee_total_tax = 0;
                                                foreach( $order->get_items('fee') as $item_id => $item_fee ){
                                                    $fee_name = $item_fee->get_name();
                                                    // The fee total amount
                                                    $fee_total = $item_fee->get_total();
                                                    // The fee total tax amount
                                                    $fee_total_tax = $item_fee->get_total_tax();
                                                }
                                                  echo wc_price ($fee_total + $fee_total_tax);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr class="wfpdf_payment_summary_table_row wfpdf_product_table_payment_total">
                                            <td class="wfpdf_left_column"></td>
                                            <td class="wfpdf_product_table_payment_total_label wfpdf_payment_left_column wfpdf_invc_text-right">
                                                Total
                                            </td>
                                            <td class="wfpdf_product_table_payment_total_val wfte_right_column wfpdf_invc_text-left wfpdf_invc_text_bold">
                                                <?php echo wc_price($order->get_total()); ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <div class="wfpdf_invc_received_seal wfte_hidden wfcpi_payment_stamp" >
                                        <span class="wfpdf_invc_received_seal_text">RECEIVED</span>
                                    </div>

                                </div>
                            </div>

                            <div class="wfpdf_invc_row wfpdf_invc_payment_method wfpdf_invc_clearfix wfcpi_payment_method">
                                <div class="wfpdf_invc_col_12">
                                    <span class="wfte_product_table_payment_method_label" style="font-weight:normal;">Payment method: </span>
                                    <span style="font-weight:normal;text-transform: uppercase;">
                                        <?php echo $order->get_payment_method(); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="wfpdf_invc_row wfpdf_invc_payment_method wfpdf_invc_clearfix wfcpi_customer_note" style="margin-top: 10px;">
                                <div class="wfpdf_invc_col_12">
                                    <span class="wfte_product_table_payment_method_label" style="font-weight:normal;">Customer Note: </span>
                                    <span style="font-weight:normal;">
                                        <?php echo $order->get_customer_note();; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="wfpdf_invc_row wfpdf_footer wfpdf_invc_clearfix wfcpi_footer" style="margin-top: 100px;">
                                <div class="wfpdf_invc_col_12">
                                    <div class="wfpdf_invc_footer wfpdf_invc_clearfix">
                                        <?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_footer_info']) ? $this->wfpi_settings['wfpi_footer_info'] : ''; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="wfcpi_loader" style="display:none;">
                                <img src="<?php echo WCFUSION_IMG_DIR . 'popup_spinner.svg' ?>" alt="woofusion invoice customize loader">
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        <?php }else{ ?>

            <div class="wcfusion_pdf_invoice_customize_left wfpdf_invc_col_9 wfpdf_invc_float_left">
                <div class="wfpdf_invoice_customize-inner">
                    <div class="wfpdf_invoice_container">
                        <div class="wfpdf_empty_content">
                            <span class="no-data">No Order Available, Please make order first!!</span>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    <div class="wcfusion_pdf_invoice_customize_right wfpdf_invc_sidebar_right_4 wfpdf_invc_float_right">
        <div class="wcfusion_pdf_invoice_customize_sidebar">
            <div class="invoice_document_title" style="cursor: pointer">
                Document Title
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_title" id="wfpi_invoice_title" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_invoice_title" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_invoice_title']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title" style="cursor: pointer">
                Shop Logo
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_logo" id="wfpi_enable_shop_logo" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_shop_logo" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_shop_logo']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title" style="cursor: pointer">
                Invoice Number
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_number" id="wfpi_enable_invoice_number" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_invoice_number" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_invoice_number']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title" style="cursor: pointer">
                Order Number
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_order_numer" id="wfpi_enable_order_number" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_order_number" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_order_number']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title" style="cursor: pointer">
                Invoice Date
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_invoice_date" id="wfpi_enable_invoice_date" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_invoice_date" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_invoice_date']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title" style="cursor: pointer">
                Order Date
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_order_date" id="wfpi_enable_order_date" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_order_date" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_order_date']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title" style="cursor: pointer">
                From Address
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_from_address" id="wfpi_enable_from_address" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_from_address" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_from_address']) ? 'checked' : ''; ?> >
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title" style="cursor: pointer">
                Billing Address
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_billing_address" id="wfpi_enable_billing_address" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_billing_address" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_billing_address']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title" style="cursor: pointer">
                Shipping Address
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_shipping_address" id="wfpi_enable_shipping_address" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_shipping_address" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_shipping_address']) ? 'checked' : '';?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title" style="cursor: pointer">
                Email
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfpci_ba_email" id="wfpi_enable_email" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_email" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_email']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title" style="cursor: pointer">
                Phone Number
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfpci_ba_phone" id="wfpi_enable_phone" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_phone" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_phone']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title" style="cursor: pointer">
                Payment Received Stamp
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_payment_stamp" id="wfpi_enable_payment_stamp" class="wfcpi_controls"
                                   name="wfpi_enable_payment_stamp" type="checkbox"
                                   value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_enable_payment_stamp']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title" style="cursor: pointer">
                Payment Method
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_payment_method" id="wfcpi_show_payment_method" class="wfpi_default_checked wfcpi_controls"
                                   name="wfcpi_show_payment_method" type="checkbox"
                                   value="yes" <?php echo !empty( $this->wfpi_settings ) && isset($this->wfpi_settings['wfcpi_show_payment_method']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title" style="cursor: pointer">
                Customer Note
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_customer_note" id="wfcpi_show_customer_note" class="wfpi_default_checked wfcpi_controls"
                                   name="wfcpi_show_customer_note" type="checkbox"
                                   value="yes" <?php echo !empty( $this->wfpi_settings ) && isset($this->wfpi_settings['wfcpi_show_customer_note']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title" style="cursor: pointer">
                Footer
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input data-control="wfcpi_footer" id="wfpi_enable_footer" class="wfpi_default_checked wfcpi_controls"
                                   name="wfpi_enable_footer" type="checkbox"
                                   value="yes" <?php echo !empty( $this->wfpi_settings ) && isset($this->wfpi_settings['wfpi_enable_footer']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

        </div>
    </div>

</div>