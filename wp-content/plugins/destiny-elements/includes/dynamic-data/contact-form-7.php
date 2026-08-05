<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_contact_form_7',
        'Breakdance\AjaxEndpoints\getContactForm7',
        'edit',
        true
    );
});

function getContactForm7() {

    // Get all the Contact Form 7 forms
    $forms = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
        'post_status' => 'publish',
    ));
    
    // Map each form to an object with "value" and "text" properties
    $forms = array_map(function($form) {
        return array(
            'value' => strval($form->ID),
            'text' => $form->post_title,
        );
    }, $forms);

    return $forms;
}