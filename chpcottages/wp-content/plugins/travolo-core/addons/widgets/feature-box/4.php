    <?php if( $settings['hover_bg_image']['url'] ): ?>
        <div class="features-bg" data-bg-src="<?php echo esc_url( $settings['hover_bg_image']['url'] );?>"></div>
    <?php endif; ?>
    <?php if( $settings['media_image']['url'] ): ?>
        <div class="features-image">
            <?php echo travolo_img_tag( array(
                    'url'	=> esc_url( $settings['media_image']['url'] ),
                ) );
            ?>
        </div>
    <?php endif; ?>
    <div class="features-content">
        <?php if( !empty( $settings[ 'title' ] ) ): ?>
            <h3 class="feature-title">
                <?php echo esc_html( $settings[ 'title' ] );  ?>
            </h3>
        <?php endif; ?>
        <?php if( !empty( $settings[ 'discription' ] ) ): ?>
            <p class="features-text"><?php echo esc_html( $settings[ 'discription' ] ) ?></p>
        <?php endif; ?>
        <?php if( !empty( $settings[ 'button_url' ] ) ): ?>
            <a class="features-link" href="<?php echo esc_url( $settings[ 'button_url' ] );?>">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                    d="M12 1C12 0.447716 11.5523 5.87248e-07 11 1.00872e-06L2 4.60808e-07C1.44771 7.97982e-07 0.999999 0.447716 0.999999 1C1 1.55229 1.44771 2 2 2L10 2L10 10C10 10.5523 10.4477 11 11 11C11.5523 11 12 10.5523 12 10L12 1ZM1.70711 11.7071L11.7071 1.70711L10.2929 0.292894L0.292893 10.2929L1.70711 11.7071Z"
                    fill="white" />
                </svg>
            </a>
        <?php endif; ?>
    </div>