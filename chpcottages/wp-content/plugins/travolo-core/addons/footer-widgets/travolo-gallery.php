<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Gallery Image Widget .
 *
 */
class Travolo_Gallery_Image extends Widget_Base {

	public function get_name() {
		return 'travologalleryimage';
	}

	public function get_title() {
		return __( 'Footer Gallery', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'gallery_image_section',
			[
				'label' 	=> __( 'Gallery Image', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'gallery_image',
			[
				'label' 	=> __( 'Gallery Image', 'travolo' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'gallery',
			[
				'label' 		=> __( 'Gallery Images', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
					[
						'gallery_image' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

	
			echo '<div class="sidebar-gallery">';
				if( ! empty( $settings['gallery'] ) ){
					foreach( $settings['gallery'] as $singlelogo ) {
						echo '<div class="gallery-thumb">';
							echo '<img class="w-100" src="'.esc_url( $singlelogo['gallery_image']['url'] ).'" alt="'.esc_attr( travolo_image_alt( $singlelogo['gallery_image']['url']) ).'">';
							echo '<a class="popup-image gal-btn"  href="'.esc_url( $singlelogo['gallery_image']['url'] ).'"></a>';
						echo '</div>';
					}
				}
			echo '</div>';
		
	}
}
$widgets_manager->register( new \Travolo_Gallery_Image() );