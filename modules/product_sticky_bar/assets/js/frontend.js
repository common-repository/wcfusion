/** product sticky bar main js */
'use strict';

var $ = jQuery;

var $wfPsbFrontend = {

    wfpsb_show_only_scroll  : 'yes',
    wfpbs_scroll_pixels     : 180,
    wfpsb_fronted_settings  : JSON.parse(wcfusion_psb_jsfrontend.wfpsb_fronted_settings),
    wfpsb_security          : wcfusion_psb_jsfrontend.security,
    psb_ajaxurl             : wcfusion_psb_jsfrontend.ajaxurl,
    wfpsb_add_to_cart_btn   : '.wcfusion_psb_add_to_cart_btn',

    init_wfpsb_frontend: function(){

        jQuery(document).ready(function($) {

            var $wfpsb_fronted_settings_length = Object.keys($wfPsbFrontend.wfpsb_fronted_settings).length;

            if ($wfpsb_fronted_settings_length > 0) {
                var $wfpsb_show_only_scroll = $wfPsbFrontend.wfpsb_fronted_settings.wfpsb_show_only_scroll;
                var $wfpbs_scroll_pixels = $wfPsbFrontend.wfpsb_fronted_settings.wfpbs_scroll_pixels;
            }

            // check scroll only
            if ($wfpsb_show_only_scroll == 'yes') {

                $(window).scroll(function () {

                    var scroll = $(window).scrollTop();

                    // for top scroll
                    if (scroll >= $wfpbs_scroll_pixels) {
                        $(".wcfusion_psb_menu_before").addClass("active");
                    }
                    if (scroll <= $wfpbs_scroll_pixels) {
                        $(".wcfusion_psb_menu_before").removeClass("active");
                    }

                    // for footer scroll
                    if (scroll >= $wfpbs_scroll_pixels) {
                        $(".wcfusion_psb_menu_after").addClass("active");
                    }
                    if (scroll <= $wfpbs_scroll_pixels) {
                        $(".wcfusion_psb_menu_after").removeClass("active");
                    }

                });

            } else {
                $(".wcfusion_psb_menu_after").addClass("active");
            }


            // add style class in body
            $('body').addClass('wcfusion-sticky-bar');


            // set default variation & qty
            $wfPsbFrontend.trigger_set_wfpsb_attr();

            // set variation
            $('.wcfusion_psb_variation').on('change', function () {
                var $variationID = $(".wcfusion_psb_variation option:selected").attr('data-variation_id');
                var $variation = $(this).val();

                $('.wfpsb_addtocart_variation').attr( "data-variation", "pa_option=" + $variation );
                $('.wfpsb_addtocart_variation').attr( "data-variation_id", $variationID );
            });

            // set qty
            $('.wfpsb_qty_input').on('change', function () {
                var $wfpsb_qty = $(this).val();
                $('.wcfusion_psb_add_to_cart_btn').attr("data-quantity", $wfpsb_qty);
                $('.wcfusion_psb_variation').attr("data-quantity", $wfpsb_qty);
            });

            // trigger add to cart
            //$wfPsbFrontend.wofusion_psb_add_to_cart($wfPsbFrontend.wfpsb_add_to_cart_btn);

        });

    },

    trigger_set_wfpsb_attr: function () {
        var $wfpsb_qty = $('.wfpsb_qty_input').val();
        var $variationID = $(".wcfusion_psb_variation option:selected").attr('data-variation_id');
        var $variation = $('.wcfusion_psb_variation').val();
        $('.wfpsb_addtocart_variation').attr( "data-variation_id", $variationID );
        $('.wfpsb_addtocart_variation').attr( "data-variation", "pa_option=" + $variation );

        $('.wcfusion_psb_add_to_cart_btn').attr("data-quantity", $wfpsb_qty);
    },

    wofusion_psb_add_to_cart : function ($el) {
        var $BtnLength = $($el).length;

        if( $BtnLength > 0 ){

            $($el).on('click', function (e) {

                e.preventDefault();

                $($el).text('Processing..');

                var $thisbutton = $(this),
                    id              = $thisbutton.attr('data-product_id'),
                    product_qty     = $('input[name=wfpsb_quantity]').val() || 1,
                    product_id      = $thisbutton.attr('data-product_id') || id,
                    variation_id    = $($thisbutton).attr('data-variation_id') || 0,
                    product_sku_id  = $($thisbutton).attr('data-product_sku') || '';


                let $post_data = {
                    'action'        : 'wcfusion_psb_add_to_cart',
                    'security'      : $wfPsbFrontend.wfpsb_security,
                    'product_id'    : product_id,
                    'product_sku'   : product_sku_id,
                    'quantity'      : product_qty,
                    'variation_id'  : variation_id,
                };

                $(document.body).trigger('adding_to_cart', [$thisbutton, $post_data]);

                $.ajax({
                    type: 'post',
                    url: $wfPsbFrontend.psb_ajaxurl,
                    data: $post_data,

                    success: function (response) {

                        if (response.error && response.product_url) {
                            window.location = response.product_url;
                            return;
                        } else {
                            $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                        }

                        setTimeout(function(){
                            $($thisbutton).text('ADD TO CART');
                        },300);

                    },
                });

                return false;
            });

        }else{
            //console.log('Opps: PSB - Add to cart btn selector is missing!!');
        }
    }

};

//load js for backend
$wfPsbFrontend.init_wfpsb_frontend();