<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\AudioPlayer",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class AudioPlayer extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M499.1 6.3c8.1 6 12.9 15.6 12.9 25.7v72V368c0 44.2-43 80-96 80s-96-35.8-96-80s43-80 96-80c11.2 0 22 1.6 32 4.6V147L192 223.8V432c0 44.2-43 80-96 80s-96-35.8-96-80s43-80 96-80c11.2 0 22 1.6 32 4.6V200 128c0-14.1 9.3-26.6 22.8-30.7l320-96c9.7-2.9 20.2-1.1 28.3 5z"/></svg>';
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
        return 'Audio Player';
    }

    static function className()
    {
        return 'de-audio-player';
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
        return ['content' => ['options' => ['player' => 'custom', 'include_counter' => true, 'data_type' => 'default'], 'audio' => ['mp3_file' => null, 'mp3_file_dynamic_meta' => null, 'acf_file_field_name' => 'audio_file', 'meta_box_file_id' => 'file'], 'playlist' => ['audio_files' => [['audio_files' => ['id' => 1882, 'filename' => 'originaldixielandjazzbandwithalbernard-stlouisblues.mp3', 'url' => 'http://localhost:10097/wp-content/uploads/2008/06/originaldixielandjazzbandwithalbernard-stlouisblues.mp3', 'alt' => '', 'caption' => 'St. Louis Blues, by Original Dixieland Jazz Band with Al Bernard (public domain)', 'mime' => 'audio/mpeg', 'type' => 'audio', 'attributes' => ['srcset' => '', 'sizes' => '']], 'song_name' => 'Song Number 1', 'audio_file' => null], ['audio_files' => ['id' => 1882, 'filename' => 'originaldixielandjazzbandwithalbernard-stlouisblues.mp3', 'url' => 'http://localhost:10097/wp-content/uploads/2008/06/originaldixielandjazzbandwithalbernard-stlouisblues.mp3', 'alt' => '', 'caption' => 'St. Louis Blues, by Original Dixieland Jazz Band with Al Bernard (public domain)', 'mime' => 'audio/mpeg', 'type' => 'audio', 'attributes' => ['srcset' => '', 'sizes' => '']], 'song_name' => 'Song Number 2', 'audio_file' => null]], 'song_name' => 'name', 'acf_repeater_field_name' => 'audio_files_repeater', 'acf_repeater_song_name_field' => 'song_name', 'acf_repeater_file_field_' => 'song_name', 'acf_repeater_file_field' => 'audio_file', 'acf_song_name' => 'title', 'meta_box_group_id' => 'audio_group', 'meta_box_file_id' => 'file', 'meta_box_song_name_id' => 'name']], 'design' => ['player' => ['size' => ['width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'height' => null, 'max_width' => ['breakpoint_base' => ['number' => 600, 'unit' => 'px', 'style' => '600px']]], 'gap' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid']]]], 'spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'right' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px']], 'breakpoint_phone_portrait' => ['left' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'right' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'top' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]], 'margin' => ['breakpoint_base' => ['top' => null]]], 'background_color' => '#FFFFFFFF'], 'play_icon' => ['icon' => ['slug' => 'icon-play.', 'name' => 'play', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>'], 'color' => '#4C00FFFF', 'size' => ['breakpoint_base' => ['number' => 30, 'unit' => 'px', 'style' => '30px']], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'topLeft' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'topRight' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottomLeft' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottomRight' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'editMode' => 'all']]]], 'play_pause_icon' => ['play_icon' => ['slug' => 'icon-play.', 'name' => 'play', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>', 'play_icon' => ['slug' => 'icon-play.', 'name' => 'play', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>'], 'color' => '#5100FFFF'], 'pause_icon' => ['slug' => 'icon-pause.', 'name' => 'pause', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z"/></svg>', 'play_icon' => ['slug' => 'icon-pause.', 'name' => 'pause', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z"/></svg>'], 'color' => '#FF0000FF', 'pause_icon' => ['slug' => 'icon-pause.', 'name' => 'pause', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z"/></svg>']], 'borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]], 'radius' => ['breakpoint_base' => null]], 'size' => ['breakpoint_base' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'spacing' => ['padding' => null]], 'volume' => ['mute_button' => ['icon' => ['slug' => 'icon-volume-medium', 'name' => 'volume medium', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-volume-medium" viewBox="0 0 32 32">
<path d="M22.485 25.985c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 4.094-4.094 4.094-10.755 0-14.849-0.586-0.586-0.586-1.536 0-2.121s1.536-0.586 2.121 0c2.55 2.55 3.954 5.94 3.954 9.546s-1.404 6.996-3.954 9.546c-0.293 0.293-0.677 0.439-1.061 0.439v0zM17.157 23.157c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 2.534-2.534 2.534-6.658 0-9.192-0.586-0.586-0.586-1.536 0-2.121s1.535-0.586 2.121 0c3.704 3.704 3.704 9.731 0 13.435-0.293 0.293-0.677 0.439-1.061 0.439z"/>
<path d="M13 30c-0.26 0-0.516-0.102-0.707-0.293l-7.707-7.707h-3.586c-0.552 0-1-0.448-1-1v-10c0-0.552 0.448-1 1-1h3.586l7.707-7.707c0.286-0.286 0.716-0.372 1.090-0.217s0.617 0.519 0.617 0.924v26c0 0.404-0.244 0.769-0.617 0.924-0.124 0.051-0.254 0.076-0.383 0.076z"/>
</svg>'], 'color' => '#5200FFFF', 'borders' => ['radius' => ['breakpoint_base' => null], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]], 'size' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'right' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]]], 'spacing' => ['margin' => ['breakpoint_base' => ['top' => null, 'left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]], 'padding' => ['breakpoint_base' => ['left' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'right' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'top' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'bottom' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]]], 'mute_unmute_icon' => ['mute_icon' => ['slug' => 'icon-volume-medium', 'name' => 'volume medium', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-volume-medium" viewBox="0 0 32 32">
<path d="M22.485 25.985c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 4.094-4.094 4.094-10.755 0-14.849-0.586-0.586-0.586-1.536 0-2.121s1.536-0.586 2.121 0c2.55 2.55 3.954 5.94 3.954 9.546s-1.404 6.996-3.954 9.546c-0.293 0.293-0.677 0.439-1.061 0.439v0zM17.157 23.157c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 2.534-2.534 2.534-6.658 0-9.192-0.586-0.586-0.586-1.536 0-2.121s1.535-0.586 2.121 0c3.704 3.704 3.704 9.731 0 13.435-0.293 0.293-0.677 0.439-1.061 0.439z"/>
<path d="M13 30c-0.26 0-0.516-0.102-0.707-0.293l-7.707-7.707h-3.586c-0.552 0-1-0.448-1-1v-10c0-0.552 0.448-1 1-1h3.586l7.707-7.707c0.286-0.286 0.716-0.372 1.090-0.217s0.617 0.519 0.617 0.924v26c0 0.404-0.244 0.769-0.617 0.924-0.124 0.051-0.254 0.076-0.383 0.076z"/>
</svg>', 'icon' => ['slug' => 'icon-volume-medium', 'name' => 'volume medium', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-volume-medium" viewBox="0 0 32 32">
<path d="M22.485 25.985c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 4.094-4.094 4.094-10.755 0-14.849-0.586-0.586-0.586-1.536 0-2.121s1.536-0.586 2.121 0c2.55 2.55 3.954 5.94 3.954 9.546s-1.404 6.996-3.954 9.546c-0.293 0.293-0.677 0.439-1.061 0.439v0zM17.157 23.157c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 2.534-2.534 2.534-6.658 0-9.192-0.586-0.586-0.586-1.536 0-2.121s1.535-0.586 2.121 0c3.704 3.704 3.704 9.731 0 13.435-0.293 0.293-0.677 0.439-1.061 0.439z"/>
<path d="M13 30c-0.26 0-0.516-0.102-0.707-0.293l-7.707-7.707h-3.586c-0.552 0-1-0.448-1-1v-10c0-0.552 0.448-1 1-1h3.586l7.707-7.707c0.286-0.286 0.716-0.372 1.090-0.217s0.617 0.519 0.617 0.924v26c0 0.404-0.244 0.769-0.617 0.924-0.124 0.051-0.254 0.076-0.383 0.076z"/>
</svg>']], 'unmute_icon' => ['icon' => ['slug' => 'icon-volume-mute.', 'name' => 'volume mute', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zM461.64 256l45.64-45.64c6.3-6.3 6.3-16.52 0-22.82l-22.82-22.82c-6.3-6.3-16.52-6.3-22.82 0L416 210.36l-45.64-45.64c-6.3-6.3-16.52-6.3-22.82 0l-22.82 22.82c-6.3 6.3-6.3 16.52 0 22.82L370.36 256l-45.63 45.63c-6.3 6.3-6.3 16.52 0 22.82l22.82 22.82c6.3 6.3 16.52 6.3 22.82 0L416 301.64l45.64 45.64c6.3 6.3 16.52 6.3 22.82 0l22.82-22.82c6.3-6.3 6.3-16.52 0-22.82L461.64 256z"/></svg>']]], 'volume_icon' => ['slug' => 'icon-volume-medium', 'name' => 'volume medium', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-volume-medium" viewBox="0 0 32 32">
<path d="M22.485 25.985c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 4.094-4.094 4.094-10.755 0-14.849-0.586-0.586-0.586-1.536 0-2.121s1.536-0.586 2.121 0c2.55 2.55 3.954 5.94 3.954 9.546s-1.404 6.996-3.954 9.546c-0.293 0.293-0.677 0.439-1.061 0.439v0zM17.157 23.157c-0.384 0-0.768-0.146-1.061-0.439-0.586-0.586-0.586-1.535 0-2.121 2.534-2.534 2.534-6.658 0-9.192-0.586-0.586-0.586-1.536 0-2.121s1.535-0.586 2.121 0c3.704 3.704 3.704 9.731 0 13.435-0.293 0.293-0.677 0.439-1.061 0.439z"/>
<path d="M13 30c-0.26 0-0.516-0.102-0.707-0.293l-7.707-7.707h-3.586c-0.552 0-1-0.448-1-1v-10c0-0.552 0.448-1 1-1h3.586l7.707-7.707c0.286-0.286 0.716-0.372 1.090-0.217s0.617 0.519 0.617 0.924v26c0 0.404-0.244 0.769-0.617 0.924-0.124 0.051-0.254 0.076-0.383 0.076z"/>
</svg>'], 'unmute_icon' => ['slug' => 'icon-volume-mute2', 'name' => 'volume mute2', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-volume-mute2" viewBox="0 0 32 32">
<path d="M30 19.348v2.652h-2.652l-3.348-3.348-3.348 3.348h-2.652v-2.652l3.348-3.348-3.348-3.348v-2.652h2.652l3.348 3.348 3.348-3.348h2.652v2.652l-3.348 3.348 3.348 3.348z"/>
<path d="M13 30c-0.26 0-0.516-0.102-0.707-0.293l-7.707-7.707h-3.586c-0.552 0-1-0.448-1-1v-10c0-0.552 0.448-1 1-1h3.586l7.707-7.707c0.286-0.286 0.716-0.372 1.090-0.217s0.617 0.519 0.617 0.924v26c0 0.404-0.244 0.769-0.617 0.924-0.124 0.051-0.254 0.076-0.383 0.076z"/>
</svg>'], 'icon_color' => 'var(--bde-brand-primary-color)', 'hide_mute_button' => false, 'range_controller' => ['hide_range_controller' => false, 'width' => ['breakpoint_base' => ['number' => 60, 'unit' => 'px', 'style' => '60px']], 'height' => null], 'icon_size' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]]], 'duration' => ['range_controller' => ['background_color' => 'var(--bde-brand-primary-color)', 'width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'hide' => false, 'hide_on_mobile' => true, 'range_thumb' => ['background_color' => '#FFFFFFFF', 'size' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'topLeft' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'topRight' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'bottomLeft' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'bottomRight' => ['number' => 50, 'unit' => '%', 'style' => '50%'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#5100FFFF', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#5100FFFF', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#5100FFFF', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#5100FFFF', 'style' => 'solid']]]], 'active_background_color' => '#5100FFFF', 'active_scale' => 1.4], 'range_progress' => ['color' => '#5200FFFF'], 'current_time_duration' => ['typography' => null, 'width' => ['number' => 45, 'unit' => 'px', 'style' => '45px'], 'hide_current_time' => false, 'hide_total_duration' => false, 'hide_seperator' => false], 'gap' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'hide_range_controller' => false, 'height' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'progress_color' => 'var(--bde-brand-primary-color)', 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'topRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomLeft' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottomRight' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'editMode' => 'all']]]], 'gap' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'range_thumb' => ['background_color' => '#FFFFFFFF', 'active_background_color' => 'var(--bde-brand-primary-color)', 'active_scale' => 1.2, 'size' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 100, 'unit' => 'px', 'style' => '100px'], 'topLeft' => ['number' => 100, 'unit' => 'px', 'style' => '100px'], 'topRight' => ['number' => 100, 'unit' => 'px', 'style' => '100px'], 'bottomLeft' => ['number' => 100, 'unit' => 'px', 'style' => '100px'], 'bottomRight' => ['number' => 100, 'unit' => 'px', 'style' => '100px'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'left' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid'], 'right' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)', 'style' => 'solid']]]], 'width' => ['number' => 25, 'unit' => 'px', 'style' => '25px'], 'height' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'active_transition' => ['number' => 250, 'unit' => 'ms', 'style' => '250ms']], 'current_time_duration' => ['hide_current_time' => false, 'hide_total_duration' => false, 'hide_seperator' => false, 'width' => ['number' => 45, 'unit' => 'px', 'style' => '45px'], 'time_width' => ['number' => 50, 'unit' => 'px', 'style' => '50px'], 'typography' => ['typography' => ['custom' => ['customTypography' => ['fontFamily' => ['breakpoint_base' => 'gfont-abhayalibre'], 'fontSize' => ['breakpoint_base' => ['number' => 19, 'unit' => 'px', 'style' => '19px']]]]]]], 'range_progress' => ['progress_color' => '#5000FFFF'], 'hide_current_time' => false, 'hide_total_time' => false, 'hide_seperator' => false, 'spacing' => ['margin' => ['breakpoint_base' => ['left' => ['number' => 15, 'unit' => 'px', 'style' => '15px']]]]], 'play_pause_button' => ['play_icon' => ['icon' => ['slug' => 'icon-play.', 'name' => 'play', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"/></svg>'], 'color' => 'var(--bde-brand-primary-color)'], 'pause_icon' => ['icon' => ['slug' => 'icon-pause.', 'name' => 'pause', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Free 5.15.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z"/></svg>'], 'color' => 'var(--bde-brand-primary-color)'], 'icon_size' => ['number' => 20, 'unit' => 'px', 'style' => '20px'], 'borders' => ['border' => ['breakpoint_base' => ['top' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'bottom' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'left' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none'], 'right' => ['width' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'style' => 'none']]]]], 'buffering' => ['color' => 'var(--bde-brand-primary-color)'], 'next_previous_button' => ['next_icon' => ['icon' => ['slug' => 'icon-next', 'name' => 'next', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-next" viewBox="0 0 32 32">
<path d="M16 0c8.837 0 16 7.163 16 16s-7.163 16-16 16-16-7.163-16-16 7.163-16 16-16zM16 29c7.18 0 13-5.82 13-13s-5.82-13-13-13-13 5.82-13 13 5.82 13 13 13z"/>
<path d="M18 16l-8-6v12z"/>
<path d="M22 10h-4v12h4v-12z"/>
</svg>']], 'previous_icon' => ['icon' => ['slug' => 'icon-previous', 'name' => 'previous', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" id="icon-previous" viewBox="0 0 32 32">
<path d="M16 0c-8.837 0-16 7.163-16 16s7.163 16 16 16 16-7.163 16-16-7.163-16-16-16zM16 29c-7.18 0-13-5.82-13-13s5.82-13 13-13 13 5.82 13 13-5.82 13-13 13z"/>
<path d="M14 16l8-6v12z"/>
<path d="M10 10h4v12h-4v-12z"/>
</svg>']], 'icon_color' => 'var(--bde-brand-primary-color)', 'icon_size' => ['number' => 18, 'unit' => 'px', 'style' => '18px']], 'playlist' => ['signgle_item' => ['active_color' => '#FFF4E0', 'spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'right' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'top' => ['number' => 7.5, 'unit' => 'px', 'style' => '7.5px'], 'bottom' => ['number' => 7.5, 'unit' => 'px', 'style' => '7.5px']]]], 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => [], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => '#FFBF9B'], 'left' => [], 'right' => []]]], 'typography' => ['color' => null, 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => null]]]]]], 'song_heading' => ['typography' => ['color' => ['breakpoint_base' => 'var(--bde-brand-primary-color)'], 'typography' => ['custom' => ['customTypography' => ['fontSize' => ['breakpoint_base' => ['number' => 20, 'unit' => 'px', 'style' => '20px']], 'fontFamily' => null, 'fontWeight' => ['breakpoint_base' => '600']]]], 'text_align' => ['breakpoint_phone_landscape' => 'center']], 'spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 10, 'unit' => 'px', 'style' => '10px'], 'top' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'bottom' => ['number' => 5, 'unit' => 'px', 'style' => '5px'], 'right' => ['number' => 10, 'unit' => 'px', 'style' => '10px']]], 'margin' => ['breakpoint_base' => ['bottom' => ['number' => 0, 'unit' => 'px', 'style' => '0px'], 'top' => ['number' => 0, 'unit' => 'px', 'style' => '0px']]]]], 'single_item' => ['active_color' => '#E0E0E0FF', 'borders' => ['radius' => ['breakpoint_base' => ['all' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'topRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomLeft' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'bottomRight' => ['number' => 15, 'unit' => 'px', 'style' => '15px'], 'editMode' => 'all']], 'border' => ['breakpoint_base' => ['top' => ['width' => null, 'color' => '', 'style' => ''], 'bottom' => ['width' => ['number' => 1, 'unit' => 'px', 'style' => '1px'], 'color' => 'var(--bde-brand-primary-color)'], 'left' => ['width' => null, 'color' => '', 'style' => ''], 'right' => ['width' => null, 'color' => '', 'style' => '']]]], 'spacing' => ['padding' => ['breakpoint_base' => ['left' => ['number' => 16, 'unit' => 'px', 'style' => '16px'], 'right' => ['number' => 16, 'unit' => 'px', 'style' => '16px'], 'top' => ['number' => 8, 'unit' => 'px', 'style' => '8px'], 'bottom' => ['number' => 8, 'unit' => 'px', 'style' => '8px']]]], 'background_color' => null, 'background_color_hover' => null]], 'download' => ['enable_download' => true, 'download_icon' => ['id' => 2796, 'slug' => 'icon-download.', 'name' => 'download', 'svgCode' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>', 'iconSetSlug' => 'FontAwesome 6 Free - Solid'], 'icon_color' => 'var(--bde-brand-primary-color)', 'icon_size' => ['number' => 20, 'unit' => 'px', 'style' => '20px']]]];
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
        "player",
        "Player",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "size",
        "Size",
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
      ), c(
        "height",
        "Height",
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
        "gap",
        "Gap",
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
        "play_pause_button",
        "Play/Pause Button",
        [c(
        "play_icon",
        "Play Icon",
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "pause_icon",
        "Pause Icon",
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
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "icon_size",
        "Icon Size",
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
        "next_previous_button",
        "Next/Previous Button",
        [c(
        "next_icon",
        "Next Icon",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "previous_icon",
        "Previous Icon",
        [c(
        "icon",
        "Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "icon_size",
        "Icon Size",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "icon_color",
        "Icon Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      )],
        ['type' => 'section', 'condition' => [[['path' => 'content.options.player', 'operand' => 'equals', 'value' => 'playlist']]]],
        false,
        false,
        [],
      ), c(
        "duration",
        "Duration",
        [c(
        "range_controller",
        "Range Controller",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "progress_color",
        "Progress Color",
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
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
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
     ), c(
        "hide_range_controller",
        "Hide Range Controller",
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
        "range_thumb",
        "Range Thumb",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "active_background_color",
        "Active Background Color",
        [],
        ['type' => 'color', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "active_scale",
        "Active Scale",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "active_transition",
        "Active Transition",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['ms'], 'defaultType' => 'ms'], 'rangeOptions' => ['min' => 0, 'max' => 1000]],
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
        "height",
        "Height",
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
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "current_time_duration",
        "Current Time/Duration",
        [getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     ), c(
        "time_width",
        "Time Width",
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
        "hide_current_time",
        "Hide Current Time",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "hide_total_time",
        "Hide Total Time",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "hide_seperator",
        "Hide Seperator",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
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
        "volume",
        "Volume",
        [c(
        "range_controller",
        "Range Controller",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "progress_color",
        "Progress Color",
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
        true,
        false,
        [],
      ), c(
        "height",
        "Height",
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
     ), c(
        "hide_range_controller",
        "Hide Range Controller",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => [[['path' => 'content.options.player', 'operand' => 'contains', 'value' => 'something']]]],
        false,
        false,
        [],
      ), c(
        "range_thumb",
        "Range Thumb",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "active_background_color",
        "Active Background Color",
        [],
        ['type' => 'color', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "active_scale",
        "Active Scale",
        [],
        ['type' => 'number', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "active_transition",
        "Active Transition",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['ms'], 'defaultType' => 'ms'], 'rangeOptions' => ['min' => 0, 'max' => 1000]],
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
        "height",
        "Height",
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
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout'], 'condition' => [[['path' => 'content.options.player', 'operand' => 'contains', 'value' => 'something']]]],
        false,
        false,
        [],
      ), c(
        "volume_icon",
        "Volume Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "unmute_icon",
        "Unmute Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "icon_color",
        "Icon Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "icon_size",
        "Icon Size",
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
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), c(
        "hide_mute_button",
        "Hide Mute Button",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "buffering",
        "Buffering",
        [c(
        "color",
        "Color",
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
      ), c(
        "playlist",
        "Playlist",
        [c(
        "song_heading",
        "Song Heading",
        [getPresetSection(
      "EssentialElements\\typography_with_effects_and_align",
      "Typography",
      "typography",
       ['type' => 'popout']
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
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "single_item",
        "Single Item",
        [c(
        "background_color",
        "Background Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "active_color",
        "Active Color",
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
     ), getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography",
      "Typography",
      "typography",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'condition' => [[['path' => 'content.options.player', 'operand' => 'equals', 'value' => 'playlist']]]],
        false,
        false,
        [],
      ), c(
        "download",
        "Download",
        [c(
        "enable_download",
        "Enable Download",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "download_icon",
        "Download Icon",
        [],
        ['type' => 'icon', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "icon_color",
        "Icon Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "icon_size",
        "Icon Size",
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
        "options",
        "Options",
        [c(
        "player",
        "Player",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [['value' => 'default', 'text' => 'Default Browser Player'], ['text' => 'Custom Player', 'value' => 'custom'], ['text' => 'Play List', 'value' => 'playlist']]],
        false,
        false,
        [],
      ), c(
        "include_counter",
        "Include Counter",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'condition' => [[['path' => 'content.options.player', 'operand' => 'equals', 'value' => 'playlist']]]],
        false,
        false,
        [],
      ), c(
        "data_type",
        "Data Type",
        [],
        ['type' => 'button_bar', 'layout' => 'inline', 'items' => [['value' => 'default', 'text' => 'Default'], ['text' => 'ACF', 'value' => 'acf'], ['text' => 'Meta Box', 'value' => 'metabox']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "audio",
        "Audio",
        [c(
        "mp3_file",
        "mp3 File",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['audio'], 'multiple' => false], 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'is none of', 'value' => ['acf', 'metabox']]]]],
        false,
        false,
        [],
      ), c(
        "acf_file_field_name",
        "ACF File Field Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_file_id",
        "Meta Box File ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.player', 'operand' => 'not equals', 'value' => 'playlist']]]],
        false,
        false,
        [],
      ), c(
        "playlist",
        "Playlist",
        [c(
        "song_name",
        "Song Name",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['text' => 'Custom Name', 'value' => 'name'], ['text' => 'File Name', 'value' => 'filename']], 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'is none of', 'value' => ['acf', 'metabox']]]]],
        false,
        false,
        [],
      ), c(
        "acf_song_name",
        "ACF Song Name",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'custom', 'text' => 'Custom'], ['text' => 'Title', 'value' => 'title'], ['text' => 'File Name', 'value' => 'name'], ['text' => 'Caption', 'value' => 'caption']], 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "audio_files",
        "Audio Files",
        [c(
        "audio_file",
        "Audio File",
        [],
        ['type' => 'wpmedia', 'layout' => 'vertical', 'mediaOptions' => ['acceptedFileTypes' => ['audio'], 'multiple' => false]],
        false,
        false,
        [],
      ), c(
        "song_name",
        "Song Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.playlist.song_name', 'operand' => 'equals', 'value' => 'name']], [['path' => 'content.playlist.song_name', 'operand' => 'is not set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical', 'repeaterOptions' => ['titleTemplate' => '{song_name}', 'defaultTitle' => '', 'buttonName' => ''], 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'is not set', 'value' => '']], [['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'default']]]],
        false,
        false,
        [],
      ), c(
        "acf_repeater_field_name",
        "ACF Repeater Field Name",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_repeater_file_field",
        "ACF Repeater File Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "acf_repeater_song_name_field",
        "ACF Repeater Song Name Field",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.playlist.acf_song_name', 'operand' => 'is none of', 'value' => ['title', 'filename', 'caption']], ['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'acf']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_group_id",
        "Meta Box Group ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_song_name_id",
        "Meta Box Song Name ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "meta_box_file_id",
        "Meta Box File ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.data_type', 'operand' => 'equals', 'value' => 'metabox']]]],
        false,
        false,
        [],
      ), c(
        "autoplay",
        "Autoplay",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'condition' => [[['path' => 'content.options.player', 'operand' => 'equals', 'value' => 'playlist']]]],
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
        return ['0' =>  ['title' => 'Player','scripts' => ['%%BREAKDANCE_REUSABLE_DESTINY_PLUGIN_URL%%elements/dependencies-files/audiplayer.min.js'],],];
    }

    static function settings()
    {
        return ['withDependenciesInHtml' => false];
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
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return false;
    }

    static function attributes()
    {
        return [['name' => 'data-autoplay', 'template' => '{% if content.playlist.autoplay and content.options.player == \'playlist\' %}
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
        return 602;
    }

    static function dynamicPropertyPaths()
    {
        return [['accepts' => 'string', 'path' => 'design.duration.range_controller.current_time_duration.width'], ['accepts' => 'string', 'path' => 'content.audio.mp3_file']];
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
        return ['design.play_icon.size', 'design.duration.range_controller.background_color', 'design.duration.range_controller.progress_color'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.options.player', 'content.audio.mp3_file', 'content.playlist.song_name', 'content.options.data_type', 'content.playlist.acf_song_name', 'content.playlist.acf_repeater_field_name', 'content.playlist.acf_repeater_file_field', 'content.playlist.acf_repeater_song_name_field', 'content.options.include_counter', 'content.audio.acf_file_field_name', 'content.audio.meta_box_file_id', 'design.download.enable_download', 'design.download.download_icon'];
    }
}
