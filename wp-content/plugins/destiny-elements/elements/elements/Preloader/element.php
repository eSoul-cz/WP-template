<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\Preloader",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class Preloader extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"> <path d="M33.4999 14.9714C37.6343 14.9714 40.9859 11.6199 40.9859 7.48569C40.9859 3.35146 37.6343 0 33.4999 0C29.3655 0 26.0139 3.35146 26.0139 7.48569C26.0139 11.6199 29.3655 14.9714 33.4999 14.9714Z" fill="currentColor"/> <path d="M33.4999 64C35.9803 64 37.991 61.9893 37.991 59.5091C37.991 57.0288 35.9803 55.0181 33.4999 55.0181C31.0195 55.0181 29.0088 57.0288 29.0088 59.5091C29.0088 61.9893 31.0195 64 33.4999 64Z" fill="currentColor"/> <path d="M15.1055 21.8401C18.8268 21.8401 21.8434 18.8236 21.8434 15.1025C21.8434 11.3815 18.8268 8.36493 15.1055 8.36493C11.3843 8.36493 8.36768 11.3815 8.36768 15.1025C8.36768 18.8236 11.3843 21.8401 15.1055 21.8401Z" fill="currentColor"/> <path d="M51.8942 55.6302C53.9614 55.6302 55.6372 53.9545 55.6372 51.8874C55.6372 49.8202 53.9614 48.1445 51.8942 48.1445C49.827 48.1445 48.1512 49.8202 48.1512 51.8874C48.1512 53.9545 49.827 55.6302 51.8942 55.6302Z" fill="currentColor"/> <path d="M7.48598 39.4857C10.7927 39.4857 13.4733 36.8052 13.4733 33.4986C13.4733 30.192 10.7927 27.5115 7.48598 27.5115C4.17927 27.5115 1.49866 30.192 1.49866 33.4986C1.49866 36.8052 4.17927 39.4857 7.48598 39.4857Z" fill="currentColor"/> <path d="M59.5113 36.4885C61.164 36.4885 62.5038 35.1488 62.5038 33.4962C62.5038 31.8435 61.164 30.5038 59.5113 30.5038C57.8586 30.5038 56.5189 31.8435 56.5189 33.4962C56.5189 35.1488 57.8586 36.4885 59.5113 36.4885Z" fill="currentColor"/> <path d="M11.4014 48.1882C9.35382 50.2357 9.35382 53.5487 11.4014 55.5962C13.4466 57.6437 16.7645 57.6437 18.8097 55.5962C20.8573 53.5487 20.8573 50.2357 18.8097 48.1882C16.7645 46.1383 13.449 46.1189 11.4014 48.1882Z" fill="currentColor"/> <path d="M51.8917 17.3468C53.1312 17.3468 54.1361 16.342 54.1361 15.1025C54.1361 13.8631 53.1312 12.8583 51.8917 12.8583C50.6522 12.8583 49.6474 13.8631 49.6474 15.1025C49.6474 16.342 50.6522 17.3468 51.8917 17.3468Z" fill="currentColor"/> </svg>';
    }

    static function tag()
    {
        return 'div';
    }

    static function tagOptions()
    {
        return ['aside'];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Preloader';
    }

    static function className()
    {
        return 'de-preloader';
    }

    static function category()
    {
        return 'destiny_exs';
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
        return ['content' => ['element' => ['preloader_source' => 'default', 'preloader_type' => 'svg', 'select_svg_preloader' => '<?xml version="1.0" encoding="utf-8"?>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block; shape-rendering: auto;" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<g transform="rotate(0 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(30 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(60 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(90 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(120 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(150 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(180 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(210 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(240 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(270 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(300 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
  </rect>
</g><g transform="rotate(330 50 50)">
  <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="currentColor">
    <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
  </rect>
</g>
<!-- [ldio] generated by https://loading.io/ --></svg>', 'delay' => ['number' => 2000, 'unit' => 'ms', 'style' => '2000ms'], 'fade_out_time' => ['number' => 800, 'unit' => 'ms', 'style' => '800ms'], 'select_preloader' => '<?xml version="1.0" encoding="utf-8"?>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: transparent; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<g transform="translate(80,50)">
<g transform="rotate(0)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="1">
  <animateTransform attributeName="transform" type="scale" begin="-0.875s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.875s"></animate>
</circle>
</g>
</g><g transform="translate(71.21320343559643,71.21320343559643)">
<g transform="rotate(45)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="0.875">
  <animateTransform attributeName="transform" type="scale" begin="-0.75s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.75s"></animate>
</circle>
</g>
</g><g transform="translate(50,80)">
<g transform="rotate(90)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="0.75">
  <animateTransform attributeName="transform" type="scale" begin="-0.625s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.625s"></animate>
</circle>
</g>
</g><g transform="translate(28.786796564403577,71.21320343559643)">
<g transform="rotate(135)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="0.625">
  <animateTransform attributeName="transform" type="scale" begin="-0.5s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.5s"></animate>
</circle>
</g>
</g><g transform="translate(20,50.00000000000001)">
<g transform="rotate(180)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="0.5">
  <animateTransform attributeName="transform" type="scale" begin="-0.375s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.375s"></animate>
</circle>
</g>
</g><g transform="translate(28.78679656440357,28.786796564403577)">
<g transform="rotate(225)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="0.375">
  <animateTransform attributeName="transform" type="scale" begin="-0.25s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.25s"></animate>
</circle>
</g>
</g><g transform="translate(49.99999999999999,20)">
<g transform="rotate(270)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="0.25">
  <animateTransform attributeName="transform" type="scale" begin="-0.125s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="-0.125s"></animate>
</circle>
</g>
</g><g transform="translate(71.21320343559643,28.78679656440357)">
<g transform="rotate(315)">
<circle cx="0" cy="0" r="6" fill="currentColor" fill-opacity="0.125">
  <animateTransform attributeName="transform" type="scale" begin="0s" values="1.5 1.5;1 1" keyTimes="0;1" dur="1s" repeatCount="indefinite"></animateTransform>
  <animate attributeName="fill-opacity" keyTimes="0;1" dur="1s" repeatCount="indefinite" values="1;0" begin="0s"></animate>
</circle>
</g>
</g>
<!-- [ldio] generated by https://loading.io/ --></svg>']], 'design' => ['layout' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']]], 'background' => ['layout' => ['vertical_align' => ['breakpoint_base' => 'center'], 'align' => ['breakpoint_base' => 'center']]], 'overlay' => ['layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center']], 'background' => ['color' => ['breakpoint_base' => '#FFFFFFFF']]], 'preloader' => ['color' => 'var(--bde-brand-primary-color)', 'size' => ['breakpoint_base' => ['number' => 136, 'unit' => 'px', 'style' => '136px']]]]];
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
        "overlay",
        "Overlay",
        [getPresetSection(
      "EssentialElements\\background",
      "Background",
      "background",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "preloader",
        "Preloader",
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
        true,
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
        "element",
        "Element",
        [c(
        "new_control",
        "New Control",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p><a target="_blank" href="https://destiny.ie/documentation/preloader/">See Element Documentation</a></p>']],
        false,
        false,
        [],
      ), c(
        "preloader_source",
        "Preloader Source",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['text' => 'Default', 'value' => 'default'], ['value' => 'advanced', 'text' => 'Advanced']]],
        false,
        false,
        [],
      ), c(
        "advanced_info",
        "Advanced Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>You can place any other element such as an Image, Code Block, etc. within the preloader element.</p>'], 'condition' => [[['path' => 'content.element.preloader_source', 'operand' => 'equals', 'value' => 'advanced']]]],
        false,
        false,
        [],
      ), c(
        "select_preloader",
        "Select Preloader",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_svg_preloaders', 'fetchContextPath' => 'content.element.select_preloader', 'refetchPaths' => []]], 'condition' => [[['path' => 'content.element.preloader_source', 'operand' => 'equals', 'value' => 'default']]]],
        false,
        false,
        [],
      ), c(
        "delay",
        "Delay",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['ms'], 'defaultType' => 'ms'], 'rangeOptions' => ['min' => 0, 'step' => 1]],
        false,
        false,
        [],
      ), c(
        "fade_out_time",
        "Fade Out Time",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['ms'], 'defaultType' => 'ms'], 'rangeOptions' => ['min' => 0, 'step' => 1]],
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
        return ['0' =>  ['title' => 'Remove preloader','inlineScripts' => ['window.addEventListener(\'load\', function() {
    let afterLoadDelay = \'{{ content.element.delay.style }}\';
    let fadeOutTime = parseInt(\'{{ content.element.fade_out_time.style }}\'.replace(\'ms\', \'\')) || 0;
    const preloader = document.querySelector(\'%%SELECTOR%%\');
    let opacity = 1;

    function startFadeOutEffect() {
        const fadeOutEffectInterval = setInterval(() => {
            if (opacity > 0) { // continue to fade out
                opacity -= 0.1;
                preloader.style.opacity = opacity;
            } else if (opacity <= 0) {
                preloader.style.display = \'none\'; 
                clearInterval(fadeOutEffectInterval);
            }
        }, fadeOutTime / 10);
    }
  
    if (preloader !== null) {
        if (afterLoadDelay) {
            afterLoadDelay = parseInt(afterLoadDelay.replace(\'ms\', \'\'));
            setTimeout(startFadeOutEffect, afterLoadDelay);
        } else {
            startFadeOutEffect();
        }
    } else {
        console.warn(\'Element with selector %%SELECTOR%% not found.\');
    }
});'],],];
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
        return ["type" => "container-excluding-self",   "notAllowedWhenNodeTypeIsPresentInTree" => ['DestinyElements\Preloader'],];
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
        return 720;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'image_url', 'path' => 'design.overlay.background.layers[].image']];
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
        return ['design.layout.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
