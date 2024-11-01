

<form action="#" id="posts-filter" method="get">
    <div class="tablenav top">

        <div class="alignleft actions ">
            <div class="per_page">
                <p>Per page view</p>
            </div>
            <select id="wfaac_per_page_view" class="wfaac-per-page-view">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
            </select>
        </div>

        <div class="alignleft actions bulkactions">
            <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
            <select onchange="wf_auto_apply_coupon_check_items_control();" id="bulk-action-selector-top" class="wfaac-action-type" name="bulk_acton_type">
                <option value="">Bulk actions</option>
                <option value="add">Add to auto apply</option>
                <option value="remove">Remove from auto apply</option>
            </select>
            <input type="button" id="doaction" class="button action btn-wfaabc-toggle btn-disabled" value="Apply" disabled="true">
        </div>

        <div class="alignleft actions">

            <select>
                <option value="">Show all types</option>
                <option disabled>Percentage discount</option>
                <option disabled>Fixed cart discount</option>
                <option disabled>Fixed product discount</option>
            </select>
            <span class="wcfusion_get_pro">(Pro)</span>
        </div>

        <div class="tablenav-pages">
            <p class="search-box">
                <label class="screen-reader-text" for="post-search-input">Search coupons:</label>
                <input type="text" id="wfaac_keword_search" class="wfaac-keword-search" name="wfaac_keword_search" placeholder="Search">
            </p>
        </div>

    </div>

    <table id="wcfusion_auto_apply_coupon_table" class="widefat fixed striped table-view-list">
        <thead>
            <tr class="wfctrow100 wfct-head">
                <td id="cb" class="manage-column column-cb check-column">
                    <label class="screen-reader-text" for="cb-select-all-1">Select All</label>
                    <input class="wfaca_bulk_check" id="cb-select-all-1" type="checkbox">
                </td>
                <th class="wfct-cell100">Code</th>
                <th class="wfct-cell100">Coupon Type</th>
                <th class="wfct-cell100">Coupon Amount</th>
                <th class="wfct-cell100">Description</th>
                <th class="wfct-cell100">Product IDs</th>
                <th class="wfct-cell100">Usage/Limit</th>
                <th class="wfct-cell100">Expiry Date</th>
                <th class="wfct-cell100">Is Auto Coupon</th>
                <th class="wfct-cell100">Action</th>
            </tr>
        </thead>
        <h2 class="screen-reader-text">Coupons list</h2>
        <tbody id="the-list">


        </tbody>
    </table>

</form>

<div class="auto_apply_coupon_popup wcfusion_popup d_flex">
    <div class="wcfusion_popup_inar">
        <div class="successes_message">
            <p class="wcfusion-popup-content">Are you sure? </p>
            <div class="wcfusion-btn-wrapper">
                <button type="button" class="wcfusion-btn-danger wcfusion-btn-trigger-danger" onclick="wfaca_close_popup();">No</button>
                <button type="button" class="wcfusion-btn-success wcfusion-btn-trigger-success">Yes</button>
            </div>
<!--            <span class="dashicons dashicons-dismiss wcfusion_close_popup" onclick="wfaca_close_popup();"></span>-->
<!--	        <i class="demo-icon icon-cancel wcfusion_close_popup" onclick="wfaca_close_popup();">&#xe904;</i>-->
	        <i class="demo-icon icon-cross wcfusion_close_popup" onclick="wfaca_close_popup();">&#xe901;</i>
        </div>
    </div>
</div>
