<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>

<?php
    wp_body_open();
   
    /**
    * 
    * Preloader
    *
    * Hook travolo_preloader_wrap
    *
    * @Hooked travolo_preloader_wrap_cb 10
    *
    */
    do_action( 'travolo_preloader_wrap' );

    /**
    *
    * travolo header
    *
    * Hook travolo_header
    *
    * @Hooked travolo_header_cb 10
    *
    */
    do_action( 'travolo_header' );