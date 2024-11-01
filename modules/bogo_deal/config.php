<?php

$base_admin = $this->base_admin;
$module_slug = "bogo_deal";
$module_title = "BOGO Deal";

include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/includes/wcFusionBogoDealUtils.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
$this->modules_obj[$module_slug] = new wcFusionBogoDeal($base_admin, $module_slug, $module_title);