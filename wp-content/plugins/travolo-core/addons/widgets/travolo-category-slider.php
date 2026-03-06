<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * destination Widget .
 *
 */
class Travolo_Destination_Slider extends Widget_Base {

	public function get_name() {
		return 'destinationslider';
	}

	public function get_title() {
		return __( 'Destination', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code'; 
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'destinations_slider_section',
			[
				'label' 	=> __( 'Destination', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );


        $this->add_control(
			'destination_title',
            [
				'label'         => __( 'Title', 'travolo' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Smarty destinations' , 'travolo' ),
				'label_block'   => true,
			]
		);

		$this->add_control(
			'destination_sub_title',
            [
				'label'         => __( 'Sub Title', 'travolo' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'CHOOSE YOUR OWN GRADE LEVEL' , 'travolo' ),
				'label_block'   => true,
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'grade_label',
            [
				'label'         => __( 'Grade Label', 'travolo' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Grade' , 'travolo' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'grade_name',
            [
				'label'         => __( 'Grade Name', 'travolo' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '1' , 'travolo' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'destination_name',
            [
				'label'         => __( 'Destination Name', 'travolo' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( 'Grade 1' , 'travolo' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'destination_label',
            [
				'label'         => __( 'Destination Label', 'travolo' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '( 4 - 5 Years )' , 'travolo' ),
				'label_block'   => true,
			]
		);
		$repeater->add_control(
			'links',
            [
				'label'         => __( 'Link', 'travolo' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => __( '#' , 'travolo' ),
				'label_block'   => true,
			]
		);


		$this->add_control(
			'destination_slider',
			[
				'label' 		=> __( 'destination Sliders', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'grade_label'=> __('Grade', 'travolo'),
						'grade_name' => __('1', 'travolo'),
						'destination_name'  => __('Grade 1', 'travolo'),
						'destination_label' => __('( 4 - 5 Years )', 'travolo'),
					],
					'title_field' 	=> '{{{ grade_name }}}',
				]
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );


		$this->add_control(
			'active_arrow',
			[
				'label' 		=> __( 'Arrow?', 'travolo' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'travolo' ),
				'label_off' 	=> __( 'No', 'travolo' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		

        $this->add_control(
			'slide_to_show',
			[
				'label' 		=> __( 'Slide To Show', 'travolo' ),
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
					'size' 		=> 5,
				],
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


        // Section Title
        $this->start_controls_section(
			'section_title',
			[
				'label' 	=> __( 'Tilte / Sub Title', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
                ]
			]
        );


		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'title_typography',
				'label'         => __( 'Title Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .sec-title',
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label'         => __( 'Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .destination-style1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );


        $this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Sub Title Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .sec-subtitle' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'subtitle_typography',
				'label'         => __( 'Sub Title Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .sec-subtitle',
			]
		);

        $this->end_controls_section();

        // Style 
        $this->start_controls_section(
			'destination_style',
			[
				'label' 	=> __( 'destination Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'label_color',
			[
				'label' 		=> __( 'Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-label' => 'color: {{VALUE}}',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'label_typography',
				'label'         => __( 'Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .destination-style1 .destination-label',
			]
		);
        $this->end_controls_section();

        // Style
        $this->start_controls_section(
			'destination_box_style',
			[
				'label' 	=> __( 'Box Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'box_background',
			[
				'label' 		=> __( 'Box Background', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-bg1' => 'background-color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'box_background_hover',
			[
				'label' 		=> __( 'Box Background Hover', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-bg2' => 'background-color: {{VALUE}}',
                ]
			]
        );

        $this->add_control(
			'custom_box_shadow',
			[
				'label' => esc_html__( 'Box Shadow', 'travolo' ),
				'type' => Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{SELECTOR}}  .destination-style1 .destination-bg1' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}};',
				],
			]
		);
      
		$this->add_responsive_control(
			'box_padding',
			[
				'label'         => __( 'Padding', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .destination-style1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->add_responsive_control(
			'box_margin',
			[
				'label'         => __( 'Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .destination-style1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->add_responsive_control(
			'box_border_radius',
			[
				'label'         => __( 'Border Radius', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .destination-style1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'wrapper', 'class', 'row destination-carousel gx-15 catslider1' );

        $this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
		
		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}

		?>

		<div class="row justify-content-between text-center text-md-start">
			<div class="col-md-auto">
				<div class="title-area">
					<?php if( !empty( $settings[ 'destination_sub_title' ] ) ): ?>
						<span class="sec-subtitle">
							<?php echo esc_html( $settings[ 'destination_sub_title' ] ); ?>
						</span>
					<?php endif; ?>
					<?php if( !empty( $settings[ 'destination_title' ] ) ): ?>
						<h2 class="sec-title"><?php echo esc_html( $settings[ 'destination_title' ] ); ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<?php if( 'yes'  == $settings['active_arrow']): ?>			
				<div class="col-md-auto align-self-end">
					<div class="sec-btns">
						<button class="icon-btn" data-slick-prev=".catslider1"><i class="far fa-arrow-left"></i></button>
						<button class="icon-btn" data-slick-next=".catslider1"><i class="far fa-arrow-right"></i></button>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
			<?php if( !empty( $settings[ 'destination_slider' ] ) ): ?>
				<?php foreach( $settings[ 'destination_slider' ] as $slider ): ?>
					<div class="col-xl-3">
						<div class="destination-style1">
							<div class="destination-bg1"></div>
							<div class="destination-bg2"></div>
							<div class="destination-bg3"></div>
							<?php if(!empty( $slider['grade_label'] ) ): ?>
								<div class="destination-grade">
									<span class="grade-label"><?php echo esc_html( $slider[ 'grade_label' ] ); ?></span>
									<span class="grade-name"><?php echo esc_html( $slider[ 'grade_name' ] ); ?></span>
								</div>
							<?php endif; ?>
							
							<?php if( !empty( $slider[ 'destination_name' ] ) ): ?>
								<h3 class="destination-name h4">
									<a href="<?php echo esc_url( $slider['links'] ); ?>" class="text-inherit">
									<?php echo esc_html( $slider[ 'destination_name' ] ); ?>
								</a>
								</h3>
							<?php endif; ?>

							<?php if( !empty( $slider['destination_label'] ) ): ?>
								<p class="destination-label"><?php echo esc_html( $slider[ 'destination_label' ] ); ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php 

	}
}
$widgets_manager->register( new \Travolo_Destination_Slider() );