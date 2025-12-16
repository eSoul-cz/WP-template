<?php

$de_filter_data = (array) ($propertiesData['content']['filters']['filters'] ?? []);
$de_filter_design = (array) ($propertiesData['design'] ?? []);
$de_filter_options = (array) ($propertiesData['content']['options'] ?? []);

// Some javascript to get page data
$de_blog_permalink = get_permalink(get_option('page_for_posts'));
$de_shop_permalink = '';
if (class_exists('WooCommerce')) {
  $de_shop_permalink = get_permalink(wc_get_page_id('shop'));
}

// Improved archive and taxonomy detection
$is_archive = is_archive();
$queried_object = get_queried_object();
$archive_name = $is_archive && isset($queried_object->name) ? $queried_object->name : 'post';
$post_type = get_post_type();
$taxonomy = $is_archive && isset($queried_object->taxonomy) ? $queried_object->taxonomy : false;
$taxonomy_value = $is_archive && isset($queried_object->slug) ? $queried_object->slug : false;

// Correct permalink generation for custom post types
$post_type_link = $is_archive ? get_post_type_archive_link($post_type) : get_post_type_archive_link('post');

// Taxonomies on single pages
$project_type_terms_arr = [];
if (is_single()) {
    $project_type_terms = wp_get_post_terms(get_the_ID(), 'project-type');
    foreach ($project_type_terms as $term) {
        $project_type_terms_arr[] = $term->slug;
    }
}

// Redirect handling for non-archive pages
//redirect options for non archive pages
$redirect_options = (array) ($propertiesData['content']['non_archive_options'] ?? []);
$redirect_is_enabled = (bool) ($propertiesData['content']['non_archive_options']['enable_redirect'] ?? false);
$redirect_url = (string) ($propertiesData['content']['non_archive_options']['redirect_archive_url'] ?? $post_type_link);
$redirect_search_button = (bool) ($propertiesData['content']['non_archive_options']['search_with_search_button'] ?? false);

// Construct the final object
$destinyAFObj = array(
    "slug" => $is_archive,
    "name" => $archive_name,
    "isFrontPage" => is_front_page(),
    'taxonomy' => $taxonomy,
    'taxonomyValue' => $taxonomy_value,
    'postType'  => $post_type,
    'postTypeLink' => $post_type_link,
    'singlePostArrs' => $project_type_terms_arr,
    'redirectIsEnabled' => $redirect_is_enabled,
    'redirectURL' => $redirect_url ? $redirect_url : false,
    'redirectSearchButton' => $redirect_search_button ? $redirect_search_button : false
);


echo "<script>";
echo "window.destinyAFObj = window.destinyAFObj || null;";
echo "if(window.destinyAFObj === null) {";
echo "window.destinyAFObj = ". json_encode($destinyAFObj) .";";
echo "}";
echo "</script>";


foreach ($de_filter_data as $filter) {

  $filter_type = isset($filter['filter_type']) ? $filter['filter_type'] : '';

  if($filter_type === "date") {
    de_get_date_input($filter, $de_filter_options, $de_filter_design);
  }

  if($filter_type === "acf") {
    de_get_acf_input($filter, $de_filter_options, $de_filter_design, $redirect_options);
  }

  if($filter_type === "meta_box") {
    de_get_meta_box_input($filter, $de_filter_options, $de_filter_design, $redirect_options);
  }

  if($filter_type === "search") {
    de_get_search_input($filter, $de_filter_design);
  }

  if($filter_type === "tax" || $filter_type === "author") {
    de_get_dropdown_input($filter, $de_filter_options, $de_filter_design);
  }

  if($filter_type === "reset") {
    de_get_reset_input($filter, $de_filter_design);
  }

  if($filter_type === "price") {
    de_get_price_input($filter, $de_filter_design);
  }

  if($filter_type === "rating") {
    de_get_rating_input($filter, $de_filter_options, $de_filter_design);
  }

  if($filter_type === "sort") {
    de_get_sort_input($filter, $de_filter_options, $de_filter_design);
  }

  if($filter_type === "search_button") {
    de_get_reset_input($filter, $de_filter_design, 'search_button');
  }

}