/**admin js for auto apply coupon*/
'use strict';
function wcfusion_auto_apply_coupon_init(){
    $('#wcfusion_auto_apply_coupon_header').show();
    $('#wcfusion_auto_apply_coupon_container').show();
    init_wcfusion_auto_coupon_data_table();
};

// for dataTable init
jQuery(document).ready(function ($) {
    //init_wcfusion_auto_coupon_data_table();

    $('#wfaac_per_page_view').on('change', function () {
        let $pageLength = $('#wfaac_per_page_view').val();
        init_wcfusion_auto_coupon_data_table($pageLength);
    });

    // Control Bulk Checkbox
    $('#wcfusion_auto_apply_coupon_table .wfaca_bulk_check').on('change', function (e) {
        if (this.checked) {
            var totalChecked = 0;

            $(".wfaca_bulk_check").prop('checked', true);
            $(".wfaca-checkbox").each(function () {
                if (!this.checked) {
                    $('.wfaca-checkbox').prop('checked', true);
                }
                totalChecked++;
            });

            $(".wfaca-checkbox").on('change', function (e) {
                var singleTotal = 0;

                $(".wfaca-checkbox").each(function () {
                    if (this.checked) {
                        singleTotal++;
                    }
                });

                if (totalChecked == singleTotal) {
                    $(".wfaca_bulk_check").prop('checked', true);
                } else {
                    $(".wfaca_bulk_check").prop('checked', false);
                }
            });

        } else {
            $(".wfaca_bulk_check").prop('checked', false);
            $(".wfaca-checkbox").each(function () {
                if (this.checked) {
                    $('.wfaca-checkbox').prop('checked', false);
                }
            });
        }
        wf_auto_apply_coupon_check_items_control();
    });

    // for bulk toggle auto apply coupons
    let $wfaabc_toggole_scope = $('#wcfusion_auto_apply_coupon_container').find('.btn-wfaabc-toggle').length;
    if($wfaabc_toggole_scope > 0){
        $('.btn-wfaabc-toggle').on('click', function () {
            bulk_auto_apply_coupon_toggle();
        })
    }else{
        console.log('Oops: scope not found, please try later!');
    }

    // for keyword search
    let $wfaabc_ks_scope = jQuery('#wcfusion_auto_apply_coupon_container').find('.wfaac-keword-search').length;
    if($wfaabc_ks_scope > 0){
        $('.wfaac-keword-search').on('keyup', function () {
            wcfusion_auto_apply_coupon_keywordsearch();
        });
    }else{
        console.log('Oops: scope not found, please try later!');
    }

});

// bulk auto apply coupon toggle
function bulk_auto_apply_coupon_toggle() {
    let $wfaabc_toggole_type = jQuery('.wfaac-action-type').val();
    let $selectedItems = [];
    jQuery('.auto_apply_coupon_popup').addClass('wcfusion_popup_open');
    jQuery('.auto_apply_coupon_popup .wcfusion-popup-content').text('Do you want to '+$wfaabc_toggole_type+' selected coupons to Auto Apply list ?');

    jQuery('[name="wfaca_checkbox[]"]:checked').each(function () {
        let $itemVal = JSON.parse($(this).val());
        $selectedItems.push($itemVal);
    });

    if( $selectedItems.length > 0 ){
        let $couponData = {
            'toggole_type' : $wfaabc_toggole_type,
            'coupon_data' : $selectedItems,
        };

        $('.wcfusion-btn-trigger-success').on('click', function () {
            let $post_data = {'action': 'wcfusion_auto_apply_coupon_toggle', 'data': $couponData};
            $.ajax({
                url: ajaxurl, type: "POST", data: $post_data,
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status == 'true') {
                        jQuery('.auto_apply_coupon_popup').removeClass('wcfusion_popup_open');
                        Command: toastr["success"]("Saved Changed Successfully!");
                        init_wcfusion_auto_coupon_data_table();
                    } else {
                        jQuery('.auto_apply_coupon_popup').removeClass('wcfusion_popup_open');
                        Command: toastr["error"]("Failed, Please try again!");
                        console.log('Oops: something is wrong please try later!');
                    }
                }
            });

            jQuery('.wfaac-action-type').reset();

        });
    }
}

function wfaca_close_popup() {
    $('.auto_apply_coupon_popup').removeClass('wcfusion_popup_open');
}

function add_to_auto_apply_coupon(couponData) {
    jQuery('.auto_apply_coupon_popup').addClass('wcfusion_popup_open');
    var couponCode = couponData.coupon_code;
    jQuery('.auto_apply_coupon_popup .wcfusion-popup-content').text('Do you want to add this coupon('+couponCode+') to Auto Apply List ?');
    let $post_data = {'action': 'wcfusion_auto_apply_coupon_add', 'data': couponData};
    // trigger action
    $('.wcfusion-btn-trigger-success').on('click', function () {
        $.ajax({
            url: ajaxurl, type: "POST", data: $post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 'true') {
                    jQuery('.auto_apply_coupon_popup').removeClass('wcfusion_popup_open');
                    Command: toastr["success"]("Auto Apply Coupon Added Successfully!");
                    init_wcfusion_auto_coupon_data_table();
                } else {
                    jQuery('.auto_apply_coupon_popup').removeClass('wcfusion_popup_open');
                    Command: toastr["error"]("Failed, Please try again!");
                    console.log('Oops: something is wrong please try later!');
                }
            }
        });

        init_wcfusion_auto_coupon_data_table();
    });
}

function remove_auto_apply_coupon(couponData) {
    jQuery('.auto_apply_coupon_popup').addClass('wcfusion_popup_open');
    var couponCode = couponData.coupon_code;
    jQuery('.auto_apply_coupon_popup .wcfusion-popup-content').text('Do you want to remove this coupon('+couponCode+') to Auto Apply List ?');
    let $post_data = {'action': 'wcfusion_auto_apply_coupon_remove', 'data': couponData};
    // trigger action
    $('.wcfusion-btn-trigger-success').on('click', function () {
        $.ajax({
            url: ajaxurl, type: "POST", data: $post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 'true') {
                    jQuery('.auto_apply_coupon_popup').removeClass('wcfusion_popup_open');
                    init_wcfusion_auto_coupon_data_table();
                    Command: toastr["success"]("Remove Auto Apply Coupon Successfully!");
                } else {
                    jQuery('.auto_apply_coupon_popup').removeClass('wcfusion_popup_open');
                    Command: toastr["success"]("Failed, Please try again!");
                    console.log('Oops: something is wrong please try later!');
                }
            }
        });
        init_wcfusion_auto_coupon_data_table();
    });
}

function wcfusion_auto_apply_coupon_check_items() {
    let wfaac_action_type = jQuery('.wfaac-action-type').val();
    var singleChecklen = jQuery("input[name='wfaca_checkbox[]']:checked").length;
    if (singleChecklen > 0 && wfaac_action_type !== '') {
        return true;
    } else {
        return false;
    }
}

function wf_auto_apply_coupon_check_items_control() {
    let $check_items = wcfusion_auto_apply_coupon_check_items();
    if ($check_items) {
        jQuery("#wcfusion_auto_apply_coupon_container .btn-wfaabc-toggle").removeClass('btn-disabled');
        jQuery("#wcfusion_auto_apply_coupon_container .btn-wfaabc-toggle").prop('disabled', false);
    } else {
        jQuery("#wcfusion_auto_apply_coupon_container .btn-wfaabc-toggle").addClass('btn-disabled');
        jQuery("#wcfusion_auto_apply_coupon_container .btn-wfaabc-toggle").prop('disabled', true);
    }
}

// define init auto coupon data table
function init_wcfusion_auto_coupon_data_table($pageLength=10) {

    if (jQuery.fn.DataTable.isDataTable('#wcfusion_auto_apply_coupon_table')) {
        jQuery('#wcfusion_auto_apply_coupon_table').DataTable().destroy();
    }

    var $data = {};
    let $post_data = {'action': 'wcfusion_auto_apply_coupon_list', 'data': $data};
    var table = jQuery('#wcfusion_auto_apply_coupon_table').DataTable({
        processing: true,
        serverSide: false,
        pageLength: $pageLength,
        searching: false,
        paging: true,
        ajax: {
            url: ajaxurl,
            type: "POST",
            data: $post_data,
        },
        order: [0, 'desc'],
        dom: 'Bfrtip',
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ]
    });
}

// define keyword search
function wcfusion_auto_apply_coupon_keywordsearch() {
    // Declare variables
    var $inputEl, $filterKeyword, $table, $tr, $td, $i, $searchKeyword;
    $inputEl = document.getElementById("wfaac_keword_search");
    $filterKeyword = $inputEl.value.toUpperCase();
    $table = document.getElementById("wcfusion_auto_apply_coupon_table");
    $tr = $table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for ($i = 0; $i < $tr.length; $i++) {
        $td = $tr[$i].getElementsByTagName("td")[1];
        if ($td) {
            $searchKeyword = $td.textContent || $td.innerText;
            if ($searchKeyword.toUpperCase().indexOf($filterKeyword) > -1) {
                $tr[$i].style.display = "";
            } else {
                $tr[$i].style.display = "none";
            }
        }
    }
}