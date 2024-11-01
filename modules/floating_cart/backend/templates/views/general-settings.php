<div class="tab_body_title">
    <h1><?php _e( 'Cart Settings', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Is Auto Open Cart?', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content ">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wffc_auto_open_cart" name="wffc_auto_open_cart" type="checkbox"
                           value="yes" <?php echo !empty($auto_open_cart) && $auto_open_cart == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn on if you want to auto open floating cart.</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Cart Item Order', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wffc_cart_item_order" id="wffc_cart_item_order"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo !empty($cart_item_order) && $cart_item_order == 'asc' ? 'selected' : ''; ?> value="asc"><?php _e( 'ASC', 'wcfusion' ); ?></option>
                    <option <?php echo !empty($cart_item_order) && $cart_item_order == 'desc' ? 'selected' : ''; ?> value="desc"><?php _e( 'DESC', 'wcfusion' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Basket Count', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wffc_bascket_count" id="wffc_bascket_count"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo !empty($bascket_count) && $bascket_count == 'number_of_products' ? 'selected':''; ?> value="number_of_products"><?php _e( 'Number Of Products', 'wcfusion' ); ?></option>
                    <option <?php echo !empty($bascket_count) && $bascket_count == 'number_of_items' ? 'selected':''; ?> value="number_of_items"><?php _e( 'Total Number Of Items', 'wcfusion' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'URL of Empty Cart Button', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text" id="wffc_redirect_url_empty_cart_btn"
                       placeholder="<?php _e( home_url() . '/shop/', 'wcfusion' ); ?>" disabled>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Select Don\'t Show Pages', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <?php $get_pages = get_pages(); ?>
                <select name="wffc_dont_show_cart_pages" id="wffc_dont_show_cart_pages"
                        class="wcfusion_select_control wcfusion_select2" multiple>
                    <option value=""> Please select</option>
                    <?php
                    if ( ! empty( $get_pages ) ) {
                        foreach ( $get_pages as $row ) { ?>
                            <option <?php echo ( !empty($dont_show_pages) && in_array($row->ID, $dont_show_pages) ) ? 'selected' : ''; ?> value="<?php echo $row->ID; ?>"><?php _e( $row->post_title, 'wcfusion' ); ?></option>
                        <?php }
                    }
                    ?>
                </select>
            </div>
        </div>
        <small>Please select pages where you do not show floating cart.</small>
    </div>
</div>