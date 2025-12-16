<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\ReadMore",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ReadMore extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152V512l-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427V224c0-17.7 14.3-32 32-32H62.3c63.6 0 125.6 19.6 177.7 56zm32 264V248c52.1-36.4 114.1-56 177.7-56H480c17.7 0 32 14.3 32 32V427c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"/></svg>';
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
        return 'Read More';
    }

    static function className()
    {
        return 'de-read-more';
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
        return ['content' => ['content' => ['open_button_name' => 'Read More', 'closed_button_name' => null, 'content' => '<p>Lorem ipsum dolor sit amet, <a target="_blank" href="https://destiny.ie/">consectetur</a> adipiscing elit. Mauris <a target="_blank" href="#">viverra augue euismod lorem</a> euismod sagittis. Pellentesque rutrum <strong>consectetur</strong> ex eu ornare. <em>Nullam lacinia</em> velit vitae facilisis faucibus. Suspendisse vitae nisi metus. Morbi posuere, enim sit amet imperdiet dictum, nulla ante blandit est, id scelerisque nisi diam vitae velit. Nam accumsan tortor vel aliquam vulputate. Duis sed rhoncus est. Nam augue justo, varius in arcu in, dignissim fringilla risus. Duis blandit elit ac diam bibendum aliquet. Aenean ullamcorper posuere maximus. Morbi auctor molestie nibh at scelerisque. Integer quis auctor nibh.</p><h2>This heading 2</h2><p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut dictum mi ut ex lobortis fringilla. Suspendisse laoreet lacus vitae <a target="_blank" href="https://destiny.ie/">pretium fringilla</a>. Nulla vitae erat ut elit ultricies tempus. Nullam semper blandit nisl, nec blandit lacus commodo id. Vivamus tempor mi sit amet lobortis vehicula. Fusce dignissim dolor quis magna tristique, nec eleifend lacus.</p>', 'close_button_name' => 'Read Less', 'custom_end_text' => '...'], 'options' => ['disable_close_button' => false, 'text_at_the_top_of_the_button' => false, 'disable_open_button' => false, 'button_above_text' => false, 'hide_content_by' => 'text', 'max_height' => null, 'max_character_length' => 40, 'wrap_content_in_p_p_' => false, 'max_word_count' => 35]], 'design' => ['button' => ['typography' => ['color' => ['breakpoint_base' => '#000000FF'], 'color_hover' => ['breakpoint_base' => '#FFFFFFFF'], 'typography' => ['custom' => ['customTypography' => ['fontWeight' => null]]]], 'background_color' => '#EFEFEF', 'background_color_hover' => '#808080', 'width' => null, 'border' => ['border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all']], 'spacing' => ['margin' => ['breakpoint_base' => ['top' => null]]]], 'content' => ['max_height' => ['number' => 110, 'unit' => 'px', 'style' => '110px'], 'effect' => ['transition_duration' => ['number' => 200, 'unit' => 'ms', 'style' => '200ms']]]]];
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
        "content",
        "Content",
        [c(
        "max_height",
        "Max Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => [[['path' => 'content.options.hide_content_by', 'operand' => 'equals', 'value' => 'height']]], 'unitOptions' => ['types' => ['px']]],
        false,
        false,
        [],
      ), c(
        "typography",
        "Typography",
        [getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
      "Default",
      "default",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects",
      "H1",
      "h1",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects",
      "H2",
      "h2",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects",
      "H3",
      "h3",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects",
      "H4",
      "h4",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects",
      "Paragraph",
      "paragraph",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects_with_hoverable_everything",
      "Link",
      "link",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects",
      "List",
      "list",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "spacing",
        "Spacing",
        [getPresetSection(
      "EssentialElements\\spacing_margin_y",
      "Wrapper",
      "wrapper",
       ['type' => 'popout']
     ), c(
        "h1",
        "H1",
        [c(
        "margin_block_start",
        "Margin Block Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "margin_block_end",
        "Margin Block End",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "h2",
        "H2",
        [c(
        "margin_block_start",
        "Margin Block Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "margin_block_end",
        "Margin Block End",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "h3",
        "H3",
        [c(
        "margin_block_start",
        "Margin Block Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "margin_block_end",
        "Margin Block End",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "h4",
        "H4",
        [c(
        "margin_block_start",
        "Margin Block Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "margin_block_end",
        "Margin Block End",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "paragraph",
        "Paragraph",
        [c(
        "margin_block_start",
        "Margin Block Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "margin_block_end",
        "Margin Block End",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "list",
        "List",
        [c(
        "margin_block_start",
        "Margin Block Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "margin_block_end",
        "Margin Block End",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "padding_inline_start",
        "Padding Inline Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 4, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "list_item_p",
        "List Item P",
        [c(
        "margin_block_start",
        "Margin Block Start",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
        false,
        false,
        [],
      ), c(
        "margin_block_end",
        "Margin Block End",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['px', 'em'], 'defaultType' => 'em'], 'rangeOptions' => ['min' => 0, 'max' => 2, 'step' => 0.05]],
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
        ['type' => 'section', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
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
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_background_color",
        "Active Background Color",
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
      ), c(
        "responsive_word_count",
        "Responsive Word Count",
        [c(
        "words",
        "Words",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => [[['path' => 'content.options.enable_responsive_word_count', 'operand' => 'is set', 'value' => '']]]],
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
        "open_button_name",
        "Open Button Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Read More'],
        false,
        false,
        [],
      ), c(
        "close_button_name",
        "Close Button Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'Read Less', 'condition' => [[['path' => 'content.options.disable_close_button', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "custom_end_text",
        "Custom End Text",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.hide_content_by', 'operand' => 'equals', 'value' => 'text']]]],
        false,
        false,
        [],
      ), c(
        "content",
        "Content",
        [],
        ['type' => 'richtext', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "options",
        "Options",
        [c(
        "hide_content_by",
        "Hide Content By",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'text', 'text' => 'Word Count'], ['text' => 'Text Lines', 'value' => 'lines'], ['text' => 'Height', 'value' => 'height']]],
        false,
        false,
        [],
      ), c(
        "textlinesme",
        "TextLinesMe",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.hide_content_by', 'operand' => 'equals', 'value' => 'lines']]], 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Minises the first paragraph with the &lt;p&gt;, and hides rest of the content.</p>']],
        false,
        false,
        [],
      ), c(
        "messageh",
        "MessageH",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Add height in Design Options</p>'], 'condition' => [[['path' => 'content.options.hide_content_by', 'operand' => 'equals', 'value' => 'height']]]],
        false,
        false,
        [],
      ), c(
        "max_lines_of_text",
        "Max Lines of Text",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 1, 'max' => 100], 'condition' => [[['path' => 'content.options.hide_content_by', 'operand' => 'equals', 'value' => 'lines']]]],
        false,
        false,
        [],
      ), c(
        "enable_responsive_word_count",
        "Enable Responsive Word Count",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "responsive_message",
        "Responsive Message",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'warning', 'content' => '<p>Change the word count in Design settings</p>'], 'condition' => [[['path' => 'content.options.enable_responsive_word_count', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "max_word_count",
        "Max Word Count",
        [],
        ['type' => 'number', 'layout' => 'inline', 'condition' => [[['path' => 'content.options.hide_content_by', 'operand' => 'is none of', 'value' => ['lines', 'height']], ['path' => 'content.options.enable_responsive_word_count', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "button_above_text",
        "Button Above Text",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "exclude_button_with_less_text",
        "Exclude Button with Less Text",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.options.hide_content_by', 'operand' => 'equals', 'value' => 'text']]]],
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
        return ['0' =>  ['title' => 'readmore','scripts' => ['%%BREAKDANCE_REUSABLE_DESTINY_PLUGIN_URL%%elements/dependencies-files/read-more.min.js'],],];
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

'onPropertyChange' => [['script' => 'deOriginalContent[%%ID%%] = {
    selector: \'%%SELECTOR%% .de-read-more-content\',
    contentInner: `{{ content.content.content }}`,
    words: {% if content.options.set_word_count_for_every_breakpoint_in_design %}
              {% if breakpoint == \'breakpoint_base\' %}
                  {{ design.amount_of_words_count.words.breakpoint_base }}
              {% elseif breakpoint == \'breakpoint_tablet_portrait\' %}
                  {{ design.amount_of_words_count.words.breakpoint_tablet_portrait }}
              {% elseif breakpoint == \'breakpoint_tablet_landscape\' %}
                  {{ design.amount_of_words_count.words.breakpoint_tablet_landscape }}
              {% elseif breakpoint == \'breakpoint_phone_landscape\' %}
                  {{ design.amount_of_words_count.words.breakpoint_phone_landscape }}
              {% elseif breakpoint == \'breakpoint_phone_portrait\' %}
                  {{ design.amount_of_words_count.words.breakpoint_phone_portrait }}
              {% else %}
                  5
              {% endif %}
          {% else %}
              {{ content.options.max_word_count }}
          {% endif %},
    endText: \'{{ content.content.custom_end_text }}\',
    dataType: \'{{ content.options.hide_content_by }}\',
    closeName: \'{{ content.content.close_button_name ? content.content.close_button_name : "Read Less" }}\',
    openName: \'{{ content.content.open_button_name ? content.content.open_button_name : "Read More" }}\'
  }

{% if content.options.hide_content_by == \'height\' %}
	document.querySelector(\'%%SELECTOR%% .de-read-more-content\').innerHTML = `{{ content.content.content }}`;
{% elseif content.options.hide_content_by == \'lines\' %}
	document.querySelector(\'%%SELECTOR%% .de-read-more-content\').innerHTML = `{{ content.content.content }}`;
{% else %}
	 document.querySelector(\'%%SELECTOR%% .de-read-more-content\').innerHTML = truncateContent(`{{ content.content.content }}`,  deOriginalContent[%%ID%%].words, \'{{ content.content.custom_end_text }}\', {disabled : \'{{ content.options.exclude_button_with_less_text }}\', selector : document.querySelector(\'%%SELECTOR%% .de-read-more-button\') });
{% endif %}
',
],],

'onMountedElement' => [['script' => ' deOriginalContent[%%ID%%] = {
    selector: \'%%SELECTOR%% .de-read-more-content\',
    contentInner: `{{ content.content.content }}`,
    words: {{ content.options.max_word_count }},
    endText: \'{{ content.content.custom_end_text }}\',
    dataType: \'{{ content.options.hide_content_by }}\',
    closeName: \'{{ content.content.close_button_name ? content.content.close_button_name : "Read Less" }}\',
    openName: \'{{ content.content.open_button_name ? content.content.open_button_name : "Read More" }}\'
  }

{% if content.options.hide_content_by == \'height\' %}

{% elseif content.options.hide_content_by == \'lines\' %}

{% else %}
	 document.querySelector(\'%%SELECTOR%% .de-read-more-content\').innerHTML = truncateContent(`{{ content.content.content }}`, {{ content.options.max_word_count }}, \'{{ content.content.custom_end_text }}\', {disabled : \'{{ content.options.exclude_button_with_less_text\' }}, selector : document.querySelector(\'%%SELECTOR%% .de-read-more-button\') });
{% endif %}
',
],],

'onBeforeDeletingElement' => [['script' => 'delete deOriginalContent[%%ID%%];',
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
        return [['name' => 'data-word-count', 'template' => '{% if content.options.hide_content_by == \'text\' %}
{{ content.options.max_word_count }}
{% endif %}'], ['name' => 'data-end-text', 'template' => '{{ content.content.custom_end_text }}'], ['name' => 'data-type', 'template' => '{% if content.options.hide_content_by == \'text\' %}
text
{% elseif content.options.hide_content_by == \'height\' %}
height
{% endif %}'], ['name' => 'exclude-button', 'template' => '{% if content.options.exclude_button_with_less_text %}
true
{% else %}
false
{% endif %}'], ['name' => 'data-breakpoints', 'template' => '{% if content.options.enable_responsive_word_count %}
1
{% else %}
0
{% endif %}'], ['name' => 'data-base', 'template' => '{{design.responsive_word_count.words.breakpoint_base}}'], ['name' => 'data-tablet-landscape', 'template' => '{{design.responsive_word_count.words.breakpoint_tablet_landscape}}'], ['name' => 'data-tablet-portrait', 'template' => '{{design.responsive_word_count.words.breakpoint_tablet_portrait}}'], ['name' => 'data-phone-landscape', 'template' => '{{ design.responsive_word_count.words.breakpoint_phone_landscape }}'], ['name' => 'data-phone-portrait', 'template' => '{{ design.responsive_word_count.words.breakpoint_phone_portrait }}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 130;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'string', 'path' => 'content.content.content'], ['accepts' => 'string', 'path' => 'content.content.open_button_name'], ['accepts' => 'string', 'path' => 'content.content.button_open.text'], ['accepts' => 'string', 'path' => 'content.content.button_open.link.url'], ['accepts' => 'string', 'path' => 'design.content.text'], ['accepts' => 'string', 'path' => 'design.content.link.url']];
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
        return ['design.button.custom.size.full_width_at', 'design.button.styles.size.full_width_at', 'design.button.styles'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
