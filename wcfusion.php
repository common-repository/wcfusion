<?php
/**
 * Plugin Name:       wcFusion
 * Plugin URI:        https://wcfusion.com
 * Description:       wcFusion provides multiple WooCommerce extensions in a single package you’ll ever require.
 * Version:           1.0.4
 * Author:            wcFusion
 * Author URI:        https://wcfusion.com
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wcfusion
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


// check woocommerce exits & active
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    $error = sprintf (esc_html__ ('wcFusion requires %1$sWooCommerce%2$s to be installed & activated!', 'wcfusion'), '<a href=" ' . home_url () . '/wp-admin/plugin-install.php">', '</a>');
    $message = '<div class="error"><p>' . $error . '</p></div>';
    echo $message;
    return;
}


define ('WCFUSION_VERSION', '1.0.4');
defined ('WCFUSION_PATH') or define ('WCFUSION_PATH', plugin_dir_path (__FILE__));
defined ('WCFUSION_URL') or define ('WCFUSION_URL', plugin_dir_url (__FILE__));
defined ('WCFUSION_BASE_FILE') or define ('WCFUSION_BASE_FILE', __FILE__);
defined ('WCFUSION_BASE_PATH') or define ('WCFUSION_BASE_PATH', plugin_basename (__FILE__));
defined ('WCFUSION_IMG_DIR') or define ('WCFUSION_IMG_DIR', plugin_dir_url (__FILE__) . 'assets/img/');
defined ('WCFUSION_CSS_DIR') or define ('WCFUSION_CSS_DIR', plugin_dir_url (__FILE__) . 'assets/css/');
defined ('WCFUSION_JS_DIR') or define ('WCFUSION_JS_DIR', plugin_dir_url (__FILE__) . 'assets/js/');
defined ('WCFUSION_MODULES_PATH') or define ('WCFUSION_MODULES_PATH', plugin_dir_path (__FILE__) . 'modules');
defined ('WCFUSION_MODULES_DIR') or define ('WCFUSION_MODULES_DIR', plugin_dir_url (__FILE__) . 'modules/');

function wcfusion_check_premium_activation() {
    if ( !in_array( 'wcfusion-pro/wcfusion-pro.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

        require_once WCFUSION_PATH . 'includes/WcFusionUtils.php';
        require_once WCFUSION_PATH . 'includes/WcFusionDB.php';
        require_once WCFUSION_PATH . 'backend/class-wcfusion-ajax.php';
        require_once WCFUSION_PATH . 'backend/class-wcfusion-admin.php';

    }
}
add_action( 'wcfusion_pro_check_init', 'wcfusion_check_premium_activation', 10, 2 );
do_action( 'wcfusion_pro_check_init');





