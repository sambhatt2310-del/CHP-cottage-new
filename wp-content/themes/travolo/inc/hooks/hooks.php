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

	/**
	* Hook for preloader
	*/
	add_action( 'travolo_preloader_wrap', 'travolo_preloader_wrap_cb', 10 );

	/**
	* Hook for offcanvas cart
	*/
	add_action( 'travolo_main_wrapper_start', 'travolo_main_wrapper_start_cb', 10 );

	/**
	* Hook for Header
	*/
	add_action( 'travolo_header', 'travolo_header_cb', 10 );

	/**
	* Hook for Blog Start Wrapper
	*/
	add_action( 'travolo_blog_start_wrap', 'travolo_blog_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column Start Wrapper
	*/
    add_action( 'travolo_blog_col_start_wrap', 'travolo_blog_col_start_wrap_cb', 10 );

	/**
	* Hook for Service Column Start Wrapper
	*/
    add_action( 'travolo_service_col_start_wrap', 'travolo_service_col_start_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'travolo_blog_col_end_wrap', 'travolo_blog_col_end_wrap_cb', 10 );

	/**
	* Hook for Blog Column End Wrapper
	*/
    add_action( 'travolo_blog_end_wrap', 'travolo_blog_end_wrap_cb', 10 );

	/**
	* Hook for Blog Pagination
	*/
    add_action( 'travolo_blog_pagination', 'travolo_blog_pagination_cb', 10 );

    /**
	* Hook for Blog Content
	*/
	add_action( 'travolo_blog_content', 'travolo_blog_content_cb', 10 );

    /**
	* Hook for Blog Sidebar
	*/
	add_action( 'travolo_blog_sidebar', 'travolo_blog_sidebar_cb', 10 );


    /**
	* Hook for Service Sidebar
	*/
	add_action( 'travolo_service_sidebar', 'travolo_service_sidebar_cb', 10 );

    /**
	* Hook for Blog Details Sidebar
	*/
	add_action( 'travolo_blog_details_sidebar', 'travolo_blog_details_sidebar_cb', 10 );

	/**
	* Hook for Blog Details Wrapper Start
	*/
	add_action( 'travolo_blog_details_wrapper_start', 'travolo_blog_details_wrapper_start_cb', 10 );

	/**
	* Hook for Blog Details Post Meta
	*/
	add_action( 'travolo_blog_post_meta', 'travolo_blog_post_meta_cb', 10 );

	/**
	* Hook for Blog Details Post Share Options
	*/
	add_action( 'travolo_blog_details_share_options', 'travolo_blog_details_share_options_cb', 10 );

	/**
	* Hook for Blog Details post navigation
	*/
	add_action( 'travolo_blog_details_post_navigation', 'travolo_blog_details_post_navigation_cb', 10 );



	/**
	* Hook for Blog Details Post Author Bio
	*/
	add_action( 'travolo_blog_details_author_bio', 'travolo_blog_details_author_bio_cb', 10 );

	/**
	* Hook for Blog Details Tags and Categories
	*/
	add_action( 'travolo_blog_details_tags_and_categories', 'travolo_blog_details_tags_and_categories_cb', 10 );

	/**
	* Hook for Blog Deatils Related Post
	*/
	add_action( 'travolo_blog_details_related_post', 'travolo_blog_details_related_post_cb', 10 );

	/**
	* Hook for Blog Deatils Comments
	*/
	add_action( 'travolo_blog_details_comments', 'travolo_blog_details_comments_cb', 10 );

	/**
	* Hook for Blog Deatils Column Start
	*/
	add_action('travolo_blog_details_col_start','travolo_blog_details_col_start_cb');

	/**
	* Hook for Blog Deatils Column End
	*/
	add_action('travolo_blog_details_col_end','travolo_blog_details_col_end_cb');

	/**
	* Hook for Blog Deatils Wrapper End
	*/
	add_action('travolo_blog_details_wrapper_end','travolo_blog_details_wrapper_end_cb');

	/**
	* Hook for Blog Post Thumbnail
	*/
	add_action('travolo_blog_post_thumb','travolo_blog_post_thumb_cb');

	/**
	* Hook for Blog Post Content
	*/
	add_action('travolo_blog_post_content','travolo_blog_post_content_cb');


	/**
	* Hook for Blog Post  Read More Button
	*/
	add_action('travolo_blog_readmore_btn','travolo_blog_readmore_btn_cb'); 

	/**
	* Hook for Blog Post Excerpt 
	*/
	add_action('travolo_blog_post_excerpt','travolo_blog_post_excerpt_cb');

	/**
	* Hook for footer content
	*/
	add_action( 'travolo_footer_content', 'travolo_footer_content_cb', 10 );

	/**
	* Hook for main wrapper end
	*/
	add_action( 'travolo_main_wrapper_end', 'travolo_main_wrapper_end_cb', 10 );

	/**
	* Hook for Back to Top Button
	*/
	add_action( 'travolo_back_to_top', 'travolo_back_to_top_cb', 10 );

	/**
	* Hook for Page Start Wrapper
	*/
	add_action( 'travolo_page_start_wrap', 'travolo_page_start_wrap_cb', 10 );

	/**
	* Hook for Page End Wrapper
	*/
	add_action( 'travolo_page_end_wrap', 'travolo_page_end_wrap_cb', 10 );

	/**
	* Hook for Page Column Start Wrapper
	*/
	add_action( 'travolo_page_col_start_wrap', 'travolo_page_col_start_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'travolo_page_col_end_wrap', 'travolo_page_col_end_wrap_cb', 10 );

	/**
	* Hook for Page Column End Wrapper
	*/
	add_action( 'travolo_page_sidebar', 'travolo_page_sidebar_cb', 10 );

	/**
	* Hook for Page Content
	*/
	add_action( 'travolo_page_content', 'travolo_page_content_cb', 10 );