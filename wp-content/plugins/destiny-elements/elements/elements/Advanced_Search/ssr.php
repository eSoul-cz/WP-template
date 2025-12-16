<?php

$placeholder_value = isset($propertiesData['content']['search_form']['placeholder']) ? $propertiesData['content']['search_form']['placeholder'] : false;

if((isset($propertiesData['content']['query']['query']['custom']['source']) && $propertiesData['content']['query']['query']['custom']['source'] == 'related')) {
    echo 'Only \'Post Types\' Source is supported with the Query';
    return;
} else {
    $de_search_data = isset($propertiesData['content']['query']['query']) ? \Breakdance\WpQueryControl\getWpQueryArgumentsFromWpQueryControlProperties($propertiesData['content']['query']['query']) : false;
}
$dummy_results = isset($propertiesData['content']['query']['show_dummy_results']) ? $propertiesData['content']['query']['show_dummy_results'] : false;
$search_button_name = (string) $propertiesData['content']['search_form']['search_button_name'] ? $propertiesData['content']['search_form']['search_button_name'] : 'Seearch';
$results_count_name = (string) ($propertiesData['content']['result']['results_before_text'] ?? 'Results:');

// Taxonomies 
$inlude_tax = isset($propertiesData['content']['search_form']['include_taxonomy']) 
    ? $propertiesData['content']['search_form']['include_taxonomy'] 
    : false; 

$de_dropdown_icon_svg = isset($propertiesData['design']['dropdown']['icon']['icon']['svgCode']) 
    ? $propertiesData['design']['dropdown']['icon']['icon']['svgCode'] 
    : false; 

$tax_name_for_all = isset($propertiesData['content']['search_form']['taxonomy_name_for_all']) 
    ? $propertiesData['content']['search_form']['taxonomy_name_for_all'] 
    : false;   

$taxonomy_term = isset($propertiesData['content']['search_form']['taxonomy_type']) 
    ? $propertiesData['content']['search_form']['taxonomy_type'] 
    : false;  

$tax_order = isset($propertiesData['content']['search_form']['taxonomy_order']['order']) 
    ? $propertiesData['content']['search_form']['taxonomy_order']['order'] 
    : false;  

$tax_orderby = isset($propertiesData['content']['search_form']['taxonomy_order']['orderby']) 
    ? $propertiesData['content']['search_form']['taxonomy_order']['orderby'] 
    : false; 

$tax_exclude_empty = isset($propertiesData['content']['search_form']['exclude_empty_taxonomies']) 
    ? $propertiesData['content']['search_form']['exclude_empty_taxonomies'] 
    : false;  
$tax_tax_count = isset($propertiesData['content']['search_form']['include_taxonomy_count']) 
    ? $propertiesData['content']['search_form']['include_taxonomy_count'] 
    : false; 

// Results show
$featured_image = isset($propertiesData['content']['result']['show_featured_image']) ? $propertiesData['content']['result']['show_featured_image'] : false;
$show_results = isset($propertiesData['content']['result']['show_result_count']) ? $propertiesData['content']['result']['show_result_count'] : false;
$no_result_message = (string) ($propertiesData['content']['query']['no_results_message'] ?? 'No results found');
$show_prices = isset($propertiesData['content']['result']['show_prices']) ? $propertiesData['content']['result']['show_prices'] : false;
$show_all_results_button = isset($propertiesData['content']['result']['show_all_results_button']) ? $propertiesData['content']['result']['show_all_results_button'] : false;
$show_all_results_text = (string) ($propertiesData['content']['result']['all_results_button_text'] ?? 'Show All Resutls');

if(is_string($de_search_data)) {
    echo '\'Text query\' is not compatible with the Ajax Search';
    return;
} 

$post_type = 'post';
if(isset($de_search_data['post_type'])) $post_type = (is_array($de_search_data['post_type'])) ? implode(",", $de_search_data['post_type']) : $de_search_data['post_type'];
$post_per_result = (int) ($de_search_data['posts_per_page'] ?? 3);

// sku
$enable_sku = (bool) ($propertiesData['content']['query']['include_sku_search'] ?? false);
$sku_and_s = (bool) ($propertiesData['content']['query']['include_normal_search_with_sku'] ?? false);
$sku_heading = isset($propertiesData['content']['query']['sku_results_heading']) ? $propertiesData['content']['query']['sku_results_heading'] : false;

// search URL 
$search_url = function_exists('home_url') ? home_url( '/' ) : '/';
$search_url = add_query_arg( 's', '{{search-term}}' , $search_url );


// Exceprt
$excerpt_length = isset($propertiesData['content']['result']['excerpt']['excerpt_length']) ? $propertiesData['content']['result']['excerpt']['excerpt_length'] : false; 
$excerpt_disable = isset($propertiesData['content']['result']['excerpt']['disable_excerpt']) ? $propertiesData['content']['result']['excerpt']['disable_excerpt'] : false; 

// button 
$button_type = isset($propertiesData['content']['search_form']['button_type']) ? $propertiesData['content']['search_form']['button_type'] : false;
$button_icon = isset($propertiesData['design']['button']['icon']['icon']['svgCode']) ? $propertiesData['design']['button']['icon']['icon']['svgCode'] : false;


?>

<script type="text/javascript">
     const deAjaxQuerySearch = <?php echo json_encode($de_search_data); ?>;
     const deAjaxAddionalData = {
        featuredImage: <?php echo $featured_image ? $featured_image : '0'; ?>,
        showResults: <?php echo $show_results ? $show_results : '0'; ?>,
        noResultMessage: '<?php echo $no_result_message ? str_replace("'", '"', $no_result_message) : 0; ?>',
        showPrices: <?php echo $show_prices ? $show_prices : '0'; ?>,
        allResultsBtn:  <?php echo $show_all_results_button ? $show_all_results_button : '0'; ?>,
        resultsCountName:  '<?php echo $results_count_name ? $results_count_name : 'Results:'; ?>',
        showAllResultsText: '<?php echo $show_all_results_text ? $show_all_results_text : 'See All Results'; ?>',
        searchURL: '<?php echo $search_url ?>', 
        taxonomyTerm : '<?php echo $taxonomy_term; ?>', 
        excerptDisable : '<?php echo $excerpt_disable ? false : true ?>',
        excerptLength : '<?php echo $excerpt_length ? $excerpt_length : 0 ?>',
        sku : <?php echo $enable_sku ? true : 0 ?>,
        skuAndS : <?php echo $sku_and_s ? true : 0 ?>, 
        skuHeading :  '<?php echo $sku_heading ? $sku_heading : 0 ?>'
     }
</script>

<div class="de-search-form-wrapper" role='form'>
    <div class="de-search-wrapper">
        <label for="de-search-%%ID%%" class="de-visually-hidden"><?php echo $search_button_name; ?></label>
        <input id="de-search-%%ID%%" class="de-search-input" type="text" placeholder="<?php echo $placeholder_value ?>" autocomplete="off">
        <div class="de-ajax-spinner"></div>
    </div>
    <?php if ($inlude_tax) { ?>
    <div class="de-search-wrapper">
        <div role="select" class="de-dropdown-input" tabindex="0">
            <span class="de-dropdown-value"><?php echo $tax_name_for_all ? $tax_name_for_all : 'All Categories'; ?></span>
            <span class="de-dropdown-icon"><?php echo $de_dropdown_icon_svg ?></span>
        </div>
        <div class="de-search-tax-wrapper">
            <div class="de-option" role="option" aria-selected="true" value="all" tabindex="0"><?php echo $tax_name_for_all ? $tax_name_for_all : 'All Categories'; ?></div>
            <?php echo de_get_taxonomies($taxonomy_term, $tax_order, $tax_orderby, $tax_exclude_empty, $tax_tax_count); ?>
        </div>
    </div>
    <?php } ?>
    <?php if ($button_type == 'text' || !$button_type) { ?>
        <div class="de-search-wrapper">
            <button role="button" type="submit" class="de-advanced-search-button" aria-label="<?php echo $search_button_name ? $search_button_name : "Search"; ?>">
                <?php echo $search_button_name ? $search_button_name : "Search"; ?>
            </button>
        </div>
    <?php } elseif ($button_type == 'icon') { ?>
        <div class="de-search-wrapper">
            <button role="button" type="submit" class="de-advanced-search-button de-advanced-search-icon" aria-label="<?php echo $search_button_name ? $search_button_name : "Search"; ?>">
                <?php echo $button_icon; ?>
            </button>
        </div>
    <?php } ?>
    <div class="de-search-results-wrapper">
        <?php 
            if ($dummy_results) {
                echo de_ajax_search(
                    $post_type, 
                    $post_per_result, 
                    $featured_image, 
                    $show_results, 
                    $show_prices, 
                    $show_all_results_button,
                    $no_result_message,
                    $results_count_name,
                    $excerpt_disable,
                    $excerpt_length,
                    $show_all_results_text,
                    $enable_sku,
                    $sku_and_s,
                    $sku_heading
                );
            };  
        ?>
    </div>
</div>