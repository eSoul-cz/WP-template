<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\DeTable",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class DeTable extends \Breakdance\Elements\Element
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
        return ['div'];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Table';
    }

    static function className()
    {
        return 'de-table';
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
        return __CLASS__;
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
        return ['content' => ['table' => ['head' => [], 'table_head' => [[]], 'table' => [['data' => [['data_text' => 'Audi', 'item' => ['data_text' => 'Germanyy']], ['data_text' => 'Kia'], ['data_text' => 'Honda'], ['data_text' => 'BMW']], 'header' => 'Company', 'enable_sort' => true, 'table_data' => [['data' => 'Audi'], ['data' => 'Kia'], ['data' => 'Honda'], ['data' => 'BMW']]], ['header' => 'Contact', 'data' => [['data_text' => 'John'], ['data_text' => 'Jane'], ['data_text' => 'Dave'], ['data_text' => 'Joe']], 'your_control' => 'Contacts', 'item' => ['header' => 'Contact'], 'enable_sort' => false, 'table_data' => [['data' => 'John'], ['data' => 'Dave'], ['data' => 'Jane'], ['data' => 'Joe']]], ['header' => 'Country', 'data' => [['data_text' => 'Germany'], ['data_text' => 'North Korea'], ['data_text' => 'Japan'], ['data_text' => 'Germany']], 'enable_sort' => true, 'item' => ['header' => 'Countryy'], 'table_data' => [['data' => 'Germany'], ['data' => 'North Korea'], ['data' => 'Japan'], ['data' => 'Germany']]], ['header' => 'Phone', 'data' => [['data_text' => '01 2345 2343'], ['data_text' => '01 2345 2347'], ['data_text' => '01 2345 2345'], ['data_text' => '01 2345 2341']], 'enable_sort' => false, 'table_data' => [['data' => '012346'], ['data' => '012348'], ['data' => '012347'], ['data' => '012345']]]], 'caption' => 'Table Example']], 'design' => ['layout' => ['head_position' => 'top'], 'table' => ['width' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'borders' => null, 'overflow' => 'Scroll'], 'head' => ['borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid']]]], 'padding_' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'right' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'bottom' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'left' => ['number' => 8, 'unit' => 'px', 'style' => '8px']]]], 'padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'right' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'bottom' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'left' => ['number' => 8, 'unit' => 'px', 'style' => '8px']]]], 'typography' => ['typography' => ['custom' => ['customTypography' => []]], 'text_align' => ['breakpoint_base' => 'left'], 'color' => ['breakpoint_base' => '#FFFFFFFF']], 'background_color' => '#0b2035', 'background_color_hover' => null, 'position' => 'top'], 'body' => ['borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#ddd', 'style' => 'solid']]]], 'padding' => ['padding' => ['breakpoint_base' => ['right' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'left' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'bottom' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'top' => ['number' => 8, 'unit' => 'px', 'style' => '8px']]]], 'background_color' => '#FFFFFFFF', 'background_color_hover' => null, 'cell_width' => ['number' => null, 'unit' => '%', 'style' => null]], 'sort_icon' => ['size' => ['number' => 4, 'unit' => 'px', 'style' => '4px'], 'color' => '#FFFFFFFF', 'right_gap' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'padding' => ['padding' => ['breakpoint_base' => ['right' => null]]]], 'columns' => ['odd_background_color' => null, 'odd_background_color_hover' => '#fc7904', 'even_background_color' => '#F5F5F5FF', 'even_background_color_hover' => '#fc7904', 'odd_typography' => ['typography' => ['custom' => ['customTypography' => ['fontWeight' => null]]]], 'even_typography' => null], 'effects' => ['hover_transition' => ['number' => 100, 'unit' => 'ms', 'style' => '100ms']], 'rows' => ['odd_background_color' => null, 'even_background_color' => '#F1F1F1FF', 'even_background_color_hover' => null, 'odd_background_color_hover' => null], 'caption' => ['baackground_color' => null, 'padding_' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'typography' => ['text_align' => ['breakpoint_base' => null], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]]]]], 'borders' => null]]];
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
        "width",
        "Width",
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
     ), c(
        "overflow",
        "Overflow",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => [['text' => 'Visible', 'value' => 'visible'], ['text' => 'Hidden', 'value' => 'hidden'], ['text' => 'Scroll', 'value' => 'Scroll'], ['text' => 'Auto', 'value' => 'auto']]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "caption",
        "Caption",
        [getPresetSection(
      "EssentialElements\\typography_with_align",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "baackground_color",
        "Baackground Color",
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
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding ",
      "padding_",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "head",
        "Head",
        [c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'top', 'text' => 'Top'], ['text' => 'Left', 'value' => 'left']]],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
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
        "body",
        "Body",
        [getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
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
     ), c(
        "cell_width",
        "Cell Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "rows",
        "Rows",
        [c(
        "odd_background_color",
        "Odd Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Odd Typography",
      "odd_typography",
       ['type' => 'popout']
     ), c(
        "even_background_color",
        "Even Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Even Typography",
      "even_typography",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'condition' => ['path' => 'design.head.position', 'operand' => 'not equals', 'value' => 'left']],
        false,
        false,
        [],
      ), c(
        "columns",
        "Columns",
        [c(
        "odd_background_color",
        "Odd Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Odd Typography",
      "odd_typography",
       ['type' => 'popout']
     ), c(
        "even_background_color",
        "Even Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_align_with_hoverable_color",
      "Even Typography",
      "even_typography",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'condition' => ['path' => 'design.head.position', 'operand' => 'equals', 'value' => 'left']],
        false,
        false,
        [],
      ), c(
        "sort_icon",
        "Sort Icon",
        [c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px']]],
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
        "right_gap",
        "Right Gap",
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
        "hover_transition",
        "Hover Transition",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1000], 'unitOptions' => ['types' => ['ms']]],
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
        "table",
        "Table",
        [c(
        "caption",
        "Caption",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "alert",
        "Alert",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Columns are calculated with how many rows of data added to the first table item.</p>']],
        false,
        false,
        [],
      ), c(
        "table",
        "Table",
        [c(
        "enable_sort",
        "Enable Sort",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "header",
        "Header",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "table_data",
        "Table Data",
        [c(
        "data",
        "Data",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "colspan",
        "Colspan",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 1, 'max' => 5]],
        false,
        false,
        [],
      ), c(
        "link",
        "Link",
        [],
        ['type' => 'link', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{data}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{header}', 'defaultTitle' => '', 'buttonName' => '']],
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
        return ['0' =>  ['title' => 'Sorting','inlineScripts' => ['document.querySelector(\'%%SELECTOR%%\').addEventListener("click", deSortTable%%ID%%);

function deSortTable%%ID%%(e) {
  let obj = e.target;
  var deTable, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  
  deTable = document.querySelector(\'%%SELECTOR%% table\');
  switching = true;
  dir = "asc";
  
  if (obj.classList.contains(\'de-sort\')) {
    while (switching) {
      switching = false;
      rows = deTable.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[obj.cellIndex];
        y = rows[i + 1].getElementsByTagName("TD")[obj.cellIndex];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
}'],],];
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

'onPropertyChange' => [['script' => 'document.querySelector(\'%%SELECTOR%%\').addEventListener("click", deSortTable%%ID%%);

function deSortTable%%ID%%(e) {
  let obj = e.target;
  var deTable, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  
  deTable = document.querySelector(\'%%SELECTOR%% table\');
  switching = true;
  dir = "asc";
  
  if (obj.classList.contains(\'de-sort\')) {
    while (switching) {
      switching = false;
      rows = deTable.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[obj.cellIndex];
        y = rows[i + 1].getElementsByTagName("TD")[obj.cellIndex];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
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
        return 345;
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
        return ['design.sort_icon.color', 'design.sort_icon.size'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
