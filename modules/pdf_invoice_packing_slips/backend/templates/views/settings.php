<?php
/**
 *settings.php
 */
?>

<div id="wcfusion_pdf_invoice_dashboard">

    <form class="wcfusion-form-pdf-invoice" id="wcfusion_form_pdf_invoice">

        <div class="wcfusion_pdf_invoice_content_wrapper">

            <div class="wcfusion_pdf_invoice_bottom_form">
                <div class="content_wrapper">
                    <div class="wcfusion_pdf_invoice_left_content">
                        <div class="wcfusion_pdf_invoice_data_tabs">
                            <div class="tab_item tab_item_active" data-target="wcfusion_pdf_invoice_document">
                                <h3> <?php _e ('PDF Document', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_pdf_invoice_general">
                                <h3> <?php _e ('General', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_pdf_invoice_settings">
                                <h3> <?php _e ('Invoice', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_pdf_invoice_customize">
                                <h3> <?php _e ('Customize Invoice', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_pdf_shipping_label_customize">
                                <h3> <?php _e ('Customize Shipping Label', 'wcfusion'); ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="wcfusion_pdf_invoice_right_content">

                        <div data-id="wcfusion_pdf_invoice_document" class="wcfusion_pdf_invoice_tab_body">
                            <?php
                                require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/document.php";
                            ?>
                        </div><!--/.wcfusion_pdf_invoice_tab_body -->

                        <div data-id="wcfusion_pdf_invoice_general" class="wcfusion_pdf_invoice_tab_body">
                            <?php
                                require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/general.php";
                            ?>
                        </div><!--/.wcfusion_pdf_invoice_general -->

                        <div data-id="wcfusion_pdf_invoice_settings" class="wcfusion_pdf_invoice_tab_body">
                            <?php
                                require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/invoice.php";
                            ?>
                        </div><!--/.wcfusion_pdf_invoice -->

                        <div data-id="wcfusion_pdf_invoice_customize" class="wcfusion_pdf_invoice_tab_body">
                            <?php
                                require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/customize-invoice.php";
                            ?>
                        </div><!--/.wcfusion_pdf_invoice_customize-->

                        <div data-id="wcfusion_pdf_shipping_label_customize" class="wcfusion_pdf_invoice_tab_body">
                            <?php
                                require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/customize-shipping-label.php";
                            ?>
                        </div><!--/.wcfusion_pdf_shipping_label_customize-->

                    </div>

                </div>

                <div class="wcfusion_pdf_invoice_footer">

                    <button type="submit"
                            class="wcfusion_pdf_invoice_btn wcfusion-pi-btn"> <?php _e ('Save Settings', 'wcfusion'); ?>
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>