<div class="tab_body_title">
    <h1><?php _e( 'General Style', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Cart Width(px)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fc_width; ?>"
                       name="wcfusion_fc_width" id="wcfusion_fc_width"
                       placeholder="<?php _e( '350', 'wcfusion' ); ?>">
            </div>
        </div>
        <small>Set your cart width in px (Ex. 350)</small>
    </div>
</div>

<div class="wcfusion_form_group ">
    <div class="label_title">
        <h4><?php _e( 'Cart Open From', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <select name="wcfusion_fc_open_from" id="wcfusion_fc_open_from"
                        class="wcfusion_select_control wcfusion_select2">
                    <option value=""> Please select</option>
                    <option disabled><?php _e( 'Left <span class="wcfusion_get_pro">(Pro)</span>', 'wcfusion' ); ?></option>
                    <option selected value="right"><?php _e( 'Right', 'wcfusion' ); ?></option>
                    <option disabled><?php _e( 'Top <span class="wcfusion_get_pro">(Pro)</span>', 'wcfusion' ); ?></option>
                    <option disabled><?php _e( 'Bottom <span class="wcfusion_get_pro">(Pro)</span>', 'wcfusion' ); ?></option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Font Size', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcbfs_style; ?>"
                       name="wcfusion_fcbfs_style" id="wcfusion_fcbfs_style"
                       placeholder="16">
            </div>
        </div>
        <small>Set your all button font size in px (Ex. 16)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Font Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fctbfc_style" value="#FFF" data-default-color="#FFF">
                <label for="wcfusion_fctbfc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
        <small>Set your all button font color</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Background', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcbbg_style" value="#000" data-default-color="#000">
                <label for="wcfusion_fcbbg_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
        <small>Set your all button background</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Hover Font Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcbhfc_style" value="#FFF" data-default-color="#FFF">
                <label for="wcfusion_fcbhfc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
        <small>Set your all button hover font color</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Hover Background', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcbhbg_style" value="#000" data-default-color="#000">
                <label for="wcfusion_fcbhbg_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
        <small>Set your all button hover background</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Border Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fc_button_bc" value="#000" data-default-color="#000">
                <label for="wcfusion_fc_button_bc"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
        <small>Set your all button border color</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Border Hover Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fcbhc_style" value="#000" data-default-color="#000">
                <label for="wcfusion_fcbhc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
        <small>Set your all button border Hover color</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Button Border Radius', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" id="wcfusion_fcbbr_style" placeholder="5" disabled>
            </div>
        </div>
        <small>Set your all button border radius in px (Ex. 5)</small>
    </div>
</div>