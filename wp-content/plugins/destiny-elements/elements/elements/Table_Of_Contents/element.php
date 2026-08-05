<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\TableOfContents",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class TableOfContents extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M24 56c0-13.3 10.7-24 24-24H80c13.3 0 24 10.7 24 24V176h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H40c-13.3 0-24-10.7-24-24s10.7-24 24-24H56V80H48C34.7 80 24 69.3 24 56zM86.7 341.2c-6.5-7.4-18.3-6.9-24 1.2L51.5 357.9c-7.7 10.8-22.7 13.3-33.5 5.6s-13.3-22.7-5.6-33.5l11.1-15.6c23.7-33.2 72.3-35.6 99.2-4.9c21.3 24.4 20.8 60.9-1.1 84.7L86.8 432H120c13.3 0 24 10.7 24 24s-10.7 24-24 24H32c-9.5 0-18.2-5.6-22-14.4s-2.1-18.9 4.3-25.9l72-78c5.3-5.8 5.4-14.6 .3-20.5zM224 64H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 160H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 160H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H224c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>';
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
        return 'Table Of Contents ';
    }

    static function className()
    {
        return 'de-toc';
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
        return ['content' => ['options' => ['headings_to_include' => ' h2, h3', 'collapsable' => false, 'collapse_subheadings' => true, 'list_style' => 'decimal']], 'design' => ['typography' => ['links' => ['color' => ['breakpoint_base' => '#000000FF'], 'color_hover' => ['breakpoint_base' => '#FC7904'], 'typography' => ['custom' => ['customTypography' => ['advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['0' => 'none']]]]]]]], 'active_links' => ['typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700']]]]]], 'container' => ['color' => null, 'padding' => ['padding' => ['left' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]], 'margin' => null], 'list' => ['gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]]];
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
        "color",
        "Color",
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
        "padding",
        "Padding",
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
      ), c(
        "margin",
        "Margin",
        [c(
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
      "EssentialElements\\typography_with_hoverable_color",
      "Links",
      "links",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Active Links",
      "active_links",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "list",
        "List",
        [c(
        "gap",
        "Gap",
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
      )];
    }

    static function contentControls()
    {
        return [c(
        "options",
        "Options",
        [c(
        "headings_to_include",
        "Headings to include",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "info",
        "Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Example "h1, h2, h3"</p>']],
        false,
        false,
        [],
      ), c(
        "collapse_subheadings",
        "Collapse Subheadings",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "list_style",
        "List Style",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'decimal', 'text' => 'Decimal'], '1' => ['text' => 'Decimal leading zero ', 'value' => 'decimal-leading-zero'], '2' => ['value' => 'lower-roman', 'text' => 'Lower Roman'], '3' => ['value' => 'upper-roman', 'text' => 'Upper Roman'], '4' => ['text' => 'Lower Alphabet', 'value' => 'lower-alpha'], '5' => ['text' => 'Upper Alphabet', 'value' => 'upper-alpha'], '6' => ['text' => 'Gujarati', 'value' => 'gujarati'], '7' => ['value' => 'hebrew', 'text' => 'Hebrew']]],
        false,
        false,
        [],
      ), c(
        "alert",
        "Alert",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Add ".de-toc-content" class to advanced options of your post content container</p>']],
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
        return ['0' =>  ['scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/tocbot@4/tocbot.min.js'],'title' => 'Toc','inlineScripts' => ['const deContentHeadings = document.querySelectorAll(".de-toc-content h1,.de-toc-content h2,.de-toc-content h3,.de-toc-content h4,.de-toc-content h5,.de-toc-content h6");

deContentHeadings.forEach((e) => {
  let deInner = e.getAttribute("id");
  let deInnerText = e.innerHTML.replace(/\s+/g, \'-\').toLowerCase();;
  console.log(e);
  if(!deInner) {
    e.setAttribute("id", deInnerText)
  }
});','const deHSelectors = "{{ content.options.headings_to_include }}";
if(document.querySelector(\'.de-toc-content\')) {
  tocbot.init({
    tocSelector: \'.de-toc\',
    contentSelector: \'.de-toc-content\',
    headingSelector: deHSelectors,
    hasInnerContainers: true,
    linkClass: "de-toc-link",
    listClass: "de-toc-list",
    listItemClass: "de-toc-list-item",
    activeListItemClass: "de-toc-active-item",
    activeLinkClass: "de-toc-active-link",
    isCollapsedClass: \'de-toc-is-collapsed\',
  });
}'],],];
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
        return [

'onPropertyChange' => [['script' => 'const deHSelectors = "{{ content.options.headings_to_include }}";


if(deHSelectors && document.querySelector(\'.de-toc-content\')) {
  tocbot.init({
    tocSelector: \'.de-toc\',
    contentSelector: \'.de-toc-content\',
    headingSelector: deHSelectors,
    hasInnerContainers: true,
    linkClass: "de-toc-link",
    listClass: "de-toc-list",
    listItemClass: "de-toc-list-item",
    activeListItemClass: "de-toc-active-item",
    activeLinkClass: "de-toc-active-link",
    isCollapsedClass: \'de-toc-is-collapsed\',
  });
}',
],],

'onCreatedElement' => [['script' => 'const deHSelectors = "{{ content.options.headings_to_include }}";


if(deHSelectors && document.querySelector(\'.de-toc-content\')) {
  tocbot.init({
    tocSelector: \'.de-toc\',
    contentSelector: \'.de-toc-content\',
    headingSelector: deHSelectors,
    hasInnerContainers: true,
    linkClass: "de-toc-link",
    listClass: "de-toc-list",
    listItemClass: "de-toc-list-item",
    activeListItemClass: "de-toc-active-item",
    activeLinkClass: "de-toc-active-link",
    isCollapsedClass: \'de-toc-is-collapsed\',
  });
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
        return 600;
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
