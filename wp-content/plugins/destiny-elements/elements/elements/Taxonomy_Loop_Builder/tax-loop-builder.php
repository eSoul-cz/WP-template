<?php

function get_single_tax_classes($layout)
{

    $itemClasses = 'de-taxonomy-item';

    if ($layout == 'slider') {
        $itemClasses .= ' swiper-slide';
    }

    return $itemClasses;
}

function output_before_the_tax_loop($layout)
{

    $wrapperClass = 'de-taxonomies';

    if ($layout == "slider") {
        $wrapperClass .= ' swiper-wrapper';
        \Breakdance\WpQueryControl\renderSwiperContainer();
    }

    echo "<div class=\"{$wrapperClass} de-taxonomies-{$layout}\">";
}

function output_after_the_tax_loop($layout, $propertiesData)
{
    echo "</div>"; // close wrapper

    if ($layout == "slider") {
        \Breakdance\WpQueryControl\closeSwiperContainer($propertiesData['design']['list']['slider'] ?? []);
    }
}
