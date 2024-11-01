<div class="tab_body_title">
    <h1><?php _e ('General Settings', 'wcfusion'); ?></h1>
</div>

<div class="tab_body_sub_title">
    <h4><?php _e ('Shop Info', 'wcfusion'); ?></h4>
    <small>The shop name and the address details from the sections below will be used as the
        'Shipping from' address in the invoice and other related documents.
    </small>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Shop Name', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_shop_name" id="wfpi_shop_name"
                       value="<?php echo !empty($this->shop_info) ? $this->shop_info['shop_name'] : ''; ?>"
                       placeholder="<?php _e ('Enter your shop name', 'wcfusion'); ?>">
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar f-start">
    <div class="label_title">
        <h4><?php _e ('Shop Logo', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content shop_logo_label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text" value="<?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_shop_logo']) ? $this->wfpi_settings['wfpi_shop_logo'] : ''; ?>"
                       name="wfpi_shop_logo" id="wfpi_shop_logo">
            </div>
        </div>
        <small>Recommended image size 150px X 60px</small>
    </div>
    <div class="label_btn">
        <button type="button" class="label_btn_upload wcfusion_file_uploader">Upload
        </button>
    </div>
    <div class="preview_image">
        <img src="<?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_shop_logo']) ? $this->wfpi_settings['wfpi_shop_logo'] : WCFUSION_MODULES_DIR . $this->module_slug . '/assets/img/no-image.jpg'; ?>"
             alt="shop logo">
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Shop Tax ID', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_shop_taxid" id="wfpi_shop_taxid" value="<?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_shop_taxid']) ? $this->wfpi_settings['wfpi_shop_taxid'] : ''; ?>"
                       placeholder="">
            </div>
            <small>Enter your shop tax ID. For e.g. VAT: GB1234568, GSTIN:0852369 or ABN:55
                624 553 446
            </small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Footer Info', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <textarea class="wcfusion_text_control wcfusion-textarea h50" cols="50"
                          rows="3" type="text"
                          name="wfpi_footer_info" id="wfpi_footer_info" value=""
                          placeholder=""><?php echo !empty($this->wfpi_settings) && !empty($this->wfpi_settings['wfpi_footer_info']) ? $this->wfpi_settings['wfpi_footer_info'] : ''; ?></textarea>
            </div>
            <small>Enter invoice footer info</small>
        </div>
    </div>
</div>

<div class="tab_body_sub_title mt20">
    <h4><?php _e ('Shop Address(Sender Details)', 'wcfusion'); ?></h4>
    <small>Automated load from woocommerce, you may change</small>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Sender', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_sender_name" id="wfpi_sender_name"
                       value="<?php echo !empty($this->shop_info) ? $this->shop_info['shop_name'] : ''; ?>"
                       placeholder="<?php _e ('Shop name', 'wcfusion'); ?>">
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Address Line 1', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_address_line_one" id="wfpi_address_line_one"
                       value="<?php echo !empty($this->shop_info) ? $this->shop_info['address1'] : ''; ?>"
                       placeholder="<?php _e ('Address line 1', 'wcfusion'); ?>">
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Address Line 2', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_address_line_two" id="wfpi_address_line_two"
                       value="<?php echo !empty($this->shop_info) ? $this->shop_info['address2'] : ''; ?>"
                       placeholder="<?php _e ('Address line 2', 'wcfusion'); ?>">
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('City', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_address_city" id="wfpi_address_city"
                       value="<?php echo !empty($this->shop_info) ? $this->shop_info['city'] : ''; ?>"
                       placeholder="<?php _e ('City name', 'wcfusion'); ?>">
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Postal Code', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_postal_code" id="wfpi_postal_code"
                       value="<?php echo !empty($this->shop_info) ? $this->shop_info['postcode'] : ''; ?>"
                       placeholder="<?php _e ('Postal Code', 'wcfusion'); ?>">
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Country/State', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wfpi_country_state" id="wfpi_country_state"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <?php !empty($this->shop_info['country']) && !empty($this->shop_info['state']) ? WC ()->countries->country_dropdown_options ($this->shop_info['country'], $this->shop_info['state']) : ''; ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Contact Number', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text"
                       name="wfpi_contact_number" id="wfpi_contact_number"
                       value="<?php echo !empty( $this->wfpi_settings ) && !empty( $this->wfpi_settings['wfpi_contact_number'] ) ? $this->wfpi_settings['wfpi_contact_number'] : ''; ?>">
            </div>
        </div>
    </div>
</div>

<div class="tab_body_sub_title mt20">
    <h4><?php _e ('Other Settings', 'wcfusion'); ?></h4>
    <small>You may set other settings for pdf</small>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('How do you want to view the PDF?', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <?php $get_pages = get_pages (); ?>
                <select name="wfpi_display_download" id="wfpi_display_download"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo !empty($this->wfpi_settings) && $this->wfpi_settings['wfpi_display_download'] == 'display_new_window' ? 'selected' : ''; ?> value="display_new_window"><?php _e ('Open The PDF in a New Window', 'wcfusion'); ?></option>
                    <option <?php echo !empty($this->wfpi_settings) && $this->wfpi_settings['wfpi_display_download'] == 'direct_download' ? 'selected' : ''; ?> value="direct_download"><?php _e ('Direct Download', 'wcfusion'); ?></option>
                </select>
            </div>
        </div>
        <small>Please select pages where you do not show floating cart.</small>
    </div>
</div>

<div class="wcfusion_form_group pdf_invoice_settings_bar">
    <div class="label_title">
        <h4><?php _e ('Show Tax?', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wfpi_in_ex_tax" id="wfpi_in_ex_tax"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo !empty($this->wfpi_settings) && $this->wfpi_settings['wfpi_in_ex_tax'] == 'include_tax' ? 'selected' : ''; ?> value="include_tax"><?php _e ('Include Tax', 'wcfusion'); ?></option>
                    <option <?php echo !empty($this->wfpi_settings) && $this->wfpi_settings['wfpi_in_ex_tax'] == 'exclude_tax' ? 'selected' : ''; ?> value="exclude_tax"><?php _e ('Exclude Tax', 'wcfusion'); ?></option>
                </select>
            </div>
        </div>
        <small>Please select pages where you do not show floating cart.</small>
    </div>
</div>