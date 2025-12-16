<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\BackToTopButton",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class BackToTopButton extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="currentColor" d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/></svg>';
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
        return 'Back To Top Button';
    }

    static function className()
    {
        return 'destiny-bttb';
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
        return ['content' => ['icon' => ['select_icon' => ['slug' => 'icon-chevron-up.', 'name' => 'chevron up', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg>']], 'options' => ['visiable_all_times' => true, 'show_icon_at_px_' => 50, 'enable_progress' => true]], 'design' => ['button' => ['position' => ['left' => null, 'right' => ['number' => 30, 'unit' => 'px', 'style' => '30px'], 'bottom' => ['number' => 30, 'unit' => 'px', 'style' => '30px']], 'transition_duration' => null, 'opacity_duration_s_' => ['number' => '.5', 'unit' => 'custom', 'style' => '.5'], 'background_color' => ['breakpoint_base' => 'var(--bde-brand-primary-color)'], 'background_color_hover' => null, 'padding' => ['top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'right' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'left' => ['number' => 7, 'unit' => 'px', 'style' => '7px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'breakpoint_base' => ['top' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottom' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'border_radius' => ['all' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'topRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomLeft' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'bottomRight' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'editMode' => 'all'], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'border_radius' => ['all' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'topLeft' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'topRight' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'bottomLeft' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'bottomRight' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'editMode' => 'all'], 'border' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]], 'icon' => ['color' => ['breakpoint_base' => '#FFFFFFFF'], 'size' => ['number' => 25, 'unit' => 'px', 'style' => '25px', 'breakpoint_base' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'progress' => ['size' => ['number' => 3, 'unit' => 'px', 'style' => '3px'], 'color' => '#FFFFFFFF', 'fill_color' => '#000000FF']]];
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
        "button",
        "Button",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        true,
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
      ), c(
        "opacity_duration_s_",
        "Opacity Duration (s)",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'custom'], 'defaultType' => 'custom']],
        false,
        false,
        [],
      ), c(
        "padding",
        "Padding",
        [],
        ['type' => 'spacing_complex', 'layout' => 'vertical'],
        true,
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
        "icon",
        "Icon",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        true,
        true,
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
      ), c(
        "progress",
        "Progress",
        [c(
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
      ), c(
        "fill_color",
        "Fill Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['path' => 'content.options.enable_progress', 'operand' => 'is set', 'value' => '']],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "icon",
        "Icon",
        [c(
        "select_icon",
        "Select Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
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
        "enable_progress",
        "Enable Progress",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "visiable_all_times",
        "Visiable All Times",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "show_icon_at_px_",
        "Show Icon At (PX)",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'condition' => ['path' => 'content.options.visiable_all_times', 'operand' => 'is not set', 'value' => '']],
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
        return ['0' =>  ['inlineScripts' => ['const bttb = document.querySelector(".destiny-bttb");
let deScrollY = \'{{ content.options.show_icon_at_px_ }}\';
let deConverScrollNp = Number(deScrollY);

const deVisibleOption = "{{ content.options.visiable_all_times }}";


if(deVisibleOption) {
  bttb.classList.add("show"); 
} else {
  window.addEventListener("scroll", () => {
  if (window.scrollY > deConverScrollNp) {
  	bttb.classList.add("show"); 
  } else {
  	bttb.classList.remove("show"); 
  }
});
}

bttb.addEventListener("click", function () { 
  window.scrollTo({top: 0, behavior: \'smooth\'});
});

{% if content.options.enable_progress %}
window.addEventListener("scroll", () => {  
   	let deBttbProgressCircle = document.querySelector(\'.de-bttb-progress.fill\');
  	let deProgress = window.pageYOffset / (document.body.scrollHeight - window.innerHeight);
  	deBttbProgressCircle.style.setProperty(\'--progress\', Math.ceil(100 * deProgress) + "%");
});
{% endif %}'],],];
    }

    static function settings()
    {
        return ['bypassPointerEvents' => false];
    }

    static function addPanelRules()
    {
        return ['alwaysHide' => false];
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => 'const bttb = document.querySelector(".destiny-bttb");
let deScrollY = \'{{ content.options.show_icon_at_px_ }}\';
let deConverScrollNp = Number(deScrollY);

const deVisibleOption = "{{ content.options.visiable_all_times }}";


if(deVisibleOption) {
  bttb.classList.add("show"); 
} else {
  window.addEventListener("scroll", () => {
  if (window.scrollY > deConverScrollNp) {
  	bttb.classList.add("show"); 
  } else {
  	bttb.classList.remove("show"); 
  }
});
}

bttb.addEventListener("click", function () { 
  window.scrollTo({top: 0, behavior: \'smooth\'});
});

{% if content.options.enable_progress %}
window.addEventListener("scroll", () => {  
   	let deBttbProgressCircle = document.querySelector(\'.de-bttb-progress.fill\');
  	let deProgress = window.pageYOffset / (document.body.scrollHeight - window.innerHeight);
  	deBttbProgressCircle.style.setProperty(\'--progress\', Math.ceil(100 * deProgress) + "%");
});
{% endif %}',
],],

'onCreatedElement' => [['script' => 'const bttb = document.querySelector(".destiny-bttb");
let deScrollY = \'{{ content.options.show_icon_at_px_ }}\';
let deConverScrollNp = Number(deScrollY);

const deVisibleOption = "{{ content.options.visiable_all_times }}";


if(deVisibleOption) {
  bttb.classList.add("show"); 
} else {
  window.addEventListener("scroll", () => {
  if (window.scrollY > deConverScrollNp) {
  	bttb.classList.add("show"); 
  } else {
  	bttb.classList.remove("show"); 
  }
});
}

bttb.addEventListener("click", function () { 
  window.scrollTo({top: 0, behavior: \'smooth\'});
});',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return [];
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
        return 100;
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
