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
class Travolo_Hero_One extends Widget_Base {

	public function get_name() { 
		return 'travoloheroone';
	}

	public function get_title() {
		return __( 'Hero Home One', 'travolo' );
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

		$this->add_control(
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

		$repeater = new Repeater();
		
		$repeater->add_control(
			'right_img_one',
			[
				'label'     => __( 'Right Image One', 'travolo' ),
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
			'right_img_two',
			[
				'label'     => __( 'Right Image Two', 'travolo' ),
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
			'title',
            [
				'label'         => __( 'Title', 'travolo' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Skin Refresh' , 'travolo' ),
				'label_block'   => true,
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
			'hero_text',
            [
				'label'         => __( 'Discription', 'travolo' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'inspires' , 'travolo' ),
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
			'heroone_slides',
			[
				'label' 		=> __( 'Sliders', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'right_img_one' => Utils::get_placeholder_image_src(),
						'right_img_two' => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Lets Go Now', 'travolo' ),
						'title'       => __( 'Your Imaginary Journey Awaits', 'travolo' ),
						'hero_text'   => __( 'Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
						consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.
					  ', 'travolo' ),
						'button_text' => __( 'Appointment', 'travolo' ),
						'link'        => __('#', 'travolo')
					],
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'right_img_one' => Utils::get_placeholder_image_src(),
						'right_img_two' => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Lets Go Now', 'travolo' ),
						'title'       => __( 'Your Imaginary Journey Awaits', 'travolo' ),
						'hero_text'   => __( 'Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
						consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.
					  ', 'travolo' ),
						'button_text' => __( 'Read More', 'travolo' ),
						'link'        => __('#', 'travolo')
					],
					[
						'image' 	  => Utils::get_placeholder_image_src(),
						'right_img_one' => Utils::get_placeholder_image_src(),
						'right_img_two' => Utils::get_placeholder_image_src(),
						'sub_title'   => __( 'Lets Go Now', 'travolo' ),
						'title'       => __( 'Your Imaginary Journey Awaits', 'travolo' ),
						'hero_text'   => __( 'Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
						consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.
					  ', 'travolo' ),
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
		

		// Dis title
		$this->add_control(
			'dis_title',
			[
				'label' => esc_html__( 'Discription', 'travolo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'dis_color',
			[
				'label' 	=> __( 'Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .hero-text' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'sdis_typo',
				'label' 	=> __( 'Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .hero-text',
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
					'{{WRAPPER}} .vs-btn.style4' => 'color: {{VALUE}}',
                ],
			]
        );

		$this->add_control(
			'button_bg_color',
			[
				'label' 	=> __( 'Background Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style4' => 'background-color: {{VALUE}}',
                ],
			]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typo',
				'label' 	=> __( 'Button Typo', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .vs-btn.style4',
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
					'{{WRAPPER}} .vs-btn.style4:hover' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'button_bg_color_active',
			[
				'label' 	=> __( 'Background Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-btn.style4::before, {{WRAPPER}} .vs-btn.style4::after' => 'background-color: {{VALUE}}',
                ],
			]
        );
		$this->end_controls_section();

	}

	protected function render() {


        $settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'wrapper', 'class', 'heroone-carousel' );

		if( $settings['slider_autoplay'] == 'yes' ) {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
		} else {
			$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
		}

		// data-slide-show="1" data-fade="true"
		?>
		<section class="hero-layout">
			<div class="hero-mask" data-bg-src="<?php echo esc_url( $settings[ 'bg_image' ]['url'] ); ?>">
				<div class="travolo-hero-one-slider" id="hero-slider" >
				<?php foreach( $settings['heroone_slides'] as $slides  ): ?>
                    <div class="hero-slide">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6">
                                <div class="hero-content">

									<?php if(  !empty( $slides['sub_title'] )  ): ?>
										<span class="hero-subtitle">
											<?php echo esc_html( $slides['sub_title'] ) ?>
										</span>
									<?php endif; ?>
									

									<?php if(  !empty( $slides['title'] ) ): ?>
										<h1 class="hero-title">
											<?php echo esc_html( $slides['title'] ); ?>
										</h1>
									<?php endif; ?>
									<?php if( !empty( $slides['hero_text'] ) ): ?>
										<p class="hero-text">
											<?php echo esc_html( $slides['hero_text'] ); ?>
										</p>
									<?php ?>

									<?php if( !empty( $slides[ 'button_text' ]  ) ) ?>
										<a href="<?php echo esc_html( $slides[ 'link' ] ); ?>" class="vs-btn style4">
											<?php echo esc_html( $slides[ 'button_text' ] ) ?>
										</a>
									<?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="hero-img">
									<?php if( !empty( $slides[ 'right_img_one' ][ 'url' ] ) ): ?>
										<div class="img1">
											<?php echo travolo_img_tag( array(
													'url'	=> esc_url( $slides[ 'right_img_one' ][ 'url' ] ),
													'alt'   => 'hero',
												) );
											?>
										</div>
									<?php endif; ?>

									<?php if( !empty( $slides[ 'right_img_two' ][ 'url' ] ) ): ?>
										<div class="img2">
											<?php echo travolo_img_tag( array(
													'url'	=> esc_url( $slides[ 'right_img_two' ][ 'url' ] ),
													'alt'   => 'hero',
												) );
											?>
										</div>
									<?php endif; ?>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
                </div>
				<div class="slide-count travlo-hero-count vs-slider-tab" data-asnavfor="#hero-slider">
					<?php
						$slide_count = count($settings['heroone_slides']);
						for ($i = 1; $i <= $slide_count; $i++) {
							$active_class = ($i == 1) ? 'active' : '';
							echo '<button class="tab-btn ' . $active_class . '">' . $i . '</button>';
						}
					?>
				</div>

            </div>
        </section>

		
		<?php
        
	}

}
$widgets_manager->register( new \Travolo_Hero_One() );
