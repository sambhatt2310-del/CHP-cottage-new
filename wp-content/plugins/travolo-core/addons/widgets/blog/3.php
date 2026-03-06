<?php
echo '<div class="col-xl-4">';
    echo '<div class="vs-blog blog-style5" data-bg-src="'.esc_url( get_the_post_thumbnail_url() ).'">';
        echo '<div class="blog-content">';
            echo '<div class="blog-body">';
                echo '<a class="blog-date" href="'.esc_url( travolo_blog_date_permalink() ).'">';
                    echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                echo '</a>';
                echo '<h2 class="blog-title h4"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h2>';

                echo '<div class="blog-bottom">';
                    echo '<a class="blog-link" href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">';
                        echo '<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">';
                        echo '<path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17 8.5C17 13.1944 13.1944 17 8.5 17C3.80558 17 0 13.1944 0 8.5C0 3.80558 3.80558 0 8.5 0C13.1944 0 17 3.80558 17 8.5ZM11.05 5.95C11.05 7.35837 9.90837 8.5 8.5 8.5C7.09164 8.5 5.95 7.35837 5.95 5.95C5.95 4.54168 7.09164 3.4 8.5 3.4C9.90837 3.4 11.05 4.54168 11.05 5.95ZM8.5 15.725C10.0164 15.725 11.4237 15.2578 12.5859 14.4595C13.0992 14.1069 13.3185 13.4353 13.0201 12.8887C12.4015 11.7558 11.1267 11.05 8.49992 11.05C5.87324 11.05 4.59847 11.7557 3.97982 12.8887C3.68139 13.4353 3.90073 14.1069 4.41402 14.4594C5.57615 15.2578 6.98352 15.725 8.5 15.725Z"
                            fill="#37D4D9" />';
                        echo '</svg>';
                        echo esc_html__( 'by ','travolo' );
                        echo get_the_author();
                    echo '</a>';
                    echo '<a class="blog-link" href="'.esc_url( get_comments_link( get_the_ID() ) ).'">';
                        echo '<svg width="23" height="16" viewBox="0 0 23 16" fill="none" xmlns="http://www.w3.org/2000/svg">';
                        echo '<path
                            d="M16.8107 6.13925C16.8107 2.74862 13.0468 0 8.40535 0C3.76388 0 0 2.74862 0 6.13925C0 8.17692 1.3592 9.98219 3.4515 11.0988C3.44548 11.1166 1.78462 14.0825 1.78462 14.0825C1.78462 14.0825 6.85619 12.184 6.87023 12.1761C7.36789 12.2437 7.88094 12.2778 8.40535 12.2778C13.0468 12.2778 16.8107 9.52923 16.8107 6.13925ZM23 8.05744C23 4.66746 19.4569 1.94313 15.6214 1.91884C21.1197 7.29397 14.6441 13.021 9.36656 13.021C9.36656 13.021 9.95318 14.196 14.5947 14.196C15.1184 14.196 15.6321 14.1606 16.1298 14.0936C16.1438 14.1028 21.2161 16 21.2161 16C21.2161 16 19.5545 13.0348 19.5492 13.017C21.6408 11.9004 23 10.0944 23 8.05744Z"
                            fill="#37D4D9" />';
                        echo '</svg>';
                        if( get_comments_number() == 1 ){
                            $comment_text = __( ' Comment', 'travolo' );
                        }else{
                            $comment_text = __( ' Comments', 'travolo' );
                        }
                        echo esc_html( get_comments_number() ). $comment_text;
                    echo '</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';