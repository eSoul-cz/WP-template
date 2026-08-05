<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\DeTaxonomies",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class DeTaxonomies extends \Breakdance\Elements\Element
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
        return 'Taxonomies V1';
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
        return ['content' => ['main_options' => ['taxonomy_type' => 'categories', 'icnlude_link' => true, 'tag' => 'p', 'enable_links' => false], 'order' => ['order_by' => 'rand', 'order' => 'ASC']], 'design' => ['layout' => ['layout' => ['breakpoint_base' => 'horizontal'], 'gap' => ['breakpoint_base' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'typography' => ['text' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null], 'advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['0' => 'none']]]]]]], 'color' => ['breakpoint_base' => '#FFFFFFFF']], 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'typography' => ['custom' => ['customTypography' => ['advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['0' => 'none']]]]]]]]], 'container' => ['baackground_color' => null, 'spacing' => ['padding' => ['top' => null], 'margin' => ['top' => null]], 'border' => ['border_radius' => null]], 'taxomony' => ['spacing' => ['padding' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'left' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'right' => ['number' => 12, 'unit' => 'px', 'style' => '12px']]], 'baackground_color' => '#0b2035', 'border' => ['border_radius' => ['all' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'topLeft' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'topRight' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'bottomLeft' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'bottomRight' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'editMode' => 'all']], 'baackground_color_hover' => '#fc7904'], 'taxonomy' => ['border' => ['border_radius' => null]]]];
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
        "layout",
        "Layout",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'vertical', 'text' => 'Vertical'], '1' => ['text' => 'Horizontal', 'value' => 'horizontal']]],
        true,
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
        "baackground_color",
        "Baackground Color",
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
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "taxomony",
        "Taxomony",
        [c(
        "baackground_color",
        "Baackground Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
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
        "typography",
        "Typography",
        [getPresetSection(
      "EssentialElements\\typography_with_effects_with_hoverable_color_and_effects",
      "Typography",
      "typography",
       ['type' => 'popout']
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
        "main_options",
        "Main Options",
        [c(
        "taxonomy_type",
        "Taxonomy Type",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'categories', 'text' => 'Categories'], '1' => ['text' => 'Tags', 'value' => 'tags']]],
        false,
        false,
        [],
      ), c(
        "enable_links",
        "Enable Links",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "tag",
        "Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'p', 'text' => 'p'], '1' => ['text' => 'span', 'value' => 'span'], '2' => ['text' => 'h2', 'value' => 'h2'], '3' => ['text' => 'h3', 'value' => 'h3'], '4' => ['text' => 'h4', 'value' => 'h4'], '5' => ['text' => 'h5', 'value' => 'h5'], '6' => ['text' => 'div', 'value' => 'div']], 'condition' => ['0' => ['0' => ['path' => 'content.main_options.icnlude_link', 'operand' => 'is not set', 'value' => '']]]],
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
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return false;
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return ['alwaysHide' => true];
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
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['content.main_options.taxonomy_type', 'content.main_options.tag', 'content.order.order', 'content.main_options.enable_links'];
    }
}
