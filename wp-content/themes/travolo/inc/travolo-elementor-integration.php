<?php

$kit_id            = get_option( 'elementor_active_kit' );
$elmentor_new_meta = get_post_meta( $kit_id, '_elementor_page_settings' );
$elmentor_new_meta = [

    'system_colors' => [
        '_id'   => 'primary',
        'name'  => 'Primary',
        'color' => '#00000',
    ],

];

$elmentor_old_meta = get_post_meta( $kit_id, '_elementor_page_settings' );

function travolo_opt_update_globals_from_elementor() {
    $travolo_opt = get_option( 'travolo_opt' );

    $kit_id = get_option( 'elementor_active_kit' );

    $meta_old = get_post_meta( $kit_id, '_elementor_page_settings', true );

    if ( !is_wp_error( $meta_old ) && is_array( $meta_old ) ) {
        $meta_new = $meta_old;
    } else {
    }

    $meta_new = [
        'system_colors'     => [],
        'system_typography' => [],
        '__globals__'       => [],
    ];

    $meta_new['system_colors'][0] = [
        '_id'   => 'travolo_opt_primary',
        'title' => 'Primary',
        'color' => $travolo_opt['travolo_primary'],
    ];
    $meta_new['system_colors'][1] = [
        '_id'   => 'travolo_opt_secondary',
        'title' => 'Secondary',
        'color' => $travolo_opt['travolo_secondary'],
    ];
    $meta_new['system_colors'][2] = [
        '_id'   => 'travolo_opt_secondary_two',
        'title' => 'Secondary',
        'color' => $travolo_opt['travolo_secondary_two'],
    ];

    $meta_new['system_colors'][3] = [
        '_id'   => 'travolo_opt_headline',
        'title' => 'Heading',
        'color' => $travolo_opt['travolo_heading_color'],
    ];

    $meta_new['system_colors'][4] = [
        '_id'   => 'travolo_opt_body',
        'title' => 'Body',
        'color' => $travolo_opt['travolo_body_color'],
    ];

    $meta_new['system_colors'][5] = [
        '_id'   => 'travolo_opt_body_bg',
        'title' => 'Body Background',
        'color' => $travolo_opt['travolo_body_bg'],
    ];

    $meta_new['system_colors'][6] = [
        '_id'   => 'travolo_opt_light_color',
        'title' => 'Light Color',
        'color' => $travolo_opt['light_color'],
    ];
    $meta_new['system_colors'][7] = [
        '_id'   => 'travolo_opt_black_color',
        'title' => 'Black Color',
        'color' => $travolo_opt['black_color'],
    ];
    $meta_new['system_colors'][8] = [
        '_id'   => 'travolo_opt_white_color',
        'title' => 'White Color',
        'color' => $travolo_opt['white_color'],
    ];
    $meta_new['system_colors'][9] = [
        '_id'   => 'travolo_opt_yellow_color',
        'title' => 'Yellow Color',
        'color' => $travolo_opt['yellow_color'],
    ];
    $meta_new['system_colors'][10] = [
        '_id'   => 'travolo_opt_success_color',
        'title' => 'Success Color',
        'color' => $travolo_opt['success_color'],
    ];
    $meta_new['system_colors'][11] = [
        '_id'   => 'travolo_opt_error_color',
        'title' => 'Error Color',
        'color' => $travolo_opt['error_color'],
    ];
    $meta_new['system_colors'][12] = [ 
        '_id'   => 'travolo_opt_border_color',
        'title' => 'Border Color',
        'color' => $travolo_opt['border_color'],
    ];
    $meta_new['system_colors'][13] = [
        '_id'   => 'travolo_opt_travolo_smoke',
        'title' => 'Smoke Color',
        'color' => $travolo_opt['travolo_smoke'],
    ];
    $result = update_post_meta( $kit_id, '_elementor_page_settings', $meta_new );

    //update site kit css (will generate the new css with the new globals)
    if ( class_exists( '\Elementor\Plugin' ) ) {
        $elem_clear_cache = new \Elementor\Core\Files\Manager();
        $elem_clear_cache->clear_cache();
    }

    return $result;
}
add_action( 'redux/options/travolo_opt/saved', 'travolo_opt_update_globals_from_elementor' );
$travolo_opt = get_option( 'travolo_opt' );