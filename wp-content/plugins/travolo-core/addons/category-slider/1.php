<?php if( !empty( $settings[ 'category_slider' ] ) ): ?>
    <?php foreach( $settings[ 'category_slider' ] as $slider ): ?>
        <div class="col-xl-3">
            <div class="category-style1">
                <div class="category-bg1"></div>
                <div class="category-bg2"></div>
                <div class="category-bg3"></div>
                <?php if(!empty( $slider['grade_label'] ) ): ?>
                    <div class="category-grade">
                        <span class="grade-label"><?php echo esc_html( $slider[ 'grade_label' ] ); ?></span>
                        <span class="grade-name"><?php echo esc_html( $slider[ 'grade_name' ] ); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if( !empty( $slider[ 'category_name' ] ) ): ?>
                    <h3 class="category-name h4">
                        <a href="<?php echo esc_url( $slider['links'] ); ?>" class="text-inherit">
                        <?php echo esc_html( $slider[ 'category_name' ] ); ?>
                    </a>
                    </h3>
                <?php endif; ?>

                <?php if( !empty( $slider['category_label'] ) ): ?>
                    <p class="category-label"><?php echo esc_html( $slider[ 'category_label' ] ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>