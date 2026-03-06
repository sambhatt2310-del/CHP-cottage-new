<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Cta Widget .
 *
 */
class Travolo_Shape_Widget extends Widget_Base {

	public function get_name() {
		return 'travoloshape';
	}

	public function get_title() {
		return __( 'Shape', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'travolo' ];
	}

    


	protected function register_controls() {

		$this->start_controls_section(
			'shape_section',
			[
				'label'		 	=> __( 'Shape', 'travolo' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'shape_style',
			[
				'label' 	=> __( 'Shape Style', 'travolo' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '',
				'options' 	=> [
					'defaults'  => __( 'Default', 'travolo' ),
					'spin'     => __( 'Spin', 'travolo' ),
					'jump' 	   => __( 'Jump', 'travolo' ),
					'ripple-animation' 	=> __( 'Ripple', 'travolo' ),
				],
			]
		);


		$this->add_control(
			'class_add', [
				'label' 		=> __( 'Shape Image Class Add', 'travolo' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( '' , 'travolo' ),
				'label_block' 	=> true,
			]
        );


		$this->add_control(
			'shape_imge',
			[
				'label' 		=> __( 'Image', 'travolo' ),
				'type' 			=> Controls_Manager::MEDIA,
				's' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->end_controls_section();

	}


	protected function render() {

        $settings = $this->get_settings_for_display();
		
		$ac  = '';
		if( 'spin' ==  $settings[ 'shape_style' ] ){
			$ac = 'spin';
		}elseif( 'jump' ==  $settings[ 'shape_style' ] ){
			$ac = 'jump';
		}elseif( 'ripple-animation' ==  $settings[ 'shape_style' ] ){
			$ac = 'shape-mockup ripple-animation';
		}elseif('defaults' ==  $settings[ 'shape_style' ]){
			$ac = 'defaults';
		}
        ?>
		<?php if( !empty( $settings[ 'shape_imge' ]['url'] ) ): ?>
			<div class=" d-none d-xl-block <?php echo esc_attr( $ac ) ?> z-index-negative">
				<img class="<?php echo esc_attr( $settings['class_add'] ); ?>" src="<?php echo esc_url( $settings[ 'shape_imge' ]['url'] ); ?>" >
			</div>
		<?php endif; ?>
        <?php 
	}
}
$widgets_manager->register( new \Travolo_Shape_Widget() );