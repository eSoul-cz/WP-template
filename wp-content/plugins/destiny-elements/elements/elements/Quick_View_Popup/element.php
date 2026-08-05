<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\QuickViewPopup",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class QuickViewPopup extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>';
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
        return 'Quick View Popup';
    }

    static function className()
    {
        return 'de-quickview-popup';
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
        return ['design' => ['popup' => ['background_content' => '#FFFFFFFF', 'background_overlay' => '#0000001F', 'size' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'min_width' => ['breakpoint_base' => null], 'max_width' => ['breakpoint_base' => ['number' => 800, 'unit' => 'px', 'style' => '800px']], 'height' => ['breakpoint_base' => ['number' => 'fit-content', 'unit' => 'custom', 'style' => 'fit-content']], 'min_height' => ['breakpoint_base' => ['number' => null, 'unit' => 'vh', 'style' => null]], 'max_height' => ['breakpoint_base' => ['number' => 80, 'unit' => 'vh', 'style' => '80vh']]], 'layout' => ['display' => ['breakpoint_base' => 'flex'], 'align_items' => ['breakpoint_base' => 'center'], 'justify_content' => ['breakpoint_base' => 'center'], 'flex_direction' => ['breakpoint_base' => 'row'], 'flex_wrap' => ['breakpoint_base' => 'wrap'], 'align_content' => ['breakpoint_base' => 'center']], 'spacing_padding_all' => ['padding' => ['breakpoint_base' => ['top' => null, 'bottom' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'left' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'right' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]], 'disable_inside_builder' => false, 'border' => ['border' => ['top' => ['width' => null, 'color' => '', 'style' => ''], 'bottom' => ['width' => null, 'color' => '', 'style' => ''], 'left' => ['width' => null, 'color' => '', 'style' => ''], 'right' => ['width' => null, 'color' => '', 'style' => '']], 'border_radius' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all']]], 'close_button' => ['icon' => ['id' => 3918, 'slug' => 'icon-rectangle-xmark.', 'name' => 'rectangle xmark', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm175 79c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>', 'iconSetSlug' => 'FontAwesome 6 Free - Regular'], 'color' => 'var(--bde-brand-primary-color)', 'size' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'position' => ['x' => 90.74, 'y' => 4.6, 'top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]]];
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
        "popup",
        "Popup",
        [getPresetSection(
      "EssentialElements\\layout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\size",
      "Size",
      "size",
       ['type' => 'popout']
     ), c(
        "background_content",
        "Background Content",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "background_overlay",
        "Background Overlay",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding (All)",
      "spacing_padding_all",
       ['type' => 'popout']
     ), c(
        "disable_inside_builder",
        "Disable Inside Builder",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border",
        "Border",
        [c(
        "border",
        "Border",
        [],
        ['type' => 'border_complex', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "border_radius",
        "Border Radius",
        [],
        ['type' => 'border_radius', 'layout' => 'vertical'],
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
        "close_button",
        "Close Button",
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
        "size",
        "Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [c(
        "right",
        "Right",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "left",
        "Left",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "top",
        "Top",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "bottom",
        "Bottom",
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
      )];
    }

    static function contentControls()
    {
        return [];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['title' => 'Quickview','inlineScripts' => ['let quickViewButtons = document.querySelectorAll(".de-quickviewbutton .bde-button__button");
let quickViewPopups = document.querySelectorAll(".de-quickview-popup");
let body = document.body;

// Function to show the correct Quick View Popup
function showQuickView(event) {
  event.preventDefault();
  event.stopPropagation();

  let button = event.currentTarget;
  let popup = button.closest(".bde-loop-item").querySelector(".de-quickview-popup");

  if (popup) {
    popup.style.display = "block";
    body.classList.add("quickview-open");
  }
}

// Function to hide Quick View Popup
function hideQuickView(event) {
  event.preventDefault();
  event.stopPropagation();

  let popup = event.currentTarget.closest(".de-quickview-popup");
  if (popup) {
    popup.style.display = "none";
    body.classList.remove("quickview-open");
  }
}

// Attach click event to each Quick View Button
quickViewButtons.forEach(button => {
  button.addEventListener("click", showQuickView);

  // Prevent parent `<a>` from triggering navigation
  let parentLink = button.closest("a");
  if (parentLink) {
    parentLink.addEventListener("click", function (event) {
      event.preventDefault();
    });
  }
});

// Attach click event to each Close Button inside popups
document.querySelectorAll(".de-quickview-popup-close").forEach(closeBtn => {
  closeBtn.addEventListener("click", hideQuickView);
});

// Attach click event to overlay inside each popup
document.querySelectorAll(".de-quickview-popup-wrapper").forEach(overlay => {
  overlay.addEventListener("click", function (event) {
    if (event.target === overlay) {
      hideQuickView(event);
    }
  });
});

// Press ESC to close any open Quick View popup
document.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    document.querySelectorAll(".de-quickview-popup").forEach(popup => {
      popup.style.display = "none";
    });
    body.classList.remove("quickview-open");
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
        return ["type" => "container",   ];
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
        return 0;
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
        return ['design.popup.layout_v2.layout', 'design.popup.layout_v2.h_vertical_at', 'design.popup.layout_v2.h_alignment_when_vertical', 'design.popup.layout_v2.a_display', 'design.popup.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
