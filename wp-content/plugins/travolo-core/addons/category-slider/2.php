<?php if( !empty( $settings[ 'category_slider2' ] ) ): ?>
    <?php foreach( $settings[ 'category_slider2' ] as $slider2 ): ?>
        <div class="col-xl-4">
            <div class="category-style2">
                <div class="category-img">
                    <a href="<?php echo esc_url( $slider2['links'] ); ?>">
                        <!-- <img src="assets/img/category/cat-1-1.jpg" alt="category"> -->
                    </a>
                </div>
                <div class="category-content">
                    <?php if( !empty( $slider2[ 'category_name' ] ) ): ?>
                        <h3 class="category-title">
                            <a href="<?php echo esc_url( $slider2['links'] ); ?>" class="text-inherit">
                            <?php echo esc_html( $slider2[ 'category_name' ] ); ?>
                        </a>
                        </h3>
                    <?php endif; ?>

                    <?php if( !empty( $slider2['category_label'] ) ): ?>
                        <p class="category-text"><?php echo esc_html( $slider2[ 'category_label' ] ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>