<?php
    $order = $this->utils->get_order_by_id();
?>

<div class="tab_body_title">
    <h1><?php _e ('Customize Shipping Label', 'wcfusion'); ?></h1>
</div>
<div class="wcfusion_customize_pdf_invoice_container wfpdf_invc_row wfpdf_invc_clearfix">
    <div class="wcfusion_customize_pdf_invoice_topbar wfpdf_invc_clearfix">
        <div class="wcfusion_customize_pdf_invoice_topbar_left wfpdf_invc_float_left">
            <h4>Shipping Label</h4>
        </div>
        <div class="wcfusion_customize_pdf_invoice_topbar_right wfpdf_invc_float_right">
            <h4>Shipping Label Controls</h4>
        </div>
    </div>
    <div class="wcfusion_pdf_invoice_customize_left wfpdf_invc_col_9 wfpdf_invc_float_left">
        <div class="wfpdf_invoice_customize_inner  wfpdf_shipping_label_customize_inner">

            <div class="wfpdf_invoice_container wfpdf_shipping_label_container">
                <div class="wfpdf_invoice_main">

                    <div class="wfpdf_invc_row wfpdf_invc_clearfix" style="margin-top:10px;">

                        <div class="wfpdf_invc_col_6 wfpdf_invc_float_left wfpdf_invc_text-left">
                            <div class="wfpdf_shipping_label wfcpss_logo">
                                <div class="wfpdf_company_logo">
                                    <div class="wfpdf_company_logo_img_box">
                                        <img class="wfpdf_company_logo_img" src="<?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_shop_logo']) ? $this->wfpi_settings['wfpi_shop_logo'] : WCFUSION_MODULES_DIR . "/" . $this->module_slug . '/assets/img/no-image.jpg'; ?>" alt="Shop Logo">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wfpdf_invc_col_6 wfpdf_invc_float_right wfpdf_invc_text-right">
                            <div class="wfpdf_invc_data">
                                <div class="wfpdf_shipping_label_data">

                                    <div class="wfpdf_shipping_order_data wfcpss_order_number">
                                        <span class="wfpdf_shipping_order_label">Order No: </span>
                                        <span class="wfpdf_shipping_order_val wfpdf_invc_text_bold"><?php echo $order->get_order_number() ? $order->get_order_number() : '-'; ?></span>
                                    </div>

                                    <div class="wfpdf_shipping_weight wfcpss_weight">
                                        <span class="wfpdf_shipping_weight_label">Weight: </span>
                                        <span class="wfpdf_shipping_weight_val wfpdf_invc_text_bold">
                                            <?php
                                                $total_weight = 0;

                                                foreach( $order->get_items() as $item_id => $product_item ){
                                                    $quantity = $product_item->get_quantity();
                                                    $product = $product_item->get_product();
                                                    $product_weight = $product->get_weight() ? $product->get_weight() : 0;
                                                    $total_weight +=  $product_weight * $quantity;
                                                }

                                                echo $total_weight . get_option('woocommerce_weight_unit');
                                            ?>
                                        </span>
                                    </div>

                                    <div class="wfpdf_shipping_date wfcpss_shipping_date">
                                        <span class="wfpdf_shipping_date_label">Ship Date: </span>
                                        <span class="wfpdf_shipping_date_val wfpdf_invc_text_bold"><?php echo date('Y-m-d') ?></span>
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
                                            <li class=""><?php echo $this->shop_info['shop_name']; ?></li>
                                            <li class=""><?php echo $this->shop_info['address1']; ?></li>
                                            <li class=""><?php echo $this->shop_info['city']; ?></li>
                                            <li class=""><?php echo WC()->countries->states[$this->shop_info['country']][$this->shop_info['state']]; ?></li>
                                            <li class=""><?php echo WC()->countries->countries[ $this->shop_info['country'] ]; ?></li>
                                            <li class=""><?php echo $this->shop_info['postcode']; ?></li>
                                        </ul>
                                    </div>
                            </div>
                        </div>

                        <div class="wfpdf_invc_col_6 wfpdf_shipping_label_to wfpdf_invc_float_left">
                            <div class="wfpdf_shipping_label wfcpss_to_address">
                                <div class="wfpdf_shipping_label_header wfcpss_shipping_address">To:</div>
                                <div class="wfpdf_shipping_label_val wfcpss_shipping_address">
                                    <?php
                                    $shipping_aadress = $order->get_address('shipping');
                                    if( !empty($shipping_aadress) ){ ?>
                                        <ul>
                                            <li class=""><?php echo $shipping_aadress['first_name']; ?></li>
                                            <li class=""><?php echo $shipping_aadress['address_1']; ?></li>
                                            <li class=""><?php echo $shipping_aadress['city']; ?></li>
                                            <li class=""><?php echo !empty($shipping_aadress['country']) && !empty($shipping_aadress['state']) ? WC()->countries->states[$shipping_aadress['country']][$shipping_aadress['state']] : ''; ?></li>
                                            <li class=""><?php echo !empty($shipping_aadress['country']) ? WC()->countries->countries[ $shipping_aadress['country'] ] : ''; ?></li>
                                            <li class=""><?php echo $shipping_aadress['postcode']; ?></li>
                                        </ul>
                                    <?php } ?>
                                </div>

                                <?php
                                $billing_aadress = $order->get_address('billing');
                                if( !empty($billing_aadress) ){
                                    ?>
                                    <ul>
                                        <li class="wfcpss_email"> <?php echo $billing_aadress['email']; ?></li>
                                        <li class="wfcpss_phone_number"> <?php echo $billing_aadress['phone']; ?></li>
                                    </ul>
                                <?php } ?>

                            </div>
                        </div>

                    </div>

                    <div class="wfcpi_loader" style="display:none;">
                        <img src="<?php echo WCFUSION_IMG_DIR . 'popup_spinner.svg' ?>" alt="woofusion customize loader">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="wcfusion_pdf_invoice_customize_right wfpdf_invc_sidebar_right_4 wfpdf_invc_float_right">
        <div class="wcfusion_pdf_invoice_customize_sidebar">
            <div class="invoice_document_title">
                Shop Logo
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_shop_logo" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_shop_logo" type="checkbox"
                                   value="yes" data-control="wfcpss_logo" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_shop_logo']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title">
                From Address
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_from_address" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_from_address" type="checkbox"
                                   value="yes" data-control="wfcpss_from_address" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_from_address']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title">
                To Address
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_to_address" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_to_address" type="checkbox"
                                   value="yes" data-control="wfcpss_to_address" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_to_address']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title">
                Order Number
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_order_number" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_order_number" type="checkbox"
                                   value="yes" data-control="wfcpss_order_number" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_order_number']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title">
                Weight
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_weight" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_weight" type="checkbox"
                                   value="yes" data-control="wfcpss_weight" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_weight']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>
            <div class="invoice_document_title">
                Ship Date
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_shipping_date" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_shipping_date" type="checkbox"
                                   value="yes" data-control="wfcpss_shipping_date" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_shipping_date']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title">
                Email
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_email" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_email" type="checkbox"
                                   value="yes" data-control="wfcpss_email" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_email']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

            <div class="invoice_document_title">
                Phone Number
                <div class="wfpi_sidebar_toggle">
                    <label class="invoice_sidebar_switch">
                        <label class="wfpi_customize_sidebar_toggle">
                            <input id="wfpi_sl_phone_number" class="wfpi_default_checked wfcpss_controls"
                                   name="wfpi_sl_phone_number" type="checkbox"
                                   value="yes" data-control="wfcpss_phone_number" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_sl_phone_number']) ? 'checked' : ''; ?>>
                            <span class="slider round"></span>
                        </label>
                    </label>
                </div>
            </div>

        </div>
    </div>

</div>