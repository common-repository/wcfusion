<div class="tab_body_title">
    <h1><?php _e( 'Footer Style', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Position Fixed', 'wcfusion' ); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <label class="toggle_switch">
                    <input id="wcfusion_fcfpf_style" class="wffc_switcher_default_check" name="wcfusion_fcfpf_style"
                           type="checkbox" value="yes" <?php $wcfusion_fcfpf_style == 'yes' ? 'checked' : ''; ?> >
                    <span class="slider round"></span>
                </label>
            </div>
            <small>Please turn off if do not fixed footer.</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Padding', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fcfp_style; ?>"
                       name="wcfusion_fcfp_style" id="wcfusion_fcfp_style"
                       placeholder="15px 20px">
            </div>
        </div>
        <small>Set your footer padding in px (Ex. 15px(top-bottom) 20px(left-right) )</small>
    </div>
</div>