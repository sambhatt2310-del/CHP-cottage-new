<?php
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $travolo_post_id = get_the_ID();

            // Get the page settings manager
            $travolo_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $travolo_page_settings_model = $travolo_page_settings_manager->get_model( $travolo_post_id );

            // Retrieve the color we added before
            $travolo_header_style = $travolo_page_settings_model->get_settings( 'travolo_header_style' );
            $travolo_header_builder_option = $travolo_page_settings_model->get_settings( 'travolo_header_builder_option' );

            if( $travolo_header_style == 'header_builder'  ) {

                if( !empty( $travolo_header_builder_option ) ) {
                    $travoloheader = get_post( $travolo_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $travoloheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $travolo_header_builder_trigger = travolo_opt('travolo_header_options');
                if( $travolo_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $travolo_global_header_select = get_post( travolo_opt( 'travolo_header_select_options' ) );
                    $header_post = get_post( $travolo_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    travolo_global_header_option();
                }
            }
        } else {
            $travolo_header_options = travolo_opt('travolo_header_options');
            if( $travolo_header_options == '1' ) {
                travolo_global_header_option();
            } else {
                $travolo_header_select_options = travolo_opt('travolo_header_select_options');
                $travoloheader = get_post( $travolo_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $travoloheader->ID );
                echo '</header>';
            }
        }
    } else {
        travolo_global_header_option();
    }