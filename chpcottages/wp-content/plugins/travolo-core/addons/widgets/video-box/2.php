<div class="gallery-style-2">     
    <?php if( $settings['video_image']['url'] ): ?>
        <?php echo travolo_img_tag( array(
            'url'	=> esc_url( $settings['video_image']['url'] ),
            'alt'   => 'gallery-image',
        ) );
        ?>
    <?php endif; ?>
    <div class="gallery-btn">

        <?php if(!empty( $settings[ 'video_url' ] )) : ?>
            <a href="<?php echo esc_url( $settings[ 'video_url' ] ); ?>" class="play-btn popup-video">
                <i class="fas fa-play"></i>
            </a>
        <?php endif; ?>
    </div>
</div>