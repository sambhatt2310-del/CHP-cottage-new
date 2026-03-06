<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Travolo_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'travolotestimonialsliders';
	}

	public function get_title() {
		return __( 'Testimonial Slider', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' 		=> __( 'Testimonial Style', 'travolo' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  			=> __( 'Style One', 'travolo' ),
					'2' 			=> __( 'Style Two', 'travolo' ),
					'3' 			=> __( 'Style Three', 'travolo' ),
				],
			]
		);
		
		$repeater = new Repeater();

		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rodja Heartmann' , 'travolo' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'client_digi', [
				'label' 		=> __( 'Client Designation', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'CEO, Vecuro' , 'travolo' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'rating',
			[
				'label' 		=> __( 'Rating?', 'travolo' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'travolo' ),
				'label_off' 	=> __( 'No', 'travolo' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$repeater->add_control(
			'quate',
			[
				'label' 		=> __( 'Quate', 'travolo' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'travolo' ),
				'label_off' 	=> __( 'No', 'travolo' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Contrary to popular belief, Lorem Ipsum is not simply random text over 2000 years old. Richard McClintock' , 'travolo' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'quate_image',
			[
				'label' 		=> __( 'Quate Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'quate' => [ 'yes' ] ],
			]
		);

		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		

		$this->add_control(
			'slides',
			[
				'label' 		=> __( 'Slides', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Alax Markun', 'travolo' ),
						'client_feedback' 	=> __( 'Contrary to popular belief, Lorem Ipsum is not simply random text over 2000 years old. Richard McClintock', 'travolo' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
					[
						'client_name' 		=> __( 'Vivi Marian', 'travolo' ),
						'client_feedback' 	=> __( 'Contrary to popular belief, Lorem Ipsum is not simply random text over 2000 years old. Richard McClintock', 'travolo' ),
						'client_image' 		=> Utils::get_placeholder_image_src(),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();
		

		$this->start_controls_section(
			'testimonial_general',
			[
				'label' 	=> __( 'General', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'shape_img',
			[
				'label' 		=> __( 'Shape Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'bg_color',
			[
				'label' 		=> __( ' Box Background', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-shape' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_name_style_section',
			[
				'label' 	=> __( 'Client Name', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_name_color',
			[
				'label' 		=> __( 'Client Name Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-name, .testi-style2 .testi-name' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .testi-style1 .testi-name, .testi-style2 .testi-name',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-name, .testi-style2 .testi-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_padding',
			[
				'label' 		=> __( 'Client Name Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-name, .testi-style2 .testi-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'testimonial_slider_client_feedback_style_section',
			[
				'label' 	=> __( 'Client Feedback', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_color',
			[
				'label' 	=> __( 'Client Feedback Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-style1 .testi-text, .testi-style2 .testi-text' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Feedback Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .testi-style1 .testi-text, .testi-style2 .testi-text',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Feedback Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-text, .testi-style2 .testi-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Feedback Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style1 .testi-text, .testi-style2 .testi-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

        $this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();
		$testimonial_style = $settings[ 'testimonial_style' ];

		?>
	
			<div class="testi-style1">
				<div class="testi-avaters vs-slider-tab" data-asnavfor="#testId">
					<?php foreach( $settings[ 'slides' ] as $slide ): ?>
						<?php if( $slide['client_image']['url'] ): ?>
							<button class="tab-btn">
								<?php echo travolo_img_tag( array(
									'url'	=> esc_url( $slide['client_image']['url'] ),
									'alt'   => 'client-img',
								) );
								?>
							</button>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				
				<?php if( !empty( $settings['shape_img']['url'] ) ): ?>
					<div class="testi-shape">
						<?php echo travolo_img_tag( array(
							'url'	=> esc_url( $settings['shape_img']['url'] ),
							'alt'   => 'client-img',
						) );
						?>
					</div>
				<?php endif; ?>

				<div class="testimonial-carousel" id="testId" data-slide-show="1" data-fade="true">
					<?php foreach( $settings[ 'slides' ] as $slide ): ?>
						<div>
							<?php if( 'yes' == $slide[ 'quate' ] && !empty( $slide['quate_image']['url'] ) ): ?>
								<div class="testi-quote">
									<?php echo travolo_img_tag( array(
										'url'	=> esc_url( $slide['quate_image']['url'] ),
										'alt'   => 'client-img',
									) );
									?>
								</div>
							<?php endif; ?>

							<?php if( 'yes' == $slide[ 'rating' ] ):  ?>
								<div class="testi-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i> 
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
							<?php endif; ?>
							<?php if( !empty( $slide[ 'client_feedback' ] ) ): ?>
								<p class="testi-text">
									<?php echo esc_html($slide[ 'client_feedback' ]); ?>
								</p>
							<?php endif; ?>
							
							<?php if( $slide['client_image']['url'] ): ?>
								<div class="testi-avater">
									<?php echo travolo_img_tag( array(
										'url'	=> esc_url( $slide['client_image']['url'] ),
										'alt'   => 'client-img',
									) );
									?>
								</div>
							<?php endif; ?>

							<?php if( !empty( $slide[ 'client_name' ] ) ): ?>
								<h3 class="testi-name"><?php echo esc_html($slide[ 'client_name' ]) ?></h2>
							<?php endif; ?>

							<?php if( !empty( $slide[ 'client_digi' ] ) ): ?>
								<span class="testi-degi">
									<?php echo esc_html( $slide[ 'client_digi' ] ); ?>
								</span>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>		
		<?php 
	}
}
$widgets_manager->register( new \Travolo_Testimonial_Slider() );
