<?php

use Breakdance\DynamicData\StringField;
use Breakdance\DynamicData\StringData;

class TaxonomyCount extends StringField
{
    /**
     * Provides a label for this custom field in the UI.
     */
    public function label()
    {
        return 'Taxonomy Post Count';
    }

    /**
     * Categorizes this custom field within a specific group in the UI.
     */
    public function category()
    {
        return 'Taxonomy';
    }

    /**
     * A unique identifier for this custom field.
     */
    public function slug()
    {
        return 'taxonomy_post_count';
    }

    /**
     * Handles the fetching and returning of the post count for a taxonomy term.
     *
     * @param array $attributes Attributes passed to the handler.
     * @return StringData The post count as a string.
     */
    public function handler($attributes): StringData
    {
        global $single_category_item;

        // Check if a specific category item is targeted; if not, fetch a random one
        if (!$single_category_item) {
            $args = array(
                'taxonomy'     => 'category',
                'orderby'      => 'rand',
                'number'       => 1, // Retrieve just one category
                'hide_empty'   => false, // Include categories without posts
            );

            $categories = get_terms($args);

            // Check if any category is found
            if (is_array($categories) && !empty($categories)) {
                $single_category_item = $categories[0];
            } else {
                // Return an empty value if no categories are found or if there was an error
                return StringData::emptyString();
            }
        }

        // Assuming $single_category_item is now set, fetch the post count
        $count = $single_category_item->count; // 'count' property contains the number of posts associated with the term

        // Return the count as a string
        return StringData::fromString((string)$count);
    }
}
