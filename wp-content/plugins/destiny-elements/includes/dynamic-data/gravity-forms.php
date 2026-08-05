<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_gravity_forms',
        'Breakdance\AjaxEndpoints\getGravityFormsD',
        'edit',
        true
    );
});


function getGravityFormsD() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'gf_form_meta';
    $results = $wpdb->get_results( "SELECT * FROM {$table_name}", ARRAY_A );

    if(!empty($results)) {
        $forms = array_map(function ($form) {
            $meta = @unserialize($form['display_meta']) ?: json_decode($form['display_meta'], true);
            $title = isset($meta['title']) ? $meta['title'] : '';
            return [
                'value' => strval($form['form_id']),
                'text' => $title,
            ];
        }, $results);

        return $forms;
    }
    return [];
}
