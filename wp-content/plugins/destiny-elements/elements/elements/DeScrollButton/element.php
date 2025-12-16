<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\Descrollbutton",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class Descrollbutton extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M246.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 402.7 361.4 265.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3l-160 160zm160-352l-160 160c-12.5 12.5-32.8 12.5-45.3 0l-160-160c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L224 210.7 361.4 73.4c12.5-12.5 32.8-12.5 45.3 0s12.5 32.8 0 45.3z"/></svg>';
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
        return 'Scroll Button';
    }

    static function className()
    {
        return 'de-scroll-button';
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
        return ['content' => ['button' => ['scroll_icon' => ['slug' => 'icon-arrow-down2', 'name' => 'arrow down2', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-arrow-down2" viewBox="0 0 32 32">
<path d="M27.414 19.414l-10 10c-0.781 0.781-2.047 0.781-2.828 0l-10-10c-0.781-0.781-0.781-2.047 0-2.828s2.047-0.781 2.828 0l6.586 6.586v-19.172c0-1.105 0.895-2 2-2s2 0.895 2 2v19.172l6.586-6.586c0.39-0.39 0.902-0.586 1.414-0.586s1.024 0.195 1.414 0.586c0.781 0.781 0.781 2.047 0 2.828z"/>
</svg>'], 'text_before' => null, 'text_after' => null, 'scroll_to_selector' => '.scroll-to-section', 'button_type' => 'mouse']], 'design' => ['button' => ['layout' => ['display' => ['breakpoint_base' => 'block']], 'background_colour' => null, 'position' => 'left', 'padding' => ['padding_right_left' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'padding_top_bottom' => null]], 'icon' => ['colour' => 'var(--bde-brand-primary-color)', 'size' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'colour_hover' => 'var(--bde-brand-primary-color)', 'mouse_scroll_colour' => 'var(--bde-brand-primary-color)', 'border_radius' => ['number' => 15, 'unit' => 'px', 'style' => '15px']], 'layout' => ['align' => 'center', 'vertical_align' => 'flex-end', 'top_offset' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'bottom_offset' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'right_offset' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left_offset' => ['number' => 15, 'unit' => 'px', 'style' => '15px']], 'typography' => ['color' => ['breakpoint_base' => '#46595157']], 'effects' => ['transition_duration' => ['number' => 0, 'unit' => 'ms', 'style' => '0ms'], 'icon_effect' => 'bounce', 'fade_duration' => ['number' => 2600, 'unit' => 'ms', 'style' => '2600ms'], 'bounce_duration' => ['number' => 3153, 'unit' => 'ms', 'style' => '3153ms']]]];
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
        "align",
        "Align",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Left', 'icon' => 'FlexAlignLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterHorizontalIcon'], '2' => ['text' => 'Right', 'value' => 'flex-end', 'icon' => 'FlexAlignRightIcon']]],
        false,
        false,
        [],
      ), c(
        "vertical_align",
        "Vertical Align",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Left', 'icon' => 'FlexAlignTopIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterVerticalIcon'], '2' => ['text' => 'Right', 'value' => 'flex-end', 'icon' => 'FlexAlignBottomIcon']]],
        false,
        false,
        [],
      ), c(
        "top_offset",
        "Top Offset",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'design.layout.vertical_align', 'operand' => 'is one of', 'value' => ['0' => 'flex-start']]],
        false,
        false,
        [],
      ), c(
        "right_offset",
        "Right Offset",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'design.layout.align', 'operand' => 'is one of', 'value' => ['0' => 'flex-end']]],
        false,
        false,
        [],
      ), c(
        "bottom_offset",
        "Bottom Offset",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'design.layout.vertical_align', 'operand' => 'is one of', 'value' => ['0' => 'flex-end']]],
        false,
        false,
        [],
      ), c(
        "left_offset",
        "Left Offset",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'design.layout.align', 'operand' => 'is one of', 'value' => ['0' => 'flex-start']]],
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
        "background_colour",
        "Background Colour",
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
        "padding",
        "Padding",
        [c(
        "padding_right_left",
        "Padding Right/Left",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "padding_top_bottom",
        "Padding Top/Bottom",
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
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'content.button.button_type', 'operand' => 'not equals', 'value' => 'mouse']]]],
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
        true,
        [],
      ), c(
        "mouse_scroll_colour",
        "Mouse Scroll Colour",
        [],
        ['type' => 'color', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.button.button_type', 'operand' => 'equals', 'value' => 'mouse']]]],
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
        "border_radius",
        "Border Radius",
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
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "effects",
        "Effects",
        [c(
        "icon_effect",
        "Icon Effect",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'bounce', 'text' => 'Bounce'], '1' => ['text' => 'Fade', 'value' => 'fade']], 'condition' => ['0' => ['0' => ['path' => 'content.button.button_type', 'operand' => 'not equals', 'value' => 'mouse']]]],
        false,
        false,
        [],
      ), c(
        "bounce_duration",
        "Bounce Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']], 'condition' => ['path' => 'design.effects.icon_effect', 'operand' => 'equals', 'value' => 'bounce'], 'rangeOptions' => ['min' => 1000, 'max' => 5000]],
        false,
        false,
        [],
      ), c(
        "fade_duration",
        "Fade Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']], 'condition' => ['0' => ['0' => ['path' => 'design.effects.icon_effect', 'operand' => 'equals', 'value' => 'fade'], '1' => ['path' => 'content.button.button_type', 'operand' => 'not equals', 'value' => 'mouse']]], 'rangeOptions' => ['min' => 1000, 'max' => 5000]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout']],
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
        "button_type",
        "Button Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'custom', 'text' => 'Custom Icon'], '1' => ['text' => 'Animated Mouse', 'value' => 'mouse']]],
        false,
        false,
        [],
      ), c(
        "text_before",
        "Text Before",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "text_after",
        "Text After",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "scroll_icon",
        "Scroll Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.button.button_type', 'operand' => 'equals', 'value' => 'custom']], '1' => ['0' => ['path' => 'content.button.button_type', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "scroll_to_selector",
        "Scroll to Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '.css or #id'],
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
        return ['0' =>  ['title' => 'Scroll Script','inlineScripts' => ['let deScrollButton%%ID%% = document.querySelector(\'%%SELECTOR%%\');
deScrollButton%%ID%%.addEventListener("click", function(){ 
  document.querySelector("{{ content.button.scroll_to_selector }}").scrollIntoView({behavior: "smooth"});
}); '],'builderCondition' => 'false',],];
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

'onPropertyChange' => [['script' => 'let deScrollButton%%ID%% = document.querySelector(\'%%SELECTOR%%\');
deScrollButton%%ID%%.addEventListener("click", function(){ 
  document.querySelector("{{ content.button.scroll_to_selector }}").scrollIntoView({behavior: "smooth"});
}); ',
],],

'onActivatedElement' => [['script' => 'let deScrollButton%%ID%% = document.querySelector(\'%%SELECTOR%%\');
deScrollButton%%ID%%.addEventListener("click", function(){ 
  document.querySelector("{{ content.button.scroll_to_selector }}").scrollIntoView({behavior: "smooth"});
}); ',
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
        return [['name' => 'role', 'template' => 'button'], ['name' => 'aria-label', 'template' => 'Scroll Button']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 620;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.layout.vertical_align', 'design.layout.align'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
