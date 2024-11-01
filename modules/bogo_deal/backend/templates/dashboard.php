
<div id="wcfusion_bogo_deal_header" style="display: none;">
    <div class="wcfusion_bogo_deal_module_list_header">
        <div class="wcfusion_bogo_deal_module_left_header">
            <p><?php _e('wcFusion<span>' . WCFUSION_VERSION . '</span>','wcfusion') ?></p>
        </div>
        <div class="wcfusion_bogo_deal_module_right_header">
            <p class="get_pro">
                <a href="https://wcfusion.com" target="_blank">Get Pro</a>
            </p>
        </div>
    </div>
    <div class="wcfusion_bogo_deal_single_module_title">
        <div class="wcfusion_header_left">
            <h2><?php echo $this->module_title; ?></h2>
            <div class="documentation">
                <a class="bogo_deal_title" target="_blank" href="https://wcfusion.com/docs/">Documentation</a>
            </div>
        </div>
        <div class="wcfusion_header_right">
            <a class="wcfusion_header_back" href="" onclick="back_modules()">
                <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.99 5L11 5L11 3L3.99 3L3.99 6.12834e-07L-3.49691e-07 4L3.99 8L3.99 5Z" fill="#FF521D"/>
                </svg>
                Back to all Modules
            </a>
            <button class="wcfusion_add_btn" onclick="wcfusion_bogo_deal_rule_adder()">Add Rule</button>
            <button class="wcfusion_save_btn" onclick="wcfusion_bogo_deal_save_rules(this)">Save Changes</button>
        </div>
    </div>
</div>



<div id="wcfusion_bogo_deal_container" style="display: none;">
    <?php include WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/bogo_deal.php"; ?>
</div>






