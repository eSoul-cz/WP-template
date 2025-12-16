<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_meta_box_fields',
        'Breakdance\AjaxEndpoints\getMetaBoxFieldsDestiny',
        'edit',
        true
    );
});

function getMetaBoxFieldsDestiny() {
   
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( !is_plugin_active( 'meta-box/meta-box.php' ) ) {
        return [
            [
                'value' => 'no_meta_box',
                'text' => 'No Meta Box Plugin Installed',
            ]
        ];
    }

    // Get all Meta Box meta boxes
    $meta_boxes = rwmb_get_registry( 'meta_box' )->all();
    $all_fields = [];

    // Iterate over meta boxes and get fields
    foreach($meta_boxes as $box) {
        $fields = $box->fields;

        foreach($fields as $field) {
            // Return only 'select' and 'checkbox_list' fields
            //if($field['type'] == 'radio' || $field['type'] == 'select' ||$field['type'] == 'checkbox_list') {
                $all_fields[] = [
                    'value' => $field['id'],
                    'text' => $field['name'],
                ];
            //}
        }
    }

    return $all_fields;
}