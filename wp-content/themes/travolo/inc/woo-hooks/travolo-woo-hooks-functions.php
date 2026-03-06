<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Travolo
 * @Version    : 1.0
 * @Author     : Travolo
 * @Author URI : https://www.vecuro.com/
 *
 */

if( ! function_exists( 'travolo_shop_categorysection_start_cb' ) ){
    function travolo_shop_categorysection_start_cb(){
        // global $post;
        $terms = get_terms( array(
            'taxonomy'      => 'product_cat',
            'hide_empty'    => false,
        ) );
        if( $terms && class_exists( 'ReduxFramework' ) && travolo_opt( 'travolo_category_show_hide' ) ){
            echo '<section class="space-top arrow-wrap">';
                echo '<div class="container">';
                    echo '<div class="row category justify-content-between align-items-center vs-carousel arrow-margin" data-arrows="true" data-slide-show="6" data-ml-slide-show="6" data-lg-slide-show="5" data-md-slide-show="4" data-sm-slide-show="3" data-xs-slide-show="2">';
                        foreach ( $terms as $term ){
                            $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                            $catImg = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                            echo '<div class="col-xl-2">';
                                echo '<div class="cat_rounded">';
                                    if( ! empty( $catImg ) ){
                                        echo '<div class="cat-img">';
                                            echo '<a href="'.esc_url( get_term_link( $term ) ).'">';
                                                echo travolo_img_tag( array(
                                                    'url'   => esc_url( $catImg[0] )
                                                ) );
                                            echo '</a>';
                                        echo '</div>';
                                    }
                                    echo '<h3 class="cat-name"><a class="text-inherit" href="'.esc_url( get_term_link( $term ) ).'">'.esc_html( $term->name ).'</a></h3>';
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }
}

// travolo shop main content hook functions
if( !function_exists('travolo_shop_main_content_cb') ) {
    function travolo_shop_main_content_cb( ) {

       

        if( is_shop() || is_product_category() || is_product_tag() ) {
             
            echo '<section class="vs-product-wrapper space-bottom">';
                 echo '<div class="outer-wrap wrap-style1">';
            if( class_exists('ReduxFramework') ) {
                $travolo_woo_product_col = travolo_opt('travolo_woo_product_col');
                if( $travolo_woo_product_col == '2' ) {
                    echo '<div class="container">';
                } elseif( $travolo_woo_product_col == '3' ) {
                    echo '<div class="container">';
                } elseif( $travolo_woo_product_col == '4' ) {
                    echo '<div class="container">';
                } elseif( $travolo_woo_product_col == '5' ) {
                    echo '<div class="travolo-container">';
                } elseif( $travolo_woo_product_col == '6' ) {
                    echo '<div class="travolo-container">';
                }
            } else {
                echo '<div class="container">';
            }
        } else {
            echo '<section class="vs-product-wrapper space-extra-bottom product-details space-top">';
                echo '<div class="container">';
        }
            echo '<div class="row">';
    }
}

// travolo shop main content hook function
if( !function_exists('travolo_shop_main_content_end_cb') ) {
    function travolo_shop_main_content_end_cb( ) {
                echo '</div>';
             echo '</div>';
        echo '</div>';
    echo '</section>';
    }
}

// shop column start hook function
if( !function_exists('travolo_shop_col_start_cb') ) {
    function travolo_shop_col_start_cb( ) {
        if( class_exists('ReduxFramework') ) {
            if( class_exists('woocommerce') && is_shop() ) {
                $travolo_woo_shoppage_sidebar = travolo_opt('travolo_woo_shoppage_sidebar');
                if( $travolo_woo_shoppage_sidebar == '2' && is_active_sidebar('travolo-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-9 order-last">';
                } elseif( $travolo_woo_shoppage_sidebar == '3' && is_active_sidebar('travolo-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-9">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12">';
            }
        } else {
            if( class_exists('woocommerce') && is_shop() ) {
                if( is_active_sidebar('travolo-woo-sidebar') ) {
                    echo '<div class="col-lg-8 col-xl-9">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            } else {
                echo '<div class="col-lg-12">';
            }
        }

    }
}

// shop column end hook function
if( !function_exists('travolo_shop_col_end_cb') ) {
    function travolo_shop_col_end_cb( ) {
        echo '</div>';
    }
}

// travolo woocommerce pagination hook function
if( ! function_exists('travolo_woocommerce_pagination') ) {
    function travolo_woocommerce_pagination( ) {
        if( ! empty( travolo_pagination() ) ) {
            echo '<div class="row">';
                echo '<div class="col-12">';
                    echo '<div class="vs-pagination">';
                        add_filter('next_posts_link_attributes', 'woo_posts_link_attributes');
                        add_filter('previous_posts_link_attributes', 'woo_posts_link_attributes');
                        function woo_posts_link_attributes(){
                            return 'class="pagi-btn"';
                        };
                        $prev 	= esc_html__( 'Prev', 'travolo' );
                        $next 	= esc_html__( 'Next', 'travolo' );
                        // previous
                        if( get_previous_posts_link() ){
                            previous_posts_link( $prev );
                        }
                        echo '<ul>';
                            echo travolo_pagination();
                        echo '</ul>';
                        // next
                        if( get_next_posts_link() ){
                            next_posts_link( $next );
                        }
                        
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
}

// woocommerce filter wrapper hook function
if( ! function_exists('travolo_woocommerce_filter_wrapper') ) {
    function travolo_woocommerce_filter_wrapper( ) {
        echo '<div class="vs-sort-bar">';
            echo '<div class="row justify-content-between align-items-center">';
                echo '<div class="col-md-auto">';
                    echo '<p class="woocommerce-result-count">'.woocommerce_result_count().'</p>';
                echo '</div>';
                echo '<div class="col-md-auto">';
                    echo '<div class="col-sm-auto">';
                        echo woocommerce_catalog_ordering();
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}

// travolo grid tab content hook function
if( !function_exists('travolo_grid_tab_content_cb') ) {
    function travolo_grid_tab_content_cb( ) {
        woocommerce_product_loop_start();
        if( class_exists('ReduxFramework') ) {
            $travolo_woo_product_col = travolo_opt('travolo_woo_product_col');
            if( $travolo_woo_product_col == '2' ) {
                $travolo_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-6';
            } elseif( $travolo_woo_product_col == '3' ) {
                $travolo_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-4';
            } elseif( $travolo_woo_product_col == '4' ) {
                $travolo_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-3';
            }elseif( $travolo_woo_product_col == '5' ) {
                $travolo_woo_product_col_val = 'col-xl col-lg-6 col-sm-6';
            } elseif( $travolo_woo_product_col == '6' ) {
                $travolo_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-2';
            }
        } else {
            $travolo_woo_product_col_val = 'col-sm-6 col-md-6 col-lg-6 col-xl-3';
        }

        if ( wc_get_loop_prop( 'total' ) ) {
            while ( have_posts() ) {
                the_post();

                echo '<div class="'.esc_attr( $travolo_woo_product_col_val ).'">';
                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );

                echo '</div>';
            }
            wp_reset_postdata();
        }

        woocommerce_product_loop_end();
    }
}

// travolo woocommerce get sidebar hook function
if( ! function_exists('travolo_woocommerce_get_sidebar') ) {
    function travolo_woocommerce_get_sidebar( ) {
        if( class_exists('ReduxFramework') ) {
            $travolo_woo_shoppage_sidebar = travolo_opt('travolo_woo_shoppage_sidebar');
        } else {
            if( is_active_sidebar('travolo-woo-sidebar') ) {
                $travolo_woo_shoppage_sidebar = '2';
            } else {
                $travolo_woo_shoppage_sidebar = '1';
            }
        }

        if( is_shop() ) {
            if( $travolo_woo_shoppage_sidebar != '1' ) {
                get_sidebar('shop');
            }
        }
    }
}

// travolo loop product thumbnail hook function
if( !function_exists('travolo_loop_product_thumbnail') ) {
    function travolo_loop_product_thumbnail( ) {
        global $product;

        echo '<div class="product-img">';
            if( has_post_thumbnail() ){
                echo '<a href="'.esc_url( get_permalink() ).'">';
                    the_post_thumbnail();
                echo '</a>';
            }
            // Product bottom
            echo '<div class="action-buttons">';
                if( class_exists( 'WPCleverWoosq' ) ){
                    echo do_shortcode('[woosq]');
                }
                // Wishlist Button
                if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
                    echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                }
            echo '</div>';
            if( $product->is_on_sale() && $product->get_type() == 'simple' ) {
                echo '<div class="onsale badge">'.esc_html__( 'Sale', 'travolo' ).'</div>';
            }
            if( $product->is_featured() ) {
                echo '<div class="featured woocommerce-badge badge">'.esc_html__( 'Hot', 'travolo' ).'</div>';
            }
            if( ! $product->is_in_stock() ) {
                echo '<div class="outofstock woocommerce-badge badge">'.esc_html__( 'Stock Out', 'travolo' ).'</div>';
            }
        echo '</div>';
    }
}

// shop loop product summary
if( ! function_exists('travolo_loop_product_summary') ) {
    function travolo_loop_product_summary( ) {
        global $product;
        echo '<div class="product-body">';
        
            echo woocommerce_template_loop_rating();
            // Product Title
            echo '<h3 class="product-title">
            <a class="text-inherit" href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a>
            </h3>';
            // Product Price
            echo '<div class="product-price">';
                echo woocommerce_template_loop_price();
            echo '</div>';
        
            // Cart Button
            woocommerce_template_loop_add_to_cart_text_style();
            
        echo '</div>';
    }
}

// shop loop horizontal product summary
if( ! function_exists( 'travolo_horizontal_loop_product_summary' ) ) {
    function travolo_horizontal_loop_product_summary() {
        global $product;
        echo '<div class="product-content">';
            echo '<div>';
                // Product Title
                echo '<h4 class="product-title h5"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h4>';
                // Product Price
                echo woocommerce_template_loop_price();
                // Product Rating
                woocommerce_template_loop_rating();

            echo '</div>';
        echo '</div>';
    }
}

// single product price rating hook function
if( !function_exists('travolo_woocommerce_single_product_price_rating') ) {
    function travolo_woocommerce_single_product_price_rating() {
        
        global $product;
        // Product Rating
        echo '<div class="product-rating">';
            $average_rating = $product->get_average_rating();
            $review_count   = $product->get_review_count();
            if( $review_count == '0' ){
                esc_html_e( 'There are no reviews yet', 'travolo' );
            }else{
                woocommerce_template_loop_rating();
                if( $review_count > 1 ) {
                    esc_html_e('Reviews','travolo');
                } else {
                    esc_html_e('Review','travolo');
                };
                echo '<span class="count">'.esc_html( ' ('.$review_count ).')'.' </span> ';
            }
        echo '</div>';
       
    }
}

// single product title hook function
if( !function_exists('travolo_woocommerce_single_product_title') ) {
    function travolo_woocommerce_single_product_title( ) {
        if( class_exists( 'ReduxFramework' ) ) {
            $producttitle_position = travolo_opt('travolo_product_details_title_position');
        } else {
            $producttitle_position = 'header';
        }

        if( $producttitle_position != 'header' ) {
            echo '<!-- Product Title -->';
            echo '<h2 class="product-title">'.esc_html( get_the_title() ).'</h2>';
            echo '<!-- End Product Title -->';
        }
       
        echo '<!-- Product Prices -->';
        woocommerce_template_single_price();
        echo '<!-- End Product Price -->';
       

    }
}

// single product title hook function
if( !function_exists('travolo_woocommerce_quickview_single_product_title') ) {
    function travolo_woocommerce_quickview_single_product_title( ) {
        echo '<!-- Product Title -->';
        echo '<h2 class="product-title">'.esc_html( get_the_title() ).'</h2>';
        echo '<!-- End Product Title -->';
    }
}

// single product excerpt hook function
if( !function_exists('travolo_woocommerce_single_product_excerpt') ) {
    function travolo_woocommerce_single_product_excerpt( ) {
        echo '<!-- Product Description -->';
        woocommerce_template_single_excerpt();
        echo '<!-- End Product Description -->';
    }
}

// single product availability hook function
if( !function_exists('travolo_woocommerce_single_product_availability') ) {
    function travolo_woocommerce_single_product_availability( ) {
        global $product;
        $availability = $product->get_availability();

        if( class_exists( 'ReduxFramework' ) ){
            $travolo_stock_quantity = travolo_opt( 'travolo_woo_stock_quantity_show_hide' );
        }else{
            $travolo_stock_quantity = 1;
        }

        if( $travolo_stock_quantity ){
            if( $availability['class'] != 'out-of-stock' ) {
                echo '<!-- Product Availability -->';
                    echo '<div class="mt-2 link-inherit fs-xs">';
                        echo '<p>';
                            echo '<strong class="text-title me-3 font-theme">'.esc_html__( 'Availability:', 'travolo' ).'</strong>';
                            if( $product->get_stock_quantity() ){
                                echo '<span class="stock in-stock"><i class="far fa-check-square me-2"></i>'.esc_html( $product->get_stock_quantity() ).'</span>';
                            }else{
                                echo '<span class="stock in-stock"><i class="far fa-check-square me-2"></i>'.esc_html__( 'In Stock', 'travolo' ).'</span>';
                            }
                        echo '</p>';
                    echo '</div>';
                echo '<!--End Product Availability -->';
            } else {
                echo '<!-- Product Availability -->';
                echo '<div class="mt-2 link-inherit fs-xs">';
                    echo '<p>';
                        echo '<strong class="text-title me-3 font-theme">'.esc_html__( 'Availability:', 'travolo' ).'</strong>';
                        echo '<span class="stock out-of-stock"><i class="far fa-check-square me-2"></i>'.esc_html__( 'Out Of Stock', 'travolo' ).'</span>';
                    echo '</p>';
                echo '</div>';
                echo '<!--End Product Availability -->';
            }
        }
    }
}

// single product add to cart fuunction
if( !function_exists('travolo_woocommerce_single_add_to_cart_button') ) {
    function travolo_woocommerce_single_add_to_cart_button( ) {
        woocommerce_template_single_add_to_cart();
    }
}

// single product ,eta hook function
if( !function_exists('travolo_woocommerce_single_meta') ) {
    function travolo_woocommerce_single_meta( ) {
        global $product;
        echo '<div class="product_meta">';
            if( ! empty( $product->get_sku() ) ){
                echo '<span class="sku_wrapper">'.esc_html__( 'SKU:', 'travolo' ).'<span class="sku">'.$product->get_sku().'</span></span>';
            }
            echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'travolo' ) . ' ', '</span>' );
            // Add the "Tags" section here
            $product_tags = get_the_terms( $product->get_id(), 'product_tag' );
            if ( $product_tags && ! is_wp_error( $product_tags ) ) {
                echo '<span>' . esc_html__( 'Tags:', 'travolo' ) . ' ';
                $tag_links = array();
                foreach ( $product_tags as $tag ) {
                    $tag_links[] = '<a href="' . get_term_link( $tag ) . '" rel="tag">' . esc_html( $tag->name ) . '</a>';
                }
                echo implode( ', ', $tag_links );
                echo '</span>';
            }
        echo '</div>';

        
        
    }
}

// single produt sidebar hook function
if( !function_exists('travolo_woocommerce_single_product_sidebar_cb') ) {
    function travolo_woocommerce_single_product_sidebar_cb(){
        if( class_exists('ReduxFramework') ) {
            $travolo_woo_singlepage_sidebar = travolo_opt('travolo_woo_singlepage_sidebar');
            if( ( $travolo_woo_singlepage_sidebar == '2' || $travolo_woo_singlepage_sidebar == '3' ) && is_active_sidebar('travolo-woo-sidebar') ) {
                get_sidebar('shop');
            }
        } else {
            if( is_active_sidebar('travolo-woo-sidebar') ) {
                get_sidebar('shop');
            }
        }
    }
}

// reviewer meta hook function
if( !function_exists('travolo_woocommerce_reviewer_meta') ) {
    function travolo_woocommerce_reviewer_meta( $comment ){
        $verified = wc_review_is_from_verified_owner( $comment->comment_ID );
        if ( '0' === $comment->comment_approved ) { ?>
            <em class="woocommerce-review__awaiting-approval">
                <?php esc_html_e( 'Your review is awaiting approval', 'travolo' ); ?>
            </em>

        <?php } else { ?>
                <h4 class="name h4"><?php echo ucwords( get_comment_author() ); ?> </h4>
                
                <span class="commented-on "><time class="woocommerce-review__published-date" datetime="<?php echo esc_attr( get_comment_date( 'c' ) ); ?>"> <?php printf( esc_html__('%1$s at %2$s', 'travolo'), get_comment_date(wc_date_format()),  get_comment_time() ); ?> </time></span>
           
                <?php
                if ( 'yes' === get_option( 'woocommerce_review_rating_verification_label' ) && $verified ) {
                    echo '<em class="woocommerce-review__verified verified">(' . esc_attr__( 'verified owner', 'travolo' ) . ')</em> ';
                }

                ?>
        <?php
        }

        woocommerce_review_display_rating();
    }
}

// woocommerce proceed to checkout hook function
if( !function_exists('travolo_woocommerce_button_proceed_to_checkout') ) {
    function travolo_woocommerce_button_proceed_to_checkout() {
        echo '<a href="'.esc_url( wc_get_checkout_url() ).'" class="checkout-button button alt wc-forward vs-btn shadow-none">';
            esc_html_e( 'Proceed to checkout', 'travolo' );
        echo '</a>';
    }
}

// travolo woocommerce cross sell display hook function
if( !function_exists('travolo_woocommerce_cross_sell_display') ) {
    function travolo_woocommerce_cross_sell_display( ){
        woocommerce_cross_sell_display();
    }
}

// travolo minicart view cart button hook function
if( !function_exists('travolo_minicart_view_cart_button') ) {
    function travolo_minicart_view_cart_button() {
        echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="vs-btn style4">' . esc_html__( 'View cart', 'travolo' ) . '</a>';
    }
}

// travolo minicart checkout button hook function
if( !function_exists('travolo_minicart_checkout_button') ) {
    function travolo_minicart_checkout_button() {
        echo '<a href="' .esc_url( wc_get_checkout_url() ) . '" class="vs-btn style4">' . esc_html__( 'Checkout', 'travolo' ) . '</a>';
    }
}

// travolo woocommerce before checkout form
if( !function_exists('travolo_woocommerce_before_checkout_form') ) {
    function travolo_woocommerce_before_checkout_form() {
        echo '<div class="row">';
            if ( ! is_user_logged_in() && 'yes' === get_option('woocommerce_enable_checkout_login_reminder') ) {
                echo '<div class="col-lg-12">';
                    woocommerce_checkout_login_form();
                echo '</div>';
            }

            echo '<div class="col-lg-12">';
                woocommerce_checkout_coupon_form();
            echo '</div>';
        echo '</div>';
    }
}

// add to cart button
function woocommerce_template_loop_add_to_cart( $args = array() ) {
    global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'icon-btn',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = wp_parse_args( $args, $defaults );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            '<i class="far fa-shopping-cart"></i>'
        );
}

// add to cart button Text
function woocommerce_template_loop_add_to_cart_text_style( $args = array() ) {
    global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode(
					' ',
					array_filter(
						array(
							'vs-btn',
							'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
						)
					)
				),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = wp_parse_args( $args, $defaults );

			if ( isset( $args['attributes']['aria-label'] ) ) {
				$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
            }
        }

        echo sprintf( '<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
            esc_url( $product->add_to_cart_url() ),
            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
            esc_attr( isset( $args['class'] ) ? $args['class'] : 'cart-button' ),
            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
            esc_html__( 'Add To Cart', 'travolo' ),
            
        );
}

// product searchform
add_filter( 'get_product_search_form' , 'travolo_custom_product_searchform' );
function travolo_custom_product_searchform( $form ) {

    $form = '<form class="search-form" role="search" method="get" action="' . esc_url( home_url( '/'  ) ) . '">
        <label class="screen-reader-text" for="s">' . __( 'Search for:', 'travolo' ) . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search', 'travolo' ) . '" />
        <button class="submit-btn" type="submit"><i class="far fa-eye"></i></button>
        <input type="hidden" name="post_type" value="product" />
    </form>';

    return $form;
}

// cart empty message
add_action('woocommerce_cart_is_empty','travolo_wc_empty_cart_message',10);
function travolo_wc_empty_cart_message( ) {
    echo '<h3 class="cart-empty d-none">'.esc_html__('Your cart is currently empty.','travolo').'</h3>';
}