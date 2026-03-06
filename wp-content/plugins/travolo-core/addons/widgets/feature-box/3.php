<?php if( $settings['feature_image']['url'] ): ?>
    <div class="feature-img">
        <div class="img">
            <?php echo travolo_img_tag( array(
                'url'	=> esc_url( $settings['feature_image']['url'] ),
                'alt'   => 'feature',
            ) );
            ?>
        </div>
    </div>
<?php endif; ?>

<div class="feature-body">
    <?php if( !empty( $settings[ 'title' ] ) ): ?>
        <h3 class="feature-title h4">
            <?php echo esc_html( $settings[ 'title' ] );  ?>
        </h3>
    <?php endif; ?>
    <div class="list-style2">
        <ul class="list-unstyled">
            <?php foreach( $settings[ 'feature_items' ] as $list ): ?>
                <li><?php echo esc_html($list[ 'feature_list_text' ]); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>