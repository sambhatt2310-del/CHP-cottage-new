<?php
echo '<div class="col-xl-4 col-md-6 col-sm-12 col-12">';
        echo '<div class="vs-blog blog-style3">';
            echo '<div class="blog-img">';
                if( has_post_thumbnail() ){
                    echo '<a href="'.esc_url( get_permalink() ).'">';
                        the_post_thumbnail( 'blog-post-two', array( 'class' => 'w-100' ) );
                    echo '</a>';
                }
            echo '</div>';
        echo '<div class="blog-content">';
            echo '<h2 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h2>';
            if( ! empty( $settings['excerpt_count'] ) ){
                echo '<p class="blog-text">'.wp_kses_post( wp_trim_words( get_the_content( ), $settings['excerpt_count'], '' ) ).'</p>';
            }
        echo '</div>';
        echo '<div class="blog-bottom">';
            //date
            echo '<a class="blog-date" href="'.esc_url( travolo_blog_date_permalink() ).'"> <i class="fas fa-calendar-alt"></i>';
                echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
            echo '</a>';
            
            echo '<a href="'.esc_url( get_permalink() ).'" class="'.esc_attr( $settings['btn_class'] ).'">'.esc_html( $settings['read_more_text'] ).'<i class="fal fa-arrow-right"></i></a>';
        echo '</div>';

    echo '</div>';
echo '</div>';