<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\DeContentChildren",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class DeContentChildren extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'SquareIcon';
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
        return 'Sortable Container';
    }

    static function className()
    {
        return 'de-filter-content-child';
    }

    static function category()
    {
        return 'other';
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
        return ['content' => ['options' => ['category' => ['0' => ['name' => 'all'], '1' => ['name' => 'your_slug']]]]];
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
        return [];
    }

    static function contentControls()
    {
        return [c(
        "options",
        "Options",
        [c(
        "category",
        "Category",
        [c(
        "name",
        "Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'placeholder' => 'car van  bus', 'repeaterOptions' => ['titleTemplate' => '{name}', 'defaultTitle' => '', 'buttonName' => '']],
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
        return ['dependsOnGlobalScripts' => true];
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
        return ["type" => "container",  "restrictedToBeADescendantOf" => ['DestinyElements\DeContent'], ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return [['name' => 'data-category', 'template' => 'all{% for item in content.options.category %} {{ item.name }}{% endfor %}']];
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
        return ['0' => ['accepts' => 'string', 'path' => 'content.options.category.name']];
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
        return [''];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
