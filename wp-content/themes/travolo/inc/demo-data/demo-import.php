<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : travolo
 * @version   : 1.0
 * @Author    : Vecurosoft
 * @Author URI: https://www.vecurosoft.com/
 */
 
// demo import file
function travolo_import_files() {

	$demoImg = '<img src="'. TRAVOLO_DEMO_DIR_URI  .'screen-image.jpg" alt="'.esc_attr__('Demo Preview Imgae','travolo').'" />';
    return array(
        array(
            'import_file_name'             => esc_html__('Travolo Demo','travolo'),
            'local_import_file'            =>  TRAVOLO_DEMO_DIR_PATH  . 'travolo-demo.xml',
            'local_import_widget_file'     =>  TRAVOLO_DEMO_DIR_PATH  . 'travolo-widgets-demo.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   =>  TRAVOLO_DEMO_DIR_PATH . 'redux_options_demo.json',
                    'option_name' => 'travolo_opt',
                ),
            ),
            'import_notice' => $demoImg,
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'travolo_import_files' );

// demo import setup
function travolo_after_import_setup() {
	// Assign menus to their locations.
	$main_menu   = get_term_by( 'name', 'Header Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'primary-menu'    => $main_menu->term_id,
			'mobile-menu'     =>  $main_menu ->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id 	= get_page_by_title( 'Home 01' );
	$blog_page_id  	= get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
    
    travolo_elementor_settings();
    $elem_clear_cache = new \Elementor\Core\Files\Manager();
    $elem_clear_cache->clear_cache();
    
}
add_action( 'pt-ocdi/after_import', 'travolo_after_import_setup' );


//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function travolo_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'Travolo Demo Import' , 'travolo' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'travolo' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'travolo-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'travolo_import_plugin_page_setup' );
 
// Enqueue scripts
function travolo_demo_import_custom_scripts(){
	if( isset( $_GET['page'] ) && $_GET['page'] == 'travolo-demo-import' ){
		// style
		wp_enqueue_style( 'travolo-demo-import', TRAVOLO_DEMO_DIR_URI.'css/travolo.demo.import.css', array(), '1.0', false );
	}
}
add_action( 'admin_enqueue_scripts', 'travolo_demo_import_custom_scripts' );

//Global Color Option
function travolo_elementor_settings() {
    $kit_id = get_option( 'elementor_active_kit' );
    $meta_old = get_post_meta( $kit_id, '_elementor_page_settings' );

    $settings = json_decode( '[{"system_colors":[{"_id":"travolo_opt_primary","title":"Primary","color":"#e8063c"},{"_id":"travolo_opt_secondary","title":"Secondary","color":"#ffd600"},{"_id":"travolo_opt_secondary_two","title":"Secondary","color":"#490d59"},{"_id":"travolo_opt_headline","title":"Heading","color":"#000000"},{"_id":"travolo_opt_body","title":"Body","color":"#444444"},{"_id":"travolo_opt_body_bg","title":"Body Background","color":"#ffffff"},{"_id":"travolo_opt_light_color","title":"Light Color","color":"#f8f9fa"},{"_id":"travolo_opt_black_color","title":"Black Color","color":"#000000"},{"_id":"travolo_opt_white_color","title":"White Color","color":"#ffffff"},{"_id":"travolo_opt_yellow_color","title":"Yellow Color","color":"#fec624"},{"_id":"travolo_opt_success_color","title":"Success Color","color":"#28a745"},{"_id":"travolo_opt_error_color","title":"Error Color","color":"#dc3545"},{"_id":"travolo_opt_border_color","title":"Border Color","color":"#E0E0E0"},{"_id":"travolo_opt_travolo_smoke","title":"Smoke Color","color":" #F0F6FA"}],"system_typography":[],"__globals__":[]}]', true );

    return update_post_meta( $kit_id, '_elementor_page_settings', $settings[0] );
}