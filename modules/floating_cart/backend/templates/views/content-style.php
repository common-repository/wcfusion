<div class="tab_body_title">
    <h1><?php _e( 'Cart Content Style', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Delete Icon', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content wffc-cart-icon">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">

                <span class="wcfusion-item-remove-icon checked">
                    <i class="demo-icon icon-cancel1">&#xe800;</i>
                </span>

                <span class="wcfusion-item-remove-icon">
                    <i class="demo-icon icon-cancel2">&#xe801;</i> <span class="wcfusion_get_pro">(Pro)</span>
	            </span>

                <span class="wcfusion-item-remove-icon">
                    <i class="demo-icon icon-cancel3">&#xe802;</i> <span class="wcfusion_get_pro">(Pro)</span>
                </span>

                <span class="wcfusion-item-remove-icon">
                    <i class="demo-icon icon-cancel14">&#xe803;</i> <span class="wcfusion_get_pro">(Pro)</span>
                </span>

                <span class="wcfusion-item-remove-icon">
                    <i class="demo-icon icon-cancel5">&#xe804;</i><span class="wcfusion_get_pro">(Pro)</span>
                </span>

                <input id="wffc_item_remove_icon" name="wffc_item_remove_icon"
                       type="hidden" value="icon-cancel1">
            </div>
            <small>Please select your delete icon.</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Delete Icon Size(px)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcccdis_style; ?>"
                       name="wcfusion_fcccdis_style" id="wcfusion_fcccdis_style"
                       placeholder="18">
            </div>
        </div>
        <small>Set your cart content delete icon size in px (Ex. 18)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Content Font Size(px)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcccfs_style; ?>"
                       name="wcfusion_fcccfs_style" id="wcfusion_fcccfs_style"
                       placeholder="16">
            </div>
        </div>
        <small>Set your cart content font size in px (Ex. 18)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Content Font Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" name="wcfusion_fccfc_style" id="wcfusion_fccfc_style" value="#000" data-default-color="#000">
                <label for="wcfusion_fchtc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Content Background Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text"
                       name="wcfusion_fccbc_style" id="wcfusion_fccbc_style" value="#F6F5FA" data-default-color="#F6F5FA">
                <label for="wcfusion_fccbc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<!-- Cart Content Product Style -->
<div class="tab_body_title top-space">
    <h1><?php _e( 'Cart Content Product Style', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Product Image Width', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcccpiw_style; ?>"
                       name="wcfusion_fcccpiw_style" id="wcfusion_fcccpiw_style"
                       placeholder="80">
            </div>
        </div>
        <small>Set your cart content product image width in percent(%) (Ex. 20)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Product Image Padding', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" id="wcfusion_fccpip_style"
                       placeholder="20px 15px 20px 15px" disabled>
            </div>
        </div>
        <small>Set your cart content product image padding in px (Ex. 20px(top) 15px(right)
            20px(bottom) 15px(left) )
        </small>
    </div>
</div>

<div class="wcfusion_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Product Title Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fciptc_style" value="#000" data-default-color="#9b51e0">
                <label for="wcfusion_fciptc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Product Title Hover Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcipthc_style" value="#000" data-default-color="#000">
                <label for="wcfusion_fcipthc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Product Title Font Size', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fciptfs_style; ?>"
                       name="wcfusion_fciptfs_style" id="wcfusion_fciptfs_style"
                       placeholder="16">
            </div>
        </div>
        <small>Set your cart content product title font size in px (Ex. 16)</small>
    </div>
</div>

<div class="tab_body_title  top-space">
    <h1><?php _e( 'Product Quantity Input Style', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Width', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" id="wcfusion_fccpqibw_style"
                       placeholder="40" disabled>
            </div>
        </div>
        <small>Set your cart content product quantity input box width in px (Ex. 40)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Border Radius', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" id="wcfusion_fccpqibbr_style"
                       placeholder="3" disabled>
            </div>
        </div>
        <small>Set your cart content product quantity input box border radius in px (Ex. 3)
        </small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Border Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fccpqibbc_style" value="#ccc" data-default-color="#ccc">
                <label for="wcfusion_fchtc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Background Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fccpqibbgc_style" value="#ffffff" data-default-color="#ffffff">
                <label for="wcfusion_fccpqibbgc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Input Box Text Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fccpqibtc_style" value="#666" data-default-color="#666">
                <label for="wcfusion_fccpqibtc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>