<?php

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class Travolo_List_group extends Widget_Base {

	public function get_name() {
		return 'travolo-list-groups';
	}

	public function get_title() {
		return esc_html__( 'List Group', 'travolo' );
	}

	public function get_icon() {
		return 'eicon-editor-list-ol travolo';
	}

	public function get_categories() {
		return [ 'travolo' ];
	}

	public function get_keywords() {
		return [ 'travolo', 'information', 'group', 'list', 'icon', 'socail' ];
	}

	protected function register_controls() {

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'travolo_section_list_content',
			[
				'label' => esc_html__( 'Content', 'travolo' )
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
            'travolo_list_icon_type',
            [
                'label' => __( 'Media Type', 'travolo' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'icon',
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'travolo' ),
						'icon' => 'eicon-star',
					],
					'number' => [
						'title' => __( 'Number', 'travolo' ),
						'icon' => 'eicon-number-field',
					],
					'image' => [
						'title' => __( 'Image', 'travolo' ),
						'icon' => 'eicon-image',
					],
				],
				'toggle' => false,
                'style_transfer' => true,
            ]
        );

		$repeater->add_control(
			'travolo_list_icon',
			[
				'label'       => __( 'Icon', 'travolo' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'separator'   =>'after',
				'default'     => [
					'value'   => 'far fa-check-circle',
					'library' => 'fa-regular'
				],
				'condition' =>[
					'travolo_list_icon_type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'travolo_list_icon_number',
			[
				'label'   => esc_html__( 'Number', 'travolo' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'travolo' ),
				'separator'   =>'after',
				'condition' =>[
					'travolo_list_icon_type' => 'number'
				]
			]
		);

		$repeater->add_control(
			'travolo_list_icon_number_image',
			[
				'label' => __( 'Choose Image', 'travolo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator'   =>'after',
				'dynamic' => [
					'active' => true,
				],
				'condition' =>[
					'travolo_list_icon_type' => 'image'
				]
			]
		);

        $repeater->add_control(
			'travolo_list_text',
			[
				'label'   => esc_html__( 'Text', 'travolo' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'List Text', 'travolo' ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$repeater->add_control(
			'travolo_list_link',
			[
				'label' => __( 'List URL', 'travolo' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'travolo' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'travolo_list_group',
			[
				'label' => __( 'List Items', 'elementor' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' => [
					[
						'travolo_list_text' => __( 'List Item #1', 'elementor' ),
						'travolo_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'travolo_list_text' => __( 'List Item #2', 'elementor' ),
						'travolo_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'travolo_list_text' => __( 'List Item #3', 'elementor' ),
						'travolo_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ elementor.helpers.renderIcon( this, travolo_list_icon, {}, "i", "panel" ) }}}{{{ travolo_list_text }}}'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'travolo_section_list_style',
			[
				'label' => esc_html__( 'Container', 'travolo' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'travolo_section_list_layout',
			[
				'label' => __( 'Layout', 'travolo' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout_1',
				'options' => [
					'layout_1' => __( 'Layout 1', 'travolo' ),
					'layout_2' => __( 'Layout 2', 'travolo' ),
					'layout_3' => __( 'Layout 3', 'travolo' ),
				],
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_alignment',
			[
				'label'       => esc_html__( 'Alignment', 'travolo' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'travolo-list-group-left'   => [
						'title' => esc_html__( 'Left', 'travolo' ),
						'icon'  => 'eicon-text-align-left'
					],
					'travolo-list-group-center' => [
						'title' => esc_html__( 'Center', 'travolo' ),
						'icon'  => 'eicon-text-align-center'
					],
					'travolo-list-group-right'  => [
						'title' => esc_html__( 'Right', 'travolo' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors_dictionary' => [
					'travolo-list-group-left' => 'justify-content: flex-start; text-align: left;',
					'travolo-list-group-center' => 'justify-content: center; text-align: center;',
					'travolo-list-group-right' => 'justify-content: flex-end; text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper' => '{{VALUE}};',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item' => '{{VALUE}};',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item a' => '{{VALUE}};',
				],
				'default'     => 'travolo-list-group-left',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'travolo_section_list_group_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .travolo-list-group',
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_group_padding',
			[
				'label'      => __( 'Padding', 'travolo' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => true
                ],
				'selectors'  => [
					'{{WRAPPER}} .travolo-list-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'travolo_section_list_group_border',
				'selector'  => '{{WRAPPER}} .travolo-list-group'
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_group_radius',
			[
				'label'        => __( 'Border Radius', 'travolo' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .travolo-list-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'travolo_section_list_group_shadow',
				'selector' => '{{WRAPPER}} .travolo-list-group'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'travolo_section_list_item_style',
			[
				'label' => esc_html__( 'List Item', 'travolo' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_item_padding',
			[
				'label'        => __( 'Item Padding', 'travolo' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'travolo_section_list_item_separator',
            [
				'label'        => __( 'Item Separator', 'travolo' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'travolo' ),
				'label_off'    => __( 'Hide', 'travolo' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'travolo_section_list_layout!' => 'layout_3'
				]
			]
        );

		$this->add_responsive_control(
			'travolo_section_list_item_separator_height',
			[
				'label' => __( 'Separator Height', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_1 .travolo-list-group-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_2 .travolo-list-group-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'travolo_section_list_item_separator' => 'yes',
					'travolo_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_control(
			'travolo_section_list_item_separator_color',
			[
				'label' => __( 'Separator Color', 'travolo' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_1 .travolo-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_2 .travolo-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
				],
				'condition' => [
					'travolo_section_list_item_separator' => 'yes',
					'travolo_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_list_item_spacing',
			[
				'label' => __( 'Item Spacing', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_3 .travolo-list-group-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'travolo_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'travolo_list_item_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_3 .travolo-list-group-item',
				'condition' => [
					'travolo_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'travolo_list_item_border',
				'selector'  => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_3 .travolo-list-group-item',
				'fields_options'  => [
                    'border' 	  => [
                        'default' => 'solid'
                    ],
                    'width'  	  => [
                        'default' 	 => [
                            'top'    => '1',
                            'right'  => '1',
                            'bottom' => '1',
                            'left'   => '1'
                        ]
                    ],
                    'color' 	  => [
                        'default' => '#e5e5e5',
                    ]
                ],
				'condition' => [
					'travolo_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_list_item_radius',
			[
				'label'        => __( 'Border Radius', 'travolo' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_3 .travolo-list-group-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'travolo_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'travolo_list_item_shadow',
				'selector' => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_3 .travolo-list-group-item',
				'condition' => [
					'travolo_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Icon Style
		*/
		$this->start_controls_section(
			'travolo_section_list_icon_style',
			[
				'label' => esc_html__( 'Icon', 'travolo' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'travolo_list_icon_position',
			[
				'label'       => esc_html__( 'Icon Position', 'travolo' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'travolo-icon-left'   => [
						'title' => esc_html__( 'Left', 'travolo' ),
						'icon'  => 'eicon-h-align-left'
					],
					'travolo-icon-center' => [
						'title' => esc_html__( 'Center', 'travolo' ),
						'icon'  => 'eicon-v-align-top'
					],
					'travolo-icon-right'  => [
						'title' => esc_html__( 'Right', 'travolo' ),
						'icon'  => 'eicon-h-align-right'
					]
				],
				'default'     => 'travolo-icon-left'
			]
		);

		$this->add_responsive_control(
			'travolo_list_icon_alignment',
			[
				'label'       => esc_html__( 'Icon Vertical Alignment', 'travolo' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'travolo-icon-align-left'   => [
						'title' => esc_html__( 'Top', 'travolo' ),
						'icon'  => 'eicon-v-align-top'
					],
					'travolo-icon-align-center' => [
						'title' => esc_html__( 'Center', 'travolo' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'travolo-icon-align-right'  => [
						'title' => esc_html__( 'Bottom', 'travolo' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'travolo-icon-align-left',
				'selectors_dictionary' => [
					'travolo-icon-align-left' => 'align-items: flex-start;',
					'travolo-icon-align-center' => 'align-items: center;',
					'travolo-icon-align-right' => 'align-items: flex-end;',
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item' => '{{VALUE}};',
				],
				'condition' => [
					'travolo_list_icon_position!' => 'travolo-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_list_icon_top_alignment',
			[
				'label'       => esc_html__( 'Icon Alignment', 'travolo' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'travolo-icon-top-align-left'   => [
						'title' => esc_html__( 'Left', 'travolo' ),
						'icon'  => 'eicon-v-align-top'
					],
					'travolo-icon-top-align-center' => [
						'title' => esc_html__( 'Center', 'travolo' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'travolo-icon-top-align-right'  => [
						'title' => esc_html__( 'Right', 'travolo' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'travolo-icon-left',
				'selectors_dictionary' => [
					'travolo-icon-top-align-left' => 'text-align: left; margin-right: auto;',
					'travolo-icon-top-align-center' => 'text-align: center; margin-left: auto; margin-right: auto;',
					'travolo-icon-top-align-right' => 'text-align: right; margin-left: auto;',
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon' => '{{VALUE}};',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon .travolo-list-group-icon-image' => '{{VALUE}};',
				],
				'condition' => [
					'travolo_list_icon_position' => 'travolo-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_item_icon_spacing',
			[
				'label' => __( 'Icon Right Spacing', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'travolo_list_icon_position' => 'travolo-icon-left'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_item_icon_margin_bottom',
			[
				'label' => __( 'Icon Bottom Spacing', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_item_icon_left_spacing',
			[
				'label' => __( 'Icon Left Spacing', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'travolo_list_icon_position' => 'travolo-icon-right'
				]
			]
		);
		$this->add_responsive_control(
			'travolo_section_list_item_icon_bottom_spacing',
			[
				'label' => __( 'Icon Bottom Spacing', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'travolo_list_icon_position' => 'travolo-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_item_icon_size',
			[
				'label' => __( 'Icon Size', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon svg' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon .travolo-list-group-icon-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'travolo_section_list_item_icon_color',
			[
				'label' => __( 'Icon Color', 'travolo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'travolo_section_list_item_icon_color_hover',
			[
				'label' => __( 'Icon Color Hover', 'travolo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon:hover i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon:hover svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'travolo_section_list_item_icon_bg_color_hover',
			[
				'label' => __( 'Icon Background Hover', 'travolo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes:hover' => 'background-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'travolo_section_list_item_icon_border color_hover',
			[
				'label' => __( 'Icon Border Hover', 'travolo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes:hover' => 'border-color: {{VALUE}} !important',
				],
			]
		);


		$this->add_responsive_control(
			'travolo_section_list_item_image_radius',
			[
				'label'        => __( 'Image Radius', 'travolo' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon .travolo-list-group-icon-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'travolo_list_item_icon_box_enable',
			[
				'label' => __( 'Enable Icon Box', 'travolo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'travolo' ),
				'label_off' => __( 'Hide', 'travolo' ),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'travolo_list_item_icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_1 .travolo-list-group-item .travolo-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_2 .travolo-list-group-item .travolo-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper.layout_3 .travolo-list-group-item .travolo-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
				],
				'condition' => [
					'travolo_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_list_item_icon_box_height',
			[
				'label' => __( 'Icon Box Height', 'travolo' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'travolo_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'travolo_list_item_icon_box_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes',
				'condition' => [
					'travolo_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'travolo_list_item_icon_box_background_hover',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes:hover',
				'condition' => [
					'travolo_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'travolo_list_item_icon_box_border',
				'selector'  => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes',
				'condition' => [
					'travolo_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'travolo_list_item_icon_box_radius',
			[
				'label'        => __( 'Border Radius', 'travolo' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'travolo_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'travolo_list_item_icon_box_shadow',
				'selector' => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-icon.yes',
				'condition' => [
					'travolo_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Text
		*/
		$this->start_controls_section(
			'travolo_section_list_text_style',
			[
				'label' => esc_html__( 'Text', 'travolo' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'travolo_section_list_text_alignment',
			[
				'label'       => esc_html__( 'Text Alignment', 'travolo' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'travolo-text-align-left'   => [
						'title' => esc_html__( 'Left', 'travolo' ),
						'icon'  => 'eicon-text-align-left'
					],
					'travolo-text-align-center' => [
						'title' => esc_html__( 'Center', 'travolo' ),
						'icon'  => 'eicon-text-align-left'
					],
					'travolo-text-align-right'  => [
						'title' => esc_html__( 'Right', 'travolo' ),
						'icon'  => 'eicon-text-align-left'
					]
				],
				'default'     => 'travolo-text-align-left',
				'selectors_dictionary' => [
					'travolo-text-align-left' => 'text-align: left;',
					'travolo-text-align-center' => 'text-align: center;',
					'travolo-text-align-right' => 'text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-text' => '{{VALUE}};',
				],
				'condition' => [
					'travolo_list_icon_position' => 'travolo-icon-center'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'travolo_section_list_text_typography',
				'label' => __( 'Typography', 'travolo' ),
				'selector' => '{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-text',
			]
		);

		$this->add_control(
			'travolo_section_list_text_color',
			[
				'label' => __( 'Text Color', 'travolo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'travolo_section_list_text_hover_color',
			[
				'label' => __( 'Text Color Hover', 'travolo' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .travolo-list-group .travolo-list-group-wrapper .travolo-list-group-item .travolo-list-group-text:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="travolo-list-group">
			<ul class="travolo-list-group-wrapper <?php echo $settings['travolo_section_list_layout']; ?>">
				<?php foreach( $settings['travolo_list_group'] as $list ) : ?>
				<?php
					$target = $list['travolo_list_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $list['travolo_list_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
					<li class="travolo-list-group-item <?php echo $settings['travolo_list_icon_position']?>">
						<?php if ( !empty( $list['travolo_list_link']['url'] ) ) { ?>
						<a href="<?php echo $list['travolo_list_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?> >
						<?php } ?>
							<div class="travolo-list-group-icon <?php echo $settings['travolo_list_item_icon_box_enable']; ?>">
								<?php if ( $list['travolo_list_icon_type'] === 'icon' && !empty($list['travolo_list_icon']) ){ ?>
									<?php Icons_Manager::render_icon( $list['travolo_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								<?php } ?>
								<?php if ( $list['travolo_list_icon_type'] === 'number' && !empty($list['travolo_list_icon_type']) ){ ?>
									<div class="travolo-list-group-icon-number">
										<?php echo $list['travolo_list_icon_number']; ?>
									</div>
								<?php } ?>
								<?php if ( $list['travolo_list_icon_type'] === 'image' && !empty($list['travolo_list_icon_type']) ){ ?>
									<div class="travolo-list-group-icon-image">
										<img src="<?php echo $list['travolo_list_icon_number_image']['url'] ?>" alt="<?php echo $list['travolo_list_text']; ?>">
									</div>
								<?php } ?>
							</div>
							<?php if ( !empty( $list['travolo_list_text'] ) ) { ?>
								<span class="travolo-list-group-text">
									<?php echo $list['travolo_list_text']; ?>
								</span>
							<?php } ?>
						<?php if ( !empty( $list['travolo_list_link']['url'] ) ) { ?>
						</a>
						<?php } ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
};
$widgets_manager->register( new \Travolo_List_group() );