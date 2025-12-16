<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_registered_post_types',
        'Breakdance\AjaxEndpoints\getRegisteredPostTypes',
        'edit',
        true
    );
});

function getRegisteredPostTypes() {

    $postTypes = get_post_types(array('public' => true), 'objects');

    $postTypeArray = array_map(function ($postType) {
        return [
            'value' => strval($postType->name),
            'text' => strval($postType->labels->name),
        ];
    }, $postTypes);

    $postTypeValuesArray = array_values($postTypeArray);

    return $postTypeValuesArray;
}