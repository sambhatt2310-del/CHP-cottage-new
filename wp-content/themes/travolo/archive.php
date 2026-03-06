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
    // Header
    get_header();

    /**
    * 
    * Hook for Blog Start Wrapper hello
    *
    * Hook travolo_blog_start_wrap
    *
    * @Hooked travolo_blog_start_wrap_cb 10
    *  
    */
    do_action( 'travolo_blog_start_wrap' );

    /**
    * 
    * Hook for Blog Column Start Wrapper
    *
    * Hook travolo_blog_col_start_wrap
    *
    * @Hooked travolo_blog_col_start_wrap_cb 10
    *  
    */
    do_action( 'travolo_blog_col_start_wrap' );

    /**
    * 
    * Hook for Blog Content
    *
    * Hook travolo_blog_content
    *
    * @Hooked travolo_blog_content_cb 10
    *  
    */
    do_action( 'travolo_blog_content' );

    /**
    * 
    * Hook for Blog Pagination
    *
    * Hook travolo_blog_pagination
    *
    * @Hooked travolo_blog_pagination_cb 10
    *  
    */
    do_action( 'travolo_blog_pagination' ); 

    /**
    * 
    * Hook for Blog Column End Wrapper
    *
    * Hook travolo_blog_col_end_wrap
    *
    * @Hooked travolo_blog_col_end_wrap_cb 10
    *  
    */
    do_action( 'travolo_blog_col_end_wrap' ); 

    /**
    * 
    * Hook for Blog Sidebar
    *
    * Hook travolo_blog_sidebar
    *
    * @Hooked travolo_blog_sidebar_cb 10
    *  
    */
    do_action( 'travolo_blog_sidebar' );     
        
    /**
    * 
    * Hook for Blog End Wrapper
    *
    * Hook travolo_blog_end_wrap
    *
    * @Hooked travolo_blog_end_wrap_cb 10
    *  
    */
    do_action( 'travolo_blog_end_wrap' );

    //footer
    get_footer();