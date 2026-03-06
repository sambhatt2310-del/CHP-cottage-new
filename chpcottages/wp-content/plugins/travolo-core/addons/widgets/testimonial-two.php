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
 * Testimonial Two Widget .
 *
 */
class Travolo_Testimonial_Two extends Widget_Base{

	public function get_name() {
		return 'travolotestimonialtwo';
	}

	public function get_title() {
		return __( 'Testimonial Two', 'travolo' );
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
				'label' 	=> __( 'Testimonial Two', 'travolo' ),
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
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Rodja Heartmann' , 'travolo' ),
				'label_block' 	=> true,
			]
        );

		$repeater->add_control(
			'client_digi', [
				'label' 		=> __( 'Client Designation', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
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
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Contrary to popular belief, Lorem Ipsum is not simply random text over 2000 years old. Richard McClintock' , 'travolo' ),
				'label_block' 	=> true,
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
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'wellnez' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'wellnez' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 		=> [
					'px' 			=> [
						'min' 			=> 0,
						'max' 			=> 10,
						'step'			=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 2,
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
			'shape_image',
			[
				'label' 		=> __( 'Shape Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'testimonial_style' => '2' ]
			]
		);

		$this->add_control(
			'quote_image',
			[
				'label' 		=> __( 'Quote Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'testimonial_style' => '2' ]
			]
		);

        $this->add_control(
			'testimonial_slider_client_name_color',
			[
				'label' 		=> __( 'Client Name Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style2 .testi-name,{{WRAPPER}} .testi-style3 .testi-name,{{WRAPPER}} .testi-style5 .testi-name' => 'color: {{VALUE}}!important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_name_typography',
				'label' 	=> __( 'Client Name Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .testi-style2 .testi-name,{{WRAPPER}} .testi-style3 .testi-name,{{WRAPPER}} .testi-style5 .testi-name',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_name_margin',
			[
				'label' 		=> __( 'Client Name Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style2 .testi-name,{{WRAPPER}} .testi-style3 .testi-name,{{WRAPPER}} .testi-style5 .testi-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .testi-style2 .testi-name,{{WRAPPER}} .testi-style3 .testi-name,{{WRAPPER}} .testi-style5 .testi-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'testi_f_bodybg',
			[
				'label' 	=> __( 'Client Feedback Box Bg', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .testi-style2 .testi-body,{{WRAPPER}} .testi-style5 .testi-body' => 'background-color: {{VALUE}} !important',
				],
			]
        );

        $this->add_control(
			'testimonial_slider_client_feedback_color',
			[
				'label' 	=> __( 'Client Feedback Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-style2 .testi-text,{{WRAPPER}} .testi-style3 .testi-text,{{WRAPPER}} .testi-style5 .testi-text' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_slider_client_feedback_typography',
				'label' 	=> __( 'Feedback Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .testi-style2 .testi-text,{{WRAPPER}} .testi-style3 .testi-text,{{WRAPPER}} .testi-style5 .testi-text',
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_margin',
			[
				'label' 		=> __( 'Feedback Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style2 .testi-body,{{WRAPPER}} .testi-style3 .testi-text,{{WRAPPER}} .testi-style5 .testi-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testimonial_slider_client_feedback_padding',
			[
				'label' 		=> __( 'Feedback Box Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style2 .testi-body,{{WRAPPER}} .testi-style3 .testi-text,{{WRAPPER}} .testi-style5 .testi-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->end_controls_section();


        // rating
        $this->start_controls_section(
			'testimonial_rating',
            [
				'label' 	=> __( 'rating', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'rating_color',
			[
				'label' 	=> __( 'Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-style2 .testi-rating i,{{WRAPPER}} .testi-style3 .testi-rating > i,{{WRAPPER}} .testi-style5 .testi-rating > i' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'rating
                _typo',
				'label' 	=> __( 'Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .testi-style2 .testi-rating i,{{WRAPPER}} .testi-style3 .testi-rating > i,{{WRAPPER}} .testi-style5 .testi-rating > i',
			]
        );

        $this->add_responsive_control(
			'rating
            _margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style2 .testi-rating i,{{WRAPPER}} .testi-style3 .testi-rating > i,{{WRAPPER}} .testi-style5 .testi-rating > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();


        $this->start_controls_section(
			'testimonial_digi',
			[
				'label' 	=> __( 'Digination', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'digination_color',
			[
				'label' 	=> __( 'Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testi-style2 .testi-degi,{{WRAPPER}} .testi-style3 .testi-degi,{{WRAPPER}} .testi-style5 .testi-degi' => 'color: {{VALUE}} !important',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'digination_typo',
				'label' 	=> __( 'Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .testi-style2 .testi-degi,{{WRAPPER}} .testi-style3 .testi-degi,{{WRAPPER}} .testi-style5 .testi-degi',
			]
        );

        $this->add_responsive_control(
			'digination_margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-style2 .testi-degi,{{WRAPPER}} .testi-style3 .testi-degi,{{WRAPPER}} .testi-style5 .testi-degi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

	}
	protected function render() {

		$settings = $this->get_settings_for_display();
		if( $settings['testimonial_style'] == '1' || $settings['testimonial_style'] == '2' ){
        	$this->add_render_attribute( 'wrapper', 'class', 'row testimonial-slider2' );
		}elseif( $settings['testimonial_style'] == '3' ){
			$this->add_render_attribute( 'wrapper', 'class', 'row testimonial-slider5' );
		}

        $this->add_render_attribute( 'wrapper', 'data-slick-arrows', 'false' );
        $this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
       
        $slides = $settings['slides'];

    ?>
        <div <?php echo $this->get_render_attribute_string('wrapper'); ?> >
            <?php foreach( $slides as $slide ): ?>
				<?php if( $settings['testimonial_style'] == '1' ){ ?>
					<div class="col-xl-4">
						<div class="testi-style2">
							<div class="testi-body">
							<?php if(  !empty( $slide['client_feedback'] ) ): ?> 
								<p class="testi-text">
									<?php echo esc_html( $slide['client_feedback'] ) ?>
								</p>
							<?php endif; ?>
							<?php if(  'yes' == $slide['rating'] ): ?>
								<div class="testi-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
								</div>
							<?php endif; ?>
							</div>
							<?php if( !empty( $slide['client_name'] ) ): ?>
								<h3 class="testi-name">
									<?php echo esc_html( $slide['client_name'] ) ?>
								</h3>
							<?php endif; ?>
							<?php if( !empty( $slide['client_digi'] ) ): ?>
								<span class="testi-degi">
									<?php echo esc_html( $slide['client_digi'] ); ?>
								</span>
							<?php endif; ?>
							
							<?php if( $slide['client_image']['url'] ): ?>
								<div class="testi-avater">
									<?php echo travolo_img_tag( array(
										'url'	=> esc_url( $slide['client_image']['url'] ),
										'alt'   => 'customer image',
									) );
									?>
								</div>
							<?php endif; ?>

						</div>
					</div>
            <?php 
				}elseif( $settings['testimonial_style'] == '2' ){
					echo '<div class="col-xl-4">';
						echo '<div class="testi-style3">';
							if( ! empty( $settings['shape_image']['url'] ) ){
								echo travolo_img_tag( array(
									'url'	=> esc_url( $settings['shape_image']['url'] ),
									'class'	=> 'testi-bg'
								) );
							}
							echo '<div class="testi-body">';
							echo '<div class="testi-header">';
								if( $slide['client_image']['url'] ){
									echo '<div class="testi-avater">';
										echo travolo_img_tag( array(
											'url'	=> esc_url( $slide['client_image']['url'] ),
										) );
									echo '</div>';
								}
								echo '<div class="testi-client">';
									if( ! empty( $slide['client_digi'] ) ){
										echo '<span class="testi-degi">'.esc_html( $slide['client_digi'] ).'</span>';
									}
									if( !empty( $slide['client_name'] ) ){
										echo '<h3 class="testi-name">'.esc_html( $slide['client_name'] ).'</h3>';
									}
									if( 'yes' == $slide['rating'] ){
										echo '<div class="testi-rating">';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
							if(  !empty( $slide['client_feedback'] ) ){
								echo '<p class="testi-text">'.esc_html( $slide['client_feedback'] ).'</p>';
							}
							echo '</div>';
							if( ! empty( $settings['quote_image']['url'] ) ){
								echo '<i class="testi-icon">';
									echo travolo_img_tag( array(
										'url'	=> esc_url( $settings['quote_image']['url'] ),
									) );
								echo '</i>';
							}
						echo '</div>';
					echo '</div>';
				}elseif( $settings['testimonial_style'] == '3' ){
					echo '<div class="col-xl-4">';
						echo '<div class="testi-style5">';
							echo '<div class="testi-body">';
							echo '<div class="testi-header">';
								if( $slide['client_image']['url'] ){
									echo '<div class="testi-avater">';
										echo travolo_img_tag( array(
											'url'	=> esc_url( $slide['client_image']['url'] ),
										) );
									echo '</div>';
								}
								echo '<div class="testi-client">';
									if( 'yes' == $slide['rating'] ){
										echo '<div class="testi-rating">';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
											echo '<i class="fas fa-star"></i>';
										echo '</div>';
									}
									if( !empty( $slide['client_name'] ) ){
										echo '<h3 class="testi-name">'.esc_html( $slide['client_name'] ).'</h3>';
									}
									if( ! empty( $slide['client_digi'] ) ){
										echo '<span class="testi-degi">'.esc_html( $slide['client_digi'] ).'</span>';
									}
								echo '</div>';
							echo '</div>';
							if(  !empty( $slide['client_feedback'] ) ){
								echo '<p class="testi-text">'.esc_html( $slide['client_feedback'] ).'</p>';
							}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			?>
            <?php endforeach; ?>
        </div>
		<?php 
	}
}
$widgets_manager->register( new \Travolo_Testimonial_Two() );
