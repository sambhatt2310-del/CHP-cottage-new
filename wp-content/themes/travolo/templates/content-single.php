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

    travolo_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?> >
    <?php
        if( class_exists('ReduxFramework') ) {
            $travolo_post_details_title_position = travolo_opt('travolo_post_details_title_position');
        } else {
            $travolo_post_details_title_position = 'header';
        }

        $allowhtml = array(
            'p'         => array(
                'class'     => array()
            ),
            'span'      => array(),
            'a'         => array(
                'href'      => array(),
                'title'     => array(),
                'class'     => array(),
            ),
            'br'        => array(),
            'em'        => array(),
            'strong'    => array(),
            'b'         => array(),
        );

        // Blog Post Thumbnail
        do_action( 'travolo_blog_post_thumb' );
        
        echo '<div class="blog-content ">';
            
            //title
            if( $travolo_post_details_title_position != 'header' ) {
                echo '<h2 class="blog-title">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
            }

            // Blog Post Meta
            do_action( 'travolo_blog_post_meta' );

            // Blog COntent
            the_content();
            // Link Pages
            travolo_link_pages();

        echo '</div>';



        $travolo_post_tag = get_the_tags();

        if( class_exists('ReduxFramework') ) {
            $travolo_post_details_share_options = travolo_opt('travolo_post_details_share_options');
        } else {
            $travolo_post_details_share_options = false;
        }

        if( ! empty( $travolo_post_tag ) || ( function_exists( 'travolo_social_sharing_buttons' ) && $travolo_post_details_share_options ) ){
            echo '<!-- Share Links Area -->';
            echo '<div class="share-links clearfix">';
                echo '<div class="row justify-content-between">';
                    if( function_exists( 'travolo_social_sharing_buttons' ) && $travolo_post_details_share_options ){
                        $travolo_tag_col = "col-xl-auto";
                    }else{
                        $travolo_tag_col = "col-md-auto";
                    }
                    if( is_array( $travolo_post_tag ) && ! empty( $travolo_post_tag ) ){
                        echo '<div class="'.esc_attr( $travolo_tag_col ).'">';
                            if( count( $travolo_post_tag ) > 1 ){
                                $tag_text = __( 'Tags:', 'travolo' );
                            }else{
                                $tag_text = __( 'Tag:', 'travolo' );
                            }
                            echo '<span class="share-links-title">'.$tag_text.'</span>';
                            echo '<div class="tagcloud">';
                                foreach( $travolo_post_tag as $tags ){
                                    echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }
                    /**
                    *
                    * Hook for Blog Details Share Options
                    *
                    * Hook travolo_blog_details_share_options
                    *
                    * @Hooked travolo_blog_details_share_options_cb 10
                    *
                    */
                    do_action( 'travolo_blog_details_share_options' );

                    echo '<!-- Share Links Area end -->';
                echo '</div>';
            echo '</div>';
        }
    
    /**
    *
    * Hook for Blog Details Post Navigation Options
    *
    * Hook travolo_blog_details_post_navigation
    *
    * @Hooked travolo_blog_details_post_navigation_cb 10
    *
    */
    do_action( 'travolo_blog_details_post_navigation' );

    

    /**
    *
    * Hook for Blog Details Author Bio
    *
    * Hook travolo_blog_details_author_bio
    *
    * @Hooked travolo_blog_details_author_bio_cb 10
    *
    */
    do_action( 'travolo_blog_details_author_bio' );

    

    /**
    *
    * Hook for Blog Details Comments
    *
    * Hook travolo_blog_details_comments
    *
    * @Hooked travolo_blog_details_comments_cb 10
    *
    */
    do_action( 'travolo_blog_details_comments' );
    
    /**
    *
    * Hook for Blog Details Related Post
    *
    * Hook travolo_blog_details_related_post
    *
    * @Hooked travolo_blog_details_related_post_cb 10
    *
    */
    do_action( 'travolo_blog_details_related_post' );
    echo '</div>';