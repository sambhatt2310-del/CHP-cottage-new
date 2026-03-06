<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Cta Widget .
 *
 */
class Travolo_Cta_Widget extends Widget_Base {

	public function get_name() {
		return 'travolocta';
	}

	public function get_title() {
		return __( 'Cta', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'cta_section',
			[
				'label'		 	=> __( 'Cta', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'cta_box',
			[
				'label' => __( 'Style', 'travolo' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __( 'Style 1', 'travolo' ),
					'2' => __( 'Style 2', 'travolo' ),
					'3' => __( 'Style 3', 'travolo' ),
				],
			]
		);

		$this->add_control(
			'cta_img',
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [ 'active' 		=> true ],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'offer_img',
			[
				'label' 		=> __( 'Offer Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [ 'active' 		=> true ],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'cta_box' => [ '2', '3' ] ],
			]
		);

		$this->add_control(
			'sub_title',
			[
				'label' 	=> __( 'Sub Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Go & Discover', 'travolo' ),
				'condition'		=> [ 'cta_box' => [ '2', '3' ] ],
			]
        );

        $this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Ready to get started?', 'travolo' )
			]
        );

        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Subtitle', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
                'default'  	=> __( 'It only takes a few minutes to register your FREE Travolo account.', 'travolo' )
			]
        );
        
        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Open An Account', 'travolo' )
			]
        );
        
        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'travolo' ),
				'type' 			=> Controls_Manager::URL,
				'dynamic' 		=> [ 'active' 		=> true ],
				'placeholder' 	=> __( 'https://your-link.com', 'travolo' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
        $this->end_controls_section();




		// box style
        $this->start_controls_section(
			'cta_box_section',
			[
				'label' => __( 'Box', 'travolo' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'background_img',
			[
				'label' 		=> __( 'Bg Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [ 'active' 		=> true ],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'cta_box' => '2' ],
			]
		);

		$this->add_control(
			'box_bg',
			[
				'label' 	=> __( 'Background Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-style1' => 'background-color: {{VALUE}}',
					'condition'		=> [ 'cta_box' => '1' ],
                ],
			]
        );
		$this->add_responsive_control(
			'box_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}}  .cta-style1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->add_responsive_control(
			'box_margin',
			[
				'label' 		=> __( 'Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}}  .cta-style1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();


		

        $this->start_controls_section(
			'cta_style_section',
			[
				'label' => __( 'Title', 'travolo' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'section_title_color',
			[
				'label' 	=> __( 'Title Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cta-style1 .cta-title, {{WRAPPER}} .white-title .sec-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Title Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .cta-style1 .cta-title, , {{WRAPPER}} .white-title .sec-title',
                'condition' => [
                    'section_title!'    => ''
                ]
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .cta-style1 .cta-title , {{WRAPPER}} .white-title .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_title!'    => ''
                ]
			]
        );
 

        $this->add_control(
			'section_sub_title_color',
			[
				'label' 	=> __( 'Sub Title Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .white-title .sec-subtitle' => 'color: {{VALUE}}',
                ],
                'condition'		=> [ 'cta_box' => '2' ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_sub_title_typography',
				'label' 	=> __( 'Sub Title Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .white-title .sec-subtitle',
                'condition'		=> [ 'cta_box' => '2' ],
			]
		);

        $this->add_responsive_control(
			'section_sub_title_margin',
			[
				'label' 		=> __( 'Sub Title Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .white-title .sec-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'		=> [ 'cta_box' => '2' ],
			]
        );

		$this->add_control(
			'section_subtitle_color',
			[
				'label' 		=> __( 'Discription Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .cta-style1 .cta-text, {{WRAPPER}} .white-title .sec-text' => 'color: {{VALUE}}',
                ],
                'condition' 	=> [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .cta-style1 .cta-text, {{WRAPPER}} .white-title .sec-text',
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );

        $this->add_responsive_control(
			'section_subtitle_margin',
			[
				'label' 		=> __( 'Subtitle Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .cta-style1 .cta-text, {{WRAPPER}} .white-title .sec-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
        );
		
        $this->end_controls_section();

		// button style 
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:after, {{WRAPPER}} .vs-btn:before' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .vs-btn',
			]
		);
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        
        $this->add_render_attribute( 'button','class', 'vs-btn');

        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        };

		$cta_box = $settings[ 'cta_box' ];

        ?>
			<?php 	
				if ($cta_box) {
					include('cta-box/'.$cta_box.'.php');
				}
			?>
        <?php 
	}
}
$widgets_manager->register( new \Travolo_Cta_Widget() );