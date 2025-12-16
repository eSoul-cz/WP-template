<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_fluent_forms',
        'Breakdance\AjaxEndpoints\getFluentForms',
        'edit',
        true
    );
});

function getFluentForms() {

    $formApi = fluentFormApi('forms');
    $forms = $formApi->forms()['data'];

    $forms = array_map(function ($form) {
        return [
            'value' => strval($form->id),
            'text' => strval($form->title),
        ];
    }, $forms);

    return $forms;
}