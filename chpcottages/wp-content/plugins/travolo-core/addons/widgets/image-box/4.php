<?php
    echo '<div class="img-box5">';
        echo '<div class="img-box__img1">';
            if( ! empty( $settings[ 'image_one' ][ 'url' ] ) ){
                echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_one' ][ 'url' ] ),
                    'class' => 'img1'
                ) );
            }
            if( ! empty( $settings[ 'image_two' ][ 'url' ] ) ){
                echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_two' ][ 'url' ] ),
                    'class' => 'img2'
                ) );
            }
        echo '</div>';
        if( ! empty( $settings[ 'image_three' ][ 'url' ] ) ){
            echo '<div class="img-box__img2">';
                echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_three' ][ 'url' ] ),
                    'class' => 'img3'
                ) );
            echo '</div>';
        }
        echo '<div class="vs-card style2">';
            echo '<div class="vs-card__icon background-image" data-bg-src="'.esc_url( $settings[ 'image_four' ][ 'url' ] ).'">';
                echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_five' ][ 'url' ] ),
                ) );
            echo '</div>';
            echo wp_kses_post( $settings['img_description'] );
        echo '</div>';
    echo '</div>';