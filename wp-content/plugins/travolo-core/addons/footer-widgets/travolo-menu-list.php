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
class Travolo_List extends Widget_Base {

	public function get_name() {
		return 'travololisttext';
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
			'list_section',
			[
				'label' 	=> __( 'List', 'travolo' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'list_text',
			[
				'label' 	=> __( 'Name', 'travolo' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Home', 'travolo' )
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
			'list_texts',
			[
				'label' 		=> __( 'Footer Menus', 'travolo' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'list_text'    => __( 'Home', 'travolo' ),
						'text_link'    => __( '#', 'travolo' ),

                    ],
					[
						'list_text'    => __( 'About', 'travolo' ),
						'text_link'    => __( '#', 'travolo' ),

                    ],
					[
						'list_text'    => __( 'Service', 'travolo' ),
						'text_link'    => __( '#', 'travolo' ),

                    ],
					[
						'list_text'    => __( 'Contact', 'travolo' ),
						'text_link'    => __( '#', 'travolo' ),

                    ],

                ],
                'title_field' 	=> '{{{ list_text }}}',
			]
		);

        $this->end_controls_section();

	}
	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="widget_nav_menu">
                <ul class="menu">
                    <?php foreach( $settings[ 'list_texts' ] as $lists ): ?>
                        <li>
                            <a href="<?php echo esc_url( $lists[ 'text_link' ] ); ?>"><i class="far fa-angle-right"></i>
                                <?php echo esc_html( $lists[ 'list_text' ] ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php 
	}
}
$widgets_manager->register( new \Travolo_List() );