<?php 

/**
 * Filter inputs, so we don't have to add them iunside the SSR file.
 */

function de_get_dropdown_input($details, $options, $design) {

    $label = (string) ($details['filter_label'] ?? 'Label');
    $filter_type = (string) ($details['filter_type'] ?? 'tax');
    $tax = (string) ($details['select_taxonomie'] ?? 'category');
    $input_type = (string) ($details['input_type'] ?? 'dropdown');
    $select_label = (string) ($details['select_label'] ?? '');
    $show_count = (bool) ($details['show_count'] ?? false);

    $show_all = (bool) ($options['dropdowns_and_inputs']['show_all_option'] ?? false);
    $show_all_text = (string) ($options['dropdowns_and_inputs']['show_all_text'] ?? 'Show All');

    $show_empty_fields = (bool) ($options['dropdowns_and_inputs']['show_empty_fields'] ?? false);

    $order = (string) ($details['order']['order'] ?? 'ASC');
    $orderby = (string) ($details['order']['order_by'] ?? 'name');
    $icon = isset($design['inputs']['dropdown']['icon']['icon']) ? $design['inputs']['dropdown']['icon']['icon']['svgCode'] : false;

    //Clear Button 
    $clear_button = (bool) ($options['dropdowns_and_inputs']['show_clear_all_button'] ?? false);
    $clear_icon = isset($design['buttons']['clear_all_button']['icon']) ? $design['buttons']['clear_all_button']['icon']['svgCode'] : '';

    // Child Options
    $child_options = (array) ($details['child_options'] ?? []);

    $input_width = isset($details['width']) ? $details['width'] : false;

    // Get the queried object
    $queried_object = get_queried_object();

    // Get The Relation 
    $relation = (string) ($details['relation'] ?? false);

    // Single Selection for Buttons
    $single_selection = (bool) ($details['single_selection'] ?? false);


    $post_type = 'post';

    // Get the post type from the queried object
    if ($queried_object instanceof WP_Post_Type) {
        $post_type = $queried_object->name;
    }

    $options = [];

    if($filter_type === "author") {

        $author_display = (string) ($details['author_display_format'] ?? '');
        $author_role = isset($details['author_role']) ? $details['author_role'] : null;

        $args = array(
            'role'    => $author_role,
            'orderby' => (string) ($details['order']['order_by'] ?? 'display_name'),
            'order'   =>  $order,
        );

        $users = get_users($args);
        
        foreach ($users as $user) {

            switch ($author_display) {
                case 'username':
                    $user_name = $user->user_login;
                    break;
                case 'first_name':
                    $user_name = $user->first_name;
                    break;
                case 'last_name':
                    $user_name = $user->last_name;
                    break;
                case 'first_last_name':
                    $user_name = $user->first_name . ' ' . $user->last_name;
                    break;
                case 'last_first_name':
                    $user_name = $user->last_name . ', ' . $user->first_name;
                    break;
                default:
                    $user_name = $user->display_name;
                    break;
            }

            $count = count_user_posts($user->ID, $post_type);

            if(!$show_empty_fields && $count == 0) {
    
            } else {
                $options[] = array(
                    'name'  => $user_name,
                    'slug'  => $user->ID,
                    'count' => $count 
                );
            }
        };

        deAjaxFilterFaceted( array(
            'label'         => $label,
            'key'           => 'author',
            'placeholder'   => $select_label,
            'clear_button'  => $clear_button,
            'clear_icon'    => $clear_icon,
            'dropdown_icon' => $icon,
            'show_all'      => $show_all,
            'show_all_text' => $show_all_text, 
            'show_count'    => $show_count,
            'input_type'    => $input_type,
            'show_count'    => $show_count,
            'options'       => $options, 
            'width'         => $input_width,
            'single_select' => $single_selection,
            'show_empty_fields' => $show_empty_fields
        ));
    };


    if($filter_type === "tax") {

        $args = array(
            'orderby'      =>  $orderby,
            'order'        =>  $order,
            'taxonomy'     =>  $tax,
            'hide_empty'   =>  $show_empty_fields,
            'parent'       =>  null,
            'exclude'      =>  null,
            'depth'        =>  null,
        );

        $categories = get_categories( $args );
        
        foreach ($categories as $category) {
            $children_arr = [];

            $child_filter = (bool) ($child_options['child_filter'] ?? false);
            $show_children = (bool) ($child_options['show_children'] ?? false);

            if($child_filter || $show_children) {
                $children = get_term_children( $category->term_id, $tax );
               
                foreach ( $children as $child ) {
                    $term = get_term_by('id',  $child, $tax );
                    if(!$show_empty_fields && $term->count == 0) {

                    } else {
                        $children_arr[] = array (
                            'name'  => $term->name,
                            'slug'  => $term->slug,
                            'count' => $term->count
                        );
                    }
                    
                }
                $options[] = array(
                    'name'  => $category->name,
                    'slug'  => $category->slug,
                    'count' => $category->count,
                    'children' => $children_arr
                );
            } else {
                $options[] = array(
                    'name'  => $category->name,
                    'slug'  => $category->slug,
                    'count' => $category->count,
                );
            }
        };
    
        deAjaxFilterFaceted( array(
            'label'         => $label,
            'key'           => $tax,
            'placeholder'   => $select_label,
            'clear_button'  => $clear_button,
            'clear_icon'    => $clear_icon,
            'dropdown_icon' => $icon,
            'show_all'      => $show_all,
            'show_all_text' => $show_all_text, 
            'show_count'    => $show_count,
            'input_type'    => $input_type,
            'options'       => $options,
            'width'         => $input_width, 
            'child_options' => $child_options, 
            'relation'      => $relation,
            'number_gap'    => (int) ($details['number_gap'] ?? 20),
            'number_type'   => (string) ($details['min_max_type'] ?? 'dropdown'),
            'single_select' => $single_selection,
            'show_empty_fields' => $show_empty_fields
        ));
    }
}

function de_get_search_input($details, $design) {
    
    $label = (string) ($details['filter_label'] ?? 'Label');
    $placeholder = (string) ($details['search_placeholder'] ?? 'Search...');
    $select_label = (string) ($details['select_label'] ?? '');

    $icon = false;

    if(isset($design['inputs']['search']['icon']['icon'])) {
        $icon = $design['inputs']['search']['icon']['icon']['svgCode'];
    } else if(isset($design['inputs']['saerch']['icon']['icon'])) {
        $icon = $design['inputs']['saerch']['icon']['icon']['svgCode'];
    }

    ?>
    <div class="de-af-selection-wrapper de-af-search" <?php echo $details['width'] ? 'style="width: '. $details['width']['style'].' "' : ''; ?>>
        <label for="de-af-search-%%ID%%"><?php echo $label; ?></label>
        <div class="de-af-input" data-select-label='<?php echo $select_label; ?>'>
            <input 
                    type="text" 
                    id="de-af-search-%%ID%%" 
                    data-key="de-search"
                    placeholder="<?php echo $placeholder; ?>"
            >
            <?php if($icon) { ?>
            <span class="de-af-search-icon"><?php echo $icon; ?></span>
            <?php } ?>
        </div>
    </div>
    <?php
}

function de_get_date_input($details, $options) {
    $label = (string) ($details['filter_label'] ?? '');
    $placeholder = (string) ($details['date_placeholder'] ?? 'Search Date');
    $date_format = isset($options['date_picker']['date_format']) ? $options['date_picker']['date_format'] : false;
    $date_seperator = isset($options['date_picker']['range_seperator']) ? $options['date_picker']['range_seperator'] : false;
    $select_label = (string) ($details['select_label'] ?? '');

    // Get the queried object
    $queried_object = get_queried_object();

    // Get the post type from the queried object
    if ($queried_object instanceof WP_Post_Type) {
        $post_type = $queried_object->name;
    } else {
        $post_type = 'post';
    }

    $first_args = array(
        'post_type' => $post_type,
        'posts_per_page' => 1,
        'order' => 'ASC'
    );
    $first_query = new WP_Query($first_args);
    $first_post_date = '';
    if($first_query->have_posts()) {
        $first_query->the_post();
        $first_post_date = get_the_date('Y-m-d');
    }
    wp_reset_postdata();

    $last_args = array(
        'post_type' => $post_type,
        'posts_per_page' => 1,
        'order' => 'DESC'
    );
    $last_query = new WP_Query($last_args);
    $last_post_date = '';
    if($last_query->have_posts()) {
        $last_query->the_post();
        $last_post_date = get_the_date('Y-m-d');
    }
    wp_reset_postdata();

    ?>
    <div class="de-af-selection-wrapper de-af-date" <?php echo $details['width'] ? 'style="width: '. $details['width']['style'].' "' : ''; ?>>
        <label for="de-af-date-%%ID%%"><?php echo $label; ?></label>
        <div class="de-af-input" data-select-label='<?php echo $select_label; ?>'>
            <input 
                    type="text" 
                    id="de-af-date-%%ID%%" 
                    data-key="de-af-date"
                    placeholder="<?php echo $placeholder; ?>"
                    data-range-seperator="<?php echo $date_seperator; ?>"
                    data-date-format="<?php echo  $date_format; ?>"
                    data-min-date="<?php echo $first_post_date; ?>" 
                    data-max-date="<?php echo $last_post_date; ?>"
            >
        </div>
    </div>

    <?php
}



function de_get_reset_input($details, $design, $button_type = 'reset') {
    $buttonName = isset($details['button_name']) ? $details['button_name'] : false;
    $placeholder = (string) ($details['search_placeholder'] ?? 'Reset');

    $input_width = isset($details['width']) ? $details['width']['style'] : false;

    $button = $design['buttons']['reset_button'];

    if($button_type == 'search_button') { 
        $button = isset($design['buttons']['search_button']) ? $design['buttons']['search_button'] : false;
    };

    $button_style = (string) ($button['style'] ?? '');
    if( $button_style == 'secondary') {
        $class = ' button-atom button-atom--secondary bde-button__button';
    } else if( $button_style == 'custom') {
        $class = ' button-atom button-atom--custom bde-button__button';
    } else if($button_style == 'text') {
        $class = ' button-atom button-atom--text bde-button__button';
    } else {
        $class = ' button-atom button-atom--primary bde-button__button';
    }

    $button_class = 'de-reset-ajax-filter-field';
    $button_name = $buttonName ? $buttonName : 'Reset';
    $button_class_2 = 'de-ajax-filter-reset';
    $data_type = 'reset';
    $aria_labelby = 'de-reset-label';
    $button_wrapper_class = 'de-af-input-wrapper-reset';
    
    if($button_type == 'search_button') {
        $button_class = 'de-search-ajax-filter-field';
        $button_class_2 = 'de-ajax-filter-search';
        $button_name = (bool) ($buttonName ?? false);
        if(!$button_name) {
            $button_name = 'Search';
        } else {
            $button_name = $buttonName;
        }
        $data_type = 'search';
        $aria_labelby = 'de-search-label';
        $button_wrapper_class = 'de-af-input-wrapper-search';
    }

    ?>
    <div class="de-af-input-wrapper-reset">
        <button <?php echo $input_width ? 'style="width: '.$input_width.'"' : ''; ?> class="<?php echo $button_class; ?><?php echo $class; ?> <?php echo $button_class_2; ?>" data-type="<?php echo $data_type; ?>" type="button" aria-labelledby='<?php echo  $aria_labelby; ?>'><?php echo $button_name; ?></button>
    </div>
    <?php
}

/**
 * ACF Input
 */

 function de_get_acf_input($details, $options, $design, $redirect = false) {

    if(!function_exists('acf_get_field_groups')) { 
        return;
    }

    $label_main = (string) ($details['filter_label'] ?? 'Label');
    $input_type = (string) ($details['input_type'] ?? 'dropdown');
    $select_label = (string) ($details['select_label'] ?? '');

    $show_all = (bool) ($options['dropdowns_and_inputs']['show_all_option'] ?? false);
    $show_all_text = (string) ($options['dropdowns_and_inputs']['show_all_text'] ?? 'Show All');
    $show_count = (bool) ($details['show_count'] ?? false);
    $show_empty_fields = (bool) ($options['dropdowns_and_inputs']['show_empty_fields'] ?? false);

    // ACF
    $field_object = get_field_object((string) ($details['acf_meta_key'] ?? ''));
    $field_slug = 'acf_' . (string) ($field_object['name'] ?? '');
    $field_name = (string) ($field_object['label'] ?? '');

    $icon = isset($design['inputs']['dropdown']['icon']['icon']) ? $design['inputs']['dropdown']['icon']['icon']['svgCode'] : false;

    //Clear Button 
    $clear_button = (bool) ($options['dropdowns_and_inputs']['show_clear_all_button'] ?? false);
    $clear_icon = isset($design['buttons']['clear_all_button']['icon']) ? $design['buttons']['clear_all_button']['icon']['svgCode'] : false;


    $input_width = isset($details['width']) ? $details['width'] : false;

     // Get The Relation 
    $relation = isset($details['relation']) ? $details['relation'] : false;

    // Single Selection for Buttons
    $single_selection = (bool) ($details['single_selection'] ?? false);

    // Post Type
    $post_type = 'post';

    if (is_archive()) {
        $queried_object = get_queried_object();
        
        if ($queried_object instanceof WP_Post_Type) {
            $post_type = $queried_object->name;
        } else {
            $post_type = get_post_type();
        }
    } 

    if($redirect) {
        if(isset($redirect['post_type']) ? true : false ) {
            $post_type = $redirect['post_type'];
        }
    }

    $options = [];

    if ($field_object) {
        $choices = (array) ($field_object['choices'] ?? []);

        // if($field_object['post_title']) {
        //     $choices = $field_object['post_title'];
        // }

        if(empty($choices)) {

            $args = array( 
                'post_type' => $post_type,
                'posts_per_page' => -1,
            );

            $all_posts = array();
            $existing_slugs = array();

            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ):

                while ( $the_query->have_posts() ): $the_query->the_post();
            
                    $field_value = get_field($field_object['key']);
                    if(isset($field_object['type']) && $field_object['type'] == 'post_object' && !empty($field_value)) {
                       if (is_object($field_value) && isset($field_value->ID)) {
							$slug = $field_value->ID;
							$field_value = get_the_title($field_value->ID);
						} else {
							$slug = $field_value;
							$field_value = get_the_title((int)$field_value);
						}
                    } else {
                        if($input_type === 'number') {
                            $slug =  preg_replace("/[^0-9.]/", "", $field_value);
                        } else {
                            $slug = $field_value;
                        }
                    }
                    
                    if(!empty($field_value) && !in_array($slug, $existing_slugs)) {
                        $options[] = array(
                            'name'  => $field_value,
                            'slug'  => $slug,
                        );
                        $existing_slugs[] = $slug; 
                    }
            
                endwhile;
            
                wp_reset_postdata();
            
            endif;
        } else {
            foreach($choices as $value => $label) {
                $count = 0;
                $label_text = $label;
                    // Show count if it's true
                if($show_count || !$show_empty_fields ) {   
                    $args = array(
                        'meta_key'   => $field_object['name'], 
                        'meta_value' => $value,
                        'post_type'  => $post_type,
                        'post_status' => 'publish',
                    );
                    $query = new WP_Query($args);
                    $count = $query->found_posts;
                }

                if(!$show_empty_fields && $count == 0) {
        
                } else {

                    $options[] = array(
                        'name'  => $label_text,
                        'slug'  => $value,
                        'count' => $count
                    );
                    
                }
            };
        }

        deAjaxFilterFaceted( array(
            'label'             => $label_main,
            'key'               => $field_slug,
            'placeholder'       => $select_label,
            'clear_button'      => $clear_button,
            'clear_icon'        => $clear_icon,
            'dropdown_icon'     => $icon,
            'show_all'          => $show_all,
            'show_all_text'     => $show_all_text, 
            'show_count'        => $show_count,
            'input_type'        => $input_type,
            'options'           => $options, 
            'width'             => $input_width,
            'relation'          => $relation, 
            'number_gap'        => (int) ($details['number_gap'] ?? 20), 
            'min_max_labels'    => isset($details['dropdown_placeholders']) ? $details['dropdown_placeholders'] : false,
            'number_format'     => isset($details['number_format']) ? $details['number_format'] : false,
            'number_type'       => (string) ($details['min_max_type'] ?? 'dropdown'),
            'show_empty_fields' => $show_empty_fields
        ));
    }
 }

 /**
 * Meta Box Input
 */

 function de_get_meta_box_input($details, $options, $design, $redirect = false) {

    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( !is_plugin_active( 'meta-box/meta-box.php' ) ) {
        return;
    }

    $label_main = (string) ($details['filter_label'] ?? 'Label');
    $input_type = (string) ($details['input_type'] ?? 'dropdown');
    $select_label = (string) ($details['select_label'] ?? '');
    $show_count = (bool) ($details['show_count'] ?? false);
    $show_empty_fields = (bool) ($options['dropdowns_and_inputs']['show_empty_fields'] ?? false);

    $show_all = (bool) ($options['dropdowns_and_inputs']['show_all_option'] ?? false);
    $show_all_text = (string) ($options['dropdowns_and_inputs']['show_all_text'] ?? 'Show All');


    $input_width = isset($details['width']) ? $details['width'] : false;

    // Meta Box
    $field_id = $details['meta_box_key'];
    $field_object = rwmb_get_field_settings($field_id);

    $field_slug = 'mb_' . $field_object['id'];
    $field_name = $field_object['name'];

    // Single Selection for Buttons
    $single_selection = (bool) ($details['single_selection'] ?? false);

    if(!$field_object) {
        $field_slug = 'mb_' . $field_id;
        $field_name = $field_id;
    }

    $icon = isset($design['inputs']['dropdown']['icon']['icon']) ? $design['inputs']['dropdown']['icon']['icon']['svgCode'] : false;

    //Clear Button 
    $clear_button = $options['dropdowns_and_inputs']['show_clear_all_button'];
    $clear_icon = $design['buttons']['clear_all_button']['icon']['svgCode'];

    // Get The Relation 
    $relation = isset($details['relation']) ? $details['relation'] : false;

    // Post Type
    $post_type = 'post';

    if (is_archive()) {
        $queried_object = get_queried_object();
        
        if ($queried_object instanceof WP_Post_Type) {
            $post_type = $queried_object->name;
        } else {
            $post_type = get_post_type();
        }
    }

    if($redirect) {
        if($redirect['post_type']) {
            $post_type = $redirect['post_type'];
        }
    }


    $options = [];

    if ($field_object || $field_slug) {
        $choices = $field_object['options'];

        if(empty($choices)) {

            $args = array( 
                'post_type' => $post_type,
                'posts_per_page' => -1,
            );

            $all_posts = array();

            $the_query = new WP_Query( $args );

            if ( $the_query->have_posts() ):

                while ( $the_query->have_posts() ): $the_query->the_post();
            
                    if(!$field_object) {
                        $field_value = get_field($field_id);
                    } else {
                        $field_value = get_field($field_object['id']);
                    }

                    if($input_type === 'number') {
                        $slug =  preg_replace("/[^0-9.]/", "", $field_value);
                    } else {
                       $slug = $field_value;
                    }

                    if(!empty($field_value)) {
                        $options[] = array(
                            'name'  => $field_value,
                            'slug'  => $slug,
                        );
                    }
            
                endwhile;
            
                wp_reset_postdata();
            
            endif;

        }  else {

            foreach($choices as $value => $label) {

                $label_text = $label;
                // Show count if it's true
                if($show_count || !$show_empty_fields ) {
                    
                    $args = array(
                        'meta_key'   => $field_object['id'], 
                        'meta_value' => $value,
                        'post_type'  => $post_type,
                        'post_status' => 'publish',
                    );
                    $query = new WP_Query($args);
                    $count = $query->found_posts;
                }

                if(!$show_empty_fields && $count == 0) {
        
                } else {

                    $options[] = array(
                        'name'  => $label_text,
                        'slug'  => $value,
                        'count' => $count
                    );

                }
            };
        }
        deAjaxFilterFaceted( array(
            'label'             => $label_main,
            'key'               => $field_slug,
            'placeholder'       => $select_label,
            'clear_button'      => $clear_button,
            'clear_icon'        => $clear_icon,
            'dropdown_icon'     => $icon,
            'show_all'          => $show_all,
            'show_all_text'     => $show_all_text, 
            'show_count'        => $show_count,
            'input_type'        => $input_type,
            'options'           => $options,
            'width'             => $input_width,
            'relation'          => $relation,
            'number_gap'        => (int) ($details['number_gap'] ?? 20),
            'min_max_labels'    => $details['dropdown_placeholders'],
            'number_format'     => $details['number_format'], 
            'number_type'       => (string) ($details['min_max_type'] ?? 'dropdown'),
            'single_select'     => $single_selection,
            'show_empty_fields' => $show_empty_fields
        ));

    }
}



function deAjaxFormatNumber($number, $prepend = false, $append = false, $decimals = false, $decimal_separator = false, $thousands_separator = false) {

    $value = (float)$number; // Convert the input to a float
    if($decimals !== false || $decimal_separator !== false || $thousands_separator !== false) {
        $value = number_format($value, $decimals, $decimal_separator, $thousands_separator);
    }

    if($prepend) {
        $value = $prepend . $value;
    }

    if($append) {
        $value = $value . $append;
    }

    return $value;
}

function deAjaxFilterFaceted($details) {
    $label = (string) ($details['label'] ?? '');
    $select_label = (string) ($details['select_label'] ?? '');
    $placeholder = $details['placeholder'];
    $key = $details['key'];

    // Icons
    $clear = $details['clear_button'];
    $clear_icon = $details['clear_icon'];
    $dropdown_icon =  $details['dropdown_icon'];

    // Show All & Count
    $show_all = $details['show_all'];
    $show_all_text = $details['show_all_text'];
    $show_count = $details['show_count'];
    $show_empty_fields = $details['show_empty_fields'];

    //Inputs 
    $input_type = $details['input_type'];

    //Numbers
    $number_gap = (int) ($details['number_gap'] ?? 10);

    $min_label = (string) ($details['min_max_labels']['min_placeholder'] ?? 'Min');
    $max_label = (string) ($details['min_max_labels']['max_placeholder'] ?? 'Max');

    $options = $details['options'];
   

    $child_options = (array) ($details['child_options'] ?? []);

    $relation = isset($details['relation']) ? $details['relation'] : false;

    if($input_type == 'radio') {
        $role = 'radiogroup';
    } else if($input_type == 'radio') {
        $role = 'checkboxes';
    } else if ($input_type == 'buttons') {
        $role = 'group';
    } else {
        $role = 'select';
    }
    
    $number_type = (string) ($details['number_type'] ?? 'dropdown');
    
    // For Min & Max Dropdowns
    if($input_type == 'number') {

        if($number_type == 'range') {

                $label = (string) ($details['label'] ?? '');
                $placeholder = (string) ($details['search_placeholder'] ?? 'Search');

                $slugs = array_column($options, 'slug');
                if(!empty($slugs)) {
                    $lowest = min($slugs);
                    $highest = max($slugs);
                } else {
                    $lowest = 0;
                    $highest = 10000;
                }


                if(is_numeric($lowest) && is_numeric($number_gap)) {
                    $min_price = $lowest;
                    $lowest = floor($lowest / $number_gap) * $number_gap;
                } else {
                    $lowest = 0; // Default values if we can't get number
                    $min_price = $lowest;
                }
                if(is_numeric($highest) && is_numeric($number_gap)) {
                    $max_price = $highest;
                    $highest = ceil($highest / $number_gap) * $number_gap;
                } else {
                    $highest = 1000; // Default values if we can't get number
                    $max_price = $highest;
                }

                ?>
                <div 
                    class="de-af-selection-wrapper de-af-price de-af-number-range" 
                    data-prepend="<?php echo (string) ($details['number_format']['prepend'] ?? ''); ?>" 
                    data-append="<?php echo (string) ($details['number_format']['append'] ?? ''); ?>" 
                    data-decimals="<?php echo (int) ($details['number_format']['decimals'] ?? 0); ?>"
                    data-decimal-sep="<?php echo (string) ($details['number_format']['decimal_separator'] ?? ''); ?>"
                    data-thousand="<?php echo (string) ($details['number_format']['thousand_separator'] ?? ''); ?>"
                    data-min-key="<?php echo str_replace("mb_", "mb_min_", str_replace("acf_", "acf_min_", $key)); ?>"
                    data-max-key="<?php echo str_replace("mb_", "mb_max_", str_replace("acf_", "acf_max_", $key)); ?>"
                    <?php 
                        if (is_array($details['width']) && isset($details['width']['style'])) {
                            echo 'style="width: ' . $details['width']['style'] . '" ';
                        } elseif (!empty($details['width'])) {
                            echo 'style="width: ' . $details['width'] . '" ';
                        }
                    ?>
                >
                    <label for="<?php echo $key; ?>"><?php echo $label; ?></label>
                    <div class="de-af-input-for-range" data-select-label='<?php echo $select_label; ?>'>
                        <div class="de-slider-wrapper">
                            <div class="de-slider">
                                <div class="de-progress"></div>
                            </div>
                            <div class="de-range-input">
                                <input type="range" class="de-range-min" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" value="<?php echo $min_price ?>" step="<?= $number_gap; ?>">
                                <input type="range" class="de-range-max" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" value="<?php echo $max_price ?>" step="<?= $number_gap; ?>">
                            </div>
                            <div class="de-price-input">
                                <div class="de-price-min"><span class="de-price-number"><?php echo deAjaxFormatNumber($min_price, (string) ($details['number_format']['prepend'] ?? ''), (string) ($details['number_format']['append'] ?? ''), (int) ($details['number_format']['decimals'] ?? ''), (string) ($details['number_format']['decimal_separator'] ?? ''), (string) ($details['number_format']['thousand_separator'] ?? '')); ?></span></div>
                                <span class="de-seperator">-</span>
                                <div class="de-price-max"><span class="de-price-number"><?php echo deAjaxFormatNumber($max_price, (string) ($details['number_format']['prepend'] ?? ''), (string) ($details['number_format']['append'] ?? ''), (int) ($details['number_format']['decimals'] ?? ''), (string) ($details['number_format']['decimal_separator'] ?? ''), (string) ($details['number_format']['thousand_separator'] ?? '')); ?></span></div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
        } else {

            $slugs = array_column($options, 'slug');
            if(!empty($slugs)) {
                $lowest = min($slugs);
                $highest = max($slugs);
            }  else {
                $lowest = 0;
                $highest = 10000;
            }

            if(is_numeric($lowest) && is_numeric($number_gap)) {
                $lowest = floor($lowest / $number_gap) * $number_gap;
            } else {
                $lowest = 0; // Default values if we can't get number
            }
            if(is_numeric($highest) && is_numeric($number_gap)) {
                $highest = ceil($highest / $number_gap) * $number_gap;
            } else {
                $highest = 1000; // Default values if we can't get number
            }
            
            ?>
            <div class="de-af-selection-wrapper de-af-number" data-min="<?php echo $lowest; ?>" data-max="<?php echo $highest; ?>" <?php echo $details['width'] ? 'style="width: '. $details['width']['style'].' "' : ''; ?>>
                <div class="de-af-selection-wrapper de-af-number-dropdown de-af-dropdown de-af-min-dropdown">
                    <label for="<?php echo $key . '-min'; ?>"><?php echo $min_label; ?></label>
                    <div class="de-af-input">
                        <input 
                            type="text" 
                            id="<?php echo $key; ?>-min" 
                            aria-expanded="false"
                            data-key="<?php echo str_replace("mb_", "mb_min_", str_replace("acf_", "acf_min_", $key)); ?>"
                            placeholder="<?php echo $min_label; ?>"
                            readonly="readonly"
                        >
                        <?php if($clear) { ?>
                            <button class="de-af-clear-icon" aria-label="Clear Selections"><?php echo $clear_icon; ?></button>
                        <?php } ?>
                        <button class="de-af-dropdown-icon" aria-label="Open Dropdown"><?php echo $dropdown_icon; ?></button>
                    </div>
                    <div class="de-af-dropdown-box">
                        <?php if($show_all) { ?>
                        <div tabindex='0' class='de-af-otpion' role='option' data-value='de-all'>
                            <?php echo $show_all_text; ?>
                        </div>
                        <?php } ?>

                        <?php 
                    for ($price = $lowest; $price <= $highest - $number_gap; $price += $number_gap) {
                            $slug = floor($price); // Convert price to slug format
                            ?>
                            <div tabindex='0' class="de-af-otpion" role="option" data-value="<?php echo $slug; ?>">
                                <?php if($input_type == 'dropdown_checkboxes') { ?>    
                                    <div class="de-af-checkbox"></div>
                                <?php } ?>
                                <span>
                                    <div class="de-af-text"><?php echo deAjaxFormatNumber(floor($price), (string) ($details['number_format']['prepend'] ?? ''), (string) ($details['number_format']['append'] ?? ''), (int) ($details['number_format']['decimals'] ?? 0), (string) ($details['number_format']['decimal_separator'] ?? ''), (string) ($details['number_format']['thousand_separator'] ?? '')); ?></div>
                                    <?php if($show_count) { ?>
                                        <div class="de-af-count">(count-placeholder)</div> <!-- Adjust as needed -->
                                    <?php }?>
                                </span>
                            </div>
                            <?php
                        }

                        ?>
                    </div>
                </div>

                <div class="de-af-selection-wrapper de-af-number-dropdown de-af-dropdown de-af-max-dropdown">
                    <label for="<?php echo $key . '-max'; ?>"><?php echo $max_label; ?></label>
                    <div class="de-af-input">
                            <input 
                                type="text" 
                                id="<?php echo $key; ?>-max" 
                                aria-expanded="false"
                                data-key="<?php echo str_replace("mb_", "mb_max_", str_replace("acf_", "acf_max_", $key)); ?>"
                                placeholder="<?php echo $max_label; ?>"
                                readonly="readonly"
                            >
                            <?php if($clear) { ?>
                                <button class="de-af-clear-icon" aria-label="Clear Selections"><?php echo $clear_icon; ?></button>
                            <?php } ?>
                            <button class="de-af-dropdown-icon" aria-label="Open Dropdown"><?php echo $dropdown_icon; ?></button>
                        </div>
                        <div class="de-af-dropdown-box">
                            <?php if($show_all) { ?>
                            <div tabindex='0' class='de-af-otpion' role='option' data-value='de-all'>
                                <?php echo $show_all_text; ?>
                            </div>
                            <?php } ?>

                            <?php 
                        
                        for ($price = $lowest + $number_gap; $price <= $highest; $price += $number_gap) {
                                $slug = ceil($price);
                                ?>
                                <div tabindex='0' class="de-af-otpion" role="option" data-value="<?php echo $slug; ?>">
                                    <?php if($input_type == 'dropdown_checkboxes') { ?>    
                                        <div class="de-af-checkbox"></div>
                                    <?php } ?>
                                    <span>
                                        <div class="de-af-text"><?php echo deAjaxFormatNumber(ceil($price), (string) ($details['number_format']['prepend'] ?? ''), (string) ($details['number_format']['append'] ?? ''), (int) ($details['number_format']['decimals'] ?? 0), (string) ($details['number_format']['decimal_separator'] ?? ''), (string) ($details['number_format']['thousand_separator'] ?? '')); ?></div>
                                        <?php if($show_count) { ?>
                                            <div class="de-af-count">(count-placeholder)</div> <!-- Adjust as needed -->
                                        <?php }?>
                                    </span>
                                </div>
                                <?php
                            }

                            ?>
                        </div>

                </div>
            
            </div>

            <?php
        }

    } else if($input_type == 'radio') {
            ?>
            <div role="radiogroup" class="de-af-input-radio" aria-labelledby="<?php echo $key; ?>" data-relation="<?php echo $relation; ?>" data-input="<?php echo $input_type; ?>">
                <label for="<?php echo $key; ?>"><?php echo $label; ?></label>
                <div id="<?php echo $key; ?>" class="de-af-radio-box">
                    <?php if($show_all) { ?>
                    <div 
                        id="<?php echo $option['slug'] ?>" 
                        tabindex='0' 
                        class="de-af-radio active" 
                        role="radio" 
                        data-value="de-all"
                        aria-checked="true"
                        aria-labelledby="de-all-label"
                    > 
                    <div class="de-af-checkbox"></div>
                    <div id="<?php echo $option['slug'] ?>-label" class="de-af-text"><?php echo $show_all_text; ?></div>
                    </div>
                    <?php 
                    }
                    foreach ($options as $option) { ?>
                        <div 
                            id="<?php echo $option['slug'] ?>" 
                            tabindex='0' class="de-af-radio" 
                            role="radio" 
                            data-value="<?php echo $option['slug'] ?>"
                            aria-checked="false"
                            aria-labelledby="<?php echo $option['slug']; ?>-label"
                        >   
                            <div class="de-af-checkbox"></div>
                            <span>
                                <div id="<?php echo $option['slug'] ?>-label" class="de-af-text"><?php echo $option['name'] ?></div>
                                <?php if($show_count) { ?>
                                <div class="de-af-count">(<?php echo $option['count']; ?>)</div>
                                <?php } ?>
                            </span>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <?php 

    } else if($input_type == 'checkboxes') {

        ?>
        <div role="group" class="de-af-input-checkboxes" aria-labelledby="<?php echo $key; ?>" data-relation="<?php echo $relation; ?>" data-input="<?php echo $input_type; ?>">
            <label for="<?php echo $key; ?>"><?php echo $label; ?></label>
            <div id="<?php echo $key; ?>" class="de-af-checkbox-box">
                <?php if($show_all) { ?>
                <div 
                    id="<?php echo $option['slug'] ?>" 
                    tabindex='0' 
                    class="de-af-checkbox-option active" 
                    role="checkbox"
                    data-value="de-all"
                    aria-checked="true"
                    aria-labelledby="de-all-label"
                > 
                <div class="de-af-checkbox"></div>
                <div id="<?php echo $key ?>-label" class="de-af-text"><?php echo $show_all_text; ?></div>
                </div>
                <?php 
                }
                foreach ($options as $option) { ?>
                    <div 
                        id="<?php echo $option['slug'] ?>" 
                        tabindex='0' 
                        class="de-af-checkbox-option" 
                        role="checkbox" 
                        data-value="<?php echo $option['slug'] ?>"
                        aria-checked="false"
                        aria-labelledby="<?php echo $option['slug']; ?>-label"
                    >   
                        <div class="de-af-checkbox"></div>
                        <span>
                            <div id="<?php echo $option['slug'] ?>-label" class="de-af-text"><?php echo $option['name'] ?></div>
                            <?php if($show_count) { ?>
                            <div class="de-af-count">(<?php echo $option['count']; ?>)</div>
                        </span>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php 
    
    } else if($input_type == 'buttons') {

        ?>
        <div role="group" class="de-af-input-button-layout" aria-labelledby="<?php echo $key; ?>" data-single-select="<?php echo $details['single_select'] ? 'true' : 'false'; ?>" data-relation="<?php echo $relation; ?>" data-input="<?php echo $input_type; ?>" <?php echo $details['width'] ? 'style="width: '. $details['width']['style'].' "' : ''; ?>>
            <label for="<?php echo $key; ?>"><?php echo $label; ?></label>
            <div id="<?php echo $key; ?>" class="de-af-button-box">
                <?php if($show_all) { ?>
                <div 
                    id="<?php echo $option['slug'] ?>" 
                    tabindex='0' 
                    class="de-af-button-option active" 
                    role="checkbox"
                    data-value="de-all"
                    aria-checked="true"
                    aria-labelledby="de-all-label"
                > 
                <div id="<?php echo $key ?>-label" class="de-af-text"><?php echo $show_all_text; ?></div>
                </div>
                <?php 
                }
                foreach ($options as $option) { ?>
                    <div 
                        id="<?php echo $option['slug'] ?>" 
                        tabindex='0' 
                        class="de-af-button-option" 
                        role="checkbox" 
                        data-value="<?php echo $option['slug'] ?>"
                        aria-checked="false"
                        aria-labelledby="<?php echo $option['slug']; ?>-label"
                    >   
                        <span>
                            <div id="<?php echo $option['slug'] ?>-label" class="de-af-text"><?php echo $option['name'] ?></div>
                            <?php if($show_count) { ?>
                            <div class="de-af-count">(<?php echo $option['count']; ?>)</div>
                            <?php } ?>
                        </span>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php 
    
    }  else {
        $child_filter = isset($child_options['child_filter']) ? true : false;
        $show_children = (bool) ($child_options['show_children'] ?? false);
        ?>
        <div class="de-af-selection-wrapper de-af-dropdown" data-relation="<?php echo $relation; ?>" data-child="<?=  $child_filter ? 'true' : 'false'; ?>" <?php echo $details['width'] ? 'style="width: '. $details['width']['style'].' "' : ''; ?>>
            <label for="<?php echo $key; ?>"><?php echo $label; ?></label>
            <div class="de-af-input">
                <input 
                    type="text" 
                    id="<?php echo $key; ?>" 
                    aria-expanded="false"
                    data-key="<?php echo $key; ?>"
                    placeholder="<?php echo $placeholder; ?>"
                    readonly="readonly"
                >
                <?php if($clear) { ?>
                    <button class="de-af-clear-icon" aria-label="Clear Selections"><?php echo $clear_icon; ?></button>
                <?php } ?>
                <button class="de-af-dropdown-icon" aria-label="Open Dropdown"><?php echo $dropdown_icon; ?></button>
            </div>
            <div class="de-af-dropdown-box <?php if($input_type == 'dropdown_checkboxes') echo 'has-checkboxes' ?>">
                <?php if($show_all) { ?>
                <div tabindex='0' class='de-af-otpion' role='option' data-value='de-all'>
                    <?php echo $show_all_text; ?>
                </div>
                <?php } ?>

                <?php 
                if($child_filter) {
                    foreach ($options as $option) {
                            echo '<div class="de-child-of-parent" data-parent="'.$option['slug'].'">';
                                echo '<div class="de-dropdown-parent-heading">'.$option['name'].'</div>';
                                $childrenOptions = (array) ($option['children'] ?? []);
                                foreach ($childrenOptions as $child) { 
                                    if(!$show_empty_fields && $child['count'] == 0) {
                                    } else { ?>
                                        <div tabindex='0' class="de-af-otpion" role="option" data-parent="<?php echo $option['slug'] ?>" data-value="<?php echo $child['slug'] ?>">
                                            <?php if($input_type == 'dropdown_checkboxes') { ?>    
                                            <div class="de-af-checkbox"></div>
                                            <?php } ?>
                                            <span>
                                                <div class="de-af-text"><?php echo $child['name'] ?></div>
                                                <?php if($show_count) { ?>
                                                <div class="de-af-count">(<?php echo $child['count']; ?>)</div>
                                                <?php }?>
                                            </span>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                    <?php 
                            echo '</div>';
                    } 
                } else {
                    foreach ($options as $option) { 
                        if($show_children) { ?>
                            <div tabindex='0' class="de-af-otpion" role="option" data-value="<?php echo $option['slug'] ?>">
                                <?php if($input_type == 'dropdown_checkboxes') { ?>    
                                <div class="de-af-checkbox"></div>
                                <?php } ?>
                                <span>
                                    <div class="de-af-text"><?php echo $option['name'] ?></div>
                                    <?php if($show_count) { ?>
                                    <div class="de-af-count">(<?php echo $option['count']; ?>)</div>
                                    <?php }?>
                                </span>
                            </div>
                            <?php
                            foreach ($option['children'] as $child) { ?>
                                    <div tabindex='0' class="de-af-otpion de-child" role="option" data-parent="<?php echo $option['slug'] ?>" data-value="<?php echo $child['slug'] ?>">
                                        <?php if($input_type == 'dropdown_checkboxes') { ?>    
                                        <div class="de-af-checkbox"></div>
                                        <?php } ?>
                                        <span>
                                            <div class="de-af-text"><?php echo $child['name'] ?></div>
                                            <?php if($show_count) { ?>
                                            <div class="de-af-count">(<?php echo $child['count']; ?>)</div>
                                            <?php }?>
                                        </span>
                                    </div>
                                <?php }
                        } else {
                        ?>
                            <div tabindex='0' class="de-af-otpion" role="option" data-value="<?php echo $option['slug'] ?>">
                                <?php if($input_type == 'dropdown_checkboxes') { ?>    
                                <div class="de-af-checkbox"></div>
                                <?php } ?>
                                <span>
                                    <div class="de-af-text"><?php echo $option['name'] ?></div>
                                    <?php if($show_count) { ?>
                                    <div class="de-af-count">(<?php echo $option['count']; ?>)</div>
                                    <?php }?>
                                </span>
                            </div>
                    <?php 
                        }
                    } 
                }
                ?>
            </div>
        </div>
        <?php

    }
};


function de_get_price_input($details, $design) {
    
    if (!class_exists('WooCommerce')) return;

        $label = (string) ($details['filter_label'] ?? 'Price');
        $placeholder = (string) ($details['search_placeholder'] ?? 'Search Price');

        // Get Prices for Woo Min & Max
        $prices = de_get_min_max_product_price();
        $min_price = floor($prices->min_price / 10) * 10;
        $max_price = ceil($prices->max_price / 10) * 10;

        $symbol = get_woocommerce_currency_symbol();

        ?>
        <div class="de-af-selection-wrapper de-af-price" <?php echo isset($details['width']) ? 'style="width: '. $details['width']['style'].' "' : ''; ?>>
            <label for="de-af-price-%%ID%%"><?php echo $label; ?></label>
            <div class="de-af-input-for-range"'>
                <div class="de-slider-wrapper">
                    <div class="de-slider">
                        <div class="de-progress"></div>
                    </div>
                    <div class="de-range-input">
                        <input type="range" class="de-range-min" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" value="<?php echo $min_price ?>" step="10">
                        <input type="range" class="de-range-max" min="<?php echo $min_price ?>" max="<?php echo $max_price ?>" value="<?php echo $max_price ?>" step="10">
                    </div>
                    <div class="de-price-input">
                        <div class="de-price-min"><?= $symbol; ?><span class="de-price-number"><?php echo $min_price ?></span></div>
                        <span class="de-seperator">-</span>
                        <div class="de-price-max"><?= $symbol; ?><span class="de-price-number"><?php echo $max_price ?></span></div>
                    </div>
                </div>
            </div>
        </div>
        <?php
}

function de_get_min_max_product_price() {
    global $wpdb;
    $results = $wpdb->get_row( "
        SELECT min(meta_value + 0) as min_price, max(meta_value + 0) as max_price
        FROM {$wpdb->postmeta}
        WHERE meta_key='_price'
    " );
    return $results;
}

function de_get_rating_input($details, $options) {
    if (!class_exists('WooCommerce')) return;

    $label = (string) ($details['filter_label'] ?? 'Label');

    $show_empty_fields = (bool) ($options['show_empty_fields'] ?? false);
    $show_count = (bool) ($details['show_count'] ?? false);

    $counts = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0);

    // Fetch all reviews
    $args = array(
        'status' => 'approve',
        'type' => 'review'
    );

    $reviews = get_comments($args);

    $star = '<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon id="Path" points="12 0.587 15.668 8.155 24 9.306 17.936 15.134 19.416 23.413 12 19.446 4.583 23.413 6.064 15.134 0 9.306 8.332 8.155"></polygon></svg>';
    $empty_star = '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.6 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>'; 

    foreach ($reviews as $review) {
        $rating = (int)get_comment_meta($review->comment_ID, 'rating', true);
        if ($rating && isset($counts[$rating])) {
            $counts[$rating]++;
        }
    }
    ?>
    <div role="group" class="de-af-input-checkboxes de-af-rating"  <?php echo isset($details['width']) ? 'style="width: '. $details['width']['style'].' "' : ''; ?> aria-labelledby="rating" data-input="checkbox">
        <label for="<?php echo $label; ?>"><?php echo $label; ?></label>
        <div id="<?php echo $label; ?>" class="de-af-checkbox-box">
            <?php for ($i = 5; $i >= 1; $i--) { 
                if($counts[$i] !== 0) {
                ?>
                <div
                    id="<?php echo 'star-'.$i; ?>"
                    tabindex='0'
                    class="de-af-checkbox-option"
                    role="checkbox"
                    data-value="<?php echo $i; ?>"
                    aria-checked="false"
                    aria-labelledby="<?php echo 'star-'.$i; ?>-label"
                >
                    <div class="de-af-checkbox"></div>
                    <div class="de-stars <?php echo 'star-'.$i; ?>">
                            <?php echo $star; ?>
                            <?php echo $star; ?>
                            <?php echo $star; ?>
                            <?php echo $star; ?>
                            <?php echo $star; ?>
                    </div>
                    <span>
                        <div id="<?php echo 'star-'.$i; ?>-label" class="de-af-text"><?php echo $i.' Star'.($i > 1 ? 's' : ''); ?></div>
                        <?php if($show_count) { ?>
                            <div class="de-af-count">(<?php echo $counts[$i]; ?>)</div>
                        <?php } ?>
                    </span>
                </div>
            <?php }
            } ?>
        </div>
    </div>
    <?php
}

function de_get_sort_input($details, $options, $design) {
    if (!class_exists('WooCommerce')) return;

    $label = (string) ($details['filter_label'] ?? 'Label');
    $select_label = (string) ($details['select_label'] ?? '');
    $dropdown_icon =  isset($options['dropdown_icon']) ? $options['dropdown_icon'] : false;
    $clear = (bool) ($options['clear_button'] ?? false);


    $show_all = (bool) ($options['dropdowns_and_inputs']['show_all_option'] ?? false);
    $show_all_text = (string) ($options['dropdowns_and_inputs']['show_all_text'] ?? 'Show All');

    $icon = isset($design['inputs']['dropdown']['icon']['icon']) ? $design['inputs']['dropdown']['icon']['icon']['svgCode'] : false;

    //Clear Button 
    $clear_button = (bool) ($options['dropdowns_and_inputs']['show_clear_all_button'] ?? false);
    $clear_icon = isset($design['buttons']['clear_all_button']['icon']) ? $design['buttons']['clear_all_button']['icon']['svgCode'] : false;


    $includes = (array) ($details['include'] ?? []);
    $options = array();
    foreach ($includes as $include) {
        switch ($include) {
            case 'htl':
                $options[] = array(
                    'slug' => 'price_desc',
                    'name' => isset($details['sort_labels']['price_high_to_low']) ? $details['sort_labels']['price_high_to_low'] : 'Price: High to Low',
                    'count' => null,
                );
                break;
            case 'lth':
                $options[] = array(
                    'slug' => 'price_asc',
                    'name' => isset($details['sort_labels']['price_low_to_high']) ? $details['sort_labels']['price_low_to_high'] : 'Price: Low to High',
                    'count' => null,
                );
                break;
            case 'date':
                $options[] = array(
                    'slug' => 'date_desc',
                    'name' => isset($details['sort_labels']['date']) ? $details['sort_labels']['date'] : 'Date (Newest)',
                    'count' => null,
                );
                break;
            case 'popularity':
                $options[] = array(
                    'slug' => 'popularity_desc',
                    'name' => isset($details['sort_labels']['popularity']) ? $details['sort_labels']['popularity'] : 'Popularity (Sales)',
                    'count' => null,
                );
                break;
        }
    }

    ?>
    <div class="de-af-selection-wrapper de-af-dropdown" <?php echo isset($details['width']) ? 'style="width: '. $details['width']['style'].' "' : ''; ?>>
            <label for="de-sort-%%ID%%"><?php echo $label; ?></label>
            <div class="de-af-input">
                <input 
                    type="text" 
                    id="de-sort-%%ID%%" 
                    aria-expanded="false"
                    data-key="sort"
                    placeholder="<?php echo $select_label; ?>"
                    readonly="readonly"
                >
                <?php if($clear_button) { ?>
                    <button class="de-af-clear-icon" aria-label="Clear Selections"><?php echo $clear_icon; ?></button>
                <?php } ?>
                <button class="de-af-dropdown-icon" aria-label="Open Dropdown"><?php echo $icon; ?></button>
            </div>
            <div class="de-af-dropdown-box">
                <?php if($show_all) { ?>
                    <div tabindex='0' class='de-af-otpion' role='option' data-value='de-all'>
                        <?php echo $show_all_text; ?>
                    </div>
                <?php } ?>

                <?php 
                foreach ($options as $option) { ?>
                        <div tabindex='0' class="de-af-otpion" role="option" data-value="<?php echo $option['slug'] ?>">
                            <span>
                                <div class="de-af-text"><?php echo $option['name'] ?></div>
                            </span>
                        </div>
                <?php } ?>
            </div>
        </div>
    <?php

}