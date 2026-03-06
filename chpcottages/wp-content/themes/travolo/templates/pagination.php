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
        exit();
    }

    if( !empty( travolo_pagination() ) ) :
?>
<!-- Post Pagination -->
<div class="vs-pagination">

        <?php 
        
        add_filter('next_posts_link_attributes', 'posts_link_attributes');
        add_filter('previous_posts_link_attributes', 'posts_link_attributes');
        function posts_link_attributes(){
            return 'class="pagi-btn"';
        };

        ?>
        <?php
            $prev 	= '<i class="fas fa-chevron-left"></i>';
            $next 	= '<i class="fas fa-chevron-right"></i>';
           
        ?>
         <ul>
            <?php 
                // previous
                echo '<li>';
                    if( get_previous_posts_link() ){
                        previous_posts_link( $prev );
                    }
                echo '</li>';
                echo travolo_pagination();
                // next
                echo '<li>';
                if( get_next_posts_link() ){
                    next_posts_link( $next );
                }
                echo '</li>';
            ?>
         </ul>
        <?php 
        
    ?>
</div>
<!-- End of Post Pagination -->
<?php 
    endif;