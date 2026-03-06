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
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( travolo_meta('page_breadcrumb_area') ) ) {
            $travolo_page_breadcrumb_area  = travolo_meta('page_breadcrumb_area');
        } else {
            $travolo_page_breadcrumb_area = '1';
        }
    }else{
        $travolo_page_breadcrumb_area = '1';
    }

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
        'sub'       => array(),
        'sup'       => array(),
    );

    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $travolo_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title -->';
            echo '<div class="breadcumb-wrapper background-image">';
                echo '<div class="container z-index-common">';
                    echo '<div class="breadcumb-content">';
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                            if( travolo_meta('page_breadcrumb_settings') == 'page' ) {
                                $travolo_page_title_switcher = travolo_meta('page_title');
                            } elseif( travolo_opt('travolo_page_title_switcher') == true ) {
                                $travolo_page_title_switcher = travolo_opt('travolo_page_title_switcher');
                            }else{
                                $travolo_page_title_switcher = '1';
                            }
                        } else {
                            $travolo_page_title_switcher = '1';
                        }

                        if( $travolo_page_title_switcher == '1' ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $travolo_page_title_tag    = travolo_opt('travolo_page_title_tag');
                            }else{
                                $travolo_page_title_tag    = 'h1';
                            }

                            if( defined( 'CMB2_LOADED' )  ){
                                if( !empty( travolo_meta('page_title_settings') ) ) {
                                    $travolo_custom_title = travolo_meta('page_title_settings');
                                } else {
                                    $travolo_custom_title = 'default';
                                }
                            }else{
                                $travolo_custom_title = 'default';
                            }

                            if( $travolo_custom_title == 'default' ) {
                                echo travolo_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travolo_page_title_tag ),
                                        "text"  => esc_html( get_the_title( ) ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                echo travolo_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travolo_page_title_tag ),
                                        "text"  => esc_html( travolo_meta('custom_page_title') ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }

                        }
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                            if( travolo_meta('page_breadcrumb_settings') == 'page' ) {
                                $travolo_breadcrumb_switcher = travolo_meta('page_breadcrumb_trigger');
                            } else {
                                $travolo_breadcrumb_switcher = travolo_opt('travolo_enable_breadcrumb');
                            }

                        } else {
                            $travolo_breadcrumb_switcher = '1';
                        }

                        if( $travolo_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                            echo '<div class="breadcumb-menu-wrap">';
                                travolo_breadcrumbs(
                                    array(
                                        'breadcrumbs_classes' => 'nav',
                                    )
                                );
                            echo '</div>';
                        }

                        echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
        }
    } else {
        echo '<!-- Page title -->';
        echo '<div class="breadcumb-wrapper background-image">';
            echo '<div class="container z-index-common">';
                echo '<div class="breadcumb-content">';
                    if( class_exists( 'ReduxFramework' )  ){
                        $travolo_page_title_switcher  = travolo_opt('travolo_page_title_switcher');
                    }else{
                        $travolo_page_title_switcher = '1';
                    }

                    if( $travolo_page_title_switcher ){
                        if( class_exists( 'ReduxFramework' ) ){
                            $travolo_page_title_tag    = travolo_opt('travolo_page_title_tag');
                        }else{
                            $travolo_page_title_tag    = 'h1';
                        }
                        if( class_exists('woocommerce') && is_shop() ) {
                            echo travolo_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travolo_page_title_tag ),
                                    "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_archive() ){
                            echo travolo_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travolo_page_title_tag ),
                                    "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_home() ){
                            $travolo_blog_page_title_setting = travolo_opt('travolo_blog_page_title_setting');
                            $travolo_blog_page_title_switcher = travolo_opt('travolo_blog_page_title_switcher');
                            $travolo_blog_page_custom_title = travolo_opt('travolo_blog_page_custom_title');
                            if( class_exists('ReduxFramework') ){
                                if( $travolo_blog_page_title_switcher ){
                                    echo travolo_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $travolo_page_title_tag ),
                                            "text"  => !empty( $travolo_blog_page_custom_title ) && $travolo_blog_page_title_setting == 'custom' ? esc_html( $travolo_blog_page_custom_title) : esc_html__( 'Blog', 'travolo' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }else{
                                echo travolo_heading_tag(
                                    array(
                                        "tag"   => "h1",
                                        "text"  => esc_html__( 'Blog', 'travolo' ),
                                        'class' => 'breadcumb-title',
                                    )
                                );
                            }
                        }elseif( is_search() ){
                            echo travolo_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travolo_page_title_tag ),
                                    "text"  => esc_html__( 'Search Result', 'travolo' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_404() ){
                            echo travolo_heading_tag(
                                array(
                                    "tag"   => esc_attr( $travolo_page_title_tag ),
                                    "text"  => esc_html__( '404 PAGE', 'travolo' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_singular( 'trip' ) ){
                            echo travolo_heading_tag(
                                array(
                                    "tag"   => "h1",
                                    "text"  => esc_html__( 'Trip Details', 'travolo' ),
                                    'class' => 'breadcumb-title',
                                )
                            );
                        }elseif( is_singular( 'product' ) ){
                            $posttitle_position  = travolo_opt('travolo_product_details_title_position');
                            $postTitlePos = false;
                            if( class_exists( 'ReduxFramework' ) ){
                                if( $posttitle_position && $posttitle_position != 'header' ){
                                    $postTitlePos = true;
                                }
                            }else{
                                $postTitlePos = false;
                            }
                            
                            if( $postTitlePos != true ){
                                echo travolo_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travolo_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $travolo_post_details_custom_title  = travolo_opt('travolo_product_details_custom_title');
                                }else{
                                    $travolo_post_details_custom_title = __( 'Shop Details','travolo' );
                                }

                                if( !empty( $travolo_post_details_custom_title ) ) {
                                    echo travolo_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $travolo_page_title_tag ),
                                            "text"  => wp_kses( $travolo_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }else{
                            $posttitle_position  = travolo_opt('travolo_post_details_title_position');
                            $postTitlePos = false;
                            if( is_single() ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }
                            if( is_singular( 'product' ) ){
                                $posttitle_position  = travolo_opt('travolo_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }

                            if( $postTitlePos != true ){
                                echo travolo_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $travolo_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $travolo_post_details_custom_title  = travolo_opt('travolo_post_details_custom_title');
                                }else{
                                    $travolo_post_details_custom_title = __( 'Blog Details','travolo' );
                                }

                                if( !empty( $travolo_post_details_custom_title ) ) {
                                    echo travolo_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $travolo_page_title_tag ),
                                            "text"  => wp_kses( $travolo_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }
                    }
                    if( class_exists('ReduxFramework') ) {
                        $travolo_breadcrumb_switcher = travolo_opt( 'travolo_enable_breadcrumb' );
                    } else {
                        $travolo_breadcrumb_switcher = '1';
                    }
                    if( $travolo_breadcrumb_switcher == '1' ) {
                        echo '<div class="breadcumb-menu-wrap">';
                            travolo_breadcrumbs(
                                array(
                                    'breadcrumbs_classes' => 'nav',
                                )
                            );
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }