<?php

add_action('init', function () {
    // Check if Breakdance is installed and class/function exists
    if (!function_exists('\Breakdance\DynamicData\registerField') || !class_exists('\Breakdance\DynamicData\Field')) {
        return;
    }

    // Załaduj wszystkie pliki PHP z folderu 'dynamic-fields'
    foreach (glob(__DIR__ . '/dynamic-fields/*.php') as $filename) {
        require_once $filename;

        // Ekstrakcja nazwy klasy z nazwy pliku
        $class_name = basename($filename, '.php');
        // Rejestracja klasy
        if (class_exists($class_name)) {
            \Breakdance\DynamicData\registerField(new $class_name());
        }
    }

});