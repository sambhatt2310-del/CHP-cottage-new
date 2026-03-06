<?php
/**
 * Mini cart template.
 *
 * @var $checkout Checkout
 * @var $mini_cart MiniCart
 * @package WP Travel Engine.
 */
global $wte_cart;

use WPTravelEngine\Core\Controllers\Checkout;
use WPTravelEngine\Core\Controllers\MiniCart;

if ( ! empty( $wte_cart->getItems() ) ) :
	?>
	<div class="wpte-bf-summary-wrap">
		<div class="wpte-bf-title"><?php echo esc_html( $mini_cart->title() ); ?></div>

		<?php
		foreach ( $wte_cart->getItems( true ) as $cart_item ) :
			?>
			<div class="wpte-bf-trip-name-wrap">
				<div class="wpte-bf-trip-name"><?php echo esc_html( get_the_title( $cart_item->trip_id ) ); ?></div>

				<?php
				/**
				 * wte_bf_after_trip_name hook
				 *
				 * @hooked wte_display_trip_code_minicart - Trip Code Addon
				 */
				do_action( 'wte_bf_after_trip_name', $cart_item->trip_id );
				?>

				<span class="wpte-bf-trip-date">
				<?php
				echo esc_html(
					sprintf(
						__( 'Starting Date: %1$s ', 'wp-travel-engine' ),
						$mini_cart->trip_date_time( $cart_item )
					)
				);
				?>
				</span>
			</div>
			<table class="wpte-bf-summary-table">
				<tbody>
				<tr class="wte-booked-package-name">
					<td colspan="2">
						<?php $mini_cart->trip_package_name( $cart_item ); ?>
					</td>
				</tr>
				<?php $mini_cart->trip_pax_details( $cart_item ); ?>

				<!-- Extra Services -->
				<?php $mini_cart->extra_services( $cart_item ); ?>
				<!-- ./ Extra Services -->

				</tbody>
				<tfoot>
				<tr>
					<td colspan="2">
						<span class="wpte-bf-total-txt"><?php esc_html_e( 'Subtotal :', 'wp-travel-engine' ); ?></span>
						<?php wptravelengine_the_price( $wte_cart->get_subtotal() ); ?>
					</td>
				</tr>
				</tfoot>
			</table>
			<!-- Price Adjustments -->
			<?php
			$is_tax_applicable = $wte_cart->tax()->is_taxable() && $wte_cart->tax()->is_exclusive();

			if ( $wte_cart->has_discounts() || $is_tax_applicable ) :
				?>
				<table class="wpte-bf_price-adjustments">
					<tbody>
					<?php
					if ( $wte_cart->has_discounts() ) {
						$mini_cart->discount_details();
					}
					if ( $is_tax_applicable ) {
						$mini_cart->tax_details( $cart_item, $wte_cart->tax() );
					}
					?>
					</tbody>
				</table>
			<?php endif; ?>

			<!-- Partial payment Section -->
			<?php if ( wp_travel_engine_is_trip_partially_payable( $cart_item->trip_id ) ) : ?>
			<table class="wpte-bf-extra-info-table">
				<tbody>
				<tr>
					<td><span><?php echo esc_html__( 'Down Payment', 'wp-travel-engine' ); ?></span></td>
					<td class="wpte-dwnpay-amt">
						<b><?php wptravelengine_the_price( $wte_cart->get_total_partial() ); ?></b>
					</td>
				</tr>

				<tr>
					<td><span><?php esc_html_e( 'Remaining Payment', 'wp-travel-engine' ); ?></span></td>
					<td class="wpte-remain-amt">
						<b><?php wptravelengine_the_price( $wte_cart->get_due_total() ); ?></b>
					</td>
				</tr>
				</tbody>
			</table>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<div class="wpte-bf-summary-total">
		<div class="wpte-bf-total-price">
			<span class="wpte-bf-total-txt"><?php esc_html_e( 'Total : ', 'wp-travel-engine' ); ?></span>
			<span
				class="wpte-price-wrap">
				<?php wptravelengine_the_price( $wte_cart->get_totals() ); ?>
			</span>
			<?php $mini_cart->tax_summary(); ?>
		</div>
	</div><!-- .wpte-bf-summary-total -->
<?php
endif;
