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
class Travolo_Contact_Box extends Widget_Base {

	public function get_name() {
		return 'travolocontactbox';
	}

	public function get_title() {
		return __( 'Contact Box ', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' 	=> __( 'Check List', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'contactbox_icon',
			[
				'label' 	=> __( 'Icon Name', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'fas fa-map-marked-alt', 'travolo' ),
                'label_block' 	=> true,
			]
        );

		$this->add_control(
			'contactbox_title',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Address', 'travolo' ),
                'label_block' 	=> true,
			]
        );

		$this->add_control(
			'contactbox_list',
			[
				'label' 	=> __( 'Contact Info', 'travolo' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( '123456789', 'travolo' ),
                'label_block' 	=> true,
			]
        );

        $this->end_controls_section();

        // Style
        $this->start_controls_section(
			'contact_title_style',
			[
				'label' 	=> __( 'Title', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'text_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .contact-box .contact-box__title',
			]
		);

        $this->add_control(
			'text_color',
			[
				'label'     => __( 'Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-box .contact-box__title' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_responsive_control(
			'contattitle_margin',
			[
				'label'         => __( 'Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .contact-box .contact-box__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		
		$this->add_responsive_control(
			'contactbox_title_margin',
			[
				'label'         => __( 'Wraper Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .contact-box .contact-box__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

		 // Style
		 $this->start_controls_section(
			'contact_box_style',
			[
				'label' 	=> __( 'Box', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_control(
			'contact_box_bg_color',
			[
				'label'     => __( 'Background Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-box' => 'background-color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_responsive_control(
			'contactbox_border-radius',
			[
				'label'         => __( 'Border Radius', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .contact-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->add_responsive_control(
			'contactbox_padding',
			[
				'label'         => __( 'Padding', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .contact-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->add_responsive_control(
			'contactbox_margin',
			[
				'label'         => __( 'Margin', 'travolo' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%', 'em' ],
				'selectors'     => [
					'{{WRAPPER}} .contact-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {
        
        $settings = $this->get_settings_for_display(); 
        ?>
        <div class="contact-box">
            <?php if( !empty( $settings['contactbox_icon'] ) ): ?>
                <div class="contact-box_icon">
                    <i class="<?php echo esc_attr( $settings['contactbox_icon'] ); ?>"></i>
                </div>
            <?php endif; ?>
            
            <?php if( !empty( 'contactbox_title' ) ): ?>
                <h3 class="contact-box__title h5">
                    <?php echo esc_html( $settings['contactbox_title'] );  ?>
                </h3>
            <?php endif; ?>

            <?php if( !empty( $settings['contactbox_list'] ) ): ?>
                
                <?php echo  wp_kses_post( $settings['contactbox_list'] ) ?>
              
            <?php endif; ?>
        </div>
        <?php
	}
}
$widgets_manager->register( new \Travolo_Contact_Box() );