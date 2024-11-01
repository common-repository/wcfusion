<?php

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can ('manage_options')) {

    if ($this->base_admin->base_admin->db->getModuleStatus ($this->base_admin->module_slug)) {

        $tableData = array();

        // start query here
        $coupons = get_posts (array(
            'posts_per_page' => -1,
            'post_type' => 'shop_coupon',
            'post_status' => 'publish',
        ));

        // generate new auto apply coupon data for
        if (!empty($coupons)) {

            foreach ($coupons as $key => $coupon) {

                $inputCheckBoxVal = json_encode (array('ID' => $coupon->ID, 'coupon_code' => $coupon->post_name ),JSON_UNESCAPED_UNICODE );
                $inputCheckBox = "<input onchange='wf_auto_apply_coupon_check_items_control();' class='wfaca-checkbox' id='wfaccb_<?php $coupon->ID;?>' type='checkbox' name='wfaca_checkbox[]' value='".$inputCheckBoxVal."'>";
                $code = "<strong pdl10>". $coupon->post_name ."</strong>";

                // get meta data
                $fixed_cart_discount = get_post_meta( $coupon->ID, 'discount_type', true );
                $amount = get_post_meta( $coupon->ID, 'coupon_amount', true );
                $free_shipping = get_post_meta( $coupon->ID, 'free_shipping', true );
                $expiry_date = get_post_meta( $coupon->ID, 'date_expires', true );
                $minimum_amount = get_post_meta( $coupon->ID, 'minimum_amount', true );
                $maximum_amount = get_post_meta( $coupon->ID, 'maximum_amount', true );
                $individual_use = get_post_meta( $coupon->ID, 'individual_use', true);
                $exclude_sale_items = get_post_meta( $coupon->ID, 'exclude_sale_items', true );
                $product_ids = get_post_meta( $coupon->ID, 'product_ids', true );
                $exclude_product_ids = get_post_meta( $coupon->ID, 'exclude_product_ids', true );
                $product_categories = get_post_meta( $coupon->ID, 'product_categories', true );
                $exclude_product_categories = get_post_meta( $coupon->ID, 'exclude_product_categories', true );
                $customer_email = get_post_meta( $coupon->ID, 'customer_email', true );
                $limit_usage_to_x_items = get_post_meta( $coupon->ID, 'limit_usage_to_x_items', true );
                $usage_limit = get_post_meta( $coupon->ID, 'usage_limit', true );
                $usage_count = get_post_meta( $coupon->ID, 'usage_count', true );
                $usage_limit_per_user = get_post_meta( $coupon->ID, 'usage_limit_per_user', true );

                $discount_type = ( $fixed_cart_discount == 'fixed_cart' ) ? 'Fixed cart discount' : ( $fixed_cart_discount == 'percent' ? 'Percentage discount' : 'Fixed product discount' );
                $couponPost = get_post( $coupon->ID );
                $description = '-';
                if ( !empty( $couponPost->post_excerpt ) ) {
                    $description = "<p class='coupon-description'>".$couponPost->post_excerpt."</p>";
                }

                $auto_apply_coupons = get_option('wcfusion_auto_apply_coupons');
                $is_auto_coupon     = ( !empty($auto_apply_coupons) && array_search($coupon->ID, array_column($auto_apply_coupons, 'ID')) !== false ) ? 'Yes' : 'No';
                $usage_limit        = ( $usage_limit > 0 ) ? $usage_limit : '∞';
                $usage_count       = ($usage_count > 0) ? $usage_count : 0;
                $usageLimit         = $usage_count . ' / ' . $usage_limit;
                $date_expires       = (!empty($expiry_date)) ? date( 'F d, Y',  $expiry_date ) : '-';

                $is_coupon_class = ($is_auto_coupon == 'Yes') ? 'text-success' : 'text-warning';

                $iconAction = ($is_auto_coupon == 'Yes') ?
                        "<span class='auto_coupon_apply'><a class='wfaac-btn-warning' onclick='remove_auto_apply_coupon($inputCheckBoxVal);' title='Remode from auto coupon' href='javascript:void(0)'><i class='demo-icon dash-trash-icon icon-trash'>&#xe902;</i></a></span>"
                    : "<span class='auto_coupon_apply'><a class='wfaac-btn-success' onclick='add_to_auto_apply_coupon($inputCheckBoxVal);' title='Add to auto apply coupon' href='javascript:void(0)'><span class='dashicons dash-plus-icon dashicons-plus-alt2'></span></a></span>";

                $actions = "<div class='row-action'>
                                <span class='wfaac_action_icons'>
                                <span class='wfaac_edit'>
                                <a title='Edit Coupon' target='_blank' href='".site_url('wp-admin/post.php?post='.$coupon->ID.'&action=edit')."'>
                                <span class='dashicons dash-edit-icon dashicons-edit'></span></a></span>". $iconAction ."
                            </div>";

                // generate data table here
                $tableData[] = array(
                    // columns dynamic valus
                    $inputCheckBox,
                    $code,
                    $discount_type,
                    $amount,
                    $description,
                    $product_ids,
                    $usageLimit,
                    $date_expires,
                    '<span class="'. $is_coupon_class.'">'.$is_auto_coupon.'</span>',
                    $actions,

                    // table columns
                    '',
                    'code',
                    'fixed_cart_discount',
                    'amount',
                    'description',
                    'product_ids',
                    'usage_limit',
                    'expiry_date',
                    'is_uto_coupon',
                    'actions'
                );
            }

            $result['draw'] = 1;
            $result['recordsTotal'] = 1;
            $result['recordsFiltered'] = 1;
            $result['data'] = $tableData;
        }else{
            $result['draw'] = 0;
            $result['recordsTotal'] = 0;
            $result['recordsFiltered'] = 0;
            $result['data'] = [];
        }

    } else {
        $result['draw'] = 0;
        $result['recordsTotal'] = 0;
        $result['recordsFiltered'] = 0;
        $result['data'] = [];
    }

} else {
    $result['draw'] = 0;
    $result['recordsTotal'] = 0;
    $result['recordsFiltered'] = 0;
    $result['data'] = [];
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);
