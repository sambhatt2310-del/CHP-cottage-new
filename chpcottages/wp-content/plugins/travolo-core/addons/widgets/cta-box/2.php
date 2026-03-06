<section class="space space-extra-bottom position-relative background-image" style="background-image: url(<?php echo esc_url( $settings['background_img']['url'] ) ?>);">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                <div class="title-area white-title">
                    <span class="sec-subtitle">Go &amp; Discover</span>

                    <?php if( !empty( $settings[ 'section_title' ] ) ):  ?>	
                        <h2 class="sec-title h1">
                            <?php echo esc_html( $settings[ 'section_title' ] ); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if( !empty( $settings[ 'section_subtitle' ] ) ):  ?>		
                        <p class="sec-text">
                            <?php echo esc_html( $settings[ 'section_subtitle' ] ); ?>
                        </p>
                    <?php endif; ?>

                    <a class="vs-btn style2" <?php echo $this->get_render_attribute_string('button'); ?>>
                        <?php echo esc_html( $settings[ 'button_text' ] ); ?>
                    </a>
                </div>
            </div>

            <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                <div class="img-box1">
                    <?php if( $settings['cta_img']['url'] ): ?>
                        <div class="img-1-1">
                            <?php echo travolo_img_tag( array(
                                'url'	=> esc_url( $settings['cta_img']['url'] ),
                                'alt'   => 'Offer Image',
                            ) );
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if( $settings['offer_img']['url'] ): ?>
                        <div class="img-1-2 d-none d-xxl-block">
                            <?php echo travolo_img_tag( array(
                                'url'	=> esc_url( $settings['offer_img']['url'] ),
                                'alt'   => 'Image',
                            ) );
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>