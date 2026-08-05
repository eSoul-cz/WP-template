<?php
/**
 * @var array $propertiesData
 */

$de_gf_id = (string) ($propertiesData['content']['form_settings']['gravity_form_id'] ?? '1');
$de_gf_name = isset($propertiesData['content']['form_settings']['gravity_form']) ? $propertiesData['content']['form_settings']['gravity_form'] : false;

// title
$de_gf_title = isset($propertiesData['content']['form_settings']['enable_title']) && $propertiesData['content']['form_settings']['enable_title'] ?  'true' : 'false';

// description
$de_gf_description = isset($propertiesData['content']['form_settings']['enable_description']) && $propertiesData['content']['form_settings']['enable_description'] ?'true' : 'false';

// ajax
$de_gf_ajax = isset($propertiesData['content']['form_settings']['enable_ajax']) && $propertiesData['content']['form_settings']['enable_ajax'] ? 'true' : 'false';

// Tab Index
$de_gf_ti = (string) ($propertiesData['content']['form_settings']['tab_index'] ?? '1');

if($de_gf_name) {
    $de_gf_shortcode = '[gravityform id="' . $de_gf_name . '" title="'. $de_gf_title .'" description="'. $de_gf_description .'" ajax="' . $de_gf_ajax . '" tabindex="'. $de_gf_ti .'"]';
} elseif($de_gf_id) {
    $de_gf_shortcode = '[gravityform id="' . $de_gf_id . '" title="'. $de_gf_title .'" description="'. $de_gf_description .'" ajax="' . $de_gf_ajax . '" tabindex="'. $de_gf_ti .'"]';
} else {
    echo 'Please select a form that you want to add';
}

if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
    echo do_shortcode($de_gf_shortcode);
} else {
    $de_home_url = get_home_url();
    echo 'Could not find activated Gravity Forms plugin on your website: ' . $de_home_url;
}
