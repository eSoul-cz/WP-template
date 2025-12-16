<?php 

$de_text_before = isset($propertiesData['content']['main_options']['text_before']) ? $propertiesData['content']['main_options']['text_before'] : false;
$de_text_after = isset($propertiesData['content']['main_options']['text_after']) ? $propertiesData['content']['main_options']['text_after'] : false;
$de_page_vews_tag = (string) ($propertiesData['content']['main_options']['tag'] ?? 'p');

de_page_views(get_the_ID());

$post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true );
    // Check if the custom field has a value.
    if ( ! empty( $post_views_count ) ) {
        $html = '';
        $de_page_vews_tag ? $html .= "<$de_page_vews_tag class='de-page-views-text'>": $html .= "<p class='de-page-views-text'>";
        $de_text_before ? $html .= $de_text_before : null;
        $html .= "<span class='de-page-views-counter'>$post_views_count</span>";
        $de_text_after ? $html .= $de_text_after : null;
        $de_page_vews_tag ? $html .= "</$de_page_vews_tag>": $html .= "</p>";
        echo $html;
}

?>