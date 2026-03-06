<div class="cta-style1">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-6">
            <div class="cta-content">
                <?php if( !empty( $settings[ 'section_title' ] ) ):  ?>	
                    <h2 class="cta-title">
                        <?php echo esc_html( $settings[ 'section_title' ] ); ?>
                    </h2>
                <?php endif; ?>

                <?php if( !empty( $settings[ 'section_subtitle' ] ) ):  ?>		
                    <p class="cta-text">
                        <?php echo esc_html( $settings[ 'section_subtitle' ] ); ?>
                    </p>
                <?php endif; ?>
                <a class="vs-btn style2" <?php echo $this->get_render_attribute_string('button'); ?>>
                    <?php echo esc_html( $settings[ 'button_text' ] ); ?>
                </a>
            </div>
        </div>

        <div class="col-md-5 col-sm-6">

            
            <?php if( $settings['cta_img']['url'] ): ?>
                <div class="cta-image d-lg-block d-none">
                    <?php echo travolo_img_tag( array(
                        'url'	=> esc_url( $settings['cta_img']['url'] ),
                        'alt'   => 'CTA Image',
                    ) );
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>