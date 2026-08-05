<?php 

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function register_destiny_api_setting() {
	$args = array(
			'type' => 'string', 
			'sanitize_callback' => 'sanitize_text_field',
			'default' => NULL,
			);
    register_setting( 'destiny_elements', 'destiny_places_api', $args ); 
	register_setting( 'destiny_elements', 'destiny_places_api_required_date_updated', $args ); 
	register_setting( 'destiny_elements', 'destiny_places_date_updated' ); 
	register_setting( 'destiny_elements', 'destiny_places_store_result' ); 
    register_setting( 'destiny_elements', 'destiny_places_store_id' ); 
    register_setting( 'destiny_elements', 'destiny_maps_javascript_api' ); 
} 
add_action( 'admin_init', 'register_destiny_api_setting' );

function de_get_places_api_date($id){
    $curl_handle = curl_init();

    $locale = get_locale();

    $language = substr($locale, 0, 2);

    $api = get_option("destiny_places_api");
    $url = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $id . "&key=" . $api . "&language=" . $language;

    // Set the curl URL option
    curl_setopt($curl_handle, CURLOPT_URL, $url);

    // This option will return data as a string instead of direct output
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

    // Execute curl & store data in a variable
    $curl_data = curl_exec($curl_handle);
    curl_close($curl_handle);

    // Decode JSON into PHP array
    $response_data = json_decode($curl_data);
    if($response_data->error_message) {
        echo $response_data->error_message;
        echo '<br /><br />';
    }
    $data_result = isset($response_data->result) ? $response_data->result : false;

    update_option('destiny_places_store_result', $data_result);
    update_option('destiny_places_date_updated', time());
    if ($id) {
        update_option('destiny_places_store_id', $id);
    }
}


