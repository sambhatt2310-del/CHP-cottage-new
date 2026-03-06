<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * New Header Widget .
 *
 */
class Travolo_New_Header extends Widget_Base {

	public function get_name() {
		return 'travolonewheader';
	}

	public function get_title() {
		return __( 'Travolo Header', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'logo_image',
			[
				'label' 		=> __( 'Logo Image', 'travolo' ),
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
			'logo_link',
			[
				'label' 		=> __( 'Logo Link', 'travolo' ),
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
			'login_text',
			[
				'label' 	=> __( 'Login text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Login', 'travolo' )
			]
        );
        
        $this->add_control(
            'login_text_link',
            [
                'label' 		=> __( 'Login Text Link', 'travolo' ),
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
			'register_text',
			[
				'label' 	=> __( 'Register text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Register', 'travolo' )
			]
        );
        
        $this->add_control(
            'register_text_link',
            [
                'label' 		=> __( 'Register Text Link', 'travolo' ),
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
        
        $this->end_controls_section();

		$this->start_controls_section(
			'menu_top_level_menu_item_style_section',
			[
				'label' 	=> __( 'Top Level Menu Items', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'top_level_menu_alignment',
			[
				'label' 	=> __( 'Menu Alignment', 'travolo' ),
				'type' 		=> Controls_Manager::CHOOSE,
				'options' 	=> [
					'left' 		=> [
						'title' 	=> __( 'Left', 'travolo' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 	=> [
						'title' 	=> __( 'Center', 'travolo' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 	=> [
						'title' 	=> __( 'Right', 'travolo' ),
						'icon' 		=> 'fa fa-align-right',
					],
				],
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style5' => 'text-align: {{VALUE}} !important;',
				],
			]
		);

        $this->add_control(
			'top_level_menu_color',
			[
				'label' 		=> __( 'Menu Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style5 > ul > li > a' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'top_level_menu_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'travolo' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .menu-style5 > ul > li > a:hover' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_control(
			'top_level_menu_bg_color',
			[
				'label' 			=> __( 'Menu Background Color', 'travolo' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .menu-style5 > ul > li > a' => 'background-color: {{VALUE}} !important;',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_hover_bg_color',
			[
				'label' 		=> __( 'Menu Hover Background Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style5 > ul > li > a:hover' => 'background-color: {{VALUE}} !important;',
                ]
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .menu-style5 > ul > li > a',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography_hover',
				'label' 		=> __( 'Menu Typography Hover', 'travolo' ),
                'selector' 		=> '{{WRAPPER}} .menu-style5 > ul > li > a:hover',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style5 > ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'travolo' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .menu-style5 > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'top_level_menu_border',
				'label' 	=> __( 'Border', 'travolo' ),
				'selector' 	=> '{{WRAPPER}} .menu-style5 > ul > li > a',
			]
		);

		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        
        if( has_nav_menu( 'mobile-menu' ) ){
            echo '<div class="vs-menu-wrapper">';
                echo '<div class="vs-menu-area text-center">';
                    echo '<button class="vs-menu-toggle"><i class="fal fa-times"></i></button>';
                    echo '<div class="mobile-logo">';
                        echo '<a href="'.esc_url( $settings['logo_link']['url'] ).'">';
                            echo  travolo_img_tag(array(
                                'url'   => esc_url( $settings['logo_image']['url'] )
                            ));
                        echo '</a>';
                    echo '</div>';
                    echo '<div class="vs-mobile-menu">';
                        wp_nav_menu( array(
                            "theme_location"    => 'mobile-menu',
                            "container"         => '',
                            "menu_class"        => ''
                        ) );
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        echo '<div class="vs-header header-layout6">';
            echo '<div class="shape1"></div>';
            echo '<div class="shape2"></div>';
            echo '<div class="shape3"></div>';
            echo '<div class="container">';
                echo '<div class="row align-items-center justify-content-between gx-15">';
                    if( ! empty( $settings['logo_image']['url'] ) ){
                        echo '<div class="col-auto">';
                            echo '<div class="header-logo vs-logo">';
                                echo '<a href="'.esc_url( $settings['logo_link']['url'] ).'">';
                                    echo travolo_img_tag( array(
                                        'url'   => esc_url( $settings['logo_image']['url'] )
                                    ) );
                                echo '</a>';
                            echo '</div>';
                        echo '</div>';
                    }
        
                    echo '<div class="col text-center">';
                        if( has_nav_menu( 'primary-menu' ) ){
                            echo '<nav class="main-menu menu-style5 d-none d-lg-block">';
                                wp_nav_menu( array(
                                    "theme_location"    => 'primary-menu',
                                    "container"         => '',
                                    "menu_class"        => ''
                                ) );
                            echo '</nav>';
                        }
                    echo '</div>';
                    echo '<div class="col-auto d-none d-sm-block">';
                        echo '<button class="icon-btn style6 searchBoxTggler"><i class="far fa-search"></i></button>';
                    echo '</div>';
                    echo '<div class="col-auto d-none d-xxl-block">';
                        echo '<div class="login-tab">';
                            echo '<a href="'.esc_url( $settings['login_text_link']['url'] ).'" class="active">'.esc_html( $settings['login_text'] ).'</a>';
                            echo '<a href="'.esc_url( $settings['register_text_link']['url'] ).'">'.esc_html( $settings['register_text'] ).'</a>';
                            echo '<span class="indicator"></span>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-auto d-block d-lg-none">';
                        echo '<button class="vs-menu-toggle style2 d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
		
		echo '<div class="popup-search-box d-none d-sm-block">';
			echo '<button class="searchClose"><i class="fal fa-times"></i></button>';
			echo '<form action="'.esc_url( home_url() ).'">';
				echo '<input type="text" class="border-theme" placeholder="'.esc_attr( $settings['placeholder_text'] ).'">';
				echo '<button type="submit"><i class="fal fa-search"></i></button>';
			echo '</form>';
		echo '</div>';
	}
}