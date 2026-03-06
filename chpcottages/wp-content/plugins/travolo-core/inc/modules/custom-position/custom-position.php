<?php

use \Elementor\Controls_Manager;
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly.

class Travolo_Core_Positioning {

    /*
     * Instance of this class
     */
    private static $instance = null;
    public function __construct() {
        // Add new controls to advanced tab globally
        add_action("elementor/element/after_section_end", array($this, 'travolo_core_add_position_controls_section'), 10, 3);
    }
    public function travolo_core_add_position_controls_section($widget, $section_id, $args) {
        //Link to sections
        $target_sections = array('section_custom_css');
        if (!defined('ELEMENTOR_PRO_VERSION')) {
            $target_sections[] = 'section_custom_css_pro';
        }

        if (!in_array($section_id, $target_sections)) {
            return;
        }
        // Adds Positioning Options
        $widget->start_controls_section(

            'travolo_core_section_advanced_position',
            array(
                'label' => TRAVOLO_BADGE . __('Positioning', 'travolo-core'),
                'tab'   => Controls_Manager::TAB_ADVANCED,
            )
        );

        $widget->add_responsive_control(
            'travolo_core_position_type',
            array(
                'label'       => __('Position Type', 'travolo-core'),
                'label_block' => true,
                'type'        => Controls_Manager::SELECT,
                'options'     => array(
                    ''         => __('Default', 'travolo-core'),
                    'static'   => __('Static', 'travolo-core'),
                    'relative' => __('Relative', 'travolo-core'),
                    'absolute' => __('Absolute', 'travolo-core'),
                ),

                'default'     => '',
                'selectors'   => array(
                    '{{WRAPPER}}' => 'position:{{VALUE}};',

                ),
            )
        );

        $widget->add_responsive_control(
            'travolo_core_position_top',
            array(
                'label'      => __('Top', 'travolo-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array('px', 'em', '%'),
                'range'      => array(
                    'px' => array(
                        'min'  => -2000,
                        'max'  => 2000,
                        'step' => 1,
                    ),
                    '%'  => array(
                        'min'  => -100,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'em' => array(
                        'min'  => -150,
                        'max'  => 150,
                        'step' => 1,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}}' => 'top:{{SIZE}}{{UNIT}};',
                ),
                'condition'  => array(
                    'travolo_core_position_type' => array('relative', 'absolute'),
                ),
            )
        );

        $widget->add_responsive_control(
            'travolo_core_position_right',
            array(
                'label'        => __('Right', 'travolo-core'),
                'type'         => Controls_Manager::SLIDER,
                'size_units'   => array('px', 'em', '%'),
                'range'        => array(
                    'px' => array(
                        'min'  => -2000,
                        'max'  => 2000,
                        'step' => 1,
                    ),
                    '%'  => array(
                        'min'  => -100,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'em' => array(
                        'min'  => -150,
                        'max'  => 150,
                        'step' => 1,
                    ),
                ),
                'selectors'    => array(
                    '{{WRAPPER}}' => 'right:{{SIZE}}{{UNIT}};',
                ),
                'condition'    => array(
                    'travolo_core_position_type' => array('relative', 'absolute'),
                ),
                'return_value' => '',
            )
        );

        $widget->add_responsive_control(
            'travolo_core_position_bottom',
            array(
                'label'      => __('Bottom', 'travolo-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array('px', 'em', '%'),
                'range'      => array(
                    'px' => array(
                        'min'  => -2000,
                        'max'  => 2000,
                        'step' => 1,
                    ),
                    '%'  => array(
                        'min'  => -100,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'em' => array(
                        'min'  => -150,
                        'max'  => 150,
                        'step' => 1,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}}' => 'bottom:{{SIZE}}{{UNIT}};',
                ),
                'condition'  => array(
                    'travolo_core_position_type' => array('relative', 'absolute'),
                ),
            )

        );
        $widget->add_responsive_control(
            'travolo_core_position_left',
            array(
                'label'      => __('Left', 'travolo-core'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => array('px', 'em', '%'),
                'range'      => array(
                    'px' => array(
                        'min'  => -2000,
                        'max'  => 2000,
                        'step' => 1,
                    ),
                    '%'  => array(
                        'min'  => -100,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'em' => array(
                        'min'  => -150,
                        'max'  => 150,
                        'step' => 1,
                    ),
                ),
                'selectors'  => array(
                    '{{WRAPPER}}' => 'left:{{SIZE}}{{UNIT}};',
                ),
                'condition'  => array(
                    'travolo_core_position_type' => array('relative', 'absolute'),
                ),
            )
        );

        $widget->add_responsive_control(
            'travolo_core_position_from_center',
            array(
                'label'       => __('From Center', 'travolo-core'),
                'description' => __('Please avoid using "From Center" and "Left" options at the same time.', 'travolo-core'),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => array('px', 'em', '%'),
                'range'       => array(
                    'px' => array(
                        'min'  => -1000,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                    '%'  => array(
                        'min'  => -100,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    'em' => array(
                        'min'  => -150,
                        'max'  => 150,
                        'step' => 1,
                    ),
                ),
                'selectors'   => array(
                    '{{WRAPPER}}' => 'left:calc( 50% + {{SIZE}}{{UNIT}} );',
                ),
                'condition'   => array(
                    'travolo_core_position_type' => array('relative', 'absolute'),
                ),
            )
        );

        $widget->add_responsive_control(
            'travolo_core_position_zindex',
            array(
                'label'     => __('Z-Index', 'travolo-core'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => '',
                'selectors' => array(
                    '{{WRAPPER}}' => 'z-index:{{VALUE}};',
                ),
            )
        );
        $widget->end_controls_section();
    }
    public static function get_instance() {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}

Travolo_Core_Positioning::get_instance();