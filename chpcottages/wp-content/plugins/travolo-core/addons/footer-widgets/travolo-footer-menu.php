<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Footer Menu Widget .
 *
 */
class Travolo_Footer_Menu extends Widget_Base {

	public function get_name() {
		return 'travolofootermenu';
	}

	public function get_title() {
		return __( 'Footer Menu', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'footer_menu_section',
			[
				'label' 	=> __( 'Footer Menu', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'menu_iconname',
			[
				'label' 	=> __( 'Icon Name', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'far fa-angle-right', 'travolo' )
			]
        );

		$repeater->add_control(
			'menu_text',
			[
				'label' 	=> __( 'Text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Login', 'travolo' )
			]
        );
        
        $repeater->add_control(
            'text_link',
            [
                'label' 		=> __( 'Link', 'travolo' ),
                'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'travolo' ),
                'show_external' => true,
                'default' 		=> [
                    'url' 			=> '#',
                    'is_external' 	=> true,
                    'nofollow' 		=> true,
                ],
            ]
        );


		$this->add_control(
			'menu_texts',
			[
				'label' 		=> __( 'Footer Menus', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'menu_text'    => __( 'Volunteer', 'travolo' ),
						'menu_iconname'    => __( 'Icon Name', 'travolo' ),
						'text_link'    => __( '#', 'travolo' ),

					]
                ],
                'title_field' 	=> '{{{ menu_text }}}',
			]
		);
        $this->end_controls_section();

        // Style
        $this->start_controls_section(
			'footer_menu_style',
			[
				'label' 	=> __( 'Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'menu_text_typography',
				'label' 		=> __( 'Menu Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .footer-widget.widget_nav_menu a',
			]
		);

        $this->add_control(
			'menu_text_color',
			[
				'label'     => __( 'Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'color: {{VALUE}}!important',
                ],
			]
        );
        $this->add_control(
			'menu_text_color_hover',
			[
				'label'     => __( 'Hover Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a:hover' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(
			'menu_text_color_icon',
			[
				'label'     => __( 'Icon Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a:before' => 'color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_responsive_control(
			'icon_font_size',
			[
				'label' => __( 'Font Size', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a i' => 'font-size: {{SIZE}}{{UNIT}};',
	
				],
			]
		);

		$this->add_responsive_control(
			'margin-top',
			[
				'label' => __( 'Separator Height', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a i' => 'margin-top: {{SIZE}}{{UNIT}};',
	
				],
			]
		);

		$this->add_responsive_control(
			'padding_left',
			[
				'label' => __( 'Margin', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 30,
						'step' => 1,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .footer-widget.widget_nav_menu a' => 'padding-left: {{SIZE}}{{UNIT}};',
	
				],
			]
		);

        $this->end_controls_section();



	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        
        ?>
            <div class="footer-widget widget_nav_menu">
                <div class="menu-all-pages-container">
                    <ul class="menu">
                        <?php foreach( $settings[ 'menu_texts' ] as $menu_text ): 
                            $target = $menu_text['text_link']['is_external'] ? ' target="_blank"' : '';
                            $nofollow = $menu_text['text_link']['nofollow'] ? ' rel="nofollow"' : '';
                            ?>
                            <li>
								<a <?php echo $target; ?> <?php echo $nofollow; ?> href="<?php echo esc_url( $menu_text[ 'text_link' ]['url'] ); ?>">
									<i class="<?php echo esc_attr( $menu_text[ 'menu_iconname' ] ); ?>"></i>
									<?php echo esc_html( $menu_text[ 'menu_text' ] ); ?>
								</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php
	}
}
$widgets_manager->register( new \Travolo_Footer_Menu() );