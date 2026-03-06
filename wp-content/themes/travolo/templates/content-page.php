<?php
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 

	/**
	 * page content 
	 * Comments Template
	 * @Hook  travolo_page_content
	 *
	 * @Hooked travolo_page_content_cb
	 * 
	 *
	 */
	do_action( 'travolo_page_content' );
	?>
</div>