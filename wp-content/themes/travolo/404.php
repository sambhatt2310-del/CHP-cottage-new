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

    if( class_exists( 'ReduxFramework' ) ) {
        $travoloerrortitle   = travolo_opt( 'travolo_fof_error_number' );
        $travolo404title     = travolo_opt( 'travolo_fof_title' );
        $travolo404subtitle  = travolo_opt( 'travolo_fof_subtitle' );
        $travolo404btntext   = travolo_opt( 'travolo_fof_btn_text' );
        $travolo404img       = travolo_opt( 'travolo_error_img','url' );
    } else {
        $travoloerrortitle   = __( '404', 'travolo' );
        $travolo404title     = __( 'OOOPS, PAGE NOT FOUND', 'travolo' );
        $travolo404subtitle  = __( 'We Can\'t Seem to find the page you\'re looking for.', 'travolo' );
        $travolo404btntext   = __( 'Return To Home', 'travolo' );
        $travolo404img       = get_template_directory_uri().'/assets/img/404.png';
    }


    // get header
    get_header();

    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sup'       => array(),
        'sub'       => array(),
    );


    echo '<section class="vs-error-wrapper space">';
        echo '<div class="container">';
            echo '<div class="error-content text-center">';
                if( ! empty( $travoloerrortitle ) ){
                    echo '<h2 class="error-number text-theme">'.wp_kses( $travoloerrortitle, $allowhtml ).'</h2>';
                }
                if( ! empty( $travolo404title ) ){
                    echo '<h3 class="error-title">'.esc_html( $travolo404title ).'</h3>';
                }
                if( ! empty( $travolo404subtitle ) ){
                    echo '<p class="error-text">'.esc_html( $travolo404subtitle ).'</p>';
                }
                if( ! empty( $travolo404btntext ) ){
                    echo '<a href="'.esc_url( home_url('/') ).'" class="vs-btn style4">'.esc_html( $travolo404btntext ).'</a>';
                }
                echo travolo_img_tag( array(
                    'url'       => esc_url( $travolo404img ),
                    'class'     => 'error-img'
                ) );
            echo '</div>';
        echo '</div>';
    echo '</section>';

    //footer
    get_footer();