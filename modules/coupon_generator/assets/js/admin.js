'use strict';

function wcfusion_coupon_generator_init() {
    // init module
    $('#wcfusion_coupon_generator_header').show();
    $('#wcfusion_coupon_generator_container').show();

    $("#wcfusion_coupon_generate_dashboard .coupon_tab_body").hide();
    $("#wcfusion_coupon_generate_dashboard .coupon_tab_body[data-id='coupon_tab_general']").show();

    $("#wcfusion_coupon_generate_dashboard .coupon_data_tabs .tab_item").unbind("click");
    $("#wcfusion_coupon_generate_dashboard .coupon_data_tabs .tab_item").bind("click", function () {

        $("#wcfusion_coupon_generate_dashboard .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        $(this).addClass('tab_item_active');

        $("#wcfusion_coupon_generate_dashboard .coupon_tab_body").hide();
        $("#wcfusion_coupon_generate_dashboard .coupon_tab_body[data-id='" + $(this).data('target') + "']").show();
    });

    // for close poopup
    $('.wcfusion_close_popup').on('click', function () {
        $('.wcfusion_popup').removeClass('wcfusion_popup_open');
    });

};

/**
 * Submit coupon generator form
 * define submit_coupon_generator
 *
 */
function wcfusion_submit_coupon_generator() {
    $('.coupon_generator_btn').text('Please Wait..');
    $('.coupon_generator_btn').addClass('coupon_generator_btn_disabled');
    $('.coupon_generator_btn').prop('disabled', true);
    $('.wcfusion_popup').addClass('wcfusion_popup_open');
    $('.generating_coupon').show();
    $('.successes_message').hide();
    let $postData = {
        'number_of_coupon': ($("#coupon_generator_number_of_coupon").val()) ? $("#coupon_generator_number_of_coupon").val() : '',
        'coupon_length': ($("#coupon_generator_coupon_length").val()) ? $("#coupon_generator_coupon_length").val() : '',
        'discount_type': ($("#coupon_generator_discount_type").val()) ? $("#coupon_generator_discount_type").val() : '',
        'coupon_amount': ($("#coupon_generator_coupon_amount").val()) ? $("#coupon_generator_coupon_amount").val() : '',
        'free_shipping': ($("#coupon_generator_free_shipping").val()) ? $("#coupon_generator_free_shipping").val() : '',
        'expiry_date': ($("#coupon_generator_expiry_date").val()) ? $("#coupon_generator_expiry_date").val() : '',
        'minimum_amount': ($("#coupon_generator_minimum_amount").val()) ? $("#coupon_generator_minimum_amount").val() : '',
        'maximum_amount': ($("#coupon_generator_maximum_amount").val()) ? $("#coupon_generator_maximum_amount").val() : '',
        'individual_use': ($("#coupon_generator_individual_use").val()) ? $("#coupon_generator_individual_use").val() : '',
        'exclude_sale_items': ($("#coupon_generator_exclude_sale_items").val()) ? $("#coupon_generator_exclude_sale_items").val() : '',
        'product_ids': ($("#coupon_generator_product_ids").val()) ? $("#coupon_generator_product_ids").val() : [],
        'exclude_product_ids': ($("#coupon_generator_exclude_product_ids").val()) ? $("#coupon_generator_exclude_product_ids").val() : [],
        'product_categories': ($("#coupon_generator_product_categories").val()) ? $("#coupon_generator_product_categories").val() : [],
        'exclude_product_categories': ($("#coupon_generator_exclude_product_categories").val()) ? $("#coupon_generator_exclude_product_categories").val() : [],
        'customer_email': ($("#coupon_generator_customer_email").val()) ? $("#coupon_generator_customer_email").val() : '',
        'usage_limit': ($("#coupon_generator_usage_limit").val()) ? $("#coupon_generator_usage_limit").val() : '',
        'usage_limit_per_user': ($("#coupon_generator_usage_limit_per_user").val()) ? $("#coupon_generator_usage_limit_per_user").val() : '',
        'limit_usage_to_x_items': ($("#coupon_generator_limit_usage_to_x_items").val()) ? $("#coupon_generator_limit_usage_to_x_items").val() : '',

    };

    let $post_data = {'action': 'wcfusion_coupon_generator_init', 'data': $postData};

    $.ajax({
        url: ajaxurl, type: "POST", data: $post_data,
        success: function (data) {

            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                var totalCoupon = obj.coupons.length;
                if ( totalCoupon > 0) {
                    $('.generating_coupon').hide();
                    $('.successes_message').show();
                    $('.coupon_count').text(totalCoupon);
                    $('.generate_coupon_export_csv').on('click', function () {
                        let csvContent = "data:text/csv;charset=utf-8,";
                        let coupons = obj.coupons;
                        coupons.forEach(function (single_coupon) {
                            csvContent += single_coupon + "\r\n";
                        });
                        var encodedUri = encodeURI(csvContent);
                        var link = document.createElement("a");
                        link.setAttribute("href", encodedUri);
                        link.setAttribute("download", "coupon-list.csv");
                        document.body.appendChild(link); // Required for FF
                        link.click();
                        $('.wcfusion_popup').removeClass('wcfusion_popup_open');
                    });
                }

                Command: toastr["success"]("Coupon Generated Successfully!");

                $('#form_wcfusion_coupon_generator')[0].reset();
                $('#form_wcfusion_coupon_generator .select2-selection__rendered').val("").text("Please select").trigger('change');
                $('.coupon_generator_btn').text('Generate Coupons');
                $('.coupon_generator_btn').prop('disabled', false);
                $('.coupon_generator_btn').removeClass('coupon_generator_btn_disabled');
                //$('.wcfusion_popup').removeClass('wcfusion_popup_open');
            } else {
                Command: toastr["success"]("Failed, Please try again!");

                //$('.wcfusion_popup').removeClass('wcfusion_popup_open');
                $('#form_wcfusion_coupon_generator')[0].reset();
                $('#form_wcfusion_coupon_generator .select2-selection__rendered').val("").text("Please select").trigger('change');
                $('.coupon_generator_btn').text('Generate Coupons');
                $('.coupon_generator_btn').prop('disabled', false);
                $('.coupon_generator_btn').removeClass('coupon_generator_btn_disabled');
                console.log('Oops: something is wrong please try later!');
            }

        }
    });
}


