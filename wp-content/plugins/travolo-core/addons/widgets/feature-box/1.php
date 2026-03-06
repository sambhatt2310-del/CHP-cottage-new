<?php if( $settings['hover_bg_image']['url'] ): ?>
    <div class="features-bg background-image" style="background-image: url(<?php echo esc_url($settings[ 'hover_bg_image' ][ 'url' ]); ?>);">
    </div>
<?php endif; ?>
<?php if( $settings['media_image']['url'] ): ?>
    <div class="features-image">
        <?php echo travolo_img_tag( array(
            'url'	=> esc_url( $settings['media_image']['url'] ),
            'alt'   => 'icon',
        ) );
        ?>
    </div>
<?php endif; ?>

<div class="features-content">
    <?php if( !empty(  $settings[ 'title' ] ) ): ?>
        <h3 class="features-title"> 
            <?php echo esc_html( $settings[ 'title' ] );  ?>
        </h3>
    <?php endif; ?>
    <?php if( !empty( $settings[ 'discription' ] ) ): ?>
        <p class="features-text">
            <?php echo esc_html( $settings[ 'discription' ] );  ?>
        </p>
    <?php endif; ?>
</div>