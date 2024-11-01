<?php

$result = array();

/* Check if user has admin capabilities */
if (current_user_can('manage_options')) {

    if(isset($_REQUEST['term_type'])){


        $term_type = sanitize_text_field($_REQUEST['term_type']);

        if($term_type == "products"){
            $result = array("status" => 'true', "results" => $this->base_admin->utils->getWooProducts());
        }elseif($term_type == "categories"){
            $result = array("status" => 'true', "results" => $this->base_admin->utils->getWooCategories());
        }

    }else {
        $result = array("status" => 'false');
    }

} else {
    $result = array("status" => 'false');
}


echo json_encode($result, JSON_UNESCAPED_UNICODE);