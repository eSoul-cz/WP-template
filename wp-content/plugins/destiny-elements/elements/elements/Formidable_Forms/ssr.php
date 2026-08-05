<?php
/**
 * @var array $propertiesData
 */
$de_ff_id = (string) ($propertiesData['content']['form_settings']['select_form'] ?? '1');
$de_ff_show_title = (bool) ($propertiesData['content']['form_settings']['show_title'] ?? false);
$de_ff_show_description = (bool) ($propertiesData['content']['form_settings']['show_description'] ?? false);
$de_ff_minimize_html = (bool) ($propertiesData['content']['form_settings']['minimize_html'] ?? false);

if (is_plugin_active('formidable/formidable.php')) {
    if ($de_ff_id) {
        $shortcode = '[formidable id="' . $de_ff_id . '"';
        $shortcode .= $de_ff_show_title ? ' title="1"' : '';
        $shortcode .= $de_ff_show_description ? ' description="1"' : '';
        $shortcode .= $de_ff_minimize_html ? ' minimize="1"' : '';
        $shortcode .= ']';
        echo do_shortcode($shortcode);
    } else {
        echo 'Please select a form that you want to add';
    }
} else {
    $de_home_url = get_home_url();
    echo 'Could not find activated Formidable Forms plugin on your website: ' . $de_home_url;
}