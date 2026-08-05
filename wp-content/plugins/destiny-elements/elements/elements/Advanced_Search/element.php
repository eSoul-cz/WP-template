<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\AdvancedSearch",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class AdvancedSearch extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'SearchIcon';
    }

    static function tag()
    {
        return 'div';
    }

    static function tagOptions()
    {
        return [];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Ajax Search';
    }

    static function className()
    {
        return 'de-advanced-search';
    }

    static function category()
    {
        return 'destiny_ess';
    }

    static function badge()
    {
        return ['backgroundColor' => 'var(--white)', 'textColor' => 'var(--black)', 'label' => 'New'];
    }

    static function slug()
    {
        return get_class();
    }

    static function template()
    {
        return file_get_contents(__DIR__ . '/html.twig');
    }

    static function defaultCss()
    {
        return file_get_contents(__DIR__ . '/default.css');
    }

    static function defaultProperties()
    {
        return ['content' => ['search_form' => ['placeholder_value' => null, 'placeholder' => 'Type anything...', 'search_button_name' => 'Search', 'include_taxonomy' => true, 'taxonomy_type' => 'category', 'taxonomy_name_for_all' => 'All Categories', 'taxonomy_type_dynamic_meta' => null, 'open_dropdown_wrapper' => false, 'button_type' => 'text', 'exclude_empty_taxonomies' => true, 'include_taxonomy_count' => true], 'options' => ['post_type_to_query' => ['active' => 'custom', 'text' => 'post_type=post', 'custom' => ['source' => 'post_types', 'postsPerPage' => 8, 'conditions' => ['0' => ['0' => []]], 'totalPosts' => null, 'ignoreStickyPosts' => false, 'ignoreCurrentPost' => false, 'postTypes' => ['0' => 'post'], 'orderBy' => 'date', 'order' => 'DESC', 'date' => 'all', 'beforeDate' => null, 'afterDate' => null, 'offset' => null], 'php' => 'return [\'post_type\' => \'post\'];'], 'query' => ['active' => 'custom', 'text' => 'post_type=post', 'custom' => ['source' => 'post_types', 'postsPerPage' => 8, 'conditions' => ['0' => ['0' => []]], 'totalPosts' => null, 'ignoreStickyPosts' => false, 'ignoreCurrentPost' => false, 'postTypes' => ['0' => 'post'], 'orderBy' => 'date', 'order' => 'DESC', 'date' => 'all', 'beforeDate' => null, 'afterDate' => null, 'offset' => null], 'php' => 'return [\'post_type\' => \'post\'];'], 'show_dummy_results' => true, 'text' => null], 'query' => ['query' => null, 'include_sku_search' => false, 'include_normal_search_with_sku' => false, 'show_dummy_results' => false], 'content' => ['show_featured_image' => true], 'result' => ['show_featured_image' => true, 'show_results' => false, 'show_result_count' => true, 'show_prices' => true, 'show_all_results_button' => true, 'results_before_text' => 'Results:', 'all_results_button_text' => null], 'responsiveness' => ['scroll_to_top_on_input' => 'breakpoint_phone_landscape']], 'design' => ['button' => ['typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'color_hover' => null], 'background_color' => 'var(--bde-brand-primary-color)', 'spacing' => null, 'border' => ['border_radius' => ['topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'custom', 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 0, 'unit' => 'em', 'style' => '0em'], 'bottomLeft' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null, 'style' => 'none'], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null, 'style' => 'none'], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null, 'style' => 'none'], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null, 'style' => 'none']]], 'icon' => ['icon' => ['slug' => 'icon-search', 'name' => 'icon-search', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-search" viewBox="0 0 32 32">
<path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"/>
</svg>', 'iconSetSlug' => 'IcoMoon Free']], 'background_color_hover' => null], 'inputs' => ['background' => null, 'typography' => ['color' => null], 'borders' => ['border_radius' => ['breakpoint_base' => null]]], 'input' => ['typography' => null, 'borders' => ['border_radius' => ['breakpoint_base' => ['all' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'editMode' => 'custom']], 'border_radius_hover' => null, 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none']]]], 'background' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'color_hover' => null], 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'margin' => ['breakpoint_base' => ['bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]], 'select' => ['select_icon' => ['slug' => 'icon-angle-down.', 'name' => 'angle down', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"/></svg>'], 'padding' => ['padding' => ['breakpoint_base' => ['right' => ['number' => 40, 'unit' => 'px', 'style' => '40px']]]], 'icon' => ['icon' => ['slug' => 'icon-angle-down.', 'name' => 'angle down', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"/></svg>'], 'color' => '#727272FF', 'size' => ['number' => 20, 'unit' => 'px', 'style' => '20px', 'breakpoint_base' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'right_position' => ['breakpoint_base' => ['number' => 5, 'unit' => 'px', 'style' => '5px']], 'top_position' => ['breakpoint_base' => null]]], 'width' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']]]], 'results' => ['title' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]]]], 'image' => ['width' => ['breakpoint_base' => ['number' => 55, 'unit' => 'px', 'style' => '55px']], 'height' => ['breakpoint_base' => ['number' => 55, 'unit' => 'px', 'style' => '55px']], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'editMode' => 'all']]]], 'excerpt' => ['color' => ['breakpoint_base' => '#5F5F5FFF']], 'align_content' => 'center', 'background_color' => null, 'background_color_hover' => null, 'price' => ['sale_price_' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 14, 'unit' => 'px', 'style' => '14px']], 'advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['0' => 'line-through']]]]]]]], 'current_price' => ['color' => ['breakpoint_base' => '#FF0000FF'], 'typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '600']]]]]], 'show_all_button' => ['background_color' => 'var(--bde-brand-primary-color)', 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'spacing' => ['margin' => ['breakpoint_base' => ['left' => null]], 'padding' => ['breakpoint_base' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px']]]], 'border' => ['border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]], 'offset_top' => ['breakpoint_base' => ['number' => 48, 'unit' => 'px', 'style' => '48px']], 'single_item' => ['background_color_hover' => '#EBEBEBFF'], 'borders' => ['radius' => ['breakpoint_base' => ['bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'custom', 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]], 'shadow' => ['breakpoint_base' => ['shadows' => ['0' => ['color' => '#00000025', 'x' => '5', 'y' => '20', 'blur' => '75', 'spread' => '0', 'position' => 'outset']], 'style' => '5px 20px 75px 0px #00000025']]]], 'top_bar' => ['background_color' => '#E4E4E4FF', 'spacing' => ['padding' => ['breakpoint_base' => ['top' => null]], 'margin' => ['breakpoint_base' => ['top' => null]]], 'results_typography' => ['color' => ['breakpoint_base' => '#404040FF']]], 'dropdown' => ['icon' => null, 'background_color' => '#FFFFFFFF', 'spacing' => ['padding' => ['breakpoint_base' => ['top' => null, 'left' => null, 'right' => null, 'bottom' => null]], 'margin' => ['breakpoint_base' => ['right' => null, 'left' => null, 'top' => null]]], 'single_item' => ['padding' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'right' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]], 'background_color' => null, 'background_color_hover' => '#000000FF', 'typography' => ['color' => ['breakpoint_base' => null], 'color_hover' => ['breakpoint_base' => '#FFFFFFFF']], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all']]]], 'width' => ['number' => 150, 'unit' => 'px', 'style' => '150px'], 'borders' => ['radius' => ['breakpoint_base' => ['topRight' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'editMode' => 'custom', 'bottomRight' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottomLeft' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'topLeft' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]], 'container' => ['wdith' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'max_width' => ['number' => 600, 'unit' => 'px', 'style' => '600px']]]];
    }

    static function defaultChildren()
    {
        return false;
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [c(
        "container",
        "Container",
        [c(
        "wdith",
        "Wdith",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "max_width",
        "Max Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "input",
        "Input",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background",
        "Background",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        true,
        [],
      ), c(
        "focus_color",
        "Focus Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "borders",
        "Borders",
        [c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'border_radius', 'layout' => 'inline'],
        true,
        true,
        [],
      ), c(
        "border",
        "Border",
        [],
        ['type' => 'border_complex', 'layout' => 'vertical'],
        true,
        true,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "width",
        "Width",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "dropdown",
        "Dropdown",
        [c(
        "icon",
        "Icon",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "right_position",
        "Right Position",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "top_position",
        "Top Position",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "single_item",
        "Single Item",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "count",
        "Count",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "space",
        "Space",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.search_form.include_taxonomy_count', 'operand' => 'is set', 'value' => '']]], 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "button",
        "Button",
        [c(
        "icon",
        "Icon",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'content.search_form.button_type', 'operand' => 'equals', 'value' => 'icon']]]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border",
        "Border",
        [c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'border_radius', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border",
        "Border",
        [],
        ['type' => 'border_complex', 'layout' => 'vertical'],
        false,
        true,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "top_bar",
        "Top Bar",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Results Typography",
      "results_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "results",
        "Results",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "max_height",
        "Max Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "single_item",
        "Single Item",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "align_content",
        "Align Content",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Top', 'icon' => 'FlexAlignTopIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterVerticalIcon'], '2' => ['text' => 'Bottom', 'value' => 'flex-end', 'icon' => 'FlexAlignBottomIcon']]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Title",
      "title",
       ['type' => 'popout']
     ), c(
        "image",
        "Image",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Excerpt",
      "excerpt",
       ['type' => 'popout']
     ), c(
        "price",
        "Price",
        [getPresetSection(
      "EssentialElements\\typography",
      "Sale Price ",
      "sale_price_",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Current Price",
      "current_price",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "show_all_button",
        "Show All Button",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border",
        "Border",
        [c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'border_radius', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border",
        "Border",
        [],
        ['type' => 'border_complex', 'layout' => 'vertical'],
        false,
        true,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "offset_top",
        "Offset Top",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "spinner",
        "Spinner",
        [c(
        "show_spinner_inside_builder",
        "Show Spinner Inside Builder",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "position_top",
        "Position Top",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "positon_right",
        "Positon Right",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "spinner_color",
        "Spinner Color",
        [c(
        "primary",
        "Primary",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "secondary",
        "Secondary",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "search_form",
        "Search Form",
        [c(
        "placeholder",
        "Placeholder",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "button_type",
        "Button Type",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Text', 'value' => 'text'], '1' => ['value' => 'icon', 'text' => 'Icon'], '2' => ['text' => 'Disable', 'value' => 'disable']]],
        false,
        false,
        [],
      ), c(
        "search_button_name",
        "Search Button Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "include_taxonomy",
        "Include Taxonomy",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "taxonomy_name_for_all",
        "Taxonomy Name for All",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.search_form.include_taxonomy', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "taxonomy_type",
        "Taxonomy Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_taxonomies', 'fetchContextPath' => '', 'refetchPaths' => []]], 'condition' => ['0' => ['0' => ['path' => 'content.search_form.include_taxonomy', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "taxonomy_order",
        "Taxonomy Order",
        [c(
        "order",
        "Order",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'ASC', 'text' => 'Ascending'], '1' => ['text' => 'Descending', 'value' => 'DESC']]],
        false,
        false,
        [],
      ), c(
        "orderby",
        "Orderby",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'name', 'text' => 'Name'], '1' => ['text' => 'Category Order', 'value' => 'term_order'], '2' => ['text' => 'Count', 'value' => 'count']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'content.search_form.include_taxonomy', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "exclude_empty_taxonomies",
        "Exclude Empty Taxonomies",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.search_form.include_taxonomy', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "include_taxonomy_count",
        "Include Taxonomy Count",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.search_form.include_taxonomy', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "open_dropdown_wrapper",
        "Open Dropdown Wrapper",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'triggerActionsButtonOptions' => ['text' => 'Open'], 'condition' => ['0' => ['0' => ['path' => 'content.search_form.include_taxonomy', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "query",
        "Query",
        [c(
        "query",
        "Query",
        [],
        ['type' => 'wp_query', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "include_sku_search",
        "Include SKU Search",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "include_normal_search_with_sku",
        "Include Normal Search with SKU",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.query.include_sku_search', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "no_results_message",
        "No Results Message",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "show_dummy_results",
        "Show Dummy Results",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "dummyme",
        "DummyMe",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Dummy results are useful for styling inside Breakdance Builder. <strong>It may not show correct results in builder.</strong></p>']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "result",
        "Result",
        [c(
        "excerpt",
        "Excerpt",
        [c(
        "excerpt_length",
        "Excerpt Length",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "disable_excerpt",
        "Disable Excerpt",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "show_featured_image",
        "Show Featured Image",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "show_result_count",
        "Show Result Count",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "show_prices",
        "Show Prices",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "show_all_results_button",
        "Show All Results Button",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "all_results_button_text",
        "All Results Button Text",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.result.show_all_results_button', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "results_before_text",
        "Results Before Text",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Results: '],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "responsiveness",
        "Responsiveness",
        [c(
        "scroll_to_top_on_input",
        "Scroll to top on input",
        [],
        ['type' => 'breakpoint_dropdown', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['title' => 'FetchSearch','scripts' => [DESTINY_ELEMENTS_PLUGIN_URL .'elements/dependencies-files/advanced-search-min.js'],],'1' =>  ['title' => 'Scroll to top','inlineScripts' => ['const deBreakPoints%%ID%% = {
  breakpoint_base : 1,
  breakpoint_tablet_landscape : 1119,
  breakpoint_tablet_portrait : 1023,
  breakpoint_phone_landscape : 767,
  breakpoint_phone_portrait : 479
}

const deSearchWrapper%%ID%% = document.querySelector(\'%%SELECTOR%%\');

deSearchWrapper%%ID%%.addEventListener(\'click\', function() {
  	if(deBreakPoints%%ID%%.{{content.responsiveness.scroll_to_top_on_input}} == 1) {
  		deSearchWrapper%%ID%%.scrollIntoView();
	}
	if(deBreakPoints%%ID%%.{{content.responsiveness.scroll_to_top_on_input}} >= window.innerWidth) {
      	deSearchWrapper%%ID%%.scrollIntoView();
    }
});
            
      '],'builderCondition' => 'return false;','frontendCondition' => '{% if content.responsiveness.scroll_to_top_on_input %}
return true;
{% else %}
return false;
{% endif %}',],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => 'if(document.querySelector(\'%%SELECTOR%% .de-search-tax-wrapper\')) {
	{% if content.search_form.open_dropdown_wrapper %}
    document.querySelector(\'%%SELECTOR%% .de-search-tax-wrapper\').classList.add(\'active\');
    {% else %}
    document.querySelector(\'%%SELECTOR%% .de-search-tax-wrapper\').classList.remove(\'active\');
    {% endif %}
}',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return false;
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 5;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '10' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return false;
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return false;
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.options.query', 'content.search_form.placeholder', 'content.options.show_dummy_results', 'content.options.disable_feaarued_image', 'content.content.show_featured_image', 'content.result.show_featured_image', 'content.query.show_dummy_results', 'content.query.query', 'content.result.show_prices', 'content.result.show_all_results_button', 'content.search_form.search_button_name', 'content.result.results_before_text', 'content.search_form.include_taxonomy', 'design.input.select.select_icon', 'design.input.select.icon.icon', 'content.search_form.taxonomy_name_for_all', 'content.search_form.taxonomy_type', 'design.dropdown.icon.icon', 'content.result.excerpt.disable_excerpt', 'content.result.excerpt.excerpt_length', 'content.result.all_results_button_text', 'content.result.show_result_count', 'content.search_form.button_type', 'design.button.icon.icon', 'content.query.include_sku_search', 'content.search_form.taxonomy_order.order', 'content.search_form.exclude_empty_taxonomies', 'content.query.include_normal_search_with_sku', 'content.query.sku_results_heading'];
    }
}
