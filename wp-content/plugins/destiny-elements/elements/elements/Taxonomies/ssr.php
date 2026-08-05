<?php

$de_link = (bool) ($propertiesData['content']['main_options']['icnlude_link'] ?? false);
$de_select_taxonomy = (string) ($propertiesData['content']['main_options']['select_taxonomy'] ?? 'category');
$de_link_new = (bool) ($propertiesData['content']['main_options']['enable_links'] ?? false);
$de_include_description = (bool) ($propertiesData['content']['main_options']['include_description'] ?? false);
$only_post_tax = (bool) ($propertiesData['content']['main_options']['only_current_post_tax'] ?? false);

/**
 * Children
 */

$de_include_nested_children = (bool) ($propertiesData['content']['children']['include_nested_children'] ?? false);
$de_enable_dropdown = (bool) ($propertiesData['content']['children']['include_dropdown'] ?? false);
$de_dropdown_icon = (string) (isset($propertiesData['design']['dropdown']['dropdown_icon']) ? $propertiesData['design']['dropdown']['dropdown_icon']['svgCode'] : '');

/**
 * Order Controls
 */

$de_order = (string) ($propertiesData['content']['order']['order'] ?? 'ASC');
$de_empty = (bool) ($propertiesData['content']['extras']['hide_empty_taxonomies'] ?? false);
$de_parent = (bool) ($propertiesData['content']['extras']['parent_only'] ?? false);
$de_exclude_ids = (string) ($propertiesData['content']['extras']['exclude_taxonomies_by_id'] ?? '');

/**
 * Dropdown
 */
$de_active_ids = (string) ($propertiesData['content']['dropdown']['initial_active_ids'] ?? '');

/**
 * Taxonomies Count
 */

$count_tax = (bool) ($propertiesData['content']['extras']['include_taxonomies_count'] ?? false);
$count_tax_before_string = (string) ($propertiesData['content']['extras']['taxonomies_count_strings']['before_taxonomies_count'] ?? '');
$count_tax_after_string = (string) ($propertiesData['content']['extras']['taxonomies_count_strings']['after_taxonomies_count'] ?? '');


if ($de_link_new) {
    $de_link = (bool) ($propertiesData['content']['main_options']['enable_links'] ?? false);
} else {
    $de_link = false;
}
$de_tag = $propertiesData['content']['main_options']['tag'];

de_get_taxonomies_for_element(array(
    'taxonomy' => $de_select_taxonomy,
    'de_link' => $de_link,
    'de_tag' => $de_tag,
    'include_description' =>  $de_include_description,
    'de_order' => $de_order,
    'de_empty' => $de_empty,
    'de_parent' => $de_parent,
    'de_exclude_ids' =>  $de_exclude_ids,
    'de_include_nested_children' =>  $de_include_nested_children,
    'depth' =>  0,
    'de_enable_dropdown' => $de_enable_dropdown,
    'de_dropdown_icon' =>  $de_dropdown_icon,
    'de_active_ids' => $de_active_ids,
    'only_post_tax' => $only_post_tax, 
    'include_count' => $count_tax,
    'count_string_before' => $count_tax_before_string,
    'count_string_after' => $count_tax_after_string
));