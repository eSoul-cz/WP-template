<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_filter_types',
        'Breakdance\AjaxEndpoints\deGetFilterTypes',
        'edit',
        true
    );
});

function deGetFilterTypes() {
   
    /**
     * Populate filter types dynamicly
     */


    $filters =  [];
    $filters[] = [
        'value' => 'search',
        'text' => 'Search',
    ];

    $filters[] = [
        'value' => 'tax',
        'text' => 'Taxonomies',
    ];


    $filters[] = [
        'value' => 'author',
        'text' => 'Author',
    ];
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    
    if(function_exists('acf_get_field_groups')) { 
        $filters[] = [
            'value' => 'acf',
            'text' => 'ACF',
        ];
    }

    if ( is_plugin_active( 'meta-box/meta-box.php' ) ) {
        $filters[] = [
            'value' => 'meta_box',
            'text' => 'Meta Box',
        ];
    }

    if ( class_exists( 'WooCommerce' ) ) {

        $filters[] = [
            'value' => 'sort',
            'text' => 'Sort By (Woo)',
        ];

        $filters[] = [
            'value' => 'price',
            'text' => 'Price (Woo)',
        ];

        $filters[] = [
            'value' => 'rating',
            'text' => 'Rating (Woo)',
        ];
    }

    $filters[] = [
        'value' => 'date',
        'text' => 'Date Range',
    ];


    $filters[] = [
        'value' => 'reset',
        'text' => 'Reset',
    ];

    $filters[] = [
        'value' => 'search_button',
        'text' => 'Search Button',
    ];

    
    
    return $filters;
}
