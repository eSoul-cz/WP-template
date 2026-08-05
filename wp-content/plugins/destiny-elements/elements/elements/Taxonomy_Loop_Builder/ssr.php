<?php

/**
 * Questions:
 * 1. W jaki sposób można wyróżnić aktywną kategorię?
 * 2. Czy powinna być opcja otoczenia elementu w link?
 */

$errors = [];

require_once __DIR__ . "/tax-loop-builder.php";

// --- Main Options --- //
$blockId = (int) ($propertiesData['content']['main_options']['global_block'] ?? 0);
if(!$blockId) {
    $errors[] = 'Choose a block to display taxonomy elements in loop';
}

$de_select_taxonomy = (string) ($propertiesData['content']['main_options']['select_taxonomy'] ?? 'category');
$singleTag = (string) ($propertiesData['content']['main_options']['single_tag'] ?? 'div');

// --- Order --- //
$de_order = (string) ($propertiesData['content']['order']['order'] ?? 'ASC');
$orderby = (string) ($propertiesData['content']['order']['order_by'] ?? 'name');

// --- Extras --- //
$only_post_tax = (bool) ($propertiesData['content']['extras']['only_current_post_tax'] ?? false); // Show only current post taxonomies
$de_empty = (bool) ($propertiesData['content']['extras']['hide_empty'] ?? false);
$parent_only = (int) ($propertiesData['content']['extras']['parent_only'] ?? 0);
$de_parent = (int)($propertiesData['content']['extras']['parent_id'] ?? 0);
$de_include_ids = (string) ($propertiesData['content']['extras']['include_taxonomies_by_id'] ?? '');
$de_exclude_ids = (string) ($propertiesData['content']['extras']['exclude_taxonomies_by_id'] ?? '');

// -------------- END Contet -------------- //

// -------------- Design -------------- //
$singleClass = '';
$layout = (string) ($propertiesData['design']['list']['layout'] ?? 'list');
if ($layout == "list") {
    $wrapperClass = 'bde-dynamic-repeater-list';
} else if ($layout == "slider") {
    $wrapperClass = 'bde-dynamic-repeater-slider swiper-wrapper';
    $singleClass = 'swiper-slide';
} else {
    $wrapperClass = 'bde-dynamic-repeater-grid';
}

$args = array(
    'taxonomy' => $de_select_taxonomy, // Taxonomy name
    'order' => $de_order,           // ASC or DESC
    'orderby' => $orderby,            // Order by: name, slug, term_group, term_id, id, description etc.
    'title_li' => '',
    'hide_empty' => $de_empty
);

if ($de_parent) {
    $args['parent'] = $de_parent;
}

if ($de_include_ids) {
    $args['include'] = $de_include_ids;
}

if ($de_exclude_ids) {
    $args['exclude'] = $de_exclude_ids;
}

if ($parent_only) {
    $args['parent'] = 0;
}

if ($only_post_tax) {
    $args['object_ids'] = get_the_ID();
}


if (!empty($errors)) {
    if ($_REQUEST['triggeringDocument'] ?? true) {
        echo '<div class="breakdance-empty-ssr-message">' . implode('<br>', $errors) . '</div>';
    } else {
        echo "<!-- Breakdance error: " . implode('<br>', $errors) . " -->";
    }
} else {
    $product_categories = get_categories($args);

    if(empty($product_categories)) {
        if($_REQUEST['triggeringDocument'] ?? true) {
            echo '<div class="breakdance-empty-ssr-message">No categories found</div>';
        } else {
            echo "<!-- Breakdance error: No categories found -->";
        }
    }
    
    output_before_the_tax_loop($layout);
    //echo "<div class='de-taxonomies {$wrapperClass}'>";
    foreach ($product_categories as $single_category) {
        global $single_category_item;
        $single_category_item = $single_category;
        $postId = get_the_ID();

        ?>
    <<?php echo $singleTag; ?> class='de-taxonomy-item <?php echo $singleClass; ?>'>
        <?php
        if ($blockId) {
            echo \Breakdance\Render\render($blockId, $repeaterItemNodeId);
        } else {
            if ($_REQUEST['triggeringDocument'] ?? true) {
                echo '<div class="breakdance-empty-ssr-message">Choose a Global Block from the dropdown.</div>';
            } else {
                echo "<!-- Breakdance error: $blockId not found -->";
            }
        }
        ?>
    </<?php echo $singleTag; ?>>
<?php
    }
    output_after_the_tax_loop($layout, $propertiesData);
}

