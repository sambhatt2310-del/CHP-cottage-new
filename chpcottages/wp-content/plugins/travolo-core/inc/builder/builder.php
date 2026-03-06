<?php
    /**
     * Class For Builder
     */
    class TravoloBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'travolo_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'travolo-core',TRAVOLO_PLUGDIRURI.'assets/js/travolo-core.js',array( 'jquery' ),'1.0',true );
		}


        public function travolo_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'travolo_header_option',
                [
                    'label'     => __( 'Header Option', 'travolo' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'travolo_header_style',
                [
                    'label'     => __( 'Header Option', 'travolo' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'travolo' ),
    					'header_builder'       => __( 'Header Builder', 'travolo' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'travolo_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'travolo' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->travolo_header_choose_option(),
                    'condition' => [ 'travolo_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'travolo_footer_option',
                [
                    'label'     => __( 'Footer Option', 'travolo' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'travolo_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'travolo' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'travolo' ),
    				'label_off'     => __( 'No', 'travolo' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'travolo_footer_style',
                [
                    'label'     => __( 'Footer Style', 'travolo' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'travolo' ),
    					'footer_builder'       => __( 'Footer Builder', 'travolo' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'travolo_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'travolo_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'travolo' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->travolo_footer_choose_option(),
                    'condition' => [ 'travolo_footer_style' => 'footer_builder','travolo_footer_choice' => 'yes' ],
                    'default'	=> ''
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Travolo Builder', 'travolo' ),
            	esc_html__( 'Travolo Builder', 'travolo' ),
				'manage_options',
				'travolo',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('travolo', esc_html__('Footer Builder', 'travolo'), esc_html__('Footer Builder', 'travolo'), 'manage_options', 'edit.php?post_type=travolo_footer');
			add_submenu_page('travolo', esc_html__('Header Builder', 'travolo'), esc_html__('Header Builder', 'travolo'), 'manage_options', 'edit.php?post_type=travolo_header');
			add_submenu_page('travolo', esc_html__('Tab Builder', 'travolo'), esc_html__('Tab Builder', 'travolo'), 'manage_options', 'edit.php?post_type=travolo_tab_build');
			add_submenu_page('travolo', esc_html__('OFF Canvas Builder', 'travolo'), esc_html__('OFF Canvas Builder', 'travolo'), 'manage_options', 'edit.php?post_type=travolo_off_build');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','travolo' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'travolo' ),
				'singular_name'      => __( 'Footer', 'travolo' ),
				'menu_name'          => __( 'Travolo Footer Builder', 'travolo' ),
				'name_admin_bar'     => __( 'Footer', 'travolo' ),
				'add_new'            => __( 'Add New', 'travolo' ),
				'add_new_item'       => __( 'Add New Footer', 'travolo' ),
				'new_item'           => __( 'New Footer', 'travolo' ),
				'edit_item'          => __( 'Edit Footer', 'travolo' ),
				'view_item'          => __( 'View Footer', 'travolo' ),
				'all_items'          => __( 'All Footer', 'travolo' ),
				'search_items'       => __( 'Search Footer', 'travolo' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'travolo' ),
				'not_found'          => __( 'No Footer found.', 'travolo' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'travolo' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'travolo_footer', $args );

			$labels = array(
				'name'               => __( 'Header', 'travolo' ),
				'singular_name'      => __( 'Header', 'travolo' ),
				'menu_name'          => __( 'Travolo Header Builder', 'travolo' ),
				'name_admin_bar'     => __( 'Header', 'travolo' ),
				'add_new'            => __( 'Add New', 'travolo' ),
				'add_new_item'       => __( 'Add New Header', 'travolo' ),
				'new_item'           => __( 'New Header', 'travolo' ),
				'edit_item'          => __( 'Edit Header', 'travolo' ),
				'view_item'          => __( 'View Header', 'travolo' ),
				'all_items'          => __( 'All Header', 'travolo' ),
				'search_items'       => __( 'Search Header', 'travolo' ),
				'parent_item_colon'  => __( 'Parent Header:', 'travolo' ),
				'not_found'          => __( 'No Header found.', 'travolo' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'travolo' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'travolo_header', $args );

            $labels = array(
				'name'               => __( 'Tab Builder', 'travolo' ),
				'singular_name'      => __( 'Tab Builder', 'travolo' ),
				'menu_name'          => __( 'Travolo Tab Builder', 'travolo' ),
				'name_admin_bar'     => __( 'Tab Builder', 'travolo' ),
				'add_new'            => __( 'Add New', 'travolo' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'travolo' ),
				'new_item'           => __( 'New Tab Builder', 'travolo' ),
				'edit_item'          => __( 'Edit Tab Builder', 'travolo' ),
				'view_item'          => __( 'View Tab Builder', 'travolo' ),
				'all_items'          => __( 'All Tab Builder', 'travolo' ),
				'search_items'       => __( 'Search Tab Builder', 'travolo' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'travolo' ),
				'not_found'          => __( 'No Tab Builder found.', 'travolo' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'travolo' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);
			register_post_type( 'travolo_tab_build', $args );

			//Off Canvas builder
            $labels = array(
				'name'               => __( 'Off Canvas Builder', 'travolo' ),
				'singular_name'      => __( 'Off Canvas Builder', 'travolo' ),
				'menu_name'          => __( 'Travolo Off Canvas Builder', 'travolo' ),
				'name_admin_bar'     => __( 'Off Canvas Builder', 'travolo' ),
				'add_new'            => __( 'Add New', 'travolo' ),
				'add_new_item'       => __( 'Add New Off Canvas Builder', 'travolo' ),
				'new_item'           => __( 'New Off Canvas Builder', 'travolo' ),
				'edit_item'          => __( 'Edit Off Canvas Builder', 'travolo' ),
				'view_item'          => __( 'View Off Canvas Builder', 'travolo' ),
				'all_items'          => __( 'All Off Canvas Builder', 'travolo' ),
				'search_items'       => __( 'Search Off Canvas Builder', 'travolo' ),
				'parent_item_colon'  => __( 'Parent Off Canvas Builder:', 'travolo' ),
				'not_found'          => __( 'No Off Canvas Builder found.', 'travolo' ),
				'not_found_in_trash' => __( 'No Off Canvas Builder found in Trash.', 'travolo' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);
			register_post_type( 'travolo_off_build', $args );

		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'travolo_footer' == $post->post_type || 'travolo_header' == $post->post_type || 'travolo_tab_build' == $post->post_type || 'travolo_off_build' == $post->post_type  ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function travolo_footer_choose_option(){

			$travolo_post_query = new WP_Query( array(
				'post_type'			=> 'travolo_footer',
				'posts_per_page'	    => -1,
			) );

			$travolo_builder_post_title = array();
			$travolo_builder_post_title[''] = __('Select a Footer','Travolo');

			while( $travolo_post_query->have_posts() ) {
				$travolo_post_query->the_post();
				$travolo_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $travolo_builder_post_title;

		}

		public function travolo_header_choose_option(){

			$travolo_post_query = new WP_Query( array(
				'post_type'			=> 'travolo_header',
				'posts_per_page'	    => -1,
			) );

			$travolo_builder_post_title = array();
			$travolo_builder_post_title[''] = __('Select a Header','Travolo');

			while( $travolo_post_query->have_posts() ) {
				$travolo_post_query->the_post();
				$travolo_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $travolo_builder_post_title;

        }

    }

    $builder_execute = new TravoloBuilder();