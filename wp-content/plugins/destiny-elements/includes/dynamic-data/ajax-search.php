<?php

add_action("wp_ajax_nopriv_de_ajax_search", "de_ajax_search"); // for users
add_action("wp_ajax_de_ajax_search", "de_ajax_search"); // for when logged in for admins

/**
 * Returns posts
 * Return by default 6 posts, but on blog post there may be only 3 for related
 * Categories used for filtering with fetch, and also for category archieve pages
 * Author is used by id from the authroe page
 * We use the same function for Search
 */

function de_ajax_search(
    $post_type = 'post',
    $post_per_result = 4,
    $featured_image = false, 
    $show_results = false, 
    $show_prices = false,
    $show_all_results_button = false,
    $results_message = 'No results found',
    $results_count_name = 'Results: ',
    $exercpt = true,
    $exercpt_length = 50,
    $show_all_results_text = 'See All Results',
    $sku = false, 
    $sku_and_s = false, 
    $sku_heading = false
) {

    // TODO: Add own Destiny nonce instead of using Breakdance nonce
    // if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'breakdance_ajax')) {
    //     echo wp_send_json_error('Invalid nonce');
    //     exit;
    // }
    
    $get_post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : false;
    $get_orderby = isset($_POST['orderby']) ? sanitize_text_field($_POST['orderby']) : false;
    $get_order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : false;
    $get_sticky_posts = isset($_POST['sticky_posts']) ? sanitize_text_field($_POST['sticky_posts']) : false;
    $posts_per_page = isset($_POST['posts_per_page']) ? sanitize_text_field($_POST['posts_per_page']) : null;
    $get_featured_image = isset($_POST['featured_image']) ? sanitize_text_field($_POST['featured_image']) : false;
    $get_show_results = isset($_POST['show_results']) ? sanitize_text_field($_POST['show_results']) : false;
    $get_no_results_message = isset($_POST['no_results_msg']) ? sanitize_text_field($_POST['no_results_msg'])  : false;
    $get_show_prices = isset($_POST['show_prices']) ? sanitize_text_field($_POST['show_prices'])  : false;
    $get_show_all_results_button = isset($_POST['show_all_results_btn']) ? sanitize_text_field($_POST['show_all_results_btn'])  : false;
    $get_show_all_results_text = isset($_POST['all_results_text']) ? sanitize_text_field($_POST['all_results_text'])  : false;
    $get_show_results_count_name = isset($_POST['results_count_name']) ? sanitize_text_field($_POST['results_count_name'])  : false;
    $get_tax_term_de = isset($_POST['get_taxonomy_term']) ? sanitize_text_field($_POST['get_taxonomy_term'])  : false;
    $get_excercpt = isset($_POST['excerpt']) ? sanitize_text_field($_POST['excerpt'])  : false;
    $get_excercpt_length = isset($_POST['excerpt_length']) ? sanitize_text_field($_POST['excerpt_length'])  : false;
    $get_sku = isset($_POST['sku']) ? sanitize_text_field($_POST['sku'])  : false;
    $get_sku_and_s = isset($_POST['sku_n_s']) ? sanitize_text_field($_POST['sku_n_s'])  : false;
    $get_sku_heading = isset($_POST['sku_heading']) ? sanitize_text_field($_POST['sku_heading']) : false;

    $get_category_name = isset($_POST['cat_name']) ? sanitize_text_field($_POST['cat_name']) : false;

    if($get_featured_image) $featured_image = true;
    if($get_show_results)  $show_results = true;
    if($get_no_results_message) $results_message = $get_no_results_message;
    if($get_post_type) $post_type = $get_post_type;
    if($get_show_prices)  $show_prices = $get_show_prices;
    if($get_show_all_results_button) $show_all_results_button = $get_show_all_results_button;
    if($get_show_results_count_name)  $results_count_name = $get_show_results_count_name;
    if($get_show_all_results_text) $show_all_results_text = $get_show_all_results_text;
    if($get_sku) $sku = $get_sku;
    if($get_sku_and_s) $sku_and_s = $get_sku_and_s;
    if($get_sku_heading) $sku_heading = $get_sku_heading;


    if($get_excercpt == '1') $exercpt = true;
    if(!$get_excercpt == '0') $exercpt = false;
    if($exercpt_length == null) $exercpt_length = 50;
    if($get_excercpt_length && $get_excercpt_length != 0)  $exercpt_length = $get_excercpt_length;

    if(!$get_category_name) $get_category_name = null;
    if(!$post_type || $post_type == 'undefined') $post_type = 'post,page';

    $get_cats = isset($_POST['cats']) ? sanitize_text_field($_POST['cats']) : false;
    $get_page = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : false;
    $get_author_id = isset($_POST['author']) ? sanitize_text_field($_POST['author']) : false;
    $get_search = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : false;
   
    $page = 1;

    if($posts_per_page)  $post_per_result  = $posts_per_page;

    if($get_category_name && $get_tax_term_de) {
        $tax_query = array(
            array(
                'taxonomy'  => $get_tax_term_de,
                'field'     => 'slug',
                'terms'     => $get_category_name,
            ),
        );
    } else {
        $tax_query = null;
    }

    // Store Data for the template
    $post_data = array();
    $post_count = 0;


     // Check if plugin active is active
     if ( ! function_exists( 'is_plugin_active' ) ) {
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }

    // Initialize the excluded IDs array for SearchWP
    $excluded_ids = array();

     // If SearchWP is active, exclude posts based on SearchWP settings
    if ( is_plugin_active( 'searchwp/index.php' ) ) {
        $excluded_ids = get_posts( array(
            'post_type'      => explode(',', $post_type), 
            'post_status'       => 'publish',
            'fields'         => 'ids',
            'posts_per_page' => -1, 
            'meta_query'     => array(
                array(
                    'key'   => '_searchwp_excluded', 
                    'value' => '1',
                )
            )
        ));
    }

    $args = array(
        'post_type'         =>  explode(',', $post_type),
        'post_status'       => 'publish',
        'posts_per_page'    => $post_per_result,
        'paged'             => $page,
        's'                 => $get_search,
        'orderby'           => $get_orderby,
	    'order'             => $get_order,
        'ignore_sticky_posts' => $get_sticky_posts,
        'date_query' => array(
            array(
                'after'     => '',
                'before'    => '',
                'inclusive' => true,
            ),
        ),
        'tax_query'         => $tax_query,
        'meta_query' => array(
            array(
                'key' => '_sku',
                'value' => $get_search,
                'compare' => 'LIKE'
            )
        ),
        'relevanssi' => true,
        'post__not_in' => $excluded_ids
    );


    if(!$sku || $sku_and_s) {
        unset($args['meta_query']);
    } else {
        unset($args['s']);
    }

    $query = new WP_Query( $args );

    $post_count = $query ->found_posts; // post counts

    $pages = $query->max_num_pages; // show how many pages per this query 

    $date_format = 'Y-m-d';

    $permalink = get_permalink();
    $date_published = get_the_date($date_format);


    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) :
            $query->the_post();
    
            // Put data in
            $post_id = get_the_ID();
    
            $post_query_data = array();
    
            $post_query_data['permalink'] = get_permalink();
            $post_query_data['title'] = get_the_title();
            $post_query_data['thumbnail'] = get_the_post_thumbnail( get_the_ID(), 'thumbnail' );

       
    
            if ( class_exists( 'WooCommerce' ) && 'product' == get_post_type( $post_id ) ) {
                $product_id = get_the_ID();
                $product = wc_get_product( $product_id );
    
                if( $product->is_type('simple') ) {
                    $regular_price = get_post_meta( $product_id, '_regular_price', true );
                    $sale_price = get_post_meta( $product_id, '_sale_price', true );
                    // Format the prices with the currency symbol
                    $regular_price_formatted = $regular_price != '' ? wc_price( $regular_price ) : '';
                    $sale_price_formatted = $sale_price != '' ? wc_price( $sale_price ) : '';
                }
                elseif( $product->is_type('variable') ) {
                    $variations = $product->get_available_variations();
                    $lowest_regular_price = null;
                    $lowest_sale_price = null;
                    foreach($variations as $variation) {
                        $variation_obj = wc_get_product($variation['variation_id']);
                        $variation_regular_price = $variation_obj->get_regular_price();
                        $variation_sale_price = $variation_obj->get_sale_price();
    
                        if(is_null($lowest_regular_price) || $variation_regular_price < $lowest_regular_price) {
                            $lowest_regular_price = $variation_regular_price;
                            $lowest_sale_price = $variation_sale_price;
                        }
                    }
                    $regular_price = $lowest_regular_price;
                    $sale_price = $lowest_sale_price;
    
                    // Format the prices with the currency symbol
                    $regular_price_formatted = !is_null($regular_price) ? wc_price( $regular_price ) : '';
                    $sale_price_formatted = !is_null($sale_price) ? wc_price( $sale_price ) : '';
                }
    
                $post_query_data['sale_price'] = !is_null($sale_price) ? $sale_price : '';
                $post_query_data['regular_price_formatted'] = $regular_price_formatted;
                $post_query_data['sale_price_formatted'] =  $sale_price_formatted;
                $post_query_data['product'] =  get_post_type() === 'product' ? true : false;
    
            }
    
            $post_query_data['excerpt'] = substr( get_the_excerpt(), 0, $exercpt_length );
            $post_data[$post_id] = $post_query_data;
    
        endwhile;
    endif;    

    wp_reset_postdata();

    if($sku_and_s && $sku) {
        $args_sku = array(
            'post_type'         =>  explode(',', $post_type),
            'post_status'       => 'publish',
            'posts_per_page'    => $post_per_result,
            'paged'             => $page,
            'orderby'           => $get_orderby,
            'order'             => $get_order,
            'ignore_sticky_posts' => $get_sticky_posts,
            'date_query' => array(
                array(
                    'after'     => '',
                    'before'    => '',
                    'inclusive' => true,
                ),
            ),
            'tax_query'         => $tax_query,
            'meta_query' => array(
                array(
                    'key' => '_sku',
                    'value' => $get_search,
                    'compare' => 'LIKE'
                )
            ),
            'relevanssi' => true
        );

        $query_sku = new WP_Query( $args_sku );

        if($sku_and_s) {
            $post_count = $post_count + $query_sku ->found_posts; // post counts
        }
    
        if ( $query_sku>have_posts() ) :
            while ( $query_sku->have_posts() ) :
                $query_sku->the_post();
        
                // Put data in
            $post_id = get_the_ID();
    
            $post_query_data = array();
    
            $post_query_data['permalink'] = get_permalink();
            $post_query_data['title'] = get_the_title();
            $post_query_data['thumbnail'] = get_the_post_thumbnail( get_the_ID(), 'thumbnail' );
    
            if ( class_exists( 'WooCommerce' ) && 'product' == get_post_type( $post_id ) ) {
                $product_id = get_the_ID();
                $product = wc_get_product( $product_id );
    
                if( $product->is_type('simple') ) {
                    $regular_price = get_post_meta( $product_id, '_regular_price', true );
                    $sale_price = get_post_meta( $product_id, '_sale_price', true );
                    // Format the prices with the currency symbol
                    $regular_price_formatted = $regular_price != '' ? wc_price( $regular_price ) : '';
                    $sale_price_formatted = $sale_price != '' ? wc_price( $sale_price ) : '';
                }
                elseif( $product->is_type('variable') ) {
                    $variations = $product->get_available_variations();
                    $lowest_regular_price = null;
                    $lowest_sale_price = null;
                    foreach($variations as $variation) {
                        $variation_obj = wc_get_product($variation['variation_id']);
                        $variation_regular_price = $variation_obj->get_regular_price();
                        $variation_sale_price = $variation_obj->get_sale_price();
    
                        if(is_null($lowest_regular_price) || $variation_regular_price < $lowest_regular_price) {
                            $lowest_regular_price = $variation_regular_price;
                            $lowest_sale_price = $variation_sale_price;
                        }
                    }
                    $regular_price = $lowest_regular_price;
                    $sale_price = $lowest_sale_price;
    
                    // Format the prices with the currency symbol
                    $regular_price_formatted = !is_null($regular_price) ? wc_price( $regular_price ) : '';
                    $sale_price_formatted = !is_null($sale_price) ? wc_price( $sale_price ) : '';
                }
    
                $post_query_data['sale_price'] = !is_null($sale_price) ? $sale_price : '';
                $post_query_data['regular_price_formatted'] = $regular_price_formatted;
                $post_query_data['sale_price_formatted'] =  $sale_price_formatted;
                $post_query_data['product'] =  get_post_type() === 'product' ? true : false;
    
            }
    
            $post_query_data['excerpt'] = substr( get_the_excerpt(), 0, $exercpt_length );
            $post_data[$post_id] = $post_query_data;
        
            endwhile;
        endif;
        
        wp_reset_postdata();
    }

    if ($show_results) { ?>
        <div class="de-results-top">
            <p class="de-results-count"><?php echo $results_count_name; ?> <?php echo $post_count; ?></p>
        </div>
    <?php } ?>

    <div class="de-search-results" data-posts="<?php echo $post_count; ?>" data-pages="<?php echo $pages ?>" data-current-page="<?php echo $page; ?>">
        <?php 
          if (empty($post_data)) {
            ?>
              <p class="de-no-results-message"><?php echo $results_message; ?></p>
            <?php
        }
        $counter = 0;
        foreach ($post_data as $key => $value) {
            if ($counter == $post_per_result) break;
            ?>

            <a href="<?php echo $value['permalink']; ?>" class="de-search-result">
                <?php if($value['thumbnail'] && $featured_image) { ?>
                <div class="de-search-featured-img"><?php echo $value['thumbnail']; ?></div>
                <?php } ?>
                <div class="de-search-content">
                    <h3><?php echo $value['title']; ?></h3>
                    <?php if (!$exercpt) { ?>
                    <p class="excerpt"><?php echo $value['excerpt']; ?>...</p>
                    <?php } ?>
                    <?php if ( class_exists( 'WooCommerce' ) && $value['product']) { ?>
                    <p class="price">
                        <?php 
                        if ($show_prices && class_exists( 'WooCommerce' )) {
                            if ($value['sale_price']) { ?>
                                    <span class="de-sale-price"><?php echo $value['regular_price_formatted']; ?></span> <span class="de-current-price"><?php echo $value['sale_price_formatted']; ?></span>
                                <?php
                            } else {
                                ?>
                            <span class="de-current-price"><?php echo $value['regular_price_formatted']; ?></span>
                            <?php 
                            }
                        }
                        ?>
                    </p>
                    <?php } ?>
                </div>
            </a>

            <?php 
            $counter++;
        }
        ?>

    <?php
    if ($post_count >= $posts_per_page && $show_all_results_button) { 
        $search_url = home_url( '/');
        $args = array(
            's' => urlencode( $get_search ),
        );
        $search_url = $search_url . '?' . http_build_query($args);
        $search_url .= '&post_type=' . $post_type;
        ?>
        <a class="de-show-all-results" href="<?php echo $search_url; ?>"><?php echo $show_all_results_text; ?></a>
    <?php } ?>
    </div>
    </div>

    <?php 

}

