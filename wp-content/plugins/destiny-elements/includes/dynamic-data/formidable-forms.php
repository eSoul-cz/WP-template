<?php

namespace Breakdance\AjaxEndpoints;

add_action('plugins_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_formidable_forms',
        'Breakdance\AjaxEndpoints\getFormidableFormsD',
        'edit',
        true
    );
});


function getFormidableFormsD()
{

    if (!class_exists('\FrmForm')) {
        return [];
    }

    $forms = \FrmForm::get_published_forms();
    if (!$forms)
        return [];

    $forms = array_map(function ($form) {
        return [
            'value' => strval($form->id),
            'text' => strval($form->name),
        ];
    }, $forms);

    return $forms;
}