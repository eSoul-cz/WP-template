<?php

namespace Breakdance\AjaxEndpoints;

add_action('breakdance_loaded', function () {
    \Breakdance\AJAX\register_handler(
        'destiny_get_svg_preloaders',
        'Breakdance\AjaxEndpoints\getSvgPreloaders',
        'edit',
        true
    );
});

function getSvgPreloaders() {
    // Defining the directory path
    $dir = DESTINY_ELEMENTS_PLUGIN_PATH . '/includes/assets/preloaders/svg/';

    // Check if the directory exists
    if (!is_dir($dir)) {
        return ['error' => 'Directory does not exist'];
    }

    // Getting the SVG files
    $files = glob($dir . '*.svg');

    // Process the files for the response format
    $files = array_map(function ($file) {
        // Remove the full file path, leaving only the name
        $fileName = basename($file);
        $fileUrl = DESTINY_ELEMENTS_PLUGIN_URL . '/includes/assets/preloaders/svg/' . $fileName;

        // Replace "_" with space in the file names
        $fileName = str_replace('_', ' ', $fileName);
        $fileName = str_replace('.svg', '', $fileName); // remove .svg extension from the name
        $fileName = ucfirst($fileName); // Capitalize the first letter

        // Get the file content
        $fileContent = file_get_contents($file);

        return [
            'value' => $fileContent,
            'text' => $fileName,
        ];
    }, $files);

    usort($files, function ($a, $b) {
        // Extract numbers from the file name
        preg_match_all('/\d+/', $a['text'], $numbersA);
        preg_match_all('/\d+/', $b['text'], $numbersB);

        $numA = isset($numbersA[0][0]) ? (int) $numbersA[0][0] : 0;
        $numB = isset($numbersB[0][0]) ? (int) $numbersB[0][0] : 0;

        // Compare the numbers
        if ($numA == $numB) {
            return 0;
        }

        return ($numA < $numB) ? -1 : 1;
    });

    return $files;
}


