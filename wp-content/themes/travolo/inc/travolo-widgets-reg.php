<?php
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

function travolo_widgets_init() {

    if( class_exists('ReduxFramework') ) {
        $travolo_sidebar_widget_title_heading_tag = travolo_opt('travolo_sidebar_widget_title_heading_tag');
    } else {
        $travolo_sidebar_widget_title_heading_tag = 'h3';
    }

    //sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'travolo' ),
        'id'            => 'travolo-blog-sidebar',
        'description'   => esc_html__( 'Add Blog Sidebar Widgets Here.', 'travolo' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<'.esc_attr($travolo_sidebar_widget_title_heading_tag).' class="widget_title">',
        'after_title'   => '</'.esc_attr($travolo_sidebar_widget_title_heading_tag).'>',
    ) );

    // page sidebar widgets register
    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'travolo' ),
        'id'            => 'travolo-page-sidebar',
        'description'   => esc_html__( 'Add Page Sidebar Widgets Here.', 'travolo' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget_title">',
        'after_title'   => '</h3>',
    ) );
    // page sidebar widgets register
    if( class_exists('woocommerce') ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'WooCommerce Sidebar', 'travolo' ),
                'id'            => 'travolo-woo-sidebar',
                'description'   => esc_html__( 'Add widgets here to appear in your woocommerce page sidebar.', 'travolo' ),
                'before_widget' => '<div class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="widget-title"><h4>',
                'after_title'   => '</h4></div>',
            )
        );
    }

}

add_action( 'widgets_init', 'travolo_widgets_init' );