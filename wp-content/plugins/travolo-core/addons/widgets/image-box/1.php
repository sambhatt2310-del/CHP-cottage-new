<div class="img-box3">
    <?php if( !empty( $settings[ 'image_one' ][ 'url' ] ) ): ?>
        <?php echo travolo_img_tag( array(
                'url'	=> esc_url( $settings[ 'image_one' ][ 'url' ] ),
                'alt'   => 'about image',
                'class' => 'img1',
            ) );
        ?>
    <?php endif; ?>
    <div class="bottom-img">
        <?php if( !empty( $settings[ 'image_two' ][ 'url' ] ) ): ?>
            <?php echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_two' ][ 'url' ] ),
                    'alt'   => 'about image',
                    'class' => 'img2',
                ) );
            ?>
        <?php endif; ?>
        <?php if( !empty( $settings[ 'image_three' ][ 'url' ] ) ): ?>
            <?php echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings[ 'image_three' ][ 'url' ] ),
                    'alt'   => 'about image',
                    'class' => 'img3',
                ) );
            ?>
        <?php endif; ?>
    </div>
</div>