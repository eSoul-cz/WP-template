<?php 

/**
 * Retrieves and returns a JSON-encoded list of all posts of type 'breakdance_block'.
 * Additionally, if the 'destiny_preloader_options' option is set, retrieves the 'destiny_preloader_id' option.
 *
 * This function is primarily used in AJAX calls.
 *
 * @return void
 * 
 * @throws WPDieException If a problem occurs during the AJAX call, a WPDieException may be thrown.
 */
function destiny_get_global_blocks() {
    $posts = get_posts( array(
        'post_type'      => 'breakdance_block',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ));

    $choosen_blocks = get_option('destiny_preloader_options');

    if($choosen_blocks){
        get_option('destiny_preloader_id');    
    }



    // Return the list of posts as a JSON-encoded string
    echo json_encode($posts);
    wp_die(); 
}

// Add function to AJAX action hook
add_action( 'wp_ajax_destiny_get_global_blocks', 'destiny_get_global_blocks' );
add_action( 'wp_ajax_nopriv_destiny_get_global_blocks', 'destiny_get_global_blocks' );

/**
 * Handles the AJAX call for updating the 'destiny_preloader_id' option.
 * 
 * This function retrieves the 'blockId' value from the AJAX POST request. If the value is provided,
 * it updates the 'destiny_preloader_id' option in the WordPress database with the given value.
 * Finally, it sends a response indicating whether the option was successfully updated or an error occurred.
 * 
 * The wp_die() function is called at the end to terminate execution of the script.
 */
add_action('wp_ajax_destiny_update_preloader_id', function() {
    // Get value 'blockId' from POST
    $blockId = isset($_POST['blockId']) ? $_POST['blockId'] : null;
    
    // Update option
    if ($blockId !== null) {
        update_option('destiny_preloader_id', $blockId);
        echo 'Option updated successfully';
    } else {
        echo 'Error: blockId not provided';
    }

    wp_die(); 
});


/**
 * Handles the AJAX call for updating the 'destiny_preloader_enabled' option.
 * 
 * This function retrieves the 'enabled' value from the AJAX POST request. If the value is provided,
 * it updates the 'destiny_preloader_enabled' option in the WordPress database with the given value.
 * Finally, it sends a response indicating whether the option was successfully updated or an error occurred.
 * 
 * The wp_die() function is called at the end to terminate execution of the script.
 */
add_action('wp_ajax_destiny_update_preloader_enabled', function() {
    // Get value 'enabled' from POST
    $enabled = isset($_POST['enabled']) ? $_POST['enabled'] : null;

    // Update option
    if ($enabled !== null) {
        update_option('destiny_preloader_enabled', $enabled);
        echo 'Option updated successfully';
    } else {
        echo 'Error: enabled not provided';
    }

    wp_die(); 
});


/**
 * Handles the AJAX call for getting the 'destiny_preloader_id' option.
 * 
 * This function retrieves the 'destiny_preloader_id' value from the WordPress database.
 * It then sends a response with the retrieved value. If the option is not set or the value is null,
 * the response will be 'null'.
 * 
 * The wp_die() function is called at the end to terminate execution of the script.
 */
add_action('wp_ajax_destiny_get_current_preloader', function() {
    // Get option
    $preloaderId = get_option('destiny_preloader_id', null);

    // Send response
    if ($preloaderId !== null) {
        echo json_encode(['id' => $preloaderId]);
    } else {
        echo 'null';
    }

    wp_die(); 
});