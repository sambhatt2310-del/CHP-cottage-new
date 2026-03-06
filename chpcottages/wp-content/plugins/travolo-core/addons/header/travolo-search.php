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
class Travolo_Search extends Widget_Base {

	public function get_name() {
		return 'travolosearch';
	}

	public function get_title() {
		return __( 'Search Form', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_search',
			[
				'label' 	=> __( 'Header Search And Login', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'placeholder_text',
			[
				'label' 		=> __( 'What are you looking for', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'default'		=> __( 'Search Here...', 'travolo' ),
				'label_block'   => true,
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'search_style',
			[
				'label' 	=> __( 'Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'search_color',
			[
				'label' 		=> __( 'Search Icon Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-btns button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'search_color_hover',
			[
				'label' 		=> __( 'Search Icon Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-btns button:hover i' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'travolo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .header-btns button' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'search_margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .header-btns button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		echo '<button  href="#" class="searchBoxTggler"><i class="far fa-search"></i></button>';

		echo '<div class="popup-search-box">';
			echo '<button class="searchClose"><i class="fal fa-times"></i></button>';
			echo '<form action="'.esc_url( home_url() ).'" class="header-search">';
				echo '<input name="s" type="text" placeholder="'.esc_attr( $settings['placeholder_text'] ).'">';
				echo '<button type="submit" aria-label="search-button"><i class="far fa-search"></i></button>';
			echo '</form>';
		echo '</div>';

	}

}
$widgets_manager->register( new \Travolo_Search() );
