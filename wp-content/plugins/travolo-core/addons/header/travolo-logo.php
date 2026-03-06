<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
/**
 *
 * New Header Widget .
 *
 */
class Travolo_Site_Logo extends Widget_Base {

	public function get_name() {
		return 'travolologo';
	}

	public function get_title() {
		return __( 'Travolo Site Logo', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
            'section_layout',
            [
                'label' => __('Layout', 'travolo'),
            ]
        );

        $this->add_control(
			'logo_type',
			[
				'label' => __( 'Logo Type', 'travolo' ),
				'type'  => Controls_Manager::SELECT,
				'default' => 'dark',
				'options' => [
					'dark'   => __( 'Dark', 'travolo' ),
					'white'  => __( 'White', 'travolo' ),
					'custom' => __( 'Custom', 'travolo' ),
				],
			]
        );
        
        $this->add_control(
            'image',
            [
                'label' => __('Choose logo', 'travolo'),
                'type'  => Controls_Manager::MEDIA,
                'default' => [
                    'url' => '',
                ],
                'condition' => [
                    'logo_type' => 'custom',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'    => 'logo_size', 
                'include' => [],
                'default' => 'large',
                'condition' => [
                    'logo_type' => 'custom',
                ]
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label' => __('Align', 'travolo'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'travolo'),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('top', 'travolo'),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'travolo'),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-logo' => 'text-align: {{SIZE}};',
                ],
                'toggle' => true,
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __('Image width', 'travolo'),
                'type'  => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-logo' => 'max-width: {{SIZE}}{{UNIT}};',
                ]

            ]
        );
		$this->add_responsive_control(
            'logo_margin',
            [
                'label' => __('Margin', 'travolo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
    }
	
	protected function render() {

		$settings = $this->get_settings();
		?>
			<div class="header-logo">
				<a href="<?php echo home_url(); ?>">
					<?php
					if ( 'custom' == $settings['logo_type'] && $settings['image']['url']) {
						echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image');
					} else {
						echo $this->travolo_get_site_logo( $settings['logo_type'] );
					}
					?>
				</a>
			</div>
		<?php
	}

	/**
     * 
     *  travolo get logo  
     * 
     */
    public function travolo_get_site_logo( $logo_type = 'dark'  )
    {
        $logo = '';
        $travolo = get_option('travolo_opt');
        $logo_url = '';
        if ( 'dark' ==  $logo_type && isset( $travolo['logo']['url'] ) ) {
            $logo_url = esc_url($travolo['logo']['url']);
            $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="dark-logo">';

        } else if ( 'white' ==  $logo_type && isset($travolo['white_logo']['url'])) {
            $logo_url = esc_url($travolo['white_logo']['url']);
            $logo = '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('title')) . '" class="white-logo">';
        } else {
            if ( has_custom_logo() ) {
                $core_logo_id = get_theme_mod('custom_logo');
                $logo_url = wp_get_attachment_image_src($core_logo_id, 'full');
                $logo = '<img src="' . esc_url($logo_url[0]) . '" alt="' . esc_attr(get_bloginfo('title')) . '">';
            } else {

                $logo = '<h2 class="navbar-brand__regular">' . get_bloginfo('name') . '</h2>';

            }
        }
        return $logo;
    }
}
$widgets_manager->register( new \Travolo_Site_Logo() );