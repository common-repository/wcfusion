<?php
    if (is_product ()) {
        $products = wc_get_product ();
    } else {
        return;
    }

    // generate settings
    $psb_settings = array();
    $wcfusion_psb_settings = get_option ('wcfusion_psb_settings', true);
    $psb_settings = json_decode ($wcfusion_psb_settings);

    $wfpsb_show_on_desktop = 'yes';
    $wfpsb_show_on_mobile = 'yes';
    $wfpsb_product_review = 'yes';
    $wfpsb_product_review_count = 'yes';
    $wfpsb_disabled_products = [];
    $wfpsb_enable_qty_input = 'yes';
    $wfpsb_show_product_image = 'yes';
    $wfpsb_show_stock = 'yes';
    $wfpsb_hidebar_outofstock = 'no';
    $wfpsb_enable_variable_product = 'no';

    $product_title_color = '#3a3a3a';
    $product_rating_color = '#0170b9';
    $product_rating_count_color = '#3a3a3a';
    $product_price_color = '#ca0815';

    $wfpsb_product_price_font_size = '';

    $btn_bg_color = '#ca0815';
    $btn_font_color = '#fff';

    $wfpsb_btn_font_size = '';

    $btn_border_color = '#ca0815';
    $wfpsb_btn_border_width = '';
    $btn_bg_hover_color = '#fff';
    $btn_border_hover_color = '#000';
    $btn_font_hover_color = '#000';
    $btn_padding_left_right = '30px';
    $btn_padding_top_bottom = '0px';
    $wrapper_height = 100;
    $image_shape = 0;

if (!empty($psb_settings)) {
    if (isset($psb_settings->settings) && !empty($psb_settings->settings)) {
        $wfpsb_show_on_desktop = $psb_settings->settings->wfpsb_show_on_desktop;
        $wfpsb_show_on_mobile = $psb_settings->settings->wfpsb_show_on_mobile;
        $wfpsb_product_review = $psb_settings->settings->wfpsb_product_review;
        $wfpsb_product_review_count = $psb_settings->settings->wfpsb_product_review_count;
        $wfpsb_disabled_products = isset($this->settings->wfpsb_disabled_products) ? $this->settings->wfpsb_disabled_products : [];
        $wfpsb_enable_qty_input = $this->settings->wfpsb_enable_qty_input;
        $wfpsb_show_product_image = $this->settings->wfpsb_show_product_image;
        $wfpsb_show_stock = $this->settings->wfpsb_show_stock;
        $wfpsb_hidebar_outofstock = $this->settings->wfpsb_hidebar_outofstock;
        //$wfpsb_enable_variable_product = isset($this->settings->wfpsb_enable_variable_product) ? $this->settings->wfpsb_enable_variable_product : 'no';
    }
    // check style
    if (isset($psb_settings->styles) && !empty($psb_settings->styles)) {
        $wrapper_height = $psb_settings->styles->wfpbs_bar_height;
        $image_shape = $psb_settings->styles->wfpsb_product_image_shape;

        $product_price_font_size = $psb_settings->styles->wfpsb_product_price_font_size . 'px';
        $btn_font_size = $psb_settings->styles->wfpsb_btn_font_size . 'px';

        $btn_border_width = $psb_settings->styles->wfpsb_btn_border_width . 'px';

    }
}

// get product variations
$variations = $products->is_type ('variable') ? $products->get_available_variations () : [];

// check stock qty as user settings
if ($wfpsb_hidebar_outofstock == 'yes') {
    if ($products->get_stock_quantity () === 0 || !$products->is_in_stock ()) {
        return;
    }
}

?>

<style>
    :root {
        --product_title_color: <?php echo $product_title_color; ?>;
        --product_rating_color: <?php echo $product_rating_color; ?>;
        --product_rating_count_color: <?php echo $product_rating_count_color; ?>;
        --product_price_color: <?php echo $product_price_color; ?>;
        --product_price_font_size: <?php echo $product_price_font_size; ?>;
        --btn_bg_color: <?php echo $btn_bg_color; ?>;
        --btn_font_color: <?php echo $btn_font_color; ?>;
        --btn_font_size: <?php echo $btn_font_size; ?>;
        --btn_border_color: <?php echo $btn_border_color; ?>;
        --btn_border_width: <?php echo $btn_border_width; ?>;
        --btn_padding_left_right: <?php echo $btn_padding_left_right; ?>;
        --btn_padding_top_bottom: <?php echo $btn_padding_top_bottom; ?>;
        --btn_bg_hover_color =<?php echo $btn_bg_hover_color; ?>;
        --btn_bg_hover_color =<?php echo $btn_bg_hover_color; ?>;
        --btn_border_hover_color =<?php echo $btn_border_hover_color; ?>;
        --btn_font_hover_color =<?php echo $btn_font_hover_color; ?>;
    }

    h1.product_title {
        color: var(--product_title_color);
    }

    #wcfusion_psb_menu .woocommerce .star-rating {
        color: var(--product_rating_color);
    }

    #wcfusion_psb_menu .woocommerce .product_rating_count {
        color: var(--product_rating_count_color);
    }

    #wcfusion_psb_menu .wcfusion_psb_menu_right .price .product_price_code {
        color: var(--product_price_color);
        font-size: var(--product_price_font_size);
    }

    #wcfusion_psb_menu .wcfusion_psb_menu_right .wcfusion_psb_add_to_cart_btn {
        background: var(--btn_bg_color);
        color: var(--btn_font_color);
        padding-top: var(--btn_padding_top_bottom);
        padding-bottom: var(--btn_padding_top_bottom);
        padding-left: var(--btn_padding_left_right);
        padding-right: var(--btn_padding_left_right);
        font-size: var(--btn_font_size);
        border-color: var(--btn_border_color);
        border-width: var(--btn_border_width);
    }

    #wcfusion_psb_menu .wcfusion_psb_menu_right .wcfusion_psb_add_to_cart_btn:hover {
        background: var(--btn_bg_hover_color);
        border-color: var(--btn_border_hover_color);
        color: var(--btn_font_hover_color);
    }

    .wcfusion_psb_menu_left_inner .product_media img {
        border-radius: <?php echo ($image_shape == 'round') ? 50 . '%' : 0; ?>;
    }

</style>

<div style="height: <?php echo $wrapper_height . 'px'; ?>" id="wcfusion_psb_menu"
     class="<?php echo ($wfpsb_show_on_desktop == 'yes') ? 'wfpsb_desktop' : ''; ?> <?php echo ($wfpsb_show_on_mobile == 'yes') ? 'wfpsb_mobile' : ''; ?> wcfusion_psb_menu_<?php echo $this->wfpsb_show_in; ?>">
    <div class="wcfusion_psb_menu_container">
        <div class="wcfusion_psb_menu_row">
            <div class="wcfusion_psb_menu_left">
                <div class="wcfusion_psb_menu_left_inner">
                    <?php
                    if (($wfpsb_show_product_image == 'yes')) { ?>
                        <div class="product_media">
                            <?php
                            $image_id = $products->get_image_id ();
                            echo wp_get_attachment_image ($image_id, array(100, 100));
                            ?>
                        </div>
                    <?php }
                    ?>

                    <div class="product_content">
                        <h1 class="product_title"><?php echo $products->get_title (); ?></h1>
                        <div class="product_rating">
                            <?php echo ($wfpsb_product_review == 'yes') ? wc_get_rating_html ($products->get_average_rating ()) : ''; ?>
                            <span class="product_rating_count"><?php echo ($wfpsb_product_review_count == 'yes') ? $products->get_rating_count () : ''; ?></span>
                        </div>

                        <?php
                        if ($wfpsb_show_stock == 'yes') { ?>
                            <div class="wfpsb_stock_area">
                                    <span class="wfpsb_stock_status">
                                        <?php
                                        $stock = "";
                                        if (!$products->managing_stock () && !$products->is_in_stock ()) {
                                            $stock = 'Out of stock';
                                        } elseif ($products->managing_stock () == true) {
                                            $stock = $products->get_stock_quantity () . ' in stock';
                                        }
                                        echo $stock;
                                        ?>
                                    </span>
                            </div>
                        <?php }
                        ?>

                    </div>
                </div>
            </div>

            <div class="wcfusion_psb_menu_right">
                <div class="price">
                    <span class="product_price_code">
                        <?php echo $products->get_price_html (); ?>
                    </span>
                </div>

                <?php
                if ($wfpsb_enable_qty_input == 'yes') { ?>
                    <div class="wfpsb_qty_area">
                        <input type="number" name="wfpsb_quantity" id="wfpsb_quantity" class="wfpsb_qty_input" value="1"
                               placeholder="0"/>
                    </div>
                <?php }
                ?>

                <?php
                if (!empty($variations) && $wfpsb_enable_variable_product == 'yes') {
                    ?>

                    <div class="wcfusion_psb_variations">
                        <select id="wfpsb_pa_size" class="wcfusion_psb_variation" name="wfpsb_attribute_pa_size">
                            <option value="">Choose an option</option>
                            <?php
                            $i = 0;
                            foreach ($variations as $key => $value) {
                                $variation_id = $value['variation_id'];
                                foreach ($value['attributes'] as $attr_key => $attr_value) { ?>
                                    <option data-variation_id="<?php echo $variation_id; ?>" <?php echo ($i == 0) ? 'selected' : ''; ?>
                                            value="<?php echo $attr_value; ?>"><?php echo ucfirst ($attr_value); ?></option>
                                <?php }
                                $i++;
                            }
                            ?>
                        </select>
                    </div>
                <?php } ?>

                <div class="wfpsb_add_cart_btn">
                    <?php
                    if (!empty($variations) && $wfpsb_enable_variable_product == 'yes') { ?>

                        <a
                                href="<?php echo $products->add_to_cart_url (); ?>"
                                value="<?php echo $products->get_id (); ?>"
                                data-product_id="<?php echo $products->get_id (); ?>"
                                data-product_sku="<?php echo $products->get_sku (); ?>"
                                class="ajax_add_to_cart wfpsb_addtocart_variation product_type_variation add_to_cart_button wcfusion_psb_add_to_cart_btn variation">Add
                            To Cart</a>

                    <?php } else { ?>
                        <a
                                href="<?php echo $products->add_to_cart_url (); ?>"
                                value="<?php echo $products->get_id (); ?>"
                                data-product_id="<?php echo $products->get_id (); ?>"
                                data-product_sku="<?php echo $products->get_sku (); ?>"
                                class="ajax_add_to_cart add_to_cart_button wcfusion_psb_add_to_cart_btn">Add To
                            Cart</a>
                    <?php } ?>
                </div>


            </div>
        </div>
    </div>
</div>
