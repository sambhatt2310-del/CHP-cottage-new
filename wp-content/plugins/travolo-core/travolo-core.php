<?php
/**
 * Plugin Name: Travolo Core
 * Description: This is a helper plugin of travolo theme
 * Version:     1.0.2
 * Author:      Vecurosoft
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages
 * Text Domain: travolo
 */
 // Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit();
}

// Define Constant
define( 'TRAVOLO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'TRAVOLO_PLUGIN_INC_PATH', plugin_dir_path( __FILE__ ) . 'inc/' );
define( 'TRAVOLO_PLUGIN_CMB2EXT_PATH', plugin_dir_path( __FILE__ ) . 'cmb2-ext/' );
define( 'TRAVOLO_PLUGIN_WIDGET_PATH', plugin_dir_path( __FILE__ ) . 'inc/widgets/' );
define( 'TRAVOLO_PLUGIN_MODULES_PATH', plugin_dir_path( __FILE__ ) . 'inc/modules/' );
define( 'TRAVOLO_PLUGDIRURI', plugin_dir_url( __FILE__ ) );
define( 'TRAVOLO_ADDONS', plugin_dir_path( __FILE__ ) .'addons/' );
define( 'TRAVOLO_CORE_PLUGIN_TEMP', plugin_dir_path( __FILE__ ) .'travolo-template/' );

// load textdomain
load_plugin_textdomain( 'travolo', false, basename( dirname( __FILE__ ) ) . '/languages' );

//include file.
require_once TRAVOLO_PLUGIN_INC_PATH .'travolocore-functions.php';
require_once TRAVOLO_PLUGIN_INC_PATH . 'MCAPI.class.php';
require_once TRAVOLO_PLUGIN_INC_PATH .'travoloajax.php';
require_once TRAVOLO_PLUGIN_INC_PATH .'builder/builder.php';
 
require_once TRAVOLO_PLUGIN_CMB2EXT_PATH . 'cmb2ext-init.php';

//Widget
require_once TRAVOLO_PLUGIN_WIDGET_PATH . 'recent-post-widget.php';
require_once TRAVOLO_PLUGIN_WIDGET_PATH . 'social-widget.php';
require_once TRAVOLO_PLUGIN_WIDGET_PATH . 'about-us-widget.php';
require_once TRAVOLO_PLUGIN_WIDGET_PATH . 'about-me-widget.php';
require_once TRAVOLO_PLUGIN_WIDGET_PATH . 'newsletter-widget.php';
require_once TRAVOLO_PLUGIN_WIDGET_PATH . 'gallery-widget.php';
require_once TRAVOLO_PLUGIN_WIDGET_PATH . 'video-box-widget.php';


//
require_once TRAVOLO_PLUGIN_MODULES_PATH . 'custom-position.php';

//addons
require_once TRAVOLO_ADDONS . 'addons.php';