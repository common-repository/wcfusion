<div id="wcfusion_floating_cart_dashboard">
    <form class="wcfusion-form-floating-cart" id="wcfusion_form_floating_cart">
        <div class="wcfusion_floating_cart_content_wrapper">

            <div class="wcfusion_floating_cart_bottom_form">
                <div class="content_wrapper">
                    <div class="wcfusion_floating_cart_left_content">
                        <div class="wcfusion_floating_cart_data_tabs">
                            <div class="tab_item tab_item_active" data-target="wcfusion_floating_cart_settings">
                                <h3> <?php _e( 'General', 'wcfusion' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_header">
                                <h3> <?php _e( 'Cart Header', 'wcfusion' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_body">
                                <h3> <?php _e( 'Cart Body', 'wcfusion' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_footer">
                                <h3> <?php _e( 'Cart Footer', 'wcfusion' ); ?> </h3>
                            </div>
<!--                            <div class="tab_item" data-target="wcfusion_floating_cart_suggested_product">-->
<!--                                <h3> --><?php //_e( 'Suggested Products', 'wcfusion' ); ?><!-- </h3>-->
<!--                            </div>-->
                            <div class="tab_item" data-target="wcfusion_floating_cart_typography">
                                <h3> <?php _e( 'Typography', 'wcfusion' ); ?> </h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_redirect_url">
                                <h3><?php _e( 'Redirect URLS', 'wcfusion' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_style">
                                <h3><?php _e( 'General Style', 'wcfusion' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_header_style">
                                <h3><?php _e( 'Header Style', 'wcfusion' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_content_style">
                                <h3><?php _e( 'Content Style', 'wcfusion' ); ?></h3>
                            </div>
<!--                            <div class="tab_item" data-target="wcfusion_floating_cart_suggested_product_style">-->
<!--                                <h3>--><?php //_e( 'Suggested Product Style', 'wcfusion' ); ?><!--</h3>-->
<!--                            </div>-->
                            <div class="tab_item" data-target="wcfusion_floating_cart_footer_style">
                                <h3><?php _e( 'Footer Style', 'wcfusion' ); ?></h3>
                            </div>
                            <div class="tab_item" data-target="wcfusion_floating_cart_basket_style">
                                <h3><?php _e( 'Basket Style', 'wcfusion' ); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="wcfusion_floating_cart_right_content">

                        <div data-id="wcfusion_floating_cart_settings" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/general-settings.php"; ?>
                        </div><!--/.wcfusion_floating_cart_tab_body -->

                        <div data-id="wcfusion_floating_cart_header" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/header-settings.php"; ?>
                        </div><!--/.wcfusion_floating_cart_header -->

                        <div data-id="wcfusion_floating_cart_body" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/body-settings.php"; ?>
                        </div><!--/.wcfusion_floating_cart_body-->

                        <div data-id="wcfusion_floating_cart_footer" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/footer-settings.php"; ?>
                        </div><!--/.wcfusion_floating_cart_footer-->

                        <div data-id="wcfusion_floating_cart_typography" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/typography-settings.php"; ?>
                        </div><!--/.wcfusion_floating_cart_typography -->

                        <div data-id="wcfusion_floating_cart_redirect_url" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/redirect-url-settings.php"; ?>
                        </div><!--/.wcfusion_floating_cart_redirect_url-->

                        <div data-id="wcfusion_floating_cart_style" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/general-style.php"; ?>
                        </div><!--/.wcfusion_floating_cart_style-->

                        <div data-id="wcfusion_floating_cart_header_style" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/header-style.php"; ?>
                        </div><!--/.wcfusion_floating_cart_header_style-->

                        <div data-id="wcfusion_floating_cart_content_style" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/content-style.php"; ?>
                        </div><!--/.wcfusion_floating_cart_content_style-->

                        <div data-id="wcfusion_floating_cart_footer_style" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/footer-style.php"; ?>
                        </div><!--/.wcfusion_floating_cart_footer_style-->

                        <div data-id="wcfusion_floating_cart_basket_style" class="wcfusion_floating_cart_tab_body">
                            <?php require WCFUSION_MODULES_PATH . "/" . $this->module_slug . "/backend/templates/views/basket-style.php"; ?>
                        </div><!--/.wcfusion_floation_cart_basket_style-->

                    </div>

                </div>
                <div class="wcfusion_floating_cart_btn">

                    <button type="submit"
                            class="wcfusion_floating_cart_btn wcfusion-fcss-btn"> <?php _e( 'Save Settings', 'wcfusion' ); ?>
                    </button>

                </div>
            </div>
        </div>
    </form>

</div>