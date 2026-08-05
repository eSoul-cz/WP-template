<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\OffCanvas",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class OffCanvas extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M512 160c0 35.3-28.7 64-64 64H280v64h46.1c21.4 0 32.1 25.9 17 41L273 399c-9.4 9.4-24.6 9.4-33.9 0L169 329c-15.1-15.1-4.4-41 17-41H232V224H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64v64zM448 416V352H365.3l.4-.4c18.4-18.4 20.4-43.7 11-63.6l71.3 0c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64L64 480c-35.3 0-64-28.7-64-64V352c0-35.3 28.7-64 64-64l71.3 0c-9.4 19.9-7.4 45.2 11 63.6l.4 .4H64v64H210.7l5.7 5.7c21.9 21.9 57.3 21.9 79.2 0l5.7-5.7H448z"/></svg>';
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
        return 'Off Canvas';
    }

    static function className()
    {
        return 'de-off-canvas';
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
        return ['design' => ['effects' => ['open_direction' => 'left', 'duration_ms_' => 300], 'container' => ['width' => ['breakpoint_base' => ['number' => 300, 'unit' => 'px', 'style' => '300px']], 'height' => ['number' => 300, 'unit' => 'px', 'style' => '300px'], 'borders' => ['shadow' => ['breakpoint_base' => ['shadows' => ['0' => ['color' => '#00000025', 'x' => '5', 'y' => '20', 'blur' => '75', 'spread' => '0', 'position' => 'outset']], 'style' => '5px 20px 75px 0px #00000025']]]], 'layout' => ['align' => ['breakpoint_base' => 'center'], 'vertical_align' => ['breakpoint_base' => 'center'], 'horizontal' => ['vertical_align' => null, 'align' => null, 'vertical_at' => 'breakpoint_base'], 'gap' => ['breakpoint_base' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]], 'background' => ['color' => '#FFFFFFFF', 'color_hover' => null]], 'content' => ['options' => ['disable_close_on_escape_key' => false, 'move_body' => false, 'open_inside_builder' => true]]];
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
        return [getPresetSection(
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\LessFancyBackground",
      "Background",
      "background",
       ['type' => 'popout']
     ), c(
        "container",
        "Container",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'design.effects.open_direction', 'operand' => 'is one of', 'value' => ['0' => 'right', '1' => 'left']]],
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'condition' => ['path' => 'design.effects.open_direction', 'operand' => 'is one of', 'value' => ['0' => 'up', '1' => 'down']]],
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
        "effects",
        "Effects",
        [c(
        "duration_ms_",
        "Duration(ms)",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "open_direction",
        "Open Direction",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'left', 'text' => 'Left', 'icon' => 'ArrowLeftIcon'], '1' => ['text' => 'Right', 'value' => 'right', 'icon' => 'ArrowRightIcon'], '2' => ['text' => 'Up', 'value' => 'up', 'icon' => 'ArrowUpIcon'], '3' => ['text' => 'Down', 'icon' => 'ArrowDownIcon', 'value' => 'down']]],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "text_colors",
        "Text Colors",
        [c(
        "headings",
        "Headings",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "text",
        "Text",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "link",
        "Link",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "brand",
        "Brand",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_margin_y",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )];
    }

    static function contentControls()
    {
        return [c(
        "options",
        "Options",
        [c(
        "button_info",
        "Button Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'warning', 'content' => '<p>Add ".de-oc-open" class to the button that opens the off-canvas. </p><p>Add ".de-oc-close" class to the button that closes the off-canvas. </p>']],
        false,
        false,
        [],
      ), c(
        "open_inside_builder",
        "Open Inside Builder",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "move_body",
        "Move Body",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "body_message",
        "Body Message",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Move body only available for right and left</p>']],
        false,
        false,
        [],
      ), c(
        "close_on_outside_click",
        "Close on Outside Click",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "disable_close_on_escape_key",
        "Disable Close on Escape Key",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "custom_id_aria_control_name",
        "Custom ID aria-control name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => 'default is off-canvas'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "advanced_options",
        "Advanced Options",
        [c(
        "info_message",
        "Info Message",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Advanced options, this will also allow to set up multiple off-canvas elements on the page, once the different selectors are used to open/close off canvas.</p>']],
        false,
        false,
        [],
      ), c(
        "info_selectors",
        "Info Selectors",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'info', 'content' => '<p>When custom selectors are utilized, the functionality for opening and closing the Off Canvas may not operate correctly within the Breakdance Builder.</p>']],
        false,
        false,
        [],
      ), c(
        "custom_open_selector",
        "Custom Open Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '.de-oc-open'],
        false,
        false,
        [],
      ), c(
        "custom_close_selector",
        "Custom Close Selector",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '.de-oc-close'],
        false,
        false,
        [],
      ), c(
        "z_index",
        "Z-Index",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "message_active",
        "Message Active",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'info', 'content' => '<p>When the off-canavs opens, it\'s possible to add a \'active\' class to any element. For example to Destiny Button which has style \'Burger Button\', that would create the animation of open and close.</p>']],
        false,
        false,
        [],
      ), c(
        "selector_to_add_active_class",
        "Selector to add 'active' class",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
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
        return ['0' =>  ['title' => 'Off Canvas','inlineScripts' => [' const offCanvases = document.querySelectorAll(\'.de-off-canvas\');

function findButtonsForCanvas(openSelector, closeSelector) {
  return {
    openButtons: document.querySelectorAll(openSelector),
    closeButtons: document.querySelectorAll(closeSelector),
  };
}

function toggleOffCanvas(offCanvas, show) {
  const action = show ? \'add\' : \'remove\';
  offCanvas.classList[action](\'active\');
  offCanvas.setAttribute(\'aria-hidden\', String(!show));
  document.body.classList[action](\'de-off-canvas-active\');

  // Handle data-add-active attribute for additional selectors
  const addActiveSelector = offCanvas.getAttribute(\'data-add-active\');
  if (addActiveSelector) {
    const elementsToAddActive = document.querySelectorAll(addActiveSelector);
    elementsToAddActive.forEach(element => {
      if (element) element.classList[action](\'active\');
    });
  }

  // Toggle .active class for the open button itself
  const openSelector = offCanvas.getAttribute(\'data-open-selector\');
  if (openSelector) {
    const openButton = document.querySelector(openSelector);
    if (openButton) openButton.classList[action](\'active\');
  }

  // Setup or remove outside click listener based on the off-canvas state
  const shouldCloseOnClickOutside = offCanvas.getAttribute(\'data-click\') === \'true\';
  if (offCanvas.getAttribute(\'aria-hidden\') == \'false\' && shouldCloseOnClickOutside) {
    setTimeout(() => { // Ensure this doesn\'t catch the same click that opened the canvas
      document.addEventListener(\'click\', closeCanvasOnOutsideClick, true); // Use capture to ensure this runs before any stopPropagation
    }, 10);
  } else {
    document.removeEventListener(\'click\', closeCanvasOnOutsideClick, true);
  }
}

function closeCanvasOnOutsideClick(event) {
  offCanvases.forEach(offCanvas => {
    if (!offCanvas.contains(event.target)) {
      toggleOffCanvas(offCanvas, false);
    }
  });
}

function setupCanvasButtons(offCanvas) {
  const openSelector = offCanvas.getAttribute(\'data-open-selector\');
  const closeSelector = offCanvas.getAttribute(\'data-close-selector\');
  const { openButtons, closeButtons } = findButtonsForCanvas(openSelector, closeSelector);

  openButtons.forEach(button => {
    button.addEventListener(\'click\', (event) => {
      event.stopPropagation(); // Prevent the document click listener from immediately closing the canvas
      toggleOffCanvas(offCanvas, true);
    });
  });

  closeButtons.forEach(button => {
    button.addEventListener(\'click\', () => toggleOffCanvas(offCanvas, false));
  });
}

offCanvases.forEach(setupCanvasButtons);

// Close all active off-canvas elements on Escape key press

{% if content.options.disable_close_on_escape_key %}
{% else %}
	document.addEventListener(\'keydown\', (e) => {
      if (e.key === \'Escape\') {
          offCanvases.forEach(offCanvas => {
              if (offCanvas.classList.contains(\'active\')) {
                  toggleOffCanvas(offCanvas, false);
              }
          });
      }
	});
{% endif %}
'],],];
    }

    static function settings()
    {
        return ['dependsOnGlobalScripts' => false, 'bypassPointerEvents' => false, 'withDependenciesInHtml' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => 'const deOffCanvasOpenBtn = document.querySelector(\'.de-oc-open\');
const deOffCanvasCloseBtn = document.querySelector(\'.de-oc-close\');
const deOffCanvas = document.querySelector(".de-off-canvas");
const deOffBody = document.querySelector("body");

if (deOffCanvasOpenBtn) deOffCanvasOpenBtn.addEventListener("click", deOffCanvasOpen);
if (deOffCanvasCloseBtn) deOffCanvasCloseBtn.addEventListener("click", deOffCanvasClose);

function deOffCanvasOpen() {
    if(deOffCanvas) {
         deOffBody.classList.add(\'de-off-canvas-active\');
         deOffCanvas.classList.add(\'active\');
    }
}

function deOffCanvasClose() {
  if(deOffCanvas) {
         deOffBody.classList.remove(\'de-off-canvas-active\');
         deOffCanvas.classList.remove(\'active\');
  }
}

{% if content.options.disable_close_on_escape_key %}

{% else %}
document.addEventListener("keydown", (e) => {
  if (e.key === \'Escape\') {
     deOffBody.classList.remove(\'de-off-canvas-active\');
     deOffCanvas.classList.remove(\'active\');
  }
});
{% endif %}',
],],

'onMovedElement' => [['script' => 'const deOffCanvasOpenBtn = document.querySelector(\'.de-oc-open\');
const deOffCanvasCloseBtn = document.querySelector(\'.de-oc-close\');
const deOffCanvas = document.querySelector(".de-off-canvas");
const deOffBody = document.querySelector("body");

if (deOffCanvasOpenBtn) deOffCanvasOpenBtn.addEventListener("click", deOffCanvasOpen);
if (deOffCanvasCloseBtn) deOffCanvasCloseBtn.addEventListener("click", deOffCanvasClose);

function deOffCanvasOpen() {
    if(deOffCanvas) {
         deOffBody.classList.add(\'de-off-canvas-active\');
         deOffCanvas.classList.add(\'active\');
    }
}

function deOffCanvasClose() {
  if(deOffCanvas) {
         deOffBody.classList.remove(\'de-off-canvas-active\');
         deOffCanvas.classList.remove(\'active\');
  }
}

{% if content.options.disable_close_on_escape_key %}

{% else %}
document.addEventListener("keydown", (e) => {
  if (e.key === \'Escape\') {
     deOffBody.classList.remove(\'de-off-canvas-active\');
     deOffCanvas.classList.remove(\'active\');
  }
});
{% endif %}',
],],

'onAfterDeletedElement' => [['script' => 'const deOffCanvasOpenBtn = document.querySelector(\'.de-oc-open\');
const deOffCanvasCloseBtn = document.querySelector(\'.de-oc-close\');
const deOffCanvas = document.querySelector(".de-off-canvas");
const deOffBody = document.querySelector("body");

if (deOffCanvasOpenBtn) deOffCanvasOpenBtn.addEventListener("click", deOffCanvasOpen);
if (deOffCanvasCloseBtn) deOffCanvasCloseBtn.addEventListener("click", deOffCanvasClose);

function deOffCanvasOpen() {
    if(deOffCanvas) {
         deOffBody.classList.add(\'de-off-canvas-active\');
         deOffCanvas.classList.add(\'active\');
    }
}

function deOffCanvasClose() {
  if(deOffCanvas) {
         deOffBody.classList.remove(\'de-off-canvas-active\');
         deOffCanvas.classList.remove(\'active\');
  }
}

{% if content.options.disable_close_on_escape_key %}

{% else %}
document.addEventListener("keydown", (e) => {
  if (e.key === \'Escape\') {
     deOffBody.classList.remove(\'de-off-canvas-active\');
     deOffCanvas.classList.remove(\'active\');
  }
});
{% endif %}',
],],

'onCreatedElement' => [['script' => 'const deOffCanvasOpenBtn = document.querySelector(\'.de-oc-open\');
const deOffCanvasCloseBtn = document.querySelector(\'.de-oc-close\');
const deOffCanvas = document.querySelector(".de-off-canvas");
const deOffBody = document.querySelector("body");

if (deOffCanvasOpenBtn) deOffCanvasOpenBtn.addEventListener("click", deOffCanvasOpen);
if (deOffCanvasCloseBtn) deOffCanvasCloseBtn.addEventListener("click", deOffCanvasClose);

function deOffCanvasOpen() {
    if(deOffCanvas) {
         deOffBody.classList.add(\'de-off-canvas-active\');
         deOffCanvas.classList.add(\'active\');
    }
}

function deOffCanvasClose() {
  if(deOffCanvas) {
         deOffBody.classList.remove(\'de-off-canvas-active\');
         deOffCanvas.classList.remove(\'active\');
  }
}

{% if content.options.disable_close_on_escape_key %}

{% else %}
document.addEventListener("keydown", (e) => {
  if (e.key === \'Escape\') {
     deOffBody.classList.remove(\'de-off-canvas-active\');
     deOffCanvas.classList.remove(\'active\');
  }
});
{% endif %}',
],],

'onBeforeDeletingElement' => [['script' => 'const deOffCanvasOpenBtn = document.querySelector(\'.de-oc-open\');
const deOffCanvasCloseBtn = document.querySelector(\'.de-oc-close\');
const deOffCanvas = document.querySelector(".de-off-canvas");
const deOffBody = document.querySelector("body");

if (deOffCanvasOpenBtn) deOffCanvasOpenBtn.addEventListener("click", deOffCanvasOpen);
if (deOffCanvasCloseBtn) deOffCanvasCloseBtn.addEventListener("click", deOffCanvasClose);

function deOffCanvasOpen() {
    if(deOffCanvas) {
         deOffBody.classList.add(\'de-off-canvas-active\');
         deOffCanvas.classList.add(\'active\');
    }
}

function deOffCanvasClose() {
  if(deOffCanvas) {
         deOffBody.classList.remove(\'de-off-canvas-active\');
         deOffCanvas.classList.remove(\'active\');
  }
}

{% if content.options.disable_close_on_escape_key %}

{% else %}
document.addEventListener("keydown", (e) => {
  if (e.key === \'Escape\') {
     deOffBody.classList.remove(\'de-off-canvas-active\');
     deOffCanvas.classList.remove(\'active\');
  }
});
{% endif %}',
],],

'onMountedElement' => [['script' => 'const deOffCanvasOpenBtn = document.querySelector(\'.de-oc-open\');
const deOffCanvasCloseBtn = document.querySelector(\'.de-oc-close\');
const deOffCanvas = document.querySelector(".de-off-canvas");
const deOffBody = document.querySelector("body");

if (deOffCanvasOpenBtn) deOffCanvasOpenBtn.addEventListener("click", deOffCanvasOpen);
if (deOffCanvasCloseBtn) deOffCanvasCloseBtn.addEventListener("click", deOffCanvasClose);

function deOffCanvasOpen() {
    if(deOffCanvas) {
         deOffBody.classList.add(\'de-off-canvas-active\');
         deOffCanvas.classList.add(\'active\');
    }
}

function deOffCanvasClose() {
  if(deOffCanvas) {
         deOffBody.classList.remove(\'de-off-canvas-active\');
         deOffCanvas.classList.remove(\'active\');
  }
}

{% if content.options.disable_close_on_escape_key %}

{% else %}
document.addEventListener("keydown", (e) => {
  if (e.key === \'Escape\') {
     deOffBody.classList.remove(\'de-off-canvas-active\');
     deOffCanvas.classList.remove(\'active\');
  }
});
{% endif %}',
],],

'onActivatedElement' => [['script' => 'const deOffCanvasOpenBtn = document.querySelector(\'.de-oc-open\');
const deOffCanvasCloseBtn = document.querySelector(\'.de-oc-close\');
const deOffCanvas = document.querySelector(".de-off-canvas");
const deOffBody = document.querySelector("body");

if (deOffCanvasOpenBtn) deOffCanvasOpenBtn.addEventListener("click", deOffCanvasOpen);
if (deOffCanvasCloseBtn) deOffCanvasCloseBtn.addEventListener("click", deOffCanvasClose);

function deOffCanvasOpen() {
    if(deOffCanvas) {
         deOffBody.classList.add(\'de-off-canvas-active\');
         deOffCanvas.classList.add(\'active\');
    }
}

function deOffCanvasClose() {
  if(deOffCanvas) {
         deOffBody.classList.remove(\'de-off-canvas-active\');
         deOffCanvas.classList.remove(\'active\');
  }
}

{% if content.options.disable_close_on_escape_key %}

{% else %}
document.addEventListener("keydown", (e) => {
  if (e.key === \'Escape\') {
     deOffBody.classList.remove(\'de-off-canvas-active\');
     deOffCanvas.classList.remove(\'active\');
  }
});
{% endif %}',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "container",   ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return [['name' => 'aria-hidden', 'template' => 'true'], ['name' => 'aria-controls', 'template' => '{% if content.options.custom_id_aria_control_name %}
	{{ content.options.custom_id_aria_control_name }}
{% else %}
	off-canvas
{% endif %}'], ['name' => 'data-click', 'template' => '{% if content.options.close_on_outside_click %}
true
{% else %}
false
{% endif %}'], ['name' => 'data-open-selector', 'template' => '{{ content.advanced_options.custom_open_selector|default(\'.de-oc-open\') }}'], ['name' => 'data-close-selector', 'template' => '{{ content.advanced_options.custom_close_selector|default(\'.de-oc-close\') }}'], ['name' => 'data-add-active', 'template' => '{{ content.advanced_options.selector_to_add_active_class }}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 330;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '1' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '2' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '4' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string'], '5' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return [['name' => 'active', 'template' => '{% if content.options.open_inside_builder and isBuilder %}
active
{% else %}
{% endif %}']];
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return ['design.layout.horizontal.vertical_at', 'design.background.image', 'design.background.overlay.image', 'design.background.image_settings.unset_image_at', 'design.background.image_settings.size', 'design.background.image_settings.height', 'design.background.image_settings.repeat', 'design.background.image_settings.position', 'design.background.image_settings.left', 'design.background.image_settings.top', 'design.background.image_settings.attachment', 'design.background.image_settings.custom_position', 'design.background.image_settings.width', 'design.background.overlay.image_settings.custom_position', 'design.background.image_size', 'design.background.overlay.image_size', 'design.background.overlay.type', 'design.background.image_settings', 'design.container.width', 'design.effects.open_direction'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
