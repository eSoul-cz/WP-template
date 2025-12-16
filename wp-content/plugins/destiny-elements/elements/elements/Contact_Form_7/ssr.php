<?php
/**
 * @var array $propertiesData
 */

// $de_ff_id = $propertiesData['content']['form_settings']['fluent_forms_id'];
$de_cf7_id = $propertiesData['content']['form_settings']['cf7_form'];

if( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
    if($de_cf7_id) {
        echo do_shortcode('[contact-form-7 id="'.$de_cf7_id.'"]');
    } else {
        echo 'Please select a form that you want to add';
    }
} else {
    $de_home_url = get_home_url();
    echo 'Could not find activated Contact Form 7 plugin on your website: ' .$de_home_url;
}