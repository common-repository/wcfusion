<div class="tab_body_title">
    <h1><?php _e( 'Body Settings', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Product Image?', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_product_image" class="wffc_switcher_default_check" name="wffc_show_product_image" type="checkbox"
                           value="yes" <?php echo $show_product_image == 'yes' ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show product image.</small>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Product Name?', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_product_name" class="wffc_switcher_default_check" name="wffc_show_product_name" type="checkbox"
                           value="yes" <?php echo $show_product_name == 'yes' ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show product name.</small>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Product Unit Price?', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_product_price" class="wffc_switcher_default_check" name="wffc_show_product_price" type="checkbox"
                           value="yes" <?php echo $show_product_price == 'yes' ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show product price.</small>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Show Product Price Total?', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_show_product_price_total" class="wffc_switcher_default_check" name="wffc_show_product_price_total"
                           type="checkbox" value="yes" <?php echo $show_product_price_total == 'yes' ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not show product price total.</small>
    </div>
</div>

<!--<div class="wcfusion_form_group floating_cart_settings_bar">-->
<!--    <div class="label_title">-->
<!--        <h4>--><?php //_e( 'Show Product Meta?', 'wcfusion' ); ?><!--</h4>-->
<!--    </div>-->
<!---->
<!--    <div class="label_content">-->
<!--        <div class="wcfusion_module_list_items">-->
<!--            <div class="wcfusion_module_item">-->
<!--                <label class="toggle_switch">-->
<!--                    <input id="wffc_show_product_meta" class="wffc_switcher_default_check" name="wffc_show_product_meta" type="checkbox"-->
<!--                           value="yes">-->
<!--                    <span class="slider round"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <small>Please turn off if you do not show product meta( Variations ).</small>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="wcfusion_form_group floating_cart_settings_bar">-->
<!--    <div class="label_title">-->
<!--        <h4>--><?php //_e( 'Show Product Sale Count?', 'wcfusion' ); ?><!--</h4>-->
<!--    </div>-->
<!---->
<!--    <div class="label_content">-->
<!--        <div class="wcfusion_module_list_items">-->
<!--            <div class="wcfusion_module_item">-->
<!--                <label class="toggle_switch">-->
<!--                    <input id="wffc_show_product_sale_count" name="wffc_show_product_sale_count"-->
<!--                           type="checkbox" value="yes" --><?php //echo $show_product_sale_count == 'yes' ? 'checked' : ''; ?><!-- >-->
<!--                    <span class="slider round"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <small>Please turn on if you show product sale count on cart.</small>-->
<!--    </div>-->
<!--</div>-->

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Link to Single Product?', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_link_to_single_product" class="wffc_switcher_default_check" name="wffc_link_to_single_product"
                           type="checkbox" value="yes" <?php echo $link_to_single_product == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not link to single product page.</small>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Delete Item From Cart', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_delete_item_form_cart" class="wffc_switcher_default_check" name="wffc_delete_item_form_cart"
                           type="checkbox" value="yes" <?php echo $delete_item_form_cart == 'yes' ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not delete item from cart.</small>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Allowed Quantity Update', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_allowed_quantity_update" class="wffc_switcher_default_check" name="wffc_allowed_quantity_update"
                           type="checkbox" value="yes" <?php echo $allowed_quantity_update == 'yes' ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
        <small>Please turn off if you do not quantity update on cart.</small>
    </div>
</div>

<!--<div class="wcfusion_form_group floating_cart_settings_bar">-->
<!--    <div class="label_title">-->
<!--        <h4>--><?php //_e( 'Show Variable Product Name?', 'wcfusion' ); ?><!--</h4>-->
<!--    </div>-->
<!---->
<!--    <div class="label_content">-->
<!--        <div class="wcfusion_module_list_items">-->
<!--            <div class="wcfusion_module_item">-->
<!--                <label class="toggle_switch">-->
<!--                    <input id="wffc_show_variable_product_name" class="wffc_switcher_default_check" name="wffc_show_variable_product_name"-->
<!--                           type="checkbox" value="yes" --><?php //echo $show_variable_product_name == 'yes' ? 'checked' : ''; ?>
<!--                    <span class="slider round"></span>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
<!--        <small>Please turn off if you do not show variation attributes in product name.-->
<!--        </small>-->
<!--    </div>-->
<!--</div>-->