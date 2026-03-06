<?php
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/travolo-constants.php';

//theme setup
require_once TRAVOLO_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once TRAVOLO_DIR_PATH_INC . 'essential-scripts.php';

if( class_exists( 'WooCommerce' ) ){
    // Woo Hooks
    require_once TRAVOLO_DIR_PATH_INC . 'woo-hooks/travolo-woo-hooks.php';

    // Woo Hooks Functions
    require_once TRAVOLO_DIR_PATH_INC . 'woo-hooks/travolo-woo-hooks-functions.php';
}


// plugin activation
require_once TRAVOLO_DIR_PATH_INC . 'travolo-framework/plugins-activation/travolo-active-plugins.php';

// meta options
require_once TRAVOLO_DIR_PATH_INC . 'travolo-framework/travolo-meta/travolo-config.php';

// page breadcrumbs
require_once TRAVOLO_DIR_PATH_INC . 'travolo-breadcrumbs.php';

// sidebar register
require_once TRAVOLO_DIR_PATH_INC . 'travolo-widgets-reg.php';

//travolo elementor integration
require_once TRAVOLO_DIR_PATH_INC . 'travolo-elementor-integration.php';

//essential functions
require_once TRAVOLO_DIR_PATH_INC . 'travolo-functions.php';

// theme dynamic css
require_once TRAVOLO_DIR_PATH_INC . 'travolo-commoncss.php';

// helper function
require_once TRAVOLO_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once TRAVOLO_DEMO_DIR_PATH . 'demo-import.php';

// pagination
require_once TRAVOLO_DIR_PATH_INC . 'wp_bootstrap_pagination.php';

// travolo options
require_once TRAVOLO_DIR_PATH_INC . 'travolo-framework/travolo-options/travolo-options.php';

// hooks
require_once TRAVOLO_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once TRAVOLO_DIR_PATH_HOOKS . 'hooks-functions.php';