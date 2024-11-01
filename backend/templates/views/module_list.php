<div id="wcfusion_module_list">
    <div class="wcfusion_module_list_header">
        <div class="wcfusion_module_left_header">
            <p>
<!--                <img src="--><?php //echo esc_url(WCFUSION_IMG_DIR . '/color_logo.svg');?><!--" alt="WcFusion Logo" height="35" width="35"/>-->
                <?php _e ('wcFusion<span>' . WCFUSION_VERSION . '</span>', 'wcfusion') ?>
            </p>
        </div>
        <div class="wcfusion_module_right_header">
            <p class="get_pro">
                <a href="https://wcfusion.com" target="_blank">Get Pro</a>
            </p>
        </div>
    </div>
    <div class="wcfusion_module_title">
        <h2><?php _e ('Modules', 'wcfusion') ?></h2>
    </div>
    <div class="wcfusion_module_list_breadcrumb">
        <div class="wcfusion_module_filter">
            <ul>
                <li class="active">All</li>
                <li>Active</li>
                <li>Inactive</li>
            </ul>
        </div>
        <div class="wcfusion_module_search">
            <div class="search_bar">
                <input class="module_search" id="module_search" type="search" placeholder="Search module, please type 3 or more characters">
            </div>
        </div>
    </div>

        <div class="wcfusion_module_list_items">
        <?php foreach ($this->utils->modules as $module) { ?>
            <div class="wcfusion_module_item" data-slug="<?php echo esc_attr($module["module_slug"]); ?>">
                <div class="wcfusion_module_item_left">
                    <div class="wcfusion_module_logo">
                        <a target="_blank" href="#">
                            <img src="<?php echo esc_url(WCFUSION_MODULES_DIR . $module["module_slug"] . '/assets/img/' . $module["module_slug"].'.svg');?>" height="100" />
                        </a>
                    </div>
                    <div class="wcfusion_module_settings">
                        <a target="_blank" href="#"><h3><?php echo esc_attr($module["module_title"]); ?></h3></a>
                        <div class="wcfusion_module_switch">
                            <label class="toggle_switch">
                                <input type="checkbox" name="wcfusion_module_toggle"
                                       onchange="wcfusion_update_module_status(this)" <?php echo ($this->db->getModuleStatus ($module["module_slug"]) == 1 ? "checked" : ""); ?>>
                                <span class="slider round"></span>
                            </label>
                            <div class="settings <?php echo ($this->db->getModuleStatus ($module["module_slug"]) == 1 ? "active" : ""); ?>"
                                 onclick="wcfusion_init_module_admin(this)">
                                <span class="dashicons dashicons-admin-generic"></span>
                                Settings
                            </div>
                        </div>

                    </div>
                    <p class="wcfusion_module_docs"><a target="_blank" href="https://wcfusion.com/docs">Documentation</a></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



