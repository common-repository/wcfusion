<form action="#" id="posts-filter" method="get">
    <div class="tablenav top">
        <div class="url_filter alignleft actions">
            <div class="per_page">
                <p>Per page view</p>
            </div>
            <select id="wfurlc_per_page_view" class="wfurlc-per-page-view">
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
                <input type="text" id="wfurlc_keword_search" class="wfurlc-keword-search" name="wfurlc_keword_search" placeholder="Search">
            </p>
        </div>
    </div>

    <table id="wcfusion_url_coupon_table" class="widefat fixed striped table-view-list">
        <thead>
        <tr class="wfctrow100 wfct-head">
            <th class="wfct-cell100">Code</th>
            <th class="wfct-cell100">Coupon Type</th>
            <th class="wfct-cell100">Coupon Amount</th>
            <th class="wfct-cell100">Description</th>
            <th class="wfct-cell100">Product IDs</th>
            <th class="wfct-cell100">Usage/Limit</th>
            <th class="wfct-cell100">Expiry Date</th>
            <th class="wfct-cell100">Is URL Coupon</th>
            <th class="wfct-cell100">Action</th>
        </tr>
        </thead>
        <h2 class="screen-reader-text">Coupons list</h2>
        <tbody id="the-list">

        </tbody>
    </table>

</form>