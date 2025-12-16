<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\Cursor",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class Cursor extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 55.2V426c0 12.2 9.9 22 22 22c6.3 0 12.4-2.7 16.6-7.5L121.2 346l58.1 116.3c7.9 15.8 27.1 22.2 42.9 14.3s22.2-27.1 14.3-42.9L179.8 320H297.9c12.2 0 22.1-9.9 22.1-22.1c0-6.3-2.7-12.3-7.4-16.5L38.6 37.9C34.3 34.1 28.9 32 23.2 32C10.4 32 0 42.4 0 55.2z"/></svg>';
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
        return 'Custom Cursor';
    }

    static function className()
    {
        return 'de-cursor';
    }

    static function category()
    {
        return 'destiny_exs';
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
        return ['content' => ['options' => ['enable_outter_cursor' => true, 'selectors' => ['0' => ['selector_name' => 'a'], '1' => ['selector_name' => 'button'], '2' => ['selector_name' => '.button-atom__text']], 'enable_default_cursor' => true, 'disable_custom_cursor_inside_builder' => false], 'outter_cursor' => ['type' => 'scale', 'enable_outter_cursor' => true, 'disable_outter_cursor' => false]], 'design' => ['inner_cursor' => ['width' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'height' => ['number' => 12, 'unit' => 'px', 'style' => '12px'], 'size' => 15, 'color' => '#FF0202FF', 'scale_suze' => 2, 'scale_size' => 2, 'effects' => ['scale_size' => 0.3, 'transiiton_duration' => ['number' => 210, 'unit' => 'ms', 'style' => '210ms']]], 'outter_cursor' => ['size' => 60, 'effects' => ['transiiton_duration' => ['number' => 100, 'unit' => 'ms', 'style' => '100ms'], 'hover_opacity' => 0.05, 'scale' => 1.5], 'color' => null, 'magnetic' => ['z_index' => ['z_index_object' => 10, 'z_index_outter_cursor' => 9, 'z_index_overlay' => 9], 'padding' => null, 'border_radius' => ['number' => 2, 'unit' => 'px', 'style' => '2px']], 'border_color' => null, 'opacity' => 0.2]]];
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
        "inner_cursor",
        "Inner Cursor",
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
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 1, 'max' => 100]],
        false,
        false,
        [],
      ), c(
        "effects",
        "Effects",
        [c(
        "scale_size",
        "Scale Size",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 2]],
        false,
        false,
        [],
      ), c(
        "transiiton_duration",
        "Transiiton Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 500], 'unitOptions' => ['types' => ['0' => 'ms']]],
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
        "outter_cursor",
        "Outter Cursor",
        [c(
        "color",
        "Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "border_color",
        "Border Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
        [],
        ['type' => 'number', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'custom'], 'defaultType' => 'custom'], 'rangeOptions' => ['min' => 1, 'max' => 100]],
        false,
        false,
        [],
      ), c(
        "opacity",
        "Opacity",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 2]],
        false,
        false,
        [],
      ), c(
        "effects",
        "Effects",
        [c(
        "transiiton_duration",
        "Transiiton Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 500], 'unitOptions' => ['types' => ['0' => 'ms']]],
        false,
        false,
        [],
      ), c(
        "hover_opacity",
        "Hover Opacity",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['min' => 0, 'max' => 1, 'step' => 2]],
        false,
        false,
        [],
      ), c(
        "scale",
        "Scale",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "magnetic",
        "Magnetic",
        [c(
        "z_index",
        "Z-index",
        [c(
        "z_index_object",
        "Z-Index Object",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "z_index_outter_cursor",
        "Z-Index Outter Cursor",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "z_index_overlay",
        "Z-index Overlay",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['path' => '', 'operand' => 'equals', 'value' => '']],
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
        "selectors",
        "Selectors",
        [c(
        "selector_name",
        "Selector Name",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{selector_name}', 'defaultTitle' => '', 'buttonName' => 'Add Selector']],
        false,
        false,
        [],
      ), c(
        "enable_default_cursor",
        "Enable Default Cursor",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "disable_custom_cursor_inside_builder",
        "Disable Custom Cursor Inside Builder",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "outter_cursor",
        "Outter Cursor",
        [c(
        "disable_outter_cursor",
        "Disable Outter Cursor",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "type",
        "Type",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'magnetic', 'text' => 'Magnetic'], '1' => ['text' => 'Scale', 'value' => 'scale']], 'buttonBarOptions' => ['size' => 'small', 'layout' => 'default']],
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
        return ['0' =>  ['title' => 'Script','inlineScripts' => ['let cursorSettings = {
  inner: { 
   	{% if design.inner_cursor.color %}
		color: "{{ design.inner_cursor.color }}" , 
  	{% else %}
		color: "red" , 
	{% endif %}
	{% if design.inner_cursor.color %} 	
		width:  {{ design.inner_cursor.size }},
   	{% else %}
    	width:  12,
    {% endif %}
    {% if design.inner_cursor.size %} 	
  		height:  {{ design.inner_cursor.size }},
    {% else %}
    	height: 12,
    {% endif %}
     {% if design.inner_cursor.effects.scale_size %} 	
  		 scale: {{ design.inner_cursor.effects.scale_size }},
    {% else %}
    	scale: 1.5,
    {% endif %}
},
  outter: {
    // magnetic / scale 
    {% if content.outter_cursor.type %} 	
  		type: "{{ content.outter_cursor.type }}",
    {% else %}
    	type: "scale",
    {% endif %}
    {% if design.outter_cursor.color %} 	
    color: "{{ design.outter_cursor.color }}",
    {% else %}
    color: "red",
    {% endif %}
    {% if design.outter_cursor.size %} 	
    width: {{ design.outter_cursor.size }},
    height: {{ design.outter_cursor.size }},
    {% else %}
    width: 35,
    height: 35,
    {% endif %}
    {% if design.outter_cursor.border_color %} 	
    borderColor: "{{ design.outter_cursor.border_color }}",
    {% else %}
    borderColor: "black",
    {% endif %}
    borderRadius: "100%",
 	{% if design.outter_cursor.magnetic.border_radius.style %} 	
    borderRadiusHover: "{{ design.outter_cursor.magnetic.border_radius.style }}",
    {% else %}
     borderRadiusHover: "3px",
    {% endif %} 
    {% if design.outter_cursor.opacity %} 	
    opacity: {{ design.outter_cursor.opacity }},
    {% else %}
    opacity: 0.4,
    {% endif %}
    {% if design.outter_cursor.effects.hover_opacity %} 	
    hoverOpacity: {{ design.outter_cursor.effects.hover_opacity }},
    {% else %}
    hoverOpacity: 0.2,
    {% endif %}
    {% if design.outter_cursor.effects.scale %} 	
    scale: {{ design.outter_cursor.effects.scale }},
    {% else %}
    scale: 1.5,
    {% endif %}
  },
  overlay: { enable: true, color: "black", opacity: 0.6 },
  {% if content.options.selectors %}
     selectors: [
    {% for item in content.options.selectors %}
      "{{ item.selector_name }}",
    {% endfor %}
	  ],
  {% else %}
  selectors: [
    "a", 
    "button", 
    "input",
  ],
  {% endif %}
};

// Only run on non touch screen devices
let isTouchDevice = "ontouchstart" in document.documentElement;
if (!isTouchDevice) {
  const footer = document.querySelector("body");

  // Adding Custom Cursors to Footer
  const cursorInner = document.createElement("div");
  footer.appendChild(cursorInner);
  cursorInner.classList.add("custom-cursor-inner");
  if (
    cursorSettings.outter.type == "magnetic" ||
    cursorSettings.outter.type == "scale"
  ) {
    const cursorOutter = document.createElement("div");
    footer.appendChild(cursorOutter);
    cursorOutter.classList.add("custom-cursor-outter");
  }
  if (cursorSettings.outter.type == "magnetic") {
    const overlay = document.createElement("div");
    footer.appendChild(overlay);
    overlay.classList.add("custom-cursor-overlay");
  }

  addEventListener("mousemove", customCursor);
}

function customCursor(e) {

  let obj = e.target;
  
    e.preventDefault();
  let x = e.clientX;
  let y = e.clientY;

  let rect = obj.getBoundingClientRect();
  var docEl = document.documentElement;

  let opacity,
    borderRadius,
    btnWidth,
    btnHeight,
    btnX,
    btnY,
    cursorOverlay,
    scale,
    scaleInner,
    zIndex;
  
  if (cursorSettings.outter.type == "magnetic") {
   	 zIndex = 11; 
  } else {
     zIndex = 100000001; 
  }

  if (obj.matches(cursorSettings.selectors)) {
    if (cursorSettings.outter.type == "magnetic") {
      btnX = rect.left + (window.pageXOffset || docEl.scrollLeft || 0);
      btnY = rect.top;
      opacity = cursorSettings.outter.hoverOpacity;
      obj.style.zIndex = 12;
      obj.style.position = "relative";
      cursorOverlay = cursorSettings.overlay.opacity;
      borderRadius = cursorSettings.outter.borderRadiusHover;
      {% if design.outter_cursor.magnetic.padding %}
      	 btnWidth = obj.clientWidth;
         btnHeight = obj.clientHeight;
      {% else %}
        btnWidth = obj.clientWidth;
        btnHeight = obj.clientHeight;
      {% endif %}
      scaleInner = cursorSettings.inner.scale;
      obj.addEventListener("mouseleave", (event) => {
        obj.style.zIndex = null;
      });
    } else if (cursorSettings.outter.type == "scale") {
      btnX = x - cursorSettings.outter.width / 2;
      btnY = y - cursorSettings.outter.height / 2;
      opacity = cursorSettings.outter.hoverOpacity;
      borderRadius = cursorSettings.outter.borderRadius;
      cursorOverlay = 1;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      scale = cursorSettings.outter.scale;
      scaleInner = cursorSettings.inner.scale;
    }
  } else {
    if (cursorSettings.outter.type == "magnetic") {
      btnX = x - cursorSettings.outter.width / 2;
      btnY = y - cursorSettings.outter.height / 2;
      opacity = cursorSettings.outter.opacity;
      borderRadius = cursorSettings.outter.borderRadius;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      cursorOverlay = 0;
        scaleInner = 1;
    } else if (cursorSettings.outter.type == "scale") {
      btnX = x - cursorSettings.outter.width / 2 - 0.5;
      btnY = y - cursorSettings.outter.height / 2 - 0.5;
      opacity = cursorSettings.outter.opacity;
      borderRadius = cursorSettings.outter.borderRadius;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      cursorOverlay = 1;
      scale = 1;
      scaleInner = 1;
    }
  }

  document.querySelector(\'.custom-cursor-inner\').style.cssText = `
        position: fixed; 
        width: ${cursorSettings.inner.width}px; 
        height: ${cursorSettings.inner.height}px; 
        background-color: ${cursorSettings.inner.color};
        border-radius: 100%;
        left: ${x - cursorSettings.inner.height / 2}px; 
        top: ${y - cursorSettings.inner.height / 2}px;
        scale: ${scaleInner};
        pointer-events: none;
        transition: scale {{ design.inner_cursor.effects.transiiton_duration.style }};
        z-index: 100000002;
    `;
  
  	{% if content.outter_cursor.disable_outter_cursor %}
	{% else %}
  if (
    cursorSettings.outter.type == "magnetic" ||
    cursorSettings.outter.type == "scale"
  ) {
    document.querySelector(".custom-cursor-outter").style.cssText = `
        position: fixed;
        left: ${btnX}px; 
        top: ${btnY}px;
        background-color: ${cursorSettings.outter.color}; 
        width: ${btnWidth}px;
        height: ${btnHeight}px;
        border-radius: ${borderRadius};
        border: 1px solid ${cursorSettings.outter.borderColor};
        opacity: ${opacity}; 
        pointer-events: none;
        z-index: ${zIndex};
        scale: ${scale};
     `;
  }
  if (cursorSettings.outter.type == "magnetic") {
    overlayBG(cursorSettings.overlay.color, cursorOverlay);
  }
  {% endif %}
}
 

function overlayBG(bgColor, opacity) {
  let cusrsorOverlay = document.querySelector(".custom-cursor-overlay");
  cusrsorOverlay.style.cssText = `
       position: fixed;
       left: 0;
       top: 0;
       width: 100%;
       height: 100vh;
       background-color: ${bgColor};
       opacity: ${opacity};
       z-index: {{ design.outter_cursor.magnetic.z_index.z_index_overlay }};
       pointer-events: none;
    `;
}
'],],'1' =>  ['title' => 'Builder','inlineStyles' => ['{% if content.options.disable_custom_cursor_inside_builder %}
.custom-cursor-inner, 
.custom-cursor-outter, 
.custom-cursor-overlay {
  display: none !important;
}
{% endif %}'],'frontendCondition' => 'return false;',],];
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

'onPropertyChange' => [['script' => 'let cursorSettings = {
  inner: { 
   	{% if design.inner_cursor.color %}
		color: "{{ design.inner_cursor.color }}" , 
  	{% else %}
		color: "red" , 
	{% endif %}
	{% if design.inner_cursor.color %} 	
		width:  {{ design.inner_cursor.size }},
   	{% else %}
    	width:  12,
    {% endif %}
    {% if design.inner_cursor.size %} 	
  		height:  {{ design.inner_cursor.size }},
    {% else %}
    	height: 12,
    {% endif %}
     {% if design.inner_cursor.effects.scale_size %} 	
  		 scale: {{ design.inner_cursor.effects.scale_size }},
    {% else %}
    	scale: 1.5,
    {% endif %}
},
  outter: {
    // magnetic / scale 
    {% if content.outter_cursor.type %} 	
  		type: "{{ content.outter_cursor.type }}",
    {% else %}
    	type: "scale",
    {% endif %}
    {% if design.outter_cursor.color %} 	
    color: "{{ design.outter_cursor.color }}",
    {% else %}
    color: "red",
    {% endif %}
    {% if design.outter_cursor.size %} 	
    width: {{ design.outter_cursor.size }},
    height: {{ design.outter_cursor.size }},
    {% else %}
    width: 35,
    height: 35,
    {% endif %}
    {% if design.outter_cursor.border_color %} 	
    borderColor: "{{ design.outter_cursor.border_color }}",
    {% else %}
    borderColor: "black",
    {% endif %}
    borderRadius: "100%",
 	{% if design.outter_cursor.magnetic.border_radius.style %} 	
    borderRadiusHover: "{{ design.outter_cursor.magnetic.border_radius.style }}",
    {% else %}
     borderRadiusHover: "3px",
    {% endif %} 
    {% if design.outter_cursor.opacity %} 	
    opacity: {{ design.outter_cursor.opacity }},
    {% else %}
    opacity: 0.4,
    {% endif %}
    {% if design.outter_cursor.effects.hover_opacity %} 	
    hoverOpacity: {{ design.outter_cursor.effects.hover_opacity }},
    {% else %}
    hoverOpacity: 0.2,
    {% endif %}
    {% if design.outter_cursor.effects.scale %} 	
    scale: {{ design.outter_cursor.effects.scale }},
    {% else %}
    scale: 1.5,
    {% endif %}
  },
  overlay: { enable: true, color: "black", opacity: 0.6 },
  {% if content.options.selectors %}
     selectors: [
    {% for item in content.options.selectors %}
      "{{ item.selector_name }}",
    {% endfor %}
	  ],
  {% else %}
  selectors: [
    "a", 
    "button", 
    "input",
  ],
  {% endif %}
};

// Only run on non touch screen devices
let isTouchDevice = "ontouchstart" in document.documentElement;
if (!isTouchDevice) {
  const footer = document.querySelector("body");

  // Adding Custom Cursors to Footer
  const cursorInner = document.createElement("div");
  footer.appendChild(cursorInner);
  cursorInner.classList.add("custom-cursor-inner");
  if (
    cursorSettings.outter.type == "magnetic" ||
    cursorSettings.outter.type == "scale"
  ) {
    const cursorOutter = document.createElement("div");
    footer.appendChild(cursorOutter);
    cursorOutter.classList.add("custom-cursor-outter");
  }
  if (cursorSettings.outter.type == "magnetic") {
    const overlay = document.createElement("div");
    footer.appendChild(overlay);
    overlay.classList.add("custom-cursor-overlay");
  }

  addEventListener("mousemove", customCursor);
}

function customCursor(e) {

  let obj = e.target;
  
    e.preventDefault();
  let x = e.clientX;
  let y = e.clientY;

  let rect = obj.getBoundingClientRect();
  var docEl = document.documentElement;

  let opacity,
    borderRadius,
    btnWidth,
    btnHeight,
    btnX,
    btnY,
    cursorOverlay,
    scale,
    scaleInner,
    zIndex;
  
  if (cursorSettings.outter.type == "magnetic") {
   	 zIndex = 11; 
  } else {
     zIndex = 100000001; 
  }

  if (obj.matches(cursorSettings.selectors)) {
    if (cursorSettings.outter.type == "magnetic") {
      btnX = rect.left + (window.pageXOffset || docEl.scrollLeft || 0);
      btnY = rect.top;
      opacity = cursorSettings.outter.hoverOpacity;
      obj.style.zIndex = 12;
      obj.style.position = "relative";
      cursorOverlay = cursorSettings.overlay.opacity;
      borderRadius = cursorSettings.outter.borderRadiusHover;
      {% if design.outter_cursor.magnetic.padding %}
      	 btnWidth = obj.clientWidth;
         btnHeight = obj.clientHeight;
      {% else %}
        btnWidth = obj.clientWidth;
        btnHeight = obj.clientHeight;
      {% endif %}
      scaleInner = cursorSettings.inner.scale;
      obj.addEventListener("mouseleave", (event) => {
        obj.style.zIndex = null;
      });
    } else if (cursorSettings.outter.type == "scale") {
      btnX = x - cursorSettings.outter.width / 2;
      btnY = y - cursorSettings.outter.height / 2;
      opacity = cursorSettings.outter.hoverOpacity;
      borderRadius = cursorSettings.outter.borderRadius;
      cursorOverlay = 1;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      scale = cursorSettings.outter.scale;
      scaleInner = cursorSettings.inner.scale;
    }
  } else {
    if (cursorSettings.outter.type == "magnetic") {
      btnX = x - cursorSettings.outter.width / 2;
      btnY = y - cursorSettings.outter.height / 2;
      opacity = cursorSettings.outter.opacity;
      borderRadius = cursorSettings.outter.borderRadius;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      cursorOverlay = 0;
        scaleInner = 1;
    } else if (cursorSettings.outter.type == "scale") {
      btnX = x - cursorSettings.outter.width / 2 - 0.5;
      btnY = y - cursorSettings.outter.height / 2 - 0.5;
      opacity = cursorSettings.outter.opacity;
      borderRadius = cursorSettings.outter.borderRadius;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      cursorOverlay = 1;
      scale = 1;
      scaleInner = 1;
    }
  }

  document.querySelector(\'.custom-cursor-inner\').style.cssText = `
        position: fixed; 
        width: ${cursorSettings.inner.width}px; 
        height: ${cursorSettings.inner.height}px; 
        background-color: ${cursorSettings.inner.color};
        border-radius: 100%;
        left: ${x - cursorSettings.inner.height / 2}px; 
        top: ${y - cursorSettings.inner.height / 2}px;
        scale: ${scaleInner};
        pointer-events: none;
        transition: scale {{ design.inner_cursor.effects.transiiton_duration.style }};
        z-index: 100000002;
    `;
  
  	{% if content.outter_cursor.disable_outter_cursor %}
	{% else %}
  if (
    cursorSettings.outter.type == "magnetic" ||
    cursorSettings.outter.type == "scale"
  ) {
    document.querySelector(".custom-cursor-outter").style.cssText = `
        position: fixed;
        left: ${btnX}px; 
        top: ${btnY}px;
        background-color: ${cursorSettings.outter.color}; 
        width: ${btnWidth}px;
        height: ${btnHeight}px;
        border-radius: ${borderRadius};
        border: 1px solid ${cursorSettings.outter.borderColor};
        opacity: ${opacity}; 
        pointer-events: none;
        z-index: ${zIndex};
        scale: ${scale};
     `;
  }
  if (cursorSettings.outter.type == "magnetic") {
    overlayBG(cursorSettings.overlay.color, cursorOverlay);
  }
  {% endif %}
}
 

function overlayBG(bgColor, opacity) {
  let cusrsorOverlay = document.querySelector(".custom-cursor-overlay");
  cusrsorOverlay.style.cssText = `
       position: fixed;
       left: 0;
       top: 0;
       width: 100%;
       height: 100vh;
       background-color: ${bgColor};
       opacity: ${opacity};
       z-index: {{ design.outter_cursor.magnetic.z_index.z_index_overlay }};
       pointer-events: none;
    `;
}',
],],

'onActivatedElement' => [['script' => 'let cursorSettings = {
  inner: { 
   	{% if design.inner_cursor.color %}
		color: "{{ design.inner_cursor.color }}" , 
  	{% else %}
		color: "red" , 
	{% endif %}
	{% if design.inner_cursor.color %} 	
		width:  {{ design.inner_cursor.size }},
   	{% else %}
    	width:  12,
    {% endif %}
    {% if design.inner_cursor.size %} 	
  		height:  {{ design.inner_cursor.size }},
    {% else %}
    	height: 12,
    {% endif %}
     {% if design.inner_cursor.effects.scale_size %} 	
  		 scale: {{ design.inner_cursor.effects.scale_size }},
    {% else %}
    	scale: 1.5,
    {% endif %}
},
  outter: {
    // magnetic / scale 
    {% if content.outter_cursor.type %} 	
  		type: "{{ content.outter_cursor.type }}",
    {% else %}
    	type: "scale",
    {% endif %}
    {% if design.outter_cursor.color %} 	
    color: "{{ design.outter_cursor.color }}",
    {% else %}
    color: "red",
    {% endif %}
    {% if design.outter_cursor.size %} 	
    width: {{ design.outter_cursor.size }},
    height: {{ design.outter_cursor.size }},
    {% else %}
    width: 35,
    height: 35,
    {% endif %}
    {% if design.outter_cursor.border_color %} 	
    borderColor: "{{ design.outter_cursor.border_color }}",
    {% else %}
    borderColor: "black",
    {% endif %}
    borderRadius: "100%",
 	{% if design.outter_cursor.magnetic.border_radius.style %} 	
    borderRadiusHover: "{{ design.outter_cursor.magnetic.border_radius.style }}",
    {% else %}
     borderRadiusHover: "3px",
    {% endif %} 
    {% if design.outter_cursor.opacity %} 	
    opacity: {{ design.outter_cursor.opacity }},
    {% else %}
    opacity: 0.4,
    {% endif %}
    {% if design.outter_cursor.effects.hover_opacity %} 	
    hoverOpacity: {{ design.outter_cursor.effects.hover_opacity }},
    {% else %}
    hoverOpacity: 0.2,
    {% endif %}
    {% if design.outter_cursor.effects.scale %} 	
    scale: {{ design.outter_cursor.effects.scale }},
    {% else %}
    scale: 1.5,
    {% endif %}
  },
  overlay: { enable: true, color: "black", opacity: 0.6 },
  {% if content.options.selectors %}
     selectors: [
    {% for item in content.options.selectors %}
      "{{ item.selector_name }}",
    {% endfor %}
	  ],
  {% else %}
  selectors: [
    "a", 
    "button", 
    "input",
  ],
  {% endif %}
};

// Only run on non touch screen devices
let isTouchDevice = "ontouchstart" in document.documentElement;
if (!isTouchDevice) {
  const footer = document.querySelector("body");

  // Adding Custom Cursors to Footer
  const cursorInner = document.createElement("div");
  footer.appendChild(cursorInner);
  cursorInner.classList.add("custom-cursor-inner");
  if (
    cursorSettings.outter.type == "magnetic" ||
    cursorSettings.outter.type == "scale"
  ) {
    const cursorOutter = document.createElement("div");
    footer.appendChild(cursorOutter);
    cursorOutter.classList.add("custom-cursor-outter");
  }
  if (cursorSettings.outter.type == "magnetic") {
    const overlay = document.createElement("div");
    footer.appendChild(overlay);
    overlay.classList.add("custom-cursor-overlay");
  }

  addEventListener("mousemove", customCursor);
}

function customCursor(e) {

  let obj = e.target;
  
    e.preventDefault();
  let x = e.clientX;
  let y = e.clientY;

  let rect = obj.getBoundingClientRect();
  var docEl = document.documentElement;

  let opacity,
    borderRadius,
    btnWidth,
    btnHeight,
    btnX,
    btnY,
    cursorOverlay,
    scale,
    scaleInner,
    zIndex;
  
  if (cursorSettings.outter.type == "magnetic") {
   	 zIndex = 11; 
  } else {
     zIndex = 100000001; 
  }

  if (obj.matches(cursorSettings.selectors)) {
    if (cursorSettings.outter.type == "magnetic") {
      btnX = rect.left + (window.pageXOffset || docEl.scrollLeft || 0);
      btnY = rect.top;
      opacity = cursorSettings.outter.hoverOpacity;
      obj.style.zIndex = 12;
      obj.style.position = "relative";
      cursorOverlay = cursorSettings.overlay.opacity;
      borderRadius = cursorSettings.outter.borderRadiusHover;
      {% if design.outter_cursor.magnetic.padding %}
      	 btnWidth = obj.clientWidth;
         btnHeight = obj.clientHeight;
      {% else %}
        btnWidth = obj.clientWidth;
        btnHeight = obj.clientHeight;
      {% endif %}
      scaleInner = cursorSettings.inner.scale;
      obj.addEventListener("mouseleave", (event) => {
        obj.style.zIndex = null;
      });
    } else if (cursorSettings.outter.type == "scale") {
      btnX = x - cursorSettings.outter.width / 2;
      btnY = y - cursorSettings.outter.height / 2;
      opacity = cursorSettings.outter.hoverOpacity;
      borderRadius = cursorSettings.outter.borderRadius;
      cursorOverlay = 1;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      scale = cursorSettings.outter.scale;
      scaleInner = cursorSettings.inner.scale;
    }
  } else {
    if (cursorSettings.outter.type == "magnetic") {
      btnX = x - cursorSettings.outter.width / 2;
      btnY = y - cursorSettings.outter.height / 2;
      opacity = cursorSettings.outter.opacity;
      borderRadius = cursorSettings.outter.borderRadius;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      cursorOverlay = 0;
        scaleInner = 1;
    } else if (cursorSettings.outter.type == "scale") {
      btnX = x - cursorSettings.outter.width / 2 - 0.5;
      btnY = y - cursorSettings.outter.height / 2 - 0.5;
      opacity = cursorSettings.outter.opacity;
      borderRadius = cursorSettings.outter.borderRadius;
      btnWidth = cursorSettings.outter.width;
      btnHeight = cursorSettings.outter.height;
      cursorOverlay = 1;
      scale = 1;
      scaleInner = 1;
    }
  }

  document.querySelector(\'.custom-cursor-inner\').style.cssText = `
        position: fixed; 
        width: ${cursorSettings.inner.width}px; 
        height: ${cursorSettings.inner.height}px; 
        background-color: ${cursorSettings.inner.color};
        border-radius: 100%;
        left: ${x - cursorSettings.inner.height / 2}px; 
        top: ${y - cursorSettings.inner.height / 2}px;
        scale: ${scaleInner};
        pointer-events: none;
        transition: scale {{ design.inner_cursor.effects.transiiton_duration.style }};
        z-index: 100000002;
    `;
  
  	{% if content.outter_cursor.disable_outter_cursor %}
	{% else %}
  if (
    cursorSettings.outter.type == "magnetic" ||
    cursorSettings.outter.type == "scale"
  ) {
    document.querySelector(".custom-cursor-outter").style.cssText = `
        position: fixed;
        left: ${btnX}px; 
        top: ${btnY}px;
        background-color: ${cursorSettings.outter.color}; 
        width: ${btnWidth}px;
        height: ${btnHeight}px;
        border-radius: ${borderRadius};
        border: 1px solid ${cursorSettings.outter.borderColor};
        opacity: ${opacity}; 
        pointer-events: none;
        z-index: ${zIndex};
        scale: ${scale};
     `;
  }
  if (cursorSettings.outter.type == "magnetic") {
    overlayBG(cursorSettings.overlay.color, cursorOverlay);
  }
  {% endif %}
}
 

function overlayBG(bgColor, opacity) {
  let cusrsorOverlay = document.querySelector(".custom-cursor-overlay");
  cusrsorOverlay.style.cssText = `
       position: fixed;
       left: 0;
       top: 0;
       width: 100%;
       height: 100vh;
       background-color: ${bgColor};
       opacity: ${opacity};
       z-index: {{ design.outter_cursor.magnetic.z_index.z_index_overlay }};
       pointer-events: none;
    `;
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
        return 610;
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
        return false;
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
