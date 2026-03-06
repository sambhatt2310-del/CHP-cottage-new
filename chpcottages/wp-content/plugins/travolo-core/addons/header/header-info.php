<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Header Widget .
 *
 */
class Travolo_Headerinfo extends Widget_Base {

	public function get_name() {
		return 'travoloheaderfooterinfo';
	}

	public function get_title() {
		return __( 'Header Footer Info ', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_info',
			[
				'label' 	=> __( 'Info', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        // $this->add_control(
		// 	'info_version',
		// 	[
		// 		'label' 	=> __( 'Style', 'travolo' ),
        //         'type' 		=> Controls_Manager::SELECT,
        //         'options'   => [
        //             'style2 style-white' => __( 'Style One', 'travolo' ),
        //             'style3'   		=> __( 'Style Two', 'travolo' ),
        //             'style2'   		=> __( 'Style Three', 'travolo' ),
        //         ],
        //         'default'  	=> 'style2 style-white'
		// 	]
        // );

        $repeater = new Repeater();
        
		$repeater->add_control(
			'info_label',
			[
				'label' 		=> __( 'Lable Text', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'default'		=> __( 'Email', 'travolo' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'info_icon_name',
			[
				'label' 		=> __( 'Icon Name', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'default'		=> __( 'Email', 'travolo' ),
				'label_block'   => true,
			]
		);

        $repeater->add_control(
			'info_text',
			[
				'label' 		=> __( 'Text', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'default'		=> __( 'user@example.com', 'travolo' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'info_url',
			[
				'label' 		=> __( 'Url', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'default'		=> __( 'mailto:user@example.com', 'travolo' ),
				'label_block'   => true,
			]
		);

        



        $this->add_control(
			'infolink_list',
			[
				'label' 		=> __( 'Header Footer Info list', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[   
						'info_label'  => __('Email', 'travolo'),
						'info_icon_name' => __('fas fa-envelope', 'travolo'),
						'info_text' => __('user@example.com', 'travolo'),
						'info_url' => __('mailto:user@example.com', 'travolo'),
					],
				]
			]
		);


        $this->end_controls_section();

		$this->start_controls_section(
			'info_style',
			[
				'label' 	=> __( 'Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'textypography',
				'label' 	=> __( 'Text Typography', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .header-contact li ',
			]
        );

		$this->add_control(
			'info_color',
			[
				'label' 		=> __( 'Text Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .header-contact li ' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'info_hoer_color',
			[
				'label' 		=> __( 'Text hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .header-contact li a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .header-contact  li i' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_hoverss_color',
			[
				'label' 		=> __( 'Icon Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .header-contact  li:hover i' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Bg Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .header-contact li i' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' 		=> __( 'Icon Hover Bg Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}  .header-links li a:hover i' => 'background-color: {{VALUE}} !important',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'icon_border',
				'label' 	=> __( 'Border', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .header-contact li i',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'icon_hover_order',
				'label' 	=> __( 'Hover Border', 'travolo' ),
                'selector' 	=> '{{WRAPPER}} .header-contact li a:hover i',
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'travolo' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .header-contact li i ' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'info_margin',
			[
				'label' 		=> __( 'Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .header-contact li ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

		$this->add_responsive_control(
			'info_padding',
			[
				'label' 		=> __( 'Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .header-contact li ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );
		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $infolink_list = $settings['infolink_list'];
        // header-links style2

		?>
            <?php if( !empty( $infolink_list ) ): ?>
                <div class="header-layout2">
                    <ul class="header-contact">
                        <?php foreach( $infolink_list as $info ):  ?>
                        <li>
                            <i class="<?php echo( $info['info_icon_name'] ); ?>"></i>
                                <?php echo esc_html( $info['info_label'] ); ?>
                                    <a href="<?php echo esc_html($info['info_url']); ?>">
                                <?php echo esc_html(  $info['info_text'] ) ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php 

	}

}
$widgets_manager->register( new \Travolo_Headerinfo() );




