<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Header Widget .
 *
 */
class Travolo_Mini_Cart extends Widget_Base {

	public function get_name() {
		return 'travolominicarts';
	}

	public function get_title() {
		return __( 'Minicart', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'travolo_minicart',
			[
				'label' 	=> __( 'Minicart', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'show_cart_count',
			[
				'label' 		=> __( 'Show Cart?', 'travolo' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'travolo' ),
				'label_off' 	=> __( 'Hide', 'travolo' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);


		$this->add_control(
			'style_select',
			[
				'label' 		=> __( 'Please Select Your Style From Minicart', 'travolo' ),
				'type' 			=> Controls_Manager::HEADING,
			]
		);

		
        $this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>
		<?php
			if( class_exists( 'woocommerce' ) && $settings['show_cart_count'] == 'yes' ){
				global $woocommerce;
				if( ! empty( $woocommerce->cart->cart_contents_count ) ){
					$count = $woocommerce->cart->cart_contents_count;
				}else{
					$count = "0";
				}
				echo '<button class="sideCartToggler">
					<i class="fal fa-shopping-bag"></i><span class="button-badge">'.esc_html( $count ).'</span>
				</button>';
			}
		?>
		
		<?php if( class_exists( 'woocommerce' ) ): ?>
			<div class="sideCart-wrapper offcanvas-wrapper d-none d-lg-block">
				<div class="sidemenu-content">
					<button class="closeButton border-theme bg-theme-hover sideMenuCls"><i class="far fa-times"></i></button>
					<div class="widget widget_shopping_cart">
						<h3 class="widget_title"><?php esc_html__( 'Shopping Cart', 'travolo' ) ?></h3>
						<div class="woocommerce-mini-cart-content widget_shopping_cart_content ">
							<?php  woocommerce_mini_cart(); ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
        <?php 
	}

}
$widgets_manager->register( new \Travolo_Mini_Cart() );


