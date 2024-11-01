<div id="wcfusion_one_click_checkout_dashboard">

    <form class="wcfusion-form-one-click-checkout" id="wcfusion_form_one_click_checkout">

        <div class="wcfusion_one_click_checkout_content_wrapper">

            <div class="wcfusion_one_click_checkout_bottom_form">
                <div class="content_wrapper">
                    <div class="wcfusion_one_click_checkout_left_content">
                        <div class="wcfusion_one_click_checkout_data_tabs">
                            <div class="tab_item tab_item_active" data-target="wcfusion_one_click_checkout_general">
                                <h3> <?php _e('General', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_one_click_checkout_cart_button">
                                <h3> <?php _e('Add To Cart', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_one_click_checkout_buy_now_button">
                                <h3> <?php _e('Buy Now Button', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_one_click_checkout_settings">
                                <h3> <?php _e('Checkout', 'wcfusion'); ?> </h3>
                            </div>
                        </div>
                    </div>

                    <div class="wcfusion_one_click_checkout_right_content">

                        <div data-id="wcfusion_one_click_checkout_general" class="wcfusion_one_click_checkout_tab_body">
                            <div class="tab_body_title">
                                <h1><?php _e('General Settings', 'wcfusion'); ?></h1>
                            </div>


                            <div class="wcfusion_form_group one_click_checkout_settings_bar">
                                <div class="label_title">
                                    <h4><?php _e('Disable cart page?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_disable_cart" class="wfocc_default_checked" name="wfocc_disable_cart" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_disable_cart']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small>Turn on to disable cart page, so that cart page will be redirected to checkout page.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="wcfusion_form_group one_click_checkout_settings_bar">
                                <div class="label_title">
                                    <h4><?php _e('Enable single page checkout?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_enable_single_page" name="wfocc_enable_single_page" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_enable_single_page']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small>Turn on to enable single page checkout, so checkout page will show the cart as well.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="wcfusion_form_group one_click_checkout_settings_bar">
                                <div class="label_title">
                                    <h4><?php _e('Enable redirect on add to cart', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_enable_redirect_to_cart" class="wfocc_default_checked" name="wfocc_enable_redirect_to_cart" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_enable_redirect_to_cart']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small>Once enabled, after clicking add to cart button customer will be directly redirected to Checkout page.</small>
                                    </div>
                                </div>
                            </div>
                            <div id="wfocc_custom_url_switcher_show" class="wcfusion_form_group one_click_checkout_settings_bar hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Redirect to custom url?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_enable_custom_url" name="wfocc_enable_custom_url" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_enable_custom_url']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small>Redirect to custom url instead of page, so using this you can redirect to any page.</small>
                                    </div>
                                </div>
                            </div>

                            <div id="wfocc_redirect_to_page_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Redirect to page?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <?php $get_pages = get_pages(); ?>
                                            <select name="wfocc_redirect_to_page" id="wfocc_redirect_to_page" class="wcfusion_select_control wcfusion_select2">
                                                <option value=""> Please select</option>
                                                <?php

                                                $page_url =  !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_redirect_to_page']) ? $this->wfocc_settings['wfocc_redirect_to_page'] : '';

                                                if (!empty($get_pages)) {
                                                    foreach ($get_pages as $row) {
                                                ?>
                                                        <option <?php echo (!empty($page_url) && $row->guid  ==  $page_url) ? 'selected' : ''; ?> value="<?php echo $row->guid; ?>"><?php _e($row->post_title, 'wcfusion'); ?></option>
                                                <?php }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <small>By default will redirect to checkout page.</small>
                                    </div>
                                </div>
                            </div>

                            <div id="wfocc_redirect_to_custom_url_show" class="wcfusion_form_group hide_wfocc_input hide_wfocc_input_two">
                                <div class="label_title">
                                    <h4><?php _e('Redirect to custom url', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="text" name="wfocc_redirect_to_custom_url" id="wfocc_redirect_to_custom_url" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_redirect_to_custom_url']) ? $this->wfocc_settings['wfocc_redirect_to_custom_url'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Redirect to this any custom url of your website e.g.: http://yourwebsite.com</small>
                                    </div>
                                </div>
                            </div>

                            <div class="wcfusion_form_group one_click_checkout_settings_bar">
                                <div class="label_title">
                                    <h4><?php _e('Disable continue shopping button', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_disable_continue_shopping_button" name="wfocc_disable_continue_shopping_button" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_disable_continue_shopping_button']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <small>WooCommerce shows a continue shopping button after a product is added to cart, with this option you can disable that link so user remain on checkout page.</small>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div data-id="wcfusion_one_click_checkout_cart_button" class="wcfusion_one_click_checkout_tab_body">
                            <div class="tab_body_title">
                                <h1><?php _e('Add to Cart button Settings', 'wcfusion'); ?></h1>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Ajax add to cart on single product', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
                                </div>
                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_enable_product_ajax_to_cart"  type="checkbox"  disabled>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on to enable ajax add to cart on single product.</small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Change Add to cart button text', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_change_add_to_cart_button_text" name="wfocc_change_add_to_cart_button_text" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_change_add_to_cart_button_text']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on to change the button text of add to cart button.</small>
                                </div>
                            </div>

                            <div id="wfocc_cart_button_text_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Add to cart button text', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="text" name="wfocc_cart_button_text" id="wfocc_cart_button_text" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_cart_button_text']) ? $this->wfocc_settings['wfocc_cart_button_text'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>This text will be shown inside add to cart button.</small>
                                    </div>
                                </div>
                            </div>

                            <div id="wfocc_select_options_button_text_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Select options button text', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="text" name="wfocc_select_options_button_text" id="wfocc_select_options_button_text" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_select_options_button_text']) ? $this->wfocc_settings['wfocc_select_options_button_text'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>This text will be shown on the archive page for the variable product, leave blank if you want to use default text.</small>
                                    </div>
                                </div>
                            </div>

                            <div id="wfocc_read_more_button_text_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Read more button text', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="text" name="wfocc_read_more_button_text" id="wfocc_read_more_button_text" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_read_more_button_text']) ? $this->wfocc_settings['wfocc_read_more_button_text'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>This text will be shown on archive page for the product when the product is out of stock, leave blank if you want to use default text.</small>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div data-id="wcfusion_one_click_checkout_buy_now_button" class="wcfusion_one_click_checkout_tab_body">
                            <div class="tab_body_title">
                                <h1><?php _e('Buy now button Settings', 'wcfusion'); ?></h1>
                            </div>

                            <!-- On product page -->
                            <div class="tab_body_sub_title">
                                <h4><?php _e('On product page', 'wcfusion'); ?></h4>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button ?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_enable_buy_now_button_on_product" name="wfocc_enable_buy_now_button_on_product" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_enable_buy_now_button_on_product']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on if you want buy now button on product page.</small>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_label_on_product_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button label', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="text"  id="wfocc_buy_btn_label_on_product" value="Buy Now" placeholder="" disabled>
                                        </div>
                                        <small>Buy now button label</small>
                                    </div>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_redirect_on_product_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Redirect to page', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <select name="wfocc_buy_btn_redirect_on_product" id="wfocc_buy_btn_redirect_on_product" class="wcfusion_select_control wcfusion_select2" disabled>
                                                <option value=""> Please select</option>
                                                <option selected>Checkout</option>                                              
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_position_on_product_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Position Of the Button', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <select  id="wfocc_buy_btn_position_on_product" class="wcfusion_select_control wcfusion_select2" disabled>
                                                <option value=""> Please select</option>
                                                <option  selected>After add to cart button</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_size_on_product_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button width', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_btn_size_on_product" id="wfocc_buy_btn_size_on_product" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_btn_size_on_product']) ? $this->wfocc_settings['wfocc_buy_btn_size_on_product'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button width on product page (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div  id="wfocc_product_mt_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin top', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_mt" id="wfocc_buy_now_btn_product_mt" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_mt']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_mt'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin top (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div  id="wfocc_product_mb_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin bottom', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_mb" id="wfocc_buy_now_btn_product_mb" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_mb']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_mb'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin bottom (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div  id="wfocc_product_ml_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin left', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_ml" id="wfocc_buy_now_btn_product_ml" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_ml']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_ml'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin left (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div  id="wfocc_product_mr_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin right', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_mr" id="wfocc_buy_now_btn_product_mr" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_mr']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_mr'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin right (PX)</small>
                                    </div>
                                </div>
                            </div>

                            
                            <!-- On product archive page -->
                            <div class="tab_body_sub_title wfocc-tab-title-mt">
                                <h4><?php _e('On product archive page', 'wcfusion'); ?></h4>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_enable_buy_now_button_on_product_archive" name="wfocc_enable_buy_now_button_on_product_archive" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_enable_buy_now_button_on_product_archive']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on if you want buy now button on product archive page.</small>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_label_on_product_archive_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button label', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="text" id="wfocc_buy_btn_label_on_product_archive"  value="Buy Now" disabled>
                                        </div>
                                        <small>Buy now button label</small>
                                    </div>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_redirect_on_product_archive_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Redirect to page', 'wcfusion'); ?><span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                          
                                            <select id="wfocc_buy_btn_redirect_on_product_archive" class="wcfusion_select_control wcfusion_select2" disabled>
                                                <option value=""> Please select</option>
                                                <option selected>Checkout</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_position_on_product_archive_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Position Of the Button', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <select  id="wfocc_buy_btn_position_on_product_archive" class="wcfusion_select_control wcfusion_select2" disabled>
                                                <option value=""> Please select</option>
                                                <option selected>After add to cart button</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="wfocc_buy_btn_size_on_product_archive_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button width', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_btn_size_on_product_archive" id="wfocc_buy_btn_size_on_product_archive" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_btn_size_on_product_archive']) ? $this->wfocc_settings['wfocc_buy_btn_size_on_product_archive'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button width on product archive page (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div  id="wfocc_product_archive_mt_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin top', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_archive_mt" id="wfocc_buy_now_btn_product_archive_mt" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_archive_mt']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mt'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin top  (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div  id="wfocc_product_archive_mb_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin bottom', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_archive_mb" id="wfocc_buy_now_btn_product_archive_mb" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_archive_mb']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mb'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin bottom (PX)</small>
                                    </div>
                                </div>
                            </div>


                            <div  id="wfocc_product_archive_ml_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin left', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_archive_ml" id="wfocc_buy_now_btn_product_archive_ml" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_archive_ml']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_ml'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin left (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div  id="wfocc_product_archive_mr_show" class="wcfusion_form_group hide_wfocc_input">
                                <div class="label_title">
                                    <h4><?php _e('Buy now button margin right', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" name="wfocc_buy_now_btn_product_archive_mr" id="wfocc_buy_now_btn_product_archive_mr" value="<?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_buy_now_btn_product_archive_mr']) ? $this->wfocc_settings['wfocc_buy_now_btn_product_archive_mr'] : ''; ?>" placeholder="">
                                        </div>
                                        <small>Buy now button margin right (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Buy now button design -->
                            <div class="tab_body_sub_title wfocc-tab-title-mt">
                                <h4><?php _e('Buy now Button design', 'wcfusion'); ?></h4>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Font Color', 'wcfusion'); ?> </h4>
                                </div>

                                <div class="label_content color-piker ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" name="wfocc_buy_now_btn_color" id="wfocc_buy_now_btn_color" value="<?php echo  $wfocc_buy_now_btn_color;  ?>" data-default-color="<?php echo  $wfocc_buy_now_btn_color;  ?>">
                                            <label for="wfocc_buy_now_btn_color"><?php _e('Select Color', 'wcfusion'); ?></label>
                                        </div>
                                    </div>
                                    <small>Set button font color</small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Background Color', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content color-piker ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" name="wfocc_buy_now_btn_bg_color" id="wfocc_buy_now_btn_bg_color" value="<?php echo  $wfocc_buy_now_btn_bg_color;  ?>" data-default-color="<?php echo  $wfocc_buy_now_btn_bg_color;  ?>">
                                            <label for="wfocc_buy_now_btn_bg_color"><?php _e('Select Color', 'wcfusion'); ?></label>
                                        </div>
                                    </div>
                                    <small>Set button background color</small>
                                </div>
                            </div>
                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Hover Font Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content color-piker ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" id="wfocc_buy_now_btn_hover_color"  value="#ffffff" data-default-color="#ffffff">
                                            <label for="wfocc_buy_now_btn_hover_color"><?php _e('Select Color', 'wcfusion'); ?></label>
                                        </div>
                                    </div>
                                    <small>Set button font color</small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Hover Background Color', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
                                </div>

                                <div class="label_content color-piker ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion-color-filed wcfusion_text_control h50" type="text" name="wfocc_buy_now_btn_hover_bg_color" id="wfocc_buy_now_btn_hover_bg_color" value="#000" data-default-color="#000">
                                            <label for="wfocc_buy_now_btn_hover_bg_color"><?php _e('Select Color', 'wcfusion'); ?></label>
                                        </div>
                                    </div>
                                    <small>Set button background color</small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Padding Top-Bottom', 'wcfusion'); ?><span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" id="wfocc_buy_now_btn_ptpb" placeholder="" value="15" disabled>
                                        </div>
                                        <small>Buy now button padding top & bottom (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Padding Left-Right', 'wcfusion'); ?><span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number" id="wfocc_buy_now_btn_plpr"  placeholder="" value="30" disabled>
                                        </div>
                                        <small>Buy now button padding left & right (PX)</small>
                                    </div>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Border Radius', 'wcfusion'); ?><span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <input class="wcfusion_text_control h50" type="number"  id="wfocc_bnb_border_radious" value="3" placeholder="" disabled>
                                        </div>
                                        <small>Buy now button border radious (PX)</small>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div data-id="wcfusion_one_click_checkout_settings" class="wcfusion_one_click_checkout_tab_body">
                            <div class="tab_body_title">
                                <h1><?php _e('Checkout Settings', 'wcfusion'); ?></h1>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Remove order comment ?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_remove_order_comment" name="wfocc_remove_order_comment" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_remove_order_comment']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on if you want to remove ‘Order Comment’. </small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Remove coupon form ?', 'wcfusion'); ?></h4>
                                </div>

                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_remove_coupon_form" name="wfocc_remove_coupon_form" type="checkbox" value="yes" <?php echo !empty($this->wfocc_settings) && isset($this->wfocc_settings['wfocc_remove_coupon_form']) ? 'checked' : ''; ?>>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on if you want to remove ‘Coupon Form’. </small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Remove policy text ?', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
                                </div>

                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_remove_policy_text" type="checkbox" disabled>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on if you want to remove ‘Policy Text’.</small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Remove terms & condition ?', 'wcfusion'); ?><span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            <label class="toggle_switch">
                                                <input id="wfocc_remove_terms_condition" type="checkbox" disabled>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <small>Turn on if you want to remove ‘Terms & Condition’.</small>
                                </div>
                            </div>


                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Remove billing fields?', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span> </h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                           
                                            <select id="wfocc_remove_billing_fields" class="wcfusion_select_control wcfusion_select2" multiple disabled>
                                                <option value=""> Please select</option>
                                                <option  selected> Billing First Name</option>
                                                <option selected> Billing Last Name</option>
                                                <option selected> Billing Address 1</option>
                                                <option selected> Billing Address 2</option>
                                                <option selected> Billing Country</option>
                                            </select>
                                        </div>
                                    </div>
                                    <small>Select the fields that you want to remove from ‘Billing Section’.</small>
                                </div>
                            </div>

                            <div class="wcfusion_form_group">
                                <div class="label_title">
                                    <h4><?php _e('Remove shipping fields?', 'wcfusion'); ?> <span class="wcfusion_get_pro">(Pro)</span></h4>
                                </div>

                                <div class="label_content ">
                                    <div class="wcfusion_module_list_items">
                                        <div class="wcfusion_module_item">
                                            
                                            <select name="wfocc_remove_shipping_fields" id="wfocc_remove_shipping_fields" class="wcfusion_select_control wcfusion_select2" multiple disabled>
                                                <option value=""> Please select</option>
                                                <option selected> Shipping Country</option>
                                                <option selected> Shipping City</option>
                                                <option selected> Shipping State</option> 
                                                <option selected> Shipping First Name</option>
                                                <option selected> Shipping Last Name</option>        

                                            </select>
                                        </div>
                                    </div>
                                    <small>Select the fields that you want to remove from ‘Shipping Section’.</small>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

                <div class="wcfusion_one_click_checkout_footer">

                    <button type="submit" class="wcfusion_one_click_checkout_btn wcfusion-occ-btn"> <?php _e('Save Settings', 'wcfusion'); ?>
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>