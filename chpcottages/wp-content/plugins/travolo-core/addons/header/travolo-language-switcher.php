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
class Travolo_Language_Switcher extends Widget_Base {

	public function get_name() {
		return 'travololanguageswitcher';
	}

	public function get_title() {
		return __( 'Gtranslate', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'gtranslate',
			[
				'label' 	=> __( 'Gtranslate', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'style_select',
			[
				'label' 		=> __( 'Please Select Your Style From Gtranslate', 'travolo' ),
				'type' 			=> Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'switcher_style',
			[
				'label' 	=> __( 'Switcher Style', 'travolo' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    '1'   		=> __( 'Style One', 'travolo' ),
                    '2'   		=> __( 'Style Two', 'travolo' ),
                ],
                'default'  	=> '1'
			]
        );

		$this->add_control(
			'show_loginbar',
			[
				'label' => esc_html__( 'Login Bar', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementor' ),
				'label_off' => esc_html__( 'No', 'elementor' ),
				'default' => 'no',
				'condition' => [ 'switcher_style' => '1' ]
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
				'condition' => [
					'switcher_style' => '1',
					'show_loginbar' => 'yes',
				],
			]
        );

        $this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['switcher_style'] == '1' ){
			echo '<div class="col-auto d-flex">';
				if( class_exists( 'Gtranslate' ) ){
					echo '<div class="header-dropdown">';
						echo '<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">'.esc_html__( 'English', 'travolo' ).'</a>';
						echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
							echo '<li>';
								echo do_shortcode('[gtranslate]');
							echo '</li>';
						echo '</ul>';
					echo '</div>';
				}
				if(  'yes' == $settings['show_loginbar'] ){
					?>
						<a class="user-btn" href="<?php echo esc_url( $settings['login_link']['url'] ); ?>">
							<i class="far fa-user-circle"></i>
						</a>
					<?php 
				}
			echo '</div>';
		}elseif( $settings['switcher_style'] == '2' ){
			if( class_exists( 'Gtranslate' ) ){
				echo '<div class="header-layout5">';
					echo '<div class="header-dropdown">';
						echo '<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fal fa-globe"></i>'.esc_html__( 'English', 'travolo' ).'</a>';
						echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">';
							echo '<li>';
								echo do_shortcode('[gtranslate]');
							echo '</li>';
						echo '</ul>';
					echo '</div>';
				echo '</div>';
			}
		}

	}

}
$widgets_manager->register( new \Travolo_Language_Switcher() );