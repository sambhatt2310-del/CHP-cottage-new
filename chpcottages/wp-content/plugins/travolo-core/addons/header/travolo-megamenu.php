<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Megamenu Widget .
 *
 */
class Travolo_Megamenu extends Widget_Base {

	public function get_name() {
		return 'travolomegamenu';
	}

	public function get_title() {
		return __( 'Header Menu', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'menu_version',
			[
				'label' 	=> __( 'Menu Style', 'travolo' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'travolo' ),
					'2' 		=> __( 'Style Two', 'travolo' ),
					'3' 		=> __( 'Style Two', 'travolo' ),
				]
			]
		);

		$this->add_control(
			'more_options',
			[
				'label' 	=> esc_html__( 'Set Your Style From Style Tab', 'travolo' ),
				'type' 		=> Controls_Manager::HEADING,
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'menu_top_level_menu_item_style_section',
			[
				'label' 	=> __( 'Top Level Menu Items', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'top_level_menu_alignment',
			[
				'label' 	=> __( 'Menu Alignment', 'travolo' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'travolo' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'travolo' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'travolo' ),
						'icon' 		=> 'fa fa-align-right',
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style1' => 'text-align: {{VALUE}} !important;',
				],
				'toggle' 		=> true,
			]
		);

        $this->add_control(
			'top_level_menu_color',
			[
				'label' 		=> __( 'Menu Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'travolo' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'top_level_menu_bg_color',
			[
				'label' 			=> __( 'Menu Background Color', 'travolo' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a' => 'background-color: {{VALUE}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_hover_bg_color',
			[
				'label' 		=> __( 'Menu Hover Background Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a:hover' => 'background-color: {{VALUE}} !important;',
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .menu-style1 > ul > li > a',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography_hover',
				'label' 		=> __( 'Menu Typography Hover', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .menu-style1 > ul > li > a:hover',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style1 > ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style1 > ul > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'top_level_menu_border',
				'label' 	=> __( 'Border', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .menu-style1 > ul > li > a',
			]
		);

		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( has_nav_menu( 'primary-menu' ) ){
            echo '<nav class="main-menu menu-style'.$settings[ 'menu_version' ].' ">';
				wp_nav_menu( array(
					"theme_location"    => 'primary-menu',
					"container"         => '',
					"menu_class"        => ''
				) );
            echo '</nav>';
		}
	}
}
$widgets_manager->register( new \Travolo_Megamenu() );