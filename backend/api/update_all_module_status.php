<?php
$result = array();

/* Check if user has admin capabilities */
if (current_user_can ('manage_options')) {
    if (isset($_REQUEST['enable_all'])) {
        $module_status = '';
        $enable_all = sanitize_text_field ($_REQUEST['enable_all']);
        $module_status = ($enable_all === 'yes') ? 1 : (($enable_all === 'no') ? 0 : '');
        $this->base_admin->db->updateAllModuleStatus ($module_status);
        $result = array("status" => 'true');

    } else {
        $result = array("status" => 'false');
    }
} else {
    $result = array("status" => 'false');
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);