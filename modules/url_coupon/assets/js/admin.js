'use strict';

function wcfusion_url_coupon_init() {
    // init module
    $('#wcfusion_url_coupon_header').show();
    $('#wcfusion_url_coupon_container').show();




    init_wcfusion_url_coupon_data_table();

    $('#wfurlc_per_page_view').on('change', function () {
        let $pageLength = $('#wfurlc_per_page_view').val();
        init_wcfusion_url_coupon_data_table($pageLength);
    });

    // for keyword search
    jQuery('.wfurlc-keword-search').on('keyup', function () {
        wcfusion_url_coupon_keywordsearch();
    });

};

jQuery(document).ready(function ($) {


});

// define init auto coupon data table
function init_wcfusion_url_coupon_data_table($pageLength=10) {
    if (jQuery.fn.DataTable.isDataTable('#wcfusion_url_coupon_table')) {
        jQuery('#wcfusion_url_coupon_table').DataTable().destroy();
    }

    var $data = {};
    let $post_data = {'action': 'wcfusion_url_coupon_list', 'data': $data};
    var table = jQuery('#wcfusion_url_coupon_table').DataTable({
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
            {"orderable": false, "targets": 0}
        ]
    });
}

// define keyword search
function wcfusion_url_coupon_keywordsearch() {
    // Declare variables
    var $inputEl, $filterKeyword, $table, $tr, $td, $i, $searchKeyword;
    $inputEl = document.getElementById("wfurlc_keword_search");
    $filterKeyword = $inputEl.value.toUpperCase();
    $table = document.getElementById("wcfusion_url_coupon_table");
    $tr = $table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for ($i = 0; $i < $tr.length; $i++) {
        $td = $tr[$i].getElementsByTagName("td")[0];
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