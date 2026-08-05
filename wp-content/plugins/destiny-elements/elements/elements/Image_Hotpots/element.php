<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\ImageHotpots",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class ImageHotpots extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg style="fill: currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M152 120c-26.51 0-48 21.49-48 48s21.49 48 48 48s48-21.49 48-48S178.5 120 152 120zM447.1 32h-384C28.65 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM463.1 409.3l-136.8-185.9C323.8 218.8 318.1 216 312 216c-6.113 0-11.82 2.768-15.21 7.379l-106.6 144.1l-37.09-46.1c-3.441-4.279-8.934-6.809-14.77-6.809c-5.842 0-11.33 2.529-14.78 6.809l-75.52 93.81c0-.0293 0 .0293 0 0L47.99 96c0-8.822 7.178-16 16-16h384c8.822 0 16 7.178 16 16V409.3z"/></svg>';
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
        return 'Image Hotspots';
    }

    static function className()
    {
        return 'de_img_hs';
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
        return ['content' => ['image' => ['image' => ['id' => 1955, 'filename' => 'kam-idris-nylcMEgK8EQ-unsplash-scaled.jpg', 'url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-scaled.jpg', 'alt' => '', 'caption' => '', 'mime' => 'image/jpeg', 'type' => 'image', 'sizes' => ['thumbnail' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-150x150.jpg', 'height' => 150, 'width' => 150, 'orientation' => 'landscape'], 'medium' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-300x273.jpg', 'height' => 273, 'width' => 300, 'orientation' => 'landscape'], 'large' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-1024x931.jpg', 'height' => 931, 'width' => 1024, 'orientation' => 'landscape'], 'medium_large' => ['height' => 698, 'width' => 768, 'url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-768x698.jpg', 'orientation' => 'landscape'], '1536x1536' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-1536x1396.jpg', 'height' => 1396, 'width' => 1536, 'orientation' => 'landscape'], '2048x2048' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-2048x1862.jpg', 'height' => 1862, 'width' => 2048, 'orientation' => 'landscape'], 'woocommerce_thumbnail' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-300x300.jpg', 'height' => 300, 'width' => 300, 'orientation' => 'landscape'], 'woocommerce_single' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-600x545.jpg', 'height' => 545, 'width' => 600, 'orientation' => 'landscape'], 'woocommerce_gallery_thumbnail' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-100x100.jpg', 'height' => 100, 'width' => 100, 'orientation' => 'landscape'], 'full' => ['url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-scaled.jpg', 'height' => 2327, 'width' => 2560, 'orientation' => 'landscape'], 'cmplz_banner_image' => ['height' => 100, 'width' => 350, 'url' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-350x100.jpg', 'orientation' => 'landscape']], 'attributes' => ['srcset' => 'https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-scaled.jpg 2560w, https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-300x273.jpg 300w, https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-1024x931.jpg 1024w, https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-768x698.jpg 768w, https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-1536x1396.jpg 1536w, https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-2048x1862.jpg 2048w, https://destiny.ie/wp-content/uploads/2023/01/kam-idris-nylcMEgK8EQ-unsplash-600x545.jpg 600w', 'sizes' => '(max-width: 2560px) 100vw, 2560px']], 'lazy_load' => true, 'image_size' => 'full'], 'image_hotspots' => ['hotspots' => ['0' => ['content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p><a target="_blank" href="https://destiny.ie/pricing/">Buy Now</a></p>', 'spot_location_x_and_y_' => ['0' => 0, '1' => 50], 'name' => 'Frame', 'spot_location' => ['0' => 0, '1' => 100], 'spot_location_x' => 12, 'spot_location_y' => 26, 'price' => '€15', 'display' => 'right', 'icon' => ['slug' => 'icon-vector-square.', 'name' => 'vector square', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M512 128V32c0-17.67-14.33-32-32-32h-96c-17.67 0-32 14.33-32 32H160c0-17.67-14.33-32-32-32H32C14.33 0 0 14.33 0 32v96c0 17.67 14.33 32 32 32v192c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32h192c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32V160c17.67 0 32-14.33 32-32zm-96-64h32v32h-32V64zM64 64h32v32H64V64zm32 384H64v-32h32v32zm352 0h-32v-32h32v32zm-32-96h-32c-17.67 0-32 14.33-32 32v32H160v-32c0-17.67-14.33-32-32-32H96V160h32c17.67 0 32-14.33 32-32V96h192v32c0 17.67 14.33 32 32 32h32v192z"/></svg>']], '1' => ['content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p><a target="_blank" href="https://destiny.ie/pricing/">Buy Now</a></p>', 'spot_location_x_and_y_' => ['0' => 0, '1' => 50], 'name' => 'Pillow', 'spot_location' => ['0' => 0, '1' => 100], 'spot_location_x' => 57, 'spot_location_y' => 60, 'price' => '€20', 'display' => 'tcenter', 'icon' => ['slug' => 'icon-circle.', 'name' => 'circle', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"/></svg>']], '2' => ['name' => 'Sofa', 'spot_location_x' => 33, 'spot_location_y' => 78, 'price' => '€200', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p><a target="_blank" href="https://destiny.ie/pricing/">Buy Now</a></p>', 'display' => 'Left', 'icon' => ['slug' => 'icon-couch.', 'name' => 'couch', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M160 224v64h320v-64c0-35.3 28.7-64 64-64h32c0-53-43-96-96-96H160c-53 0-96 43-96 96h32c35.3 0 64 28.7 64 64zm416-32h-32c-17.7 0-32 14.3-32 32v96H128v-96c0-17.7-14.3-32-32-32H64c-35.3 0-64 28.7-64 64 0 23.6 13 44 32 55.1V432c0 8.8 7.2 16 16 16h64c8.8 0 16-7.2 16-16v-16h384v16c0 8.8 7.2 16 16 16h64c8.8 0 16-7.2 16-16V311.1c19-11.1 32-31.5 32-55.1 0-35.3-28.7-64-64-64z"/></svg>']], '3' => ['name' => 'Pot', 'spot_location_x' => 74, 'spot_location_y' => 87, 'price' => '€10', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p><a target="_self" href="https://destiny.ie/pricing/">Buy Now</a></p>', 'display' => 'top', 'icon' => ['slug' => 'icon-leaf', 'name' => 'leaf', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-leaf" viewBox="0 0 32 32">
<path d="M31.604 4.203c-3.461-2.623-8.787-4.189-14.247-4.189-6.754 0-12.257 2.358-15.099 6.469-1.335 1.931-2.073 4.217-2.194 6.796-0.108 2.296 0.278 4.835 1.146 7.567 2.965-8.887 11.244-15.847 20.79-15.847 0 0-8.932 2.351-14.548 9.631-0.003 0.004-0.078 0.097-0.207 0.272-1.128 1.509-2.111 3.224-2.846 5.166-1.246 2.963-2.4 7.030-2.4 11.931h4c0 0-0.607-3.819 0.449-8.212 1.747 0.236 3.308 0.353 4.714 0.353 3.677 0 6.293-0.796 8.231-2.504 1.736-1.531 2.694-3.587 3.707-5.764 1.548-3.325 3.302-7.094 8.395-10.005 0.292-0.167 0.48-0.468 0.502-0.804s-0.126-0.659-0.394-0.862z"/>
</svg>']], '4' => ['name' => 'Table', 'spot_location_x' => 48, 'spot_location_y' => 93, 'price' => '€120', 'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p><a target="_blank" href="https://destiny.ie/pricing/">Buy Now</a></p>', 'display' => 'top', 'icon' => ['slug' => 'icon-drawer2', 'name' => 'drawer2', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-drawer2" viewBox="0 0 32 32">
<path d="M31.781 20.375l-8-10c-0.19-0.237-0.477-0.375-0.781-0.375h-14c-0.304 0-0.591 0.138-0.781 0.375l-8 10c-0.142 0.177-0.219 0.398-0.219 0.625v9c0 1.105 0.895 2 2 2h28c1.105 0 2-0.895 2-2v-9c0-0.227-0.077-0.447-0.219-0.625zM30 22h-7l-4 4h-6l-4-4h-7v-0.649l7.481-9.351h13.039l7.481 9.351v0.649z"/>
</svg>']]], 'display_type' => 'value', 'display' => 'value'], 'image_hotspots_options' => ['disable_tooltip' => false, 'enable_open_on_hover' => false, 'disable_close_button' => false, 'hide_after_hover' => false, 'enable_secondary_style' => false], 'image_hotspots_secondary' => ['hotspots' => ['0' => ['name' => 'Info', 'spot_location_x' => 68, 'spot_location_y' => 17, 'icon' => ['slug' => 'icon-info-circle.', 'name' => 'info circle', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/></svg>'], 'display' => 'tcenter', 'content' => '<p>Some Info Hero</p>']], 'display' => 'icon']], 'design' => ['image' => ['width' => ['breakpoint_tablet_portrait' => ['number' => 100, 'unit' => '%', 'style' => '100%'], 'breakpoint_base' => ['number' => null, 'unit' => '%', 'style' => null]]], 'hotspots' => ['size' => ['width' => ['number' => 45, 'unit' => 'px', 'style' => '45px'], 'height' => ['number' => 45, 'unit' => 'px', 'style' => '45px'], 'scale' => ['breakpoint_base' => 1, 'breakpoint_tablet_portrait' => 0.8]], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'topLeft' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'topRight' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'bottomLeft' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'bottomRight' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#FF0000FF', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#FF0000FF', 'style' => 'solid'], 'left' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#FF0000FF', 'style' => 'solid'], 'right' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#FF0000FF', 'style' => 'solid']]]], 'background_color' => '#FFFFFFFF', 'effects' => ['animation' => 'pulse', 'active_rotate' => null, 'animation_duration' => ['number' => 2000, 'unit' => 'ms', 'style' => '2000ms'], 'pulse' => ['duration' => ['number' => 2000, 'unit' => 'ms', 'style' => '2000ms']]], 'icon' => ['color' => '#5100FFFF', 'size' => ['breakpoint_base' => ['number' => 14, 'unit' => 'px', 'style' => '14px']]], 'spacing' => ['margin' => ['breakpoint_base' => ['top' => null, 'bottom' => null, 'right' => null, 'left' => null]], 'padding' => ['breakpoint_base' => ['top' => null]]]], 'hotspot_content' => ['background_ccolor' => '#FFFFFFFF', 'background_color' => '#FFFFFFFF', 'spacing' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'left' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'margin' => ['breakpoint_base' => ['right' => null]]], 'padding' => ['padding' => ['breakpoint_base' => ['top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'right' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'left' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]], 'width' => ['breakpoint_base' => ['number' => 250, 'unit' => 'px', 'style' => '250px']], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'editMode' => 'all']], 'shadow' => null, 'border' => null], 'gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'typography' => ['text' => ['color' => ['breakpoint_base' => '#000000FF']], 'links' => ['color' => ['breakpoint_base' => '#4F00FFFF'], 'typography' => ['custom' => ['customTypography' => ['advanced' => ['decoration' => ['line' => ['breakpoint_base' => ['0' => 'none']]], 'letterSpacing' => ['breakpoint_base' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'wordSpacing' => ['breakpoint_base' => null], 'lineHeight' => ['breakpoint_base' => ['number' => '3', 'unit' => 'custom', 'style' => '3']]], 'fontWeight' => ['breakpoint_base' => '500']]]]]], 'min_width' => ['breakpoint_phone_portrait' => null], 'max_width' => ['number' => 200, 'unit' => 'px', 'style' => '200px']], 'hotspots_secondary' => ['size' => ['width' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'height' => ['number' => 35, 'unit' => 'px', 'style' => '35px'], 'scale' => ['breakpoint_base' => null]], 'effects' => ['animation' => 'pulse', 'pulse' => ['shadow_color_' => '#7743E7FF', 'duration' => ['number' => 1200, 'unit' => 'ms', 'style' => '1200ms']]], 'background_color' => '#FFFFFFFF', 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontSize' => null]]]], 'icon' => ['size' => ['breakpoint_base' => ['number' => 25, 'unit' => 'px', 'style' => '25px']], 'color' => '#491D9CFF'], 'borders' => ['radius' => ['breakpoint_base' => null], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#5400FFFF'], 'bottom' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#5400FFFF'], 'left' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#5400FFFF'], 'right' => ['width' => ['number' => 2, 'unit' => 'px', 'style' => '2px'], 'color' => '#5400FFFF']]]]], 'hotspot_content_secondary' => ['gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'width' => ['breakpoint_base' => ['number' => 250, 'unit' => 'px', 'style' => '250px']], 'min_width' => ['breakpoint_base' => null], 'background_color' => '#5000FFFF', 'typography' => ['heading' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'text' => ['color' => ['breakpoint_base' => '#FFFFFFFF']], 'close_button' => ['color' => ['breakpoint_base' => '#FFFFFFFF']]]]]];
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
        "image",
        "Image",
        [c(
        "width",
        "Width",
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
        "hotspots",
        "Hotspots",
        [c(
        "size",
        "Size",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px']]],
        false,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px']]],
        false,
        false,
        [],
      ), c(
        "scale",
        "Scale",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['step' => 2]],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['condition' => ['0' => ['0' => ['path' => 'content.image_hotspots.display', 'operand' => 'equals', 'value' => 'name']], '1' => ['0' => ['path' => 'content.image_hotspots.display', 'operand' => 'equals', 'value' => 'value']]], 'type' => 'popout']
     ), c(
        "icon",
        "Icon",
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
        ['type' => 'section', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots.display', 'operand' => 'equals', 'value' => 'icon']]], 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "effects",
        "Effects",
        [c(
        "animation",
        "Animation",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'pulse', 'text' => 'Pulse']]],
        false,
        false,
        [],
      ), c(
        "pulse",
        "Pulse",
        [c(
        "shadow_color",
        "Shadow Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'vertical', 'unitOptions' => ['types' => ['0' => 'ms']], 'rangeOptions' => ['min' => 0, 'max' => 10000]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'design.hotspots.effects.animation', 'operand' => 'equals', 'value' => 'pulse']]]],
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
        "hotspots_secondary",
        "Hotspots Secondary",
        [c(
        "size",
        "Size",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px']]],
        false,
        false,
        [],
      ), c(
        "height",
        "Height",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px']]],
        false,
        false,
        [],
      ), c(
        "scale",
        "Scale",
        [],
        ['type' => 'number', 'layout' => 'inline', 'rangeOptions' => ['step' => 2]],
        true,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['condition' => ['0' => ['0' => ['path' => 'content.image_hotspots.display', 'operand' => 'equals', 'value' => 'name']], '1' => ['0' => ['path' => 'content.image_hotspots.display', 'operand' => 'equals', 'value' => 'value']]], 'type' => 'popout']
     ), c(
        "icon",
        "Icon",
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
        ['type' => 'section', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots_secondary.display', 'operand' => 'equals', 'value' => 'icon']]], 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "effects",
        "Effects",
        [c(
        "animation",
        "Animation",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => ['0' => ['value' => 'pulse', 'text' => 'Pulse']]],
        false,
        false,
        [],
      ), c(
        "pulse",
        "Pulse",
        [c(
        "shadow_color_",
        "Shadow Color ",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [],
        ['type' => 'unit', 'layout' => 'vertical', 'unitOptions' => ['types' => ['0' => 'ms']], 'rangeOptions' => ['min' => 0, 'max' => 10000]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => ['0' => ['0' => ['path' => 'design.hotspots.effects.animation', 'operand' => 'equals', 'value' => 'pulse']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots_options.enable_secondary_style', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "hotspot_content",
        "Hotspot Content",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'px']]],
        false,
        false,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "min_width",
        "Min Width",
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
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), c(
        "typography",
        "Typography",
        [getPresetSection(
      "EssentialElements\\typography",
      "Heading",
      "heading",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Text",
      "text",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Links",
      "links",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Close Button",
      "close_button",
       ['type' => 'popout']
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
        "hotspot_content_secondary",
        "Hotspot Content Secondary",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "gap",
        "Gap",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "min_width",
        "Min Width",
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
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     ), c(
        "typography",
        "Typography",
        [getPresetSection(
      "EssentialElements\\typography",
      "Heading",
      "heading",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Text",
      "text",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Links",
      "links",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Close Button",
      "close_button",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots_options.enable_secondary_style', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )];
    }

    static function contentControls()
    {
        return [c(
        "image",
        "Image",
        [c(
        "image",
        "Image",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['0' => 'image'], 'multiple' => false]],
        false,
        false,
        [],
      ), c(
        "image_size",
        "Image Size",
        [],
        ['type' => 'media_size_dropdown', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "image_hotspots",
        "Image Hotspots",
        [c(
        "display",
        "Display",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Name', 'value' => 'name'], '1' => ['value' => 'value', 'text' => 'Number'], '2' => ['text' => 'Icon', 'value' => 'icon'], '3' => ['text' => 'None', 'value' => 'none']]],
        false,
        false,
        [],
      ), c(
        "hotspots",
        "Hotspots",
        [c(
        "name",
        "Name",
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
      ), c(
        "link",
        "Link",
        [],
        ['type' => 'link', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "link_label",
        "Link Label",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "spot_location_x",
        "Spot Location X",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100]],
        false,
        false,
        [],
      ), c(
        "spot_location_y",
        "Spot Location Y",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100]],
        false,
        false,
        [],
      ), c(
        "display",
        "Display",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'Left', 'text' => 'Left'], '1' => ['text' => 'Right', 'value' => 'right'], '2' => ['text' => 'Top', 'value' => 'top'], '3' => ['text' => 'Bottom', 'value' => 'bottom'], '4' => ['text' => 'Top Center', 'value' => 'tcenter'], '5' => ['text' => 'Bottom Center', 'value' => 'bcenter']]],
        false,
        false,
        [],
      ), c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots.display', 'operand' => 'equals', 'value' => 'icon']]]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{name}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "image_hotspots_secondary",
        "Image Hotspots Secondary",
        [c(
        "display",
        "Display",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => ['0' => ['text' => 'Name', 'value' => 'name'], '1' => ['value' => 'value', 'text' => 'Number'], '2' => ['text' => 'Icon', 'value' => 'icon'], '3' => ['text' => 'None', 'value' => 'none']]],
        false,
        false,
        [],
      ), c(
        "hotspots",
        "Hotspots",
        [c(
        "name",
        "Name",
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
      ), c(
        "spot_location_x",
        "Spot Location X",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100]],
        false,
        false,
        [],
      ), c(
        "spot_location_y",
        "Spot Location Y",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'rangeOptions' => ['min' => 0, 'max' => 100]],
        false,
        false,
        [],
      ), c(
        "display",
        "Display",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => ['0' => ['value' => 'Left', 'text' => 'Left'], '1' => ['text' => 'Right', 'value' => 'right'], '2' => ['text' => 'Top', 'value' => 'top'], '3' => ['text' => 'Bottom', 'value' => 'bottom'], '4' => ['text' => 'Top Center', 'value' => 'tcenter'], '5' => ['text' => 'Bottom Center', 'value' => 'bcenter']]],
        false,
        false,
        [],
      ), c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots.display', 'operand' => 'equals', 'value' => 'icon']]]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{name}', 'defaultTitle' => '', 'buttonName' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots_options.enable_secondary_style', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "image_hotspots_options",
        "Image Hotspots Options",
        [c(
        "disable_tooltip",
        "Disable Tooltip",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "enable_open_on_hover",
        "Enable Open On Hover",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "hide_after_hover",
        "Hide After Hover",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => ['0' => ['0' => ['path' => 'content.image_hotspots_options.enable_open_on_hover', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      ), c(
        "disable_close_button",
        "Disable Close Button",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "enable_secondary_style",
        "Enable Secondary Style",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        return ['0' =>  ['title' => 'ImgHotspots','inlineScripts' => ['const deImgHSBtns = document.querySelectorAll(\'.de-hotspot\');
const deHsClose = document.querySelectorAll(\'.de-hs-close\');

deImgHSBtns.forEach((btn) => {
	
  btn.addEventListener(\'mouseenter\', function() {

      let hover = btn.getAttribute(\'data-hover\');
      let hoverHide = btn.getAttribute(\'data-hover-hide\');

      if (hover === "true") {
          deImgHSBtns.forEach((btn) => {
            btn.nextElementSibling.classList.remove(\'show\');
            btn.parentElement.style.zIndex = 0;
          });
          this.nextElementSibling.classList.add(\'show\');
          this.parentElement.style.zIndex = 1;

          if(
            window.innerWidth < this.nextElementSibling.getBoundingClientRect().left
            +  this.nextElementSibling.getBoundingClientRect().width ) {
            this.nextElementSibling.style.translate = \'-\' + ((this.nextElementSibling.getBoundingClientRect().left
            +  this.nextElementSibling.getBoundingClientRect().width) - window.innerWidth) + \'px\';
          }
          if(this.nextElementSibling.getBoundingClientRect().x < 0){
            this.nextElementSibling.style.translate = Math.abs(this.nextElementSibling.getBoundingClientRect().x.toFixed(2)) + \'px\';
          }
		 
      }

      if (hoverHide === "true" && hover === "true") {
          btn.addEventListener(\'mouseleave\', function() {
            this.nextElementSibling.classList.remove(\'show\');
            this.parentElement.style.zIndex = 0;
          });
      } else if (hover === "true") {
		  btn.addEventListener(\'mouseleave\', function() {
            this.nextElementSibling.classList.add(\'show\');
            this.parentElement.style.zIndex = 1;
          });
      }

  });
  
  btn.addEventListener(\'click\', deShowHotspots);

});

addEventListener(\'click\', function(el) {
  obj = el.target;
  if (obj.classList.contains(\'de-hs-close\')) {
     obj.parentElement.classList.remove(\'show\');
  }
});

addEventListener(\'keydown\', function(el) {
  obj = el.target;
  if(el.key == \'Escape\') {
    document.querySelectorAll(\'.de-hotspot-content\').forEach(content => {
      content.classList.remove(\'show\');
    })
  };
  
  if(el.key == \'Enter\' || el.key == \' \') {
     if (obj.classList.contains(\'de-hs-close\')) {
     	obj.parentElement.classList.remove(\'show\');
     }
    
  }
});

function deShowHotspots(el) {
      deImgHSBtns.forEach((btn) => {
        btn.nextElementSibling.classList.remove(\'show\');
        btn.parentElement.style.zIndex = 1;
      });
      this.nextElementSibling.classList.add(\'show\');
      this.parentElement.style.zIndex = 2;

      if(
        window.innerWidth < this.nextElementSibling.getBoundingClientRect().left
        +  this.nextElementSibling.getBoundingClientRect().width ) {
        this.nextElementSibling.style.translate = \'-\' + ((this.nextElementSibling.getBoundingClientRect().left
        +  this.nextElementSibling.getBoundingClientRect().width) - window.innerWidth) + \'px\';
      }
      if(this.nextElementSibling.getBoundingClientRect().x < 0){
        this.nextElementSibling.style.translate = Math.abs(this.nextElementSibling.getBoundingClientRect().x.toFixed(2)) + \'px\';
      }
}'],'builderCondition' => '{% if content.image_hotspots_options.disable_tooltip %}
	return false;
{% else %}
	return true;
{% endif %}','frontendCondition' => '{% if content.image_hotspots_options.disable_tooltip %}
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

'onMountedElement' => [['script' => 'const deImgHSBtns = document.querySelectorAll(\'.de-hotspot\');
const deHsClose = document.querySelectorAll(\'.de-hs-close\');

deImgHSBtns.forEach((btn) => {
	
  btn.addEventListener(\'mouseenter\', function() {

      let hover = btn.getAttribute(\'data-hover\');
      let hoverHide = btn.getAttribute(\'data-hover-hide\');

      if (hover === "true") {
          deImgHSBtns.forEach((btn) => {
            btn.nextElementSibling.classList.remove(\'show\');
            btn.parentElement.style.zIndex = 0;
          });
          this.nextElementSibling.classList.add(\'show\');
          this.parentElement.style.zIndex = 1;

          if(
            window.innerWidth < this.nextElementSibling.getBoundingClientRect().left
            +  this.nextElementSibling.getBoundingClientRect().width ) {
            this.nextElementSibling.style.translate = \'-\' + ((this.nextElementSibling.getBoundingClientRect().left
            +  this.nextElementSibling.getBoundingClientRect().width) - window.innerWidth) + \'px\';
          }
          if(this.nextElementSibling.getBoundingClientRect().x < 0){
            this.nextElementSibling.style.translate = Math.abs(this.nextElementSibling.getBoundingClientRect().x.toFixed(2)) + \'px\';
          }
		 
      } else {
          btn.addEventListener(\'click\', deShowHotspots);
      }

      if (hoverHide === "true" && hover === "true") {
          btn.addEventListener(\'mouseleave\', function() {
            this.nextElementSibling.classList.remove(\'show\');
            this.parentElement.style.zIndex = 0;
          });
      } else if (hover === "true") {
		  btn.addEventListener(\'mouseleave\', function() {
            this.nextElementSibling.classList.add(\'show\');
            this.parentElement.style.zIndex = 1;
          });
      }

  });

});

addEventListener(\'click\', function(el) {
  obj = el.target;
  if (obj.classList.contains(\'de-hs-close\')) {
     obj.parentElement.classList.remove(\'show\');
  }
});

function deShowHotspots(el) {
	deImgHSBtns.forEach((btn) => {
      btn.nextElementSibling.classList.remove(\'show\');
      btn.parentElement.style.zIndex = 0;
    });
    this.nextElementSibling.classList.add(\'show\');
    this.parentElement.style.zIndex = 1;

    if(
      window.innerWidth < this.nextElementSibling.getBoundingClientRect().left
      +  this.nextElementSibling.getBoundingClientRect().width ) {
      this.nextElementSibling.style.translate = \'-\' + ((this.nextElementSibling.getBoundingClientRect().left
      +  this.nextElementSibling.getBoundingClientRect().width) - window.innerWidth) + \'px\';
    }
 	if(this.nextElementSibling.getBoundingClientRect().x < 0){
      this.nextElementSibling.style.translate = Math.abs(this.nextElementSibling.getBoundingClientRect().x.toFixed(2)) + \'px\';
    }
}',
],],

'onPropertyChange' => [['script' => 'const deImgHSBtns = document.querySelectorAll(\'.de-hotspot\');
const deHsClose = document.querySelectorAll(\'.de-hs-close\');

deImgHSBtns.forEach((btn) => {
	
  btn.addEventListener(\'mouseenter\', function() {

      let hover = btn.getAttribute(\'data-hover\');
      let hoverHide = btn.getAttribute(\'data-hover-hide\');

      if (hover === "true") {
          deImgHSBtns.forEach((btn) => {
            btn.nextElementSibling.classList.remove(\'show\');
            btn.parentElement.style.zIndex = 0;
          });
          this.nextElementSibling.classList.add(\'show\');
          this.parentElement.style.zIndex = 1;

          if(
            window.innerWidth < this.nextElementSibling.getBoundingClientRect().left
            +  this.nextElementSibling.getBoundingClientRect().width ) {
            this.nextElementSibling.style.translate = \'-\' + ((this.nextElementSibling.getBoundingClientRect().left
            +  this.nextElementSibling.getBoundingClientRect().width) - window.innerWidth) + \'px\';
          }
          if(this.nextElementSibling.getBoundingClientRect().x < 0){
            this.nextElementSibling.style.translate = Math.abs(this.nextElementSibling.getBoundingClientRect().x.toFixed(2)) + \'px\';
          }
		 
      } else {
          btn.addEventListener(\'click\', deShowHotspots);
      }

      if (hoverHide === "true" && hover === "true") {
          btn.addEventListener(\'mouseleave\', function() {
            this.nextElementSibling.classList.remove(\'show\');
            this.parentElement.style.zIndex = 0;
          });
      } else if (hover === "true") {
		  btn.addEventListener(\'mouseleave\', function() {
            this.nextElementSibling.classList.add(\'show\');
            this.parentElement.style.zIndex = 1;
          });
      }

  });

});

addEventListener(\'click\', function(el) {
  obj = el.target;
  if (obj.classList.contains(\'de-hs-close\')) {
     obj.parentElement.classList.remove(\'show\');
  }
});

function deShowHotspots(el) {
	deImgHSBtns.forEach((btn) => {
      btn.nextElementSibling.classList.remove(\'show\');
      btn.parentElement.style.zIndex = 0;
    });
    this.nextElementSibling.classList.add(\'show\');
    this.parentElement.style.zIndex = 1;

    if(
      window.innerWidth < this.nextElementSibling.getBoundingClientRect().left
      +  this.nextElementSibling.getBoundingClientRect().width ) {
      this.nextElementSibling.style.translate = \'-\' + ((this.nextElementSibling.getBoundingClientRect().left
      +  this.nextElementSibling.getBoundingClientRect().width) - window.innerWidth) + \'px\';
    }
 	if(this.nextElementSibling.getBoundingClientRect().x < 0){
      this.nextElementSibling.style.translate = Math.abs(this.nextElementSibling.getBoundingClientRect().x.toFixed(2)) + \'px\';
    }
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
        return 605;
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
        return false;
    }
}
