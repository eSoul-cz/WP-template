<?php 


$de_bt = (string) ($propertiesData['content']['date']['before_text'] ?? '');
$de_df = (string) ($propertiesData['content']['date']['date_format'] ?? '');
$de_cd = (string) ($propertiesData['content']['date']['custom_date_format'] ?? 'F jS, Y' );
$de_te = (bool) ($propertiesData['content']['time']['include_time'] ?? false);
$de_btt = isset($propertiesData['content']['time']['before_text']) ? $propertiesData['content']['time']['before_text'] : false;

$de_ssa = (bool) ($propertiesData['content']['delay']['show_immediately'] ?? false);
$de_dt  =  (int) ($propertiesData['content']['delay']['show_after_minutes_'] ?? 1440);

if($de_df == 'first') {
$date_format = 'F jS, Y';
} elseif($de_df == 'second') {
$date_format = 'Y-m-d';
} elseif($de_df == 'third') {
$date_format = 'm/d/y';
} elseif($de_df == 'fourth') {
    $date_format = 'd/m/y';
} elseif($de_df == 'custom') {
    $date_format = $de_cd ;
} else {
    $date_format = 'F jS, Y';
}


$de_time_format_entry = $propertiesData['content']['time']['time_format'];

if($de_time_format_entry == 'twelve') {
    $de_time_format = "g:i a";
} elseif($de_time_format_entry == 'twentyfour') {
    $de_time_format = "H:i";
} elseif($de_time_format_entry == 'custom') {
    $de_time_format = $propertiesData['content']['time']['custom'];
} else {
    $de_time_format = "g:i a";
}



$de_time = get_the_time('U'); 
$de_modified_time = get_the_modified_time('U'); 

$de_custom_time = 60 * $de_dt;

if ($de_ssa) {
    echo "<p>";
    echo "<span class='de-bt'>";
    echo $de_bt;
    echo "</span>";
    echo "<span class='de-date'>";
    the_modified_time($date_format);
    echo "</span>";
    if($de_te) {
        echo " ";
        if($de_btt){
            echo "<span class='de-bt'>";
            echo $de_btt;
            echo "</span>";
        }
        echo "<span class='de-time'>";
        the_modified_time($de_time_format);  
        echo "</span>";
    }
    echo "</p>";
} elseif ($de_modified_time >= $de_time + $de_custom_time) { 
    echo "<p>";
    echo "<span class='de-bt'>";
    echo $de_bt;
    echo "</span>";
    echo "<span class='de-date'>";
    the_modified_time($date_format);
    echo "</span>";
    if($de_te) {
        echo " ";
        if($de_btt){
            echo "<span class='de-bt'>";
            echo $de_btt;
            echo "</span>";
        }
        echo "<span class='de-time'>";
        the_modified_time($de_time_format);  
        echo "</span>";
    }
    echo "</p>";
} else {
    // do nothing
}