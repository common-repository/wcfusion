    <div class="tab_body_title">
        <h1><?php _e ('Bar Settings', 'wcfusion'); ?></h1>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Enable Sticky Bar', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_is_enable" name="wfpsb_is_enable"
                               class="wfpsb_default_check"
                               type="checkbox" value="yes"
                            <?php echo !empty($this->settings) && isset($this->settings->wfpsb_is_enable) && $this->settings->wfpsb_is_enable == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you want to disabled sticky bar</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Show on Desktop', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_show_on_desktop" name="wfpsb_show_on_desktop" class="wfpsb_default_check"
                               type="checkbox" value="yes"
                            <?php echo !empty($this->settings) && isset($this->settings->wfpsb_show_on_desktop) && $this->settings->wfpsb_show_on_desktop == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you show sticky bar on desktop</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Show on Mobile', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_show_on_mobile" name="wfpsb_show_on_mobile" class="wfpsb_default_check" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_show_on_mobile) && $this->settings->wfpsb_show_on_mobile == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you show sticky bar on mobile</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Sticky Bar Position', 'wcfusion'); ?></h4>
        </div>
        <div class="label_content">
            <select name="wfpsb_show_in" id="wfpsb_show_in" class="wcfusion_select_control wcfusion_select2">
                <option value=""> Please select</option>
                <option <?php echo !empty($this->settings) && isset($this->settings->wfpsb_show_in) && $this->settings->wfpsb_show_in == 'before' ? 'selected':''; ?> value="before"><?php _e ('Top', 'wcfusion'); ?></option>
                <option <?php echo !empty($this->settings) && isset($this->settings->wfpsb_show_in) && $this->settings->wfpsb_show_in == 'after' ? 'selected':''; ?> value="after"><?php _e ('Bottom', 'wcfusion'); ?></option>
            </select>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Show Only After Scroll', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_show_only_scroll" name="wfpsb_show_only_scroll" class="wfpsb_default_check" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_show_only_scroll) && $this->settings->wfpsb_show_only_scroll == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Show sticky bar when user scrolls down in product page</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Scroll Pixels', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="label_content">
                    <input onkeyup="removeChar(this);" class="wcfusion_text_control wfpsb_input" type="text" value="<?php echo !empty($this->settings) && isset($this->settings->wfpbs_scroll_pixels) ? $this->settings->wfpbs_scroll_pixels : 180; ?>"
                           name="wfpbs_scroll_pixels"
                           id="wfpbs_scroll_pixels"
                           placeholder="180">
                </div>
                <small>Show Bar after user scroll given pixels on the product page, Only work when "Scroll Pixels" option is enabled. Default 180px</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Show Product Review', 'wcfusion'); ?></h4>
        </div>
        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_product_review" class="wfpsb_default_check" name="wfpsb_product_review" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_product_review) && $this->settings->wfpsb_product_review == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you don't show product review</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Show Product Review Count', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_product_review_count" class="wfpsb_default_check" name="wfpsb_product_review_count" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_product_review_count) && $this->settings->wfpsb_product_review_count == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you don't show product review count</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Disable for', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
        </div>
        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <select id="wfpsb_disabled_products" class="wcfusion_select_control wcfusion_select2" data-placeholder="Please Select" disabled>
                    <option value=""> Please select</option>
                </select>
            </div>
            <small>Select the products that you do not want to see the sticky bar.</small>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Enable Update Product Qty', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_enable_qty_input" name="wfpsb_enable_qty_input" class="wfpsb_default_check" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_enable_qty_input) && $this->settings->wfpsb_enable_qty_input == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you don't show update product quantity on sticky bar</small>
            </div>
        </div>
    </div>

<!--    <div class="wcfusion_form_group sticky_settings_bar f-baseline">-->
<!--        <div class="label_title">-->
<!--            <h4>--><?php //_e ('Enable Variable Product', 'wcfusion'); ?><!--</h4>-->
<!--        </div>-->
<!---->
<!--        <div class="label_content">-->
<!--            <div class="wcfusion_module_list_items">-->
<!--                <div class="wcfusion_module_item">-->
<!--                    <label class="toggle_switch">-->
<!--                        <input id="wfpsb_enable_variable_product" name="wfpsb_enable_variable_product" class="wfpsb_default_check" type="checkbox" value="yes" --><?php //echo !empty($this->settings) && isset($this->settings->wfpsb_enable_variable_product) && $this->settings->wfpsb_enable_variable_product == 'yes' ? 'checked':''?><!-- >-->
<!--                        <span class="slider round"></span>-->
<!--                    </label>-->
<!--                </div>-->
<!--                <small>Please turn off if you don't show variable product options on sticky bar</small>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Show Product Image', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_show_product_image" name="wfpsb_show_product_image" class="wfpsb_default_check" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_show_product_image) && $this->settings->wfpsb_show_product_image == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you don't show product image on sticky bar</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Show Stock Status', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_show_stock" name="wfpsb_show_stock" class="wfpsb_default_check" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_show_stock) && $this->settings->wfpsb_show_stock == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn off if you don't show stock quantity on sticky bar</small>
            </div>
        </div>
    </div>

    <div class="wcfusion_form_group sticky_settings_bar f-baseline">
        <div class="label_title">
            <h4><?php _e ('Hide Sticky bar( <small>Product Out of Stock</small> )', 'wcfusion'); ?></h4>
        </div>

        <div class="label_content">
            <div class="wcfusion_module_list_items">
                <div class="wcfusion_module_item">
                    <label class="toggle_switch">
                        <input id="wfpsb_hidebar_outofstock" name="wfpsb_hidebar_outofstock" class="" type="checkbox" value="yes" <?php echo !empty($this->settings) && isset($this->settings->wfpsb_hidebar_outofstock) && $this->settings->wfpsb_hidebar_outofstock == 'yes' ? 'checked':''?> >
                        <span class="slider round"></span>
                    </label>
                </div>
                <small>Please turn on if you don't show sticky bar when product out of stock</small>
            </div>
        </div>
    </div>

