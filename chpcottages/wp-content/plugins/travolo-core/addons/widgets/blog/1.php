<?php
if( $settings['blog_post_style'] == '1'  ){
    echo '<div class="blog-style4">';
            echo '<div class="blog-image">';
                if( has_post_thumbnail() ){
                    the_post_thumbnail( 'blog-post-one');
                     // Get the post tags
                    $tags = get_the_tags();
                    
                    if (!empty($tags)) {
                        // Display the first tag as a tag
                        $tag_link = get_tag_link($tags[0]->term_id);
                        echo '<div class="category-tag"><a href="' . esc_url($tag_link) . '"><i class="fas fa-tag"></i> ' . esc_html($tags[0]->name) . '</a></div>';
                    }
                }
            echo '</div>';
            
            echo "<div class='blog-content background-image' style='background-image:url(" . esc_url($settings['content_bg']['url']) . ")'>";
                //date
                echo '<a class="blog-date" href="'.esc_url( travolo_blog_date_permalink() ).'"><i class="far d fa-calendar-alt"></i>';
                    echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                echo '</a>';
            
                echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';

                if( ! empty( $settings['excerpt_count'] ) ){
                    echo '<p class="blog-text">'.wp_kses_post( wp_trim_words( get_the_content( ), $settings['excerpt_count'], '' ) ).'</p>';
                }
                echo '<a href="'.esc_url( get_permalink() ).'" class="'.esc_attr( $settings['btn_class'] ).'">'.esc_html( $settings['read_more_text'] ).'</a>';

            echo '</div>';
    echo '</div>';
} 