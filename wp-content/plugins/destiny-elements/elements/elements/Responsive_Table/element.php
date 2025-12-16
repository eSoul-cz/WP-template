<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\ResponsiveTable",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ResponsiveTable extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 256V160H224v96H64zm0 64H224v96H64V320zm224 96V320H448v96H288zM448 256H288V160H448v96zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg>';
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
        return 'Responsive Table';
    }

    static function className()
    {
        return 'de-advanced-table';
    }

    static function category()
    {
        return 'destiny_ess';
    }

    static function badge()
    {
        return ['backgroundColor' => 'var(--white)', 'textColor' => 'var(--black)', 'label' => 'New'];
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
        return ['content' => ['table_data' => ['row_headers' => ['0' => ['row_header' => '09:00 - 11:00'], '1' => ['row_header' => '11:00 - 13:00'], '2' => ['row_header' => '13:00 - 15:00'], '3' => ['row_header' => '15: 00 - 17:00']], 'columns' => ['0' => ['column_header' => 'Monday', 'column_items' => ['0' => ['text' => 'Open'], '1' => ['text' => null, 'link_name' => 'Book Slot', 'link_url' => '#'], '2' => ['text' => 'Open'], '3' => ['text' => 'Open']]], '1' => ['column_header' => 'Tuesday', 'column_items' => ['0' => ['text' => 'Open', 'link_name' => null], '1' => ['text' => 'Open'], '2' => ['text' => 'Closed'], '3' => ['text' => 'Open']]], '2' => ['column_header' => 'Wednesday', 'column_items' => ['0' => ['text' => 'Open'], '1' => ['text' => 'Closed'], '2' => ['text' => null, 'link_name' => 'Book Slot', 'link_url' => '#'], '3' => ['text' => 'Closed ']]], '3' => ['column_header' => 'Thursday', 'column_items' => ['0' => ['text' => 'Open'], '1' => ['text' => 'Close'], '2' => ['text' => 'Open'], '3' => ['text' => 'Open']]], '4' => ['column_header' => 'Friday', 'column_items' => ['0' => ['text' => 'Open'], '1' => ['text' => 'Close'], '2' => ['text' => 'Open'], '3' => ['text' => 'Close']]]]], 'accordion_options' => ['enable_accordion_on' => 'land', 'show_all_panels_inside_builder' => true], 'table_options' => ['disable_column_headers' => false, 'disable_row_headers' => false]], 'design' => ['table' => ['max_height' => ['breakpoint_base' => null], 'borders' => null], 'column_headers' => ['borders' => ['border' => ['breakpoint_base' => ['top' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'bottom' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'left' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'right' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid']]]], 'background_color' => '#804674', 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700']]]]]], 'row_headers' => ['borders' => ['border' => ['breakpoint_base' => ['top' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'bottom' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'left' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'right' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid']]]], 'background_color' => '#B3E5BE', 'typography' => ['color' => ['breakpoint_base' => '#080404FF'], 'text_align' => ['breakpoint_base' => null], 'typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700']]]]], 'width' => ['min_width' => ['breakpoint_base' => ['number' => 200, 'unit' => 'px', 'style' => '200px']]]], 'table_cells' => ['borders' => ['border' => ['breakpoint_base' => ['top' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'bottom' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'left' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid'], 'right' => ['color' => '#E2E2E2FF', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'style' => 'solid']]]]], 'links' => ['button' => ['style' => 'secondary', 'custom' => ['background' => '#6629ECFF', 'outline' => false, 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'size' => ['size' => ['breakpoint_base' => 'custom'], 'padding' => ['breakpoint_base' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'effects' => ['transition_duration' => ['breakpoint_base' => ['number' => 96, 'unit' => 'ms', 'style' => '96ms']]]]]], 'link_button' => ['background_color' => '#A86464DB', 'padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'bottom' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'typography' => ['typography' => ['custom' => ['customTypography' => ['advanced' => ['textDirection' => ['breakpoint_base' => null], 'textTransform' => ['breakpoint_base' => null]], 'fontWeight' => ['breakpoint_base' => '700']]]], 'color' => ['breakpoint_base' => '#FFFFFFFF']], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]], 'background_color_hover' => '#A86464'], 'accordion' => ['icon' => ['open_icon' => ['slug' => 'icon-plus.', 'name' => 'plus', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>'], 'close_icon' => ['slug' => 'icon-minus', 'name' => 'minus', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-minus" viewBox="0 0 32 32">
<path d="M0 13v6c0 0.552 0.448 1 1 1h30c0.552 0 1-0.448 1-1v-6c0-0.552-0.448-1-1-1h-30c-0.552 0-1 0.448-1 1z"/>
</svg>'], 'color' => '#FFFFFFFF', 'size' => ['number' => 15, 'unit' => 'px', 'style' => '15px']], 'spacing' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]];
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
        "table",
        "Table",
        [c(
        "max_width",
        "Max Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "max_height",
        "Max Height",
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
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "table_cells",
        "Table Cells",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_and_align_with_hoverable_color_and_effects",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "column_headers",
        "Column Headers",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_and_align_with_hoverable_color_and_effects",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "row_headers",
        "Row Headers",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_and_align_with_hoverable_color_and_effects",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "link_button",
        "Link/Button",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
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
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "accordion",
        "Accordion",
        [c(
        "icon",
        "Icon",
        [c(
        "open_icon",
        "Open Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "close_icon",
        "Close Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
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
        "size",
        "Size",
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
        "spacing",
        "Spacing",
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
        "table_data",
        "Table Data",
        [c(
        "row_headers",
        "Row Headers",
        [c(
        "row_header",
        "Row Header",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{row_header}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      ), c(
        "columns",
        "Columns",
        [c(
        "column_header",
        "Column Header",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "column_items",
        "Column Items",
        [c(
        "text",
        "Text",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "link_name",
        "Link Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "link_url",
        "Link URL",
        [],
        ['type' => 'url', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "open_in_new_tab",
        "Open in New Tab",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{text}{link_name}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{column_header}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "table_options",
        "Table Options",
        [c(
        "columns",
        "Columns",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Columns</p>']],
        false,
        false,
        [],
      ), c(
        "disable_column_headers",
        "Disable Column Headers",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "sticky_column_headers",
        "Sticky Column Headers",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "rows",
        "Rows",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Rows</p>']],
        false,
        false,
        [],
      ), c(
        "disable_row_headers",
        "Disable Row Headers",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "sticky_row_headers",
        "Sticky Row Headers",
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
        "accordion_options",
        "Accordion Options",
        [c(
        "enable_accordion_on",
        "Enable Accordion On",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'land', 'text' => 'Phone Landscape'], '1' => ['value' => 'port', 'text' => 'Phone Portrait']]],
        false,
        false,
        [],
      ), c(
        "disable_accordion_style",
        "Disable Accordion Style",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "show_all_panels_inside_builder",
        "Show All Panels inside Builder",
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
        return ['0' =>  ['inlineScripts' => ['const deAdvancedTables = document.querySelectorAll(\'.de-advanced-table\');

deAdvancedTables.forEach(el => {
  const columnH = el.querySelectorAll(\'.de-col-header\');
  const rowH = el.querySelectorAll(\'.de-row-header\');
  
  el.setAttribute(\'aria-colcount\', columnH.length + 1);
  el.setAttribute(\'aria-rowcount\', rowH.length + 1);

});'],'title' => 'Accesibility','builderCondition' => 'false',],'1' =>  ['title' => 'Accordion Style','scripts' => [DESTINY_ELEMENTS_PLUGIN_URL .'elements/dependencies-files/responsive-table-min.js'],],'2' =>  ['title' => 'RunTable','inlineScripts' => ['deResponsiveTable();'],'builderCondition' => 'return false;',],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onMountedElement' => [['script' => 'deResponsiveTable();

const builderPanels = document.querySelectorAll(\'%%SELECTOR%% .de-table-acc-panel\');

{% if content.accordion_options.show_all_panels_inside_builder %}
builderPanels.forEach(el => el.style.display = "grid");
{% else %}
builderPanels.forEach(el => el.style.display = "none");
{% endif %}',
],],

'onPropertyChange' => [['script' => 'const builderPanels = document.querySelectorAll(\'%%SELECTOR%% .de-table-acc-panel\');
const builderHEaders = document.querySelectorAll(\'%%SELECTOR%% .de-col-header\');


{% if content.accordion_options.show_all_panels_inside_builder %}
builderPanels.forEach(el => el.style.display = "grid");
builderHEaders.forEach(el => el.classList.add(\'active\'));
{% else %}
builderPanels.forEach(el => el.style.display = "none");
builderHEaders.forEach(el => el.classList.remove(\'active\'));
{% endif %}',
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
        return [['name' => 'role', 'template' => 'table'], ['name' => 'data-breakpoint', 'template' => '{% if content.accordion_options.enable_accordion_on  == \'land\' %}
767
{% elseif content.accordion_options.enable_accordion_on  == \'port\' %}
479
{% endif %}'], ['name' => 'table-id', 'template' => '%%ID%%'], ['name' => 'data-acc', 'template' => '{% if content.accordion_options.disable_accordion_style %}
false
{% else %}
true
{% endif %}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 346;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.links.styles.styles.size.full_width_at', 'design.links.button.custom.size.full_width_at', 'design.links.button.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.columns', 'content.table_data', 'content.table_options'];
    }
}
