<?php

function de_remove_div_with_class($html, $class) {

if (trim($html) === '') {
    // Return original HTML or a default structure if HTML is empty
    return $html;
}

// Create a new DOMDocument object and load the generated HTML
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

// Find all divs with the class 'breakdance'
$xpath = new DOMXPath($dom);
$divs = $xpath->query("//div[contains(@class, '$class')]");

foreach ($divs as $div) {
    // Move all children of the div to its parent
    while ($div->childNodes->length > 0) {
        $div->parentNode->insertBefore($div->childNodes->item(0), $div);
    }

    // Remove the div
    $div->parentNode->removeChild($div);
}

// Save the modified HTML to a variable
$html = $dom->saveHTML();

libxml_clear_errors();

return $html;
}