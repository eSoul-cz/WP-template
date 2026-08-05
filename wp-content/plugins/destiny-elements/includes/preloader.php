<?php

function de_insert_preloader() {
    // Option to enable/disable preloader
    $de_preloader_enabled = get_option('destiny_preloader_enabled');
    // Check if it's builder preview
    $is_preview = isset($_GET['breakdance_iframe']) && $_GET['breakdance_iframe'] === 'true';

    if ($de_preloader_enabled && !$is_preview) {
        $de_preloader_id = get_option('destiny_preloader_id');

        if ($de_preloader_id) {
            echo do_shortcode('[breakdance_block blockId="' . $de_preloader_id . '"]');
        }
    }
}
add_action('wp_body_open', 'de_insert_preloader');
?>