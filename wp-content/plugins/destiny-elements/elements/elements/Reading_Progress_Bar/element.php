<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\ReadingProgressBar",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ReadingProgressBar extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M406.6 374.6l96-96c12.5-12.5 12.5-32.8 0-45.3l-96-96c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224l-293.5 0 41.4-41.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-96 96c-12.5 12.5-12.5 32.8 0 45.3l96 96c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288l293.5 0-41.4 41.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z"/></svg>';
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
        return 'Reading Progress Bar';
    }

    static function className()
    {
        return 'de-prorgress-bar';
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
        return ['design' => ['bar_styles' => ['progress_bar_colour' => '#FC7904', 'background_colour' => '#0B2035', 'bar_heigth' => ['number' => 4, 'unit' => 'px', 'style' => '4px']]], 'content' => ['main_options' => ['position' => 'top', 'progress' => 'contrainer', 'display' => 'outside']]];
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
        "bar_styles",
        "Bar Styles",
        [c(
        "background_colour",
        "Background Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "progress_bar_colour",
        "Progress Bar Colour",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "bar_height",
        "Bar Height",
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
      )];
    }

    static function contentControls()
    {
        return [c(
        "main_options",
        "Main Options",
        [c(
        "position",
        "Position",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'top', 'text' => 'Top'], '1' => ['text' => 'Bottom', 'value' => 'bottom'], '2' => ['text' => 'Sticky', 'value' => 'sticky']]],
        false,
        false,
        [],
      ), c(
        "progress",
        "Progress",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Post Content', 'value' => 'contrainer'], '1' => ['value' => 'window', 'text' => 'Full Window']]],
        false,
        false,
        [],
      ), c(
        "info",
        "Info",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>Add ".de-pb-content" class in advanced options to your post content container</p>'], 'condition' => ['path' => 'content.main_options.progress', 'operand' => 'equals', 'value' => 'contrainer']],
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
        return ['0' =>  ['inlineScripts' => ['const dePRBar = document.querySelector(".de-progrss-bar-fill");
const dePRBarContent = document.querySelector(".de-pb-content");


const deBarPosition = "{{ content.main_options.position}}";
const deWpAdminBar = document.querySelector("#wpadminbar");
const dePrBarContainer = document.querySelector(".de-prorgress-bar");

if(deWpAdminBar && deBarPosition == "top") {
  const deWpAdminBarHeight = deWpAdminBar.getBoundingClientRect().height;
  dePrBarContainer.style.top = deWpAdminBarHeight + "px";
}

if(deWpAdminBar && deBarPosition == "sticky") {
  const deWpAdminBarHeight = deWpAdminBar.getBoundingClientRect().height;
  dePrBarContainer.style.top = deWpAdminBarHeight + "px";
}


const deDisplayProgressArea = "{{content.main_options.progress}}";


if(deDisplayProgressArea == "contrainer" && dePRBarContent) {
	const dePRBarOffest = dePRBarContent.getBoundingClientRect().top;
	const dePRBarHeight = dePRBarContent.getBoundingClientRect().height;
    window.addEventListener("scroll", () => {
		let deProgress = ((window.pageYOffset - dePRBarOffest) / dePRBarHeight * 100);
			if(window.scrollY >= dePRBarOffest && window.scrollY < (dePRBarOffest + dePRBarHeight)) {
            	dePRBar.style.width = Math.ceil(deProgress) + "%";
          	} else if (window.scrollY < dePRBarOffest) {
            	dePRBar.style.width = "0%";
          	} else {
            	dePRBar.style.width = "100%";
			}
	});
}

if(deDisplayProgressArea == "window") {
  window.addEventListener("scroll", () => {  
  	let deProgress = window.pageYOffset / (document.body.scrollHeight - window.innerHeight);
    dePRBar.style.width = Math.ceil(100 * deProgress) + "%";
  });
}'],],];
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

'onPropertyChange' => [['script' => 'const dePRBar = document.querySelector(".de-progrss-bar-fill");
const dePRBarContent = document.querySelector(".de-pb-content");


const deBarPosition = "{{ content.main_options.position}}";
const deWpAdminBar = document.querySelector("#wpadminbar");
const dePrBarContainer = document.querySelector(".de-prorgress-bar");

if(deWpAdminBar && deBarPosition == "top") {
  const deWpAdminBarHeight = deWpAdminBar.getBoundingClientRect().height;
  dePrBarContainer.style.top = deWpAdminBarHeight + "px";
}

if(deWpAdminBar && deBarPosition == "sticky") {
  const deWpAdminBarHeight = deWpAdminBar.getBoundingClientRect().height;
  dePrBarContainer.style.top = deWpAdminBarHeight + "px";
}


const deDisplayProgressArea = "{{content.main_options.progress}}";


if(deDisplayProgressArea == "contrainer" && dePRBarContent) {
	const dePRBarOffest = dePRBarContent.getBoundingClientRect().top;
	const dePRBarHeight = dePRBarContent.getBoundingClientRect().height;
    window.addEventListener("scroll", () => {
		let deProgress = ((window.pageYOffset - dePRBarOffest) / dePRBarHeight * 100);
			if(window.scrollY >= dePRBarOffest && window.scrollY < (dePRBarOffest + dePRBarHeight)) {
            	dePRBar.style.width = Math.ceil(deProgress) + "%";
          	} else if (window.scrollY < dePRBarOffest) {
            	dePRBar.style.width = "0%";
          	} else {
            	dePRBar.style.width = "100%";
			}
	});
}

if(deDisplayProgressArea == "window") {
  window.addEventListener("scroll", () => {  
  	let deProgress = window.pageYOffset / (document.body.scrollHeight - window.innerHeight);
    dePRBar.style.width = Math.ceil(100 * deProgress) + "%";
  });
}',
],],

'onCreatedElement' => [['script' => 'const dePRBar = document.querySelector(".de-progrss-bar-fill");
const dePRBarContent = document.querySelector(".de-pb-content");


const deBarPosition = "{{ content.main_options.position}}";
const deWpAdminBar = document.querySelector("#wpadminbar");
const dePrBarContainer = document.querySelector(".de-prorgress-bar");

if(deWpAdminBar && deBarPosition == "top") {
  const deWpAdminBarHeight = deWpAdminBar.getBoundingClientRect().height;
  dePrBarContainer.style.top = deWpAdminBarHeight + "px";
}

if(deWpAdminBar && deBarPosition == "sticky") {
  const deWpAdminBarHeight = deWpAdminBar.getBoundingClientRect().height;
  dePrBarContainer.style.top = deWpAdminBarHeight + "px";
}


const deDisplayProgressArea = "{{content.main_options.progress}}";


if(deDisplayProgressArea == "contrainer" && dePRBarContent) {
	const dePRBarOffest = dePRBarContent.getBoundingClientRect().top;
	const dePRBarHeight = dePRBarContent.getBoundingClientRect().height;
    window.addEventListener("scroll", () => {
		let deProgress = ((window.pageYOffset - dePRBarOffest) / dePRBarHeight * 100);
			if(window.scrollY >= dePRBarOffest && window.scrollY < (dePRBarOffest + dePRBarHeight)) {
            	dePRBar.style.width = Math.ceil(deProgress) + "%";
          	} else if (window.scrollY < dePRBarOffest) {
            	dePRBar.style.width = "0%";
          	} else {
            	dePRBar.style.width = "100%";
			}
	});
}

if(deDisplayProgressArea == "window") {
  window.addEventListener("scroll", () => {  
  	let deProgress = window.pageYOffset / (document.body.scrollHeight - window.innerHeight);
    dePRBar.style.width = Math.ceil(100 * deProgress) + "%";
  });
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
        return 370;
    }

    static function dynamicPropertyPaths()
    {
        return false;
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
