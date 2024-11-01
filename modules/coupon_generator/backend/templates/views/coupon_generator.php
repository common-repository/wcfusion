<div id="wcfusion_coupon_generate_dashboard">
    <form action="" method="post" id="form_wcfusion_coupon_generator">
        <div class="coupon_generate_content_wrapper">
            <div class="coupon_generate_top_form">
                <div class="wcfusion_row">
                    <div class="wcfusion_col_lg_4">
                        <div class="wcfusion_form_group">
                            <label for="coupon_generator_prefix">Prefix <span class="wcfusion_get_pro">(Pro)</span></label>
                            <input class="wcfusion_text_control" type="text"
                                   placeholder="Coupon prefix" disabled>
                        </div>
                    </div>
                    <div class="wcfusion_col_lg_4">
                        <div class="wcfusion_form_group">
                            <label for="coupon_generator_number_of_coupon">Number of Coupons</label>
                            <input onkeyup="removeChar(this);" class="wcfusion_text_control" type="text" value=""
                                   name="coupon_generator_number_of_coupon"
                                   id="coupon_generator_number_of_coupon"
                                   placeholder="Total number of coupons">
                        </div>
                    </div>
                    <div class="wcfusion_col_lg_4">
                        <div class="wcfusion_form_group">
                            <label for="coupon_generator_coupon_type" class="mb20">Coupon Type <span class="wcfusion_get_pro">(Pro)</span></label>
                            <select class="wcfusion_select_control wcfusion_select2">
                                <option value=""> Please select</option>
                                <option disabled>Characters</option>
                                <option disabled>Numbers</option>
                                <option disabled>Characters & Numbers</option>
                            </select>
                        </div>
                    </div>
                    <div class="wcfusion_col_lg_4">
                        <div class="wcfusion_form_group">
                            <label for="coupon_generator_coupon_length"
                                   class="mb20">Coupons Character Length</label>
                            <select name="coupon_generator_coupon_length" id="coupon_generator_coupon_length"
                                    class="wcfusion_select_control wcfusion_select2">
                                <option value=""> Please select</option>
                                <?php
                                $max_length = 20;
                                for ($i = 4; $i <= $max_length; $i++) {
                                    ?>
                                    <option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="single_modules_bottom_form">
                <div class="coupon_data_wrapper">
                    <div class="coupon_data_left_wrapper">
                        <div class="coupon_data_tabs">
                            <div class="tab_item tab_item_active" data-target="coupon_tab_general">
                                <h1> General </h1>
                            </div>
                            <div class="tab_item" data-target="coupon_tab_usage_restriction">
                                <h1>Usage Restriction</h1>
                            </div>
                            <div class="tab_item" data-target="coupon_tab_usage_limits">
                                <h1>Usage Limits</h1>
                            </div>
                        </div>
                    </div>

                    <div class="coupon_data_right_wrapper">
                        <div class="coupon_tap_body_wrapper">
                            <div class="coupon_tab_body" data-id="coupon_tab_general">
                                <div class="tab_body_title">
                                    <h1>General</h1>
                                </div>
                                <div class="tab_body_form" id="tab_body_form">
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_discount_type" style="margin-bottom: 20px;">Discount type</label>
                                        <select name="coupon_generator_discount_type" id="coupon_generator_discount_type"
                                                class="wcfusion_select_control wcfusion_select2">
                                            <option value=""> Please select</option>
                                            <option value="percent">Percentage discount</option>
                                            <option value="fixed_cart">Fixed cart discount</option>
                                            <option value="fixed_product">Fixed product discount</option>
                                        </select>
                                        <small>The kind of discount to apply for this discount.</small>
                                    </div>

                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_coupon_amount">Coupon amount</label>
                                        <input class="wcfusion_text_control" type="text" name="coupon_generator_coupon_amount"
                                               id="coupon_generator_coupon_amount" value=""
                                               placeholder="0">
                                        <small class="wcfusion_coupon_amount_notice d-block"></small>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_free_shipping">Allow free shipping</label>
                                        <div class="wcfusion_coupon_checkbox">
                                            <input type="checkbox" id="coupon_generator_free_shipping"
                                                   name="coupon_generator_free_shipping" value="yes">
                                            <span class="description">Check this box if the coupon grants free shipping. A <a
                                                        href="https://docs.woocommerce.com/document/free-shipping/"
                                                        target="_blank">free shipping method</a> must be enabled in your shipping zone and be set to require "a valid free shipping coupon" (see the "Free Shipping Requires" setting).</span>
                                        </div>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_expiry_date">Coupon expiry date</label>
                                        <input type="date" class="wcfusion_text_control"
                                               name="coupon_generator_expiry_date" id="coupon_generator_expiry_date"
                                               placeholder="YYYY-MM-DD" value=""
                                               min="1997-01-01">
                                    </div>
                                </div>
                            </div>
                            <div class="coupon_tab_body" data-id="coupon_tab_usage_restriction">
                                <div class="tab_body_title">
                                    <h1>Usage restriction</h1>
                                </div>
                                <div class="tab_body_form" id="tab_body_form">
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_minimum_amount">Minimum spend</label>
                                        <input class="wcfusion_text_control" type="text"
                                               name="coupon_generator_minimum_amount" id="coupon_generator_minimum_amount" value=""
                                               placeholder="No minimum">
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_maximum_amount">Maximum spend</label>
                                        <input class="wcfusion_text_control" type="text"
                                               name="coupon_generator_maximum_amount" id="coupon_generator_maximum_amount" value=""
                                               placeholder="No maximum">
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_individual_use">Individual use only</label>
                                        <div class="wcfusion_coupon_checkbox">
                                            <input type="checkbox" id="coupon_generator_individual_use"
                                                   name="coupon_generator_individual_use" value="yes">
                                            <span class="description">Check this box if the coupon cannot be used in conjunction with other coupons.</span>
                                        </div>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_exclude_sale_items">Exclude sale items</label>
                                        <div class="wcfusion_coupon_checkbox">
                                            <input type="checkbox" id="coupon_generator_exclude_sale_items"
                                                   name="coupon_generator_exclude_sale_items" value="yes">
                                            <span class="description">Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are items in the cart that are not on sale.</span>
                                        </div>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_product_ids">Products</label>
                                        <select name="coupon_generator_product_ids[]" id="coupon_generator_product_ids"
                                                class="wcfusion_select_control wcfusion_select2" multiple="multiple">
                                            <option value=""> Please select</option>
                                            <?php
                                            foreach ($this->utils->getWooProducts () as $product) {
                                                echo '<option value="' . esc_attr($product["id"]) . '">' . esc_attr($product["text"]) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_exclude_product_ids">Exclude products</label>
                                        <select name="coupon_generator_exclude_product_ids[]" id="coupon_generator_exclude_product_ids"
                                                class="wcfusion_select_control wcfusion_select2" multiple="multiple">
                                            <option value=""> Please select</option>
                                            <?php
                                            foreach ($this->utils->getWooProducts () as $product) {
                                                echo '<option value="' . esc_attr($product["id"]) . '">' . esc_attr($product["text"]) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_product_categories">Product categories</label>
                                        <select name="coupon_generator_product_categories[]" id="coupon_generator_product_categories"
                                                class="wcfusion_select_control wcfusion_select2" multiple="multiple">
                                            <option value=""> Please select</option>
                                            <?php
                                            foreach ($this->utils->getWooCategories () as $product) {
                                                echo '<option value="' . esc_attr($product["id"]) . '">' . esc_attr($product["text"]) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_exclude_product_categories">Exclude categories</label>
                                        <select name="coupon_generator_exclude_product_categories[]" id="coupon_generator_exclude_product_categories"
                                                class="wcfusion_select_control wcfusion_select2" multiple="multiple">
                                            <option value=""> Please select</option>
                                            <?php
                                            foreach ($this->utils->getWooCategories () as $product) {
                                                echo '<option value="' . esc_attr($product["id"]) . '">' . esc_attr($product["text"]) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_customer_email">Allowed emails</label>
                                        <input class="wcfusion_text_control" type="text" name="coupon_generator_customer_email"
                                               id="coupon_generator_customer_email" value=""
                                               placeholder="No restrictions">
                                    </div>
                                </div>
                            </div>
                            <div class="coupon_tab_body" data-id="coupon_tab_usage_limits">
                                <div class="tab_body_title">
                                    <h1>Usage limits</h1>
                                </div>
                                <div class="tab_body_form" id="tab_body_form">
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_usage_limit">Usage limit per coupon</label>
                                        <input class="wcfusion_text_control" type="number"
                                               name="coupon_generator_usage_limit" value=""
                                               id="coupon_generator_usage_limit"
                                               placeholder="0" step="1" min="0">
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_limit_usage_to_x_items">Limit usage to X items</label>
                                        <input class="wcfusion_text_control" type="number" value=""
                                               name="coupon_generator_limit_usage_to_x_items"
                                               id="coupon_generator_limit_usage_to_x_items"
                                               placeholder="0" step="1"
                                               min="0">
                                    </div>
                                    <div class="wcfusion_form_group">
                                        <label for="coupon_generator_usage_limit_per_user">Usage limit per user</label>
                                        <input class="wcfusion_text_control" type="number" value=""
                                               name="coupon_generator_usage_limit_per_user"
                                               id="coupon_generator_usage_limit_per_user"
                                               placeholder="0" step="1"
                                               min="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wcfusion_bottom_btn">
                    <button type="button" onclick="wcfusion_submit_coupon_generator();" class="wcfusion_save_btn coupon_generator_btn"
                            href="javascript:void(0);"> Generate Coupons </button>
                </div>
            </div>
        </div>
    </form>
    <div class="wcfusion_popup d_flex">
        <div class="wcfusion_popup_inar">
            <div class="generating_coupon">
                <p>Generating Coupons</p>
                <img src="<?php echo WCFUSION_MODULES_DIR . 'coupon_generator/assets/img/popup_spinner.svg' ?>" alt="">
            </div>
            <div class="successes_message">
                <p><span class="coupon_count"></span> Coupons Generated <br/>Successfully!</p>
                <button class="wcfusion_save_btn generate_coupon_export_csv">Export as CSV</button>
                <span class="dashicons dashicons-dismiss wcfusion_close_popup"></span>
            </div>

        </div>

    </div>
</div>