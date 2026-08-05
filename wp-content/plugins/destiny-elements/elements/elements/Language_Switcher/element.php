<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\LanguageSwitcher",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class LanguageSwitcher extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg viewBox="0 0 512 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> <g clip-path="url(#clip0_2_2)"> <path d="M456.836 208.867H264.035C233.617 208.867 208.871 233.613 208.871 264.031V368.781L158.918 404.461C154.977 407.273 152.637 411.82 152.637 416.664C152.637 421.512 154.977 426.059 158.918 428.871L209.473 464.98C213.422 491.551 236.387 512 264.035 512H456.836C487.254 512 512 487.254 512 456.832V264.031C512 233.613 487.254 208.867 456.836 208.867ZM392.008 419.641C388.473 419.641 385.742 418.52 384.941 415.465L378.832 394.094H342.035L335.934 415.465C335.129 418.52 332.398 419.641 328.863 419.641C323.238 419.641 315.688 416.109 315.688 410.969C315.688 410.645 315.848 410.004 316.008 409.359L347.02 308.297C348.465 303.477 354.41 301.223 360.355 301.223C366.461 301.223 372.406 303.477 373.852 308.297L404.863 409.359C405.023 410.004 405.184 410.484 405.184 410.969C405.184 415.945 397.633 419.641 392.008 419.641Z" fill="currentColor"/> <path d="M346.375 377.703H374.336L360.352 328.379L346.375 377.703Z" fill="currentColor"/> <path d="M178.871 264.031C178.871 243.891 185.914 225.375 197.645 210.777C180.531 210.777 164.652 205.422 151.562 196.324C138.473 205.426 122.594 210.777 105.477 210.777C100.809 210.777 97.0195 206.988 97.0195 202.316C97.0195 197.645 100.809 193.859 105.477 193.859C117.465 193.859 128.684 190.539 138.289 184.789C126.703 172.285 119 156.141 117.137 138.273H105.48C100.809 138.273 97.0195 134.488 97.0195 129.816C97.0195 125.145 100.809 121.355 105.48 121.355H143.109V100.816C143.109 96.1406 146.895 92.3555 151.566 92.3555C156.238 92.3555 160.023 96.1406 160.023 100.816V121.355H197.652C202.324 121.355 206.113 125.145 206.113 129.816C206.113 134.488 202.324 138.273 197.652 138.273H185.996C184.133 156.141 176.43 172.285 164.844 184.789C174.445 190.547 185.668 193.859 197.652 193.859C202.117 193.859 205.766 197.32 206.082 201.707C221.297 187.551 241.668 178.867 264.039 178.867H303.133V143.219L353.086 107.539C357.023 104.727 359.363 100.18 359.363 95.3359C359.363 90.4883 357.023 85.9414 353.086 83.1289L302.531 47.0195C298.578 20.4492 275.613 0 247.965 0H55.168C24.7461 0 0 24.7461 0 55.1641V247.969C0 278.387 24.7461 303.133 55.168 303.133H178.871V264.031Z" fill="currentColor"/> <path d="M151.562 174.219C160.82 164.613 167.105 152.141 168.945 138.277H134.184C136.023 152.141 142.312 164.613 151.562 174.219Z" fill="currentColor"/> </g> </svg>';
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
        return 'Language Switcher';
    }

    static function className()
    {
        return 'de-lang-switcher';
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
        return ['design' => ['layout' => ['position' => 'horizontal', 'gap' => ['number' => 12, 'unit' => 'px', 'style' => '12px']], 'single_element' => ['paddings' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'bottom' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'left' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'right' => ['number' => 12, 'unit' => 'px', 'style' => '12px']]]], 'default_borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#fc7904'], 'bottom' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#fc7904'], 'left' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#fc7904'], 'right' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#fc7904']]], 'radius' => ['breakpoint_base' => ['all' => ['number' => 4, 'unit' => 'px', 'style' => '4px'], 'topLeft' => ['number' => 4, 'unit' => 'px', 'style' => '4px'], 'topRight' => ['number' => 4, 'unit' => 'px', 'style' => '4px'], 'bottomLeft' => ['number' => 4, 'unit' => 'px', 'style' => '4px'], 'bottomRight' => ['number' => 4, 'unit' => 'px', 'style' => '4px'], 'editMode' => 'all']]], 'current_background' => ['color' => ['breakpoint_base' => '#0b2035'], 'color_hover' => null], 'current_borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#0B2035FF'], 'bottom' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#0B2035FF'], 'left' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#0B2035FF'], 'right' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#0B2035FF']]]], 'default_background' => ['color_hover' => '#0b2035']], 'name' => ['default_typography' => ['color' => ['breakpoint_base' => '#0b2035'], 'color_hover' => null, 'typography' => ['custom' => ['customTypography' => ['advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['none']]]], 'fontSize' => ['breakpoint_base' => ['number' => 16, 'unit' => 'px', 'style' => '16px']], 'fontWeight' => ['breakpoint_base' => '700'], 'fontFamily' => ['breakpoint_base' => 'gfont-allerta']]]]], 'current_typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'color_hover' => null], 'gap' => ['number' => 8, 'unit' => 'px', 'style' => '8px']], 'flag' => ['height' => ['number' => 14, 'unit' => 'px', 'style' => '14px'], 'width' => ['number' => null, 'unit' => 'auto', 'style' => 'auto']], 'dropdown' => ['wraper' => ['layout' => ['horizontal' => ['vertical_at' => 'breakpoint_base'], 'gap' => ['breakpoint_base' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'background' => ['color' => 'var(--bde-brand-primary-color)']], 'links' => ['padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'bottom' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'left' => ['number' => 16, 'unit' => 'px', 'style' => '16px'], 'right' => ['number' => 16, 'unit' => 'px', 'style' => '16px']]]], 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'background' => ['color_hover' => '#83879670']]]], 'content' => ['content' => ['language_plugin' => null, 'show_flags' => true, 'show_name' => true, 'language_name' => 'native', 'name_version' => 'full', 'dropdown_display' => false, 'show_dropdown_in_editor' => true]]];
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
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'horizontal', 'text' => 'Horizontal'], ['value' => 'vertical', 'text' => 'Vertical']], 'buttonBarOptions' => ['size' => 'small', 'layout' => 'default']],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 50, 'step' => 1]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => [[['path' => 'content.content.dropdown_display', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "container",
        "Container",
        [c(
        "background",
        "Background",
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
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "single_element",
        "Single Element",
        [getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Paddings",
      "paddings",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Default Borders",
      "default_borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Current Borders",
      "current_borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\background",
      "Default Background",
      "default_background",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\background",
      "Current Background",
      "current_background",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "name",
        "Name",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Default Typography",
      "default_typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Current Typography",
      "current_typography",
       ['type' => 'popout']
     ), c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'top', 'text' => 'Top'], ['text' => ' Bottom', 'value' => 'bottom'], ['text' => 'Left', 'value' => 'left'], ['text' => 'Right', 'value' => 'right']]],
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
        "align",
        "Align",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'left', 'text' => 'Left', 'icon' => 'FlexAlignLeftIcon'], ['text' => 'Center', 'icon' => 'FlexAlignCenterHorizontalIcon', 'value' => 'center'], ['text' => 'Right', 'value' => 'right', 'icon' => 'FlexAlignRightIcon']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => [[['path' => 'content.content.show_name', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_margin_y",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "flag",
        "Flag",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
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
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'condition' => [[['path' => 'content.content.show_flags', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "dropdown",
        "Dropdown",
        [c(
        "button",
        "Button",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "new_control",
        "New Control",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
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
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "body",
        "Body",
        [getPresetSection(
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\fancy_background",
      "Background",
      "background",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), c(
        "offset",
        "Offset",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'left', 'text' => 'Left', 'icon' => 'AlignLeftIcon'], ['text' => 'Center', 'value' => 'center', 'icon' => 'AlignCenterIcon'], ['text' => 'Right', 'value' => 'right', 'icon' => 'AlignRightIcon']]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "links",
        "Links",
        [getPresetSection(
      "EssentialElements\\LessFancyBackground",
      "Background",
      "background",
       ['type' => 'popout']
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
     ), c(
        "offset",
        "Offset",
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
        ['type' => 'section', 'condition' => [[['path' => 'content.content.dropdown_display', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "content",
        "Content",
        [c(
        "language_plugin",
        "Language Plugin",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_translation_plugins', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "show_flags",
        "Show Flags",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.content.language_plugin', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "show_name",
        "Show Name",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.content.language_plugin', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "language_name",
        "Language Name",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'native', 'text' => 'Native'], ['text' => 'Translated', 'value' => 'translated'], ['text' => 'Code', 'value' => 'slug']], 'condition' => [[['path' => 'content.content.show_name', 'operand' => 'is set', 'value' => ''], ['path' => 'content.content.language_plugin', 'operand' => 'is set', 'value' => 'polylang']]]],
        false,
        false,
        [],
      ), c(
        "dropdown_display",
        "Dropdown Display",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.content.language_plugin', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "hide_current",
        "Hide Current",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.content.language_plugin', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "custom_flags",
        "Custom Flags",
        [c(
        "language",
        "Language",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_active_languages', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "flag_image",
        "Flag Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['image'], 'multiple' => false]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'condition' => [[['path' => 'content.content.language_plugin', 'operand' => 'is set', 'value' => ''], ['path' => 'content.content.show_flags', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "show_dropdown_in_editor",
        "Show Dropdown in Editor",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.content.dropdown_display', 'operand' => 'is set', 'value' => ''], ['path' => 'content.content.language_plugin', 'operand' => 'is set', 'value' => '']]]],
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
        return [['cssProperty' => 'margin-top', 'location' => 'outside-top', 'affectedPropertyPath' => 'design.spacing.margin_top'], ['affectedPropertyPath' => 'design.spacing.margin_bottom', 'cssProperty' => 'margin-bottom', 'location' => 'outside-bottom']];
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
        return 0;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'query', 'path' => 'content.content.lang[].new_control'], ['accepts' => 'image_url', 'path' => 'design.container.background.layers[].image'], ['accepts' => 'image_url', 'path' => 'design.single_element.current_background.layers[].image'], ['accepts' => 'image_url', 'path' => 'design.single_element.default_background.layers[].image'], ['accepts' => 'image_url', 'path' => 'design.dropdown.background.layers[].image'], ['accepts' => 'image_url', 'path' => 'design.dropdown.wraper.background.layers[].image']];
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
        return ['design.name.layout.horizontal.vertical_at', 'design.single_element.current_background.image', 'design.single_element.current_background.overlay.image', 'design.single_element.current_background.image_settings.unset_image_at', 'design.single_element.current_background.image_settings.size', 'design.single_element.current_background.image_settings.height', 'design.single_element.current_background.image_settings.repeat', 'design.single_element.current_background.image_settings.position', 'design.single_element.current_background.image_settings.left', 'design.single_element.current_background.image_settings.top', 'design.single_element.current_background.image_settings.attachment', 'design.single_element.current_background.image_settings.custom_position', 'design.single_element.current_background.image_settings.width', 'design.single_element.current_background.overlay.image_settings.custom_position', 'design.single_element.current_background.image_size', 'design.single_element.current_background.overlay.image_size', 'design.single_element.current_background.overlay.type', 'design.single_element.current_background.image_settings', 'design.single_element.default_background.image', 'design.single_element.default_background.overlay.image', 'design.single_element.default_background.image_settings.unset_image_at', 'design.single_element.default_background.image_settings.size', 'design.single_element.default_background.image_settings.height', 'design.single_element.default_background.image_settings.repeat', 'design.single_element.default_background.image_settings.position', 'design.single_element.default_background.image_settings.left', 'design.single_element.default_background.image_settings.top', 'design.single_element.default_background.image_settings.attachment', 'design.single_element.default_background.image_settings.custom_position', 'design.single_element.default_background.image_settings.width', 'design.single_element.default_background.overlay.image_settings.custom_position', 'design.single_element.default_background.image_size', 'design.single_element.default_background.overlay.image_size', 'design.single_element.default_background.overlay.type', 'design.single_element.default_background.image_settings', 'design.dropdown.links.background.image', 'design.dropdown.links.background.overlay.image', 'design.dropdown.links.background.image_settings.unset_image_at', 'design.dropdown.links.background.image_settings.size', 'design.dropdown.links.background.image_settings.height', 'design.dropdown.links.background.image_settings.repeat', 'design.dropdown.links.background.image_settings.position', 'design.dropdown.links.background.image_settings.left', 'design.dropdown.links.background.image_settings.top', 'design.dropdown.links.background.image_settings.attachment', 'design.dropdown.links.background.image_settings.custom_position', 'design.dropdown.links.background.image_settings.width', 'design.dropdown.links.background.overlay.image_settings.custom_position', 'design.dropdown.links.background.image_size', 'design.dropdown.links.background.overlay.image_size', 'design.dropdown.links.background.overlay.type', 'design.dropdown.links.background.image_settings', 'design.dropdown.wraper.background.image', 'design.dropdown.wraper.background.overlay.image', 'design.dropdown.wraper.background.image_settings.unset_image_at', 'design.dropdown.wraper.background.image_settings.size', 'design.dropdown.wraper.background.image_settings.height', 'design.dropdown.wraper.background.image_settings.repeat', 'design.dropdown.wraper.background.image_settings.position', 'design.dropdown.wraper.background.image_settings.left', 'design.dropdown.wraper.background.image_settings.top', 'design.dropdown.wraper.background.image_settings.attachment', 'design.dropdown.wraper.background.image_settings.custom_position', 'design.dropdown.wraper.background.image_settings.width', 'design.dropdown.wraper.background.overlay.image_settings.custom_position', 'design.dropdown.wraper.background.image_size', 'design.dropdown.wraper.background.overlay.image_size', 'design.dropdown.wraper.background.overlay.type', 'design.dropdown.wraper.background.design.layout.horizontal.vertical_at', 'design.dropdown.wraper.background.image_settings', 'design.dropdown.wraper.background.type', 'design.dropdown.wraper.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.content.show_flags', 'content.content.hide_current', 'content.content.force_link_to_home', 'content.content.display_name_as', 'design.flag.width', 'design.flag.height', 'design.flag.borders', 'content.content.dropdown_display', 'content.content.language_name', 'content.content.name_version', 'content.content.show_name', 'content.content.custom_flags', 'content.content.custom_flags[].flag_image', 'content.content.language_plugin', 'content.content.custom_flags[].language'];
    }
}
