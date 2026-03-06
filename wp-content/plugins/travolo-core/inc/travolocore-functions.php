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

/**
 * Single Template
 */
add_filter( 'single_template', 'travolo_core_template_redirect' );

if( ! function_exists( 'travolo_core_template_redirect' ) ){
    function travolo_core_template_redirect( $single_template ){

        global $post;

        // teacher Single Page
        if( $post ){
            if( $post->post_type == 'travolo_teacher' ){
                $single_template = TRAVOLO_CORE_PLUGIN_TEMP . 'single-travolo_destinations.php';
            }
        }

        return $single_template;
    }
}


/**
 * Archive Template
 */
add_filter( 'archive_template', 'travolo_core_template_archive' );

if( ! function_exists( 'travolo_core_template_archive' ) ){
    function travolo_core_template_archive( $archive_template ){

        global $post;

        // Service Archive Template
        if( $post ){
            if( $post->post_type == 'travolo_class' ){
                $archive_template = TRAVOLO_CORE_PLUGIN_TEMP . 'archive-travolo_class.php';
            }
        }

        return $archive_template;
    }
}


/**
 * Meta Output
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'travolo_get_meta' ) ) {
  function travolo_get_meta( $data ) {
      global $wp_embed;
      $travolo_content = $wp_embed->autoembed( $data );
      $travolo_content = $wp_embed->run_shortcode( $travolo_content );
      $travolo_content = do_shortcode( $travolo_content );
      $travolo_content = wpautop( $travolo_content );
      return $travolo_content;
  }
}


/**
 * Admin Custom Login Logo
 */
function travolo_custom_login_logo() {
  $logo = ! empty( travolo_opt( 'travolo_admin_login_logo', 'url' ) ) ? travolo_opt( 'travolo_admin_login_logo', 'url' ) : '' ;
  if( isset( $logo ) && !empty( $logo ) )
      echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
}
add_action( 'login_enqueue_scripts', 'travolo_custom_login_logo' );

/**
* Admin Custom css
*/
add_action( 'admin_enqueue_scripts', 'travolo_admin_styles' );

function travolo_admin_styles() {
  // $travolo_admin_custom_css = ! empty( travolo_opt( 'travolo_theme_admin_custom_css' ) ) ? travolo_opt( 'travolo_theme_admin_custom_css' ) : '';
  if ( ! empty( $travolo_admin_custom_css ) ) {
      $travolo_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $travolo_admin_custom_css);
      echo '<style rel="stylesheet" id="travolo-admin-custom-css" >';
              echo esc_html( $travolo_admin_custom_css );
      echo '</style>';
  }
}

 // share button code
 function travolo_social_sharing_buttons( ) {

  // Get page URL
  $URL = get_permalink();
  $Sitetitle = get_bloginfo('name');

  // Get page title
  $Title = str_replace( ' ', '%20', get_the_title());


  // Construct sharing URL without using any script

  $twitterURL = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
  $pinteresturl = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
  $linkedin = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );


  // Add sharing button at the end of page/page content
$content = '';

  $content .= '<li><a class="facebook" href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
  $content .= '<li><a class="twitter" href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
  $content .= '<li><a class="instagram" href="'.esc_url( $pinteresturl ).'" target="_blank"><i class="fab fa-pinterest"></i></a></li>';
  $content .= '<li><a class="linkedin" href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin"></i></a></li>';
  return $content;
};

//add SVG to allowed file uploads
function travolo_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svgz+xml';
  $mimes['exe'] = 'program/exe';
  $mimes['dwg'] = 'image/vnd.dwg';
  return $mimes;
}
add_filter('upload_mimes', 'travolo_mime_types');

function travolo_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {
    $wp_filetype = wp_check_filetype( $filename, $mimes );
    $ext         = $wp_filetype['ext'];
    $type        = $wp_filetype['type'];
    $proper_filename = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );
}
add_filter('wp_check_filetype_and_ext','travolo_wp_check_filetype_and_ext',10,4);

if( ! function_exists('travolo_get_user_role_name') ){
    function travolo_get_user_role_name( $user_ID ){
        global $wp_roles;

        $user_data      = get_userdata( $user_ID );
        $user_role_slug = $user_data->roles[0];
        return translate_user_role( $wp_roles->roles[$user_role_slug]['name'] );
    }
}


add_filter('wpcf7_autop_or_not', '__return_false');
add_image_size( 'blog-sidebar-size',100,100,true ); 
add_image_size( 'blog-sidebar-size-thumb',90,80,true ); 
add_image_size( 'blog-post-one',705,540,true );
add_image_size( 'blog-post-two',342,252,true );
add_image_size( 'travolo-destinations-image',389,442,true );
add_image_size( 'travolo-related-post-size',270,314,true );



/**
* Enqueue block editor JavaScript and CSS
*/
function travolo_widget_editor_scripts() {

  // Make paths variables so we don't write em twice 
  // $blockPath = '../assets/js/blocks.js';

  // Enqueue the bundled block JS file
  wp_enqueue_script(
      'travolo-blocks-js', TRAVOLO_PLUGDIRURI . 'assets/js/blocks.js',
      [  'wp-blocks', 'wp-element', 'wp-components', 'wp-i18n' ],
      '1.00',
      true
  );
}
// Hook scripts function into block editor hook
add_action( 'enqueue_block_editor_assets', 'travolo_widget_editor_scripts' );




/**
 * Post Category
 */
if( ! function_exists( 'travolo_travolos_category' ) ){
  function travolo_travolos_category(){
      $cat_array = array();
      $cat_array[] = esc_html__( 'Select a category','travolo' );
      $terms = get_terms( array(
          'taxonomy'      => 'travolo_category',
          'hide_empty'    => true
      ) );
      if( is_array( $terms ) && $terms ){
          foreach( $terms as $term ){
              $cat_array[$term->slug] = $term->name;
          }
      }
      return $cat_array;
  }
}

/**
 * Post orderby list
 */
function travolo_get_post_orderby_options()
{
    $orderby = array(
        'ID' => 'Post ID',
        'author' => 'Post Author',
        'title' => 'Title',
        'date' => 'Date',
        'modified' => 'Last Modified Date',
        'parent' => 'Parent Id',
        'rand' => 'Random',
        'comment_count' => 'Comment Count',
        'menu_order' => 'Menu Order',
    );
    $orderby = apply_filters('travolo_post_orderby', $orderby);
    return $orderby;
}

/**
 * Get Posts
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'travolo_get_all_posts' ) ) {
    function travolo_get_all_posts($posttype)
    {
        $args = array(
            'post_type' => $posttype,
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $post_list = array();
        if( $data = get_posts($args)){
            foreach($data as $key){
                $post_list[$key->ID] = $key->post_title;
            }
        }
        return  $post_list;
    }
}



/**
 * Responsive Column Order
 *
 */
function travolo_add_responsive_column_order( $element, $args ) {
	$element->add_responsive_control(
		'responsive_column_order',
		[
			'label' => __( 'Responsive Column Order', 'travolo' ),
			'type' => \Elementor\Controls_Manager::NUMBER,
			'separator' => 'before',
			'selectors' => [
				'{{WRAPPER}}' => '-webkit-order: {{VALUE}}; -ms-flex-order: {{VALUE}}; order: {{VALUE}};',
			],
		]
	);
}
add_action( 'elementor/element/column/layout/before_section_end', 'travolo_add_responsive_column_order', 10, 2 );