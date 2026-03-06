<?php
/**
 * Itinerary Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel-engine/single-trip/trip-tabs/itinerary-tab.php.
 *
 * @package Wp_Travel_Engine
 * @subpackage Wp_Travel_Engine/includes/templates
 * @since @release-version //TODO: change after travel muni is live
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

do_action( 'wte_before_itinerary_content' );

global $post;
$tabs                      = get_post_meta( $post->ID, 'wp_travel_engine_setting', true );
$wp_travel_engine_settings = get_option( 'wp_travel_engine_settings' );
$enabled_expand_all        = ! isset( $wp_travel_engine_settings['wte_advance_itinerary']['enable_expand_all'] ) || 'yes' == $wp_travel_engine_settings['wte_advance_itinerary']['enable_expand_all'] ? 'enabled' : '';
/**
 * Hook - Display tab content title, left for themes.
 */
do_action( 'wte_itinerary_tab_title' );
?>
<div class="post-data itinerary wte-trip-itinerary-v2">
	<?php
	$maxlen   = max( array_keys( $tabs['itinerary']['itinerary_title'] ) );
	$arr_keys = array_keys( $tabs['itinerary']['itinerary_title'] );
	foreach ( $arr_keys as $key => $value ) {
		if ( array_key_exists( $value, $tabs['itinerary']['itinerary_title'] ) && ! empty( $value ) ) {
			?>
			<div class="itinerary-row <?php echo ! empty( $enabled_expand_all ) ? 'active' : ''; ?>">
				<div class="wte-itinerary-head-wrap">
					<div class="title"><?php echo sprintf( esc_html__( 'Day %s : ', 'wp-travel-engine' ), esc_attr( $value ) ); ?></div>
					<a class="accordion-tabs-toggle <?php echo ! empty( $enabled_expand_all ) ? 'active' : ''; ?>" href="javascript:void(0);">
						<span class="dashicons dashicons-arrow-down custom-toggle-tabs rotator <?php echo ! empty( $enabled_expand_all ) ? 'open' : ''; ?>"></span>
						<div class="itinerary-title">
							<?php $title = isset( $tabs['itinerary']['itinerary_title'][ $value ] ) ? esc_attr( $tabs['itinerary']['itinerary_title'][ $value ] ) : ''; ?>
							<span>
							<?php
							echo wp_kses(
								$title,
								array(
									'span'   => array(),
									'strong' => array(),
								)
							);
							?>
							</span>
						</div>
					</a>
				</div>
				<?php echo ! empty( $enabled_expand_all ) ? '<style id="itinerary-content-show"> .itinerary-content{ disply:block!important; } </style>' : ''; ?>
				<div class="itinerary-content <?php echo ! empty( $enabled_expand_all ) ? 'show' : ''; ?>" <?php echo ! empty( $enabled_expand_all ) ? 'style="display:block;"' : 'style="max-height:0px;"'; ?>>
					<div class="content">
						<?php
						$content = wte_array_get( $tabs, 'itinerary.itinerary_content_inner.' . $value, '' );
						if ( empty( $content ) ) {
							$content = wte_array_get( $tabs, 'itinerary.itinerary_content.' . $value, '' );
						}
						echo wp_kses_post( wpautop( $content ) );
						?>
					</div>
				</div>
			</div>
			<?php
		}
	}
	?>
</div>
<?php
do_action( 'wte_after_itinerary_content' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
