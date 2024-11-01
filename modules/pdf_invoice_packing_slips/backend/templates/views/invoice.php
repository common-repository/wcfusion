<div class="tab_body_title">
    <h1><?php _e ('Invoice Settings', 'wcfusion'); ?></h1>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Disable for', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <?php
                    $get_order_status = wc_get_order_statuses ();
                    $wfpi_disabled_status = !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_disabled_status']) ? explode (',',$this->wfpi_settings['wfpi_disabled_status']) : array();
                ?>
                <select name="wfpi_disabled_status" id="wfpi_disabled_status"
                        class="wcfusion_select_control wcfusion_select2" multiple>
                    <option value=""> Please select</option>
                    <?php
                    if (!empty($get_order_status)) {
                        foreach ($get_order_status as $key => $val) {
                            ?>
                            <option <?php echo ( !empty($wfpi_disabled_status) && in_array($key, $wfpi_disabled_status) ) ? 'selected' : ''; ?> value="<?php echo $key; ?>"><?php echo $val; ?></option>
                        <?php }
                    }
                    ?>
                </select>
            </div>
        </div>
        <small>Please select Order statuses which an invoice should not be generated.
        </small>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Attach to', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item wcfusion_invoice_input_label">
                <input id="new_order" type="checkbox" name="wfpi_attach_to_new_order" value="1"/>
                <label for="new_order">New Order(Admin Email)</label>
                <input id="cancelled_order" type="checkbox" name="wfpi_attach_to_cancelled_order" value="1"/>
                <label for="cancelled_order">Cancelled Order</label>
                <br>
                <input id="failed_order" type="checkbox" name="wfpi_attach_to_failed_order" value="1"/>
                <label for="failed_order">Failed Order</label>
                <input id="onhold_order" type="checkbox" name="wfpi_attach_to_onhold_order" value="1"/>
                <label for="onhold_order">On-Hold Order</label>
                <br>
                <input id="processing_order" type="checkbox" name="wfpi_attach_to_processing_order" value="1"/>
                <label for="processing_order">Processing Order</label>
                <input id="complete_order" type="checkbox" name="wfpi_attach_to_complete_order" value="1"/>
                <label for="complete_order">Complete Order</label>
                <br>
                <input id="refunded_order" type="checkbox" name="wfpi_attach_to_refunded_order" value="1"/>
                <label for="refunded_order">Refunded Order</label>
                <input id="customer_invoice" type="checkbox" name="wfpi_attach_to_customer_invoice" value="1"/>
                <label for="customer_invoice">Customer Invoice</label>
                <br>
                <input id="customer_note" type="checkbox" name="wfpi_attach_to_customer_note" value="1"/>
                <label for="customer_note">Customer Note</label>
            </div>
        </div>
    </div>
</div>

<div class="tab_body_sub_title mt20">
    <h4><?php _e ('Invoice Number', 'wcfusion'); ?></h4>
    <small>You may set your invoice number settings.</small>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Invoice Number Format', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select class="wcfusion_select_control wcfusion_select2">
                    <option value="">Please select</option>
                    <option disabled>[number]</option>
                    <option disabled>[number][suffix]</option>
                    <option disabled>[prefix][number]</option>
                    <option disabled>[prefix][number][suffix]</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Order Number as Invoice Number', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wfpi_ordernumber_as_invoice_number"
                           name="wfpi_ordernumber_as_invoice_number"
                           type="checkbox" value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_ordernumber_as_invoice_number']) ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn on if you want to order number as invoice number.</small>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar wfpi_start_invoice_number">
    <div class="label_title">
        <h4><?php _e ('Invoice Start Number', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_invoice_start_number" id="wfpi_invoice_start_number"
                       value="<?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_invoice_start_number']) ? $this->wfpi_settings['wfpi_invoice_start_number'] : '1001'; ?>"
                       placeholder="1001">
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Prefix', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select class="wcfusion_select_control wcfusion_select2">
                    <option value="">Please Select</option>
                    <option disabled>[F] (<?php echo date ('F') ?>)</option>
                    <option disabled>[dS] (<?php echo date ('dS') ?>)</option>
                    <option disabled>[M] (<?php echo date ('M') ?>)</option>
                    <option disabled>[m] (<?php echo date ('m') ?>)</option>
                    <option disabled>[d] (<?php echo date ('d') ?>)</option>
                    <option disabled>[D] (<?php echo date ('D') ?>)</option>
                    <option disabled>[y] <?php echo date ('y') ?>)</option>
                    <option disabled>[Y] (<?php echo date ('Y') ?>)</option>
                    <option disabled>[d/m/y] (<?php echo date ('d/m/y'); ?>)</option>
                    <option disabled>[d-m-Y] (<?php echo date ('d-m-Y') ?>)</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Suffix', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select class="wcfusion_select_control wcfusion_select2">
                    <option value="">Please Select</option>
                    <option disabled>[F] (<?php echo date ('F') ?>)</option>
                    <option disabled>[dS] (<?php echo date ('dS') ?>)</option>
                    <option disabled>[M] (<?php echo date ('M') ?>)</option>
                    <option disabled>[m] (<?php echo date ('m') ?>)</option>
                    <option disabled>[d] (<?php echo date ('d') ?>)</option>
                    <option disabled>[D] (<?php echo date ('D') ?>)</option>
                    <option disabled>[y] (<?php echo date ('y') ?>)</option>
                    <option disabled>[Y] (<?php echo date ('Y') ?>)</option>
                    <option disabled>[d/m/y] (<?php echo date ('d/m/y'); ?>)</option>
                    <option disabled>[d-m-Y] (<?php echo date ('d-m-Y') ?>)</option>
                </select>
            </div>
        </div>
    </div>
</div>