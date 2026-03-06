<?php
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'TRAVOLO_DIR_URI' ) ) {
    define('TRAVOLO_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'TRAVOLO_DIR_ASSIST_URI' ) ) {
    define( 'TRAVOLO_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'TRAVOLO_DIR_CSS_URI' ) ) {
    define( 'TRAVOLO_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Skin Css File
if ( ! defined( 'TRAVOLO_DIR_SKIN_CSS_URI' ) ) {
    define( 'TRAVOLO_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/') );
}


// Js File URI
if (!defined('TRAVOLO_DIR_JS_URI')) {
    define('TRAVOLO_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('TRAVOLO_DIR_PLUGIN_URI')) {
    define('TRAVOLO_DIR_PLUGIN_URI', get_theme_file_uri( '/assets/plugins/'));
}

// Base Directory
if (!defined('TRAVOLO_DIR_PATH')) {
    define('TRAVOLO_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('TRAVOLO_DIR_PATH_INC')) {
    define('TRAVOLO_DIR_PATH_INC', TRAVOLO_DIR_PATH . 'inc/');
}

//TRAVOLO framework Folder Directory
if (!defined('TRAVOLO_DIR_PATH_FRAM')) {
    define('TRAVOLO_DIR_PATH_FRAM', TRAVOLO_DIR_PATH_INC . 'travolo-framework/');
}

//Classes Folder Directory
if (!defined('TRAVOLO_DIR_PATH_CLASSES')) {
    define('TRAVOLO_DIR_PATH_CLASSES', TRAVOLO_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('TRAVOLO_DIR_PATH_HOOKS')) {
    define('TRAVOLO_DIR_PATH_HOOKS', TRAVOLO_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'TRAVOLO_DEMO_DIR_PATH' ) ){
    define( 'TRAVOLO_DEMO_DIR_PATH', TRAVOLO_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'TRAVOLO_DEMO_DIR_URI' ) ){
    define( 'TRAVOLO_DEMO_DIR_URI', TRAVOLO_DIR_URI.'inc/demo-data/' );
}