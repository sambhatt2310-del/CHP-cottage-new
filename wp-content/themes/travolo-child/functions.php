<?php
/**
 *
 * @Packge      Travolo
 * @Author      Vecuro
 * @Author URL  https//www.vecurosoft.com
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme
 */
function travolo_child_enqueue_styles() {

    wp_enqueue_style( 'travolo-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'travolo-child-style', get_stylesheet_directory_uri() . '/style.css',array( 'travolo-style' ),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'travolo_child_enqueue_styles', 100000 );