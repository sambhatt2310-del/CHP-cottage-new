<?php foreach( $settings[ 'slides' ] as $slide ): ?>
    <div class="col-lg-6 col-md-6">
        <div class="testi-style2">
            <?php if( !empty( $slide[ 'client_feedback' ] ) ): ?>
                <p class="testi-text">
                    <?php echo esc_html($slide[ 'client_feedback' ]); ?>
                </p>
            <?php endif; ?>
            
            <div class="testi-body">

                <?php if( 'yes' == $slide[ 'quate' ] ): ?>
                    <div class="testi-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                <?php endif; ?>

                <div class="media-body">
                    <?php if( !empty( $slide[ 'client_name' ] ) ): ?>
                        <h2 class="testi-name h2"><?php echo esc_html($slide[ 'client_name' ]) ?></h2>
                    <?php endif; ?>

                    <?php if( 'yes' == $slide[ 'rating' ] ):  ?>
                        <div class="testi-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i> 
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>		
<?php endforeach; ?>