<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\ReadingTime",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ReadingTime extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M232 120C232 106.7 242.7 96 256 96C269.3 96 280 106.7 280 120V243.2L365.3 300C376.3 307.4 379.3 322.3 371.1 333.3C364.6 344.3 349.7 347.3 338.7 339.1L242.7 275.1C236 271.5 232 264 232 255.1L232 120zM256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0zM48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48C141.1 48 48 141.1 48 256z"/></svg>';
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
        return 'Reading Time';
    }

    static function className()
    {
        return 'de-reading-time';
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
        return ['content' => ['main_options' => ['tag' => 'p', 'text_before_minutes' => 'Reading Time: ', 'text_after_minutes' => 'mins', 'words_per_minute' => 250]], 'design' => ['typography' => null, 'container' => ['baackground_color' => null, 'padding' => ['top' => null, 'left' => null], 'margin' => ['left' => null]]]];
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
        "baackground_color",
        "Baackground Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
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
      "EssentialElements\\typography",
      "Text",
      "text",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Minutes",
      "minutes",
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
        "main_options",
        "Main Options",
        [c(
        "data_type",
        "Data Type",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'custom', 'text' => 'Custom Content'], '1' => ['text' => 'Post Content', 'value' => 'post']]],
        false,
        false,
        [],
      ), c(
        "text_before_minutes",
        "Text Before Minutes",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "text_after_minutes",
        "Text After Minutes",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "tag",
        "Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'p', 'text' => 'p'], '1' => ['text' => 'h2', 'value' => 'h2'], '2' => ['text' => 'h3', 'value' => 'h3'], '3' => ['text' => 'h4', 'value' => 'h4'], '4' => ['text' => 'h5', 'value' => 'h5'], '5' => ['text' => 'span', 'value' => 'span'], '6' => ['text' => 'div', 'value' => 'div']]],
        false,
        false,
        [],
      ), c(
        "words_per_minute",
        "Words Per Minute",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "info",
        "Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Add ".de-reading-time-content" class inside advanced options to your content</p>'], 'condition' => ['0' => ['0' => ['path' => 'content.main_options.data_type', 'operand' => 'not equals', 'value' => 'post']]]],
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
        return ['0' =>  ['inlineScripts' => ['let deReadingContent = document.querySelector(".de-reading-time-content");

if (deReadingContent) {
  deReadingContent = deReadingContent.innerText;
  const deWordsPerMinute = "{{ content.main_options.words_per_minute }}";
  let deResult;
  let deTextLength = deReadingContent.split(" ").length;

  if(deTextLength > 0){
      let value = Math.ceil(Number(deTextLength) / Number(deWordsPerMinute));
      deResult = value;
    }

  document.querySelector(".de-reading-minutes").innerText = deResult;
}'],'title' => 'Main Script','builderCondition' => '{% if content.main_options.data_type == \'post\' %}
  return false;
{% else %}
  return true;
{% endif %}','frontendCondition' => '{% if content.main_options.data_type == \'post\' %}
  return false;
{% else %}
  return true;
{% endif %}',],];
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

'onPropertyChange' => [['script' => 'let deReadingContent = document.querySelector(".de-reading-time-content");

if (deReadingContent) {
  deReadingContent = deReadingContent.innerText;
  const deWordsPerMinute = "{{ content.main_options.words_per_minute }}";
  let deResult;
  let deTextLength = deReadingContent.split(" ").length;

  if(deTextLength > 0){
      let value = Math.ceil(Number(deTextLength) / Number(deWordsPerMinute));
      deResult = value;
    }

  document.querySelector(".de-reading-minutes").innerText = deResult;
}',
],],

'onCreatedElement' => [['script' => 'let deReadingContent = document.querySelector(".de-reading-time-content");

if (deReadingContent) {
  deReadingContent = deReadingContent.innerText;
  const deWordsPerMinute = "{{ content.main_options.words_per_minute }}";
  let deResult;
  let deTextLength = deReadingContent.split(" ").length;

  if(deTextLength > 0){
      let value = Math.ceil(Number(deTextLength) / Number(deWordsPerMinute));
      deResult = value;
    }

  document.querySelector(".de-reading-minutes").innerText = deResult;
}',
],],

'onMountedElement' => [['script' => 'let deReadingContent = document.querySelector(".de-reading-time-content");

if (deReadingContent) {
  deReadingContent = deReadingContent.innerText;
  const deWordsPerMinute = "{{ content.main_options.words_per_minute }}";
  let deResult;
  let deTextLength = deReadingContent.split(" ").length;

  if(deTextLength > 0){
      let value = Math.ceil(Number(deTextLength) / Number(deWordsPerMinute));
      deResult = value;
    }

  document.querySelector(".de-reading-minutes").innerText = deResult;
}',
],],

'onActivatedElement' => [['script' => 'let deReadingContent = document.querySelector(".de-reading-time-content");

if (deReadingContent) {
  deReadingContent = deReadingContent.innerText;
  const deWordsPerMinute = "{{ content.main_options.words_per_minute }}";
  let deResult;
  let deTextLength = deReadingContent.split(" ").length;

  if(deTextLength > 0){
      let value = Math.ceil(Number(deTextLength) / Number(deWordsPerMinute));
      deResult = value;
    }

  document.querySelector(".de-reading-minutes").innerText = deResult;
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
        return 350;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
