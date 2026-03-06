<?php
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Vecurosoft
 * @Author URI : https://www.vecurosoft.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
    /**
    *
    * Hook for Footer Content
    *
    * Hook travolo_footer_content
    *
    * @Hooked travolo_footer_content_cb 10
    *
    */
    do_action( 'travolo_footer_content' );

    if( !is_404(  ) ) {
        /**
        *
        * Hook for Back to Top Button
        *
        * Hook travolo_back_to_top
        *
        * @Hooked travolo_back_to_top_cb 10
        *
        */
        do_action( 'travolo_back_to_top' );
    }

    wp_footer();
    ?>
</body>
</html>