/** One click checkout admin scripts **/
'use strict';
var $ = jQuery;

function wcfusion_one_click_checkout_init() {
    // init module
    $('#wcfusion_one_click_checkout_header').show();
    $('#wcfusion_one_click_checkout_container').show();
};

var $wfOneClickCheckoutAdmin = {
    wfocc_settings       : JSON.parse(wcfusion_occ_admin_object.wcfusion_occ_settings),
    wfocc_settings_form  : "#wcfusion_form_one_click_checkout",
    wfocc_switchers      : ".wfocc_default_checked",

    init_wf_one_click_checkout_admin: function(){

        jQuery(document).ready(function($) {
            
            $('.wcfusion-color-filed').wpColorPicker();

            $(".wcfusion_one_click_checkout_right_content .wcfusion_one_click_checkout_tab_body").hide();
            $(".wcfusion_one_click_checkout_right_content .wcfusion_one_click_checkout_tab_body[data-id='wcfusion_one_click_checkout_general']").show();

            $(".wcfusion_one_click_checkout_data_tabs .tab_item").unbind("click");
            $(".wcfusion_one_click_checkout_data_tabs .tab_item").bind("click", function () {

                $(".wcfusion_one_click_checkout_data_tabs .tab_item").removeClass('tab_item_active');
                $(this).addClass('tab_item_active');

                $(".wcfusion_one_click_checkout_right_content .wcfusion_one_click_checkout_tab_body").hide();
                $(".wcfusion_one_click_checkout_right_content .wcfusion_one_click_checkout_tab_body[data-id='" + $(this).data('target') + "']").show();
            });

             // trigger switcher handler
             $wfOneClickCheckoutAdmin.wfocc_handle_switcher();
            
            // trigger enable redirect custom url
            $wfOneClickCheckoutAdmin.enable_redirect_custom_url();
           
            // submit One click checkout setting form
            $($wfOneClickCheckoutAdmin.wfocc_settings_form).on( 'submit', function(e){
                $wfOneClickCheckoutAdmin.submit_wfocc_settings(e);
            });

            // trigger enable custom url switcher
            $wfOneClickCheckoutAdmin.enable_custom_url_switcher();

            // trigger change_add_to_cart_button
            $wfOneClickCheckoutAdmin.enable_change_add_to_cart_btn_text();

            // trigger enable buy now button on product page
            $wfOneClickCheckoutAdmin.enable_buy_btn_on_product_page();

            // trigger enable buy now button on product archive page
            $wfOneClickCheckoutAdmin.enable_buy_btn_on_product_archive_page();
         
        });

    },

    //handle switcher
    wfocc_handle_switcher : function(){
        if( $wfOneClickCheckoutAdmin.wfocc_settings.length <= 0 ){
            $($wfOneClickCheckoutAdmin.wfocc_switchers).prop('checked', true);
        }
    },

    enable_custom_url_switcher : function(){

        if ($('#wfocc_enable_redirect_to_cart').prop("checked") == true) {
            $("#wfocc_custom_url_switcher_show").removeClass("hide_wfocc_input");
            $("#wfocc_redirect_to_page_show").removeClass("hide_wfocc_input");
            $("#wfocc_redirect_to_custom_url_show").removeClass("hide_wfocc_input");
        } else{
                $("#wfocc_custom_url_switcher_show").addClass("hide_wfocc_input");
                $("#wfocc_redirect_to_page_show").addClass("hide_wfocc_input");
                $("#wfocc_redirect_to_custom_url_show").addClass("hide_wfocc_input");
        }

        $('#wfocc_enable_redirect_to_cart').click(function () {
            if ($(this).prop("checked") == true) {
                $("#wfocc_custom_url_switcher_show").removeClass("hide_wfocc_input");
                $("#wfocc_redirect_to_page_show").removeClass("hide_wfocc_input");
                $("#wfocc_redirect_to_custom_url_show").removeClass("hide_wfocc_input");
            }
            else if ($(this).prop("checked") == false) {
                $("#wfocc_custom_url_switcher_show").addClass("hide_wfocc_input");
                $("#wfocc_redirect_to_page_show").addClass("hide_wfocc_input");
                $("#wfocc_redirect_to_custom_url_show").addClass("hide_wfocc_input");
            }
        });

    },
    enable_redirect_custom_url : function(){

        if ($('#wfocc_enable_custom_url').prop("checked") == true) {
            $("#wfocc_redirect_to_page_show").addClass("hide_wfocc_input_two");
            $("#wfocc_redirect_to_custom_url_show").removeClass("hide_wfocc_input_two");
        } else{
            $("#wfocc_redirect_to_page_show").removeClass("hide_wfocc_input_two")
            $("#wfocc_redirect_to_custom_url_show").addClass("hide_wfocc_input_two");
        }

        $('#wfocc_enable_custom_url').click(function () {
            if ($(this).prop("checked") == true) {
                $("#wfocc_redirect_to_page_show").addClass("hide_wfocc_input_two");
                $("#wfocc_redirect_to_custom_url_show").removeClass("hide_wfocc_input_two");              
            }
            else if ($(this).prop("checked") == false) {
                $("#wfocc_redirect_to_page_show").removeClass("hide_wfocc_input_two")
                $("#wfocc_redirect_to_custom_url_show").addClass("hide_wfocc_input_two");
            }
        });
    },
    enable_change_add_to_cart_btn_text : function(){

        if ($('#wfocc_change_add_to_cart_button_text').prop("checked") == true) {
                $("#wfocc_cart_button_text_show").removeClass("hide_wfocc_input");              
                $("#wfocc_select_options_button_text_show").removeClass("hide_wfocc_input");              
                $("#wfocc_read_more_button_text_show").removeClass("hide_wfocc_input"); 
        } else{
            $("#wfocc_cart_button_text_show").addClass("hide_wfocc_input");              
            $("#wfocc_select_options_button_text_show").addClass("hide_wfocc_input");              
            $("#wfocc_read_more_button_text_show").addClass("hide_wfocc_input"); 
        }

        $('#wfocc_change_add_to_cart_button_text').click(function () {
            if ($(this).prop("checked") == true) {
                $("#wfocc_cart_button_text_show").removeClass("hide_wfocc_input");              
                $("#wfocc_select_options_button_text_show").removeClass("hide_wfocc_input");              
                $("#wfocc_read_more_button_text_show").removeClass("hide_wfocc_input");              
            }
            else if ($(this).prop("checked") == false) {
                $("#wfocc_cart_button_text_show").addClass("hide_wfocc_input");              
                $("#wfocc_select_options_button_text_show").addClass("hide_wfocc_input");              
                $("#wfocc_read_more_button_text_show").addClass("hide_wfocc_input"); 
            }
        });
    },
    enable_buy_btn_on_product_page : function(){

        if ($('#wfocc_enable_buy_now_button_on_product').prop("checked") == true) {
            $("#wfocc_buy_btn_label_on_product_show").removeClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_redirect_on_product_show").removeClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_position_on_product_show").removeClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_size_on_product_show").removeClass("hide_wfocc_input");
            $("#wfocc_product_mt_show").removeClass("hide_wfocc_input");
            $("#wfocc_product_mb_show").removeClass("hide_wfocc_input");
            $("#wfocc_product_ml_show").removeClass("hide_wfocc_input");
            $("#wfocc_product_mr_show").removeClass("hide_wfocc_input");
        } else{
            $("#wfocc_buy_btn_label_on_product_show").addClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_redirect_on_product_show").addClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_position_on_product_show").addClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_size_on_product_show").addClass("hide_wfocc_input");
            $("#wfocc_product_mt_show").addClass("hide_wfocc_input");
            $("#wfocc_product_mb_show").addClass("hide_wfocc_input");
            $("#wfocc_product_ml_show").addClass("hide_wfocc_input");
            $("#wfocc_product_mr_show").addClass("hide_wfocc_input");

        }

        $('#wfocc_enable_buy_now_button_on_product').click(function () {
            if ($(this).prop("checked") == true) {
                $("#wfocc_buy_btn_label_on_product_show").removeClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_redirect_on_product_show").removeClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_position_on_product_show").removeClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_size_on_product_show").removeClass("hide_wfocc_input");  
                $("#wfocc_product_mt_show").removeClass("hide_wfocc_input");
                $("#wfocc_product_mb_show").removeClass("hide_wfocc_input");
                $("#wfocc_product_ml_show").removeClass("hide_wfocc_input");
                $("#wfocc_product_mr_show").removeClass("hide_wfocc_input");          
            }
            else if ($(this).prop("checked") == false) {
                $("#wfocc_buy_btn_label_on_product_show").addClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_redirect_on_product_show").addClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_position_on_product_show").addClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_size_on_product_show").addClass("hide_wfocc_input");
                $("#wfocc_product_mt_show").addClass("hide_wfocc_input");
                $("#wfocc_product_mb_show").addClass("hide_wfocc_input");
                $("#wfocc_product_ml_show").addClass("hide_wfocc_input");
                $("#wfocc_product_mr_show").addClass("hide_wfocc_input");
            }
        });
    },
    enable_buy_btn_on_product_archive_page : function(){
       
        if ($('#wfocc_enable_buy_now_button_on_product_archive').prop("checked") == true) {
            $("#wfocc_buy_btn_label_on_product_archive_show").removeClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_redirect_on_product_archive_show").removeClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_position_on_product_archive_show").removeClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_size_on_product_archive_show").removeClass("hide_wfocc_input");  
            $("#wfocc_product_archive_mt_show").removeClass("hide_wfocc_input");  
            $("#wfocc_product_archive_mb_show").removeClass("hide_wfocc_input");  
            $("#wfocc_product_archive_ml_show").removeClass("hide_wfocc_input");  
            $("#wfocc_product_archive_mr_show").removeClass("hide_wfocc_input");  
        } else{
            $("#wfocc_buy_btn_label_on_product_archive_show").addClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_redirect_on_product_archive_show").addClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_position_on_product_archive_show").addClass("hide_wfocc_input");              
            $("#wfocc_buy_btn_size_on_product_archive_show").addClass("hide_wfocc_input"); 
            $("#wfocc_product_archive_mt_show").addClass("hide_wfocc_input");  
            $("#wfocc_product_archive_mb_show").addClass("hide_wfocc_input");  
            $("#wfocc_product_archive_ml_show").addClass("hide_wfocc_input");  
            $("#wfocc_product_archive_mr_show").addClass("hide_wfocc_input");
        }

        $('#wfocc_enable_buy_now_button_on_product_archive').click(function () {
            if ($(this).prop("checked") == true) {
                $("#wfocc_buy_btn_label_on_product_archive_show").removeClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_redirect_on_product_archive_show").removeClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_position_on_product_archive_show").removeClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_size_on_product_archive_show").removeClass("hide_wfocc_input");  
                $("#wfocc_product_archive_mtb_show").removeClass("hide_wfocc_input");             
                $("#wfocc_product_archive_mlr_show").removeClass("hide_wfocc_input");
                $("#wfocc_product_archive_mt_show").removeClass("hide_wfocc_input");  
                $("#wfocc_product_archive_mb_show").removeClass("hide_wfocc_input");  
                $("#wfocc_product_archive_ml_show").removeClass("hide_wfocc_input");  
                $("#wfocc_product_archive_mr_show").removeClass("hide_wfocc_input");
            }
            else if ($(this).prop("checked") == false) {
                $("#wfocc_buy_btn_label_on_product_archive_show").addClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_redirect_on_product_archive_show").addClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_position_on_product_archive_show").addClass("hide_wfocc_input");              
                $("#wfocc_buy_btn_size_on_product_archive_show").addClass("hide_wfocc_input"); 
                $("#wfocc_product_archive_mtb_show").addClass("hide_wfocc_input"); 
                $("#wfocc_product_archive_mlr_show").addClass("hide_wfocc_input"); 
                $("#wfocc_product_archive_mt_show").addClass("hide_wfocc_input");  
                $("#wfocc_product_archive_mb_show").addClass("hide_wfocc_input");  
                $("#wfocc_product_archive_ml_show").addClass("hide_wfocc_input");  
                $("#wfocc_product_archive_mr_show").addClass("hide_wfocc_input");
            }
        });
    },

    // submit settings from
    submit_wfocc_settings : function (e) {
        e.preventDefault();
        let $submit_button = $('.wcfusion_one_click_checkout_btn');
        $submit_button.text( 'Please Wait....' );
        $submit_button.addClass( 'wcfusion-occ-btn-disabled' );
        $submit_button.prop( 'disabled', true );

        let $post_data = {'action': 'wcfusion_save_one_click_checkout_settings', 'data': $($wfOneClickCheckoutAdmin.wfocc_settings_form).serializeArray()};

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: $post_data,
            success: function(res){
                var $obj = JSON.parse(res);
                if ($obj.status == 'true') {
                    Command: toastr["success"]("Settings Saved Successfully!");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wcfusion-occ-btn-disabled');
                    $submit_button.prop('disabled', false);
                }else{
                    Command: toastr["error"]("Failed, Please try again!");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wcfusion-occ-btn-disabled');
                    $submit_button.prop('disabled', false);
                    console.log('Oops: something is wrong please try later!');
                }
            }
        });
    }

};

//load js for backend
$wfOneClickCheckoutAdmin.init_wf_one_click_checkout_admin();