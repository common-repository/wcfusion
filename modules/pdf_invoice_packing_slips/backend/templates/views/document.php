<div class="tab_body_title">
    <h1><?php _e ('PDF Document', 'wcfusion'); ?></h1>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Deactivate Invoice?', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content ">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wfpi_deactivate_invoice" class="wfpi_default_checked"
                           name="wfpi_deactivate_invoice" type="checkbox"
                           value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_deactivate_invoice']) ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn off if you want to deactivate invoice.</small>
        </div>
    </div>
</div>

 <!--<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php //_e ('Deactivate Packing Slip?', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content ">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wfpi_deactivate_packing_slip" class="wfpi_default_checked"
                           name="wfpi_deactivate_packing_slip" type="checkbox"
                           value="yes" <?php //echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_deactivate_packing_slip']) ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn off if you want to deactivate packing slip.</small>
        </div>
    </div>
</div> -->

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Deactivate Shipping Label?', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content ">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wfpi_deactivate_shipping_label" class="wfpi_default_checked"
                           name="wfpi_deactivate_shipping_label" type="checkbox"
                           value="yes" <?php echo !empty($this->wfpi_settings) && isset($this->wfpi_settings['wfpi_deactivate_shipping_label']) ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn off if you want to deactivate shipping label. It is also allowed to turn ON where shipping label is needed instead of packing slip.</small>
        </div>
    </div>
</div>