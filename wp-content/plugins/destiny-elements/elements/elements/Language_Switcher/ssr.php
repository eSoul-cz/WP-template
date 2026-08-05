<?php

$language_plugin = $propertiesData['content']['content']['language_plugin'] ?? false;
if ($language_plugin === 'wpml' || $language_plugin === 'polylang' || $language_plugin === 'translatepress') {
    
    // Show flags
    $showflags = (bool) ($propertiesData['content']['content']['show_flags'] ?? false);

    // Custom flags
    $custom_flags = (array) ($propertiesData['content']['content']['custom_flags'] ?? []);
    $flags_array = [];
    // Check if custom flags has at least one element
    if (is_array($custom_flags) && count($custom_flags) > 0) {

        // Loop through each custom flag
        foreach ($custom_flags as $key => $flag) {
            // Check if flag has at least one element
            if (is_array($flag) && count($flag) > 0) {
                $flags_array[$flag['language']] = $flag['flag_image']['url'];
            }
        }
    }

    $flags_array_json = json_encode($flags_array);

    // Show name
    $showname = (bool) ($propertiesData['content']['content']['show_name'] ?? false);

    // Language name (native or translated)
    $language_name = (string) ($propertiesData['content']['content']['language_name'] ?? 'native');
    
    // Hide current language from the list
    $hidecurrent = (bool) ($propertiesData['content']['content']['hide_current'] ?? false);

    // Display dropdown
    $dropdown_display = (int) ($propertiesData['content']['content']['dropdown_display'] ?? 0);

    if($showname == 0 && $dropdown_display == 1) {
        $showname = 1;
    } 

    if ($language_plugin === 'wpml') {
        $args = array(
            'flags' => $showflags,
            'link_current' => !$hidecurrent,
        );

        if ($showname) {
            $args[$language_name === 'native' ? 'native' : 'translated'] = 1;
        }

        $twig_template_path = dirname(__FILE__) . "/switcher_template.twig";


        $twig_template_string = file_get_contents($twig_template_path);

        // Add variables on the top of the template
        $twig_template_string = "
            {% set dropdown_display = $dropdown_display %}
            {% set language_name_version = '$language_name' %}
            {% set show_flags = '$showflags' %}
            {% set show_name = '$showname' %}
            {% set custom_flags = $flags_array_json %}
        " . $twig_template_string;

        do_action('wpml_language_switcher', $args, $twig_template_string);
    } else if ($language_plugin === 'polylang') {
        // Check if Polylang plugin is installed and activated
        if (!function_exists('pll_the_languages')) {
            echo "Polylang plugin is not installed or activated.";
            return;
        } else {
            // Raw translations
            $raw_translations = pll_the_languages([
                'raw' => 1,
                'show_names' => $showname ?? 1,
                'show_flags' => $showflags ?? 1,
                'hide_current' => $hidecurrent ?? 1,
                'display_names_as' => $nameas ?? 'name',
                'dropdown' => $dropdown_display ?? 0
            ]);

            // Import the php template
            $template_path = dirname(__FILE__) . "/templates/polylang_template.php";
            include $template_path;
        }
    } else if ($language_plugin === 'translatepress') {
        $class = null;
        if (class_exists('TRP_Languages')) {
            $class = new TRP_Languages();
        }
    
        // Check whether TranslatePress can run on the current path or not. If the path is excluded from translation, trp_allow_tp_to_run will be false
        if (apply_filters('trp_allow_tp_to_run', true)) {
            $languages = trp_custom_language_switcher();
    
            // Ensure we only proceed if languages were retrieved successfully and is an array
            if ($languages && is_array($languages)) {
                // Set current language 'current_lang' to true
                $current_lang_code = trp_get_locale();
                foreach ($languages as $key => $language) {
                    $languages[$key]['classes'][] = 'lang-item';
    
                    // Only attempt to call methods on $class if it is instantiated
                    if ($class !== null) {
                        $languages[$key]['english_name'] = $class->get_language_names([$key], 'english_name')[$key];
                        $languages[$key]['native_name'] = $class->get_language_names([$key], 'native_name')[$key];
                    }

                    if($name_version === 'native') {
                        $languages[$key]['language_name'] = $languages[$key]['native_name'];
                    } elseif($name_version === 'translated') {
                        $languages[$key]['language_name'] = $languages[$key]['english_name'];
                    } elseif($name_version === 'slug') {
                        $languages[$key]['language_name'] = $key;
                    } else {
                        $languages[$key]['language_name'] = $languages[$key]['english_name'];
                    }
    
                    // Take language_code and split by _
                    $language_code = explode('_', $language['language_code']);
    
                    // set lang_simple_code to the first element of the array
                    $languages[$key]['lang_simple_code'] = strtoupper($language_code[0]);
    
                    if ($language['language_code'] === $current_lang_code) {
                        $languages[$key]['current_lang'] = true;
                        $languages[$key]['classes'][] = 'current-lang';
                    } else {
                        $languages[$key]['current_lang'] = false;
                    }
                }
    
                if ($hidecurrent && !$dropdown_display) {
                    foreach ($languages as $key => $language) {
                        if ($language['current_lang']) {
                            unset($languages[$key]);
                        }
                    }
                }

                $template_path = dirname(__FILE__) . "/templates/translatepress_template.php";
                if (file_exists($template_path)) {
                    include $template_path;
                } else {
                    echo 'Template file not found.';
                }
            } else {
                echo 'Languages not found or is not an array.';
            }
        } else {
            echo 'TranslatePress is not allowed to run on the current path.';
        }
    }    
} else {
    echo "Element supports WPML, Polylang and TranslatePress plugins. Please install, activate and choose one of them.";
}
?>