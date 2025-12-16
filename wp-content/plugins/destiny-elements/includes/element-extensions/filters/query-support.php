<?php 


/**
 * Modify Taxonomie Query for the URL Search
 * Works with OR Operators
 */
function de_custom_query_vars_filter($vars) {
    // Normal categories
    $taxonomies = get_taxonomies();
    foreach ($taxonomies as $taxonomy) {
        $vars[] .= 'de_' . $taxonomy;
    }
    $vars[] .= 'de_author';
    $vars[] .= 'de_start_date';
    $vars[] .= 'de_end_date';
    $vars[] .= 'de_min_price';
    $vars[] .= 'de_max_price';
    $vars[] .= 'de_rating';
    $vars[] .= 'de_sort';

    // Product categories
    $taxonomies = get_object_taxonomies('product');
    foreach ($taxonomies as $taxonomy) {
        $vars[] .= 'de_' . $taxonomy;
    }

    // ACF fields
    if (function_exists('acf_get_field_groups')) {
        $field_groups = acf_get_field_groups();
        foreach ($field_groups as $group) {
            $fields = acf_get_fields($group['key']);
            foreach ($fields as $field) {
                // Adding the normal field
                $vars[] = 'de_acf_' . $field['name'];
    
                // Adding the min and max variations
                $vars[] = 'de_acf_min_' . $field['name'];
                $vars[] = 'de_acf_max_' . $field['name'];
            }
        }
    }

    // Add Meta Box fields to query vars
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {
        $meta_boxes = rwmb_get_registry( 'meta_box' )->all();
        foreach($meta_boxes as $box) {
            $fields = $box->fields;
            foreach ($fields as $field) {
                //if($field['type'] == 'radio' || $field['type'] == 'checkbox_list') {
                    $vars[] = 'de_mb_' . $field['id'];

                    // Adding the min and max variations
                    $vars[] = 'de_mb_min_' . $field['id'];
                    $vars[] = 'de_mb_max_' . $field['id'];
                //}
            }
        }
    }

    return $vars;
}
add_filter('query_vars', 'de_custom_query_vars_filter');

function de_get_filtered_relations() {
    $relations = isset($_GET['de_filter_rel']) ? $_GET['de_filter_rel'] : '';
    if (!$relations) return array();

    $relation_pairs = explode(",", $relations);
    $relationsArr = array();

    foreach ($relation_pairs as $pair) {
        list($taxonomy, $relation) = explode(":", $pair);
        $relationsArr[$taxonomy] = $relation;
    }

    return $relationsArr;
}


de_get_filtered_relations();

function de_modify_main_query($query) {
    if (!is_admin() && $query->is_main_query()) {
        $relations_from_url = de_get_filtered_relations();

        if (class_exists('WooCommerce')) {
            $product_taxonomies = get_object_taxonomies('product', 'names');
            foreach ($product_taxonomies as $product_taxonomy) {
                if (is_tax($product_taxonomy)) {
                    return;
                }
            }
        }
        
        // Handle taxonomies
        $taxonomies = get_taxonomies();
        

        foreach ($taxonomies as $taxonomy) {
            if (get_query_var('de_' . $taxonomy)) {
                $terms = explode(',', get_query_var('de_' . $taxonomy));
                $relation = isset($relations_from_url[$taxonomy]) ? strtoupper($relations_from_url[$taxonomy]) : 'OR';
                if ($relation == 'AND') {
                    foreach ($terms as $term) {
                        $term_object = get_term_by('slug', $term, $taxonomy);
                        if (!$term_object) {
                            $term_object = get_term_by('id', $term, $taxonomy);
                        }
                        if ($term_object) {
                            $tax_query[] = array(
                                'taxonomy' => $taxonomy,
                                'field'    => 'id',
                                'terms'    => $term_object->term_id,
                            );
                        }
                    }
                } else { // If relation is 'OR'
                    $term_ids = [];
                    foreach ($terms as $term) {
                        $term_object = get_term_by('slug', $term, $taxonomy);
                        if (!$term_object) {
                            $term_object = get_term_by('id', $term, $taxonomy);
                        }
                        if ($term_object) {
                            $term_ids[] = $term_object->term_id;
                        }
                    }
                    $tax_query = array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'id',
                            'terms'    => $term_ids,
                        ),
                    );
                }
            }
        }
        
        

        if (!empty($tax_query)) {
            $query->set('tax_query', $tax_query);
        }

        // Handle de_author query variable
        $authors = get_query_var('de_author');
        if (!empty($authors)) {
            $authors = explode(',', $authors); // Split the authors by comma
            $query->set('author__in', $authors); // Set author__in to the author IDs
        }

        // Initialising combined_meta_query
        $combined_meta_query = array('relation' => 'AND');

        // Handle ACF fields
        if (function_exists('acf_get_field_groups')) {
            $field_groups = acf_get_field_groups();
            foreach ($field_groups as $group) {
                $fields = acf_get_fields($group['key']);
                foreach ($fields as $field) {

                    // This will only work if the ACF is a number as it requires to quiry the format as Number from Database
                    $min_value = intval(get_query_var('de_acf_min_' . $field['name']));
                    $max_value = intval(get_query_var('de_acf_max_' . $field['name']));

                    if ($min_value > 0 && $max_value > 0) {
                        $combined_meta_query[] = array(
                            'key' => $field['name'],
                            'value' => array($min_value, $max_value),
                            'compare' => 'BETWEEN',
                            'type' => 'NUMERIC',
                        );
                    } elseif ($min_value > 0) {
                        $combined_meta_query[] = array(
                            'key' => $field['name'],
                            'value' => $min_value,
                            'compare' => '>=',
                            'type' => 'NUMERIC',
                        );
                    } elseif ($max_value > 0) {
                        $combined_meta_query[] = array(
                            'key' => $field['name'],
                            'value' => $max_value,
                            'compare' => '<=',
                            'type' => 'NUMERIC',
                        );
                    }


                    // Handle other non-range query vars
                    $field_value = get_query_var('de_acf_' . $field['name']);
                    if (!empty($field_value) && empty($min_value) && empty($max_value)) {
                        $relation = isset($relations_from_url[$field['name']]) ? strtoupper($relations_from_url[$field['name']]) : 'OR';
                        if ($relation == 'AND') {
                            $values = explode(',', $field_value);
                            foreach ($values as $value) {
                                $combined_meta_query[] = array(
                                    'key'     => $field['name'],
                                    'value'   => $value,
                                    'compare' => '='
                                );
                            }
                        } else {
                            $values = explode(',', $field_value);
                            $combined_meta_query[] = array(
                                'relation' => 'OR',
                                array(
                                    'key'     => $field['name'],
                                    'value'   => $values,
                                    'compare' => 'IN'
                                ),
                            );
                        }
                    }

                }
            }
        }



        // Handle Meta Box fields
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if (is_plugin_active('meta-box/meta-box.php')) {
            $meta_boxes = rwmb_get_registry('meta_box')->all();
            foreach ($meta_boxes as $box) {
                $fields = $box->fields;
                foreach ($fields as $field) {
                    //if ($field['type'] == 'radio' || $field['type'] == 'checkbox_list') {


                        // This will only work if the ACF is a number as it requires to quiry the format as Number from Database
                        $min_value = intval(get_query_var('de_mb_min_' . $field['id']));
                        $max_value = intval(get_query_var('de_mb_max_' . $field['id']));
                        
                        if ($min_value > 0 && $max_value > 0) {
                            $combined_meta_query[] = array(
                                'key' => $field['id'],
                                'value' => array($min_value, $max_value),
                                'compare' => 'BETWEEN',
                                'type' => 'NUMERIC',
                            );
                        } elseif ($min_value > 0) {
                            $combined_meta_query[] = array(
                                'key' => $field['id'],
                                'value' => $min_value,
                                'compare' => '>=',
                                'type' => 'NUMERIC',
                            );
                        } elseif ($max_value > 0) {
                            $combined_meta_query[] = array(
                                'key' => $field['id'],
                                'value' => $max_value,
                                'compare' => '<=',
                                'type' => 'NUMERIC',
                            );
                        }                        

                        $field_value = get_query_var('de_mb_' . $field['id']);
                        if (!empty($field_value)) {
                            $cleaned_field_name = str_replace('mb_', '', $field['id']);
                            $relation = isset($relations_from_url[$cleaned_field_name]) ? strtoupper($relations_from_url[$cleaned_field_name]) : 'OR';
                            $values = explode(',', $field_value);
                            if ($relation == 'AND') {
                                foreach ($values as $value) {
                                    $combined_meta_query[] = array(
                                        'key'     => $field['id'],
                                        'value'   => $value,
                                        'compare' => '='
                                    );
                                }
                            } else {
                                $combined_meta_query[] = array(
                                    'relation' => 'OR',
                                    array(
                                        'key'     => $field['id'],
                                        'value'   => $values,
                                        'compare' => 'IN'
                                    ),
                                );
                            }
                        }
                    //}
                }
            }
        }



        // Get the de_start_date and de_end_date query variables
        $start_date = get_query_var('de_start_date');
        $end_date = get_query_var('de_end_date');

        if (!empty($start_date) && !empty($end_date)) {
            $date_query = array(
                array(
                    'after'     => $start_date,
                    'before'    => $end_date,
                    'inclusive' => true,
                    'compare' => 'IN',
                ),
            );

            // Add the date query
            $query->set('date_query', $date_query);
        }


        // Setting meta_query to the combined_meta_query if it is not empty
        if (count($combined_meta_query) > 1) {
            $query->set('meta_query', $combined_meta_query);
        }
    }
}
add_action('pre_get_posts', 'de_modify_main_query');



/**
 * Modify WordPress query
 * Only works with 'AND', 'OR" does not
 */

 function de_modify_woo_query($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('product')) {
        $taxonomies = get_object_taxonomies('product');
        $relations_from_url = de_get_filtered_relations();
        $combined_rel = isset($_GET['de_combined_rel']) ? $_GET['de_combined_rel'] : 'AND';
        $tax_query = array('relation' => strtoupper($combined_rel));

        foreach ($taxonomies as $taxonomy) {
            if (get_query_var('de_' . $taxonomy)) {
                $terms = explode(',', get_query_var('de_' . $taxonomy));
                $relation = isset($relations_from_url[$taxonomy]) ? strtoupper($relations_from_url[$taxonomy]) : 'OR';
                $single_tax_query = array('relation' => $relation);
                
                foreach ($terms as $term) {
                    $term_object = get_term_by('slug', $term, $taxonomy);
                    if (!$term_object) {
                        $term_object = get_term_by('id', $term, $taxonomy);
                    }
                    if ($term_object) {
                        $single_tax_query[] = array(
                            'taxonomy' => $taxonomy,
                            'field' => 'term_id',
                            'terms' => $term_object->term_id,
                            'inclusive' => true,
                        );
                    }
                }
                
                $tax_query[] = $single_tax_query;
            }
        }

        $query->set('tax_query', $tax_query);

        // Adding price range
        $min_price = get_query_var('de_min_price');
        $max_price = get_query_var('de_max_price');
        $meta_query = array('relation' => 'AND'); // Initialize meta_query

        if (($min_price !== '' && is_numeric($min_price)) && ($max_price !== '' && is_numeric($max_price))) {
            $meta_query[] = array(
                'key' => '_price',
                'value' => array($min_price, $max_price),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC',
            );
        }

        // Rating
        $rating = get_query_var('de_rating');

        if (!empty($rating)) {
            $rating = explode(',', $rating);  // Convert the string into an array
            $meta_query[] = array(
                'key' => '_wc_average_rating',
                'value' => $rating,
                'compare' => 'IN',
                'type' => 'DECIMAL(2,1)',
            );
        }
        
        $query->set('meta_query', $meta_query);
    }
}


function de_custom_product_query($args) {
    $sort = !empty($_GET['de_sort']) ? sanitize_key($_GET['de_sort']) : '';

    if ($sort) {
        $sort_parts = explode('_', $sort);
        $sort_by = $sort_parts[0];
        $sort_order = isset($sort_parts[1]) ? $sort_parts[1] : 'asc'; // Default to ascending if not set

        switch ($sort_by) {
            case 'date':
                $args['orderby'] = 'date';
                $args['order'] = $sort_order;
                break;
            case 'price':
                $args['orderby'] = 'meta_value_num';
                $args['order'] = $sort_order;
                $args['meta_key'] = '_price';
                break;
            case 'popularity':
                $args['orderby'] = 'meta_value_num';
                $args['order'] = $sort_order;
                $args['meta_key'] = 'total_sales';
                break;
        }
    }
    return $args;
}




/**
 * Check if WooCommerce is activated
 */
		
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    add_action('pre_get_posts', 'de_modify_woo_query');
    add_filter('woocommerce_get_catalog_ordering_args', 'de_custom_product_query', 20);
    
    // Disable single Search for Woo
    add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );
}