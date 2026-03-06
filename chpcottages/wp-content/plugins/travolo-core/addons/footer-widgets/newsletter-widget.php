<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Newsletter Widget .
 *
 */
class Travolo_Newsletter_Widgets extends Widget_Base {

	public function get_name() {
		return 'travolonewsletter';
	}

	public function get_title() {
		return __( 'Newsletter', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo_footer_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'newsletter_section',
			[
				'label'     => __( 'Newsletter Options', 'travolo' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'newsletter_style',
			[
				'label' 	=> __( 'Newsletter Style', 'travolo' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'travolo' ),
					'2' 		=> __( 'Style Two', 'travolo' ),
					'3' 		=> __( 'Style Three', 'travolo' ),
					'4' 		=> __( 'Style Four', 'travolo' ),
				],
			]
		);

        $this->add_control(
			'newsletter_title',
			[
				'label'     => __( 'Newsletter Title', 'travolo' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Subscribe', 'travolo' ),
				'condition'	=> [ 'newsletter_style' => '1' ],
			]
        );

        $this->add_control(
			'newsletter_placeholder',
			[
				'label'     => __( 'Newsletter Placeholder Text', 'travolo' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Newsletter Placeholder Text', 'travolo' ),
			]
        );

        $this->add_control(
			'newsletter_submit',
			[
				'label'     => __( 'Newsletter Submit Button Text', 'travolo' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Subscribe', 'travolo' )
			]
        );
        $this->end_controls_section();

        $this->start_controls_section(
			'newsletter_title_style_section',
			[
				'label'     => __( 'Newsletter Style', 'travolo' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
            'newsletter_title_options',
            [
                'label'     => __( 'Newsletter Title Options', 'travolo' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
			'newsletter_title_color',
			[
				'label'     => __( 'Newsletter Title Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-widget .widget_title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'newsletter_title_typography',
				'label'     => __( 'Newsletter Title Typography', 'travolo' ),
                'selector'  => '{{WRAPPER}} .footer-widget .widget_title',
			]
        );
        $this->add_control(
			'newsletter_title_margin',
			[
				'label'         => __( 'Newsletter Title Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .footer-widget .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->add_control(
			'newsletter_title_padding',
			[
				'label'         => __( 'Newsletter Title Padding', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .footer-widget .widget_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);
		$this->add_control(
            'newsletter_other_options',
            [
                'label'     => __( 'Newsletter Other Options', 'travolo' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
		$this->add_control(
			'newsletter_write_color',
			[
				'label'     => __( 'Newsletter Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_control(
			'newsletter_background_color',
			[
				'label'     => __( 'Newsletter Background Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'newsletter_border_color',
			[
				'label'     => __( 'Newsletter Border Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input' => 'border-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'newsletter_placeholder_color',
			[
				'label'     => __( 'Newsletter Placeholder Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form input::placeholder' => 'color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'input_border',
				'label'     => __( 'Border', 'travolo' ),
				'selector'  => '{{WRAPPER}} .newsletter-form input',
			]
		);

        $this->add_control(
			'newsletter_button_color',
			[
				'label'     => __( 'Newsletter Button Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'newsletter_button_color_hover',
			[
				'label'     => __( 'Newsletter Button Color Hover', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .vs-btn:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'newsletter_button_bgcolor',
			[
				'label'     => __( 'Newsletter Button Background Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'newsletter_button_bgcolor_hover',
			[
				'label'     => __( 'Newsletter Button Background Color Hover', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-form .vs-btn:after' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'newsletter_button_typography',
				'label'     => __( 'Newsletter Button Typography', 'travolo' ),
                'selector'  => '{{WRAPPER}} .newsletter-form .vs-btn',
			]
        );
		$this->add_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-form .vs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .newsletter-form .vs-btn',
			]
		);


        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['newsletter_style'] == '1' ){
			echo '<div class="widget footer-widget">';
				if( ! empty( $settings['newsletter_title'] ) ){
					echo '<h4 class="widget_title">'.esc_html( $settings['newsletter_title'] ).'</h4>';
				}
				echo '<form class="newsletter-form footer-newsletter pt-2">';
					echo '<input class="form-control mb-25 rounded-1" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'" required >';
						echo '<button type="submit" class="vs-btn mask-style1 rounded-1">';
							if( ! empty( $settings['newsletter_submit'] ) ){
								echo esc_html( $settings['newsletter_submit'] );
							}
						echo '</button>';
				echo '</form>';
			echo '</div>';
		}elseif( $settings['newsletter_style'] == '2' ){
			echo '<form class="newsletter-form">';
				echo '<div class="footer-subscribe footer-newsletter">';
	                echo '<input required type="email" class="form-control" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
	                echo '<button class="vs-btn style2">';
						if( ! empty( $settings['newsletter_submit'] ) ){
							echo esc_html( $settings['newsletter_submit'] );
						}
					echo '</button>';
				echo '</div>';
            echo '</form>';
		}elseif(  $settings['newsletter_style'] == '3' ){
			echo '<form class="newsletter-form form-style3">';
				echo '<div class="form-group">';
					echo '<input type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
					echo '<button type="submit" class="vs-btn style7">'.esc_html( $settings['newsletter_submit'] ).'<i class="fal fa-long-arrow-right"></i></button>';
				echo '</div>';
			echo '</form>';
		}elseif( $settings['newsletter_style'] == '4' ){
			echo '<form class="newsletter-form newsletter-form2">';
				echo '<input class="form-control" type="email" placeholder="'.esc_attr( $settings['newsletter_placeholder'] ).'">';
				echo '<button type="submit" class="vs-btn mask-style1">'.esc_html( $settings['newsletter_submit'] ).'</button>';
			echo '</form>';
		}
	}
}
$widgets_manager->register( new \Travolo_Newsletter_Widgets() );