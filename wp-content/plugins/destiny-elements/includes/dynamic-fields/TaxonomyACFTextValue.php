<?php

use Breakdance\DynamicData\StringField;
use Breakdance\DynamicData\StringData;

class TaxonomyACFTextValue extends StringField
{
    /**
     * @inheritDoc
     */
    public function label()
    {
        return 'ACF Field (Text Value)';
    }

    /**
     * @inheritDoc
     */
    public function category()
    {
        return 'Taxonomy';
    }

    /**
     * @inheritDoc
     */
    public function slug()
    {
        return 'acf_text_value';
    }

    /**
     * @inheritDoc
     */
    public function controls()
    {
        return [
            \Breakdance\Elements\control('field_name', 'Field name (save & reload)', [
                'type' => 'text',
                'layout' => 'vertical',
            ]),
        ];
    }

    /**
     * @inheritDoc
     */
    public function returnTypes()
    {
        return [
            'string'
        ];
    }

    /**
     * Retrieves the text value of a specified ACF field associated with a taxonomy term.
     *
     * @param array $attributes Attributes containing the field name.
     * @return StringData A StringData object containing the text value.
     */
    public function handler($attributes): StringData
    {
        global $single_category_item;

        // Check if the necessary attributes and term object are present
        if (empty($attributes['field_name']) || !$single_category_item) {
            return StringData::emptyString();
        }

        $field_name = sanitize_text_field($attributes['field_name']);
        
        // Use ACF's get_field function to retrieve the text field value for the given term
        $text_value = '';
        if (function_exists('get_field')) {
            $text_value = get_field($field_name, 'term_' . $single_category_item->term_id);
        }

        if (!$text_value) {
            // Return an empty StringData object if no text was found
            return StringData::emptyString();
        }

        return StringData::fromString($text_value);
    }
}
