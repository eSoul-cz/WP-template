<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\CopyrightYear",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class CopyrightYear extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-114.7 0-208-93.31-208-208S141.3 48 256 48s208 93.31 208 208S370.7 464 256 464zM255.1 176C255.1 176 255.1 176 255.1 176c21.06 0 40.92 8.312 55.83 23.38c9.375 9.344 24.53 9.5 33.97 .1562c9.406-9.344 9.469-24.53 .1562-33.97c-24-24.22-55.95-37.56-89.95-37.56c0 0 .0313 0 0 0c-33.97 0-65.95 13.34-89.95 37.56c-49.44 49.88-49.44 131 0 180.9c24 24.22 55.98 37.56 89.95 37.56c.0313 0 0 0 0 0c34 0 65.95-13.34 89.95-37.56c9.312-9.438 9.25-24.62-.1562-33.97c-9.438-9.312-24.59-9.219-33.97 .1562c-14.91 15.06-34.77 23.38-55.83 23.38c0 0 .0313 0 0 0c-21.09 0-40.95-8.312-55.89-23.38c-30.94-31.22-30.94-82.03 0-113.3C214.2 184.3 234 176 255.1 176z"/></svg>';
    }

    static function tag()
    {
        return 'p';
    }

    static function tagOptions()
    {
        return ['div', 'h2', 'span', 'h3', 'h4', 'h5', 'h6', 'summary', 'a'];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Copyright Year';
    }

    static function className()
    {
        return 'de-cry';
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
        return ['content' => ['main_options' => ['new_control' => ['0' => 0, '1' => 8], 'display_format' => 'currentyear', 'include_start_year' => false, 'start_year' => null, 'text_before_year' => null, 'text_after_year' => null, 'custom_start_year' => null, 'company_name' => 'Your Company Name Here']], 'design' => ['main_styles' => ['typography' => null, 'margin' => ['top' => null, 'bottom' => null]]]];
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
        "main_styles",
        "Main Styles",
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
        "display_format",
        "Display Format",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'currentyear', 'text' => 'Copyright © [Current Year]. [Company Name]. All rights reserved.'], '1' => ['text' => 'Copyright © [Start Date] – [Current Year]. [Company Name]. All rights reserved.', 'value' => 'startandcurrentyear'], '2' => ['text' => 'Custom', 'value' => 'custom']]],
        false,
        false,
        [],
      ), c(
        "company_name",
        "Company Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'variableOptions' => ['enabled' => false]],
        false,
        false,
        [],
      ), c(
        "include_start_year",
        "Include Start Year",
        [],
        ['type' => 'toggle', 'layout' => 'vertical', 'condition' => ['path' => 'content.main_options.display_format', 'operand' => 'equals', 'value' => 'custom']],
        false,
        false,
        [],
      ), c(
        "start_year",
        "Start Year",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'condition' => ['path' => 'content.main_options.display_format', 'operand' => 'is one of', 'value' => ['0' => 'startandcurrentyear', '1' => 'custom']]],
        false,
        false,
        [],
      ), c(
        "text_before_year",
        "Text Before Year",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['path' => 'content.main_options.display_format', 'operand' => 'equals', 'value' => 'custom'], 'variableOptions' => ['enabled' => false]],
        false,
        false,
        [],
      ), c(
        "text_after_year",
        "Text After Year",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['path' => 'content.main_options.display_format', 'operand' => 'equals', 'value' => 'custom']],
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
        return [];
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
        return 110;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.main_options.company_name'], '1' => ['accepts' => 'string', 'path' => 'content.main_options.custom_start_year'], '2' => ['accepts' => 'string', 'path' => 'content.main_options.start_year'], '3' => ['accepts' => 'string', 'path' => 'content.main_options.text_after_year'], '4' => ['accepts' => 'string', 'path' => 'content.main_options.text_before_year']];
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
        return ['content.main_options.company_name'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
