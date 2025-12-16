<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\FluentForms",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class FluentForms extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M448 75.2v361.7c0 24.3-19 43.2-43.2 43.2H43.2C19.3 480 0 461.4 0 436.8V75.2C0 51.1 18.8 32 43.2 32h361.7c24 0 43.1 18.8 43.1 43.2zm-37.3 361.6V75.2c0-3-2.6-5.8-5.8-5.8h-9.3L285.3 144 224 94.1 162.8 144 52.5 69.3h-9.3c-3.2 0-5.8 2.8-5.8 5.8v361.7c0 3 2.6 5.8 5.8 5.8h361.7c3.2.1 5.8-2.7 5.8-5.8zM150.2 186v37H76.7v-37h73.5zm0 74.4v37.3H76.7v-37.3h73.5zm11.1-147.3l54-43.7H96.8l64.5 43.7zm210 72.9v37h-196v-37h196zm0 74.4v37.3h-196v-37.3h196zm-84.6-147.3l64.5-43.7H232.8l53.9 43.7zM371.3 335v37.3h-99.4V335h99.4z"/></svg>';
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
        return 'Fluent Forms';
    }

    static function className()
    {
        return 'de-ff';
    }

    static function category()
    {
        return 'destiny_forms';
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
        return ['content' => ['form_id' => ['gravity_form_id' => '1'], 'form_settings' => ['gravity_form_id' => 1, 'enable_title' => false, 'enable_description' => false, 'enable_ajax' => true, 'tab_index' => null, 'fluent_forms_id' => 1]], 'design' => ['container' => ['background_color' => null, 'width' => null, 'max_width' => null, 'borders' => null, 'spacing' => ['margin' => ['breakpoint_base' => ['top' => null]], 'padding' => ['breakpoint_base' => ['top' => null]]]], 'form_header' => ['title' => null, 'description' => null, 'container' => null], 'progress_bar' => null, 'steps' => ['progress_typography' => null], 'labels' => ['margin' => ['top' => null], 'typography' => null, 'spacing' => ['margin' => ['breakpoint_base' => ['top' => null, 'bottom' => null]], 'padding' => ['breakpoint_base' => ['top' => null]]]], 'inputs' => ['background' => null, 'border' => null, 'spacing' => ['margin' => ['breakpoint_base' => ['top' => null]]], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null]]]]], 'borders' => ['border_radius' => null, 'border' => null]], 'buttons' => ['submit_button' => null, 'styles' => ['corners' => 'square'], 'button' => ['style' => 'text']], 'checkboxes' => ['display' => 'row', 'gap' => null], 'radios' => ['display' => null], 'consent' => ['checkbox_size' => null], 'sub_labels' => null, 'effects' => ['transition_duration' => null], 'checkboxes_radios' => ['display' => 'row', 'gap' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'margin' => ['top' => null], 'cehckbox_size' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null]]]]], 'spacing' => ['margin' => ['breakpoint_base' => ['top' => null]], 'padding' => ['breakpoint_base' => ['top' => null]]], 'checkbox_radio_button' => ['size' => null, 'checked_color' => null]], 'tooltip' => ['icon_colour' => null, 'icon' => ['size' => null], 'popout' => null, 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 35, 'unit' => 'px', 'style' => '35px']]]]]], 'info_icon' => ['size' => null]], 'info_box' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 35, 'unit' => 'px', 'style' => '35px']]]]]]]]];
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
        "background_color",
        "Background Color",
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
        "max_width",
        "Max Width",
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
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "labels",
        "Labels",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "inputs",
        "Inputs",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background",
        "Background",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        true,
        [],
      ), c(
        "focus_color",
        "Focus Color",
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
        "borders",
        "Borders",
        [c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'border_radius', 'layout' => 'inline'],
        true,
        true,
        [],
      ), c(
        "border",
        "Border",
        [],
        ['type' => 'border_complex', 'layout' => 'vertical'],
        true,
        true,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "buttons",
        "Buttons",
        [c(
        "submit_button",
        "Submit Button",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
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
        true,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
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
        "checkboxes_radios",
        "Checkboxes / Radios",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "display",
        "Display",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'row', 'text' => 'Row', 'icon' => 'EllipsisStrokeIcon'], '1' => ['value' => 'columns', 'text' => 'Column', 'icon' => 'EllipsisStrokeVerticalIcon']]],
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
        "checkbox_radio_button",
        "Checkbox / Radio Button",
        [c(
        "checked_color",
        "Checked Color",
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
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "tooltip",
        "Tooltip",
        [c(
        "info",
        "Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Does not open in Breakdnace, view changes on front end</p>']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background Color",
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
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "info_icon",
        "Info Icon",
        [c(
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
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "prefix",
        "Prefix",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background Color",
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
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "suffix",
        "Suffix",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "background_color",
        "Background Color",
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
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
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
        "form_settings",
        "Form Settings",
        [c(
        "fluent_forms_id",
        "Fluent Forms ID",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'placeholder' => 'Choose Gravity Forms', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'gf_get_menus', 'fetchContextPath' => '', 'refetchPaths' => []]], 'rangeOptions' => ['min' => 1], 'condition' => ['0' => ['0' => ['path' => 'content.form_settings.fluent_form', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "fluent_form",
        "Fluent Form",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_fluent_forms', 'fetchContextPath' => '', 'refetchPaths' => []]]],
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
        return ['0' =>  ['title' => 'Styles','frontendCondition' => 'return false;','styles' => ['/wp-content/plugins/fluentform/assets/css/fluentform-public-default.css?ver=5.0.9','/wp-content/plugins/fluentform/assets/css/fluent-forms-public.css'],'builderCondition' => 'return true;',],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => true, 'withDependenciesInHtml' => true, 'shareStateWithChildSSR' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onCreatedElement' => [['script' => 'let de_head = document.getElementsByTagName(\'HEAD\')[0];
let de_link = document.createElement(\'link\');
de_link.rel = \'stylesheet\';
de_link.type = \'text/css\';
de_link.href = "/wp-content/plugins/FluentFormss/assets/css/dist/theme.min.css";
de_head.appendChild(de_link);',
],],

'onActivatedElement' => [['script' => 'let de_head = document.getElementsByTagName(\'HEAD\')[0];
let de_link = document.createElement(\'link\');
de_link.rel = \'stylesheet\';
de_link.type = \'text/css\';
de_link.href = "/wp-content/plugins/FluentFormss/assets/css/dist/theme.min.css";
de_head.appendChild(de_link);',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return ['0' => ['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.container.margin']];
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
        return 1405;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'image_url', 'path' => 'content.form_id.background.layers[].image'], '1' => ['accepts' => 'string', 'path' => 'design.download.content.text'], '2' => ['accepts' => 'string', 'path' => 'design.download.content.link.url'], '3' => ['accepts' => 'string', 'path' => 'design.buttons.content.text'], '4' => ['accepts' => 'string', 'path' => 'design.buttons.content.link.url'], '5' => ['accepts' => 'string', 'path' => 'design.buttons.submit_button.width'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.buttons.submit_button.button.custom.size.full_width_at', 'design.download.button.custom.size.full_width_at', 'design.download.button.styles', 'design.download.styles.styles.size.full_width_at', 'design.download.styles.styles', 'design.buttons.submit_button.styles.styles.size.full_width_at', 'design.buttons.submit_button.styles.styles', 'design.buttons.submit_button.styles.size.full_width_at', 'design.buttons.styles.styles.size.full_width_at', 'design.buttons.submit_button.custom.size.full_width_at', 'design.buttons.submit_button.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.form_settings.enable_title', 'content.form_settings.enable_description', 'content.form_settings.tab_index', 'content.form_settings.gravity_form_id', 'content.form_settings.fluent_forms_id', 'content.form_settings.fluent_form'];
    }
}
