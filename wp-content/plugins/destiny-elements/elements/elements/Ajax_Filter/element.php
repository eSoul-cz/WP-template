<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\AjaxFilter",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class AjaxFilter extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>';
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
        return 'Faceted Search';
    }

    static function className()
    {
        return 'de-ajax-filter';
    }

    static function category()
    {
        return 'destiny_ess';
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
        return ['content' => ['filters' => ['filters' => ['0' => ['filter_label' => 'Search', 'filter_type' => 'search', 'search_placeholder' => 'Search Posts', 'width' => null], '1' => ['filter_label' => 'Category', 'filter_type' => 'tax', 'select_taxonomie' => 'category', 'input_type' => 'dropdown_checkboxes', 'select_label' => 'Select Category', 'show_count' => true], '2' => ['filter_label' => 'Date', 'filter_type' => 'date', 'date_placeholder' => 'Select Date', 'max_width' => ['number' => 200, 'unit' => 'px', 'style' => '200px'], 'width' => null], '3' => ['filter_label' => 'Reset', 'filter_type' => 'reset', 'button_name' => 'Reset', 'width' => null]]], 'options' => ['dropdown' => ['show_all_option' => true, 'show_all_text' => 'Show All', 'show_empty_taxonomies' => null, 'show_empty_fields' => false, 'show_clear_all_button' => true], 'additional_libraries' => ['date_picker' => null], 'date_picker' => ['date_picker_library' => ['load' => 'local', 'disable' => false], 'date_format' => 'F j, Y', 'range_seperator' => ' to ']]], 'design' => ['container' => ['spacing' => ['padding' => ['breakpoint_base' => ['bottom' => null]], 'margin' => ['breakpoint_base' => ['top' => null, 'bottom' => ['number' => 25, 'unit' => 'px', 'style' => '25px']]]], 'width' => null], 'dropdown' => null, 'buttons' => ['reset_button' => ['style' => 'primary'], 'clear_all_button' => ['icon' => ['slug' => 'icon-window-close.', 'name' => 'icon-window-close.', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M464 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 394c0 3.3-2.7 6-6 6H54c-3.3 0-6-2.7-6-6V86c0-3.3 2.7-6 6-6h404c3.3 0 6 2.7 6 6v340zM356.5 194.6L295.1 256l61.4 61.4c4.6 4.6 4.6 12.1 0 16.8l-22.3 22.3c-4.6 4.6-12.1 4.6-16.8 0L256 295.1l-61.4 61.4c-4.6 4.6-12.1 4.6-16.8 0l-22.3-22.3c-4.6-4.6-4.6-12.1 0-16.8l61.4-61.4-61.4-61.4c-4.6-4.6-4.6-12.1 0-16.8l22.3-22.3c4.6-4.6 12.1-4.6 16.8 0l61.4 61.4 61.4-61.4c4.6-4.6 12.1-4.6 16.8 0l22.3 22.3c4.7 4.6 4.7 12.1 0 16.8z"/></svg>', 'iconSetSlug' => 'FontAwesome 5 Free - Regular'], 'preview_button' => true, 'size' => ['number' => 13, 'unit' => 'px', 'style' => '13px'], 'colour' => '#949494FF', 'right_space' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'colour_hover' => '#313131FF']], 'inputs' => ['search' => null, 'outline' => ['focus_outline' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-button-primary-background-color)', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-button-primary-background-color)', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-button-primary-background-color)', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-button-primary-background-color)', 'style' => 'solid']]], 'radius' => ['breakpoint_base' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]]], 'input_focus' => ['focus_border' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid']]]]], 'input_hover' => ['opacity' => 0.7, 'opacity_hover' => 1], 'dropdown' => ['gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'max_height' => ['number' => 250, 'unit' => 'px', 'style' => '250px'], 'background_color' => '#FFFFFFFF', 'borders' => ['shadow' => ['breakpoint_base' => ['shadows' => ['0' => ['color' => '#00000025', 'x' => '5', 'y' => '20', 'blur' => '75', 'spread' => '0', 'position' => 'outset']], 'style' => '5px 20px 75px 0px #00000025']], 'radius' => ['breakpoint_base' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#B3B3B3FF', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#B3B3B3FF', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#B3B3B3FF', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#B3B3B3FF', 'style' => 'solid']]]], 'icon' => ['icon' => ['slug' => 'icon-angle-down.', 'name' => 'icon-angle-down.', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"/></svg>', 'iconSetSlug' => 'FontAwesome 5 Free - Solid'], 'colour' => null, 'size' => null, 'padding' => ['padding_right' => ['breakpoint_base' => null], 'padding_left' => ['breakpoint_base' => ['number' => 2, 'unit' => 'px', 'style' => '2px']]]], 'single_option' => ['typography' => ['color' => null, 'color_hover' => null], 'background_color' => null, 'background_color_hover' => '#F1F1F14F', 'padding' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]]], 'borders' => null], 'checkboxes' => ['background_color' => '#FFFFFFFF', 'background_color_hover' => 'var(--bde-brand-primary-color)', 'active_colour' => 'var(--bde-brand-primary-color)', 'size' => null, 'borders' => ['radius' => ['breakpoint_base' => null], 'border' => ['breakpoint_base' => ['top' => ['color' => 'var(--bde-brand-primary-color)', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'bottom' => ['color' => 'var(--bde-brand-primary-color)', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'left' => ['color' => 'var(--bde-brand-primary-color)', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'right' => ['color' => 'var(--bde-brand-primary-color)', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid']]]]], 'padding' => ['padding_top' => ['breakpoint_base' => ['number' => 10, 'unit' => 'px', 'style' => '10px']], 'padding_bottom' => ['breakpoint_base' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'preview_dropdown' => false, 'parent_heading' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '600']]]]], 'spacing' => ['margin' => ['breakpoint_base' => ['left' => ['number' => 13, 'unit' => 'px', 'style' => '13px']]]]], 'child_options' => ['typography_child_filter_' => ['color' => null, 'typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700']]]]], 'typography_children_' => ['color' => ['breakpoint_base' => '#702CFFFF']], 'child_filter' => ['parent_spacing' => ['margin' => ['breakpoint_base' => ['left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'parent_typography' => ['typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700']]]]]], 'taxonomy_children' => ['spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 35, 'unit' => 'px', 'style' => '35px']]]]]]], 'all_inputs' => ['placeholder_typography' => ['color' => null, 'color_hover' => null], 'background_colour' => '#FFFFFFFF', 'background_colour_hover' => null, 'size' => ['width' => ['breakpoint_base' => ['number' => 200, 'unit' => 'px', 'style' => '200px']], 'max_width' => ['breakpoint_base' => null]], 'borders' => ['border' => ['breakpoint_base' => ['top' => ['color' => '#6D6D6DFF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'bottom' => ['color' => '#6D6D6DFF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'left' => ['color' => '#6D6D6DFF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'right' => ['color' => '#6D6D6DFF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid']]], 'radius' => ['breakpoint_base' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]], 'padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'effects' => ['opacity' => 0.8, 'opacity_hover' => 1], 'flex_grow' => true], 'date_picker' => ['primary_background_colour' => 'var(--bde-brand-primary-color)', 'primary_text_colour' => '#FFFFFFFF'], 'radio_buttons' => ['gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'layout' => 'vertical', 'enable_label' => false, 'show_label' => true, 'typography' => ['color' => null], 'radio_button' => ['background_color' => null, 'background_color_hover' => 'var(--bde-brand-primary-color)', 'borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid']]]], 'padding' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'size' => ['number' => 18, 'unit' => 'px', 'style' => '18px'], 'active_colour' => 'var(--bde-brand-primary-color)']], 'chekboxes' => ['show_label' => true, 'layout' => 'vertical', 'gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'typography' => ['color' => null], 'check_button' => ['background_color' => null, 'background_color_hover' => null, 'size' => null, 'borders' => ['border' => null, 'radius' => ['breakpoint_base' => null]]]], 'button_layout' => ['layout' => null, 'gap' => null, 'show_label' => true, 'single_button' => null, 'typography' => ['color' => null, 'color_hover' => null]]], 'loading' => ['animation_type' => 'loading_circle_one', 'min_height' => null, 'opacity' => 0.6, 'preview_loading' => false, 'loading_circle' => ['colour' => 'var(--bde-brand-primary-color)', 'size' => ['number' => 3, 'unit' => 'rem', 'style' => '3rem']]], 'labels' => ['show_labels' => false, 'typography' => ['color' => null, 'typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '500'], 'fontSize' => ['breakpoint_base' => ['number' => 1.5, 'unit' => 'rem', 'style' => '1.5rem']]]]]], 'spacing' => ['padding' => ['breakpoint_base' => ['left' => null]], 'margin' => ['breakpoint_base' => ['bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]]], 'layout' => ['display' => 'flex', 'gap' => ['breakpoint_base' => null], 'flex_wrap' => ['breakpoint_base' => 'wrap']]]];
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
        [getPresetSection(
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
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "layout",
        "Layout",
        [c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "flex_wrap",
        "Flex Wrap",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'wrap', 'text' => 'Wrap'], '1' => ['text' => 'No Wrap', 'value' => 'nowrap']]],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "labels",
        "Labels",
        [c(
        "show_labels",
        "Show Labels",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
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
        "inputs",
        "Inputs",
        [c(
        "all_inputs",
        "All Inputs",
        [getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Placeholder Typography",
      "placeholder_typography",
       ['type' => 'popout']
     ), c(
        "background_colour",
        "Background Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "flex_grow",
        "Flex Grow",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
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
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), c(
        "effects",
        "Effects",
        [c(
        "opacity",
        "Opacity",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 2]],
        false,
        true,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "search",
        "Search",
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
        "colour",
        "Colour",
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
      ), getPresetSection(
      "EssentialElements\\spacing_padding_x",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "dropdown",
        "Dropdown",
        [c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "max_height",
        "Max Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
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
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
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
        "colour",
        "Colour",
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
      ), getPresetSection(
      "EssentialElements\\spacing_padding_x",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "single_option",
        "Single Option",
        [getPresetSection(
      "EssentialElements\\typography_with_effects_and_align_with_hoverable_color_and_effects",
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
        "borders",
        "Borders",
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
        "checkboxes",
        "Checkboxes",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_colour",
        "Active Colour",
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
      "EssentialElements\\spacing_padding_y",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), c(
        "child_options",
        "Child Options",
        [c(
        "child_filter",
        "Child Filter",
        [getPresetSection(
      "EssentialElements\\typography",
      "Parent Typography",
      "parent_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_margin_all",
      "Parent Spacing",
      "parent_spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "taxonomy_children",
        "Taxonomy Children",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "preview_dropdown",
        "Preview Dropdown",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "radio_buttons",
        "Radio Buttons",
        [c(
        "layout",
        "Layout",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'hor', 'text' => 'Horizontal'], '1' => ['text' => 'Vertical', 'value' => 'vertical']]],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "radio_button",
        "Radio Button",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_colour",
        "Active Colour",
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
      ), c(
        "show_label",
        "Show Label",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.labels.show_labels', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "chekboxes",
        "Chekboxes",
        [c(
        "layout",
        "Layout",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'hor', 'text' => 'Horizontal'], '1' => ['text' => 'Vertical', 'value' => 'vertical']]],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "check_button",
        "Check Button",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_colour",
        "Active Colour",
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
      ), c(
        "show_label",
        "Show Label",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.labels.show_labels', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "button_layout",
        "Button Layout",
        [c(
        "layout",
        "Layout",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'hor', 'text' => 'Horizontal'], '1' => ['text' => 'Vertical', 'value' => 'vertical']]],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_with_hoverable_color_and_effects",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "single_button",
        "Single Button",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active",
        "Active",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "text_color",
        "Text Color",
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
     ), c(
        "flex_grow",
        "Flex Grow",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "show_label",
        "Show Label",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.labels.show_labels', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "price_range",
        "Price Range",
        [c(
        "thumbs",
        "Thumbs",
        [c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
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
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders Hover",
      "borders_hover",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "progress_bar",
        "Progress Bar",
        [c(
        "background_colour",
        "Background Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "fill_colour",
        "Fill Colour",
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
        "show_label",
        "Show Label",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "rating",
        "Rating",
        [c(
        "stars",
        "Stars",
        [c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "start_fill",
        "Start Fill",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "star_outline",
        "Star Outline",
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
        "checkboxes",
        "Checkboxes",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_colour",
        "Active Colour",
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
      ), c(
        "show_label",
        "Show Label",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "date_picker",
        "Date Picker",
        [c(
        "primary_background_colour",
        "Primary Background Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "primary_text_colour",
        "Primary Text Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
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
        "colour",
        "Colour",
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
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "input_focus",
        "Input Focus",
        [getPresetSection(
      "EssentialElements\\borders",
      "Focus Border",
      "focus_border",
       ['type' => 'popout']
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
        "buttons",
        "Buttons",
        [getPresetSection(
      "EssentialElements\\AtomV1ButtonDesign",
      "Reset Button",
      "reset_button",
       ['type' => 'popout']
     ), c(
        "clear_all_button",
        "Clear All Button",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "colour",
        "Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "right_space",
        "Right Space",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "preview_button",
        "Preview Button",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\AtomV1ButtonDesign",
      "Search Button",
      "search_button",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "loading",
        "Loading",
        [c(
        "animation_type",
        "Animation Type",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'Opacity', 'text' => 'Opacity'], '1' => ['text' => 'Loading Circle', 'value' => 'loading_circle_one']]],
        false,
        false,
        [],
      ), c(
        "opacity",
        "Opacity",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 2]],
        false,
        false,
        [],
      ), c(
        "loading_circle",
        "Loading Circle",
        [c(
        "colour",
        "Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px', '1' => 'em', '2' => 'rem']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'design.loading.animation_type', 'operand' => 'equals', 'value' => 'loading_circle_one']]]],
        false,
        false,
        [],
      ), c(
        "preview_loading",
        "Preview Loading",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        "filters",
        "Filters",
        [c(
        "message_for_filters",
        "Message For Filters",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p><a target="_blank" href="https://destiny.ie/documentation/faceted-search/">Read documentation.</a></p>']],
        false,
        false,
        [],
      ), c(
        "filters",
        "Filters",
        [c(
        "filter_label",
        "Filter Label",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "filter_type",
        "Filter Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [], 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_filter_types', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "acf_meta_key",
        "ACF Meta Key",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_acf_fields', 'fetchContextPath' => '', 'refetchPaths' => []]], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_key",
        "Meta Box Key",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_meta_box_fields', 'fetchContextPath' => '', 'refetchPaths' => []]], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'meta_box']]]],
        false,
        false,
        [],
      ), c(
        "select_taxonomie",
        "Select Taxonomie",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_taxonomies', 'fetchContextPath' => '', 'refetchPaths' => []]], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
        [],
      ), c(
        "author_role",
        "Author Role",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'author']]], 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_author_role', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "input_type",
        "Input Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'dropdown', 'text' => 'Dropdown'], '1' => ['text' => 'Dropdown Checkboxes', 'value' => 'dropdown_checkboxes'], '2' => ['text' => 'Radio Buttons', 'value' => 'radio'], '3' => ['text' => 'Checkboxes', 'value' => 'checkboxes'], '4' => ['text' => 'Button Layout', 'value' => 'buttons'], '5' => ['text' => 'Min/Max', 'value' => 'number']], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'tax']], '1' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'author']], '2' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'acf']], '3' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'meta_box']]]],
        false,
        false,
        [],
      ), c(
        "single_selection",
        "Single Selection",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'equals', 'value' => 'buttons']]]],
        false,
        false,
        [],
      ), c(
        "min_max_type",
        "Min/Max Type",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'dropdown', 'text' => 'Dropdown'], '1' => ['text' => 'Range Slider', 'value' => 'range']], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'equals', 'value' => 'number']]]],
        false,
        false,
        [],
      ), c(
        "dropdown_placeholders",
        "Dropdown Placeholders",
        [c(
        "min_placeholder",
        "Min Placeholder",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Min'],
        false,
        false,
        [],
      ), c(
        "max_placeholder",
        "Max Placeholder",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Max'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.min_max_type', 'operand' => 'equals', 'value' => 'dropdown']]]],
        false,
        false,
        [],
      ), c(
        "number_format",
        "Number Format",
        [c(
        "prepend",
        "Prepend",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "append",
        "Append",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "decimals",
        "Decimals",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "decimal_separator",
        "Decimal Separator",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "thousand_separator",
        "Thousand Separator",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'equals', 'value' => 'number']]]],
        false,
        false,
        [],
      ), c(
        "number_gap",
        "Number Gap",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'equals', 'value' => 'number']]]],
        false,
        false,
        [],
      ), c(
        "select_label",
        "Select Label",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'equals', 'value' => ['0' => 'dropdown']]], '1' => ['0' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'equals', 'value' => 'dropdown_checkboxes']], '2' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'sort']]]],
        false,
        false,
        [],
      ), c(
        "search_placeholder",
        "Search Placeholder",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'search']]]],
        false,
        false,
        [],
      ), c(
        "author_display_format",
        "Author Display Format",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'author']]], 'items' => ['0' => ['value' => 'username', 'text' => 'Username'], '1' => ['text' => 'First Name ', 'value' => 'first_name'], '2' => ['text' => 'Last Name', 'value' => 'last_name'], '3' => ['text' => 'First Name + Last Name', 'value' => 'first_last_name'], '4' => ['text' => 'Last Name + First Name', 'value' => 'last_first_name']]],
        false,
        false,
        [],
      ), c(
        "order",
        "Order",
        [c(
        "order_by",
        "Order By",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'name', 'text' => 'Name'], '1' => ['text' => 'Date', 'value' => 'date']]],
        false,
        false,
        [],
      ), c(
        "order",
        "Order",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Ascending', 'value' => 'ASC'], '1' => ['value' => 'DESC', 'text' => 'Descending']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'tax']], '1' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'author']]]],
        false,
        false,
        [],
      ), c(
        "button_name",
        "Button Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'reset']], '1' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'search_button']]]],
        false,
        false,
        [],
      ), c(
        "show_count",
        "Show Count",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'tax'], '1' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'not equals', 'value' => 'number']], '1' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'author'], '1' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'not equals', 'value' => 'number']], '2' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'acf'], '1' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'not equals', 'value' => 'number']], '3' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'meta_box'], '1' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'not equals', 'value' => 'number']], '4' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'rating'], '1' => ['path' => '%%CURRENTPATH%%.input_type', 'operand' => 'not equals', 'value' => 'number']]]],
        false,
        false,
        [],
      ), c(
        "date_placeholder",
        "Date Placeholder",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'date']]]],
        false,
        false,
        [],
      ), c(
        "include",
        "Include",
        [],
        ['type' => 'multiselect', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'sort']]], 'items' => ['0' => ['value' => 'date', 'text' => 'Date'], '1' => ['text' => 'Price: Low to High', 'value' => 'lth'], '2' => ['text' => 'Price: High to Low', 'value' => 'htl'], '3' => ['text' => 'Popularity', 'value' => 'popularity']]],
        false,
        false,
        [],
      ), c(
        "sort_labels",
        "Sort Labels",
        [c(
        "date",
        "Date",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "price_low_to_high",
        "Price: Low to High",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "price_high_to_low",
        "Price: High To Low",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "popularity",
        "Popularity",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'sort']]]],
        false,
        false,
        [],
      ), c(
        "child_options",
        "Child Options",
        [c(
        "message",
        "Message",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Child Filter currently available for Taxonomies with Dropdown and Dropdown Checkboxes inputs. </p>']],
        false,
        false,
        [],
      ), c(
        "child_filter",
        "Child Filter",
        [],
        ['type' => 'toggle', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.show_children', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "show_children",
        "Show Children",
        [],
        ['type' => 'toggle', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.child_filter', 'operand' => 'equals', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'equals', 'value' => 'tax']]]],
        false,
        false,
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
        "relation",
        "Relation",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'and', 'text' => 'AND'], '1' => ['text' => 'OR', 'value' => 'or']], 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'number'], '1' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'reset'], '2' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'search'], '3' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'date'], '4' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'search_button'], '5' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'price'], '6' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'rating'], '7' => ['path' => '%%CURRENTPATH%%.filter_type', 'operand' => 'not equals', 'value' => 'sort']]]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{filter_label}', 'defaultTitle' => 'filter', 'buttonName' => 'Add New Filter']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "options",
        "Options",
        [c(
        "dropdowns_and_inputs",
        "Dropdowns and Inputs",
        [c(
        "show_empty_fields",
        "Show Empty Fields",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "show_all_option",
        "Show All Option",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "show_clear_all_button",
        "Show Clear All Button",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "show_all_text",
        "Show All Text",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.dropdown.show_all_option', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "date_picker",
        "Date Picker",
        [c(
        "date_format",
        "Date Format",
        [],
        ['type' => 'text', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Date Format', 'value' => 'date_format']]],
        false,
        false,
        [],
      ), c(
        "range_seperator",
        "Range Seperator",
        [],
        ['type' => 'text', 'layout' => 'inline', 'placeholder' => ' to '],
        false,
        false,
        [],
      ), c(
        "date_picker_library",
        "Date Picker Library",
        [c(
        "disable",
        "Disable",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "load",
        "Load",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'local', 'text' => 'Local'], '1' => ['text' => 'CDN', 'value' => 'cdn']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "combined_search_relation",
        "Combined Search Relation",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'and', 'text' => 'AND'], '1' => ['text' => 'OR', 'value' => 'or']], 'condition' => ['0' => ['0' => ['path' => '', 'operand' => 'equals', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "non_archive_options",
        "Non Archive Options",
        [c(
        "message",
        "Message",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Want to search from a non-archive page? You can with enabling redirect! Just use the faceted search and you\'ll be redirected to the right page. Example archive URL: yourwebsite.com/projects.</p>']],
        false,
        false,
        [],
      ), c(
        "enable_redirect",
        "Enable Redirect",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "redirect_archive_url",
        "Redirect Archive URL",
        [],
        ['type' => 'url', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "post_type",
        "Post Type",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_registered_post_types', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "search_with_search_button",
        "Search with Search Button",
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
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['title' => 'DatePickLocal','styles' => [DESTINY_ELEMENTS_PLUGIN_URL .'elements/dependencies-files/flatpickr/flatpickr.min.css'],'scripts' => [DESTINY_ELEMENTS_PLUGIN_URL .'elements/dependencies-files/flatpickr/flatpick.min.js'],'frontendCondition' => '{% if content.options.date_picker.date_picker_library.disable == false and content.options.date_picker.date_picker_library.load == \'local\' %}
 	return true;
{% else %}
	return false;
{% endif %}','builderCondition' => '{% if content.options.date_picker.date_picker_library.disable == false and content.options.date_picker.date_picker_library.load == \'local\' %}
 	return true;
{% else %}
	return false;
{% endif %}',],'1' =>  ['title' => 'DatePickCDN','styles' => ['https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css'],'scripts' => ['https://cdn.jsdelivr.net/npm/flatpickr'],'frontendCondition' => '{% if content.options.date_picker.date_picker_library.disable == false and content.options.date_picker.date_picker_library.load == \'cdn\' %}
 	return true;
{% else %}
	return false;
{% endif %}','builderCondition' => '{% if content.options.date_picker.date_picker_library.disable == false and content.options.date_picker.date_picker_library.load == \'cdn\' %}
 	return true;
{% else %}
	return false;
{% endif %}',],'2' =>  ['title' => 'DeFilter','scripts' => [DESTINY_ELEMENTS_PLUGIN_URL .'elements/dependencies-files/ajax-filter.min.js'],],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => false];
    }

    static function addPanelRules()
    {
        return ['alwaysHide' => false];
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
        return [['name' => 'data-combined-relation', 'template' => '{{content.options.combined_search_relation}}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 0;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.filters.filters.reset_button.text'], '1' => ['accepts' => 'string', 'path' => 'content.filters.filters.reset_button.link.url'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '10' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '11' => ['accepts' => 'string', 'path' => 'content.non_archive_options.redirect_archive_url'], '12' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '13' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '14' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '15' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '16' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '17' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '18' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '19' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '20' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '21' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '22' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '23' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.dropdown.icon.icon', 'design.inputs.dropdown.icon.icon', 'design.labels.show_labels', 'design.layout.gap', 'design.layout.flex_wrap', 'design.layout.display', 'design.buttons.search_button.custom.size.full_width_at', 'design.buttons.search_button.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.filters', 'content.options', 'design.buttons.clear_all_button.icon', 'design.inputs.dropdown.icon.icon', 'design.inputs.price_range.show_label', 'design.inputs.saerch.icon.icon', 'design.buttons.reset_button', 'design.buttons.search_button', 'design.inputs.search.icon.icon'];
    }
}
