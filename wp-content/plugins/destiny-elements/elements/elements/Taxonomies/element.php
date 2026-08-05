<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\Taxonomies",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class Taxonomies extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M345 39.1L472.8 168.4c52.4 53 52.4 138.2 0 191.2L360.8 472.9c-9.3 9.4-24.5 9.5-33.9 .2s-9.5-24.5-.2-33.9L438.6 325.9c33.9-34.3 33.9-89.4 0-123.7L310.9 72.9c-9.3-9.4-9.2-24.6 .2-33.9s24.6-9.2 33.9 .2zM0 229.5V80C0 53.5 21.5 32 48 32H197.5c17 0 33.3 6.7 45.3 18.7l168 168c25 25 25 65.5 0 90.5L277.3 442.7c-25 25-65.5 25-90.5 0l-168-168C6.7 262.7 0 246.5 0 229.5zM144 144c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z"/></svg>';
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
        return 'Taxonomies';
    }

    static function className()
    {
        return 'de_categories';
    }

    static function category()
    {
        return 'destiny_blog';
    }

    static function badge()
    {
        return false;
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
        return ['content' => ['main_options' => ['taxonomy_type' => 'categories', 'icnlude_link' => true, 'tag' => 'p', 'enable_links' => true, 'include_description' => false, 'select_taxonomy' => 'category', 'extra_acf_fields' => ['0' => []], 'extra_fields' => [], 'extra_field' => ['0' => []], 'only_current_post_tax' => false], 'order' => ['order_by' => 'title', 'order' => 'ASC', 'extra_field' => 'acf', 'extra_fields' => 'acf'], 'query' => ['query' => null], 'extra_support' => ['extra_fields' => 'acf'], 'extras' => ['hide_empty_taxonomies' => true, 'parent_only' => true, 'exclude_taxonomies' => ['0' => ['taxonomy' => []]], 'exclude_taxonomies_by_id' => null, 'include_taxonomies_count' => false, 'taxonomies_count_strings' => ['before_taxonomies_count' => '(', 'after_taxonomies_count' => ')']], 'children' => ['include_nested_children' => true, 'include_dropdown' => true]], 'design' => ['layout' => ['display' => 'list', 'layout' => 'horizontal', 'flex_grow' => true, 'gap' => ['breakpoint_base' => ['number' => 5, 'unit' => 'px', 'style' => '5px']], 'grid_columns' => ['breakpoint_tablet_portrait' => null, 'breakpoint_base' => 4], 'max_grid_width' => null, 'min_grid_width' => ['breakpoint_base' => null]], 'typography' => ['taxonomy_typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 25, 'unit' => 'px', 'style' => '25px']]]]]], 'description_typography' => null], 'container' => ['baackground_color' => null, 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'border' => ['border_radius' => null], 'size' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'max_width' => ['breakpoint_base' => ['number' => 300, 'unit' => 'px', 'style' => '300px']]], 'background_color' => null], 'taxomony' => ['spacing' => ['padding' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'left' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'right' => ['number' => 12, 'unit' => 'px', 'style' => '12px']]], 'baackground_color' => '#0b2035', 'border' => ['border_radius' => ['all' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'topLeft' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'topRight' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'bottomLeft' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'bottomRight' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'editMode' => 'all']], 'baackground_color_hover' => '#fc7904'], 'taxonomy' => ['border' => ['border_radius' => null], 'background_color' => null, 'background_color_hover' => null, 'spacing' => ['margin' => ['top' => null, 'bottom' => null]]], 'taxonomy_box' => ['baackground_color' => null, 'baackground_color_hover' => null, 'spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'right' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'margin' => ['breakpoint_base' => ['top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]], 'borders' => ['radius' => ['breakpoint_base' => null]], 'max_width' => ['breakpoint_base' => ['number' => null, 'unit' => 'custom', 'style' => null], 'breakpoint_tablet_portrait' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'min_width' => null, 'mix_width' => ['number' => 250, 'unit' => 'px', 'style' => '250px'], 'max_heigh' => ['number' => 250, 'unit' => 'px', 'style' => '250px'], 'max_height' => null, 'width' => null, 'background_color' => null, 'background_color_hover' => null], 'taxonomy_name' => ['background_color' => 'var(--bde-brand-primary-color)', 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'topLeft' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'topRight' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'bottomLeft' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'bottomRight' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'editMode' => 'all']]], 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'left' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'right' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'margin' => ['breakpoint_base' => ['top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 2, 'unit' => 'px', 'style' => '2px']]]], 'background_color_hover' => null, 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_tablet_portrait' => ['number' => 22, 'unit' => 'px', 'style' => '22px']], 'advanced' => ['textTransform' => ['breakpoint_tablet_portrait' => 'capitalize']]]]], 'text_align' => ['breakpoint_tablet_portrait' => 'left'], 'color' => ['breakpoint_base' => '#FFFFFFFF'], 'color_hover' => null], 'active_text_color' => '#FFFFFFFF', 'actrive_background_color' => '#262A56', 'active_background_color' => 'var(--bde-brand-primary-color)'], 'taxonomy_description' => ['typography' => null, 'background_color' => null, 'background_color_hover' => null, 'spacing' => ['margin' => ['breakpoint_tablet_portrait' => ['top' => null]]], 'borders' => ['border' => null]], 'taxonomy_child' => ['typography' => ['color' => ['breakpoint_base' => '#262A56'], 'color_hover' => ['breakpoint_base' => '#B8621B']], 'background_color' => null, 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottom' => ['number' => 3, 'unit' => 'px', 'style' => '3px']]]], 'background_color_hover' => null, 'active_text_color' => null], 'taxonomy_child_box' => ['background_color' => null, 'max_width' => ['breakpoint_base' => null], 'background_color_hover' => null, 'spacing' => ['margin' => ['breakpoint_base' => ['left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]]], 'dropdown' => ['dropdown_icon' => ['slug' => 'icon-angle-down.', 'name' => 'angle down', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"/></svg>'], 'padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'right' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'bottom' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'left' => ['number' => 7, 'unit' => 'px', 'style' => '7px']]]], 'icon_size' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'icon_position_top' => null, 'icon_position_right' => null, 'icon_color' => '#FFFFFFFF']]];
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
        "layout",
        "Layout",
        [c(
        "display",
        "Display",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex', 'text' => 'Flex'], '1' => ['text' => 'Grid', 'value' => 'grid'], '2' => ['text' => 'List', 'value' => 'list']]],
        false,
        false,
        [],
      ), c(
        "grid_columns",
        "Grid Columns",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 2, 'max' => 12], 'condition' => ['0' => ['0' => ['path' => 'design.layout.display', 'operand' => 'equals', 'value' => 'grid']]]],
        true,
        false,
        [],
      ), c(
        "min_grid_width",
        "Min Grid Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.display', 'operand' => 'equals', 'value' => 'grid']]]],
        true,
        false,
        [],
      ), c(
        "grid_rows",
        "Grid Rows",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 1, 'max' => 100], 'condition' => ['0' => ['0' => ['path' => 'design.layout.display', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "layout",
        "Layout",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'vertical', 'text' => 'Vertical'], '1' => ['text' => 'Horizontal', 'value' => 'horizontal']], 'condition' => ['0' => ['0' => ['path' => 'design.layout.display', 'operand' => 'not equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "flex_grow",
        "Flex Grow",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.display', 'operand' => 'not equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
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
        "container",
        "Container",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\size",
      "Size",
      "size",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "taxonomy_box",
        "Taxonomy Box",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "max_height",
        "Max Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.display', 'operand' => 'equals', 'value' => 'flex']]]],
        false,
        false,
        [],
      ), c(
        "max_width",
        "Max Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "taxonomy_name",
        "Taxonomy Name",
        [getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "active_text_color",
        "Active Text Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_background_color",
        "Active Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "taxonomy_description",
        "Taxonomy Description",
        [getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
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
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "taxonomy_child_box",
        "Taxonomy Child Box",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "max_height",
        "Max Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.display', 'operand' => 'equals', 'value' => 'flex']]]],
        false,
        false,
        [],
      ), c(
        "max_width",
        "Max Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "taxonomy_child",
        "Taxonomy Child",
        [getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "active_text_color",
        "Active Text Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "taxonomy_count",
        "Taxonomy Count",
        [c(
        "background_colour",
        "Background Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "dropdown",
        "Dropdown",
        [c(
        "dropdown_icon",
        "Dropdown Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "icon_color",
        "Icon Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "icon_size",
        "Icon Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "icon_position_top",
        "Icon Position Top",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 20]],
        false,
        false,
        [],
      ), c(
        "icon_position_right",
        "Icon Position Right",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 20]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'accordion']],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "main_options",
        "Main Options",
        [c(
        "select_taxonomy",
        "Select Taxonomy",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_taxonomies', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "enable_links",
        "Enable Links",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "tag",
        "Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'p', 'text' => 'p'], '1' => ['text' => 'span', 'value' => 'span'], '2' => ['text' => 'h2', 'value' => 'h2'], '3' => ['text' => 'h3', 'value' => 'h3'], '4' => ['text' => 'h4', 'value' => 'h4'], '5' => ['text' => 'h5', 'value' => 'h5'], '6' => ['text' => 'div', 'value' => 'div']]],
        false,
        false,
        [],
      ), c(
        "include_description",
        "Include Description",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "only_current_post_tax",
        "Only Current Post Tax",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "order",
        "Order",
        [c(
        "order",
        "Order",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'ASC', 'text' => 'Ascending'], '1' => ['text' => 'Descending', 'value' => 'DESC']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "children",
        "Children",
        [c(
        "include_nested_children",
        "Include Nested Children",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "include_dropdown",
        "Include Dropdown",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "extras",
        "Extras",
        [c(
        "hide_empty_taxonomies",
        "Hide Empty Taxonomies",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "parent_only",
        "Parent Only",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "exclude_taxonomies_by_id",
        "Exclude Taxonomies by ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '1,2,5'],
        false,
        false,
        [],
      ), c(
        "tax_message",
        "Tax Message",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.extras.exclude_taxonomies_by_id', 'operand' => 'is set', 'value' => '']]], 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>For exampleI ID\'s written like this: 1, 2, 3 or 1,2,3 etc...</p>']],
        false,
        false,
        [],
      ), c(
        "include_taxonomies_count",
        "Include Taxonomies Count",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "taxonomies_count_strings",
        "Taxonomies Count Strings",
        [c(
        "before_taxonomies_count",
        "Before Taxonomies Count",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "after_taxonomies_count",
        "After Taxonomies Count",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'content.extras.include_taxonomies_count', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "dropdown",
        "Dropdown",
        [c(
        "initial_active_ids",
        "Initial Active IDs",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'example: 1,2,3'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.children.include_dropdown', 'operand' => 'is set', 'value' => '']]]],
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
        return ['0' =>  ['title' => 'Script','inlineScripts' => ['const deDropDownTaxIcon = document.querySelectorAll(\'.de-dropdown\');

deDropDownTaxIcon.forEach((el) => {
  el.addEventListener(\'click\', function() {
    const elWrapper = el.parentElement.querySelector(\'.de-taxonomy-child-wrapper\');
    console.log(elWrapper);
    console.log(el);
    if(elWrapper) {
      el.parentElement.classList.toggle(\'active\');
    }
  });
});'],],];
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return false;
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
        return 340;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.main_options.extra_fields[].input'], '1' => ['accepts' => 'string', 'path' => 'content.order.new_control'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['content.main_options.taxonomy_type', 'content.main_options.tag', 'content.order.order', 'content.main_options.enable_links', 'content.main_options.select_taxonomy', 'content.main_options.include_description', 'content.main_options.extra_fields', 'content.extras.hide_empty_taxonomies', 'content.extras.parent_only', 'content.extras.exclude_taxonomies_by_id', 'content.children.include_nested_children', 'content.children.include_dropdown', 'design.dropdown.dropdown_icon', 'content.dropdown.initial_active_ids', 'content.main_options.only_current_post_tax', 'content.extras.taxonomies_count_strings', 'content.extras.taxonomies_count_strings.before_taxonomies_count', 'content.extras.taxonomies_count_strings.after_taxonomies_count', 'content.extras.include_taxonomies_count'];
    }
}
