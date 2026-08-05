<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\Team",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class Team extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 128c0 70.7-57.3 128-128 128s-128-57.3-128-128S153.3 0 224 0s128 57.3 128 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>';
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
        return 'Team';
    }

    static function className()
    {
        return 'de-team';
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
        return ['content' => ['team' => ['people' => ['0' => ['name' => 'Jane Doe', 'image' => null, 'position' => 'UX Designer', 'social_links' => ['0' => ['url' => ['type' => 'url', 'url' => 'https://www.linkedin.com/', 'openInNewTab' => true], 'icon' => 'de-social-icons__icon-linkedin'], '1' => ['icon' => 'de-social-icons__icon-twitter', 'url' => ['type' => 'url', 'url' => 'https://twitter.com/', 'openInNewTab' => true]]]], '1' => ['name' => 'John Doe', 'position' => 'Web Designer ', 'social_links' => ['0' => ['icon' => 'de-social-icons__icon-linkedin', 'url' => ['type' => 'url', 'url' => 'https://www.linkedin.com/feed/', 'openInNewTab' => true]], '1' => ['url' => ['type' => 'url', 'url' => 'https://twitter.com/', 'openInNewTab' => true], 'icon' => 'de-social-icons__icon-twitter']]], '2' => ['name' => 'John Smith', 'position' => 'Web Developer ', 'social_links' => ['0' => ['url' => ['type' => 'url', 'url' => 'https://www.linkedin.com/feed/', 'openInNewTab' => true], 'icon' => 'de-social-icons__icon-linkedin', 'custom_icon' => ['slug' => 'icon-affiliatetheme.', 'name' => 'affiliatetheme', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M159.7 237.4C108.4 308.3 43.1 348.2 14 326.6-15.2 304.9 2.8 230 54.2 159.1c51.3-70.9 116.6-110.8 145.7-89.2 29.1 21.6 11.1 96.6-40.2 167.5zm351.2-57.3C437.1 303.5 319 367.8 246.4 323.7c-25-15.2-41.3-41.2-49-73.8-33.6 64.8-92.8 113.8-164.1 133.2 49.8 59.3 124.1 96.9 207 96.9 150 0 271.6-123.1 271.6-274.9.1-8.5-.3-16.8-1-25z"/></svg>']], '1' => ['icon' => 'de-social-icons__icon-twitter', 'url' => ['type' => 'url', 'url' => 'https://twitter.com/', 'openInNewTab' => true]]], 'image' => null]]], 'image' => ['image_size' => 'medium', 'lazy_load' => false, 'size' => 'thumbnail'], 'links' => ['include_link' => false], 'social_links' => ['include_social_links' => true]], 'design' => ['layout' => ['columns' => ['breakpoint_base' => 'three', 'breakpoint_tablet_portrait' => 'two', 'breakpoint_phone_landscape' => 'one', 'breakpoint_phone_portrait' => 'one', 'breakpoint_tablet_landscape' => 'three'], 'column_gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'row_gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'person_container' => ['height' => null, 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => null, 'right' => null, 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'color' => '#FFFFFF1C', 'position' => 'outside', 'vertical_align' => null, 'align' => 'flex-start'], 'container' => ['spacing' => ['margin' => ['breakpoint_base' => ['top' => null]]], 'height' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'borders' => ['radius' => ['breakpoint_base' => null]]], 'effects' => ['glass_effect' => true, 'glass_effect_blur' => 3, 'transition_from' => 'up', 'hover_reveal' => false, 'transition_duration_ms_' => 300], 'typography' => ['position_typography' => ['color' => ['breakpoint_base' => '#000000FF']], 'name_typography' => ['typography' => ['custom' => ['customTypography' => ['advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['0' => 'none']]]]]]], 'color' => null]], 'social_icons' => ['color' => '#000000FF', 'size' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'spacing' => ['margin' => ['margin' => ['breakpoint_base' => ['top' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'right' => null]]], 'padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'left' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'right' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]]]], 'background_color' => '#D4D4D43D', 'background_color_hover' => '#D4D4D4FF', 'color_hover' => '#FFFFFFFF', 'brand_colors' => true, 'custom_color' => '#000000FF', 'custom_color_hover' => null, 'borders' => ['radius' => ['breakpoint_base' => null]]], 'image' => ['position' => 'center', 'height' => ['number' => 300, 'unit' => 'px', 'style' => '300px'], 'borders' => ['radius' => ['breakpoint_base' => null]]]]];
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
        "height",
        "Height",
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
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "layout",
        "Layout",
        [c(
        "columns",
        "Columns",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'rangeOptions' => ['min' => 1, 'max' => 6], 'items' => ['0' => ['value' => 'one', 'text' => '1'], '1' => ['text' => '2', 'value' => 'two'], '2' => ['value' => 'three', 'text' => '3'], '3' => ['text' => '4', 'value' => 'four'], '4' => ['value' => 'five', 'text' => '5']]],
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
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "effects",
        "Effects",
        [c(
        "hover_reveal",
        "Hover Reveal",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "transition_from",
        "Transition From",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'left', 'text' => 'Left', 'icon' => 'ArrowLeftIcon'], '1' => ['text' => 'Right', 'value' => 'right', 'icon' => 'ArrowRightIcon'], '2' => ['text' => 'Up', 'value' => 'up', 'icon' => 'ArrowUpIcon'], '3' => ['text' => 'Down', 'value' => 'down', 'icon' => 'ArrowDownIcon']]],
        false,
        false,
        [],
      ), c(
        "transition_duration_ms_",
        "Transition Duration(ms)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "glass_effect",
        "Glass Effect",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "glass_effect_blur",
        "Glass Effect Blur",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 10], 'condition' => ['path' => 'design.effects.glass_effect', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "image_zoom_on_hover",
        "Image Zoom on Hover",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "img_transition_duration_ms_",
        "Img Transition Duration(ms)",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => ['path' => 'design.effects.image_zoom_on_hover', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "person_container",
        "Person Container",
        [c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'outside', 'text' => 'Outside'], '1' => ['text' => 'Inside', 'value' => 'inside']]],
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
        "align",
        "Align",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Left', 'value' => 'flex-start', 'icon' => 'FlexAlignLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterHorizontalIcon'], '2' => ['text' => 'Right', 'value' => 'flex-end', 'icon' => 'FlexAlignRightIcon']]],
        false,
        false,
        [],
      ), c(
        "vertical_align",
        "Vertical Align",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['text' => 'Top', 'value' => 'flex-start', 'icon' => 'FlexAlignTopIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterVerticalIcon'], '2' => ['text' => 'Bottom', 'value' => 'flex-end', 'icon' => 'FlexAlignBottomIcon']]],
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
        "typography",
        "Typography",
        [getPresetSection(
      "EssentialElements\\typography",
      "Name Typography",
      "name_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Position Typography",
      "position_typography",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
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
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'center', 'text' => 'Center'], '1' => ['text' => 'Top Left', 'value' => 'top-left'], '2' => ['text' => 'Top Right', 'value' => 'top-right'], '3' => ['text' => 'Bottom Left', 'value' => 'bottom-left'], '4' => ['text' => 'Bottom Right', 'value' => 'bottom-right']]],
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
        "social_icons",
        "Social Icons",
        [c(
        "brand_colors",
        "Brand Colors",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "custom_color",
        "Custom Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
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
        "size",
        "Size",
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
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'condition' => ['path' => 'content.social_links.include_social_links', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "team",
        "Team",
        [c(
        "people",
        "People",
        [c(
        "name",
        "Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "image",
        "Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['0' => 'image'], 'multiple' => false]],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "link",
        "Link",
        [],
        ['type' => 'link', 'layout' => 'vertical', 'condition' => ['path' => 'content.links.include_link', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "social_links",
        "Social Links",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Custom', 'value' => 'de-social-icons__icon-custom'], '1' => ['text' => 'Facebook', 'label' => 'Label', 'value' => 'de-social-icons__icon-facebook'], '2' => ['text' => 'Twitter', 'value' => 'de-social-icons__icon-twitter'], '3' => ['text' => 'Instagram', 'value' => 'de-social-icons__icon-instagram'], '4' => ['text' => 'YouTube', 'value' => 'de-social-icons__icon-youtube'], '5' => ['value' => 'de-social-icons__icon-dribbble', 'text' => 'Dribbble'], '6' => ['value' => 'de-social-icons__icon-behance', 'text' => 'Behance'], '7' => ['value' => 'de-social-icons__icon-github', 'text' => 'GitHub'], '8' => ['value' => 'de-social-icons__icon-linkedin', 'text' => 'LinkedIn'], '9' => ['value' => 'de-social-icons__icon-vimeo', 'text' => 'Vimeo']]],
        false,
        false,
        [],
      ), c(
        "custom_icon",
        "Custom Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.icon', 'operand' => 'equals', 'value' => 'de-social-icons__icon-custom']]]],
        false,
        false,
        [],
      ), c(
        "custom_icon_color",
        "Custom Icon Color",
        [],
        ['type' => 'color', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.icon', 'operand' => 'equals', 'value' => 'de-social-icons__icon-custom']]]],
        false,
        false,
        [],
      ), c(
        "url",
        "Url",
        [],
        ['type' => 'link', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.social_links.include_social_links', 'operand' => 'is set', 'value' => '']]], 'repeaterOptions' => ['titleTemplate' => '', 'defaultTitle' => '', 'buttonName' => 'Add Social Link']],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{name}', 'defaultTitle' => '', 'buttonName' => 'Add Person']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "image",
        "Image",
        [c(
        "size",
        "Size",
        [],
        ['type' => 'media_size_dropdown', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "lazy_load",
        "Lazy Load",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "links",
        "Links",
        [c(
        "info",
        "Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>You can include link for each person, for example if they have an inidividual page for the person. </p>']],
        false,
        false,
        [],
      ), c(
        "include_link",
        "Include Link",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "social_links",
        "Social Links",
        [c(
        "include_social_links",
        "Include Social Links",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
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
        return 320;
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
        return false;
    }
}
