<div id="wcfusion_product_sticky_bar_dashboard">
    <form action="" method="post" id="form_product_sticky_bar">
        <div class="product_sticky_bar_content_wrapper">

            <div class="single_modules_bottom_form">
                <div class="content_wrapper">
                    <div class="product_sticky_bar_left_content">
                        <div class="sticky_bar_data_tabs">
                            <div class="tab_item tab_item_active" data-target="sticky_settings">
                                <h3> <?php _e ('Settings', 'wcfusion'); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="sticky_style">
                                <h3><?php _e ('Style', 'wcfusion'); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="product_sticky_bar_right_content">

                        <div data-id="sticky_settings" class="product_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/general-settings.php"; ?>
                        </div>

                        <div data-id="sticky_style" class="product_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/style-settings.php"; ?>
                        </div>

                    </div>

                </div>

                <div class="product_sticky_btn">

                    <button type="button" onclick="wcfusion_submit_product_sticky_bar();"
                            class="product_sticky_save_btn psb_settings_btn"
                            href="javascript:void(0);"> <?php _e ('Save Settings', 'wcfusion'); ?>
                    </button>

                </div>
            </div>
        </div>
    </form>

</div>