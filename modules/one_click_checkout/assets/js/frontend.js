/** pdf invoice & packing slips frontend scripts **/
'use strict';
var $ = jQuery;

const wfocc_settings = JSON.parse(wcfusion_occ_frontend_object.wcfusion_occ_settings);
const wfocc_bnb_on_product = wfocc_settings.hasOwnProperty('wfocc_enable_buy_now_button_on_product') ? 'yes' : 'no';
var wfocc_enable_change_btn_text = wfocc_settings.hasOwnProperty('wfocc_change_add_to_cart_button_text') ? 'yes' : 'no';

if( 'yes' == wfocc_enable_change_btn_text ){
    var wfocc_cart_button_text = wfocc_settings.hasOwnProperty('wfocc_cart_button_text') ? wfocc_settings.wfocc_cart_button_text : 'Add to Cart';
}else{
    var wfocc_cart_button_text = 'Add to Cart';
}


$(document).ready(function () {
   
    var redirect_url = $('.wfocc_single_product_buy_now').attr('data-redirect');

    //Change buy now base on variation
    if ('yes' == wfocc_bnb_on_product) {
        jQuery("body").on('change', "input[name='variation_id']", function () {
            var $variation_id = $("input[name='variation_id']").val();


            if ($variation_id > 0) {
                $('.wfocc_single_product_buy_now').removeClass('wfocc_variation_btn_disabled ');
                $('.wfocc_single_product_buy_now').prop('disabled', false);
                $('.wfocc_single_product_buy_now').attr('href', redirect_url);
            } else {
                $('.wfocc_single_product_buy_now').addClass('wfocc_variation_btn_disabled ');
                $('.wfocc_single_product_buy_now').prop('disabled', true);
                $('.wfocc_single_product_buy_now').attr('href', "javascript:void(0)");
            }

        });
    }


});



