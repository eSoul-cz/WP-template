<?php

use Breakdance\DynamicData\ImageData;
use \Breakdance\DynamicData\ImageField;

class TaxonomyACFImageUrl extends ImageField
{

    /**
     * @inheritDoc
     */
    public function label()
    {
        return 'ACF Field (Image URL)';
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
        return 'acf_image_url';
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
            'image_url'
        ];
    }
    /**
     * Retrieves an image associated with a taxonomy term using ACF.
     *
     * @param array $attributes Attributes containing the field name.
     * @return ImageData An ImageData object containing the image URL or an empty image.
     */
    public function handler($attributes): ImageData {
        global $single_category_item;

        // Check if the necessary attributes and term object are present
        if (empty($attributes['field_name']) || !$single_category_item) {
            return ImageData::emptyImage();
        }

        $field_name = sanitize_text_field($attributes['field_name']);
        
        // Use ACF's get_field function to retrieve the image field value for the given term
        if (function_exists('get_field')) {
            $image = get_field($field_name, 'term_' . $single_category_item->term_id);
        }

        // Check if an image was found
        if ($image) {
            // ACF allows specifying return formats, ensure your ACF field is set to return an ID or URL
            if (is_array($image) && isset($image['id'])) {
                // If the field is set to return an array, get the URL by the ID
                $image_url = wp_get_attachment_url($image['id']);
            } elseif (is_numeric($image)) {
                // If the field is set to return an ID directly
                $image_url = wp_get_attachment_url($image);
            } else {
                // Assume the field returns an URL directly
                $image_url = $image;
            }

            if ($image_url) {
                return ImageData::fromUrl($image_url);
            }
        }

        // Return an empty image object if no image was found
        return ImageData::emptyImage();
    }

}
