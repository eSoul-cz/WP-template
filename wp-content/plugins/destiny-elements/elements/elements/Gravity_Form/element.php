<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\GravityForm",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class GravityForm extends \Breakdance\Elements\Element
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
        return 'Gravity Form';
    }

    static function className()
    {
        return 'de-gf';
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
        return ['content' => ['form_id' => ['gravity_form_id' => '1'], 'form_settings' => ['gravity_form_id' => 1, 'enable_title' => false, 'enable_description' => false, 'enable_ajax' => true, 'tab_index' => 1, 'gravity_form' => null]], 'design' => ['container' => ['margin' => ['top' => null], 'background_color' => '#FFFFFFFF', 'padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'border_radius' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all']], 'border_radius' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all'], 'width' => ['max_width' => ['number' => 600, 'unit' => 'px', 'style' => '600px']], 'spacing' => ['margin' => ['top' => null], 'padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'left' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'height' => null], 'form_header' => ['title' => null, 'description' => null, 'container' => null], 'progress_bar' => ['progress_title' => ['typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']]], 'background_color' => null, 'percentage_position' => 'flex-end', 'perecentage_typography' => null, 'progress_fill' => null, 'width' => null, 'margin' => ['top' => null], 'padding' => ['top' => null], 'spacing' => ['margin' => ['top' => null]], 'border' => ['top' => ['style' => 'solid', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'bottom' => ['style' => 'solid', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'left' => ['style' => 'solid', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'right' => ['style' => 'solid', 'width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'border' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bd-palette-second-colour-2)', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bd-palette-second-colour-2)', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bd-palette-second-colour-2)', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bd-palette-second-colour-2)', 'style' => 'solid']]]], 'steps' => ['progress_typography' => null], 'labels' => ['margin' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => null], 'typography' => null], 'inputs' => ['padding' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'border' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'border_hover' => '#FC7904', 'border_active' => 'var(--bd-palette-orange-2)', 'border_focus' => null, 'border' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px']]], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'disable_outline_' => false], 'background' => ['color' => '#FFFFFFFF', 'color_hover' => null], 'typography' => null, 'spacing' => ['padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'dropdown_icon' => ['icon' => ['slug' => 'icon-angle-down.', 'name' => 'icon-angle-down.', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"/></svg>', 'iconSetSlug' => 'FontAwesome 5 Free - Solid'], 'size' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'buttons' => ['submit_button' => ['style' => 'custom', 'custom' => ['background' => '#511EC3FF'], 'color' => 'var(--bde-brand-primary-color)', 'color_hover' => null, 'width' => ['number' => null, 'unit' => '%', 'style' => null], 'spacing' => ['padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'left' => ['number' => 30, 'unit' => 'px', 'style' => '30px']]], 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700']]]]], 'border' => ['border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']]], 'next_button' => ['typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'color' => 'var(--bde-brand-primary-color)', 'color_hover' => null, 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'padding' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'color' => null], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']], 'border_hover' => null, 'spacing' => ['padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'left' => ['number' => 30, 'unit' => 'px', 'style' => '30px']]]], 'previous_button' => ['color' => 'var(--bde-brand-primary-color)', 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']], 'color_hover' => null, 'padding' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'left' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'typography' => ['color' => ['breakpoint_base' => '#FEFEFFFF']], 'spacing' => ['padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px']]]]], 'checkboxes' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 16, 'unit' => 'px', 'style' => '16px']]]]]], 'display' => 'row', 'gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'margin' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'cehckbox_size' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'checked_colour' => 'var(--bde-brand-primary-color)', 'checkbox_size' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'radios' => ['gap' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 16, 'unit' => 'px', 'style' => '16px']]]]]], 'cehckbox_size' => ['number' => 18, 'unit' => 'px', 'style' => '18px'], 'radio_button_size' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'margin' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'display' => 'row', 'checked_colour' => 'var(--bde-brand-primary-color)'], 'consent' => ['typography' => ['color' => null], 'margin' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => null], 'background_color' => null, 'checkbox_size' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'padding' => ['top' => null, 'left' => null], 'gap' => ['breakpoint_base' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'sub_labels' => ['typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 16, 'unit' => 'px', 'style' => '16px']]]]]]], 'files' => ['button' => ['color' => 'var(--bde-brand-primary-color)', 'color_hover' => null, 'typography' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'border' => ['border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none']]], 'spacing' => ['padding' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px']]]], 'preview_file' => ['icon_color' => null, 'typography' => null], 'background_color' => '#EBEBEBFF', 'typography' => ['color' => null], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['style' => 'none', 'width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['style' => 'none', 'width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['style' => 'none', 'width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['style' => 'none', 'width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]], 'spacing' => ['padding' => ['padding' => ['breakpoint_base' => ['top' => null, 'bottom' => null]]]]]]];
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
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "height",
        "Height",
        [c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "min_height",
        "Min Height",
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
        [c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
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
        "form_header",
        "Form Header",
        [c(
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
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
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
      ), c(
        "title",
        "Title",
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
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "description",
        "Description",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['path' => 'content.form_settings.enable_title', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      ), c(
        "progress_bar",
        "Progress Bar",
        [c(
        "progress_title",
        "Progress Title",
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
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "progress_fill",
        "Progress Fill",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "percentage_position",
        "Percentage Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Left', 'icon' => 'AlignLeftIcon'], '1' => ['icon' => 'AlignCenterIcon', 'text' => 'Center', 'value' => 'center'], '2' => ['icon' => 'AlignRightIcon', 'text' => 'Right', 'value' => 'flex-end']]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Perecentage Typography",
      "perecentage_typography",
       ['type' => 'popout']
     ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "spacing",
        "Spacing",
        [c(
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
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
        "labels",
        "Labels",
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
      ), c(
        "sub_labels",
        "Sub Labels",
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
      ), c(
        "inputs",
        "Inputs",
        [c(
        "background",
        "Background",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_color",
        "Active Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
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
      ), c(
        "border_outline_warning",
        "Border Outline Warning",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'warning', 'content' => '<p>You should not disable the outline without proper fallbacks</p>']],
        false,
        false,
        [],
      ), c(
        "disable_outline_",
        "Disable Outline (!!!)",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border_focus",
        "Border Focus",
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
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "dropdown_icon",
        "Dropdown Icon",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
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
      ), c(
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
        "color",
        "Color",
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "next_button",
        "Next Button",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "color",
        "Color",
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "previous_button",
        "Previous Button",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "color",
        "Color",
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
        "checkboxes",
        "Checkboxes",
        [c(
        "checked_colour",
        "Checked Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
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
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "checkbox_size",
        "Checkbox Size",
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
        "radios",
        "Radios",
        [c(
        "checked_colour",
        "Checked Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
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
        "margin",
        "Margin",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "radio_button_size",
        "Radio Button Size",
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
        "consent",
        "Consent",
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
      ), c(
        "checkbox_size",
        "Checkbox Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
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
      ), c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
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
        "files",
        "Files",
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
     ), c(
        "spacing",
        "Spacing",
        [getPresetSection(
      "EssentialElements\\spacing_margin_all",
      "Margin",
      "margin",
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
        "button",
        "Button",
        [getPresetSection(
      "EssentialElements\\typography_with_hoverable_color",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "color",
        "Color",
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "preview_file",
        "Preview File",
        [c(
        "alert",
        "Alert",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Suitable only for multiple file field</p>']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "icon_color",
        "Icon Color",
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
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "effects",
        "Effects",
        [c(
        "transition_duration",
        "Transition Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']], 'rangeOptions' => ['min' => 0, 'max' => 1000]],
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
        "form_settings",
        "Form Settings",
        [c(
        "gravity_form_id",
        "Gravity Form ID",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'placeholder' => 'Choose Gravity Forms', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'gf_get_menus', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "gravity_form",
        "Gravity Form",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_gravity_forms', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "enable_title",
        "Enable Title",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "enable_description",
        "Enable Description",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "enable_ajax",
        "Enable Ajax",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "tab_index",
        "Tab Index",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
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
        return ['0' =>  ['styles' => ['/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-theme-reset.min.css?ver=2.7.15.1','/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-theme-foundation.min.css?ver=2.7.15.1','/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-theme-framework.min.css?ver=2.7.15.1','/wp-content/plugins/gravityforms/assets/css/dist/gravity-forms-orbital-theme.min.css?ver=2.7.15.1'],'frontendCondition' => 'return false;',],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => false, 'shareStateWithChildSSR' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => 'let de_head = document.getElementsByTagName(\'HEAD\')[0];
let de_link = document.createElement(\'link\');
de_link.rel = \'stylesheet\';
de_link.type = \'text/css\';
de_link.href = "/wp-content/plugins/gravityforms/assets/css/dist/theme.min.css";
de_head.appendChild(de_link);

document.querySelectorAll(\'.breakdance--active-element .gravity-theme\').forEach(el => {
  el.style.display = "block";
});',
],],

'onCreatedElement' => [['script' => 'let de_head = document.getElementsByTagName(\'HEAD\')[0];
let de_link = document.createElement(\'link\');
de_link.rel = \'stylesheet\';
de_link.type = \'text/css\';
de_link.href = "/wp-content/plugins/gravityforms/assets/css/dist/theme.min.css";
de_head.appendChild(de_link);',
],],

'onActivatedElement' => [['script' => 'let de_head = document.getElementsByTagName(\'HEAD\')[0];
let de_link = document.createElement(\'link\');
de_link.rel = \'stylesheet\';
de_link.type = \'text/css\';
de_link.href = "/wp-content/plugins/gravityforms/assets/css/dist/theme.min.css";
de_head.appendChild(de_link);

document.querySelectorAll(\'.breakdance--active-element .gravity-theme\').forEach(el => {
  el.style.display = "block";
});',
],],

'onMovedElement' => [['script' => 'let de_head = document.getElementsByTagName(\'HEAD\')[0];
let de_link = document.createElement(\'link\');
de_link.rel = \'stylesheet\';
de_link.type = \'text/css\';
de_link.href = "/wp-content/plugins/gravityforms/assets/css/dist/theme.min.css";
de_head.appendChild(de_link);',
],],

'onMountedElement' => [['script' => 'document.querySelectorAll(\'.breakdance--active-element .gravity-theme\').forEach(el => {
  el.style.display = "block";
});',
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
        return 1400;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'image_url', 'path' => 'content.form_id.background.layers[].image'], '1' => ['accepts' => 'string', 'path' => 'design.download.content.text'], '2' => ['accepts' => 'string', 'path' => 'design.download.content.link.url'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.buttons.submit_button.button.custom.size.full_width_at', 'design.buttons.submit_button.button.styles', 'design.buttons.submit_button.custom.size.full_width_at', 'design.buttons.submit_button.styles', 'design.download.button.custom.size.full_width_at', 'design.download.button.styles', 'design.download.styles.styles.size.full_width_at', 'design.download.styles.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.form_settings.enable_title', 'content.form_settings.enable_description', 'content.form_settings.tab_index', 'content.form_settings.gravity_form_id', 'content.form_settings.gravity_form', 'content.form_settings.enable_ajax'];
    }
}
