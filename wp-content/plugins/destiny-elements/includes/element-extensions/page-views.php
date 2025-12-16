<?php
/*
 * Set post views count using post meta//functions.php
 */
function de_page_views($postID)
{
    // Set up Cookie
    $cookie_name = "destiny_visitied";

    $cookie_array = isset($_COOKIE[$cookie_name]) ? json_decode($_COOKIE[$cookie_name], true) : array();
    
    $countKey = 'post_views_count';
    $countValue = get_post_meta($postID, $countKey, true);

    if ($countValue == '') {
        $countValue = 0; 
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '1');
    } else {
        if (!in_array($postID, $cookie_array)) {
            $countValue++;
            update_post_meta($postID, $countKey, $countValue);
        }
    }

    if (!in_array($postID, $cookie_array)) {
        $cookie_array[] = $postID;
        setcookie($cookie_name, json_encode($cookie_array), time() + (86400), "/");
    }
}
?>