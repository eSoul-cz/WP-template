<?php

$wpml_active = function_exists("icl_get_languages") || has_filter('wpml_active_languages');
$poylang_active = function_exists("pll_the_languages");
$simple_langs = [];

// WPML Support
if ($wpml_active) {
    $lang_list = apply_filters('wpml_active_languages', NULL, 'skip_missing=0&orderby=code');

    if ($lang_list) {
        foreach ($lang_list as $lang) {
            $text_value = !empty($lang['translated_name']) ? $lang['translated_name'] : ($lang['native_name'] ?? '');
            $value_code = !empty($lang['code']) ? $lang['code'] : ($lang['language_code'] ?? '');

            $simple_langs[] = [
                'text' => $text_value,
                'value' => $value_code,
            ];
        }
    }
}

// Polylang Support
if ($poylang_active) {
    $lang_list = pll_the_languages(array('raw' => 1));

    if ($lang_list) {
        foreach ($lang_list as $lang) {
            $text_value = !empty($lang['name']) ? $lang['name'] : ($lang['slug'] ?? '');
            $value_code = !empty($lang['slug']) ? $lang['slug'] : ($lang['locale'] ?? '');

            $simple_langs[] = [
                'text' => $text_value,
                'value' => $value_code,
            ];
        }
    }
}
add_action("breakdance_register_template_types_and_conditions", function () use ($simple_langs) {
    // If there are at least one language, register the condition
    if ($simple_langs && count($simple_langs) > 1) {
        \Breakdance\ConditionsAPI\register([
            "supports" => ["element_display", "templating"],
            "slug" => "wpml-condition",
            "label" => "Language",
            "category" => "Other",
            "operands" => ["is", "is not"],

            "values" => function () use ($simple_langs) {
                return [
                    [
                        "label" => "Language",
                        "items" => array_map(function ($simple_langs) {
                            return [
                                "text" => $simple_langs['text'],
                                "value" => $simple_langs['value'],
                            ];
                        }, $simple_langs),
                    ],
                ];
            },

            "allowMultiselect" => false,

            "callback" => function (string $operand, $value) {
                $myVal = ICL_LANGUAGE_CODE;

                if ($operand === "is") {
                    return $myVal === $value;
                }

                if ($operand === "is not") {
                    return $myVal !== $value;
                }

                return false;
            },
        ]);
    }
});

add_action("wp", function () use ($wpml_active) {
    if ($wpml_active && isset($_GET['breakdance']) && $_GET['breakdance'] === 'builder' && isset($_GET['id'])) {
        $id = intval($_GET['id']); // Cast to integer for safety
        $post_language = apply_filters('wpml_post_language_details', NULL, $id);
        $current_language = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : ''; // Check if constant is defined

        // Check for null values to prevent deprecated warnings
        if ($post_language && isset($post_language['language_code']) && $current_language) {
            if ($post_language['language_code'] !== $current_language) {
                do_action('wpml_switch_language', $post_language['language_code']);
            }
        }
    }
});