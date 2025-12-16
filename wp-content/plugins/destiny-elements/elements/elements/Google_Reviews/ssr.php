<?php
$de_reviews_google_schema = (bool) ($propertiesData["content"]["options"]["add_google_schema"] ?? false);
$de_reviews_layout = (string) ($propertiesData["design"]["layout"]["layout_type"] ?? 'badge');

$de_reviews_title = (string) ($propertiesData["content"]["options"]["custom_rating_title"] ?? 'Google Rating');
$de_reviews_logo = (string) ($propertiesData["design"]["google_logo"]["google_logo"] ?? '');

$de_reviews_logo_disable = (bool) ($propertiesData["design"]["google_logo"]["disable"] ?? false);
$de_reviews_rating_disable = (bool) ($propertiesData["design"]["rating_number"]["disable"] ?? false);
$de_reviews_rating__title_disable = (bool) ($propertiesData["design"]["rating_title"]["disable"] ?? false);
$de_place_id = (string) ($propertiesData["content"]["options"]["google_places_id"] ?? '');

$de_reviews_api_disable = (bool) ($propertiesData["content"]["options"]["use_without_api"] ?? false);
$de_reviews_custom_rating = (int) ($propertiesData["content"]["options"]["custom_rating"] ?? 5);
$de_reviews_count = (int) ($propertiesData["content"]["options"]["reviews_count"] ?? 1);
$de_reviews_custom_reviews_link = (string) ($propertiesData["content"]["options"]["google_reviews_link"] ?? '/');
// Grid Testimonial
$de_reviews_date_disable = (bool) ($propertiesData["design"]["date_posted"]["disable"] ?? false);
$de_reviews_min_rating = (string) ($propertiesData["content"]["grid_review"]["minimum_rating"] ?? '3');
$de_reviews_reviews_to_show = (string) ($propertiesData["content"]["grid_review"]["max_reviews_to_show"] ?? '5');
$de_reviews_date_format = (string) ($propertiesData["design"]["date_posted"]["date_format"] ?? 'first');
$de_reviews_date_format_custom = isset($propertiesData["design"]["date_posted"]["custom_date_format"]) ? $propertiesData["design"]["date_posted"]["custom_date_format"] : false;
$de_reviews_author_photo_disable = (bool) ($propertiesData["design"]["author_photo"]["disable"] ?? false);
$de_reviews_empty_disable = (bool) ($propertiesData["content"]["grid_review"]["disable_empty_reviews"] ?? false);


if ($de_reviews_logo == "small") {
    $de_reviews_logo =
        DESTINY_ELEMENTS_PLUGIN_URL .
        "includes/assets/media/google-g-logo.png";
} elseif ($de_reviews_logo == "full") {
    $de_reviews_logo =
        DESTINY_ELEMENTS_PLUGIN_URL .
        "includes/assets/media/google-full-logo.png";
} else {
    $de_reviews_logo =
        DESTINY_ELEMENTS_PLUGIN_URL .
        "includes/assets/media/google-g-logo.png";
}

if (!$de_reviews_api_disable || $de_reviews_layout == "grid") {

    // if the options don't exists
    if (!get_option("destiny_places_store_result")) {
        de_get_places_api_date($de_place_id);
    } elseif ($de_place_id != get_option("destiny_places_store_id")) {
        de_get_places_api_date($de_place_id);
    } elseif (get_option("destiny_places_date_updated") < time() - get_option('destiny_places_api_required_date_updated')) {
        de_get_places_api_date($de_place_id);
    } else {
        // nothing
    }

    $data_result = get_option("destiny_places_store_result");
    $rating = isset($data_result->rating) ? $data_result->rating : '5';
} else {
    $rating = $de_reviews_custom_rating;
}

if ($de_reviews_layout == "badge") { ?>
            <?php if (!$de_reviews_logo_disable) { ?>
            <img class="de-google-reviews__google-logo" src="<?= $de_reviews_logo ?>" alt="google logo">
            <?php } ?>
            <div class='de-google-reviews__rating-wrapper' <?= $de_reviews_google_schema ? ' itemscope itemtype="https://schema.org/AggregateRating"' : '' ?>>

                <?php if (!$de_reviews_rating__title_disable) { ?>
                <div class='de-google-reviews__title' <?= $de_reviews_google_schema ? ' itemprop="headline"' : '' ?>>
                <?= $de_reviews_title ?></div>
                <?php } ?>
                <div class="de-stars-wrapper" <?= $de_reviews_google_schema ? ' itemprop="reviewRating"' : '' ?>>

                    <?php if (!$de_reviews_rating_disable) { ?>
                       <span class='de-google-reviews__rating' <?= $de_reviews_google_schema ? ' itemprop="ratingValue"' : '' ?>>
                            <?= $rating ?>
                        </span>
                        <div style="display: none"> <?= $de_reviews_google_schema ? '<span itemprop="ratingCount">' . $de_reviews_count . '</span> reviews' : $de_reviews_count . ' reviews' ?></div>
                    <?php }?>

                    <div class="de-stars" style="--rating: <?= $rating ?>;" aria-label="Rating of this company is <?= $rating ?> <?= $rating ?> out of 5."
                    <?= $de_reviews_google_schema ? ' itemprop="description"' : '' ?>></div>

                </div>
            </div>

            <?php }

if ($de_reviews_layout == "grid") {
    if(!get_option("destiny_places_api")){
        echo '<p style="background:grey;padding: 15px; color: white">Google Places API is missing</p>';
    }

    $i = 0;

    if (!is_object($data_result) || !isset($data_result->reviews)) {
        echo 'Error: Invalid data result or reviews not found!';
    }

    foreach ($data_result->reviews as $result) {
        $author_name = $result->author_name;
        $result_time = $result->time;
        $review_text = $result->text;
        $result_time_desctiption = $result->relative_time_description;
        $photo_url = $result->profile_photo_url;
        $result_rating = $result->rating;
        $url = $result->author_url;


        if ($de_reviews_date_format == "first") {
            $result_format = "F jS, Y";
        } elseif ($de_reviews_date_format == "second") {
            $result_format = "Y-m-d";
        } elseif ($de_reviews_date_format == "third") {
            $result_format = "m/d/y";
        } elseif ($de_reviews_date_format == "fourth") {
            $result_format = "d/m/y";
        } elseif ($de_reviews_date_format == "custom") {
            $result_format = $de_reviews_date_format_custom;
        } else {
            $result_format = "F jS, Y";
        }

        if ($result_rating >= $de_reviews_min_rating) {
                $i++;
                if ($i <= $de_reviews_reviews_to_show) { ?> 
                    <div class="de-google-reviews__grid" >
                        <?php if (!$de_reviews_logo_disable) { ?>
                        <img class="de-google-reviews-grid__google-logo" src="<?= $de_reviews_logo ?>" alt="google logo">
                        <?php } ?>
                        <div class="de-google-reviews__top-section"
                        <?= $de_reviews_google_schema ? ' itemscope itemtype="https://schema.org/Review"' : '' ?>>
                            <?php if (
                                !$de_reviews_author_photo_disable
                            ) { ?>
                            <img class="de-google-reviews__author-photo" src ="<?= $photo_url ?>" alt="<?= $author_name ?>"
                            <?= $de_reviews_google_schema ? ' itemprop="image"' : '' ?>>
                            <?php } ?>
                            <div class="de-google-reviews__top-section_author"
                            <?= $de_reviews_google_schema ? ' itemprop="author" itemscope itemtype="https://schema.org/Person"' : '' ?>>
                                <p class="de-google-reviews__author-name"
                                <?= $de_reviews_google_schema ? ' itemprop="name"' : '' ?>><?= $author_name ?></p>
                                <?php if (!$de_reviews_date_disable) { ?>
                                <p class="de-google-reviews__date-posted"
                                <?= $de_reviews_google_schema ? ' itemprop="datePublished"' : '' ?>>
                                <?= date(
                                    $result_format,
                                    $result_time
                                ) ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="de-stars-wrapper"
                        <?= $de_reviews_google_schema ? ' itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating"' : '' ?>>
                                <?php if (!$de_reviews_rating_disable) { ?>
                                <span class='de-google-reviews__rating'
                                <?= $de_reviews_google_schema ? ' itemprop="ratingValue"' : '' ?>>
                               <?= $result_rating ?></span>
                                <?php } ?>
                                <div class="de-stars" style="--rating: <?= $result_rating ?>;" aria-label="<?= $author_name ?> has rated <?= $result_rating ?> out of 5."
                                <?= $de_reviews_google_schema ? ' itemprop="description"' : '' ?>></div>
                        </div>
                        <p class="de-testimonail"
                        <?= $de_reviews_google_schema ? ' itemprop="reviewBody"' : '' ?>>
                            <?= $review_text ?>
                        </p>
                    </div>                    
                    <?php }
        }
    }
}


