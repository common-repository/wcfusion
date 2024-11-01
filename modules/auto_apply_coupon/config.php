<?php

$base_admin = $this->base_admin;
$module_slug = "auto_apply_coupon";
$module_title = "Auto Apply Coupon";


include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/includes/AutoApplyCouponUtils.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";

$this->modules_obj[$module_slug] = new wcFusionAutoApplyCouponAdmin($base_admin, $module_slug, $module_title);