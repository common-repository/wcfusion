<?php

$base_admin = $this->base_admin;
$module_slug = "coupon_generator";
$module_title = "Coupon Generator";

include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/includes/wcFusionCouponGeneratorUtils.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
$this->modules_obj[$module_slug] = new wcFusionCouponGeneratorAdmin($base_admin, $module_slug, $module_title);