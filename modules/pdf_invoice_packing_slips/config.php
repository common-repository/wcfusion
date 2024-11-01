<?php


$base_admin = $this->base_admin;
$module_slug = "pdf_invoice_packing_slips";
$module_title = "PDF Invoice & Packing Slips";

// load dompdf vendor
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/vendor/autoload.php";

include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/includes/pdf-invoice-utils.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/backend/class-module-admin.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/frontend/class-module-frontend-ajax.php";
include_once WCFUSION_MODULES_PATH . "/" . $module_slug . "/frontend/class-module-frontend.php";
$this->modules_obj[$module_slug] = new wcFusionPdfInvoiceAdmin($base_admin, $module_slug, $module_title);

new wcFusionPdfInvoiceFrontend($base_admin, $module_slug, $module_title);
