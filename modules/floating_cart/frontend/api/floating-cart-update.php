<?php

if ($this->base_admin->base_admin->db->getModuleStatus ($this->base_admin->module_slug)) {

    check_ajax_referer( 'woofusionfcf_hashkey', 'security' );

    $post_data  = array();
    $res_data   = array();

    if (isset($_REQUEST) && $_REQUEST['data']) {
        $post_data = $_REQUEST['data'];
    } else {
        $result = array("status" => 'false', 'new_qty' => 0);
    }

    $res_data = $this->apply_floating_cart_qty_update ($post_data);

    if (!empty($res_data)) {
        $result = array("status" => 'true', 'res_data' => $res_data);
    } else {
        $result = array("status" => 'false', 'res_data' => $res_data);
    }

} else {
    $result = array("status" => 'false', 'res_data' => array());
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);
