<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\FoodMenu",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class FoodMenu extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M101.5 64C114.6 26.7 150.2 0 192 0s77.4 26.7 90.5 64H320c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h37.5zM224 96c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zM160 368c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zM96 392c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24zm64-120c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zM96 296c13.3 0 24-10.7 24-24s-10.7-24-24-24s-24 10.7-24 24s10.7 24 24 24z"/></svg>';
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
        return 'Food Menu';
    }

    static function className()
    {
        return 'destiny-menu';
    }

    static function category()
    {
        return 'destiny_exs';
    }

    static function badge()
    {
        return false;
    }

    static function slug()
    {
        return __CLASS__;
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
        return ['content' => ['menu_items' => ['menu_category' => [['category_name' => 'Starters', 'menu_items' => [['menu_item_name' => 'Soup of the Day', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'price' => '€5.50', 'image' => null, 'allergens' => [['no' => 1], ['no' => 3]], 'image_dynamic_meta' => null], ['menu_item_name' => 'Chicken Caesar Salad', 'price' => '€8.75', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'image' => null, 'allergens' => [['no' => 1]], 'image_dynamic_meta' => null], ['menu_item_name' => 'Prawn Caesar Salad', 'price' => '€9.95', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'image' => null, 'allergens' => [['no' => 3], ['no' => 5]], 'image_dynamic_meta' => null], ['menu_item_name' => 'Chicken Wings', 'price' => '€9.95', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'image' => null, 'allergens' => [['no' => 2], ['no' => 3], ['no' => 4]], 'image_dynamic_meta' => null]]], ['category_name' => 'Main Course', 'menu_items' => [['menu_item_name' => 'Chicken Burger', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'price' => '€19.60', 'image' => null, 'allergens' => [['no' => 1], ['no' => 3]], 'image_dynamic_meta' => null], ['menu_item_name' => 'Chicken Stir Fry', 'price' => '€16.00', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'image' => null, 'allergens' => [['no' => 2], ['no' => 3]], 'image_dynamic_meta' => null], ['menu_item_name' => 'Chicken Curry', 'price' => '€16.00', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'image' => null, 'allergens' => [['no' => 1], ['no' => 2]], 'image_dynamic_meta' => null], ['menu_item_name' => 'Vegetable Stir Fry', 'price' => '€14.00', 'menu_description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non dapibus quam.</p>', 'image' => null, 'allergens' => [['no' => 2], ['no' => 3]], 'image_dynamic_meta' => null]]]]], 'options' => ['include_images' => 'yes', 'enable_images' => 'yes', 'enable_allergens' => false, 'enable_alergens' => false, 'enable_acf' => false, 'enable_tabs' => false, 'enable_drinks' => false], 'alergens_info' => ['alergens' => [['no' => 1, 'description' => '<p>Cereals containing gluten - wheat (such as spelt and khorasan wheat), rye, barley, oats</p>'], ['no' => 2, 'description' => '<p>Crustaceans e.g. crabs, prawns, lobsters</p>'], ['no' => 3, 'description' => '<p>etc...</p>']], 'heading' => 'Alergens', 'heading_color' => null, 'container' => ['padding' => ['top' => null], 'margin' => ['top' => null], 'border_radius' => null, 'border' => ['top' => ['width' => null, 'color' => '#C36A6AFF'], 'bottom' => [], 'left' => [], 'right' => []]], 'info' => ['color' => null, 'text_color' => null, 'no_color' => null], 'heading_name' => 'Allergens', 'display_location' => 'beside', 'separator' => 'comma', 'custom_seperator' => null], 'menu_items_acf_' => ['menu_items_sub_repeater' => ' menu_items', 'menu_items_sub_repeater_dynamic_meta' => null, 'categories_repeater' => null, 'categories_repeater_dynamic_meta' => null, 'categorie_name_sub_field' => null, 'image_sub_field_url_' => null, 'image_sub_field_url__dynamic_meta' => null, 'image_sub_field_array_' => 'image', 'item_name_sub_field' => 'name', 'item_description_sub_field' => 'description', 'price_sub_field' => 'price', 'allergens_sub_field' => 'allergens', 'categorie_name_sub_field_dynamic_meta' => null, 'category_repeater' => [['category_name' => null]], 'category_repeater_dynamic_meta' => null]], 'design' => ['box' => ['background' => null, 'width' => null], 'typography' => ['font' => null, 'category' => ['typography' => ['customTypography' => ['advanced' => ['textTransform' => null]]]]], 'image' => ['object_fit' => 'cover', 'border_radius' => null, 'height' => ['number' => 100, 'unit' => 'px', 'style' => '100px'], 'width' => ['number' => 100, 'unit' => 'px', 'style' => '100px']], 'description' => ['font_color' => null, 'margin' => ['top' => null], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null]]]], 'color' => ['breakpoint_base' => 'var(--bde-body-text-color)']], 'line' => ['border' => ['top' => ['width' => ['number' => 23, 'unit' => 'px', 'style' => '23px']], 'bottom' => ['width' => ['number' => 23, 'unit' => 'px', 'style' => '23px']], 'left' => ['width' => ['number' => 23, 'unit' => 'px', 'style' => '23px']], 'right' => ['width' => ['number' => 23, 'unit' => 'px', 'style' => '23px']]]], 'spacing' => ['padding' => ['top' => null]]], 'menu_box_single' => ['width' => ['breakpoint_tablet_landscape' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'breakpoint_phone_landscape' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'column_gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'menu_box_all' => ['column_gap' => ['breakpoint_tablet_landscape' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'breakpoint_phone_landscape' => null], 'row_gap' => null], 'alergens_info' => ['container' => ['background_color' => null, 'border' => ['border' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#0B2035'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#0B2035'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#0B2035'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#0B2035']], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']], 'padding' => ['top' => null], 'margin' => ['top' => null], 'border_radius' => null, 'spacing' => ['padding' => ['top' => null], 'margin' => ['top' => ['number' => 35, 'unit' => 'px', 'style' => '35px']]]], 'info_box' => ['no_color' => null, 'no_typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 14, 'unit' => 'px', 'style' => '14px']]]]]], 'text_typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 14, 'unit' => 'px', 'style' => '14px']]]]]], 'heading_typography' => ['color' => null]], 'no_typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 12, 'unit' => 'px', 'style' => '12px']]]]], 'color' => ['breakpoint_base' => '#000000FF']], 'display' => null, 'gap' => null], 'category' => ['typography' => ['label' => 'Preset 0', 'id' => 'preset-id-d359b626-abe6-4cad-850c-cdef8c211f91', 'color' => ['breakpoint_base' => '#0B2035'], 'typography' => ['custom' => ['customTypography' => ['fontFamily' => null]]]], 'line' => ['enable_line' => true, 'color' => 'var(--bde-brand-primary-color)', 'height' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'space' => null], 'spacing' => ['padding' => ['top' => null, 'bottom' => null]]], 'menu_heading' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 22, 'unit' => 'px', 'style' => '22px']]]]], 'color' => ['breakpoint_base' => '#000000FF']], 'line' => ['border' => ['top' => [], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#000000FF', 'style' => 'dotted'], 'left' => [], 'right' => []], 'enable_line' => true, 'color' => 'var(--bde-brand-primary-color)', 'height' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'space' => ['number' => 3, 'unit' => 'px', 'style' => '3px']], 'spacing' => ['padding' => ['top' => null], 'margin' => ['top' => null]]], 'container' => ['background' => null, 'spacing' => ['padding' => ['top' => null, 'left' => null, 'right' => null, 'bottom' => null]], 'border' => ['border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']], 'width' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'price' => ['spacing' => ['padding' => ['top' => null, 'bottom' => null]], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null]]]]]], 'menu_tabs' => ['background_color' => null, 'spacing' => ['padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]]], 'position' => 'sticky', 'gap' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'single_tab' => ['color' => ['breakpoint_base' => 'var(--bde-brand-primary-color)'], 'color_hover' => ['breakpoint_base' => 'var(--bd-palette-second-colour-2)'], 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'spacing' => ['padding' => ['top' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'bottom' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'left' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'right' => ['number' => 25, 'unit' => 'px', 'style' => '25px']]], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]], 'drink_sizes_heading' => ['size_category_gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'size_price_gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'price_width' => ['number' => 50, 'unit' => 'px', 'style' => '50px']]]];
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
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
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
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
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
        "menu_tabs",
        "Menu Tabs",
        [c(
        "layout",
        "Layout",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'vertical', 'text' => 'Vertical'], ['text' => 'Horizontal', 'value' => 'horizon']]],
        false,
        false,
        [],
      ), c(
        "flex_wrap",
        "Flex Wrap",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'design.menu_tabs.layout', 'operand' => 'not equals', 'value' => 'vertical']]]],
        false,
        false,
        [],
      ), c(
        "flex_grow",
        "Flex Grow",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'design.menu_tabs.layout', 'operand' => 'not equals', 'value' => 'vertical'], ['path' => 'design.menu_tabs.flex_wrap', 'operand' => 'is set', 'value' => '']]]],
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
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'top', 'text' => 'Top'], ['text' => 'Sticky', 'value' => 'sticky']]],
        false,
        false,
        [],
      ), c(
        "single_tab",
        "Single Tab",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
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
      ), getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
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
        false,
        [],
      ), c(
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "spacing",
        "Spacing",
        [getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_margin_all",
      "Margin",
      "margin",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['path' => 'content.options.enable_tabs', 'operand' => 'is set', 'value' => ''], 'sectionOptions' => ['type' => 'accordion']],
        false,
        false,
        [],
      ), c(
        "category",
        "Category",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "line",
        "Line",
        [c(
        "enable_line",
        "Enable Line",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        "height",
        "Height",
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
      ), c(
        "category_description",
        "Category Description",
        [getPresetSection(
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
        "menu_box_all",
        "Menu Box All",
        [c(
        "column_gap",
        "Column Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "row_gap",
        "Row Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "menu_box_single",
        "Menu Box Single",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "column_gap",
        "Column Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "row_gap",
        "Row Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "image",
        "Image",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "object_fit",
        "Object Fit",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => [['value' => 'fill', 'text' => 'Fill'], ['text' => 'Contain', 'value' => 'contain'], ['text' => 'Cover', 'value' => 'cover'], ['text' => 'Scale Down', 'value' => 'scale'], ['text' => 'None', 'value' => 'none']]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "menu_heading",
        "Menu Heading",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "line",
        "Line",
        [c(
        "enable_line",
        "Enable Line",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "space",
        "Space",
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
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "price",
        "Price",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "drinks_price_gap",
        "Drinks Price Gap",
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
        "drink_sizes_heading",
        "Drink Sizes Heading",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "size_category_gap",
        "Size Category Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size_price_gap",
        "Size Price Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "price_width",
        "Price Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['path' => 'content.options.enable_drinks', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "description",
        "Description",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
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
      ), c(
        "category_note",
        "Category Note",
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
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
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
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "alergens_info",
        "Alergens Info",
        [c(
        "display",
        "Display",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'row', 'text' => 'Vertical', 'icon' => 'FlexAlignCenterHorizontalIcon'], ['text' => 'Horizontal', 'value' => 'column', 'icon' => 'FlexAlignCenterVerticalIcon']]],
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
      "No Typography",
      "no_typography",
       ['type' => 'popout']
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
      ), c(
        "spacing",
        "Spacing",
        [c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
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
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "info_box",
        "Info Box",
        [getPresetSection(
      "EssentialElements\\typography",
      "Heading Typography",
      "heading_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "No Typography",
      "no_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Text Typography",
      "text_typography",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['path' => 'content.options.enable_alergens', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "menu_items",
        "Menu Items",
        [c(
        "menu_category",
        "Menu Category",
        [c(
        "category_name",
        "Category Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'variableOptions' => ['enabled' => false]],
        false,
        false,
        [],
      ), c(
        "category_description",
        "Category Description",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "menu_items",
        "Menu Items",
        [c(
        "image",
        "Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['multiple' => false, 'acceptedFileTypes' => ['image']]],
        false,
        false,
        [],
      ), c(
        "menu_item_name",
        "Menu Item Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "menu_description",
        "Menu Description",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "price",
        "Price",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "allergens",
        "Allergens",
        [c(
        "no",
        "No",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{no}', 'defaultTitle' => 'Add Allergen', 'buttonName' => ''], 'condition' => ['path' => 'content.options.enable_alergens', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{menu_item_name}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      ), c(
        "notes",
        "Notes",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{category_name}', 'defaultTitle' => 'Category Name', 'buttonName' => 'Add Menu Category']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['path' => 'content.options.enable_acf', 'operand' => 'is not set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "drink_items",
        "Drink Items",
        [c(
        "drinks_category",
        "Drinks Category",
        [c(
        "category_name",
        "Category name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'variableOptions' => ['enabled' => false]],
        false,
        false,
        [],
      ), c(
        "notes",
        "Notes",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "drink_items",
        "Drink Items",
        [c(
        "menu_item_name",
        "Menu Item Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "menu_description",
        "Menu Description",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "price_1",
        "Price 1",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "price_2",
        "Price 2",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "price_3",
        "Price 3",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{menu_item_name}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      ), c(
        "size_1_name",
        "Size 1 Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "size_2_name",
        "Size 2 Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "size_3_name",
        "Size 3 Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{category_name}', 'defaultTitle' => 'Category Name', 'buttonName' => 'Add Drink Category']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['path' => 'content.options.enable_drinks', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "menu_items_acf_",
        "Menu Items (ACF)",
        [c(
        "alert",
        "Alert",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Categories Repeater Data</p>']],
        false,
        false,
        [],
      ), c(
        "categories_repeater",
        "Categories Repeater",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "categorie_name_sub_field",
        "Categorie Name Sub Field",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "alert_2",
        "Alert 2",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Sub repeater for product data </p>']],
        false,
        false,
        [],
      ), c(
        "menu_items_sub_repeater",
        "Menu Items Sub Repeater",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "image_sub_field_array_",
        "Image Sub Field (Array)",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "item_name_sub_field",
        "Item Name Sub Field",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "item_description_sub_field",
        "Item Description Sub Field",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "price_sub_field",
        "Price Sub Field",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "allergens_sub_field",
        "Allergens Sub Field",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['path' => 'content.options.enable_acf', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "allergens_box_acf_",
        "Allergens Box (ACF)",
        [c(
        "alergen_repeater_field",
        "Alergen Repeater Field",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['path' => 'content.options.enable_acf', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "alergens_info",
        "Alergens Info",
        [c(
        "alergens",
        "Alergens",
        [c(
        "no",
        "No",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "description",
        "Description",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{no}', 'defaultTitle' => '', 'buttonName' => ''], 'condition' => ['path' => 'content.options.enable_acf', 'operand' => 'is not set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "heading_name",
        "Heading Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "display_location",
        "Display Location",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'below', 'text' => 'Below Title'], ['text' => 'Beside Title', 'value' => 'beside']]],
        false,
        false,
        [],
      ), c(
        "separator",
        "Separator",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [['value' => 'brackets', 'text' => 'Brackets (x)'], ['text' => 'Comma ","', 'value' => 'comma'], ['text' => 'Custom', 'value' => 'custom']]],
        false,
        false,
        [],
      ), c(
        "custom_seperator",
        "Custom Seperator",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['path' => 'content.alergens_info.separator', 'operand' => 'is one of', 'value' => ['custom']]],
        false,
        false,
        [],
      ), c(
        "custom_seperator_info_box",
        "Custom Seperator - Info Box",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['path' => 'content.alergens_info.separator', 'operand' => 'is one of', 'value' => ['custom']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['path' => 'content.options.enable_alergens', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "options",
        "Options",
        [c(
        "enable_images",
        "Enable Images",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'yes', 'text' => 'Yes'], ['text' => 'No', 'value' => 'no']]],
        false,
        false,
        [],
      ), c(
        "enable_drinks",
        "Enable Drinks",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "enable_alergens",
        "Enable Alergens",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "enable_acf",
        "Enable ACF",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.options.enable_acf', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "enable_tabs",
        "Enable Tabs",
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
        return ['0' =>  ['title' => 'Tabs','inlineScripts' => ['let menuTabButtons = document.querySelectorAll(\'%%SELECTOR%% .menu-tab\');
const menuTabTop = document.querySelector(\'%%SELECTOR%% .menu-tabs\');
console.log(menuTabTop);

if (menuTabButtons) document.body.addEventListener("click", menuTabButtonsClick);

function menuTabButtonsClick(e) {
  let obj = e.target;
  if (obj.classList.contains("menu-tab")) {
  let att = obj.getAttribute(\'data-menu-cat\');
  let scrollTo = document.querySelector(`#${att}`);
  	{% if design.menu_tabs.position == \'sticky\' %}
	let scrollOffset = window.pageYOffset + scrollTo.getBoundingClientRect().top - menuTabTop.clientHeight;
	{% else %}
    let scrollOffset = window.pageYOffset + scrollTo.getBoundingClientRect().top;
	{% endif %}
    window.scrollTo({
        top: scrollOffset,
        behavior: \'smooth\'
      });
	}
}'],'builderCondition' => 'false',],];
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
        return [

'onPropertyChange' => [['script' => 'let menuTabButtons = document.querySelectorAll(\'%%SELECTOR%% .menu-tab\');
const menuTabTop = document.querySelector(\'%%SELECTOR%% .menu-tabs\');
console.log(menuTabTop);

if (menuTabButtons) document.body.addEventListener("click", menuTabButtonsClick);

function menuTabButtonsClick(e) {
  let obj = e.target;
  if (obj.classList.contains("menu-tab")) {
  let att = obj.getAttribute(\'data-menu-cat\');
  let scrollTo = document.querySelector(`#${att}`);
  	{% if design.menu_tabs.position == \'sticky\' %}
	let scrollOffset = window.pageYOffset + scrollTo.getBoundingClientRect().top - menuTabTop.clientHeight;
	{% else %}
    let scrollOffset = window.pageYOffset + scrollTo.getBoundingClientRect().top;
	{% endif %}
    window.scrollTo({
        top: scrollOffset,
        behavior: \'smooth\'
      });
	}
}',
],],

'onActivatedElement' => [['script' => 'let menuTabButtons = document.querySelectorAll(\'%%SELECTOR%% .menu-tab\');
const menuTabTop = document.querySelector(\'%%SELECTOR%% .menu-tabs\');
console.log(menuTabTop);

if (menuTabButtons) document.body.addEventListener("click", menuTabButtonsClick);

function menuTabButtonsClick(e) {
  let obj = e.target;
  if (obj.classList.contains("menu-tab")) {
  let att = obj.getAttribute(\'data-menu-cat\');
  let scrollTo = document.querySelector(`#${att}`);
  	{% if design.menu_tabs.position == \'sticky\' %}
	let scrollOffset = window.pageYOffset + scrollTo.getBoundingClientRect().top - menuTabTop.clientHeight;
	{% else %}
    let scrollOffset = window.pageYOffset + scrollTo.getBoundingClientRect().top;
	{% endif %}
    window.scrollTo({
        top: scrollOffset,
        behavior: \'smooth\'
      });
	}
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
        return 700;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'image_url', 'path' => 'design.box.background.layers[].image'], ['accepts' => 'string', 'path' => 'content.menu_items.menu_category[].menu_items[].image'], ['accepts' => 'string', 'path' => 'content.menu_items.menu_category[].menu_items[].menu_item_name'], ['accepts' => 'string', 'path' => 'content.menu_items.menu_category[].menu_items[].menu_description'], ['accepts' => 'string', 'path' => 'content.menu_items.menu_category[].menu_items[].price'], ['accepts' => 'string', 'path' => 'content.alergens_info.heading_name'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.categories_repeater'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.categorie_name_sub_field'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.menu_items_sub_repeater'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.item_name_sub_field'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.item_description_sub_field'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.price_sub_field'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.allergens_sub_field'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.category_repeater[].category_name'], ['accepts' => 'string', 'path' => 'content.menu_items_acf_.category_repeater']];
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
        return ['design.box.background.image', 'design.box.background.overlay.image', 'design.box.background.image_settings.unset_image_at', 'design.box.background.image_settings.size', 'design.box.background.image_settings.height', 'design.box.background.image_settings.repeat', 'design.box.background.image_settings.position', 'design.box.background.image_settings.left', 'design.box.background.image_settings.top', 'design.box.background.image_settings.attachment', 'design.box.background.image_settings.custom_position', 'design.box.background.image_settings.width', 'design.box.background.overlay.image_settings.custom_position', 'design.box.background.image_size', 'design.box.background.overlay.image_size', 'design.box.background.overlay.type', 'design.box.background.design.layout.horizontal.vertical_at', 'design.box.background.image_settings', 'design.menu_box_single.width', 'design.menu_box_single.padding', 'design.menu_box_all.column_gap', 'design.menu_tabs.button.custom.size.full_width_at', 'design.menu_tabs.button.styles.size.full_width_at', 'design.menu_tabs.button.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.menu_items_acf_.categories_repeater'];
    }
}
