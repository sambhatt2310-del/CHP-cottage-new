<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Mobilemenu Widget .
 *
 */
class Travolo_Offcanvas extends Widget_Base {

	public function get_name() {
		return 'travolooffcanvas';
	}

	public function get_title() {
		return __( 'Offcanvas', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'offcanvas_section',
			[
				'label' 	=> __( 'Offcanvas', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'offcanvas_btn_style',
			[
				'label' 	=> __( 'Offcanvas Button Style', 'travolo' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    '1'   		=> __( 'Style One', 'travolo' ),
                    '2'   		=> __( 'Style Two', 'travolo' ),
                ],
                'default'  	=> '1'
			]
        );

		$this->add_control(
			'travolo_Offcanvas_builder',
			[
				'label'     => __( 'Select Offcanvas', 'travolo' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => $this->travolo_offcanvas_one(),
				'default'	=> ''
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sideMenuToggler i,{{WRAPPER}} .sideMenuToggler' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'icon_hover_color',
			[
				'label' 		=> __( 'Icon Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sideMenuToggler:hover i,{{WRAPPER}} .sideMenuToggler:hover' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Background Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sideMenuToggler' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'icon_bg_hover_color',
			[
				'label' 		=> __( 'Icon Background Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sideMenuToggler:hover' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'offcanvas_bg_color',
			[
				'label' 		=> __( 'Offcanvas Background Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sidemenu-wrapper .sidemenu-content' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

    }


	public function travolo_offcanvas_one(){

		$travolo_post_query = new WP_Query( array(
			'post_type'				=> 'travolo_off_build',
			'posts_per_page'	    => -1,
		) );

		$travolo_tab_builder_title_title = array();
		$travolo_tab_builder_title_title[''] = __( 'Select a Title','travolo');

		while( $travolo_post_query->have_posts() ) {
			$travolo_post_query->the_post();
			$travolo_tab_builder_title_title[ get_the_ID() ] =  get_the_title();
		}
		wp_reset_postdata();
		return $travolo_tab_builder_title_title;
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['offcanvas_btn_style'] == '1' ){
			echo '<button class="sideMenuToggler"><i class="far fa-bars"></i></button>';
		}else{
			echo '<button class="sideMenuToggler">';
				echo '<svg width="34" height="29" viewBox="0 0 34 29" fill="none" xmlns="http://www.w3.org/2000/svg">';
					echo '<path d="M0 29H34V22.5H0V29ZM0 17.78H34V11.28H0V17.78ZM0 6.5H34V0H0V6.5Z" fill="currentColor"></path>';
				echo '</svg>';
			echo '</button>';
		}
		echo '<div class="sidemenu-wrapper offcanvas-wrapper d-none d-lg-block ">';
			echo '<div class="sidemenu-content">';
				echo '<button class="closeButton sideMenuCls"><i class="fal fa-times"></i></button>';
				$elementor = \Elementor\Plugin::instance();
				echo $elementor->frontend->get_builder_content_for_display($settings['travolo_Offcanvas_builder']);
			echo '</div>';
		echo '</div>';
	}
}
$widgets_manager->register( new \Travolo_Offcanvas() );

