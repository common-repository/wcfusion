'use strict';

function wcfusion_product_sticky_bar_init(){
    $('#wcfusion_product_sticky_bar_header').show();
    $('#wcfusion_product_sticky_bar_container').show();
};

/*-- for submit product sticky bar settings --*/
function wcfusion_submit_product_sticky_bar() {
    $('.psb_settings_btn').text('Please Wait..');
    $('.psb_settings_btn').addClass('psb_submit_btn_disabled');
    $('.psb_settings_btn').prop('disabled', true);
    let $postData = {
        'settings' :{
            'wfpsb_is_enable': ($("input[name='wfpsb_is_enable']:checked").val()) ? $("input[name='wfpsb_is_enable']:checked").val() : 'no',
            'wfpsb_show_on_desktop': ($("input[name='wfpsb_show_on_desktop']:checked").val()) ? $("input[name='wfpsb_show_on_desktop']:checked").val() : 'no',
            'wfpsb_show_on_mobile': ($("input[name='wfpsb_show_on_mobile']:checked").val()) ? $("input[name='wfpsb_show_on_mobile']:checked").val() : 'no',
            'wfpsb_show_in': ($("#wfpsb_show_in").val()) ? $("#wfpsb_show_in").val() : 'after',
            'wfpsb_show_only_scroll': ($("input[name='wfpsb_show_only_scroll']:checked").val()) ? $("input[name='wfpsb_show_only_scroll']:checked").val() : 'no',
            'wfpbs_scroll_pixels': ($("#wfpbs_scroll_pixels").val()) ? $("#wfpbs_scroll_pixels").val() : '180',
            'wfpsb_product_review': ($("input[name='wfpsb_product_review']:checked").val()) ? $("input[name='wfpsb_product_review']:checked").val() : 'no',
            'wfpsb_product_review_count': ($("input[name='wfpsb_product_review_count']:checked").val()) ? $("input[name='wfpsb_product_review_count']:checked").val() : 'no',
            'wfpsb_enable_variable_product': ($("input[name='wfpsb_enable_variable_product']:checked").val()) ? $("input[name='wfpsb_enable_variable_product']:checked").val() : 'no',
            'wfpsb_enable_qty_input': ($("input[name='wfpsb_enable_qty_input']:checked").val()) ? $("input[name='wfpsb_enable_qty_input']:checked").val() : 'no',
            'wfpsb_show_product_image': ($("input[name='wfpsb_show_product_image']:checked").val()) ? $("input[name='wfpsb_show_product_image']:checked").val() : 'no',
            'wfpsb_show_stock': ($("input[name='wfpsb_show_stock']:checked").val()) ? $("input[name='wfpsb_show_stock']:checked").val() : 'no',
            'wfpsb_hidebar_outofstock': ($("input[name='wfpsb_hidebar_outofstock']:checked").val()) ? $("input[name='wfpsb_hidebar_outofstock']:checked").val() : 'no',
        },
        'styles':{
            'wfpbs_bar_height' : ($("#wfpbs_bar_height").val()) ? $("#wfpbs_bar_height").val() : '',
            'wfpsb_product_image_shape' : ($("#wfpsb_product_image_shape").val()) ? $("#wfpsb_product_image_shape").val() : 'squire',
            'wfpsb_product_price_font_size' : ($("#wfpsb_product_price_font_size").val()) ? $("#wfpsb_product_price_font_size").val() : '',
            'wfpsb_btn_font_size' : ($("#wfpsb_btn_font_size").val()) ? $("#wfpsb_btn_font_size").val() : '',
            'wfpsb_btn_border_width' : ($("#wfpsb_btn_border_width").val()) ? $("#wfpsb_btn_border_width").val() : '',

        }
};

    let $post_data = {'action': 'wcfusion_product_sticky_bar_settings', 'data': $postData};

    $.ajax({
        url: ajaxurl, type: "POST", data: $post_data,
        success: function (data) {

            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                $('.psb_settings_btn').text('Save Settings');
                $('.psb_settings_btn').prop('disabled', false);
                $('.psb_settings_btn').removeClass('psb_submit_btn_disabled');
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                $('.psb_settings_btn').text('Save Settings');
                $('.psb_settings_btn').prop('disabled', false);
                $('.psb_settings_btn').removeClass('psb_submit_btn_disabled');
                console.log('Oops: something is wrong please try later!');
            }

        }
    });
}

jQuery(document).ready(function () {

    jQuery(".product_sticky_bar_right_content .product_tab_body").hide();
    jQuery(".product_sticky_bar_right_content .product_tab_body[data-id='sticky_settings']").show();

    jQuery(".sticky_bar_data_tabs .tab_item").unbind("click");
    jQuery(".sticky_bar_data_tabs .tab_item").bind("click", function () {

        jQuery(".sticky_bar_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');

        jQuery(".product_sticky_bar_right_content .product_tab_body").hide();
        jQuery(".product_sticky_bar_right_content .product_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });

    // for default check switcher
    var $wcfusion_psb_settings = JSON.parse(wcfusion_psb_jsadmin.wcfusion_psb_settings);
    var $psb_settings = Object.keys($wcfusion_psb_settings).length;
    if( $psb_settings <= 0 ){
        $('.wfpsb_default_check').prop('checked', true);
    };

});