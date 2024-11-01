/**floating cart frontend master script**/
"use strict";

var $ = jQuery;

var $woofusionFcf = {

    fcfajaxurl              : wcfusion_fc_fronted_object.ajaxurl,
    fcfsecurity             : wcfusion_fc_fronted_object.security,
    wcfusion_fcsd          : JSON.parse(wcfusion_fc_fronted_object.wcfusion_fc_settings),
    wofusion_fc_init        : "#wcfusion_floating_cart_init",
    wofusion_fc_selector    : "#wcfusion-fct",
    wofusion_fcb_selector   : "#wcfusion-fct-body",
    wofusion_fchh_btn       : ".fct-right-header",
    pqty_increment_btn      : ".wcfusion-fct-increment-pqty",
    pqty_decrement_btn      : ".wcfusion-fct-decrement-pqty",
    single_add_to_cart      : "button.single_add_to_cart_button",
    remove_cart_item        : ".wcfusion-fct-remove-item",
    wf_fc_add_cart          : "a.wcfusion_added_to_cart",
    wf_fc_single_add_cart   : "button.single_add_to_cart_button",
    wf_empty_cart_content   : ".wffc-empty-cart-content",
    wffc_apply_coupon_btn   : "button.wffc-apply-coupon-btn",

    init_wffc: function(){

        jQuery(document).ready(function($) {

            if($woofusionFcf.wcfusion_fcsd.length <= 0){
                $($woofusionFcf.wf_empty_cart_content).show();
            }else{
                $($woofusionFcf.wf_empty_cart_content).hide();
            }

            var $cartCount = $('.wffc_cart_contents_count').text();
            $woofusionFcf.wffc_handel_basket($cartCount);

            // init floating cart content
            $woofusionFcf.init_wffc_content($woofusionFcf.wofusion_fc_init);

            $woofusionFcf.setBodyClass($woofusionFcf.wofusion_fc_selector);

            $($woofusionFcf.wofusion_fc_selector).click(function(){
                $woofusionFcf.toggle_wcfusion_floating_cart('show');
            });

            // check ajax add to cart trigger
            var $triggerEl = $($woofusionFcf.wf_fc_add_cart);
            if( $triggerEl.length > 0 ){
                $($triggerEl).click(function(){
                    setTimeout(function () {
                        $woofusionFcf.init_wffc_content($woofusionFcf.wofusion_fc_init);
                    },300);
                });

            }
            var $triggerSEl = $($woofusionFcf.wf_fc_single_add_cart);
            if( $triggerSEl.length > 0 ){
                $($triggerSEl).click(function(){
                    setTimeout(function () {
                        $woofusionFcf.init_wffc_content($woofusionFcf.wf_fc_single_add_cart);
                    },300);
                });

            }

        });

    },

    init_wffc_content: function ($el) {
        var $wffcfWrapper = $($el);

        if ($wffcfWrapper.length > 0) {

            let $post_data = {
                'action': 'wcfusion_init_floating_cart_content', 'security': $woofusionFcf.fcfsecurity, 'data': {}
            };

            $.ajax({
                url: $woofusionFcf.fcfajaxurl,
                type: "POST",
                data: $post_data,
                success: function (response) {
                    var $data = JSON.parse(response);

                    if ($data.status == 'true' && $data.res_data !== '') {
                        $($el).html($data.res_data);
                        $('.wffc_cart_contents_count').text($data.cart_contents_count);
                        $woofusionFcf.wffc_handel_basket($data.cart_contents_count);
                        if( $data.cart_contents_count <= 0 ){
                            $('.wffc-empty-cart-content').fadeIn('slow');
                            $('.wcfusion-fct-items-and-footer').addClass('fct-cart-empty');
                        }
                    } else {
                        console.log('Opps: something is wrong!');
                    }

                    // trigger fc hide
                    $($woofusionFcf.wofusion_fchh_btn).click(function () {
                        $woofusionFcf.toggle_wcfusion_floating_cart();
                    });

                    // trigger increment/decrement
                    $woofusionFcf.increment_wffc_item($woofusionFcf.pqty_increment_btn);
                    $woofusionFcf.decrement_wffc_item($woofusionFcf.pqty_decrement_btn);

                    // trigger remove cart item
                    $woofusionFcf.trigger_wffc_remove_cart_item($woofusionFcf.remove_cart_item);

                    // trigger auto open cart
                    $woofusionFcf.trigger_wffc_auto_open();
                }

            });

        }

        // trigger fc hide
        $($woofusionFcf.wofusion_fchh_btn).click(function () {
            $woofusionFcf.toggle_wcfusion_floating_cart();
        });

    },

    setBodyClass: function( $el ){
        var $elWrap =  $($el);
        if( $elWrap.length <= 0 ){
            jQuery( 'body' ).removeClass( 'wcfusion-fct-main' );
        }else{
            jQuery( 'body' ).addClass( 'wcfusion-fct-main' );
        }
    },

    // define toggle fct by type
    toggle_wcfusion_floating_cart : function () {
        jQuery($woofusionFcf.wofusion_fcb_selector).toggleClass("fct-show");
        var $cartCount = $('.wffc_cart_contents_count').text();
        $woofusionFcf.wffc_handel_basket($cartCount);
    },

    toggle_wcfusion_floating_cart_backup : function ($type) {
        if( $type == 'show' ){
            jQuery($woofusionFcf.wofusion_fcb_selector).removeClass("fct-hide");
            jQuery($woofusionFcf.wofusion_fcb_selector).addClass("fct-show");
        }else{
            jQuery($woofusionFcf.wofusion_fcb_selector).removeClass("fct-show");
            jQuery($woofusionFcf.wofusion_fcb_selector).addClass("fct-hide");
        }
        var $cartCount = $('.wffc_cart_contents_count').text();
        $woofusionFcf.wffc_handel_basket($cartCount);
    },

    // define increment wfc item
    increment_wffc_item : function ($el) {
        let $pqty_btn = $($el);

        if ($pqty_btn.length > 0) {

            $($pqty_btn).on( 'click', function () {

                $('.wcfusion-fct-items-and-footer').fadeOut('slow');
                $('.wcfusion-fct-loader').fadeIn('slow');

                let $this = $(this);
                let $product_id = $this.attr('data-product_id');
                let $cart_item_key = $this.attr('data-cart_item_key');
                let $exiting_pqty = $('.wcfusion-fct-pqty-' + $product_id).val();

                let $pqty = parseInt($exiting_pqty) + parseInt(1);
                $('.wcfusion-fct-pqty-' + $product_id).val($pqty);

                let $post_data = {
                    'action': 'wcfusion_floating_cart_update',
                    'security': $woofusionFcf.fcfsecurity,
                    'data': {
                        'product_id': $product_id,
                        'product_qty': $pqty,
                        'cart_item_key': $cart_item_key,
                    }
                };

                $.ajax({
                    url: $woofusionFcf.fcfajaxurl,
                    type: "POST",
                    data: $post_data,
                    success: function (response) {
                        var $data = JSON.parse(response);

                        if ($data.status == 'true' && $data.res_data !== '') {
                            $('.wcfusion-fct-pqty-' + $product_id).val($data.res_data.new_qty);
                            $('.wcfusion-fct-psubtotal-' + $product_id).html($data.res_data.product_subtotal);
                            $('.wcfusion-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                            $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                            $('.wcfusion-fct-carttotal').html($data.res_data.cart_total);
                            $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                            setTimeout(function () {
                                $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                                $('.wcfusion-fct-loader').fadeOut('slow');
                            }, 300);

                            if ( $woofusionFcf.wcfusion_fcsd.hasOwnProperty('wffc_show_header_notification') && $woofusionFcf.wcfusion_fcsd.wffc_show_header_notification == 'yes' ){
                                setTimeout(function () {
                                    if ($data.res_data.notice_type == 'success') {
                                        $('.wcfusion-fct-notice').text($data.res_data.notice);
                                        $('.wcfusion-fct-notice').addClass('wcfusion-fct-success');
                                        $('.wcfusion-fct-notice').fadeIn('slow');
                                    } else {
                                        $('.wcfusion-fct-notice').text($data.res_data.notice);
                                        $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                                        $('.wcfusion-fct-notice').fadeIn('slow');
                                    }
                                }, 500);
                            }

                        } else {
                            $('.wcfusion-fct-pqty-' + $product_id).val($exiting_pqty);

                            setTimeout(function () {
                                $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                                $('.wcfusion-fct-loader').fadeOut('slow');
                            }, 300);

                            setTimeout(function () {
                                $('.wcfusion-fct-notice').text('Opps: something is wrong!');
                                $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                                $('.wcfusion-fct-notice').fadeIn('slow');
                            }, 2000);

                        }
                    }

                });

                var $wffc_notifi_duractions  = parseInt($woofusionFcf.wcfusion_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wcfusion-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

            });

        }

    },

    // define decrement wfc item
    decrement_wffc_item : function ($el) {

        let $pqty_btn = $($el);

        if( $pqty_btn.length > 0 ){

            $($pqty_btn).on( 'click', function () {

                $('.wcfusion-fct-items-and-footer').fadeOut('slow');
                $('.wcfusion-fct-loader').fadeIn('slow');

                let $this = $(this);
                let $product_id = $this.attr('data-product_id');
                let $cart_item_key = $this.attr('data-cart_item_key');
                let $exiting_pqty = $('.wcfusion-fct-pqty-' + $product_id).val();

                let $pqty = parseInt($exiting_pqty) - parseInt(1);
                $('.wcfusion-fct-pqty-' + $product_id).val($pqty);

                let $post_data = {
                    'action': 'wcfusion_floating_cart_update', 'security': $woofusionFcf.fcfsecurity, 'data': {
                        'product_id': $product_id,
                        'product_qty': $pqty,
                        'cart_item_key': $cart_item_key,
                    }
                };

                $.ajax({
                    url: $woofusionFcf.fcfajaxurl,
                    type: "POST",
                    data: $post_data,
                    success: function (response) {
                        var $data = JSON.parse(response);

                        if ($data.status == 'true' && $data.res_data !== '') {
                            if ($data.res_data.new_qty <= 0) {
                                $('.wcfusion-fct-item-' + $product_id).fadeOut('slow');
                            }

                            if( $data.res_data.cart_contents_count <= 0 ){
                                $('.wffc-empty-cart-content').fadeIn('slow');
                                $('.wcfusion-fct-items-and-footer').addClass('fct-cart-empty');
                                $('.wcfusion-fct-shippingtotal').text('0.00$');
                            }

                            $('.wcfusion-fct-pqty-' + $product_id).val($data.res_data.new_qty);
                            $('.wcfusion-fct-psubtotal-' + $product_id).html($data.res_data.product_subtotal);
                            $('.wcfusion-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                            $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                            $('.wcfusion-fct-carttotal').html($data.res_data.cart_total);
                            $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                            setTimeout(function () {
                                $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                                $('.wcfusion-fct-loader').fadeOut('slow');
                            }, 300);

                            if ( $woofusionFcf.wcfusion_fcsd.hasOwnProperty('wffc_show_header_notification') && $woofusionFcf.wcfusion_fcsd.wffc_show_header_notification == 'yes' ) {
                                setTimeout(function () {
                                    if ($data.res_data.notice_type == 'success') {
                                        $('.wcfusion-fct-notice').text($data.res_data.notice);
                                        $('.wcfusion-fct-notice').addClass('wcfusion-fct-success');
                                        $('.wcfusion-fct-notice').fadeIn('slow');
                                    } else {
                                        $('.wcfusion-fct-notice').text($data.res_data.notice);
                                        $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                                        $('.wcfusion-fct-notice').fadeIn('slow');
                                    }
                                }, 500);
                            }

                        } else {
                            $('.wcfusion-fct-pqty-' + $product_id).val($exiting_pqty);

                            setTimeout(function () {
                                $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                                $('.wcfusion-fct-loader').fadeOut('slow');
                            }, 300);

                            setTimeout(function () {
                                $('.wcfusion-fct-notice').text('Opps: something is wrong!');
                                $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                                $('.wcfusion-fct-notice').fadeIn('slow');
                            }, 2000);

                        }
                    }

                });

                var $wffc_notifi_duractions  = parseInt($woofusionFcf.wcfusion_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wcfusion-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

            });
        }
    },

    // define auto open cart
    trigger_wffc_auto_open : function () {
        var $wcfusion_fcsd = $woofusionFcf.wcfusion_fcsd;
        setTimeout(function () {
            if($wcfusion_fcsd && $wcfusion_fcsd.hasOwnProperty('wffc_auto_open_cart') && $wcfusion_fcsd.wffc_auto_open_cart == 'yes'){
                $($woofusionFcf.wofusion_fcb_selector).removeClass('fct-hide');
                $($woofusionFcf.wofusion_fcb_selector).addClass('fct-show');
            }
        },1000);

    },

    // define remove item on cart
    trigger_wffc_remove_cart_item : function ($el) {
        let $remove_btn = $($el);

        if( $remove_btn.length > 0 ){

            $($remove_btn).on( 'click', function () {

                $('.wcfusion-fct-items-and-footer').fadeOut('slow');
                $('.wcfusion-fct-loader').fadeIn('slow');

                let $this = $(this);
                let $product_id = $this.attr('data-product_id');
                let $cart_item_key = $this.attr('data-cart_item_key');
                let $exiting_pqty = $('.wcfusion-fct-pqty-' + $product_id).val();

                let $post_data = {
                    'action': 'wcfusion_floating_cart_update', 'security': $woofusionFcf.fcfsecurity, 'data': {
                        'product_id': $product_id,
                        'product_qty': 0,
                        'cart_item_key': $cart_item_key,
                    }
                };

                $.ajax({
                    url: $woofusionFcf.fcfajaxurl,
                    type: "POST",
                    data: $post_data,
                    success: function (response) {
                        var $data = JSON.parse(response);

                        if ($data.status == 'true' && $data.res_data !== '') {

                            if ($data.res_data.new_qty <= 0) {
                                $('.wcfusion-fct-item-' + $product_id).fadeOut('slow');
                            }

                            if( $data.res_data.cart_contents_count <= 0 ){
                                $('.wffc-empty-cart-content').fadeIn('slow');
                                $('.wcfusion-fct-items-and-footer').addClass('fct-cart-empty');
                                $('.wcfusion-fct-shippingtotal').text('0.00$');
                            }

                            $('.wcfusion-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                            $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                            $('.wcfusion-fct-carttotal').html($data.res_data.cart_total);
                            $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                            setTimeout(function () {
                                $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                                $('.wcfusion-fct-loader').fadeOut('slow');
                            }, 300);

                            if ( $woofusionFcf.wcfusion_fcsd.hasOwnProperty('wffc_show_header_notification') && $woofusionFcf.wcfusion_fcsd.wffc_show_header_notification == 'yes' ) {
                                setTimeout(function () {
                                    if ($data.res_data.notice_type == 'success') {
                                        $('.wcfusion-fct-notice').text($data.res_data.notice);
                                        $('.wcfusion-fct-notice').addClass('wcfusion-fct-success');
                                        $('.wcfusion-fct-notice').fadeIn('slow');
                                    } else {
                                        $('.wcfusion-fct-notice').text($data.res_data.notice);
                                        $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                                        $('.wcfusion-fct-notice').fadeIn('slow');
                                    }
                                }, 500);
                            }

                        } else {
                            $('.wcfusion-fct-pqty-' + $product_id).val($exiting_pqty);

                            setTimeout(function () {
                                $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                                $('.wcfusion-fct-loader').fadeOut('slow');
                            }, 300);

                            setTimeout(function () {
                                $('.wcfusion-fct-notice').text('Opps: something is wrong!');
                                $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                                $('.wcfusion-fct-notice').fadeIn('slow');
                            }, 2000);

                        }
                    }

                });

                var $wffc_notifi_duractions  = parseInt($woofusionFcf.wcfusion_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wcfusion-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

            });
        }
    },

    // trigger apply coupon
    wcfusion_trigger_apply_coupon : function($el){
        $('button.wffc-apply-coupon-btn').on('click', function () {
            console.log('apply coupon clicked');
        });
    },

    wffc_handel_basket:function ($cartCount) {
        var $wffcbs_enable = $woofusionFcf.wcfusion_fcsd.hasOwnProperty('wcfusion_fcbs_enable') ? $woofusionFcf.wcfusion_fcsd.wcfusion_fcbs_enable : 'show_always';

        if( $wffcbs_enable == 'hide_always' ){
            $('#wcfusion-fct').hide();
        }else if($wffcbs_enable == 'show_always'){
            $('#wcfusion-fct').show();
        }else if($wffcbs_enable == 'hide_empty_cart'){
            if($cartCount > 0){
                $('#wcfusion-fct').show();
            }else{
                $('#wcfusion-fct').hide();
            }
        }else{
            $('#wcfusion-fct').show();
        }
    },

};


//load js for frontend
$woofusionFcf.init_wffc();

function wcfusion_qty_update(el) {
    $('.wcfusion-fct-items-and-footer').fadeOut('slow');
    $('.wcfusion-fct-loader').fadeIn('slow');

    let $this = $(el);
    let $product_id = $this.attr('data-product_id');
    let $cart_item_key = $this.attr('data-cart_item_key');
    let $pqty = $('.wcfusion-fct-pqty-' + $product_id).val();

    let $post_data = {
        'action': 'wcfusion_floating_cart_update', 'security': $woofusionFcf.fcfsecurity, 'data': {
            'product_id': $product_id,
            'product_qty': $pqty,
            'cart_item_key': $cart_item_key,
        }
    };

    $.ajax({
        url: $woofusionFcf.fcfajaxurl,
        type: "POST",
        data: $post_data,
        success: function (response) {
            var $data = JSON.parse(response);

            if ($data.status == 'true' && $data.res_data !== '') {

                $('.wcfusion-fct-pqty-' + $product_id).val($data.res_data.new_qty);
                $('.wcfusion-fct-psubtotal-' + $product_id).html($data.res_data.product_subtotal);
                $('.wcfusion-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                $('.wcfusion-fct-carttotal').html($data.res_data.cart_total);
                $('.wofusion-fci-total').text($data.res_data.cart_contents_count);

                setTimeout(function () {
                    $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                    $('.wcfusion-fct-loader').fadeOut('slow');
                }, 300);

                if ( $woofusionFcf.wcfusion_fcsd.hasOwnProperty('wffc_show_header_notification') && $woofusionFcf.wcfusion_fcsd.wffc_show_header_notification == 'yes' ){
                    setTimeout(function () {
                        if ($data.res_data.notice_type == 'success') {
                            $('.wcfusion-fct-notice').text($data.res_data.notice);
                            $('.wcfusion-fct-notice').addClass('wcfusion-fct-success');
                            $('.wcfusion-fct-notice').fadeIn('slow');
                        } else {
                            $('.wcfusion-fct-notice').text($data.res_data.notice);
                            $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                            $('.wcfusion-fct-notice').fadeIn('slow');
                        }
                    }, 500);
                }

            } else {
                $('.wcfusion-fct-pqty-' + $product_id).val($exiting_pqty);

                setTimeout(function () {
                    $('.wcfusion-fct-items-and-footer').fadeIn('slow');
                    $('.wcfusion-fct-loader').fadeOut('slow');
                }, 300);

                setTimeout(function () {
                    $('.wcfusion-fct-notice').text('Opps: something is wrong!');
                    $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                    $('.wcfusion-fct-notice').fadeIn('slow');
                }, 2000);

            }
        }

    });

    var $wffc_notifi_duractions  = parseInt($woofusionFcf.wcfusion_fcsd.wffc_notification_duractions);
    setTimeout(function () {
        $('.wcfusion-fct-notice').fadeOut('slow');
    }, $wffc_notifi_duractions);
}

/**
 * apply coupon on cart */
function wffc_trigger_apply_coupon() {

    var $coupon_code = $('#wffc_coupon_code').val();

    $('.wffc-appply-coupon-loader').show('slow');
    $('.wffc-apply-coupon-btn').addClass('disabled');

    if( !$coupon_code ){
        $('#wffc_coupon_code').css('border-color', 'red');
        return false;
    }

    let $post_data = {
        'action': 'wcfusion_floating_cart_apply_coupon', 'security': $woofusionFcf.fcfsecurity, 'data': {
            'coupon_code': $coupon_code,
        }
    };

    var $wffc_notifi_duractions  = parseInt($woofusionFcf.wcfusion_fcsd.wffc_notification_duractions);

    $.ajax({
        url: $woofusionFcf.fcfajaxurl,
        type: "POST",
        data: $post_data,
        success: function (response) {
            var $data = JSON.parse(response);

            if ($data.status == 'true' && $data.res_data !== '') {

                $('.wffc-applied-coupons').text($data.res_data.applied_coupons);
                $('.wcfusion-fct-cartsubtotal').html($data.res_data.cart_subtotal);
                $('.wffc-coupon-discount-total').html($data.res_data.coupon_discount_total);
                $('.wcfusion-fct-carttotal').html($data.res_data.cart_total);

                setTimeout(function () {
                    $('.wffc-appply-coupon-loader').hide('slow');
                    $('.wffc-apply-coupon-btn').removeClass('disabled');
                }, 1000);

                if ( $woofusionFcf.wcfusion_fcsd.hasOwnProperty('wffc_show_header_notification') && $woofusionFcf.wcfusion_fcsd.wffc_show_header_notification == 'yes' ){
                    setTimeout(function () {
                        if ($data.res_data.notice_type == 'success') {
                            $('.wcfusion-fct-notice').text($data.res_data.notice);
                            $('.wcfusion-fct-notice').addClass('wcfusion-fct-success');
                            $('.wcfusion-fct-notice').fadeIn('slow');
                        } else {
                            $('.wcfusion-fct-notice').text($data.res_data.notice);
                            $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                            $('.wcfusion-fct-notice').fadeIn('slow');
                        }
                    }, 500);
                }

            } else {
                setTimeout(function () {
                    $('.wcfusion-fct-notice').text('Opps: something is wrong!');
                    $('.wcfusion-fct-notice').addClass('wcfusion-fct-error');
                    $('.wcfusion-fct-notice').fadeIn('slow');
                }, 1000);

                var $wffc_notifi_duractions  = parseInt($woofusionFcf.wcfusion_fcsd.wffc_notification_duractions);
                setTimeout(function () {
                    $('.wcfusion-fct-notice').fadeOut('slow');
                }, $wffc_notifi_duractions);

                $('.wffc-appply-coupon-loader').hide('slow');
                $('.wffc-apply-coupon-btn').removeClass('disabled');

            }
        }

    });

    setTimeout(function () {
        $('.wcfusion-fct-notice').fadeOut('slow');
    }, $wffc_notifi_duractions);

}