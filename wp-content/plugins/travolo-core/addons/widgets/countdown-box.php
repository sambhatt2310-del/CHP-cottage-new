<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Group_Control_Typography;
/**
 *
 * Countdown Box Widget .
 *
 */

class Travolo_Countdown_Box extends Widget_Base {

	public function get_name() {
		return 'travolocounterbox';
	}

	public function get_title() {
		return __( 'Countdown Box', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code travolo';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

    public function get_keywords() {
		return [ 'counter'];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'travolo_counter',
			[
				'label' 	=> __( 'Countdown Box', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'title',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Get 50% Discount', 'travolo' ),
                'label_block' 	=> true,
			]
        );
        

        $this->add_control(
			'subtitle',
			[
				'label' 	=> __( ' Subtitle', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( ' Hurry Up', 'travolo' ),
                'label_block' 	=> true,
			]
        );


		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Description', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Its Limited Vacation Time Only', 'travolo' ),
                'label_block' 	=> true,
			]
        );
        $this->add_control(
			'countdown_date',
			[
				'label' 	=> __( 'Countdown Date ( Format Like 01/12/2024 )', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'default'   => __( '01/12/2024', 'travolo' ),
                'label_block' 	=> true,
			]
        );

        $this->add_control(
			'box_btn_text',
			[
				'label' 	=> __( 'Button Text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'default'   => __( 'VIEW MORE', 'travolo' ),
                'label_block' 	=> true,
			]
        );
        
        $this->add_control(
			'btn_url',
			[
				'label' 	=> __( 'Button Url', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'default'   => __( '#', 'travolo' ),
                'label_block' 	=> true,
			]
        );
        $this->end_controls_section();


        // Start Video
        $this->start_controls_section(
			'video_section',
			[
				'label'		 	=> __( 'Video Content', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'video_image',
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'video_url', [
				'label' 		=> __( 'Youtube Video Url', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '' , 'travolo' ),
				'label_block' 	=> true,
				
			]
        );
        $this->end_controls_section();


        // Section Title
        $this->start_controls_section(
			'section_style',
			[
				'label'		 	=> __( 'Content Style', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
            's_title_color',
            [
                'label'     => __('Title Color', 'travolo'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 's_title_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
				'selector' 		=> '{{WRAPPER}} .sec-title',
			]
		);

        $this->add_responsive_control(
			'section_tile_margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'section_tile_padding',
			[
				'label' 		=> __( 'Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .sec-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
        $this->add_control(
            'sub_title_color',
            [
                'label'     => __('Sub Title Color', 'travolo'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'sub_title_typography',
				'label' 		=> __( 'Sub Title Typography', 'travolo' ),
				'selector' 		=> '{{WRAPPER}} .sec-subtitle',
			]
		);

        $this->add_control(
            'dis_title_color',
            [
                'label'     => __('Discription Color', 'travolo'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'dis_title_typography',
				'label' 		=> __( 'Discription Typography', 'travolo' ),
				'selector' 		=> '{{WRAPPER}} .sec-text',
			]
		);


        $this->end_controls_section();

        $this->start_controls_section(
			'c_section_style',
			[
				'label'		 	=> __( 'Countdown Style', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
            '_wraper',
            [
                'label'     => __( 'Box Bg Color', 'travolo' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-style1 li span' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __(' Title Color', 'travolo'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-style1 li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
				'selector' 		=> '{{WRAPPER}} .countdown-style1 li',
			]
		);

        $this->add_control(
            'countdown_color',
            [
                'label'     => __( 'Countdown Color', 'travolo'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-style1 li span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'countdown_typography',
				'label' 		=> __( 'Countdown Typography', 'travolo' ),
				'selector' 		=> '{{WRAPPER}} .countdown-style1 li span',
			]
		);
        $this->end_controls_section();


        $this->start_controls_section(
			'box_style',
			[
				'label'		 	=> __( 'Wraper Box', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
        );


        $this->add_control(
            'box_wraper_bg_color',
            [
                'label'     => __( 'Background Color', 'travolo' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gallery-style4 .gallery-text' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
       
        $settings = $this->get_settings_for_display();


    ?>
        <div class="gallery-style4">
            <div class="gallery-content">
                <div class="gallery-text">
                    <div class="title-area">
                        <?php if( !empty( $settings[ 'subtitle' ] ) ): ?>
                            <span class="sec-subtitle">
                                <?php echo esc_html( $settings['subtitle'] ); ?>
                            </span>
                        <?php endif; ?>
                        <?php if( !empty( $settings[ 'title' ] ) ): ?>
                            <h2 class="sec-title h1">
                                <?php echo esc_html( $settings['title'] ); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if( !empty( $settings[ 'section_description' ] ) ): ?>
                            <p class="sec-text">
                                <?php echo esc_html( $settings['section_description'] ); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php 
                        echo '<div class="countdown-style1">';
                        if( ! empty( $settings['countdown_date'] ) ){
                            echo '<ul class="countdown-active" data-end-date="'.esc_attr( $settings['countdown_date'] ).'">';
                                echo '<li><span class="day"></span>Days</li>';
                                echo '<li><span class="hour"></span>Hours</li>';
                                echo '<li><span class="minute"></span>Minutes</li>';
                                echo '<li><span class="seconds"></span>Seconds</li>';
                            echo '</ul>';
                            }
                        echo '</div>';
                    ?>
                    <?php if( !empty( $settings[ 'box_btn_text' ] ) ): ?>
                        <a href="<?php echo esc_url( $settings['btn_url'] ) ?>" class="vs-btn style3">
                            <?php echo esc_html( $settings['box_btn_text'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <?php if( $settings['video_image']['url'] ): ?>
                    <div class="gallery-img">     
                            <?php echo travolo_img_tag( array(
                                'url'	=> esc_url( $settings['video_image']['url'] ),
                                'alt'   => 'images',
                            ) );
                            ?>
                        <?php if(!empty( $settings[ 'video_url' ] )) : ?>
                            <a href="<?php echo esc_url( $settings[ 'video_url' ] ); ?>" class="play-btn popup-video">
                                <i class="fas fa-play"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php 
	}
}
$widgets_manager->register( new \Travolo_Countdown_Box() );