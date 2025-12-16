<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\DeButtons",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class DeButtons extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path fill="currentColor" d="M15.7 5.3l-1-1c-0.2-0.2-0.4-0.3-0.7-0.3h-13c-0.6 0-1 0.4-1 1v5c0 0.3 0.1 0.6 0.3 0.7l1 1c0.2 0.2 0.4 0.3 0.7 0.3h13c0.6 0 1-0.4 1-1v-5c0-0.3-0.1-0.5-0.3-0.7zM14 10h-13v-5h13v5z"></path> </svg>';
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
        return 'Destiny Button';
    }

    static function className()
    {
        return 'de_button';
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
        return ['content' => ['buttons' => ['choose_button_style' => 'border'], 'button' => ['button_text' => 'Button Text', 'button_link' => null, 'button_link_dynamic_meta' => null]], 'design' => ['borders' => ['borders' => [], 'animate_direction_bottom' => 'right'], 'button' => ['background_color' => 'var(--bde-brand-primary-color)', 'text_color' => '#FFFFFFFF', 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => null, 'advanced' => ['decoration' => ['line' => ['breakpoint_base' => []]]]]]]], 'button_style' => 'burger'], 'effects' => ['choose_button_style' => 'border', 'transition_duration_ms_' => 300], 'border' => ['border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]], 'hover_effects' => ['border_color' => 'var(--bde-body-text-color)', 'animate_direction_bottom' => null, 'border_to_animate' => ['0' => 'bottom'], 'animate_direction_top' => null, 'background_color' => null, 'border_size' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'animate_direction_right' => 'top', 'animation_top' => ['animate_direction' => 'center', 'delay_ms_' => null], 'animation_right' => ['animate_direction' => 'bottom', 'delay_ms_' => null], 'animation_bottom' => ['animate_direction' => 'right', 'delay_ms_' => null], 'animation_left' => ['animate_direction' => 'top', 'delay_ms_' => null], 'transition_duration_ms_' => 300], 'spacing' => ['padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px']]]], 'margin' => ['margin' => ['breakpoint_base' => ['top' => null]]]], 'download_icon' => ['color' => '#FFFFFFFF', 'color_hover' => null, 'space' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'size' => ['number' => 18, 'unit' => 'px', 'style' => '18px'], 'select_icon' => 'iconone'], 'burger_style' => ['line_1' => ['colour' => 'var(--bde-brand-primary-color)', 'width' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'height' => ['number' => 2, 'unit' => 'px', 'style' => '2px']], 'width' => ['number' => 125, 'unit' => 'px', 'style' => '125px'], 'line_2' => ['width' => ['number' => 60, 'unit' => '%', 'style' => '60%'], 'colour' => 'var(--bde-brand-primary-color)', 'height' => ['number' => 2, 'unit' => 'px', 'style' => '2px']], 'line_3' => ['colour' => 'var(--bde-brand-primary-color)', 'width' => ['number' => 75, 'unit' => '%', 'style' => '75%'], 'height' => ['number' => 2, 'unit' => 'px', 'style' => '2px']], 'enable_active_selector' => true, 'active_styles' => ['show_active' => false, 'line_1_translate' => '0px 22px', 'line_2_translate' => '0px -22px', 'line_width' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'transition_duration' => ['number' => 200, 'unit' => 'ms', 'style' => '200ms'], 'line_colour' => null]]]];
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
        "button",
        "Button",
        [c(
        "button_style",
        "Button Style",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'border', 'text' => 'Border Animation'], '1' => ['text' => 'Download Button', 'value' => 'download'], '2' => ['text' => 'Burger Button', 'value' => 'burger']]],
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
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['condition' => ['0' => ['0' => ['path' => 'design.button.button_style', 'operand' => 'not equals', 'value' => 'burger']]], 'type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "burger_style",
        "Burger Style",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
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
        "line_1",
        "Line 1",
        [c(
        "colour",
        "Colour",
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
        "line_2",
        "Line 2",
        [c(
        "colour",
        "Colour",
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
        "line_3",
        "Line 3",
        [c(
        "colour",
        "Colour",
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
        "enable_active_selector",
        "Enable Active Selector",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "messageactive",
        "MessageActive",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>This is useful when the button adds a \'.active\' selector, then the button can transform to a close button. </p>'], 'condition' => ['0' => ['0' => ['path' => 'design.burger_style.enable_active_selector', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "active_styles",
        "Active Styles",
        [c(
        "show_active",
        "Show Active",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "transition_duration",
        "Transition Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']]],
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
      ), c(
        "line_width",
        "Line Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "line_1_translate",
        "Line 1 Translate",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "line_2_translate",
        "Line 2 Translate",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'design.burger_style.enable_active_selector', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'design.button.button_style', 'operand' => 'equals', 'value' => 'burger']]]],
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
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "download_icon",
        "Download Icon",
        [c(
        "color",
        "Color",
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
        "space",
        "Space",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['path' => 'design.button.button_style', 'operand' => 'equals', 'value' => 'download']],
        false,
        false,
        [],
      ), c(
        "hover_effects",
        "Hover Effects",
        [c(
        "transition_duration_ms_",
        "Transition Duration(ms)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
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
        "border_to_animate",
        "Border To Animate",
        [],
        ['type' => 'multiselect', 'layout' => 'inline', 'items' => ['0' => ['value' => 'top', 'text' => 'Top', 'icon' => 'BorderTopIcon'], '1' => ['text' => 'Right', 'value' => 'right', 'icon' => 'ArrowRightIcon'], '2' => ['text' => 'Bottom', 'value' => 'bottom', 'icon' => 'BorderBottomIcon'], '3' => ['text' => 'Left', 'value' => 'left']], 'buttonBarOptions' => ['layout' => 'default', 'size' => 'small'], 'condition' => ['path' => 'design.effects.choose_button_style', 'operand' => 'equals', 'value' => 'border']],
        false,
        false,
        [],
      ), c(
        "border_color",
        "Border Color",
        [],
        ['type' => 'color', 'layout' => 'inline', 'condition' => ['path' => 'design.effects.choose_button_style', 'operand' => 'equals', 'value' => 'border']],
        false,
        false,
        [],
      ), c(
        "border_size",
        "Border Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'design.effects.choose_button_style', 'operand' => 'equals', 'value' => 'border']],
        false,
        false,
        [],
      ), c(
        "animation_top",
        "Animation Top",
        [c(
        "animate_direction",
        "Animate Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Left', 'value' => 'left', 'icon' => 'ArrowLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'LeftRightIcon'], '2' => ['text' => 'Right', 'value' => 'right', 'icon' => 'ArrowRightIcon']], 'triggerActionsButtonOptions' => ['text' => 'Right'], 'condition' => ['path' => 'design.hover_effects.border_to_animate', 'operand' => 'includes', 'value' => 'top']],
        false,
        false,
        [],
      ), c(
        "delay_ms_",
        "Delay (ms)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'condition' => ['path' => 'design.hover_effects.border_to_animate', 'operand' => 'includes', 'value' => 'top'], 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "animation_right",
        "Animation Right",
        [c(
        "animate_direction",
        "Animate Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Top', 'value' => 'top', 'icon' => 'ArrowUpIcon'], '1' => ['text' => 'Bottom', 'value' => 'bottom', 'icon' => 'ArrowDownIcon']], 'triggerActionsButtonOptions' => ['text' => 'Right'], 'condition' => ['path' => 'design.hover_effects.border_to_animate', 'operand' => 'includes', 'value' => 'right']],
        false,
        false,
        [],
      ), c(
        "delay_ms_",
        "Delay (ms)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'condition' => ['path' => 'design.hover_effects.border_to_animate', 'operand' => 'includes', 'value' => 'right'], 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "animation_bottom",
        "Animation Bottom",
        [c(
        "animate_direction",
        "Animate Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Left', 'value' => 'left', 'icon' => 'ArrowLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'LeftRightIcon'], '2' => ['text' => 'Right', 'value' => 'right', 'icon' => 'ArrowRightIcon']], 'triggerActionsButtonOptions' => ['text' => 'Right']],
        false,
        false,
        [],
      ), c(
        "delay_ms_",
        "Delay (ms)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'condition' => ['path' => 'design.hover_effects.border_to_animate', 'operand' => 'includes', 'value' => 'bottom'], 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "animation_left",
        "Animation Left",
        [c(
        "animate_direction",
        "Animate Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Top', 'value' => 'top', 'icon' => 'ArrowUpIcon'], '1' => ['text' => 'Bottom', 'value' => 'bottom', 'icon' => 'ArrowDownIcon']], 'triggerActionsButtonOptions' => ['text' => 'Right']],
        false,
        false,
        [],
      ), c(
        "delay_ms_",
        "Delay (ms)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'condition' => ['path' => 'design.hover_effects.border_to_animate', 'operand' => 'includes', 'value' => 'left'], 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'design.button.button_style', 'operand' => 'is none of', 'value' => ['0' => 'burger', '1' => 'download']]]]],
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
        ['type' => 'section'],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "button",
        "Button",
        [c(
        "button_text",
        "Button Text",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "button_link",
        "Button Link",
        [],
        ['type' => 'link', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'design.button.button_style', 'operand' => 'not equals', 'value' => 'burger']]]],
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
        return 200;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.button.button_link'], '1' => ['accepts' => 'string', 'path' => 'content.button.button_text'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '8' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '9' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return false;
    }
}
