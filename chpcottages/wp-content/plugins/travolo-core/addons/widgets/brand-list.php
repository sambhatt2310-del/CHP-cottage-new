<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Brand Image Widget .
 *
 */
class Travolo_Brand_Image_List extends Widget_Base {

	public function get_name() {
		return 'travolobrandimage';
	}

	public function get_title() {
		return __( 'Brand Image', 'travolo' );
	}


	public function get_icon() {
		return 'eicon-code';
    }


	public function get_categories() {
		return [ 'travolo' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'brandimage_section',
			[
				'label' 	=> __( 'Brand Image', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
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
			'brandimages',
			[
				'label' 		=> __( 'Brand Images', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
                'title_field' 	=> __( 'Brand Images', 'travolo' ), 
			]
		);
        $this->end_controls_section();

	}

	protected function render() {
        
        $settings = $this->get_settings_for_display();

        echo '<div class="brand__list">';
            echo '<span class="line one"></span>';
            echo '<span class="line two"></span>';
            echo '<span class="line three"></span>';
            foreach ( $settings['brandimages'] as $image ) {
                echo '<div class="brand-item">';
                    echo travolo_img_tag( array(
                        'url'       => esc_url( $image['image_one']['url'] )
                    ) );
                echo '</div>';
            }
        echo '</div>';
	}
}
$widgets_manager->register( new \Travolo_Brand_Image_List() );