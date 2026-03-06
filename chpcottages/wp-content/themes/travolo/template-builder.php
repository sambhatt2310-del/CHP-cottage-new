<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( );
}
/**
 * @Packge    : Travolo
 * @version   : 1.0
 * @Author    : Vecurosoft
 * @Author URI: https://www.vecurosoft.com/
 * Template Name: Template Builder
 */

//Header
get_header();

// Container or wrapper div
$travolo_layout = travolo_meta( 'custom_page_layout' );

if( $travolo_layout == '1' ){
	echo '<div class="travolo-main-wrapper">';
		echo '<div class="container">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}elseif( $travolo_layout == '2' ){
    echo '<div class="travolo-main-wrapper">';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
				echo '<div class="col-sm-12">';
}else{
	echo '<div class="travolo-fluid">';
}
	echo '<div class="builder-page-wrapper">';
	// Query
	if( have_posts() ){
		while( have_posts() ){
			the_post();
			the_content();
		}
        wp_reset_postdata();
	}
	echo '</div>';
if( $travolo_layout == '1' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}elseif( $travolo_layout == '2' ){
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}else{
	echo '</div>';
}

//footer
get_footer();