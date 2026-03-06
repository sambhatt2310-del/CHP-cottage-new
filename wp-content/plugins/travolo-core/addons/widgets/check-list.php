<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Check List Widget .
 *
 */
class Travolo_Check_List extends Widget_Base {

	public function get_name() {
		return 'travolochecklist';
	}

	public function get_title() {
		return __( 'Check List', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'check_list_section',
			[
				'label' 	=> __( 'Check List', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'checklist_text',
			[
				'label' 	=> __( 'Text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Mei an periculaeuripidis.', 'travolo' )
			]
        );
        


		$this->add_control(
			'check_lists',
			[
				'label' 		=> __( 'Check Lists', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'checklist_text'    => __( 'Mei an periculaeuripidis.', 'travolo' ),

					]
                ],
                'title_field' 	=> '{{{ checklist_text }}}',
			]
		);
        $this->end_controls_section();

        // Style
        $this->start_controls_section(
			'check_lists_style',
			[
				'label' 	=> __( 'Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'text_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .list-style1 li',
			]
		);

        $this->add_control(
			'text_color',
			[
				'label'     => __( 'Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .list-style1 li' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_responsive_control(
			'checklist_margin',
			[
				'label'         => __( 'List Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .list-style1 li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		
		$this->add_responsive_control(
			'checklist_wraper_margin',
			[
				'label'         => __( 'Wraper Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .list-style1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {
        
        $settings = $this->get_settings_for_display(); 
        ?>
            <ul class="about-list1">
                <?php foreach( $settings[ 'check_lists' ] as $list ): ?>
                    <li><?php echo esc_html( $list[ 'checklist_text' ] ); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php
	}
}
$widgets_manager->register( new \Travolo_check_list() );