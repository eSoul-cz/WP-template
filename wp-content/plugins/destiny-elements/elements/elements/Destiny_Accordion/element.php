<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\DestinyAccordion",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class DestinyAccordion extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>';
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
        return 'Destiny Accordion';
    }

    static function className()
    {
        return 'de-accordion';
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
        return ['content' => ['options' => ['first_item_open' => true, 'data_type' => 'bre', 'enable_faq_schema' => false, 'disable_accordion' => false, 'enable_number_count' => false, 'all_items_open' => false, 'disable_accordion_dynamic_meta' => null, 'heading_tag' => 'h3'], 'content' => ['items' => ['0' => ['heading' => 'Heading 1', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fringilla tincidunt sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam consectetur quam sed consequat.</p>'], '1' => ['heading' => 'Heading 2', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fringilla tincidunt sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam consectetur quam sed consequat.</p>'], '2' => ['heading' => 'Heading 3', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fringilla tincidunt sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam consectetur quam sed consequat.</p>'], '3' => ['heading' => 'Heading 4', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum fringilla tincidunt sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam consectetur quam sed consequat.</p>']], 'acf_repeater_field' => 'faq', 'acf_field_header' => 'heading', 'acf_field_content' => 'answer']], 'design' => ['trigger' => ['icon' => ['icon' => ['slug' => 'icon-chevron-up.', 'name' => 'chevron up', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg>'], 'size' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'disable_icon' => false, 'effect' => 'flip', 'color' => null, 'position' => 'right'], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 18, 'unit' => 'px', 'style' => '18px']]]]], 'color' => ['breakpoint_base' => '#FFFFFFFF']], 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]], 'margin' => ['breakpoint_base' => ['bottom' => null, 'top' => ['number' => 3, 'unit' => 'px', 'style' => '3px']]]], 'background_color' => null, 'borders' => ['radius' => ['breakpoint_base' => ['topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'custom', 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]], 'active_background_color' => null, 'active_borders' => ['radius' => ['breakpoint_base' => ['bottomRight' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'editMode' => 'custom', 'bottomLeft' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]], 'active_background_color_hover' => null, 'gap' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'number_count' => ['background_color' => null, 'spacing' => ['padding' => ['breakpoint_base' => ['left' => null]], 'margin' => ['breakpoint_base' => ['left' => null]]], 'background_color_hover' => null, 'active_background_color' => null, 'active_background_color_hover' => null, 'typography' => ['color' => null, 'color_hover' => null], 'active_typography' => null], 'background_color_hover' => null, 'active_typography' => ['color' => null]], 'container' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'max_width' => ['breakpoint_base' => ['number' => 800, 'unit' => 'px', 'style' => '800px']]], 'content' => ['effect' => ['effect_type' => 'ani', 'transition_duration' => ['number' => 300, 'unit' => 'ms', 'style' => '300ms'], 'max_height_open_' => ['breakpoint_base' => ['number' => 200, 'unit' => 'px', 'style' => '200px']]], 'max_height_open_' => ['number' => 200, 'unit' => 'px', 'style' => '200px'], 'typography' => ['color' => null, 'typography' => ['custom' => ['customTypography' => ['advanced' => ['textDirection' => ['breakpoint_base' => null]]]]], 'text_align' => ['breakpoint_base' => 'left']], 'spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'margin' => ['breakpoint_base' => ['top' => null, 'bottom' => null]]], 'borders' => ['border' => null, 'radius' => ['breakpoint_base' => ['bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'custom', 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px']]]], 'background_color' => '#FFFFFFFF']]];
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
        true,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "trigger",
        "Trigger",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Active Typography",
      "active_typography",
       ['type' => 'popout']
     ), c(
        "icon",
        "Icon",
        [c(
        "icon",
        "Icon",
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
        "active_color",
        "Active Color",
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
      ), c(
        "effect",
        "Effect",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'rotate', 'text' => 'Rotate'], '1' => ['text' => 'Flip', 'value' => 'flip']]],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'left', 'text' => 'Left', 'icon' => 'FlexAlignLeftIcon'], '1' => ['text' => 'Right', 'value' => 'right', 'icon' => 'FlexAlignRightIcon']]],
        false,
        false,
        [],
      ), c(
        "disable_icon",
        "Disable Icon",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "number_count",
        "Number Count",
        [c(
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
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\typography_with_effects_with_hoverable_color_and_effects",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_effects_with_hoverable_color_and_effects",
      "Active Typography",
      "active_typography",
       ['type' => 'popout']
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
        true,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Active Borders",
      "active_borders",
       ['type' => 'popout']
     ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
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
        [getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
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
        "effect",
        "Effect",
        [c(
        "effect_type",
        "Effect Type",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'ani', 'text' => 'Animate'], '1' => ['text' => 'Pop', 'value' => 'pop']]],
        false,
        false,
        [],
      ), c(
        "transition_duration",
        "Transition Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']], 'condition' => ['0' => ['0' => ['path' => 'design.content.effect.effect_type', 'operand' => 'equals', 'value' => 'ani']]], 'rangeOptions' => ['min' => 0, 'max' => 1200]],
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
      )];
    }

    static function contentControls()
    {
        return [c(
        "content",
        "Content",
        [c(
        "items",
        "Items",
        [c(
        "heading",
        "Heading",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
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
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{heading}', 'defaultTitle' => 'Heading', 'buttonName' => ''], 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'bre']]]],
        false,
        false,
        [],
      ), c(
        "acf_repeater_field",
        "ACF Repeater Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_field_header",
        "ACF Field Header",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_field_content",
        "ACF Field Content",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_group_id",
        "Meta Box Group ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_heading_id",
        "Meta Box Heading ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_content_id",
        "Meta Box Content ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "add_item",
        "Add Item",
        [],
        ['type' => 'add_registered_children', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'adv']]]],
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
        "disable_accordion",
        "Disable Accordion",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "close_on_click",
        "Close on Click",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.options.disable_accordion', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "enable_faq_schema",
        "Enable FAQ Schema",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "first_item_open",
        "First Item Open",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.options.all_items_open', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "enable_number_count",
        "Enable Number Count",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "data_type",
        "Data Type",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'bre', 'text' => 'Default'], '1' => ['text' => 'Advanced', 'value' => 'adv'], '2' => ['text' => 'ACF', 'value' => 'acf'], '3' => ['text' => 'Meta Box', 'value' => 'metabox']], 'buttonBarOptions' => ['size' => 'small', 'layout' => 'default']],
        false,
        false,
        [],
      ), c(
        "open_all_in_builder",
        "Open all in Builder",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "heading_tag",
        "Heading Tag",
        [],
        ['type' => 'text', 'layout' => 'inline'],
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
        return ['0' =>  ['title' => 'AccJS','scripts' => [DESTINY_ELEMENTS_PLUGIN_URL .'elements/dependencies-files/accordion.min.js'],],'1' =>  ['title' => 'FAQSchema','builderCondition' => 'return false;','inlineScripts' => ['const deAccordionFAQs = document.querySelectorAll(".de-accordion");

deAccordionFAQs.forEach(el => {
	if(el.getAttribute(\'data-faq\') == "false") return;
	const question = el.querySelectorAll(\'.de-accordion-trigger .trigger-text\');
	const answer = el.querySelectorAll(\'.de-accordion-panel\');

   question.forEach((q, i) => {
      deFaqData.push({\'question\' : q.innerHTML, \'answer\' : answer[i].innerHTML})
    });
});'],'frontendCondition' => '{% if content.options.enable_faq_schema %}
return true;
{% else %}
return false;
{% endif %}',],'2' =>  ['title' => 'HideNotice','inlineStyles' => ['%%SELECTOR%% .breakdance-empty-ssr-message {
 display: none !important; 
}'],'frontendCondition' => 'return false;',],'3' =>  ['title' => 'FAQOutPut','inlineScripts' => ['let deFaqScript = document.createElement(\'script\');
deFaqScript.classList.add(\'de-faq-script\');
deFaqScript.setAttribute(\'type\', \'application/ld+json\');

deFaqScript.innerHTML = `{"@context": "https://schema.org","@type": "FAQPage","mainEntity": [`;
deFaqData.forEach((data, index, array) => {
  deFaqScript.innerHTML += `{"@type" : "Question",`;
  deFaqScript.innerHTML += `"name" : "${data.question.replaceAll(\'"\', \'&quot;\')}",`;
  deFaqScript.innerHTML += `"acceptedAnswer" : {`;
  deFaqScript.innerHTML += `"@type" : "Answer",`;
  deFaqScript.innerHTML += `"text" : "${data.answer.replaceAll(\'"\', \'&quot;\')}"`;
  deFaqScript.innerHTML += `}`;
  deFaqScript.innerHTML += (index === array.length - 1) ? `}` : `},`;
  console.log(data);
});
deFaqScript.innerHTML += `]}`;

if (deFaqData) {
  document.head.append(deFaqScript)
}'],'builderCondition' => 'return false;','frontendCondition' => '{% if content.options.enable_faq_schema %}
	return true;
{% else %}
	return false;
{% endif %}',],'4' =>  ['title' => 'AccRun','inlineScripts' => ['const deAcc = deAccordion();'],'builderCondition' => 'false',],];
    }

    static function settings()
    {
        return ['proOnly' => false, 'dependsOnGlobalScripts' => false, 'shareStateWithChildSSR' => false, 'bypassPointerEvents' => false];
    }

    static function addPanelRules()
    {
        return ['alwaysHide' => false];
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => 'const deAccTrigger = document.querySelectorAll(\'%%SELECTOR%% .de-accordion-trigger\');
const deAccPanel = document.querySelectorAll("%%SELECTOR%% .de-accordion-panel");

{% if content.options.open_all_in_builder %}

 // required to get the panel height before it closes
deAccPanel.forEach(panel => {
  panel.classList.remove(\'hidden\');
  panel.style.height = "auto";
});

{% else %}

if(deAccTrigger[0]) {
 // required to get the panel height before it closes
deAccPanel.forEach(panel => {
  panel.classList.remove(\'hidden\');
  panel.style.height = "auto";
  panel.setAttribute(\'data-height\', panel.offsetHeight);
  panel.classList.add(\'hidden\');
  panel.style.height = panel.getAttribute(\'data-height\') + "px";
});

// add aria label to closed
deAccTrigger.forEach(trigger => {
  trigger.classList.remove(\'active\');
  trigger.setAttribute(\'aria-expanded\', false);
});

{% if content.options.first_item_open %}
   deAccTrigger[0].classList.add(\'active\');
   deAccTrigger[0].setAttribute(\'aria-expanded\', true);
   deAccPanel[0].style.height = Number(deAccPanel[0].getAttribute("data-height")) + "px";
   deAccPanel[0].classList.remove(\'hidden\');
{% else %}
  deAccPanel[0].style.height = "0px";
  deAccPanel[0].classList.add(\'hidden\');
  deAccTrigger[0].classList.remove(\'active\');
  deAccTrigger[0].setAttribute(\'aria-expanded\', false);
{% endif %}
}

const deAcc = deAccordion();
{% endif %}
','runForAllChildren' => true,
],],

'onMountedElement' => [['script' => 'const deAccTrigger = document.querySelectorAll(\'%%SELECTOR%% .de-accordion-trigger\');
const deAccPanel = document.querySelectorAll("%%SELECTOR%% .de-accordion-panel");

{% if content.options.open_all_in_builder %}

 // required to get the panel height before it closes
deAccPanel.forEach(panel => {
  panel.classList.remove(\'hidden\');
  panel.style.height = "auto";
});

{% else %}
	const deAcc = deAccordion();
{% endif %}
',
],],

'onCreatedElement' => [['script' => 'const deAccTrigger = document.querySelectorAll(\'%%SELECTOR%% .de-accordion-trigger\');
const deAccPanel = document.querySelectorAll("%%SELECTOR%% .de-accordion-panel");

{% if content.options.open_all_in_builder %}

 // required to get the panel height before it closes
deAccPanel.forEach(panel => {
  panel.classList.remove(\'hidden\');
  panel.style.height = "auto";
});

{% else %}


if(deAccTrigger[0]) {
 // required to get the panel height before it closes
deAccPanel.forEach(panel => {
  panel.classList.remove(\'hidden\');
  panel.style.height = "auto";
  panel.setAttribute(\'data-height\', panel.offsetHeight);
  panel.classList.add(\'hidden\');
  panel.style.height = panel.getAttribute(\'data-height\') + "px";
});

// add aria label to closed
deAccTrigger.forEach(trigger => {
  trigger.classList.remove(\'active\');
  trigger.setAttribute(\'aria-expanded\', false);
});

{% if content.options.first_item_open %}
   deAccTrigger[0].classList.add(\'active\');
   deAccTrigger[0].setAttribute(\'aria-expanded\', true);
   deAccPanel[0].style.height = Number(deAccPanel[0].getAttribute("data-height")) + "px";
   deAccPanel[0].classList.remove(\'hidden\');
{% else %}
  deAccPanel[0].style.height = "0px";
  deAccPanel[0].classList.add(\'hidden\');
  deAccTrigger[0].classList.remove(\'active\');
  deAccTrigger[0].setAttribute(\'aria-expanded\', false);
{% endif %}
}

{% endif %}
',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container-restricted",   ];
    }

    static function spacingBars()
    {
        return [];
    }

    static function attributes()
    {
        return [['name' => 'data-acc', 'template' => '{% if content.options.disable_accordion %}
false
{% else %}
true
{% endif %}'], ['name' => 'data-animate', 'template' => '{% if design.content.effect.effect_type == \'ani\' %}
smooth
{% else %}
pop
{% endif %}'], ['name' => 'data-open', 'template' => '{% if content.options.first_item_open %}
	true
{% else %}
    false
{% endif %}'], ['name' => 'data-tran', 'template' => '{{ design.content.effect.transition_duration.number }}'], ['name' => 'data-faq', 'template' => '{% if content.options.enable_faq_schema %}
true
{% else %}
false
{% endif %}'], ['name' => 'data-close-on-click', 'template' => '{% if content.options.close_on_click %}
true
{% else %}
false
{% endif %}']];
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
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
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
        return ['content.content.acf_field_header', 'content.content.acf_field_content', 'content.options.enable_number_count', 'content.options.data_type', 'content.content.acf_repeater_field', 'content.content.meta_box_group_id', 'content.content.meta_box_heading_id', 'content.content.meta_box_content_id', 'content.options.heading_tag'];
    }
}
