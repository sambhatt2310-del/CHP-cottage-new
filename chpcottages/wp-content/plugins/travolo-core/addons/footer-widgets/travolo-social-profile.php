<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Icons_Manager;;
use \Elementor\Repeater;
/**
 *
 * Footer Menu Widget .
 *
 */
class Travolo_Social_Links extends Widget_Base {

	public function get_name() {
		return 'travolo_footer_social';
	}

	public function get_title() {
		return __( 'Social Links', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'social_section',
			[
				'label' 	=> __( 'Social Links', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			's_version',
			[
				'label' 	=> __( 'Style', 'travolo' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'header-social',
				'options' 	=> [
					'header-social'  => __( 'Style One', 'travolo' ),
					'social-style' 	 => __( 'Style Two', 'travolo' ),
				]
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' => __( 'Icon', 'text-domain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
        
        $repeater->add_control(
            'social_link',
            [
                'label' 		=> __( 'Url', 'travolo' ),
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
			'social_items',
			[
				'label' 		=> __( 'Social Profile', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon'    => [
							'value' => 'fab fa-facebook-f',
							'library' => 'solid',
						],
						'social_link'    => __( '#', 'travolo' ),

					],
					[
						'social_icon'    => [
							'value' => 'fab fa-twitter',
							'library' => 'solid',
						],
						'social_link'    => __( '#', 'travolo' ),

					],
					[
						'social_icon'    => [
							'value' => 'fab fa-instagram',
							'library' => 'solid',
						],
						'social_link'    => __( '#', 'travolo' ),

					],
					[
						'social_icon'    => [
							'value' => 'fab fa-pinterest-p',
							'library' => 'solid',
						],
						'social_link'    => __( '#', 'travolo' ),

					]
                ],
                'title_field' 	=> '{{{ social_icon }}}',
			]
		);
        $this->end_controls_section();

        // Style
        $this->start_controls_section(
			'social_style',
			[
				'label' 	=> __( 'Social Profile', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'text_typography',
				'label' 		=> __( 'Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .header-social a, {{WRAPPER}} .social-style a',
			]
		);
		
        $this->add_control(
			'icon_color',
			[
				'label'     => __( 'Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a, {{WRAPPER}} .social-style a' => 'color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(
			'icon_border_color',
			[
				'label'     => __( 'Border Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a, {{WRAPPER}} .social-style a' => 'border-color: {{VALUE}}!important',
                ],
			]
        );

		$this->add_control(
			'icon_color_background',
			[
				'label'     => __( 'Background Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a, {{WRAPPER}} .social-style a' => 'background-color: {{VALUE}}!important',
                ],
			]  
        );

		$this->add_control(
			'icon_color_hover',
			[
				'label'     => __( 'Hover Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a:hover,  {{WRAPPER}} .social-style a:hover' => 'color: {{VALUE}}!important',
                ],
			]
        );
		$this->add_control(
			'icon_border_hover_color',
			[
				'label'     => __( 'Border Hover Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a:hover, {{WRAPPER}} .social-style a:hover' => 'border-color: {{VALUE}}!important',
                ],
			]
        );

        $this->add_control(
			'icon_color_bg_hover',
			[
				'label'     => __( 'Background Hover Color', 'travolo' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .header-social a:hover,  {{WRAPPER}} .social-style a:hover' => 'background-color: {{VALUE}}!important',
                ],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        ?>
			<div class="<?php echo esc_attr( $settings['s_version'] ) ?>">
				
				<?php foreach( $settings[ 'social_items' ] as $social_item ): 
					$target = $social_item['social_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $social_item['social_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
					<a <?php echo $target; ?> <?php echo $nofollow; ?> href="<?php echo esc_url( $social_item[ 'social_link' ]['url'] ); ?>">
						<?php Icons_Manager::render_icon( $social_item['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</a>
				<?php endforeach; ?>
			</div>
        <?php
	}
}
$widgets_manager->register( new \Travolo_Social_Links() );