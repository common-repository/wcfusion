<div class="tab_body_title">
    <h1><?php _e( 'Header Style', 'wcfusion' ); ?></h1>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Cross Icon Size(px)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fccis_style; ?>"
                       name="wcfusion_fccis_style" id="wcfusion_fccis_style"
                       placeholder="18px">
            </div>
        </div>
        <small>Set your cart header cross icon in px (Ex. 18px)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Basket Icon Size(px)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fchbis_style; ?>"
                       name="wcfusion_fchbis_style" id="wcfusion_fchbis_style"
                       placeholder="35">
            </div>
        </div>
        <small>Set your cart header basket icon in px (Ex. 35)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Font Size(px)', 'wcfusion' ); ?></h4>
    </div>
    <div class="label_content ">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion_text_control h50" type="number" value="<?php echo $wcfusion_fchfs_style; ?>"
                       name="wcfusion_fchfs_style" id="wcfusion_fchfs_style"
                       placeholder="20">
            </div>
        </div>
        <small>Set your cart header font size in px (Ex. 20)</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Font Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fchfc_style" value="#3a3a3a" data-default-color="#3a3a3a">
                <label for="wcfusion_fchfc_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e( 'Heading Background Color', 'wcfusion' ); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content color-piker">
        <div class="wcfusion_module_list_items">
            <div class="wcfusion_module_item">
                <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wcfusion_fchbg_style" value="#F6F5FA" data-default-color="">
                <label for="wcfusion_fchbg_style"><?php _e ('Select Color', 'wcfusion'); ?></label>
            </div>
        </div>
    </div>
</div>