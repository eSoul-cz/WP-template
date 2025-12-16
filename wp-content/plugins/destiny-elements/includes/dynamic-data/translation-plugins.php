<?php

namespace Breakdance\AjaxEndpoints;

add_action('plugins_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_translation_plugins',
        'Breakdance\AjaxEndpoints\getActiveTranslationPlugins',
        'edit',
        true
    );
});

/**
 * Retrieves the list of active translation plugins like WPML, Polylang etc.
 *
 * @return array List of active translation plugins.
 */
function getActiveTranslationPlugins()
{
    // Get the list of all active plugins
    $active_plugins = get_option('active_plugins');

    // Initialize an empty array to hold names of active translation plugins
    $translation_plugins = [];

    // Loop through each active plugin to check if it's a translation plugin
    foreach ($active_plugins as $plugin) {
        if (strpos($plugin, 'sitepress-multilingual-cms') !== false) { // Check for WPML
            $translation_plugins[] = [
                'text' => 'WPML',
                'value' => 'wpml',
            ];
        }

        if (strpos($plugin, 'polylang') !== false) { // Check for Polylang
            $translation_plugins[] = [
                'text' => 'Polylang',
                'value' => 'polylang',
            ];
        }

        // TranslatePress (translatepress-business)
        if (strpos($plugin, 'translatepress-business') !== false) { // Check for TranslatePress
            $translation_plugins[] = [
                'text' => 'TranslatePress',
                'value' => 'translatepress',
            ];
        }

    }

    return $translation_plugins;
}
