<?php

if ($this->base_admin->base_admin->db->getModuleStatus ($this->base_admin->module_slug)) {

    check_ajax_referer( 'woofusionfcf_hashkey', 'security' );

    $post_data  = array();
    $res_data   = array();

    if (isset($_REQUEST) && $_REQUEST['data']) {
        $post_data = $_REQUEST['data'];
    } else {
        $result = array("status" => 'false');
    }

    $res_data = $this->wcfusion_add_coupon_in_cart ($post_data);

    if (!empty($res_data)) {
        $result = array("status" => 'true', 'res_data' => $res_data);
    } else {
        $result = array("status" => 'false', 'res_data' => $res_data);
    }

} else {
    $result = array("status" => 'false', 'res_data' => array());
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);
