<div class="tab_body_title">
    <h1><?php _e( 'Basket Style', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Enable', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wcfusion_fcbs_enable" id="wcfusion_fcbs_enable"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wcfusion_fcbs_enable == 'show_always') ? 'selected' : ''; ?> value="show_always"><?php _e( 'Always Show', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbs_enable == 'hide_always') ? 'selected' : ''; ?> value="hide_always"><?php _e( 'Always Hide', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbs_enable == 'hide_empty_cart') ? 'selected' : ''; ?> value="hide_empty_cart"><?php _e( 'Hide when cart is empty', 'wcfusion' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Shape', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wcfusion_fcbs_shape" id="wcfusion_fcbs_shape"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wcfusion_fcbs_shape == '100') ? 'selected' : ''; ?> value="100"><?php _e( 'Round', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbs_shape == '20') ? 'selected' : ''; ?> value="20"><?php _e( 'Square', 'wcfusion' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Icon Size', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcbs_icon_size; ?>"
                       name="wcfusion_fcbs_icon_size" id="wcfusion_fcbs_icon_size"
                       placeholder="<?php _e( '35', 'wcfusion' ); ?>">
            </div>
        </div>
        <small>Set your basket icon size in px (Ex. 35)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Show Count?', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wcfusion_fc_sc_style" class="wffc_switcher_default_check" name="wcfusion_fc_sc_style"
                           type="checkbox" value="yes" <?php echo ($wcfusion_fc_sc_style == 'yes') ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn off if do not show basket count.</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Icon', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content wffc-cart-icon">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">

                <span class="wcfusion-cart-icon checked">
                    <i class="demo-icon icon-basket1">&#xe805;</i>
                </span>
                <span class="wcfusion-cart-icon">
                    <i class="demo-icon icon-basket2">&#xe806;</i><span class="wcfusion_get_pro">(Pro)</span>
                </span>
                <span class="wcfusion-cart-icon">
                    <i class="demo-icon icon-basket3">&#xe807;</i><span class="wcfusion_get_pro">(Pro)</span>
                </span>
                <span class="wcfusion-cart-icon">
                    <i class="demo-icon icon-basket6">&#xe80a;</i><span class="wcfusion_get_pro">(Pro)</span>
                </span>

                <input id="wcfusion_fc_bset_icon" name="wcfusion_fc_bset_icon"
                       type="hidden" value="icon-basket1">
            </div>
            <small>Please select your basket icon.</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Basket Position', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wcfusion_fcbp_style" id="wcfusion_fcbp_style"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wcfusion_fcbp_style == 'top_left') ? 'selected' : ''; ?> value="top_left"><?php _e( 'Top Left', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbp_style == 'top_right') ? 'selected' : ''; ?> value="top_right"><?php _e( 'Top Right', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbp_style == 'bottom_left') ? 'selected' : ''; ?> value="bottom_left"><?php _e( 'Bottom Left', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbp_style == 'bottom_right') ? 'selected' : ''; ?> value="bottom_right"><?php _e( 'Bottom Right', 'wcfusion' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Offset(vertical)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcbov_style; ?>"
                       name="wcfusion_fcbov_style" id="wcfusion_fcbov_style"
                       placeholder="<?php _e( '110', 'wcfusion' ); ?>">
            </div>
        </div>
        <small>Set your basket vertical offset in px (Ex. 110)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Offset(horizontal)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcboh_style; ?>"
                       name="wcfusion_fcboh_style" id="wcfusion_fcboh_style"
                       placeholder="<?php _e( '60', 'wcfusion' ); ?>">
            </div>
        </div>
        <small>Set your basket horizontal offset in px (Ex. 60)</small>
    </div>
</div>

<div class="wcfusion_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Basket Count Position', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wcfusion_fcbcp_style" id="wcfusion_fcbcp_style"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option <?php echo ($wcfusion_fcbcp_style == 'top_left') ? 'selected' : ''; ?> value="top_left"><?php _e( 'Top Left', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbcp_style == 'top_right') ? 'selected' : ''; ?> value="top_right"><?php _e( 'Top Right', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbcp_style == 'bottom_left') ? 'selected' : ''; ?> value="bottom_left"><?php _e( 'Botton Left', 'wcfusion' ); ?></option>
                    <option <?php echo ($wcfusion_fcbcp_style == 'bottom_right') ? 'selected' : ''; ?> value="bottom_right"><?php _e( 'Bottom Right', 'wcfusion' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Icon Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcbc_style" value="#fff" data-default-color="#fff">
                <label for="wcfusion_fchtc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Background Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcbbc_style" value="#000" data-default-color="#000">
                <label for="wcfusion_fchtc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Count Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
    </div>

    <div class="label_content  color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text"
                       name="wcfusion_fcbcc_style" id="wcfusion_fcbcc_style" value="#fff" data-default-color="#fff">
                <label for="wcfusion_fcbcc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Basket Count Background Color', 'wcfusion' );?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcbcbc_style" value="#d00" data-default-color="#d00">
                <label for="wcfusion_fchtc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>