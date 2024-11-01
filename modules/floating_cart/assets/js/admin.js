/**floating cart backend master script**/
'use strict';

function wcfusion_floating_cart_init() {
    // init module
    $('#wcfusion_floating_cart_header').show();
    $('#wcfusion_floating_cart_container').show();
};

var $woofusionFca = {

    wffc_settings           : JSON.parse(wffc_admin_object.wffc_settings),
    fc_settings_form        : "#wcfusion_form_floating_cart",
    settings_form_selector  : ".wcfusion-form-floating-cart",
    item_remove_icon_selector : ".wcfusion-item-remove-icon",
    basket_icon_selector    : ".wcfusion-cart-icon",
    wffc_switchers          : ".wffc_switcher_default_check",

    init_wffca: function(){

        jQuery(document).ready(function($) {

            $('.wcfusion-color-filed').wpColorPicker();

            $woofusionFca.wffc_handle_switcher();

            $(".wcfusion_floating_cart_right_content .wcfusion_floating_cart_tab_body").hide();
            $(".wcfusion_floating_cart_right_content .wcfusion_floating_cart_tab_body[data-id='wcfusion_floating_cart_settings']").show();

            $(".wcfusion_floating_cart_data_tabs .tab_item").unbind("click");
            $(".wcfusion_floating_cart_data_tabs .tab_item").bind("click", function () {

                $(".wcfusion_floating_cart_data_tabs .tab_item").removeClass('tab_item_active');
                $(this).addClass('tab_item_active');

                $(".wcfusion_floating_cart_right_content .wcfusion_floating_cart_tab_body").hide();
                $(".wcfusion_floating_cart_right_content .wcfusion_floating_cart_tab_body[data-id='" + $(this).data('target') + "']").show();
            });

            // submit floating cart setting form
            $($woofusionFca.settings_form_selector).on( 'submit', function(e){
                $woofusionFca.submit_fc_settings(e);
            });

        });

    },

    wffc_handle_switcher : function(){
        if( $woofusionFca.wffc_settings.length <= 0 ){
            $($woofusionFca.wffc_switchers).prop('checked', true);
        }
    },

    wcfusion_floating_cart_init : function(){
        $('#wcfusion_floating_cart_header').show();
        $('#wcfusion_floating_cart_container').show();
    },

    trigger_item_remove_icon_select : function ($el) {
        if( $el.length > 0 ){
            var $item_remove_icons = $($el);
            $item_remove_icons.each(function($index, $item){
                $($item).on('click', function(){
                    $($el).removeClass('checked');
                    $($item).addClass('checked');
                    let $cart_icon = $($item).attr('data-cart_icon');
                    $('#wffc_item_remove_icon').val($cart_icon);
                });
            });
        }
    },

    submit_fc_settings : function (e) {
        e.preventDefault();
        let $submit_button = $('.wcfusion-fcss-btn');
        $submit_button.text( 'Please Wait....' );
        $submit_button.addClass( 'wcfusion-fcss-btn-disabled' );
        $submit_button.prop( 'disabled', true );

        let $post_data = {'action': 'wcfusion_save_floating_cart_settings', 'data': $($woofusionFca.fc_settings_form).serializeArray()};

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: $post_data,
            success: function(res){
                var $obj = JSON.parse(res);
                if ($obj.status == 'true') {
                    Command: toastr["success"]("Settings Saved Successfully!");

                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wcfusion-fcss-btn-disabled');
                    $submit_button.prop('disabled', false);
                }else{
                    Command: toastr["error"]("Failed, Please try again!");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wcfusion-fcss-btn-disabled');
                    $submit_button.prop('disabled', false);
                    console.log('Oops: something is wrong please try later!');
                }
            }
        });
    }

};

//load js for backend
$woofusionFca.init_wffca();