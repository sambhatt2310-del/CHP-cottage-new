<div class="image-box1">
    <?php if( !empty( $settings[ 'image_one' ][ 'url' ] ) ): ?>
        <?php echo travolo_img_tag( array(
                'url'	=> esc_url( $settings[ 'image_one' ][ 'url' ] ),
                'alt'   => 'about image',
                'class' => 'img1',
            ) );
        ?>
    <?php endif; ?>
    <?php if( !empty( $settings[ 'image_two' ][ 'url' ] ) ): ?>
        <?php echo travolo_img_tag( array(
                'url'	=> esc_url( $settings[ 'image_two' ][ 'url' ] ),
                'alt'   => 'about image',
                'class' => 'img2',
            ) );
        ?>
    <?php endif; ?>
    <div class="media-box1">
        <?php if( !empty( $settings['img_title'] ) ): ?>
            <span class="media-info">
                <?php echo esc_html( $settings['img_title'] ); ?>
            </span>
        <?php endif;?>

        <?php if( !empty( $settings['img_sub_title'] ) ): ?>
            <p class="media-text">
                <?php echo esc_html( $settings['img_sub_title'] ); ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="media-box2">
        <?php if( !empty( $settings['img_title_two'] ) ): ?>
            <span class="media-info">
                <?php echo esc_html( $settings['img_title_two'] ); ?>
            </span>
        <?php endif; ?>

        <?php if( !empty( $settings['img_title_two'] ) ): ?>
            <p class="media-text">
                <?php echo esc_html( $settings['img_sub_title_two'] ); ?>
            </p>
        <?php endif; ?>
    </div>
</div>
