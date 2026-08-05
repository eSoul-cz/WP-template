<?php


function de_get_taxonomies($taxonomy, $order = 'ASC', $orderby = 'name', $empty = 0, $count = false) {
    
    $args = array(
        'taxonomy'      => $taxonomy,
        'order'         => $order,
        'orderby'       => $orderby,
        'show_count'    => 0,
        'pad_counts'    => 0,
        'hierarchical'  => 1,
        'title_li'      => '',
        'hide_empty'    => $empty
    );

    $product_categories = get_categories( $args );


    foreach( $product_categories as $category ) {
        ?> <div class="de-option" role="option" aria-selected="false" value="<?php echo $category->slug; ?>"tabindex="0"><?php echo $category->name; ?><?php echo $count ? '<span class="tax-count">('.$category->count.')</span>' : '' ;?></div> <?php
    }

}

function de_get_taxonomies_for_element($params) {

    $defaults = array(
        'taxonomy' => 'category',
        'de_link',
        'de_tag',
        'include_description',
        'de_order',
        'de_empty',
        'de_parent',
        'de_exclude_ids',
        'de_include_nested_children' => [],
        //'depth' => 0,
        'de_enable_dropdown' => false,
        'de_dropdown_icon',
        'de_active_ids' => false, 
        'only_post_tax' => false, 
        'include_count' => false, 
        'count_string_before' => '',
        'count_string_after' => '',
    );

    $params = array_merge($defaults, $params);

    if ($params['de_exclude_ids']) {
        $de_exclude_ids = str_replace(' ', '', explode(",", $params['de_exclude_ids']));;
    } else {
        $de_exclude_ids = '';
    }

    if ($params['de_active_ids']) {
        $de_active_ids = str_replace(' ', '', explode(",", $params['de_active_ids']));;
    } else {
        $de_active_ids = array();
    }

    if ($params['depth']) {
       $depth = -1;
    } else {
        $depth = 0;
    }

    $de_empty = $params['de_empty'] ? 1 : 0;
    $de_tag = $params['de_tag'] ? $params['de_tag'] : 'p';
    $de_parent = $params['de_parent'] ? 0 : '';
        
    $args = array(
        'order'   =>  $params['de_order'] ? $params['de_order'] : 'ASC',
        'taxonomy'     => $params['taxonomy'],
        'hide_empty' =>  $de_empty,
        'parent' =>  $de_parent,
        'exclude' => $de_exclude_ids,
        'depth' => $params['de_include_nested_children']
    );

    $post_id = get_the_ID();

	// Check if it's an archive page
	if (is_archive() && !$params['only_post_tax']) {
		$queried_object = get_queried_object();

		if ($queried_object instanceof WP_Term) {
			$current_post_terms = $queried_object->term_id;
		}
	} else {
		$current_post_terms = wp_get_post_terms($post_id, $params['taxonomy'], array('fields' => 'ids'));
	}

    if (!is_array($current_post_terms)) {
        $current_post_terms = array(); // Ensure $current_post_terms is always an array even if empty or errors occur
    }

    if ($params['only_post_tax']) {
        $args['include'] = $current_post_terms;
    }

    $categories = get_categories( $args );

    $category = get_category( get_query_var( 'cat' ) );
    if (is_wp_error($category) || !$category) {
        $cat_id = '';
    } else {
        $cat_id = $category->cat_ID;
    }

    $current_archieve_obj = get_queried_object();
    $current_archieve = (is_object($current_archieve_obj) && property_exists($current_archieve_obj, 'term_id')) ? $current_archieve_obj->term_id : [];


    foreach( $categories as $category ) {

        $cat_id_loop = $category->cat_ID;
        $parent_id = 0; // Initilliaze parent ID

        $children = get_categories(array(
            'taxonomy' => $category->taxonomy,
            'parent' => $category->term_id,
            'hide_empty' => true,
            'exclude' => $de_exclude_ids
        ));
        
        if ($children && $params['de_include_nested_children']) {
            foreach ($children as $child) {
                $active_child =  ($cat_id == $child->cat_ID) ? true : false;
                $parent_id = ($cat_id_loop == $child->category_parent && $active_child ) ? $child->category_parent : 0;
            }
        }

        if (in_array(strval($cat_id_loop), $de_active_ids)) {
            $active_element = ' active';
        } else if ($cat_id == $cat_id_loop || $parent_id == $cat_id_loop || $current_archieve == $cat_id_loop || in_array(strval($cat_id_loop), $current_post_terms) ) {
            $active_element = ' active';
        } else {
            $active_element = '';
        }

        if ($params['de_link']) {
            ?>
            <div class="de-taxonomy-container<?php echo $active_element; ?>">
                <?php if($children && $params['de_enable_dropdown'] && $params['de_include_nested_children']) {
                echo '<div class="de-dropdown">'.$params['de_dropdown_icon'].'</div>';
                } ?>
                <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
                    <<?php echo $de_tag; ?> class="de-taxonomy">
                    <?php echo esc_html( $category->name ); ?>
                    <?php if ($params['include_count']) {
                        echo '<span class="de-taxonomy-count">' . esc_html($params['count_string_before'] . $category->count . $params['count_string_after']) . '</span>';
                    } ?>
                    </<?php echo $de_tag; ?>>
                    <?php 

                    if($params['include_description'] && $category->description) {
                        ?>
                            <p class="de-taxonomy-description"><?php echo esc_html($category->description); ?></p>   
                        <?php
                    } ?>
                </a>
                <?php
                if ($children && $params['de_include_nested_children']) {
                    ?>  
                    <div class="de-taxonomy-child-wrapper">
                    <?php
                    foreach ($children as $child) {
                        $active_child =  ($cat_id == $child->cat_ID) ? ' active' : '';
                        ?>
                        <a class="de-taxonomy-child <?php echo  $active_child; ?>" href="<?php echo esc_url( get_category_link( $child->term_id ) ); ?>">
                            <?php echo $child->name; ?>
                            <?php if ($params['include_count']) {
                                echo '<span class="de-taxonomy-count">' . esc_html($params['count_string_before'] . $category->count . $params['count_string_after']) . '</span>';
                            } ?>
                        </a>
                    <?php
                    }
                    ?>
                    </div>
                    <?php
                } ?>
            </div>
            <?php
        } else {
            echo '<div class="de-taxonomy-container">';
            if($children && $params['de_enable_dropdown']) {
                echo '<div class="de-dropdown">'.$params['de_dropdown_icon'].'</div>';
            }
            ?>
                <<?php echo $de_tag; ?> class="de-taxonomy">
                <?php echo esc_html($category->name);
                if ($params['include_count']) {
                    echo '<span class="de-taxonomy-count">' . esc_html($params['count_string_before'] . $category->count . $params['count_string_after']) . '</span>';
                } ?>
                </<?php echo $de_tag; ?>>
            <?php
            
            if($params['include_description'] && $category->description) {
                ?>
                    <p class="de-taxonomy-description"><?php echo esc_html($category->description); ?></p>   
                <?php
            }
            if ($children && $params['de_include_nested_children'] && $params['de_include_nested_children']) {
                foreach ($children as $child) {
                    $active_child =  ($cat_id == $child->cat_ID) ? ' active' : '';
                    echo '<p class="de-taxonomy-child '.$active_child.'">';
                    echo $child->name;
                    if ($params['include_count']) {
                        echo '<span class="de-taxonomy-count">' . esc_html($params['count_string_before'] . $category->count . $params['count_string_after']) . '</span>';
                    };
                    echo '</p>';
                }
            }
            echo '</div>';
        }
    }
}