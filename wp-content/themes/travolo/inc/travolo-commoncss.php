<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// enqueue css
function travolo_common_custom_css(){
	wp_enqueue_style( 'travolo-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = travolo_opt( 'travolo_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	}else{
		$CustomCssOpt = '';
	}

    $customcss = "";

    if( get_header_image() ){
        $travolo_header_bg =  get_header_image();
    }else{
        if( travolo_meta( 'page_breadcrumb_settings' ) == 'page' && is_page() ){
            if( ! empty( travolo_meta( 'breadcumb_image' ) ) ){
                $travolo_header_bg = travolo_meta( 'breadcumb_image' );
            }
        }
    }

    if( !empty( $travolo_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$travolo_header_bg}')!important;
        }";
    }



	// theme color
	$travolo_primary 	    = travolo_opt('travolo_primary');
	$travolo_secondary      = travolo_opt('travolo_secondary');
	$travolo_secondary_two  = travolo_opt('travolo_secondary_two');
	$travolo_heading_color  = travolo_opt('travolo_heading_color');
	$travolo_body_color     = travolo_opt('travolo_body_color');
	$travolo_body_bg        = travolo_opt('travolo_body_bg');
	$light_color            = travolo_opt('light_color');
	$black_color            = travolo_opt('black_color');
	$white_color            = travolo_opt('white_color');
	$travolo_smoke          = travolo_opt('travolo_smoke');
	$yellow_color           = travolo_opt('yellow_color');
	$success_color          = travolo_opt('success_color');
	$error_color            = travolo_opt('error_color');
	$border_color           = travolo_opt('border_color');

	
	if( !empty( $travolo_primary ) ) {
		$customcss .= ":root {
		  --theme-color: {$travolo_primary};
		}";
	}

	if( !empty( $travolo_secondary ) ) {
		$customcss .= ":root {
			--theme-color2: {$travolo_secondary};
		}";
	}

	if( !empty( $travolo_secondary_two ) ) {
		$customcss .= ":root {
			--vs-secondary-color: {$travolo_secondary_two};
		}";
	}

	if( !empty( $travolo_heading_color ) ) {
		$customcss .= ":root {
			--title-color: {$travolo_heading_color};
		}";
	}

	if( !empty( $travolo_body_color ) ) {
		$customcss .= ":root {
			--body-color: {$travolo_body_color};
		}";
	}

	if( !empty( $travolo_body_bg ) ) {
		$customcss .= ":root {
			--body-bg: {$travolo_body_bg};
		}";
	}

	if( !empty( $light_color ) ) {
		$customcss .= ":root {
			--light-color: {$light_color};
		}";
	}

	if( !empty( $travolo_smoke ) ) {
		$customcss .= ":root {
			--smoke-color: {$travolo_smoke};
		}";
	}

	if( !empty( $black_color ) ) {
		$customcss .= ":root {
			--black-color: {$black_color};
		}";
	}

	if( !empty( $white_color  ) ) {
		$customcss .= ":root {
			--white-color: {$white_color };
		}";
	}

	if( !empty( $success_color ) ) {
		$customcss .= ":root {
			--success-color: {$success_color};
		}";
	}

	if( !empty( $error_color ) ) {
		$customcss .= ":root {
			--error-color: {$error_color};
		}";
	}

	if( !empty( $border_color ) ) {
		$customcss .= ":root {
			--border-colors: {$border_color};
		}";
	}

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'travolo-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'travolo_common_custom_css', 100 );