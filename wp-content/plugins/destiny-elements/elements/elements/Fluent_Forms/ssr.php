<?php
/**
 * @var array $propertiesData
 */

$de_ff_id = (string) ($propertiesData['content']['form_settings']['fluent_forms_id'] ?? '1');
$de_ff_name = isset($propertiesData['content']['form_settings']['fluent_form']) ? $propertiesData['content']['form_settings']['fluent_form'] :  false;


// $de_ff_shortcode = '[fluentform id="'.$de_ff_id.'"]';

if( is_plugin_active( 'fluentform/fluentform.php' ) ) {
    if($de_ff_name) {
	    echo do_shortcode('[fluentform id="'.$de_ff_name.'"]');
    } elseif ($de_ff_id) {
        echo do_shortcode('[fluentform id="'.$de_ff_id.'"]');
    } else {
        echo 'Please select a form that you want to add';
    }
} else {
    $de_home_url = get_home_url();
    echo 'Could not find activated Fluent Forms plugin on your website: ' .$de_home_url;
}