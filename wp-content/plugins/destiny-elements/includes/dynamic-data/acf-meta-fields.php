<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_acf_fields',
        'Breakdance\AjaxEndpoints\getAcfFieldsDestiny',
        'edit',
        true
    );
});

function getAcfFieldsDestiny() {
    // Check if function exists
    if(!function_exists('acf_get_field_groups')) {
        return [
            [
                'value' => 'no_acf',
                'text' => 'No ACF Plugin Installed',
            ]
        ];
    }
    
    // Get all ACF field groups
    $field_groups = acf_get_field_groups();
    $all_fields = [];

    // Iterate over groups and get fields
    foreach($field_groups as $group) {
        $fields = acf_get_fields($group['key']);
        
        foreach($fields as $field) {
            // Return only Radio and Checkbox fields, as we won't be using any other fields for now
            // if($field['type'] == 'radio' || $field['type'] == 'checkbox' || $field['type'] == 'select') {
                $all_fields[] = [
                    'value' => $field['key'],
                    'text' => $field['label'],
                ];
            //}
        }
    }
    
    return $all_fields;
}