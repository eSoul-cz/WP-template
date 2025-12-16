<?php

namespace DestinyElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "DestinyElements\\TaxonomyLoopBuilder",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class TaxonomyLoopBuilder extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return '<svg fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="_x30_1"><path d="m24.1843262 17c.4141235 1.161499 1.5137329 2 2.8156738 2 1.6542969 0 3-1.3457031 3-3s-1.3457031-3-3-3c-1.3019409 0-2.4016113.838501-2.8157349 2h-1.1842651v-9h1.1843262c.4141235 1.161499 1.5137329 2 2.8156738 2 1.6542969 0 3-1.3457031 3-3s-1.3457031-3-3-3c-1.3019409 0-2.4016113.838501-2.8157349 2h-2.1842651c-.5522461 0-1 .4477539-1 1v10h-2v2h2v10c0 .5522461.4477539 1 1 1h2.1843262c.4141235 1.161499 1.5137329 2 2.8156738 2 1.6542969 0 3-1.3457031 3-3s-1.3457031-3-3-3c-1.3019409 0-2.4016113.838501-2.8157349 2h-1.1842651v-9z"/><path d="m10.5 15.3253174v8.6749268l6.8935547-3.0810547c.3681641-.1572266.6064453-.519043.6064453-.9189454v-8c0-.0026855-.0011597-.0050659-.0011597-.0077515z"/><path d="m10.3935547 8.0812988c-.25-.1083984-.5371094-.1083984-.7871094 0 0 0-7.0527954 3.0343628-7.0808105 3.0496826l7.4743652 3.3218995 7.4743652-3.3218994c-.0280151-.0153199-7.0808105-3.0496827-7.0808105-3.0496827z"/><path d="m2 12.0002441v8c0 .3999023.2382813.7617188.6064453.9189453l6.8935547 3.0810547v-8.6749268l-7.4988403-3.3328247c0 .0026856-.0011597.005066-.0011597.0077515z"/></g></svg>';
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
        return 'Taxonomy Loop Builder';
    }

    static function className()
    {
        return 'de-taxonomyloopbuilder';
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
        return ['content' => ['main_options' => ['select_taxonomy' => 'category', 'global_block' => null, 'single_tag' => 'div'], 'order' => ['order' => 'ASC', 'order_by' => 'name'], 'extras' => ['parent_only' => false]], 'design' => ['list' => ['layout' => 'list', 'width' => ['breakpoint_base' => ['number' => 100, 'unit' => '%', 'style' => '100%']], 'items_per_row' => null, 'space_between_items' => ['breakpoint_base' => ['number' => 24, 'unit' => 'px', 'style' => '24px']]], 'single' => ['padding' => ['padding' => null], 'background' => null, 'borders' => ['radius' => ['breakpoint_base' => null], 'border' => null]], 'container' => ['spacing' => null, 'background' => null]]];
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
      "DestinyElements\\taxonomies-list-design",
      "List",
      "list",
       ['type' => 'popout']
     ), c(
        "single",
        "Single",
        [c(
        "background",
        "Background",
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
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), c(
        "container",
        "Container",
        [getPresetSection(
      "EssentialElements\\spacing_all",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "background",
        "Background",
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
      )];
    }

    static function contentControls()
    {
        return [c(
        "main_options",
        "Main Options",
        [c(
        "select_taxonomy",
        "Select Taxonomy",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_taxonomies', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      ), c(
        "global_block",
        "Global Block",
        [],
        ['type' => 'global_block_chooser', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "single_tag",
        "Single Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'items' => [['value' => 'article', 'text' => 'article'], ['text' => 'section', 'value' => 'section'], ['text' => 'div', 'value' => 'div']]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "order",
        "Order",
        [c(
        "order",
        "Order",
        [],
        ['type' => 'button_bar', 'layout' => 'vertical', 'items' => [['value' => 'ASC', 'text' => 'Ascending'], ['text' => 'Descending', 'value' => 'DESC']]],
        false,
        false,
        [],
      ), c(
        "order_by",
        "Order By",
        [],
        ['type' => 'dropdown', 'layout' => 'vertical', 'dropdownOptions' => ['populate' => ['path' => '', 'text' => '', 'value' => '', 'fetchDataAction' => 'destiny_get_category_orderby_options', 'fetchContextPath' => '', 'refetchPaths' => []]]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "extras",
        "Extras",
        [c(
        "only_current_post_tax",
        "Only Current Post Tax",
        [],
        ['type' => 'toggle', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "hide_empty",
        "Hide Empty",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "parent_only",
        "Parent Only",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "parent_id",
        "Parent ID",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "include_taxonomies_by_id",
        "Include Taxonomies by ID",
        [],
        ['type' => 'text', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "exclude_taxonomies_by_id",
        "Exclude Taxonomies by ID",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '1,2,5'],
        false,
        false,
        [],
      ), c(
        "tax_message",
        "Tax Message",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'condition' => [[['path' => 'content.extras.exclude_taxonomies_by_id', 'operand' => 'is set', 'value' => '']]], 'alertBoxOptions' => ['style' => 'default', 'content' => '<p>For exampleI ID\'s written like this: 1, 2, 3 or 1,2,3 etc...</p>']],
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
        return ['0' =>  ['title' => 'Slider','scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/swiper@8/swiper-bundle.min.js','%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/breakdance-swiper/breakdance-swiper.js'],'styles' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/swiper@8/swiper-bundle.min.css','%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/swiper@8/breakdance-swiper-preset-defaults.css'],],'1' =>  ['title' => 'Slider - Frontend','inlineScripts' => ['window.BreakdanceSwiper().update({
  id: \'%%UNIQUESLUG%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});'],],];
    }

    static function settings()
    {
        return false;
    }

    static function addPanelRules()
    {
        return ['alwaysHide' => false];
    }

    static public function actions()
    {
        return [

'onMountedElement' => [['script' => '{% if design.list.layout == \'slider\' %}
window.BreakdanceSwiper().update({
  id: \'%%ID%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});
{% endif %}',
],['script' => 'if (!window.breakdanceFilterInstances) window.breakdanceFilterInstances = {};

{% if content.filter_bar.enable %}
  window.breakdanceFilterInstances[%%ID%%] = new BreakdanceFilter(\'%%SELECTOR%%\', {
    layout: \'{{ design.list.layout }}\',
    isVertical: {{ design.filter_bar.vertical|json_encode }},
    horizontalAt: {{ design.filter_bar.horizontal_at|json_encode }}
  });
  {% endif %}',
],],

'onPropertyChange' => [['script' => '{% if design.list.layout == \'slider\' %}
window.BreakdanceSwiper().update({
  id: \'%%ID%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});
{% else %}
window.swiperInstances && window.swiperInstances[\'%%ID%%\'] && window.BreakdanceSwiper().destroy(
  \'%%ID%%\'
);
{% endif %}','dependencies' => ['design.list'],
],['script' => 'if (window.breakdanceFilterInstances && window.breakdanceFilterInstances[%%ID%%]) {
  window.breakdanceFilterInstances[%%ID%%].update({
    layout: \'{{ design.list.layout }}\'
  });
}',
],],

'onMovedElement' => [['script' => '{% if design.list.layout == \'slider\' %}
window.BreakdanceSwiper().update({
  id: \'%%ID%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});
{% endif %}',
],['script' => 'if (window.breakdanceFilterInstances && window.breakdanceFilterInstances[%%ID%%]) {
  window.breakdanceFilterInstances[%%ID%%].update();
}',
],],

'onBeforeDeletingElement' => [['script' => '{% if design.list.layout == \'slider\' %}
window.swiperInstances && window.swiperInstances[\'%%ID%%\'] && window.BreakdanceSwiper().destroy(
  \'%%ID%%\'
);
{% endif %}',
],['script' => 'if (window.breakdanceFilterInstances && window.breakdanceFilterInstances[%%ID%%]) {
  window.breakdanceFilterInstances[%%ID%%].destroy();
  delete window.breakdanceFilterInstances[%%ID%%];
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
        return 721;
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
        return ['design.list.items_per_row', 'design.list.layout'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
