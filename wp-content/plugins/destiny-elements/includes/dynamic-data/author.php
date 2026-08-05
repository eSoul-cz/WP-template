<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_author_role',
        'Breakdance\AjaxEndpoints\getAuthorRoleDestiny',
        'edit',
        true
    );
});

function getAuthorRoleDestiny() {

    // Get WordPress roles
    $roles = wp_roles();

    // Iterate over roles and prepare a structured array
    $roles_with_names = array_map(function ($role_name, $role_info) {
        return [
            'value' => strval($role_name),
            'text' => strval($role_info['name']),
        ];
    }, array_keys($roles->roles), $roles->roles);

    // Re-index the array starting from 0
    $roles_with_names = array_values($roles_with_names);

    return $roles_with_names;
}