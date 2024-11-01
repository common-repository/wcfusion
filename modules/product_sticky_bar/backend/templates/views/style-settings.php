<div class="tab_body_title">
    <h1><?php _e ('Bar Style', 'wcfusion'); ?></h1>
</div>

<div class="wcfusion_form_group sticky_settings_bar f-baseline">
    <div class="label_title">
        <h4><?php _e ('Height', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="label_content">
                <input onkeyup="removeChar(this);" class="wcfusion_text_control wfpsb_input" type="text" value="<?php echo !empty($this->styles) && isset($this->styles->wfpbs_bar_height) ? $this->styles->wfpbs_bar_height : '';  ?>"
                       name="wfpbs_bar_height"
                       id="wfpbs_bar_height"
                       placeholder="100">
            </div>
            <small>Set sticky bar height in pixel(Ex.150) - Default 100px.</small>
        </div>
    </div>

</div>

<div class="wcfusion_form_group sticky_settings_bar f-baseline">
    <div class="label_title">
        <h4><?php _e ('Product Image Shape', 'wcfusion'); ?></h4>
    </div>
    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <select name="wfpsb_product_image_shape" id="wfpsb_product_image_shape" class="wcfusion_select_control wcfusion_select2">
                <option value=""> Please select</option>
                <option <?php echo !empty($this->styles) && isset($this->styles->wfpsb_product_image_shape) && $this->styles->wfpsb_product_image_shape == 'round' ? 'selected':''; ?> value="round"><?php _e ('Round', 'wcfusion'); ?></option>
                <option <?php echo !empty($this->settings) && isset($this->styles->wfpsb_product_image_shape) && $this->styles->wfpsb_product_image_shape == 'squire' ? 'selected':''; ?> value="squire"><?php _e ('Squire', 'wcfusion'); ?></option>
            </select>
        </div>
        <small>Select Product image shape default squire</small>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Product Title Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#3a3a3a"
               name="wfpsb_product_title_color"
               id="wfpsb_product_title_color"
               placeholder="<?php _e ('#3a3a3a', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_product_title_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group">

    <div class="label_title">
        <h4><?php _e ('Product Rating Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#0170b9"
               name="wfpsb_product_rating_color"
               id="wfpsb_product_rating_color"
               placeholder="<?php _e ('#0170b9', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_product_rating_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>

</div>

<div class="wcfusion_form_group">

    <div class="label_title">
        <h4><?php _e ('Product Rating Count Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#3a3a3a"
               name="wfpsb_product_rating_count_color"
               id="wfpsb_product_rating_count_color"
               placeholder="<?php _e ('#3a3a3a', 'wcfusion'); ?>" disabled>
        <label  for="wfpsb_product_rating_count_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Product Price Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#ca0815"
               name="wfpsb_product_price_color"
               id="wfpsb_product_price_color"
               placeholder="<?php _e ('#ca0815', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_product_price_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group sticky_settings_bar f-baseline">
    <div class="label_title">
        <h4><?php _e ('Price Font Size', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="label_content">
                <input class="wcfusion_text_control wfpsb_input h50" type="number" value="<?php echo !empty($this->styles) && isset($this->styles->wfpsb_product_price_color) ? $this->styles->wfpsb_product_price_color : '15';?>" min="1"
                       name="wfpsb_product_price_font_size"
                       id="wfpsb_product_price_font_size"
                       placeholder="<?php _e ("15", 'wcfusion'); ?>">
            </div>
            <small>Set sticky bar product price font size(Ex. 16)</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Button Background Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#ca0815"
               name="wfpsb_btn_bg_color"
               id="wfpsb_btn_bg_color"
               placeholder="<?php _e ('#ca0815', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_btn_bg_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Button Font Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#ffffff"
               name="wfpsb_btn_font_color"
               id="wfpsb_btn_font_color"
               placeholder="<?php _e ('#ffffff', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_btn_font_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group sticky_settings_bar f-baseline">
    <div class="label_title">
        <h4><?php _e ('Button Font Size', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="label_content">
                <input class="wcfusion_text_control wfpsb_input h50" type="number" value="<?php echo !empty($this->styles) && isset($this->styles->wfpsb_btn_bg_color) ? $this->styles->wfpsb_btn_bg_color : '14';?>" min="1"
                       name="wfpsb_btn_font_size"
                       id="wfpsb_btn_font_size"
                       placeholder="<?php _e ('14', 'wcfusion'); ?>">
            </div>
            <small>Set sticky bar add to cart button font size(Ex. 16)</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Button Border Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#ca0815"
               name="wfpsb_btn_border_color"
               id="wfpsb_btn_border_color"
               placeholder="<?php _e ('#ca0815', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_btn_border_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group sticky_settings_bar f-baseline">
    <div class="label_title">
        <h4><?php _e ('Button Border Width', 'wcfusion'); ?></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="label_content">
                <input class="wcfusion_text_control wfpsb_input h50" type="number" value="<?php echo !empty($this->styles) && isset($this->styles->wfpsb_btn_border_width) ? $this->styles->wfpsb_btn_border_width : '1';?>" min="0"
                       name="wfpsb_btn_border_width"
                       id="wfpsb_btn_border_width"
                       placeholder="<?php _e ('1', 'wcfusion'); ?>">
            </div>
            <small>Set sticky bar add to cart button border width(Ex. 1)</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Button Background Hover Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#ffffff"
               name="wfpsb_btn_bg_hover_color"
               id="wfpsb_btn_bg_hover_color"
               placeholder="<?php _e ('#ca0815', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_btn_bg_hover_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Button Border Hover Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#000"
               name="wfpsb_btn_border_hover_color"
               id="wfpsb_btn_border_hover_color"
               placeholder="<?php _e ('#ca0815', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_btn_border_hover_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group">
    <div class="label_title">
        <h4><?php _e ('Button Hover Font Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>
    <div class="label_content content_border">
        <input class="wcfusion_text_control h50" type="color" value="#000"
               name="wfpsb_btn_font_hover_color"
               id="wfpsb_btn_font_hover_color"
               placeholder="<?php _e ('#fff', 'wcfusion'); ?>" disabled>
        <label for="wfpsb_btn_font_hover_color"><?php _e ('Select Color', 'wcfusion'); ?></label>
    </div>
</div>

<div class="wcfusion_form_group sticky_settings_bar f-baseline">
    <div class="label_title">
        <h4><?php _e ('Button Padding Left-Right', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="label_content">
                <input class="wcfusion_text_control wfpsb_input h50" type="number" value="30" min="0"
                       name="wfpsb_btn_padding_left_right"
                       id="wfpsb_btn_padding_left_right"
                       placeholder="<?php _e ('0', 'wcfusion'); ?>" disabled>
            </div>
            <small>Set sticky bar add to cart button left-right padding(Ex. 30)</small>
        </div>
    </div>
</div>

<div class="wcfusion_form_group sticky_settings_bar f-baseline">
    <div class="label_title">
        <h4><?php _e ('Button Padding Top-Bottom', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
    </div>

    <div class="label_content">
        <div class="wcfusion_module_list_items">
            <div class="label_content">
                <input class="wcfusion_text_control wfpsb_input h50" type="number" value="0" min="0"
                       name="wfpsb_btn_padding_top_bottom"
                       id="wfpsb_btn_padding_top_bottom"
                       placeholder="<?php _e ('30', 'wcfusion'); ?>" disabled>
            </div>
            <small>Set sticky bar add to cart button top-bottom padding(Ex. 30)</small>
        </div>
    </div>
</div>