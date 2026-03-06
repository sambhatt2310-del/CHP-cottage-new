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
class Travolo_VideoBox extends Widget_Base {

	public function get_name() {
		return 'travolovideobox';
	}
 
	public function get_title() {
		return __( 'Video Box', 'travolo' );
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
			'videobox_layout',
			[
				'label' => __( 'Style', 'travolo' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1' => __( 'Style 1', 'travolo' ),
					'2' => __( 'Style 2', 'travolo' ),
					'3' => __( 'Style 3', 'travolo' ),
				],
			]
		);

		$this->add_control(
			'video_image',
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'videobox_layout' => [ '1','2'] ],
			]
		);
        $this->add_control(
			'video_url', [
				'label' 		=> __( 'Youtube Video Url', 'travolo' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'travolo' ),
				'label_block' 	=> true,
				
			]
        );

        $this->add_control(
			'video_title', [
				'label' 		=> __( 'Title', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Watch Video' , 'travolo' ),
				'label_block' 	=> true,
				'condition'		=> [ 'videobox_layout' => [ '1'] ],
				
			]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'icon_style_option',
			[
				'label' 	=> __( 'Icon Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'videobox_layout' => [ '3'] ],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' 		=> __( 'Icon Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn > i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'wave_color',
			[
				'label' 		=> __( 'Wave Background Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Icon Bg Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn > i' => 'background-color: {{VALUE}}',
                ]
			]
        );
		$this->add_control(
			'icon_bg_hovercolor',
			[
				'label' 		=> __( 'Icon Bg Hover Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:hover > i' => 'background-color: {{VALUE}}',
                ]
			]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'mdeia_style_option',
			[
				'label' 	=> __( 'Style', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'videobox_layout' => [ '1'] ],
			]
		);



		//Title
		$this->add_control(
			'mdeia_color',
			[
				'label' 		=> __( 'Title Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .gallery-video .gallery-btn span' => 'color: {{VALUE}} !important',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'mdeia_typography',
				'label'         => __( 'Title Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .gallery-video .gallery-btn span',
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		$videobox = $settings[ 'videobox_layout' ];
		
		?>


		<?php 	
            if ($videobox) {
                include('video-box/'.$videobox.'.php');
            }
        ?>
	<?php
	}
}
$widgets_manager->register( new \Travolo_VideoBox() );