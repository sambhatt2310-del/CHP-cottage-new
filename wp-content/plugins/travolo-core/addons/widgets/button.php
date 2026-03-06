<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget .
 *
 */
class Travolo_Button extends Widget_Base {

	public function get_name() {
		return 'travolobutton';
	}

	public function get_title() {
		return __( 'Button', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'button_style',
			[
				'label' 	=> __( 'Button Style', 'travolo' ),
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
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Button Text', 'travolo' )
			]
        );

        $this->add_control(
			'button_icon_class',
			[
				'label' 	=> __( 'Button Icon Class', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'fas fa-chevron-right', 'travolo' ),
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'travolo' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'travolo' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);


        $this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'travolo' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 			=> [
						'title' 		=> __( 'Left', 'travolo' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 		=> [
						'title' 		=> __( 'Center', 'travolo' ),
						'icon' 			=> 'eicon-text-align-center',
					],
						'right' 	=> [
						'title' 		=> __( 'Right', 'travolo' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

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
					'{{WRAPPER}} .btn-wrapper a' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper a:hover' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper a,{{WRAPPER}} .vs-btn::before' => 'background-color: {{VALUE}}',
                ],
			]
        );
        $this->add_control(
			'button_bg_color_hover',
			[
				'label' 		=> __( 'Button Background Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper a:hover, {{WRAPPER}} .vs-btn:after, {{WRAPPER}} .vs-btn:before' => 'background-color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .btn-wrapper a',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .btn-wrapper a',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .btn-wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .btn-wrapper a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->add_control(
			'button_height',
			[
				'label' 		=> esc_html__( 'Button Min Height', 'travolo' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' => [
					'px' => [
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .btn-wrapper a' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 		=> 'box_shadow',
				'label' 	=> __( 'Box Shadow', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .btn-wrapper a',
			]
		);
        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute( 'wrapper','class', 'btn-wrapper' );

		if( $settings['button_style'] == '1' ){
			$this->add_render_attribute( 'button', 'class', 'vs-btn style7' );
		}else if( $settings['button_style'] == '2'  ){
			$this->add_render_attribute( 'button', 'class', 'vs-btn style6' );
		} else if($settings['button_style'] == '3'){
			$this->add_render_attribute( 'button', 'class', 'vs-btn style3' );
		}else if($settings['button_style'] == '4'){
			$this->add_render_attribute( 'button', 'class', 'vs-btn style4' );
		}

        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

		if( ( $settings['button_style'] == '3' ) ) {
            $this->add_render_attribute( 'button', 'class', 'btn-icon' );
        }

        echo '<!-- Button -->';
			echo '<div '.$this->get_render_attribute_string('wrapper').'>';
				if( ! empty( $settings['button_text'] ) ) {
					echo '<a '.$this->get_render_attribute_string('button').'>';
						if( ! empty( $settings['button_icon_class'] && $settings['button_style'] == '2' || $settings['button_style'] == '5' ) ){
							echo '<i class="'.esc_attr( $settings['button_icon_class'] ).'"></i>';
						}
						echo esc_html( $settings['button_text'] );
						if( ! empty( $settings['button_icon_class'] && $settings['button_style'] == '1' ) ){
							echo '<i class="'.esc_attr( $settings['button_icon_class'] ).'"></i>';
						}
					echo '</a>';
				}
			echo '</div>';
		echo '<!-- End Button -->';
	}

}
$widgets_manager->register( new \Travolo_Button() );