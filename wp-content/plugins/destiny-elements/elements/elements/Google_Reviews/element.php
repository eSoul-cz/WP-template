<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\GoogleReviews",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class GoogleReviews extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>';
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
        return "content.options.google_link";
    }

    static function name()
    {
        return 'Google Reviews';
    }

    static function className()
    {
        return 'de-google-reviews';
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
        return ['content' => ['new_section' => ['new_control' => true], 'layout' => ['layout_type' => 'grid'], 'options' => ['custom_rating_title' => null, 'google_logo_type' => null, 'use_without_api' => true, 'custom_rating' => 4.7, 'google_logo' => 'small', 'google_link' => 'div', 'google_places_id' => 'ChIJCSOjHkkNZ0gRRKh0iBaE-Xk'], 'grid_review' => ['minimum_rating' => '5', 'max_reviews_to_show' => '3', 'disable_empty_reviews' => true]], 'design' => ['google_logo' => ['width' => ['number' => 55, 'unit' => 'px', 'style' => '55px'], 'height' => ['number' => 55, 'unit' => 'px', 'style' => '55px'], 'disable' => false, 'size' => ['number' => 20, 'unit' => 'px', 'style' => '20px', 'breakpoint_base' => ['number' => 52, 'unit' => 'px', 'style' => '52px']], 'position' => ['breakpoint_base' => 'left'], 'align' => 'flex-start', 'space' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'google_logo' => 'small', 'absolute_position' => ['right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'top' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'container' => ['spacing' => ['padding' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]], 'border' => ['border_radius' => ['all' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'topLeft' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'topRight' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'bottomLeft' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'bottomRight' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'editMode' => 'all']], 'baackground_color' => ['breakpoint_base' => null], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all']]]], 'stars' => ['size' => ['number' => 20, 'unit' => 'px', 'style' => '20px', 'breakpoint_base' => ['number' => 26, 'unit' => 'px', 'style' => '26px']], 'gap' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'active_color' => null, 'inactive_color' => null, 'spacing' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => null]], 'rating_title' => ['spacing' => ['margin' => ['breakpoint_base' => ['bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]]], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700']]]], 'text_align' => ['breakpoint_base' => 'left'], 'color' => ['breakpoint_base' => '#000000FF']], 'disable' => false], 'rating_number' => ['typography' => ['color' => ['breakpoint_base' => '#4E4E4EFF'], 'typography' => ['custom' => ['customTypography' => ['fontWeight' => ['breakpoint_base' => '700'], 'fontSize' => ['breakpoint_base' => ['number' => 16, 'unit' => 'px', 'style' => '16px']]]]]], 'disable' => true], 'effects' => ['on_hover' => 'move', 'transition_duration' => ['number' => 150, 'unit' => 'ms', 'style' => '150ms'], 'top' => ['number' => -2, 'unit' => 'px', 'style' => '-2px'], 'left' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'layout' => ['layout_type' => 'badge', 'columns' => ['breakpoint_base' => 'three', 'breakpoint_tablet_landscape' => 'three', 'breakpoint_tablet_portrait' => 'two', 'breakpoint_phone_landscape' => 'one', 'breakpoint_phone_portrait' => 'one'], 'gap' => ['breakpoint_base' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'testimonial_box' => ['baackground_color' => '#FFFFFFFF', 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all']]], 'author_photo' => ['size' => ['number' => 54, 'unit' => 'px', 'style' => '54px'], 'disable' => true]], 'review_text' => ['max_height' => ['number' => 110, 'unit' => 'px', 'style' => '110px'], 'spacing' => ['margin' => ['breakpoint_base' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]]], 'date_posted' => ['disable' => false, 'date_format' => 'first', 'custom_date_format' => null, 'typography' => ['color' => ['breakpoint_base' => '#888888FF'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 14, 'unit' => 'px', 'style' => '14px']]]]]]], 'author_name' => ['typography' => ['color' => null]], 'author_photo' => ['disable' => true]]];
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
        "layout_type",
        "Layout Type",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Badge', 'value' => 'badge'], '1' => ['text' => 'Grid', 'value' => 'grid']]],
        false,
        false,
        [],
      ), c(
        "columns",
        "Columns",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'rangeOptions' => ['min' => 1, 'max' => 6], 'items' => ['0' => ['value' => 'one', 'text' => '1'], '1' => ['text' => '2', 'value' => 'two'], '2' => ['value' => 'three', 'text' => '3'], '3' => ['text' => '4', 'value' => 'four'], '4' => ['text' => '5', 'value' => 'five']], 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'not equals', 'value' => 'badge']]]],
        true,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'not equals', 'value' => 'badge']]]],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "container",
        "Container",
        [c(
        "baackground_color",
        "Baackground Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
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
        "testimonial_box",
        "Testimonial Box",
        [c(
        "baackground_color",
        "Baackground Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "vertical_align_name_date",
        "Vertical Align Name & Date",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Top', 'icon' => 'FlexAlignTopIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterVerticalIcon'], '2' => ['text' => 'Bottom', 'value' => 'flex-end', 'icon' => 'FlexAlignBottomIcon']], 'condition' => ['0' => ['0' => ['path' => 'design.google_logo.position', 'operand' => 'equals', 'value' => 'top']]]],
        false,
        false,
        [],
      ), c(
        "photo_and_author_name_and_date_gap",
        "Photo and Author Name and Date Gap",
        [],
        ['type' => 'unit', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "google_logo",
        "Google Logo",
        [c(
        "google_logo",
        "Google Logo",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'small', 'text' => 'Small'], '1' => ['text' => 'Full', 'value' => 'full']]],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'left', 'text' => 'Left'], '1' => ['text' => 'Top', 'value' => 'top']], 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'badge']]]],
        true,
        false,
        [],
      ), c(
        "align",
        "Align",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'flex-start', 'text' => 'Left', 'icon' => 'FlexAlignLeftIcon'], '1' => ['text' => 'Center', 'value' => 'center', 'icon' => 'FlexAlignCenterHorizontalIcon'], '2' => ['text' => 'Right', 'value' => 'flex-end', 'icon' => 'FlexAlignRightIcon']], 'condition' => ['0' => ['0' => ['path' => 'design.google_logo.position', 'operand' => 'equals', 'value' => 'top']]]],
        true,
        false,
        [],
      ), c(
        "disable",
        "Disable",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 100]],
        true,
        false,
        [],
      ), c(
        "space",
        "Space",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'badge']]]],
        false,
        false,
        [],
      ), c(
        "absolute_position",
        "Absolute Position",
        [c(
        "top",
        "Top",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "right",
        "Right",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "bottom",
        "Bottom",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "left",
        "Left",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "author_photo",
        "Author Photo",
        [c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 200]],
        true,
        false,
        [],
      ), c(
        "disable",
        "Disable",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "author_name",
        "Author Name",
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
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "date_posted",
        "Date Posted",
        [c(
        "date_format",
        "Date Format",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'first', 'text' => 'April 1st, 2022 (F jS,Y)'], '1' => ['value' => 'second', 'text' => '2022-04-01 (Y-m-d)'], '2' => ['value' => 'third', 'text' => '04/01/2022 (m/d/y)'], '3' => ['value' => 'fourth', 'text' => '01/04/2022 (d/m/Y)'], '4' => ['text' => 'Custom', 'value' => 'custom']]],
        false,
        false,
        [],
      ), c(
        "custom_date_format",
        "Custom Date Format",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'design.date_posted.date_format', 'operand' => 'equals', 'value' => 'custom']]]],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "disable",
        "Disable",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "rating_title",
        "Rating Title",
        [getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "disable",
        "Disable",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'badge']]]],
        false,
        false,
        [],
      ), c(
        "rating_number",
        "Rating Number",
        [getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "disable",
        "Disable",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "stars",
        "Stars",
        [c(
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 10, 'max' => 50]],
        true,
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
      ), c(
        "inactive_color",
        "Inactive Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "spacing",
        "Spacing",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "review_text",
        "Review Text",
        [c(
        "max_height",
        "Max Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
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
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "effects",
        "Effects",
        [c(
        "on_hover",
        "On Hover",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'move', 'text' => 'Move']]],
        false,
        false,
        [],
      ), c(
        "left",
        "Left",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 10]],
        false,
        false,
        [],
      ), c(
        "top",
        "Top",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => -5, 'max' => 5]],
        false,
        false,
        [],
      ), c(
        "transition_duration",
        "Transition Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']], 'rangeOptions' => ['min' => 0, 'max' => 500]],
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
        "use_without_api",
        "Use Without API",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'badge']]]],
        false,
        false,
        [],
      ), c(
        "add_google_schema",
        "Add Google Schema",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "google_places_id",
        "Google Places ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.use_without_api', 'operand' => 'is not set', 'value' => '']], '1' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'grid']]]],
        false,
        false,
        [],
      ), c(
        "custom_rating_title",
        "Custom Rating Title",
        [],
        ['type' => 'text', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'badge']]]],
        false,
        false,
        [],
      ), c(
        "custom_rating",
        "Custom Rating",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 5, 'step' => 0.5], 'condition' => ['0' => ['0' => ['path' => 'content.options.use_without_api', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "reviews_count",
        "Reviews Count",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'badge']]]],
        false,
        false,
        [],
      ), c(
        "google_link",
        "Google Link",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'a', 'text' => 'Enable'], '1' => ['text' => 'Disable', 'value' => 'div']]],
        false,
        false,
        [],
      ), c(
        "google_reviews_link",
        "Google Reviews Link",
        [],
        ['type' => 'url', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.use_without_api', 'operand' => 'is set', 'value' => ''], '1' => ['path' => 'design.layout.layout_type', 'operand' => 'equals', 'value' => 'badge'], '2' => ['path' => 'content.options.google_link', 'operand' => 'equals', 'value' => 'a']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "grid_review",
        "Grid Review",
        [c(
        "minimum_rating",
        "Minimum Rating",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => '1', 'text' => '1 Star'], '1' => ['text' => '2 Stars', 'value' => '2'], '2' => ['text' => '3 Stars', 'value' => '3'], '3' => ['text' => '4 Stars', 'value' => '4'], '4' => ['text' => '5 Stars', 'value' => '5']]],
        false,
        false,
        [],
      ), c(
        "max_reviews_to_show",
        "Max Reviews to Show",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => '1', 'text' => '1'], '1' => ['text' => '2', 'value' => '2'], '2' => ['text' => '3', 'value' => '3'], '3' => ['text' => '4', 'value' => '4'], '4' => ['text' => '5', 'value' => '5']]],
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
        return false;
    }

    static function attributes()
    {
        return [['name' => 'href', 'template' => '{% if content.options.google_link == \'a\' %}
  {% if content.options.use_without_api %}
  	{{ content.options.google_reviews_link }}
  {% else %}
  	https://search.google.com/local/reviews?placeid={{ content.options.google_places_id }}
  {% endif %}
{% endif %}'], ['name' => 'target', 'template' => '{% if content.options.google_link == \'a\' %}
_blank
{% endif %}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 115;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'string', 'path' => 'content.options.custom_rating'], '1' => ['accepts' => 'string', 'path' => 'design.testimonial_box.photo_and_author_name_and_date_gap'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['accepts' => 'string', 'path' => 'content.options.google_places_id'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '6' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '7' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['design.testimonial_box.author_photo.size', 'design.layout.gap', 'design.layout.layout_type', 'design.layout.columns', 'design.container.baackground_color', 'design.testimonial_box.baackground_color', 'design.testimonial_box.photo_and_author_name_and_date_gap', 'design.google_logo.position', 'design.google_logo.align', 'design.google_logo.size', 'design.google_logo.absolute_position.top', 'design.google_logo.absolute_position.right', 'design.google_logo.absolute_position.bottom', 'design.google_logo.absolute_position.left', 'design.author_photo.size', 'design.author_name.spacing', 'design.stars.size', 'design.stars.active_color', 'design.stars.inactive_color', 'design.stars.spacing', 'design.review_text.max_height'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.options.custom_rating_title', 'content.options.google_logo', 'content.options.use_without_api', 'content.options.custom_rating', 'content.layout.layout_type', 'design.rating_number.disable', 'content.options.google_places_id', 'design.rating_title.disable', 'design.google_logo.disable', 'content.options.date_format', 'design.layout.layout_type', 'design.date_posted.disable', 'design.google_logo.google_logo', 'content.grid_review', 'design.date_posted.date_format', 'design.date_posted.custom_date_format', 'design.testimonial_box.author_photo.disable', 'design.author_photo.disable', 'content.options.google_link'];
    }
}
