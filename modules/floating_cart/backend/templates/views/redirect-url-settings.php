<div class="tab_body_title">
    <h1><?php _e( 'Redirect URLS Settings', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'Continue Shopping Button Url', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text" id="wffc_continue_btn_url"
                       placeholder="<?php _e( home_url() . '/shop', 'wcfusion' ); ?>" disabled>
            </div>
        </div>
        <small>Set continue shopping button url.</small>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'View Cart Button Url', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text" id="wffc_view_cart_btn_url"
                       placeholder="<?php _e( home_url() . '/cart', 'wcfusion' ); ?>" disabled>
            </div>
        </div>
        <small>Set view cart details button url.</small>
    </div>
</div>

<div class="wcfusion_form_group floating_cart_settings_bar">
    <div class="label_title">
        <h4><?php _e( 'View Checkout Button Url', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="text" id="wffc_checkout_btn_url"
                       placeholder="<?php _e( home_url() . '/checkout', 'wcfusion' ); ?>" disabled>
                <small>Set view checkout button url.</small>
            </div>
        </div>
    </div>
</div>