<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\HEADING;
use \Elementor\Repeater;
/**
 * 
 * Image Widget .
 *
 */
class Travolo_Hero_Two extends Widget_Base {

	public function get_name() { 
		return 'travoloherotwo';
	}

	public function get_title() {
		return __( 'Hero Home Two', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {
		//Top Content
		$this->start_controls_section(
			'slider_content',
			[
				'label' 	=> __( 'Slider Content', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();
        
        $repeater->add_control(
			'bg_image',
			[
				'label'     => __( 'Background Image', 'travolo' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'sub_title',
            [
				'label'         => __( 'Sub Title', 'travolo' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'inspires' , 'travolo' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'title',
            [
				'label'         => __( 'Title', 'travolo' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Skin Refresh' , 'travolo' ),
				'label_block'   => true,
			]
		);
       
        $repeater->add_control(
			'button_text',
            [
				'label'         => __( 'Button Text', 'travolo' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Appointment' , 'travolo' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'link',
			[
				'label' 		=> __( 'Button Url', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder' 	=> __( 'https://your-link.com', 'travolo' ),
				'label_block'   => true,
			]
		);
		$this->add_control(
			'herotwo_slides',
			[
				'label' 		=> __( 'Sliders', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'bg_image' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Lets Go Now', 'travolo' ),
						'title'       => __( 'Your Imaginary Journey Awaits', 'travolo' ),
						'button_text' => __( 'Appointment', 'travolo' ),
						'link'        => __('#', 'travolo')
					],
					[
						'bg_image' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Lets Go Now', 'travolo' ),
						'button_text' => __( 'Read More', 'travolo' ),
						'link'        => __('#', 'travolo')
					],
					[
						'bg_image' 	  => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Lets Go Now', 'travolo' ),
						'title'       => __( 'Your Imaginary Journey Awaits', 'travolo' ),
						'button_text' => __( 'Read More', 'travolo' ),
						'link'        => __('#', 'travolo')
					],
				],
				'title_field' 	=> '{{title}}',
			]
		);

        $this->end_controls_section();


		//Button  Style
		$this->start_controls_section(
			'slider_settings',
			[
				'label' 	=> __( 'Slider Settings', 'travolo' ),
                'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'slider_autoplay',
			[
				'label' 		=> __( 'Autoplay', 'travolo' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'travolo' ),
				'label_off' 	=> __( 'No', 'travolo' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Content Style', 'travolo' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'title_color',
			[
				'label' 	=> __( 'Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typo',
				'label' 	=> __( 'Title Typo', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .hero-title',
			]
		);


		$this->add_responsive_control(
			'section_tile_padding',
			[
				'label' 		=> __( 'Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

		$this->add_control(
			'sub_h_title',
			[
				'label' => esc_html__( 'Sub Title', 'travolo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label' 	=> __( 'Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'sub_typo',
				'label' 	=> __( 'Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .hero-subtitle',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'button_style',
			[
				'label' 	=> __( 'Button', 'travolo' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'button_color',
			[
				'label' 	=> __( 'Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style5' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'button_bg_color',
			[
				'label' 	=> __( 'Background Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style5' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typo',
				'label' 	=> __( 'Button Typo', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn.style5',
			]
		);

		$this->add_control(
			'button_hover',
			[
				'label' => esc_html__( 'Button Hover', 'travolo' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'button_color_active',
			[
				'label' 	=> __( 'Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style5:hover' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'button_bg_color_active',
			[
				'label' 	=> __( 'Background Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style5::before, {{WRAPPER}} .vs-btn.style5::after' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->end_controls_section();

	}

	protected function render() {


        $settings = $this->get_settings_for_display();

		echo '<section class="hero-layout4">';
			echo '<div class="hero-slider2">';
				foreach( $settings['herotwo_slides'] as $slides  ):
					echo '<div class="hero-slide" data-bg-src="'.esc_url( $slides['bg_image']['url'] ).'">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
							echo '<div class="col-lg-10 mx-auto">';
								echo '<div class="hero-content text-center">';
									if( ! empty( $slides['sub_title'] ) ){
										echo '<span class="hero-subtitle">'.esc_html( $slides['sub_title'] ).'</span>';
									}
									if( ! empty( $slides['title'] ) ){
										echo '<h1 class="hero-title">'.esc_html( $slides['title'] ).'</h1>';
									}
									if( ! empty( $slides['button_text'] ) ){
										echo '<a href="'.esc_url( $slides['link'] ).'" class="vs-btn style5">'.esc_html( $slides['button_text'] ).'</a>';
									}
								echo '</div>';
							echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				endforeach;
			echo '</div>';  

			echo '<div>';
				echo '<button class="icon-btn prev-btn" data-slick-prev=".hero-slider2"><i class="fas fa-chevron-left"></i></button>';
				echo '<button class="icon-btn next-btn" data-slick-next=".hero-slider2"><i class="fas fa-chevron-right"></i></button>';
			echo '</div>';
        echo '</section>';
	}

}
$widgets_manager->register( new \Travolo_Hero_Two() );
