<?php
    echo '<div class="img-box4">';
        if( ! empty( $settings[ 'image_one' ][ 'url' ] ) ){
            echo '<div class="img-box4__img1">';
                echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_one' ][ 'url' ] ),
                    'class' => 'img1'
                ) );
            echo '</div>';
        } 
        echo '<div class="img-box4__img2">';
            if( ! empty( $settings[ 'image_two' ][ 'url' ] ) ){
                echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_two' ][ 'url' ] ),
                    'class' => 'img2'
                ) );
            }
            if( ! empty( $settings[ 'image_three' ][ 'url' ] ) ){
                echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_three' ][ 'url' ] ),
                    'class' => 'img3'
                ) );
            }
        echo '</div>';
        echo '<div class="discount" data-bg-src="'.esc_url( $settings[ 'image_four' ][ 'url' ] ).'">';
            if( ! empty( $settings['img_title'] ) ){
                echo '<span>'.esc_html( $settings['img_title'] ).'</span>';
            }
            if( ! empty( $settings['img_sub_title'] ) ){
                echo '<p>'.esc_html( $settings['img_sub_title'] ).'</p>';
            }
        echo '</div>';
    echo '</div>';