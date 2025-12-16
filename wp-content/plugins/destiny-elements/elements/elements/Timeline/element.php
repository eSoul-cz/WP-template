<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\Timeline",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class Timeline extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM64 256c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>';
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
        return 'Timeline';
    }

    static function className()
    {
        return 'de-timeline';
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
        return ['content' => ['timeline' => ['content' => ['0' => ['date' => null, 'image' => null, 'heading' => 'Heading 1', 'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquam a nunc.</p>', 'icon' => ['slug' => 'icon-file-code.', 'name' => 'file code', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M149.9 349.1l-.2-.2-32.8-28.9 32.8-28.9c3.6-3.2 4-8.8.8-12.4l-.2-.2-17.4-18.6c-3.4-3.6-9-3.7-12.4-.4l-57.7 54.1c-3.7 3.5-3.7 9.4 0 12.8l57.7 54.1c1.6 1.5 3.8 2.4 6 2.4 2.4 0 4.8-1 6.4-2.8l17.4-18.6c3.3-3.5 3.1-9.1-.4-12.4zm220-251.2L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zM256 51.9l76.1 76.1H256zM336 464H48V48h160v104c0 13.3 10.7 24 24 24h104zM209.6 214c-4.7-1.4-9.5 1.3-10.9 6L144 408.1c-1.4 4.7 1.3 9.6 6 10.9l24.4 7.1c4.7 1.4 9.6-1.4 10.9-6L240 231.9c1.4-4.7-1.3-9.6-6-10.9zm24.5 76.9l.2.2 32.8 28.9-32.8 28.9c-3.6 3.2-4 8.8-.8 12.4l.2.2 17.4 18.6c3.3 3.5 8.9 3.7 12.4.4l57.7-54.1c3.7-3.5 3.7-9.4 0-12.8l-57.7-54.1c-3.5-3.3-9.1-3.2-12.4.4l-17.4 18.6c-3.3 3.5-3.1 9.1.4 12.4z"/></svg>']], '1' => ['date' => null, 'image' => null, 'heading' => 'Heading 2', 'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquam a nunc.</p>', 'icon' => ['slug' => 'icon-android.', 'name' => 'android', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M420.55,301.93a24,24,0,1,1,24-24,24,24,0,0,1-24,24m-265.1,0a24,24,0,1,1,24-24,24,24,0,0,1-24,24m273.7-144.48,47.94-83a10,10,0,1,0-17.27-10h0l-48.54,84.07a301.25,301.25,0,0,0-246.56,0L116.18,64.45a10,10,0,1,0-17.27,10h0l47.94,83C64.53,202.22,8.24,285.55,0,384H576c-8.24-98.45-64.54-181.78-146.85-226.55"/></svg>']], '2' => ['date' => null, 'heading' => 'Heading 3', 'image' => null, 'description' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam aliquam a nunc.</p>', 'icon' => ['slug' => 'icon-apple.', 'name' => 'apple', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>']]]], 'options' => ['enable_images' => false, 'enable_date' => false, 'enable_custom_icons' => true, 'data_type' => 'bde']], 'design' => ['container' => ['background_color' => ['breakpoint_base' => 'var(--bd-palette-blue-1)'], 'background_color_hover' => null, 'width' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'layout' => ['stack_vertically' => null, 'stack_vertically_' => 'breakpoint_tablet_portrait', 'row_reverse' => ['breakpoint_base' => 'breakpoint_base'], 'position_content' => ['breakpoint_phone_landscape' => 'right', 'breakpoint_phone_portrait' => 'right', 'breakpoint_base' => null, 'breakpoint_tablet_portrait' => 'right']], 'content' => ['space' => ['top' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'bottom' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'width' => ['number' => 45, 'unit' => '%', 'style' => '45%', 'breakpoint_base' => ['number' => 45, 'unit' => '%', 'style' => '45%'], 'breakpoint_phone_landscape' => ['number' => 91, 'unit' => '%', 'style' => '91%'], 'breakpoint_phone_portrait' => ['number' => 90, 'unit' => '%', 'style' => '90%'], 'breakpoint_tablet_portrait' => ['number' => 93, 'unit' => '%', 'style' => '93%']], 'border_radius' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all'], 'background_color' => ['breakpoint_base' => '#B46060'], 'heading' => ['typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_tablet_portrait' => null]]]]], 'margin' => ['top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'description' => ['typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'margin' => ['top' => null, 'bottom' => null, 'left' => null]], 'margin' => ['top' => ['number' => 40, 'unit' => 'px', 'style' => '40px'], 'bottom' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']], 'background_color_hover' => null, 'spacing' => ['padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']], 'margin' => ['top' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'bottom' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'left' => null, 'right' => null]], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]]], 'date' => ['width' => ['number' => 45, 'unit' => '%', 'style' => '45%', 'breakpoint_base' => ['number' => 45, 'unit' => '%', 'style' => '45%'], 'breakpoint_phone_landscape' => ['number' => 10, 'unit' => '%', 'style' => '10%'], 'breakpoint_phone_portrait' => ['number' => 15, 'unit' => '%', 'style' => '15%']], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_phone_landscape' => ['number' => 18, 'unit' => 'px', 'style' => '18px'], 'breakpoint_tablet_portrait' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]]]]], 'margin' => ['top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'left' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'right' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'breakpoint_base' => ['top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'left' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'right' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'top' => ['number' => 50, 'unit' => 'px', 'style' => '50px', 'breakpoint_base' => ['number' => 40, 'unit' => 'px', 'style' => '40px']]], 'timeline' => ['line_width' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'line_colour' => '#FFBF9B', 'dot' => ['colour' => '#B46060', 'top' => ['breakpoint_base' => ['number' => 50, 'unit' => '%', 'style' => '50%']], 'size' => ['breakpoint_base' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'breakpoint_phone_portrait' => null, 'breakpoint_tablet_portrait' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'breakpoint_phone_landscape' => ['number' => 26, 'unit' => 'px', 'style' => '26px']], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'topLeft' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'topRight' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'bottomLeft' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'bottomRight' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'color' => '#FFFFFFFF'], 'bottom' => ['width' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'color' => '#FFFFFFFF'], 'left' => ['width' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'color' => '#FFFFFFFF'], 'right' => ['width' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'color' => '#FFFFFFFF']]]], 'effects' => ['enable_pulse' => true]], 'pointer' => ['top' => ['breakpoint_base' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'breakpoint_tablet_landscape' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'breakpoint_tablet_portrait' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'breakpoint_phone_landscape' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'breakpoint_phone_portrait' => ['number' => 50, 'unit' => '%', 'style' => '50%']], 'colour' => ['breakpoint_base' => '#B46060', 'breakpoint_tablet_landscape' => '#0B2035', 'breakpoint_tablet_portrait' => '#0B2035', 'breakpoint_phone_landscape' => '#0B2035', 'breakpoint_phone_portrait' => '#0B2035'], 'size' => ['breakpoint_base' => ['number' => 11, 'unit' => 'px', 'style' => '11px'], 'breakpoint_tablet_landscape' => ['number' => 11, 'unit' => 'px', 'style' => '11px'], 'breakpoint_tablet_portrait' => ['number' => 11, 'unit' => 'px', 'style' => '11px'], 'breakpoint_phone_landscape' => ['number' => 11, 'unit' => 'px', 'style' => '11px'], 'breakpoint_phone_portrait' => ['number' => 11, 'unit' => 'px', 'style' => '11px']]], 'fill_effect' => ['line_colour' => '#B46060', 'enable_fill_effect' => true], 'icon' => ['colour' => '#FFF2CCFF', 'size' => ['number' => 20, 'unit' => 'px', 'style' => '20px', 'breakpoint_base' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'breakpoint_tablet_portrait' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'breakpoint_phone_landscape' => ['number' => 12, 'unit' => 'px', 'style' => '12px']]], 'line_margin' => ['margin_left' => ['breakpoint_tablet_portrait' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'endings' => 'end_on_points']]];
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
        "position_content",
        "Position Content",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'breakpointOptions' => ['multiple' => false, 'enableNever' => false], 'items' => ['0' => ['value' => 'left', 'text' => 'Left', 'icon' => 'FlexAlignLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterHorizontalIcon'], '2' => ['text' => 'Right', 'value' => 'right', 'icon' => 'FlexAlignRightIcon']], 'buttonBarOptions' => ['size' => 'small', 'layout' => 'default']],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "date",
        "Date",
        [c(
        "top",
        "Top",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        true,
        false,
        [],
      ), c(
        "position_date",
        "Position Date",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'breakpointOptions' => ['multiple' => false, 'enableNever' => false], 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Left', 'icon' => 'FlexAlignLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterHorizontalIcon'], '2' => ['text' => 'Right', 'value' => 'flex-end', 'icon' => 'FlexAlignRightIcon']], 'buttonBarOptions' => ['size' => 'small', 'layout' => 'default'], 'condition' => ['0' => ['0' => ['path' => 'design.layout.position_content', 'operand' => 'equals', 'value' => 'center']]]],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "content",
        "Content",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        true,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => '%']]],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
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
        "heading",
        "Heading",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
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
        "description",
        "Description",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
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
        "image",
        "Image",
        [c(
        "height",
        "Height",
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
        "timeline",
        "Timeline",
        [c(
        "line_width",
        "Line Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "line_colour",
        "Line Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_margin_x",
      "Line Margin",
      "line_margin",
       ['type' => 'popout']
     ), c(
        "endings",
        "Endings",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'full_width', 'text' => 'Full Height'], '1' => ['text' => 'On points', 'value' => 'end_on_points']]],
        false,
        false,
        [],
      ), c(
        "fill_effect",
        "Fill Effect",
        [c(
        "enable_fill_effect",
        "Enable Fill Effect",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "line_colour",
        "Line Colour",
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
        "dot",
        "Dot",
        [c(
        "top",
        "Top",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
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
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "effects",
        "Effects",
        [c(
        "enable_pulse",
        "Enable Pulse",
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "icon",
        "Icon",
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
        "pointer",
        "Pointer",
        [c(
        "top",
        "Top",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "colour",
        "Colour",
        [],
        ['type' => 'color', 'layout' => 'inline', 'colorOptions' => ['type' => 'solidOnly']],
        true,
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
        "timeline",
        "Timeline",
        [c(
        "content",
        "Content",
        [c(
        "date",
        "Date",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.enable_date', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.enable_custom_icons', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "image",
        "Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.enable_images', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "heading",
        "Heading",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
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
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{heading}', 'defaultTitle' => '', 'buttonName' => ''], 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'bde']], '1' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_date_id",
        "Meta Box Date ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_group_id",
        "Meta Box Group ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_heading_id",
        "Meta Box Heading ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_content_id",
        "Meta Box Content ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_icon_id",
        "Meta Box Icon ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]], 'placeholder' => 'Output must be SVG code'],
        false,
        false,
        [],
      ), c(
        "meta_box_image_id",
        "Meta Box Image ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]], 'placeholder' => 'Output must be image ID'],
        false,
        false,
        [],
      ), c(
        "acf_repeater_name",
        "ACF Repeater Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_date_field",
        "ACF Date Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_heading_field",
        "ACF Heading Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_content_field",
        "ACF Content Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_icon_field",
        "ACF Icon Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]], 'placeholder' => 'Output must be SVG code'],
        false,
        false,
        [],
      ), c(
        "acf_image_field",
        "ACF Image Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]], 'placeholder' => 'Output must be image ID'],
        false,
        false,
        [],
      ), c(
        "add_item",
        "Add Item",
        [],
        ['type' => 'add_registered_children', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'adv']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'not equals', 'value' => 'query']]]],
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
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'not equals', 'value' => 'adv']]]],
        false,
        false,
        [],
      ), c(
        "enable_date",
        "Enable Date",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'not equals', 'value' => 'adv']]]],
        false,
        false,
        [],
      ), c(
        "enable_content",
        "Enable Content",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'query']]]],
        false,
        false,
        [],
      ), c(
        "enable_custom_icons",
        "Enable Custom Icons",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'is none of', 'value' => ['0' => 'adv', '1' => 'query']]]]],
        false,
        false,
        [],
      ), c(
        "data_type",
        "Data Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'bde', 'text' => 'Default'], '1' => ['text' => 'Advanced', 'value' => 'adv'], '2' => ['text' => 'ACF', 'value' => 'acf'], '3' => ['text' => 'Meta box', 'value' => 'metabox'], '4' => ['text' => 'Query', 'value' => 'query']]],
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
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'query']]]],
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
        return ['0' =>  ['title' => 'Timeline','inlineScripts' => ['const deTimeline = document.querySelectorAll(\'.de-timeline\')

const deFillOnScroll = () => {
  deTimeline.forEach((elTime) => {
    const lineFill = elTime.querySelectorAll(".de-line");
    lineFill.forEach((fill) => {
      const rect = fill.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      const fillHeight = fill.clientHeight;
      const fillTop = rect.top;
      const fillBottom = rect.bottom;
      let percentage = 0;

      if (fillTop > windowHeight / 2) {
        fill.style.setProperty("--defill", `0%`);
      } else if (fillBottom < windowHeight / 2) {
        fill.style.setProperty("--defill", `100%`);
      } else {
        const distanceScrolled = windowHeight / 2 - fillTop;
        percentage = (distanceScrolled / fillHeight) * 100;
        fill.style.setProperty("--defill", `${percentage}%`);
      }
    });
  });
}

document.addEventListener("scroll", deFillOnScroll);
'],'builderCondition' => '{% if design.timeline.fill_effect.enable_fill_effect %}
	return true;
{% else %}
	return false;
{% endif %}','frontendCondition' => '{% if design.timeline.fill_effect.enable_fill_effect %}
	return true;
{% else %}
	return false;
{% endif %}',],];
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

'onPropertyChange' => [['script' => '{% if design.timeline.fill_effect.enable_fill_effect %}
const deTimeline = document.querySelectorAll(\'.de-timeline\');

const deFillOnScroll = () => {
  deTimeline.forEach((elTime) => {
    const lineFill = elTime.querySelectorAll(".de-line");
    lineFill.forEach((fill) => {
      const rect = fill.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      const fillHeight = fill.clientHeight;
      const fillTop = rect.top;
      const fillBottom = rect.bottom;
      let percentage = 0;

      if (fillTop < windowHeight / 2 && fillBottom > windowHeight / 2) {
        const visibleHeight = Math.min(fillBottom, windowHeight / 2) - Math.max(fillTop, 0);
        percentage = (visibleHeight / fillHeight) * 100;
        fill.style.setProperty("--defill", `${percentage}%`);
      }
       if (fillTop > windowHeight / 2) {
         fill.style.setProperty("--defill", `0%`);
       }
       if (fillBottom < windowHeight / 2) {
         fill.style.setProperty("--defill", `100%`);
       }
    });
  });
}

document.addEventListener("scroll", deFillOnScroll);
{% else %}
const deTimeline = document.querySelectorAll(\'.de-timeline\');

const deFillOnScroll = () => {
  deTimeline.forEach((elTime) => {
    const lineFill = elTime.querySelectorAll(".de-line");
    lineFill.forEach((fill) => {
      const rect = fill.getBoundingClientRect();
      const windowHeight = window.innerHeight;
      const fillHeight = fill.clientHeight;
      const fillTop = rect.top;
      const fillBottom = rect.bottom;
      let percentage = 0;

      if (fillTop < windowHeight / 2 && fillBottom > windowHeight / 2) {
        const visibleHeight = Math.min(fillBottom, windowHeight / 2) - Math.max(fillTop, 0);
        percentage = (visibleHeight / fillHeight) * 100;
        fill.style.setProperty("--defill", `0%`);
      }
       if (fillTop > windowHeight / 2) {
         fill.style.setProperty("--defill", `0%`);
       }
       if (fillBottom < windowHeight / 2) {
         fill.style.setProperty("--defill", `0%`);
       }
    });
  });
}

document.addEventListener("scroll", deFillOnScroll);

{% endif %}',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container-restricted",   ];
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
        return 120;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.date.width', 'design.content.width', 'design.date.top', 'design.timeline.dot.size', 'design.timeline.dot.top', 'design.content.background_color', 'design.content.image.height'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.timeline.meta_box_group_id', 'content.timeline.meta_box_heading_id', 'content.timeline.meta_box_content_id', 'content.timeline.meta_box_image_id', 'content.options.data_type', 'content.options.enable_images', 'content.options.enable_date', 'content.options.enable_custom_icons', 'content.timeline.acf_repeater_name', 'content.timeline.acf_date_field', 'content.timeline.acf_heading_field', 'content.timeline.acf_content_field', 'content.timeline.acf_icon_field', 'content.timeline.acf_image_field', 'content.query.query', 'content.options.enable_content'];
    }
}
