<?php

$de_tax = (string) ($propertiesData['content']['main_options']['taxonomy_type'] ?? 'category');
$de_link = (bool) ($propertiesData['content']['main_options']['icnlude_link'] ?? false);
$de_link_new = (bool) ($propertiesData['content']['main_options']['enable_links'] ?? false);

if ($de_link_new) {
    $de_link = (bool) ($propertiesData['content']['main_options']['enable_links'] ?? false);
} else {
   // do nothing
}

$de_tag = (string) ($propertiesData['content']['main_options']['tag'] ?? 'p');

$de_order = isset($propertiesData['content']['order']['order']) ? $propertiesData['content']['order']['order'] : false;

if ($de_tax == 'categories') {
    $categories = get_categories( array(
        'order' => $de_order ? $de_order : 'ASC',
        'orderby' => 'name'
    ) );
    
    foreach ( $categories as $category ) {
        if ($de_link) {
            printf( '<a class="de-taxomony de-link" href="%1$s">%2$s</a>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_html( $category->name )
            );
        } else {
            $de_tag = $de_tag ? $de_tag : 'p' ;
            echo '<'.$de_tag.' class="de-taxomony">' . esc_html($category->name) . '</'.$de_tag.'>';
        }
    }
}

if ($de_tax == 'tags') {
    $tags = get_tags( array(
        'order' => $de_order ? $de_order : 'ASC',
        'orderby' => 'name'
    ) );
    
    foreach ( $tags as $tag ) {
        if ($de_link) {
            printf( '<a class="de-taxomony de-link" href="%1$s">%2$s</a>',
                esc_url( get_category_link( $tag->term_id ) ),
                esc_html( $tag->name )
            );
        } else {
            $de_tag = $de_tag ? $de_tag : 'p' ;
            echo '<'.$de_tag.' class="de-taxomony">' . esc_html($tag->name) . '</'.$de_tag.'>';
        }
    }
}