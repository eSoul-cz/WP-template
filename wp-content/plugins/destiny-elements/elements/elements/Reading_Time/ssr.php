<?php 

$de_post_id = get_the_ID();
$de_custom_tag = (string) ($propertiesData['content']['main_options']['tag'] ?? 'p');
$de_text_before = (string) ($propertiesData['content']['main_options']['text_before_minutes'] ?? '');
$de_text_after = (string) ($propertiesData['content']['main_options']['text_after_minutes'] ?? '');

$deReadingContent = get_post_field('post_content', $de_post_id);
$deReadingContent = strip_tags($deReadingContent);
$deWordsPerMinute = (int) ($propertiesData['content']['main_options']['words_per_minute'] ?? 250);
$deTextLength = str_word_count($deReadingContent);
$deResult = 0;
if ($deTextLength > 0) {
    $deResult = ceil($deTextLength / $deWordsPerMinute);
}

?>

<<?= $de_custom_tag; ?> class="de-reading-time-wrapper">
   <?= $de_text_before; ?><span class="de-reading-minutes"><?= $deResult; ?></span><?= $de_text_after; ?>
</<?= $de_custom_tag; ?>>