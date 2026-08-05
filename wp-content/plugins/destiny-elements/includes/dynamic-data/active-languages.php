<?php

namespace Breakdance\AjaxEndpoints;

add_action('plugins_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_active_languages',
        'Breakdance\AjaxEndpoints\getActiveLanguages',
        'edit',
        true
    );
});

/**
 * Retrieves the list of active translation plugins like WPML, Polylang etc.
 *
 * @return array List of active translation plugins.
 */
function getActiveLanguages()
{
    if (class_exists('SitePress')) {
        // Get the list of active languages
        $active_languages = apply_filters('wpml_active_languages', null, ['skip_missing' => 0]);
        // Initialize an empty array to hold names of active languages
        $languages = [];

        // Loop through each active language to get its name and code
        foreach ($active_languages as $language) {
            $languages[] = [
                'text' => $language['native_name'],
                'value' => $language['code'],
            ];
        }

        return $languages;
    } else if (function_exists('pll_languages_list')) {
        $translations = pll_the_languages( array( 'raw' => 1 ) );
        $languages = [];
        foreach ($translations as $translation) {
            $languages[] = [
                'text' => $translation['name'],
                'value' => $translation['slug'],
            ];
        }
        return $languages;
    } else if (class_exists('TRP_Translate_Press')) {
        $trp           = \TRP_Translate_Press::get_trp_instance();
        $trp_languages = $trp->get_component( 'languages' );
        $trp_settings  = $trp->get_component( 'settings' );
        $settings      = $trp_settings->get_settings();
        $languages_to_display  = $settings['publish-languages'];
        $translation_languages = $trp_languages->get_language_names( $languages_to_display );
        
        $languages = [];

        foreach ( $translation_languages as $item => $language ) {
            $languages[] = [
                'text' => $language,
                'value' => $item,
            ];
        }

        return $languages;
    } else {
        return [];
    }

}
