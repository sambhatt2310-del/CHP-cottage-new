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
    exit;
}

 // theme option callback
function travolo_opt( $id = null, $url = null ){
    global $travolo_opt;

    if( $id && $url ){

        if( isset( $travolo_opt[$id][$url] ) && $travolo_opt[$id][$url] ){
            return $travolo_opt[$id][$url];
        }
    }else{
        if( isset( $travolo_opt[$id] )  && $travolo_opt[$id] ){
            return $travolo_opt[$id];
        }
    }
}

add_image_size( 'blog-post-pagination',80,80,true );

// theme logo
function travolo_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= travolo_img_tag( array(
            "class" => "img-fluid logo-img",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !travolo_opt('travolo_text_title') && travolo_opt('travolo_site_logo', 'url' )  ){

        $siteLogo = '<img class="img-fluid logo-img" src="'.esc_url( travolo_opt('travolo_site_logo', 'url' ) ).'" alt="'.esc_attr__( 'logo', 'travolo' ).'" />';
        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';


    }elseif( travolo_opt('travolo_text_title') ){
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( travolo_opt('travolo_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}




// Travolo Coming Soon Logo
function travolo_coming_soon_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    // site logo
    if( travolo_opt( 'travolo_coming_logo', 'url' )  ){

        $siteLogo = '<img src="'.esc_url( travolo_opt('travolo_coming_logo', 'url' ) ).'" alt="'.esc_attr__( 'logo', 'travolo' ).'" />';

        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';

    }elseif( travolo_opt('travolo_coming_site_title') ){
        return '<h2 class="mb-0"><a class="text-logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( travolo_opt('travolo_coming_site_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="text-logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// custom meta id callback
function travolo_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_travolo_'.$id, true );
    return $value;
}


// Blog Date Permalink
function travolo_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function travolo_iframe_match() {
    $audio_content = travolo_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function travolo_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function travolo_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'travolo' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'travolo' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


// Data Background image attr
function travolo_data_bg_attr( $imgUrl = '' ){
    return 'data-bg-img="'.esc_url( $imgUrl ).'"';
}

// image alt tag
function travolo_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function travolo_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function travolo_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'travolo_pingback_header' );


// Excerpt More
function travolo_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'travolo_excerpt_more' );


// Author info fucntion
function travolo_display_author_information() {
    // Get the author ID for the current post
    $author_id = get_post_field('post_author');

    // Get the author's display name
    $author_name = get_the_author_meta('nickname', $author_id);

    // Get the author's avatar (profile picture)
    $author_avatar = get_avatar_url($author_id);

    // Get the author's role (e.g., CEO, Vecuro)
    $author_role = get_the_author_meta('user_description', $author_id);

    // Display the author information
    echo '<div class="blog-inner-author">';
    echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr($author_name) . '\'s avatar">';
    echo '<a href="' . esc_url(get_author_posts_url($author_id)) . '" class="author-name">' . esc_html($author_name) . '</a>';
    echo '<span class="author-degi">' . esc_html($author_role) . '</span>';
    echo '</div>';
}


// travolo comment template callback
function travolo_comment_callback( $comment, $args, $depth ) {
        $add_below = 'comment';
    ?>
    <li <?php comment_class( array('vs-comment') ); ?>>
        <div id="comment-<?php comment_ID() ?>" class="vs-post-comment">
            <?php
                if( get_avatar( $comment, 110 )  ) :
            ?>
            <!-- Author Image -->
            <div class="comment-avater">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, 110 );
                    }
                ?>
            </div>
            <!-- Author Image -->
            <?php
                endif;
            ?>
            <!-- Comment Content -->
            <div class="comment-content">
                <span class="commented-on"> 
                    <?php echo '<i class="fal fa-calendar-alt"></i>'; ?>
                    <?php printf( esc_html__('%1$s', 'travolo'), get_comment_date() ); ?> 
                </span>
                <h4 class="name h4"><?php echo esc_html( ucwords( get_comment_author() ) ); ?></h4>
                <?php comment_text(); ?>
                <div class="reply_and_edit">
                    <?php
                        comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply <i class="fas fa-reply"></i>' ) ) );
                    ?>
                    <span class="comment-edit-link pl-10">
                        <?php edit_comment_link( '<i class="fas fa-pencil"></i>'.esc_html__( 'Edit', 'travolo' ), '  ', '' ); ?>
                    </span>
                </div>

                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'travolo' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comment Content -->
<?php
}

//body class
add_filter( 'body_class', 'travolo_body_class' );
function travolo_body_class( $classes ) {
    if( class_exists('ReduxFramework') ) {
        $travolo_blog_single_sidebar = travolo_opt('travolo_blog_single_sidebar');
        if( ($travolo_blog_single_sidebar != '2' && $travolo_blog_single_sidebar != '3' ) || ! is_active_sidebar('travolo-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    } else {
        if( !is_active_sidebar('travolo-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    }
    return $classes;
}


function travolo_footer_global_option(){

    // Travolo Footer Bottom Enable Disable
    if( class_exists( 'ReduxFramework' ) ){
        $travolo_footer_bottom_active = travolo_opt( 'travolo_disable_footer_bottom' );
    }else{
        $travolo_footer_bottom_active = '1';
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
    );

    if( $travolo_footer_bottom_active == '1' ){
        echo '<!-- Footer -->';
        echo '<footer class="footer-wrapper footer-layout1">';

            if( $travolo_footer_bottom_active == '1' ){
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
                echo '<div class="copyright-wrap">';
                    echo '<div class="container">';
                        echo '<div class="row align-items-center">';
                            if( ! empty( travolo_opt( 'travolo_copyright_text' ) ) ){
                                echo '<p class="copyright-text">'.wp_kses( travolo_opt( 'travolo_copyright_text' ), $allowhtml ).'</p>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</footer>';
        echo '<!-- End Footer -->';
    }
}

function travolo_social_icon(){
    $travolo_social_icon = travolo_opt( 'travolo_social_links' );
    if( ! empty( $travolo_social_icon ) && isset( $travolo_social_icon ) ){
        foreach( $travolo_social_icon as $social_icon ){
            if( ! empty( $social_icon['title'] ) ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i>'.esc_html( $social_icon['description'] ).'</a>';
            }
        }
    } 
}


// global header
function travolo_global_header_option() {
    travolo_global_header();
    echo '<header class="vs-header header-layout1 header-default">';
        echo '<div class="sticky-active py-3 py-lg-0">';
            echo '<div class="container position-relative">';
                echo '<div class="row align-items-center justify-content-between">';
                    echo '<div class="col-auto align-self-center">';
                        echo '<div class="header-logo">';
                            echo travolo_theme_logo();
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col text-center">';
                        if( has_nav_menu( 'primary-menu' ) ){
                            echo '<nav class="main-menu menu-style1 d-none d-lg-block">';
                                wp_nav_menu( array(
                                    "theme_location"    => 'primary-menu',
                                    "container"         => '',
                                    "menu_class"        => ''
                                ) );
                            echo '</nav>';
                        }
                        
                    echo '</div>';

                    echo '<div class="col-auto">';
                        echo '<!-- Search Toggler -->';
                        echo '<div class="header-btns">';
                            echo '<button class="searchBoxTggler icon-btn"><i class="far fa-search"></i></button>';
                        echo '</div>';
                    echo '</div>';
                    
                    echo '<div class="col-auto  d-inline-block d-lg-none">';
                        echo '<!-- Mobile Menu Toggler -->';
                        echo '<button class="vs-menu-toggle icon-btn"><i class="far fa-bars"></i></button>';
                    echo '</div>';


                echo '</div>';
            echo '</div>';
        echo '</div>';
        if( ! empty( travolo_opt( 'travolo_notice_text' ) ) ){
            echo '<div class="header-notice d-none d-md-block">';
                echo '<div class="container">';
                    echo '<p class="mb-0 fs-xs text-title">'.esc_html( travolo_opt( 'travolo_notice_text' ) ).'</p>';
                echo '</div>';
            echo '</div>';
        } 
    echo '</header>';

    echo '<div class="popup-search-box">';
            echo '<button class="searchClose"><i class="fal fa-times"></i></button>';
        echo '<form action="'.esc_url( home_url() ).'" class="header-search">';
            echo '<input name="s" type="text" placeholder="'.esc_html( 'What are you looking for', 'travolo' ).'">';
            echo '<button type="submit" aria-label="search-button"><i class="far fa-search"></i></button>';
        echo '</form>';
    echo '</div>';

}

// Travolo Default Header
if( ! function_exists( 'travolo_global_header' ) ){
    function travolo_global_header(){
        // Mobile Menu
        echo '<div class="vs-menu-wrapper">';
            echo '<div class="vs-menu-area">';
                echo '<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>';
                echo '<div class="mobile-logo">';
                    echo travolo_theme_logo();
                echo '</div>';
                if( has_nav_menu( 'mobile-menu' ) ){
                    echo '<div class="vs-mobile-menu link-inherit">';
                        wp_nav_menu( array(
                            "theme_location"    => 'mobile-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    echo '</div>';
                }
            echo '</div>';
        echo '</div>';
    }
}
// travolo woocommerce breadcrumb
function travolo_woo_breadcrumb( $args ) {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcumb-menu">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'travolo' ),
    );
}
add_filter( 'woocommerce_breadcrumb_defaults', 'travolo_woo_breadcrumb' );

function travolo_custom_search_form( $class ) {
    echo '<!-- Search Form -->';
    echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'" class="'.esc_attr( $class ).'">';
        echo '<label class="searchIcon">';
            echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'travolo').'">';
        echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}
//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'travolo_remove_tagcloud_inline_style',10,1 );
function travolo_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

// password protected form
add_filter('the_password_form','travolo_password_form',10,1);
function travolo_password_form( $output ) {
    $output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post"><div class="theme-input-group">
        <input name="post_password" type="password" class="theme-input-style" placeholder="'.esc_attr__( 'Enter Password','travolo' ).'">
        <button type="submit" class="submit-btn btn-fill">'.esc_html__( 'Enter','travolo' ).'</button></div></form>';
    return $output;
}

function travolo_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function travolo_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0 Views', 'travolo' );
    }
    return $count;   
}

// This code filters the Categories archive widget to include the post count inside a span tag
add_filter('wp_list_categories', 'travolo_cat_add_count_span');

function travolo_cat_add_count_span($links) {
    $links = preg_replace_callback('/(<\/a>)( \([0-9]+\))/', function ($matches) {
        return $matches[1] . ' <span class="post-count">' . $matches[2] . '</span>';
    }, $links);
    return $links;
}




/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'travolo_archive_remove_count' );
function travolo_archive_remove_count( $links ) {
    $links = preg_replace('/<\/a>&nbsp;\([0-9]+\)/', '</a>', $links);
    return $links;
}

// Blog Category
if( ! function_exists( 'travolo_blog_category' ) ){
    function travolo_blog_category(){
        if( class_exists( 'ReduxFramework' ) ){
            $travolo_display_post_category =  travolo_opt('travolo_display_post_category');
        }else{
            $travolo_display_post_category = '1';
        }


        if( $travolo_display_post_category ){
            $travolo_post_categories = get_the_category();
            if( is_array( $travolo_post_categories ) && ! empty( $travolo_post_categories ) ){
                echo '<div class="blog-category ">';
                    echo ' <a href="'.esc_url( get_term_link( $travolo_post_categories[0]->term_id ) ).'">'.esc_html( $travolo_post_categories[0]->name ).'</a> ';
                echo '</div>';
            }
        }
    }
}

// Add Extra Class On Comment Reply Button
function travolo_custom_comment_reply_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'travolo_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function travolo_custom_edit_comment_link( $content ) {
    $extra_classes = 'replay-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'travolo_custom_edit_comment_link', 99);


function travolo_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        if( ! is_single() ){
            if( travolo_opt( 'travolo_blog_style' ) == '3' ){
                $classes[] = "vs-blog blog-grid grid-wide";
            }else{
                $classes[] = "vs-blog blog-single";
            }
        }else{
            $classes[] = "vs-blog blog-single";
        }
    }elseif( get_post_type() === 'product' ){
        // Return Class
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }

    return $classes;
}
add_filter( 'post_class', 'travolo_post_classes', 10, 3 );