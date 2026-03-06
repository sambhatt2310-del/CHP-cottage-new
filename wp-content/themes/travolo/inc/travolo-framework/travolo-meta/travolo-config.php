<?php

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

 /**
 * Only return default value if we don't have a post ID (in the 'post' query variable)
 *
 * @param  bool  $default On/Off (true/false)
 * @return mixed          Returns true or '', the blank default
 */
function travolo_set_checkbox_default_for_new_post( $default ) {
	return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}

add_action( 'cmb2_admin_init', 'travolo_register_metabox' );

/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */

function travolo_register_metabox() {

	$prefix = '_travolo_';

	$prefixpage = '_travolopage_';

	$travolo_service_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'service_page_control',
		'title'         => esc_html__( 'Service Page Controller', 'travolo' ),
		'object_types'  => array( 'travolo_service' ), // Post type
		'closed'        => true
	) );
	$travolo_service_meta->add_field( array(
		'name' => esc_html__( 'Write Flaticon Class', 'travolo' ),
	   	'desc' => esc_html__( 'Write Flaticon Class For The Icon', 'travolo' ),
	   	'id'   => $prefix . 'flat_icon_class',
		'type' => 'text',
    ) );

	$travolo_post_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'blog_post_control',
		'title'         => esc_html__( 'Post Thumb Controller', 'travolo' ),
		'object_types'  => array( 'post' ), // Post type
		'closed'        => true
	) );
	$travolo_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Video', 'travolo' ),
		'desc' => esc_html__( 'Use This Field When Post Format Video', 'travolo' ),
		'id'   => $prefix . 'post_format_video',
        'type' => 'text_url',
    ) );
	$travolo_post_meta->add_field( array(
		'name' => esc_html__( 'Post Format Audio', 'travolo' ),
		'desc' => esc_html__( 'Use This Field When Post Format Audio', 'travolo' ),
		'id'   => $prefix . 'post_format_audio',
        'type' => 'oembed',
    ) );
	$travolo_post_meta->add_field( array(
		'name' => esc_html__( 'Post Thumbnail For Slider', 'travolo' ),
		'desc' => esc_html__( 'Use This Field When You Want A Slider In Post Thumbnail', 'travolo' ),
		'id'   => $prefix . 'post_format_slider',
        'type' => 'file_list',
    ) );

	$travolo_page_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_meta_section',
		'title'         => esc_html__( 'Page Meta', 'travolo' ),
		'object_types'  => array( 'page' ), // Post type
        'closed'        => true
    ) );

    $travolo_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Area', 'travolo' ),
		'desc' => esc_html__( 'check to display page breadcrumb area.', 'travolo' ),
		'id'   => $prefix . 'page_breadcrumb_area',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   => esc_html__('Show','travolo'),
            '2'     => esc_html__('Hide','travolo'),
        )
    ) );


    $travolo_page_meta->add_field( array(
		'name' => esc_html__( 'Page Breadcrumb Settings', 'travolo' ),
		'id'   => $prefix . 'page_breadcrumb_settings',
        'type' => 'select',
        'default'   => 'global',
        'options'   => array(
            'global'   => esc_html__( 'Global Settings', 'travolo' ),
            'page'     => esc_html__( 'Page Settings', 'travolo' ),
        )
	) );

	$travolo_page_meta->add_field( array(
	    'name'    => esc_html__( 'Breadcumb Image', 'travolo' ),
	    'desc'    => esc_html__( 'Upload an image or enter an URL.', 'travolo' ),
	    'id'      => $prefix . 'breadcumb_image',
	    'type'    => 'file',
	    // Optional:
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => __( 'Add File', 'travolo' ) // Change upload button text. Default: "Add or Upload File"
	    ),
	    'preview_size' => 'large', // Image size to use when previewing in the admin.
	) );

    $travolo_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title', 'travolo' ),
		'desc' => esc_html__( 'check to display Page Title.', 'travolo' ),
		'id'   => $prefix . 'page_title',
        'type' => 'select',
        'default' => '1',
        'options'   => array(
            '1'   	=> esc_html__( 'Show','travolo'),
            '2'     => esc_html__( 'Hide','travolo'),
        )
	) );

    $travolo_page_meta->add_field( array(
		'name' => esc_html__( 'Page Title Settings', 'travolo' ),
		'id'   => $prefix . 'page_title_settings',
        'type' => 'select',
        'options'   => array(
            'default'  => esc_html__('Default Title','travolo'),
            'custom'  => esc_html__('Custom Title','travolo'),
        ),
        'default'   => 'default'
    ) );

    $travolo_page_meta->add_field( array(
		'name' => esc_html__( 'Custom Page Title', 'travolo' ),
		'id'   => $prefix . 'custom_page_title',
        'type' => 'text'
    ) );

    $travolo_page_meta->add_field( array(
		'name' => esc_html__( 'Breadcrumb', 'travolo' ),
		'desc' => esc_html__( 'Select Show to display breadcrumb area', 'travolo' ),
		'id'   => $prefix . 'page_breadcrumb_trigger',
        'type' => 'switch_btn',
        'default' => travolo_set_checkbox_default_for_new_post( true ),
    ) );

    $travolo_layout_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'page_layout_section',
		'title'         => esc_html__( 'Page Layout', 'travolo' ),
        'context' 		=> 'side',
        'priority' 		=> 'high',
        'object_types'  => array( 'page' ), // Post type
        'closed'        => true
	) );

	$travolo_layout_meta->add_field( array(
		'desc'       => esc_html__( 'Set page layout container,container fluid,fullwidth or both. It\'s work only in template builder page.', 'travolo' ),
		'id'         => $prefix . 'custom_page_layout',
		'type'       => 'radio',
        'options' => array(
            '1' => esc_html__( 'Container', 'travolo' ),
            '2' => esc_html__( 'Container Fluid', 'travolo' ),
            '3' => esc_html__( 'Fullwidth', 'travolo' ),
        ),
	) );

	$travolo_product_meta = new_cmb2_box( array(
		'id'            => $prefixpage . 'product_meta_section',
		'title'         => esc_html__( 'Swap Image', 'travolo' ),
		'object_types'  => array( 'product' ), // Post type
		'closed'        => true,
		'context'		=> 'side',
		'priority'		=> 'default'
	) );

	$travolo_product_meta->add_field( array(
		'name' 		=> esc_html__( 'Product Swap Image', 'travolo' ),
		'desc' 		=> esc_html__( 'Set Product Swap Image', 'travolo' ),
		'id'   		=> $prefix.'product_swap_image',
		'type'    	=> 'file',
		// Optional:
		'options' 	=> array(
			'url' 		=> false, // Hide the text input for the url
		),
		'text'    	=> array(
			'add_upload_file_text' => __( 'Add Swap Image', 'travolo' ) // Change upload button text. Default: "Add or Upload File"
		),
	) );
}

add_action( 'cmb2_admin_init', 'travolo_register_taxonomy_metabox' );
/**
 * Hook in and add a metabox to add fields to taxonomy terms
 */
function travolo_register_taxonomy_metabox() {

    $prefix = '_travolo_';
	/**
	 * Metabox to add fields to categories and tags
	 */
	$travolo_term_meta = new_cmb2_box( array(
		'id'               => $prefix.'term_edit',
		'title'            => esc_html__( 'Category Metabox', 'travolo' ),
		'object_types'     => array( 'term' ),
		'taxonomies'       => array( 'category'),
	) );
	$travolo_term_meta->add_field( array(
		'name'     => esc_html__( 'Extra Info', 'travolo' ),
		'id'       => $prefix.'term_extra_info',
		'type'     => 'title',
		'on_front' => false,
	) );
	$travolo_term_meta->add_field( array(
		'name' => esc_html__( 'Category Image', 'travolo' ),
		'desc' => esc_html__( 'Set Category Image', 'travolo' ),
		'id'   => $prefix.'term_avatar',
        'type' => 'file',
        'text'    => array(
			'add_upload_file_text' => esc_html__('Add Image','travolo') // Change upload button text. Default: "Add or Upload File"
		),
	) );



	/**
	 * Metabox to add fields to destinations
	 */
	$travolo_term_destinations = new_cmb2_box( array(
		'id'               => $prefix.'destinations',
		'title'            => esc_html__( 'Destinations Metabox', 'travolo' ),
		'object_types'     => array( 'travolo_destinations' ),
	) );
	$travolo_term_destinations->add_field( array(
		'name'     => esc_html__( 'Destination Price', 'travolo' ),
		'id'       => $prefix.'destination-price',
		'type'     => 'text',
		'default'  => esc_html__( '$299','travolo' ),
	) );

	

	/**
	 * Metabox to add fields to class widget
	 */
	
	 $travolo_term_class = new_cmb2_box( array(
		'id'               => $prefix.'class',
		'title'            => esc_html__( 'class Metabox', 'travolo' ),
		'object_types'     => array( 'travolo_class' ),
	) );

	$travolo_term_class->add_field( array(
		'name'     => esc_html__( 'Class Info', 'travolo' ),
		'id'       => $prefix.'class_list',
		'type'     => 'wysiwyg',
		'default'  => esc_html__( '11 - 13 Years','travolo' ),
	) );


	$travolo_term_class->add_field( array(
		'name'     => esc_html__( 'Price', 'travolo' ),
		'id'       => $prefix.'class_price',
		'type'     => 'text',
		'default'  => esc_html__( '$29','travolo' ),
	) );
	
	$travolo_term_class->add_field( array(
		'name'     => esc_html__( 'Duration', 'travolo' ),
		'id'       => $prefix.'class_duration',
		'type'     => 'text',
		'default'  => esc_html__( '/ month','travolo' ),
	) );


	/**
	 * Metabox to add fields to Teachers widget
	 */
	
	 $travolo_term_teachers = new_cmb2_box( array(
		'id'               => $prefix.'teachers',
		'title'            => esc_html__( 'Teachers Metabox', 'travolo' ),
		'object_types'     => array( 'travolo_teacher' ),
	) );

	$travolo_term_teachers->add_field( array(
		'name'     => esc_html__( 'Designation', 'travolo' ),
		'id'       => $prefix.'teachers_designation',
		'type'     => 'text',
		'default'  => esc_html__( 'Principal and Manager','travolo' ),
	) );

	$travolo_term_teachers->add_field( array(
		'name'     => esc_html__( 'Phone Number', 'travolo' ),
		'id'       => $prefix.'teachers_number',
		'type'     => 'text',
		'default'  => esc_html__( '+44 (0) 207 689 7888','travolo' ),
	) );

	$profiles_group = $travolo_term_teachers->add_field( array(
        'id'          => $prefix . 'profiles',
        'type'        => 'group',
        'description' => __( 'Add social profiles', 'travolo' ),
        'options'     => array(
            'group_title'   => __( 'Profile {#}', 'travolo' ),
            'add_button'    => __( 'Add Another Profile', 'travolo' ),
            'remove_button' => __( 'Remove Profile', 'travolo' ),
            'sortable'      => true,
        ),
    ) );

    // Add fields to the repeatable group
    $travolo_term_teachers->add_group_field( $profiles_group, array(
        'name' => __( 'Social Network', 'travolo' ),
        'id'   => 'network',
        'type' => 'text',
    ) );

    $travolo_term_teachers->add_group_field( $profiles_group, array(
        'name' => __( 'Profile URL', 'travolo' ),
        'id'   => 'url',
        'type' => 'text_url',
    ) );

}
