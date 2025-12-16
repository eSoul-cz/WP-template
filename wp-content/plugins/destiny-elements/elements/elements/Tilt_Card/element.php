<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\TiltCard",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class TiltCard extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M284.3 11.7c-15.6-15.6-40.9-15.6-56.6 0l-216 216c-15.6 15.6-15.6 40.9 0 56.6l216 216c15.6 15.6 40.9 15.6 56.6 0l216-216c15.6-15.6 15.6-40.9 0-56.6l-216-216z"/></svg>';
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
        return 'Tilt Card';
    }

    static function className()
    {
        return 'de_tilt_card';
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
        return ['design' => ['container' => ['width' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'heght' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'background' => null], 'layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']], 'text_colors' => ['text' => '#F1F1F1FF']], 'content' => ['tilt_settings' => ['max_titlt_rotation' => 50, 'max_titlt_rotation_deg_' => 10, 'work_outside_flip_card' => true, 'work_outside_tilt_card' => true, 'reverse_tilt_direction' => true, 'scale' => null, 'speed' => 400, 'glare_effect' => false, 'keep_floating' => false]]];
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
      ), c(
        "heght",
        "Heght",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Margin & Padding",
      "margin_padding",
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
      ), getPresetSection(
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     )];
    }

    static function contentControls()
    {
        return [c(
        "tilt_settings",
        "Tilt Settings",
        [c(
        "reverse_tilt_direction",
        "Reverse Tilt Direction",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "max_titlt_rotation_deg_",
        "Max Titlt Rotation (Deg)",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "work_outside_tilt_card",
        "Work Outside Tilt Card",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "scale",
        "Scale",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['step' => 0.01]],
        false,
        false,
        [],
      ), c(
        "speed",
        "Speed",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "glare_effect",
        "Glare Effect",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "keep_floating",
        "Keep Floating",
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
        return ['0' =>  ['title' => 'Tilt JS','scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/vanilla-tilt@1/vanilla-tilt-v1-7-0.min.js'],'inlineScripts' => ['let deCurrentCard = document.querySelector("%%SELECTOR%%");
deCurrentCard.vanillaTilt && deCurrentCard.vanillaTilt.destroy();
VanillaTilt.init(deCurrentCard);
'],],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => false, 'withDependenciesInHtml' => false, 'bypassPointerEvents' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => 'let deCurrentCard = document.querySelector("%%SELECTOR%%");

if (deCurrentCard) {
    VanillaTilt.init(deCurrentCard);

    if (deCurrentCard.vanillaTilt) {
        deCurrentCard.vanillaTilt.destroy();
    }

    VanillaTilt.init(deCurrentCard);
}',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container",   ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return [['name' => 'data-tilt', 'template' => 'true'], ['name' => 'data-tilt-reverse', 'template' => '{% if content.tilt_settings.reverse_tilt_direction %}
true
{% else %}
{% endif %}'], ['name' => 'data-tilt-max', 'template' => '{{ content.tilt_settings.max_titlt_rotation_deg_ }}'], ['name' => 'data-tilt-scale', 'template' => '{{ content.tilt_settings.scale }}'], ['name' => 'data-tilt-speed', 'template' => '{{ content.tilt_settings.speed }}'], ['name' => 'data-tilt-glare', 'template' => '{% if content.tilt_settings.glare_effect %}
true
{% else %}
{% endif %}'], ['name' => 'data-tilt-reset', 'template' => '{% if content.tilt_settings.keep_floating %}
false
{% else %}
{% endif %}'], ['name' => 'data-tilt-full-page-listening', 'template' => '{% if content.tilt_settings.work_outside_tilt_card %}
true
{% endif %}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 675;
    }

    static function dynamicPropertyPaths()
    {
        return [];
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
