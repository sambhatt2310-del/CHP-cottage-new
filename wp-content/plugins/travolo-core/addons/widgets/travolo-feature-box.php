<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\HEADING;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Travolo_FeatureBox extends Widget_Base {

	public function get_name() {
		return 'travolofeaturebox';
	}
 
	public function get_title() {
		return __( 'Feature Box', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Content', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'feature_layout',
			[
				'label' => __( 'Style', 'travolo' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __( 'Style 1', 'travolo' ),
					'2' => __( 'Style 2', 'travolo' ),
					'3' => __( 'Style 3', 'travolo' ),
					'4' => __( 'Style 4', 'travolo' ),
				],
			]
		);

		$this->add_control(
			'media_image',
			[
				'label' 		=> __( 'Image / Svg Icon', 'travolo' ),
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
			'title', [
				'label' 		=> __( 'Title', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Personalized Learning' , 'travolo' ),
				'label_block' 	=> true,
				
			]
        );

        $this->add_control(
			'discription', [
				'label' 		=> __( 'Discription', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Our goal is to carefully educate and develop children in a fun way. We strive learning process into a bright.' , 'travolo' ),
				'label_block' 	=> true,
			]
        );

        $this->add_control(
			'button_url', [
				'label' 		=> __( 'Button Url', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'travolo' ),
				'label_block' 	=> true,
				'condition'		=> [ 'feature_layout' => '4' ]
			]
        );


		$repeater = new Repeater();

        $repeater->add_control(
			'feature_list_text',
			[
				'label' 	=> __( 'Text', 'travolo' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Help parents get to work on time', 'travolo' ), 
			]
        );
		$this->add_control(
			'feature_items',
			[
				'label' 		=> __( 'Feature List', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'feature_list_text'    => __( 'Help parents get to work on time', 'travolo' ),
					]
				],
				'condition'		=> [ 'feature_layout' => [ '3' ] ],
			]
		);
        $this->end_controls_section();

		$this->start_controls_section(
			'mdeia_style_option',
			[
				'label' 	=> __( 'Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hover_bg_image',
			[
				'label' 		=> __( 'Hover Background', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'feature_layout' => [ '1','4' ] ],
			]
		);
		

		$this->add_control(
			'sahe_color',
			[
				'label' 		=> __( 'Shape Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-circle' => 'border-color: {{VALUE}} !important',
                ],
				'condition'		=> [ 'feature_layout' => [ '2' ] ],
				
			]
        );

		$this->add_responsive_control(
			'media-align',
			[
				'label' 		=> __( 'Alignment', 'travolo' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'travolo' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'travolo' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'travolo' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .features-style1, {{WRAPPER}} .features-style2' => 'text-align: {{VALUE}};',
                ]
			]
		);

		$this->add_control(
			'more_options',
			[
				'label' => esc_html__( 'Title', 'travolo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		//Title
		$this->add_control(
			'mdeia_color',
			[
				'label' 		=> __( 'Title Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-title' => 'color: {{VALUE}} !important',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'mdeia_typography',
				'label'         => __( 'Title Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .features-style1 .feature-title, {{WRAPPER}} .features-style2 .feature-title, {{WRAPPER}} .features-style3 .feature-title, {{WRAPPER}} .features-style4 .feature-title',
			]
		);
		$this->add_control(
			'subtitles',
			[
				'label' => esc_html__( 'Discription', 'travolo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( 'Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .feature-text' => 'color: {{VALUE}} !important',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'subtitle_typography',
				'label'         => __( 'Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .features-style1 .feature-text, {{WRAPPER}} .features-style2 .feature-text, {{WRAPPER}} .features-style3 .feature-text, {{WRAPPER}} .features-style4 .feature-text',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		$feature_layout = $settings[ 'feature_layout' ];
		?>

        <div class="features-style<?php echo esc_attr( $feature_layout ); ?>">
			<?php 	
				if ($feature_layout) {
					include('feature-box/'.$feature_layout.'.php');
				}
			?>
        </div>
	<?php
	}
}
$widgets_manager->register( new \Travolo_FeatureBox() );