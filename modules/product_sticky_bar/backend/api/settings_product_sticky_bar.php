<?php

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can ('manage_options')) {

    if ($this->base_admin->base_admin->db->getModuleStatus ($this->base_admin->module_slug)) {
        $post_data = array();
        if (isset($_REQUEST) && $_REQUEST['data']) {
            $post_data = $_REQUEST['data'];
        } else {
            $result = array("status" => 'false', "psb_settings" => array());
        }

        if ($this->base_admin->utils->init_product_sticky_bar_settings ($post_data)) {
            $result = array("status" => 'true');
        } else {
            $result = array("status" => 'false');
        }

    } else {
        $result = array("status" => 'false');
    }

} else {
    $result = array("status" => 'false');
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);