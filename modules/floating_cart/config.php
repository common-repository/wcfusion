<?php

$base_admin = $this->base_admin;
$module_slug = "floating_cart";
$module_title = "Floating Cart";

include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/includes/floating-cart-utils.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/frontend/class-floating-cart-frontend-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/frontend/class-floating-cart-frontend.php";
$this->modules_obj[$module_slug] = new wcFusionFloatingCartAdmin($base_admin, $module_slug, $module_title);

new wcFusionFloatingCartFrontend($base_admin, $module_slug, $module_title);