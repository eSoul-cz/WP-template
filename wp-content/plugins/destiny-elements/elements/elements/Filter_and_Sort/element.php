<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\FilterAndSort",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class FilterAndSort extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>';
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
        return 'Isotope Filter';
    }

    static function className()
    {
        return 'de-filter-sort';
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
        return ['content' => ['layout' => ['layout_mode' => 'fitRows']], 'design' => ['content' => ['container' => ['width' => ['breakpoint_base' => ['number' => 33.33, 'unit' => '%', 'style' => '33.33%']], 'height' => ['breakpoint_base' => ['number' => 200, 'unit' => 'px', 'style' => '200px']]], 'gap_px_' => null], 'container' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']]], 'tabs' => ['position' => 'full', 'space_between' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'space' => ['margin' => ['margin' => ['breakpoint_base' => ['bottom' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]]]]], 'single_tab' => ['color' => ['breakpoint_base' => '#0b2035'], 'active_color' => ['breakpoint_base' => '#fc7904'], 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'color_hover' => ['breakpoint_base' => '#fc7904'], 'spacing' => ['padding' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'left' => ['number' => 30, 'unit' => 'px', 'style' => '30px']]], 'width' => ['number' => null, 'unit' => '%', 'style' => null], 'border' => ['border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]]]];
    }

    static function defaultChildren()
    {
        return [['slug' => 'DestinyElements\DeTabs'], ['slug' => 'DestinyElements\DeContent']];
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
        true,
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
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "tabs",
        "Tabs",
        [c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Left', 'icon' => 'FlexAlignLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterHorizontalIcon'], '2' => ['text' => 'Right', 'value' => 'flex-end', 'icon' => 'FlexAlignRightIcon'], '3' => ['text' => 'Full', 'value' => 'full']]],
        false,
        false,
        [],
      ), c(
        "space_between",
        "Space between",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 100]],
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
        "space",
        "Space",
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
        "single_tab",
        "Single Tab",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
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
        "active_color",
        "Active Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Active Typography",
      "active_typography",
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
        "content",
        "Content",
        [c(
        "background",
        "Background",
        [c(
        "color",
        "Color",
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
        "gap_px_",
        "Gap (px)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "container",
        "Container",
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
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'content.layout.layout_mode', 'operand' => 'not equals', 'value' => 'masonry']],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
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
        "layout",
        "Layout",
        [c(
        "layout_mode",
        "Layout Mode",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'masonry', 'text' => 'Masonry'], '1' => ['text' => 'fitRows', 'value' => 'fitRows'], '2' => ['text' => 'Vertical', 'value' => 'vertical']]],
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
        return ['0' =>  ['title' => 'Isotope','scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/isotope-layout@3.0.6/isotope.pkgd.min.js'],'inlineScripts' => ['let deIsoElem = document.querySelector(\'%%SELECTOR%% .de-filter-content\');
let deLayoutMode = document.querySelector(\'%%SELECTOR%%\').getAttribute(\'layout-mode\');
let deGutter = document.querySelector(\'%%SELECTOR%%\').getAttribute(\'data-gutter\');

let deIso = new Isotope( deIsoElem, {
  itemSelector: \'%%SELECTOR%% .de-filter-content-child\',
  layoutMode: deLayoutMode,
  [deLayoutMode]: {
    gutter: Number(deGutter),
  }
});

let deFilterButtons = document.querySelectorAll("%%SELECTOR%% .de-filter-tab");

let deFilterValue = \'\';

deFilterButtons.forEach((elem) => {
  	if (elem.getAttribute(\'data-filter\') == "all") {
        elem.classList.add("de-active");
       
    };
	elem.addEventListener("click", function () {
        deFilterValue= this.getAttribute(\'data-filter\');
        deIso.arrange({ filter: "." + deFilterValue });
   
       	deFilterButtons.forEach((btn) => {
    		btn.classList.remove("de-active");
  		});
  		this.classList.add("de-active");
    });
});

let deContentChildren = document.querySelectorAll("%%SELECTOR%% .de-filter-content-child");
let deDataCategory = "";
let deDataCategoryArr = [];

deContentChildren.forEach((att) => {
  deDataCategory = att.getAttribute(\'data-category\');
  deDataCategoryArr = deDataCategory.split(\' \');
  deDataCategoryArr.forEach((classes) => {
   	att.classList.add(classes);
  });
});


'],],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => true];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => 'let deIsoElem = document.querySelector(\'%%SELECTOR%% .de-filter-content\');
let deLayoutMode = document.querySelector(\'%%SELECTOR%%\').getAttribute(\'layout-mode\');
let deGutter = document.querySelector(\'%%SELECTOR%%\').getAttribute(\'data-gutter\');

let deIso = new Isotope( deIsoElem, {
  itemSelector: \'%%SELECTOR%% .de-filter-content-child\',
  layoutMode: deLayoutMode,
  [deLayoutMode]: {
    gutter: Number(deGutter),
  }
});

let deFilterButtons = document.querySelectorAll("%%SELECTOR%% .de-filter-tab");

let deFilterValue = \'\';

deFilterButtons.forEach((elem) => {
  	if (elem.getAttribute(\'data-filter\') == "all") {
        elem.classList.add("de-active");
    };
	elem.addEventListener("click", function () {
        deFilterValue= this.getAttribute(\'data-filter\');
        deIso.arrange({ filter: "." + deFilterValue });
   
       	deFilterButtons.forEach((btn) => {
    		btn.classList.remove("de-active");
  		});
  		this.classList.add("de-active");
    });
});

let deContentChildren = document.querySelectorAll("%%SELECTOR%% .de-filter-content-child");
let deDataCategory = "";
let deDataCategoryArr = [];

deContentChildren.forEach((att) => {
  deDataCategory = att.getAttribute(\'data-category\');
  deDataCategoryArr = deDataCategory.split(\' \');
  deDataCategoryArr.forEach((classes) => {
   	att.classList.add(classes);
  });
});


',
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
        return [['name' => 'layout-mode', 'template' => '{{ content.layout.layout_mode }}'], ['name' => 'data-gutter', 'template' => '{{ design.content.gap_px_ }}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 300;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.layout.layout_mode']];
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
        return ['design.content.layout.horizontal.vertical_at', 'design.content.background.image', 'design.content.background.overlay.image', 'design.content.background.image_settings.unset_image_at', 'design.content.background.image_settings.size', 'design.content.background.image_settings.height', 'design.content.background.image_settings.repeat', 'design.content.background.image_settings.position', 'design.content.background.image_settings.left', 'design.content.background.image_settings.top', 'design.content.background.image_settings.attachment', 'design.content.background.image_settings.custom_position', 'design.content.background.image_settings.width', 'design.content.background.overlay.image_settings.custom_position', 'design.content.background.image_size', 'design.content.background.overlay.image_size', 'design.content.background.overlay.type', 'design.content.background.image_settings', 'design.single_tab_.button.custom.size.full_width_at', 'design.single_tab_.button.styles', 'design.single_tab.custom.size.full_width_at', 'design.single_tab.styles.size.full_width_at', 'design.single_tab.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
