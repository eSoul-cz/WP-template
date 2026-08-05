<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\AdvancedGoogleMap",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class AdvancedGoogleMap extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg aria-hidden="true" focusable="false"   class="svg-inline--fa fa-map-pin" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M160-.0002c-79.53 0-144 64.47-144 144c0 74.05 56.1 134.3 128 142.4V496c0 8.844 7.156 16 16 16s16-7.156 16-16V286.4c71.9-8.055 128-68.34 128-142.4C304 64.47 239.5-.0002 160-.0002zM160 256C98.24 256 48 205.8 48 144S98.24 32 160 32s112 50.24 112 112S221.8 256 160 256zM160 64C115.9 64 80 99.88 80 144C80 152.8 87.16 160 96 160s16-7.156 16-16C112 117.5 133.5 96 160 96c8.844 0 16-7.156 16-16S168.8 64 160 64z"></path></svg>';
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
        return 'Advanced Google Map';
    }

    static function className()
    {
        return 'de-google-map';
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
        return ['design' => ['size' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'height' => ['breakpoint_base' => ['number' => 600, 'unit' => 'px', 'style' => '600px']]], 'icon' => ['size' => 100], 'map_size' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'height' => ['breakpoint_base' => ['number' => 600, 'unit' => 'px', 'style' => '600px']]], 'tooltip' => ['padding' => null, 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null]]]], 'link' => null, 'h4' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 22, 'unit' => 'px', 'style' => '22px']], 'fontWeight' => ['breakpoint_base' => '500']]]], 'color' => ['breakpoint_base' => '#FFFFFFFF']], 'h1' => null, 'h3' => ['color' => null]], 'background_color' => '#754D4DFF', 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]], 'close_button_typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null]]]], 'color' => ['breakpoint_base' => '#5E0BFFFF']], 'button' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['none']]]], 'fontWeight' => ['breakpoint_base' => '600']]]], 'color' => ['breakpoint_base' => '#000000FF']], 'background_color' => '#B5B3B3FF', 'spacing' => ['margin' => ['breakpoint_base' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'padding' => ['breakpoint_base' => ['top' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 7, 'unit' => 'px', 'style' => '7px']]]], 'padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'bottom' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'border' => ['border' => null, 'border_hover' => null, 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']], 'background_color_hover' => '#A9A5A5FF'], 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px']], 'breakpoint_phone_landscape' => ['left' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'right' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'margin' => ['breakpoint_base' => ['bottom' => null, 'top' => null]]], 'excerpt' => ['margin' => ['margin' => ['breakpoint_base' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]]], 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']]], 'additional_data' => ['typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 16, 'unit' => 'px', 'style' => '16px']]]]]], 'container' => ['spacing' => ['margin' => ['breakpoint_base' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]]]], 'featured_image' => ['borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]]]]], 'content' => ['content' => ['zoom' => 8, 'address' => null, 'center_position' => ['latitude' => '53.3239919', 'longitude' => '-6.5258808']], 'map' => ['zoom' => 7, 'center_position' => ['latitude' => '53.015277', 'longitude' => '-3.674276'], 'disable_tooltip' => false, 'markers_data' => 'default'], 'markers' => ['marker' => [['name' => '<h4>Location A - Dublin</h4>', 'longitude' => '-6.2607872', 'latitude' => '53.349796', 'custom_icon' => ['slug' => 'icon-location', 'name' => 'location', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-location" viewBox="0 0 32 32">
<path d="M16 0c-5.523 0-10 4.477-10 10 0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zM16 16c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z"/>
</svg>', 'icon' => null, 'color' => null], 'button_link' => 'https://destiny.ie/'], ['name' => '<h4>Location B - London</h4>', 'longitude' => '-0.094395', 'latitude' => '51.489455', 'custom_icon' => ['slug' => 'icon-location', 'name' => 'location', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-location" viewBox="0 0 32 32">
<path d="M16 0c-5.523 0-10 4.477-10 10 0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zM16 16c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z"/>
</svg>', 'icon' => null, 'color' => null], 'button_link' => 'https://destiny.ie/']], 'post_type' => null, 'latitude_field' => 'latitude', 'longitude_field' => 'longitude', 'latitude_field_dynamic_meta' => null, 'longitude_field_dynamic_meta' => null], 'tooltip_options' => ['heading_tag' => 'h4', 'button_name' => 'View Location', 'include_button' => true, 'include_excerpt' => false, 'open_link_in_new_tab' => true, 'include_featured_image' => false], 'additional_data' => ['data' => null]]];
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
        "map_size",
        "Map Size",
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
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "icon",
        "Icon",
        [c(
        "custom_icon",
        "Custom Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical', 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'is one of', 'value' => ['acf', 'metabox']]]]],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 10, 'max' => 120]],
        false,
        false,
        [],
      ), c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'is one of', 'value' => ['acf', 'metabox']]]]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "tooltip",
        "Tooltip",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "typography",
        "Typography",
        [getPresetSection(
      "EssentialElements\\typography",
      "H1",
      "h1",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "H2",
      "h2",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "H3",
      "h3",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "H4",
      "h4",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "H5",
      "h5",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Text",
      "text",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Link",
      "link",
       ['type' => 'popout']
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
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "button",
        "Button",
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
      ), c(
        "excerpt",
        "Excerpt",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
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
      ), c(
        "additional_data",
        "Additional Data",
        [c(
        "container",
        "Container",
        [getPresetSection(
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
      "EssentialElements\\typography",
      "Typography",
      "typography",
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
      ), c(
        "featured_image",
        "Featured Image",
        [c(
        "max_height",
        "Max Height",
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
        "map",
        "Map",
        [c(
        "center_position",
        "Center Position",
        [c(
        "latitude",
        "Latitude",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "longitude",
        "Longitude",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'placeholder' => 'lat, lng', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "zoom",
        "Zoom",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 24]],
        false,
        false,
        [],
      ), c(
        "disable_tooltip",
        "Disable Tooltip",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "markers_data",
        "Markers Data",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'default', 'text' => 'Default'], ['text' => 'ACF', 'value' => 'acf'], ['text' => 'Meta Box', 'value' => 'metabox']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "markers",
        "Markers",
        [c(
        "marker",
        "Marker",
        [c(
        "name",
        "Name",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "latitude",
        "Latitude",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "longitude",
        "Longitude",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "custom_icon",
        "Custom Icon",
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
        ['type' => 'color', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "button_link",
        "Button Link",
        [],
        ['type' => 'url', 'layout' => 'vertical', 'condition' => [[['path' => 'content.tooltip_options.include_button', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{name}', 'defaultTitle' => '', 'buttonName' => ''], 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'default']], [['path' => 'content.map.markers_data', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "post_type",
        "Post Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_registered_post_types', 'fetchContextPath' => '', 'refetchPaths' => []]], 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'acf']], [['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "latitude_field",
        "Latitude Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'acf']], [['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'metabox']]], 'variableOptions' => ['enabled' => false]],
        false,
        false,
        [],
      ), c(
        "longitude_field",
        "Longitude Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'acf']], [['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "tooltip_options",
        "Tooltip Options",
        [c(
        "heading_tag",
        "Heading Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => [['value' => 'p', 'text' => 'p'], ['text' => 'span', 'value' => 'span'], ['text' => 'h2', 'value' => 'h2'], ['text' => 'h3', 'value' => 'h3'], ['text' => 'h4', 'value' => 'h4'], ['text' => 'h5', 'value' => 'h5'], ['text' => 'div', 'value' => 'div']], 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'acf']], [['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "include_button",
        "Include Button",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "open_link_in_new_tab",
        "Open Link in New Tab",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.tooltip_options.include_button', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "button_name",
        "Button Name",
        [],
        ['type' => 'text', 'layout' => 'inline', 'condition' => [[['path' => 'content.tooltip_options.include_button', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "include_excerpt",
        "Include Excerpt",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'acf']], [['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "include_featured_image",
        "Include Featured Image",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'acf']], [['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "auto_close_tooltip",
        "Auto Close Tooltip",
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
        "additional_data",
        "Additional Data",
        [c(
        "datamsg",
        "DataMSG",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Data can be populated dynamicly, or added manually</p>']],
        false,
        false,
        [],
      ), c(
        "data",
        "Data",
        [c(
        "name",
        "Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "custom_field",
        "Custom Field",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => [[['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'acf']], [['path' => 'content.map.markers_data', 'operand' => 'equals', 'value' => 'metabox']]]],
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
        return ['0' =>  ['title' => 'GoogleLink','frontendCondition' => 'return false;','scripts' => ['https://maps.googleapis.com/maps/api/js?callback=initMap'],],'1' =>  ['title' => 'GoogleMaps','inlineScripts' => ['{% if content.tooltip_options.auto_close_tooltip %}
let deGMCenterPosLat = "{{ content.map.center_position.latitude }}";
let deGMCenterPosLng = "{{ content.map.center_position.longitude }}";

if (!deGMCenterPosLat) {
    deGMCenterPosLat = -34.397;
}

if (!deGMCenterPosLng) {
    deGMCenterPosLng = 150.644;
}

let map;

function deInitMap() {
    map = new google.maps.Map(document.getElementById("de-map"), {
        center: {
            lat: Number(deGMCenterPosLat),
            lng: Number(deGMCenterPosLng)
        },
        zoom: {{content.map.zoom}},
        streetViewControl: false,
    });

    const deLocations = [];

    {% for item in content.markers.marker %}
    deLocations.push({
        position: {
            lat: Number({{item.latitude}}),
            lng: Number({{item.longitude}})
        },
        title: `{{ item.name }}`,
        icon: `{{ item.custom_icon.icon.svgCode }}`,
        iconColor: \'{{ item.custom_icon.color }}\',
        pageUrl: \'{{ item.button_link }}\',
        button: \'{{ content.tooltip_options.include_button }}\',
        buttonName: \'{{ content.tooltip_options.button_name ? content.tooltip_options.button_name : \'View Location\' }}\',
    });
    {% endfor %}
    // Create one info window to share between markers.
    const infowindow = new google.maps.InfoWindow();

    deLocations.forEach((location) => {
        let marker;
        if (location.icon) {
            let el = document.createElement(\'div\');
            el.innerHTML = location.icon;
            let svgIcon = el.firstChild;
            svgIcon.style.fill = location.iconColor;
            marker = new google.maps.Marker({
                position: location.position,
                map: map,
                title: location.title,
                icon: {
                    url: `data:image/svg+xml;charset=utf-8, ${svgIcon.parentNode.innerHTML}`,
                    size: new google.maps.Size({{ design.icon.size }}, {{ design.icon.size }}),
                }
            });
        } else {
            marker = new google.maps.Marker({
                position: location.position,
                map: map,
                title: location.title.replace(/<\/?[^>]+(>|$)/g, "")
            });
        }
        {% if content.tooltip_options.include_button %}
        const contentString = `${location.title}` +
                          `<a class="de-agm-btn" {{ content.tooltip_options.open_link_in_new_tab ? \'target="_blank"\' : \'\' }} href="${location.pageUrl}">${location.buttonName}</a>`;
        {% else %}
        const contentString = `${location.title}`;
        {% endif %}
        marker.addListener("click", () => {
            infowindow.close();
            infowindow.setContent(contentString);
            infowindow.open(map, marker);
        });
    });
}

window.initMap = deInitMap;

{% else %}
let deGMCenterPosLat = "{{ content.map.center_position.latitude }}";
let deGMCenterPosLng = "{{ content.map.center_position.longitude }}";

if (!deGMCenterPosLat) {
    deGMCenterPosLat = -34.397;
}

if (!deGMCenterPosLng) {
    deGMCenterPosLng = 150.644;
}

let map;


function deInitMap() {
    map = new google.maps.Map(document.getElementById("de-map"), {
        center: {
            lat: Number(deGMCenterPosLat),
            lng: Number(deGMCenterPosLng)
        },
        zoom: {{content.map.zoom}},
        streetViewControl: false,
    });

	const deLocations = [];

    {% for item in content.markers.marker %}
    deLocations.push({
        position: {
            lat: Number({{item.latitude}}),
            lng: Number({{item.longitude}})
        },
        title: `{{ item.name }}`,
        icon: `{{ item.custom_icon.icon.svgCode }}`,
        iconColor: \'{{ item.custom_icon.color }}\',
      	pageUrl: \'{{ item.button_link }}\',
        button: \'{{ content.tooltip_options.include_button }}\',
        buttonName: \'{{ content.tooltip_options.button_name ? content.tooltip_options.button_name : \'View Location\' }}\',
    });

    {% endfor %}
    // Create an info window to share between markers.
    const infoWindow = new google.maps.InfoWindow();

    deLocations.forEach((location) => {
        if (location.icon) {
            let el = document.createElement(\'div\');
            el.innerHTML = location.icon;
            let svgIcon = el.firstChild;
            svgIcon.style.fill = location.iconColor;
            {% if content.tooltip_options.include_button %}
            const contentString = `${location.title}` +
                              `<a class="de-agm-btn" href="${location.pageUrl}">${location.buttonName}</a>`;
            {% else %}
            const contentString = `${location.title}`;
            {% endif %}
            const infowindow = new google.maps.InfoWindow({
            	content: contentString
        	});
            const marker = new google.maps.Marker({
                position: location.position,
                map: map,
                title: location.title,
                icon: {
                    url: `data:image/svg+xml;charset=utf-8, ${svgIcon.parentNode.innerHTML}`,
                    size: new google.maps.Size({{ design.icon.size }}, {{ design.icon.size }}),
                }
            });
            marker.addListener("click", () => {
            	infoWindow.close();
            	infowindow.open(map, marker);
        	});
        } else {
            const marker = new google.maps.Marker({
                position: location.position,
                map: map,
                title: location.title.replace(/<\/?[^>]+(>|$)/g, "")
            });
           	{% if content.tooltip_options.include_button %}
            const contentString = `${location.title}` +
                              `<a class="de-agm-btn" {{ content.tooltip_options.open_link_in_new_tab ? \'target="_blank"\' : \'\' }} href="${location.pageUrl}">${location.buttonName}</a>`;
            {% else %}
            const contentString = `${location.title}`;
            {% endif %}
            const infowindow = new google.maps.InfoWindow({
             	content: contentString
        	});
          	{% if content.map.disable_tooltip %}
            {% else %}
            marker.addListener("click", () => {
                infoWindow.close();
                infowindow.open(map, marker);
            });
           	{% endif %}
        }
    });
}

window.initMap = deInitMap;

{% endif %}'],'builderCondition' => '{% if content.map.markers_data == \'default\' %}
  return true;
{% elseif content.map.markers_data == \'acf\' %}
  return false;
{% elseif content.map.markers_data == \'metabox\' %}
   return false;
{% else %}
	return true;
{% endif %}','frontendCondition' => '{% if content.map.markers_data == \'default\' %}
  return true;
{% elseif content.map.markers_data == \'acf\' %}
  return false;
{% elseif content.map.markers_data == \'metabox\' %}
   return false;
{% else %}
	return true;
{% endif %}',],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => true, 'withDependenciesInHtml' => false, 'shareStateWithChildSSR' => true, 'bypassPointerEvents' => false];
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
        return false;
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 615;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'string', 'path' => 'content.additional_data.data[].custom_field']];
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
        return ['content.content.zoom', 'content.content.center_position', 'content.map.markers_data', 'design.icon.custom_icon'];
    }
}
