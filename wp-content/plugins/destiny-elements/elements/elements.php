<?php

namespace DestinyElements;

use function Breakdance\Util\getDirectoryPathRelativeToPluginFolder;

define('DESTINY_URL', plugin_dir_url(__FILE__));
define('__DESTINY_ELEMENTS_DIR__', __DIR__);

add_action('breakdance_loaded', function () {
    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/elements',
        'DestinyElements',
        'element',
        'Destiny Elements',
        false
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/macros',
        'DestinyElements',
        'macro',
        'Destiny Macros',
        false,
    );

    \Breakdance\ElementStudio\registerSaveLocation(
        getDirectoryPathRelativeToPluginFolder(__DIR__) . '/presets',
        'DestinyElements',
        'preset',
        'Destiny Presets',
        false,
    );
},
    // register elements before loading them
    9
);

