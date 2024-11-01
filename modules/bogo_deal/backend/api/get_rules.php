<?php

$result = array();

/* Check if user has admin capabilities */
if (current_user_can('manage_options')) {


    /*$jsonStr = '[{"rule_id":1,"rule_name":"XYZ","discount_type":"fixed_cart","discount_amount":5,"buy_type":"product","buy_data":[{"id":3808,"text":"Product Name 1","quantity":2}],"get_data":[{"id":3807,"text":"Product Name 1","quantity":1}]}]';*/

    $result = array("status" => 'true',
        "rules" => $this->base_admin->utils->listAllRules()
    );

} else {
    $result = array("status" => 'false');
}


echo json_encode($result, JSON_UNESCAPED_UNICODE);