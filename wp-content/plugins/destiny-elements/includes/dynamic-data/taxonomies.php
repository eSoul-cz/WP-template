<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_taxonomies',
        'Breakdance\AjaxEndpoints\getTaxonomiesDestiny',
        'edit',
        true
    );
});

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_category_orderby_options',
        'Breakdance\AjaxEndpoints\getCategoryOrderByOptions',
        'edit',
        true
    );
});

function getTaxonomiesDestiny()
{
    // Define the excluded taxonomy names
    $excluded_names = [
        'nav_menu',
        'post_format',
        'wp_theme',
        'wp_template_part_area',
        'product_visibility',
        'product_shipping_class',
        'link_category'
    ];

    // Get all taxonomies with names and labels (excluding the ones in $excluded_names)
    $taxonomies = get_taxonomies();
    $taxonomies_with_labels = array_filter(array_map(function ($taxonomy) use ($excluded_names) {
        $taxonomy_obj = get_taxonomy($taxonomy);
        // Check if the taxonomy should be excluded
        if (in_array($taxonomy, $excluded_names)) {
            return null;
        }
        $text = $taxonomy_obj->label . ' (' . $taxonomy_obj->name . ')';
        if (!$text)
            return;
        return [
            'value' => strval($taxonomy),
            'text' => strval($text),
        ];
    }, $taxonomies));

    // Re-index the array starting from 0
    $taxonomies_with_labels = array_values($taxonomies_with_labels);

    return $taxonomies_with_labels;
}

function getCategoryOrderByOptions()
{
    // Opcje 'orderby' dla get_categories()
    $orderby_options = [
        'name' => 'Name',
        'slug' => 'Slug',
        'term_group' => 'Term Group',
        'term_id' => 'Term ID',
        'id' => 'ID',
        'description' => 'Description',
        'parent' => 'Parent',
        'term_order' => 'Term Order',
        'count' => 'Count',
        'include' => 'Include Order',
        'slug__in' => 'Slug Order',
        'meta_value' => 'Meta Value',
        'meta_value_num' => 'Meta Value Number',
        'none' => 'None (Omit ORDER BY clause)'
    ];


    // Konwersja opcji na format używany w interfejsie użytkownika
    $formatted_options = array_map(function ($value, $label) {
        return [
            'value' => strval($value),
            'text' => strval($label . ' (' . $value . ')')
        ];
    }, array_keys($orderby_options), $orderby_options);

    // Reindeksacja tablicy
    return array_values($formatted_options);
}
