'use strict';
var $ = jQuery;

$(document).ready(function ($) {
    $('.wcfusion_select2').select2();
    $('a.toplevel_page_wcfusion-dashboard').on('click', function () {
        back_modules();
    });

    // toaster configuration
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // for filter modules
    let $filterScope = $('.wcfusion_module_filter > ul > li');
    if ($filterScope.length > 0) {
        $($filterScope).on('click', function () {

            if ($($filterScope).find('active')) {
                $($filterScope).removeClass('active');
            }

            let $this = this;
            $($this).addClass('active');

            let $filterType = $($this).text().toLowerCase();
            if ($filterType === 'all') {
                $('.wcfusion_module_item').show();
            } else if ($filterType === 'active') {
                $('.wcfusion_module_item').hide();
                let $checkedItems = $('input[name=wcfusion_module_toggle]:checked');
                if ($checkedItems.length > 0) {
                    $checkedItems.each(function () {
                        let $parentEl = $(this).parent().parent().parent().parent().parent();
                        $($parentEl).show();
                    });
                }
            } else if ($filterType === 'inactive') {
                let $unCheckedItems = $('input[name=wcfusion_module_toggle]:not(:checked)');
                $('.wcfusion_module_item').hide();
                if ($unCheckedItems.length > 0) {
                    $unCheckedItems.each(function () {
                        let $parentEl = $(this).parent().parent().parent().parent().parent();
                        $($parentEl).show();
                    });
                }
            } else if ($filterType === 'free') {
                // code goes here
            } else if ($filterType === 'basic') {
                // code gose here
            } else if ($filterType === 'professional') {
                // code goes here
            } else if ($filterType === 'business') {
                // code goes here
            } else if ($filterType === 'enterprise') {
                // code goes here
            } else {
                $('.wcfusion_module_item').show();
            }

        });
    }

    // for search module
    $('#module_search').keyup(function () {
        let $keyword = $(this).val().toLowerCase();
        search_module_by_kewords($keyword);
    });
});

function SET_STORAGE(name, value) {
    return localStorage.setItem(name, value);
}

function GET_STORAGE(name) {
    return localStorage.getItem(name);
}

function REMOVE_STORAGE(name) {
    return localStorage.removeItem(name);
}

function wcfusion_plugin_init(host) {
    var module_slug = GET_STORAGE('module_slug'),
        module_status = GET_STORAGE('module_status');
    setTimeout(function () {
        SET_STORAGE('module_slug', module_slug);
        SET_STORAGE('module_status', module_status);
    }, 200);


    if ( (module_status == 1) && (module_slug !== null || module_slug !== '') ) {
        wcfusion_hide_all();
        jQuery("#wcfusion_module_admin").show();

        window["wcfusion_" + module_slug + "_init"]();

        var wofusionEl = jQuery("#wcfusion_module_admin").find('.wcfusion_module_admin_container');
        if(wofusionEl){
            jQuery( wofusionEl ).addClass( module_slug );
        }
    }
}

function back_modules() {
    REMOVE_STORAGE('module_slug');
    REMOVE_STORAGE('module_status');
}

/** for toggle all modules */
function wcfusion_toggle_modules($type) {
    let $scope = jQuery('div.wcfusion_module_list_items');

    if ($type != '' && $scope.length > 0) {
        // for checked all
        if ($type == 'check') {
            jQuery('.wcfusion_module_list_items input:checkbox').attr('checked', 'checked');
            jQuery('.wcfusion_module_list_items').attr('data-enable_all', 'yes');
        }
        // for unchecked all
        if ($type == 'uncheck') {
            jQuery('.wcfusion_module_list_items input:checkbox').attr('checked', false);
            jQuery('.wcfusion_module_list_items').attr('data-enable_all', 'no');
        }
    } else {
        return;
    }
}

/*
 * wcfusion_update_modules
 *
 */
function wcfusion_update_all_module_status() {
    let $scope = jQuery('div.wcfusion_module_list_items');
    if ($scope.length > 0) {
        jQuery('.wf_save_change_modules').text('Please Wait..');
        jQuery('.wf_save_change_modules').prop("disabled", true);

        var $enableAll = jQuery('.wcfusion_module_list_items').attr('data-enable_all');
        var post_data = {'action': 'wcfusion_update_all_module_status', 'enable_all': $enableAll,};
        jQuery.ajax({
            url: ajaxurl, type: "POST", data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 'true') {
                    jQuery('.wf_save_change_modules').text('Save Change');
                    jQuery('.wf_save_change_modules').prop("disabled", false);
                    jQuery('.wcfusion_module_list_items').removeAttr('data-enable_all');
                } else {
                    jQuery('.wf_save_change_modules').text('Save Change');
                    jQuery('.wf_save_change_modules').prop("disabled", false);
                    jQuery('.wcfusion_module_list_items').removeAttr('data-enable_all');
                }
            }
        });
    } else {
        return;
    }
}

function wcfusion_hide_all() {
    $("#wcfusion_module_list").hide();
}


function wcfusion_update_module_status(view) {

    var module_slug = jQuery(view).parent().parent().parent().parent().parent().attr("data-slug")
    var module_status = jQuery(view).is(':checked') ? 1 : 0
    var post_data = {
        'action': 'wcfusion_update_module_status',
        'module_slug': module_slug,
        'module_status': module_status,
    };
    jQuery.ajax({
        url: ajaxurl, type: "POST", data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == "true") {
                if (module_status === 1) {
                    jQuery(view).parent().parent().find(".settings").addClass("active")
                } else {
                    jQuery(view).parent().parent().find(".settings").removeClass("active")
                }
            }
        }
    })

}

function wcfusion_init_module_admin(view) {

    var module_slug = $(view).parent().parent().parent().parent().attr("data-slug");
    var module_status = $(view).parent().find("input[type='checkbox']").is(':checked') ? 1 : 0;
    SET_STORAGE('module_slug', module_slug);
    SET_STORAGE('module_status', module_status);
    wcfusion_plugin_init();

}

function removeChar(item) {
    //alert();
    var val = item.value;
    val = val.replace(/[^0-9,.]/g, "");
    if (val == ' ') {
        val = ''
    }
    ;
    item.value = val;
}

/**
 * search modules by kewords
 */
function search_module_by_kewords(keyword) {
    let $modules = document.querySelectorAll(".wcfusion_module_item");
    let $keyword = keyword.replace(/\s/g, '');
    if ($modules.length > 0) {
        $modules.forEach(function ($element, $item) {
            let $module_title = $($element).find('.wcfusion_module_settings > a > h3').text().toLowerCase().replace(/\s/g, '');
            if ($keyword.length >= 3) {
                ($module_title.indexOf($keyword) >= 0) ? $($element).show() : $($element).hide();
            } else {
                $($element).show();
            }
        });
    }
}

