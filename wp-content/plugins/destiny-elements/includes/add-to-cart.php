<?php

// 🔹 Handle Add to Cart via AJAX
function de_add_to_cart() {
    if (!isset($_POST['product_id'])) {
        wp_send_json_error("No product ID provided");
        return;
    }

    $product_id = intval($_POST['product_id']);
    $quantity = 1;

    $added = WC()->cart->add_to_cart($product_id, $quantity);

    if ($added) {
        wp_send_json_success("Product added to cart");
    } else {
        wp_send_json_error("Failed to add product to cart");
    }
}
add_action('wp_ajax_de_add_to_cart', 'de_add_to_cart');
add_action('wp_ajax_nopriv_de_add_to_cart', 'de_add_to_cart');


// 🔹 Handle Mini Cart Update via AJAX
function de_update_mini_cart() {
    ob_start();
    woocommerce_mini_cart(); // Fetches WooCommerce mini cart contents
    wp_send_json_success(ob_get_clean());
}
add_action('wp_ajax_de_update_mini_cart', 'de_update_mini_cart');
add_action('wp_ajax_nopriv_de_update_mini_cart', 'de_update_mini_cart');


// 🔹 Enqueue JavaScript & Localize AJAX URL
function de_enqueue_add_to_cart_script() {
    wp_enqueue_script('de-add-to-cart', get_template_directory_uri() . '/elements/dependencies-files/woo-add-to-cart.js', array('jquery'), null, true);
    
    wp_localize_script('de-add-to-cart', 'wc_add_to_cart_params', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
// add_action('wp_enqueue_scripts', 'de_enqueue_add_to_cart_script');
