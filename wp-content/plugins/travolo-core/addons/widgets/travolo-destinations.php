<?php
    use \Elementor\Widget_Base;
    use \Elementor\Controls_Manager;
    use \Elementor\Group_Control_Typography;
    use \Elementor\Group_Control_Background;
    use \Elementor\Group_Control_Text_Shadow;
    use \Elementor\Group_Control_Box_Shadow;
    use \Elementor\Group_Control_Border;
    use \Elementor\Utils;
    /**
     *
     * Destinations Widget .
     *
     */
class Travolo_Destinations extends Widget_Base {

	/**
	* Get widget name.
	*
	* Retrieve Destinations widget name.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget name.
	*/
	public function get_name() {
		return 'travolodestinations';
	}

	/**
	* Get widget title.
	*
	* Retrieve Destinations widget title.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget title.
	*/
	public function get_title() {
		return __( 'Destinations', 'travolo' );
	}

	/**
	* Get widget icon.
	*
	* Retrieve Destinations widget icon.
	*
	* @since 1.0.0
	* @access public
	*
	* @return string Widget icon.
	*/

	public function get_icon() {
		return 'eicon-code';
    }
	/**
	* Get widget categories.
	*
	* Retrieve the list of categories the Destinations widget belongs to.
	*
	* @since 1.0.0
	* @access public
	*
	* @return array Widget categories.
	*/
	public function get_categories() {
		return [ 'travolo' ];
	}


	// Add The Input For User
	protected function init_controls(){

		$this->start_controls_section('content_section',
            [
                'label' => __('Normal Content', 'travolo'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

		$this->add_control(
            'destinations_style',
            [
                'label' => __('Style', 'travolo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'label_block' => true,
                'options' => array(
                    'default'  =>  __('Default', 'travolo'),
                    '1' =>   __('Style 01', 'travolo'),
                ),
            ]
        );


		$this->add_responsive_control('per_line', [
            'label'              => __('Columns per row', 'travolo'),
            'type'               => Controls_Manager::SELECT,
            'default'            => '4',
            'tablet_default'     => '6',
            'mobile_default'     => '12',
            'options'            => [
                '12' => '1',
                '6'  => '2',
                '4'  => '3',
                '3'  => '4',
            ],
            'frontend_available' => true,
			'condition'   => [
				'destinations_style' => '1',
			]
        ]);


		$this->add_control(
			'd_title',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Unforgettable Cities', 'travolo' ),
				'label_block' => true,
				'condition'   => [
					'destinations_style' => 'default',
				]
			]
        );
		$this->add_control(
			'd_sub_title',
			[
				'label' 	=> __( 'Sub Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Top Destination', 'travolo' ),
				'label_block' => true,
				'condition'   => [
					'destinations_style' => 'default',
				]
			]
        );
		$this->add_control(
			'd_content',
			[
				'label' 	=> __( 'Discription', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convgallis at tellus.', 'travolo' ),
				'condition'   => [
					'destinations_style' => 'default',
				],
				'label_block' => true,
			]
        );
		$this->end_controls_section();

		$this->start_controls_section('guery_section',
            [
                'label' => __('Query ', 'travolo'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
            'per_page',
            [
                'label'       => __('Numbar Of Destination?', 'masco-hp'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => '',
                'description' => 'user emty value show all posts',
            ]
        );

        $this->add_control(
            'post_by',
            [
                'label' => __('Post By:', 'travolo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'latest',
                'label_block' => true,
                'options' => array(
                    'latest'   =>   __('Latest Post', 'travolo'),
                    'selected' =>   __('Selected posts', 'travolo'),
                ),
            ]
        );
        $this->add_control(
            'post__in',
            [
                'label' => __('Post In', 'travolo'),
                'type' => Controls_Manager::SELECT2,
                'options' => travolo_get_all_posts('travolo_destinations'),
                'multiple' => true,
                'label_block' => true,
                'condition'   => [
					'post_by' => 'selected',
				]
            ]
        );
       
        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'travolo'),
                'type' => Controls_Manager::SELECT,
                'options' => travolo_get_post_orderby_options(),
                'default' => 'date',
                'label_block' => true,

            ]
        );
        $this->add_control(
            'order',
            [
                'label' => __('Order', 'travolo'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending',
                ],
                'default' => 'desc',
                'label_block' => true,

            ]
        );
		$this->add_control(
            'enable_pagination',
            [
                'label' => __('Show Pagination?', 'travolo'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'travolo'),
                'label_off' => __('No', 'travolo'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->end_controls_section();


		$this->start_controls_section(
			'slider_control_section',
			[
				'label' 		=> __( 'Slider Control', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
				'condition'   => [
					'destinations_style' => 'default',
				]
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
						'max' 			=> 20,
						'step'			=> 1,
					],
				],
				'default' 	=> [
					'unit' 		=> 'px',
					'size' 		=> 3,
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

         // BOX
		$this->start_controls_section(
			'box_design',
			[
				'label'			=> __( 'Box','travolo' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);
         $this->add_control(
			'destinations_bg_color',
			[
				'label' 		=> __( 'Destination Bg Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destinations-style1' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'destinations_bg_hover_color',
			[
				'label' 		=> __( 'Destination Bg Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destinations-style1:hover' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .destinations-style1' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'box_margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .destinations-style1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'box_padding',
			[
				'label' 		=> __( 'Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .destinations-style1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
		$this->end_controls_section();

		$this->start_controls_section(
			'destinations_design',
			[
				'label'			=> __( 'Price','travolo' ),
				'tab' 			=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'price_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 	    => '{{WRAPPER}} .destination-style1 .destination-price',
			]
		);
		
		$this->add_control(
			'destinations_date_color',
			[
				'label' 		=> __( 'Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-price' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'destinations_date_bg',
			[
				'label' 		=> __( 'Background', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-price' => 'background-color: {{VALUE}}',
				],
			]
		);
        $this->add_responsive_control(
			'date_padding',
			[
				'label' 		=> __( 'Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

       

        $this->start_controls_section(
            'destinations_design_style',
            [
                'label'			=> __( 'Title','travolo' ),
                'tab' 			=> Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-name a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'title_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 	    => '{{WRAPPER}} .destination-style1 .destination-name a',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-name a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

        // discription
        $this->start_controls_section(
            'destinations_dis_style',
            [
                'label'			=> __( 'Discription','travolo' ),
                'tab' 			=> Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'dis_color',
			[
				'label' 		=> __( 'Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .destination-style1 .destination-text' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'dis_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 	    => '{{WRAPPER}} .destination-style1 .destination-text',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'paginaion',
			[
				'label' => __( 'Pagination', 'travolo' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' 		=> __( 'Alignment', 'travolo' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'start' 	=> [
						'title' 		=> __( 'Left', 'travolo' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'travolo' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'end' 	=> [
						'title' 		=> __( 'Right', 'travolo' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'center',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-pagination' => 'justify-content: {{VALUE}};',
                ]
			]
		);
		$this->end_controls_section();

	}

	// Output For User
	protected function render(){
		$settings = $this->get_settings_for_display();




		
		 //gride class
		 $grid_classes = [];
		 $grid_classes[] = 'col-xl-' . $settings['per_line'];
		 $grid_classes[] = 'col-md-' . $settings['per_line_tablet'];
		 $grid_classes[] = 'col-sm-' . $settings['per_line_mobile'];
		 $grid_classes = implode(' ', $grid_classes);
		 $this->add_render_attribute('destination_gride_classes', 'class', [$grid_classes]);

		if( 'default' == $settings['destinations_style'] ){
			$this->add_render_attribute( 'wrapper', 'class', 'row destinationSlide' );
			if( $settings['slider_autoplay'] == 'yes' ) {
				$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'true' );
			} else {
				$this->add_render_attribute( 'wrapper', 'data-slick-autoplay', 'false' );
			}
			$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
		}else{
			$this->add_render_attribute( 'wrapper', 'class', 'row' );
		}
		echo '<!-- destinations style one -->';
		 // Query
		 $numabr_of_item = !empty($settings['per_page']) ? $settings['per_page'] : -1;
		 $query_args = [
			 'post_type'           => 'travolo_destinations',
			 'orderby' => $settings['orderby'],
			 'order'   => $settings['order'],
			 'posts_per_page'      => $numabr_of_item,
			 'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
			 'post_status'         => 'publish',
			 'ignore_sticky_posts' => 1,
		 ];
		 // get_type
		 if ( 'selected' === $settings['post_by'] ) {
			 $query_args['post__in'] = (array)$settings['post__in'];
		 }
 
		 $travolo_destinations = new \WP_Query($query_args);
	?>
	<?php if( $travolo_destinations->have_posts() ): ?>
		<div class="container">
			<?php if( 'default' == $settings['destinations_style'] ): ?>
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-5 col-md-8">
						<div class="title-area">
							<?php if( !empty( $settings[ 'd_title' ] ) ): ?>
								<span class="sec-subtitle"><?php echo esc_html( $settings[ 'd_title' ] ); ?></span>
							<?php endif; ?>

							<?php if( !empty( $settings[ 'd_sub_title' ] ) ): ?>
								<h2 class="sec-title h1"><?php echo esc_html( $settings[ 'd_sub_title' ] ); ?></h2>
							<?php endif; ?>

							<?php if( !empty( $settings[ 'd_content' ] ) ): ?>
								<p class="sec-text"><?php echo esc_html( $settings[ 'd_content' ] );  ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-auto">
						<div class="sec-btns">
							<button class="icon-btn" data-slick-prev=".destinationSlide"><i class="fas fa-chevron-left"></i></button>
							<button class="icon-btn" data-slick-next=".destinationSlide"><i class="fas fa-chevron-right"></i></button>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<div  <?php echo $this->get_render_attribute_string('wrapper'); ?> >
				<?php 	while( $travolo_destinations->have_posts() ): $travolo_destinations->the_post(); ?>
					<div <?php echo $this->get_render_attribute_string('destination_gride_classes'); ?>>
						<div class="destination-style1">
							<?php if( has_post_thumbnail() ): ?>
								<a href="<?php the_permalink(); ?>">  
									<?php the_post_thumbnail('travolo-destinations-image'); ?> 
								</a> 
							<?php endif; ?>
							<?php $dprice = travolo_meta( 'destination-price' ); ?>
							<?php if( !empty( $dprice ) ): ?>
								<span class="destination-price"><?php echo esc_html( $dprice ); ?></span>
							<?php endif; ?>
							<div class="destination-info">
								<h4 class="destination-name">
									<a href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</h4>
								<p class="destination-text">
									<?php echo get_the_excerpt(); ?>
								</p>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php

	}
}
$widgets_manager->register( new \Travolo_Destinations() );


