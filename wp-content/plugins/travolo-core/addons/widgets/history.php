<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
/**
 *
 * Check List Widget .
 *
 */
class Travolo_History extends Widget_Base {

	public function get_name() {
		return 'travolohistory';
	}

	public function get_title() {
		return __( 'History', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'history_section',
			[
				'label' 	=> __( 'Check List', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'history_title',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Travolo', 'travolo' )
			]
        );

        $repeater->add_control(
			'history_year',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '2023', 'travolo' )
			]
        );

		$repeater->add_control(
			'history_text',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictgum ultricies ligula sed portga ', 'travolo' )
			]
        );
		
        


		$this->add_control(
			'historys',
			[
				'label' 		=> __( 'Check Lists', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'history_title'    => __( 'Travolo', 'travolo' ),
						'history_year'    => __( '2023', 'travolo' ),
						'history_text'    => __( 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictgum ultricies ligula sed portga', 'travolo' ),

                    ],
                    [
						'history_title'    => __( 'Travolo', 'travolo' ),
						'history_year'    => __( '2021', 'travolo' ),
						'history_text'    => __( 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictgum ultricies ligula sed portga', 'travolo' ),

                    ]
                ],
                'title_field' 	=> '{{{ history_title }}}',
			]
		);
        $this->end_controls_section();

        // Style
        $this->start_controls_section(
			'historys_style',
			[
				'label' 	=> __( 'Tilte', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'text_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .vs-history .history-title',
			]
		);

        $this->add_control(
			'text_color',
			[
				'label'     => __( 'Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-history .history-title' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_responsive_control(
			'history_margin',
			[
				'label'         => __( 'Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-history .history-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

		$this->start_controls_section(
			'historys_date',
			[
				'label' 	=> __( 'Year', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'tdate_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .vs-history .history-date',
			]
		);

        $this->add_control(
			'date_color',
			[
				'label'     => __( 'Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-history .history-date' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_responsive_control(
			'date_padding',
			[
				'label'         => __( 'Padding', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .vs-history .history-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

		$this->start_controls_section(
			'historys_dis',
			[
				'label' 	=> __( 'Discription', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'tdis_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} p.history-text',
			]
		);

        $this->add_control(
			'dis_color',
			[
				'label'     => __( 'Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} p.history-text' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_responsive_control(
			'dis_padding',
			[
				'label'         => __( 'Padding', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} p.history-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

		$this->start_controls_section(
			'box',
			[
				'label' 	=> __( 'Box', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'bg_bg',
			[
				'label'     => __( 'Backgrund Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .vs-history' => 'background-color: {{VALUE}}!important',
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
					'{{WRAPPER}} .vs-history' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .vs-history',
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        
        $settings = $this->get_settings_for_display(); 
        ?>
			<div class="row">
				<?php foreach( $settings['historys'] as $history ): ?>
					<div class="col-lg-6 col-md-6 history-steped">
						<span class="divider"></span>
						<div class="vs-history">
							<div class="header-area">
								<?php if( !empty( $history['history_title'] ) ):  ?>
									<h3 class="history-title"><?php echo esc_html( $history['history_title'] ); ?></h3>
								<?php endif; ?>
								
								<?php if( !empty( $history['history_year'] ) ):  ?>
									<span class="history-date"><?php echo esc_html( $history['history_year'] ); ?></span>
								<?php endif; ?>
							</div>

							<?php if( !empty( $history['history_text'] ) ):  ?>
								<p class="history-text">
									<?php echo esc_html( $history['history_text'] ); ?> 
								</p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
            
        <?php
	}
}
$widgets_manager->register( new \Travolo_History() );