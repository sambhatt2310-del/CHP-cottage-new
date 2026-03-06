<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Blog Post Widget .
 *
 */
class Travolo_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'travoloblogpost';
	}

	public function get_title() {
		return __( 'Blog Post', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'travolo' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'blog_post_style',
			[
				'label' 	=> __( 'Blog Style', 'travolo' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    '1'   		=> __( 'Style One', 'travolo' ),
                    '2'   		=> __( 'Style Two', 'travolo' ),
                    '3'   		=> __( 'Style Three', 'travolo' ),
                    '4'   		=> __( 'Style Four', 'travolo' ),
                    '5'   		=> __( 'Style Five', 'travolo' ),
                ],
                'default'  	=> '1'
			]
        );

        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '4', 'travolo' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'travolo' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '10', 'travolo' ),
			]
		);

		$this->add_control(
			'excerpt_count',
			[
				'label' 	=> __( 'Excerpt Length', 'travolo' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '15', 'travolo' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'travolo' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','travolo'),
                    'DESC'   	=> __('DESC','travolo'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'travolo' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'travolo' ),
                    'author'    => __( 'Author', 'travolo' ),
                    'title'    	=> __( 'Title', 'travolo' ),
                    'date'    	=> __( 'Date', 'travolo' ),
                    'rand'    	=> __( 'Random', 'travolo' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'travolo' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->travolo_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'travolo' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->travolo_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'travolo' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->travolo_post_id(),
			]
        );

		$this->add_control(
			'read_more_text',
			[
				'label' 	=> __( 'Read More Text', 'travolo' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( 'Read More', 'travolo' ),
			]
		);

		$this->add_control(
			'btn_class',
			[
				'label' 	=> __( 'Button Class', 'travolo' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( 'link-btn', 'travolo' ),
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
					'size' 		=> 3,
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'content_bg_style',
			[
				'label' 	=> __( 'Background Image', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'blog_post_style' => '1' ],
			]
        );

		$this->add_control(
			'content_bg',
			[
				'label' 		=> __( 'Background Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->end_controls_section();

        $this->start_controls_section(
			'post_title_style_section',
			[
				'label' 	=> __( 'Title', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'post_title_color',
			[
				'label' 		=> __( 'Title Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-title a' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'post_title_color_hover',
			[
				'label' 		=> __( 'Title Color Hover', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog .blog-title a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'post_title_typography',
				'label' 	=> __( 'Title Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .vs-blog .blog-title',
			]
        );

        $this->add_responsive_control(
			'post_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );


        $this->add_responsive_control(
			'post_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'meta_hover_color',
			[
				'label' 		=> __( 'Meta Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-date:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .blog-date',
			]
		);


		$this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .link-btn,{{WRAPPER}} .vs-btn.style3' => 'color: {{VALUE}}',
				],
			]
	);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .link-btn,{{WRAPPER}} .vs-btn.style3',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'box_style',
			[
				'label' 	=> __( 'Box', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		
		$this->add_responsive_control(
			'box_margin',
			[
				'label' 		=> __( 'Box Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' 		=> __( 'Box Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-blog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
    }

    public function travolo_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'travolo');
        }

        return $catarr;
    }

    public function travolo_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'travolo');
        }

        return $catarr;
    }

    // Get Specific Post
    public function travolo_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $travolo_post = new WP_Query( $args );

        $postarray = [];

        while( $travolo_post->have_posts() ){
            $travolo_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }

		if( $settings['blog_post_style'] == '1'  ){
			$this->add_render_attribute( 'wrapper', 'class', 'row' );
		}elseif( $settings['blog_post_style'] == '2' || $settings['blog_post_style'] == '3' || $settings['blog_post_style'] == '4' ){
			$this->add_render_attribute( 'wrapper', 'class', 'row blog-carousel' );
			$this->add_render_attribute( 'wrapper', 'data-slide-to-show', $settings['slide_to_show']['size'] );
		}elseif( $settings['blog_post_style'] == '5'  ){
			$this->add_render_attribute( 'wrapper', 'class', 'blog' );
		}

        $counter = 1;
        $blogpost = new WP_Query( $args );

		$blog_post_style = $settings[ 'blog_post_style' ];

        if( $blogpost->have_posts() ) {
			echo '<!-- blog Area -->';
				echo '<section class="vs-blog-wrapper">';
			    	echo '<div '.$this->get_render_attribute_string('wrapper').'>';
						while( $blogpost->have_posts() ) {
							$blogpost->the_post();
							if ( $blog_post_style ) {
								include('blog/'.$blog_post_style.'.php');
							}
					  	}
						wp_reset_postdata();
			    	echo '</div><!-- .row END -->';
				echo '</section>';
			echo '<!-- blog Area end -->';
        }
	}
}
$widgets_manager->register( new \Travolo_Blog_Post() );