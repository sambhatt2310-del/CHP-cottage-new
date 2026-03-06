<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * News Widget .
 *
 */
class Travolo_News_Widget extends Widget_Base {

	public function get_name() {
		return 'travolonewslater';
	}

	public function get_title() {
		return __( 'Newsater Icon Text', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'news_section',
			[
				'label'		 	=> __( 'Newsletter Icon Text', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'icon_img',
			[
				'label' 		=> __( 'Offer Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [ 'active' 		=> true ],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
			'n_title',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Ready to get started?', 'travolo' )
			]
        );

		$this->add_control(
			'sub_title',
			[
				'label' 	=> __( 'Sub Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( 'Go & Discover', 'travolo' ),
			]
        );
        $this->add_control(
			'sub_title_link',
			[
				'label' 	=> __( 'Link', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
				'dynamic' 		=> [ 'active' 		=> true ],
                'default'  	=> __( '', 'travolo' )
			]
        );
        $this->end_controls_section();


        $this->start_controls_section(
			'nes_img',
			[
				'label' => __( 'Image', 'travolo' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
            'img_size',
            [
                'label'      => __('Size', 'travolo-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 20,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .newsletter-style2 img' => 'height:{{SIZE}}{{UNIT}};',
				],
			]
        );

		$this->add_responsive_control(
			'img_margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-style2 img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->add_responsive_control(
			'img_padding',
			[
				'label' 		=> __( 'Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-style2 img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_section();


        $this->start_controls_section(
			'news_style_section',
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
					'{{WRAPPER}} .newsletter-style2 .newsletter-text' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_title_typography',
				'label' 	=> __( 'Title Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .newsletter-style2 .newsletter-text',
			]
		);

        $this->add_responsive_control(
			'section_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-style2 .newsletter-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
 

        $this->add_control(
			'section_sub_title_color',
			[
				'label' 	=> __( 'Sub Title Color', 'travolo' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .newsletter-style2 a' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_sub_title_typography',
				'label' 	=> __( 'Sub Title Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .newsletter-style2 a',
			]
		);

        

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'section_subtitle_typography',
				'label' 	=> __( 'Subtitle Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .newsletter-style2 a',
			]
        );

		$this->add_responsive_control(
			'section_sub_title_margin',
			[
				'label' 		=> __( 'Sub Title Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .newsletter-style2 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .newsletter-style2 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		
        $this->end_controls_section();

		

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        ?>
			<div class="newsletter-style2">
				<?php if( $settings['icon_img']['url'] ): ?>
					<div class="newsletter-img">
						<?php echo travolo_img_tag( array(
							'url'	=> esc_url( $settings['icon_img']['url'] ),
							'alt'   => 'image',
						) );
						?>
					</div>
				<?php endif; ?>

				<?php if( !empty( $settings['n_title'] ) ): ?>
					<h3 class="newsletter-text">
						<?php echo esc_html( $settings['n_title'] ); ?>
					</h3>
				<?php endif; ?>
				<?php if( !empty( $settings['sub_title'] ) ): ?>
					<a href="<?php echo esc_url($settings['sub_title_link']); ?>">
						<?php echo esc_html( $settings['sub_title'] ); ?>
					</a>
				<?php endif; ?>
			</div>
        <?php
	}
}
$widgets_manager->register( new \Travolo_News_Widget() );