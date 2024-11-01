<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['module_slug']) && isset($_REQUEST['module_status'])){


        $module_slug = sanitize_text_field($_REQUEST['module_slug']);
        $module_status = sanitize_text_field($_REQUEST['module_status']);

        $this->base_admin->db->updateModuleStatus($module_slug, $module_status);
        $result = array("status" => 'true');


    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}


echo json_encode($result,  JSON_UNESCAPED_UNICODE);