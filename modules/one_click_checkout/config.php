<?php


$base_admin = $this->base_admin;
$module_slug = "one_click_checkout";
$module_title = "One Click Checkout";

include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/includes/one-click-checkout-utils.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/frontend/class-module-frontend-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/frontend/class-module-frontend.php";
$this->modules_obj[$module_slug] = new wcFusionOneClickCheckoutAdmin($base_admin, $module_slug, $module_title);

new wcFusionOneClickCheckoutFrontend($base_admin, $module_slug, $module_title);
