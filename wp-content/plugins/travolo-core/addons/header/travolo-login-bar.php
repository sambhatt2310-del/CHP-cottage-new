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
class Travolo_Login_Bar extends Widget_Base {

	public function get_name() {
		return 'travolologinbar';
	}

	public function get_title() {
		return __( 'Login Bar', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'loginbar',
			[
				'label' 	=> __( 'Login Bar', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'login_link',
			[
				'label' 		=> __( 'Url', 'travolo' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'travolo' ),
                'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
        );

        $this->end_controls_section();
 
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        ?>
           <a class="user-btn" href="<?php echo esc_url( $settings['login_link']['url'] ); ?>">
                <i class="far fa-user-circle"></i>
            </a>
        <?php 

	}

}
$widgets_manager->register( new \Travolo_Login_Bar() );