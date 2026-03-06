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
    exit;
}

if ( ! is_active_sidebar( 'travolo-blog-sidebar' ) ) {
    return;
}
?>

<div class="col-lg-4">
    <div class="sidebar-area sticky-sidebar">
    <?php dynamic_sidebar( 'travolo-blog-sidebar' ); ?>
    </div>
</div>