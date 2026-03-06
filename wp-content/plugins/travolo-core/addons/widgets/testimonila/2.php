<?php foreach( $settings[ 'slides' ] as $slide ): ?>
    <div class="col-lg-4 col-md-6">
        <div class="testi-style1 layout2">
            <?php if( 'yes' == $slide[ 'quate' ] ): ?>
                <div class="testi-icon">
                    <i class="fas fa-quote-left"></i>
                </div>
            <?php endif; ?>

            <?php if( !empty( $slide[ 'client_feedback' ] ) ): ?>
                <p class="testi-text">
                    <?php echo esc_html($slide[ 'client_feedback' ]); ?>
                </p>
            <?php endif; ?>

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
<?php endforeach; ?>