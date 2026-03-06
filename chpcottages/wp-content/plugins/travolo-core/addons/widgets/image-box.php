<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Image Widget .
 *
 */
class Travolo_Image_Box extends Widget_Base {

	public function get_name() {
		return 'travoloimagebox';
	}
     
	public function get_title() {
		return __( 'Image Box', 'travolo' );
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
				'label' 	=> __( 'Image Box', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'imagebox_layout',
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

		// img start
        $this->add_control(
			'image_one',
			[
				'label' 		=> __( 'Image', 'travolo' ),
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
			'image_two', 
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'imagebox_layout' => [ '1', '2', '3','4' ] ],
			]
		);

        $this->add_control(
			'image_three',
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'imagebox_layout' => [ '1','3','4'] ],
			]
		);
        $this->add_control(
			'image_four',
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'imagebox_layout' => [ '3','4'] ],
			]
		);
        $this->add_control(
			'image_five',
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'imagebox_layout' => [ '4'] ],
			]
		);

		$this->add_control(
			'content_box',
			[
				'label' => esc_html__( 'Content Box One', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'img_title',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '25 Years', 'travolo' ),
				'condition'		=> [ 'imagebox_layout' => [ '2', '3'] ],
			]
        );

		$this->add_control(
			'img_description',
			[
				'label' 	=> __( 'image Description', 'travolo' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( '25 Years', 'travolo' ),
				'condition'		=> [ 'imagebox_layout' => ['4'] ],
			]
        );

		$this->add_control(
			'img_sub_title',
			[
				'label' 	=> __( 'Sub Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Of Experience', 'travolo' ),
				'condition'		=> [ 'imagebox_layout' => [ '2','3' ] ],
			]
        );

		$this->add_control(
			'content_two',
			[
				'label' => esc_html__( 'Content Box Two', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'condition'		=> [ 'imagebox_layout' => [ '2','3'] ],
				'separator' => 'before',
				
			]
		);

		$this->add_control(
			'img_title_two',
			[
				'label' 	=> __( 'Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( '20,000+', 'travolo' ),
				'condition'	=> [ 'imagebox_layout' => [ '2'] ],
			]
        );

		$this->add_control(
			'img_sub_title_two',
			[
				'label' 	=> __( 'Sub Title', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Happy Clients', 'travolo' ),
				'condition'		=> [ 'imagebox_layout' => [ '2'] ],
			]
        );

		$this->end_controls_section();

		// 
		$this->start_controls_section(
			'style_section',
			[
				'label' 	=> __( 'Content Box', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'imagebox_layout' => [ '2','3'] ],
			]
        );

		$this->add_control(
			'mdeia_color',
			[
				'label' 		=> __( 'Title Color', 'travolo' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .media-info,{{WRAPPER}} .img-box4 .discount > span' => 'color: {{VALUE}} !important',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'mdeia_typography',
				'label'         => __( 'Title Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .media-info,{{WRAPPER}} .img-box4 .discount > span',
			]
		);

		$this->add_control(
			'subtitles',
			[
				'label' => esc_html__( 'Sub Title', 'travolo' ),
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
					'{{WRAPPER}} .media-text,{{WRAPPER}} .img-box4 .discount > p' => 'color: {{VALUE}} !important',
                ]
			]
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'          => 'subtitle_typography',
				'label'         => __( 'Typography', 'travolo' ),
                'selector'      => '{{WRAPPER}} .media-text,{{WRAPPER}} .img-box4 .discount > p',
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
		$imagebox = $settings[ 'imagebox_layout' ];
		
		?>
        <?php 	
            if ($imagebox) {
                include('image-box/'.$imagebox.'.php');
            }
        ?>
	<?php
	}
}
$widgets_manager->register( new \Travolo_Image_Box() );