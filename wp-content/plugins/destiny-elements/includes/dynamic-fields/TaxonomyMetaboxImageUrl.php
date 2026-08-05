<?php

use Breakdance\DynamicData\ImageData;
use \Breakdance\DynamicData\ImageField;

class TaxonomyMetaboxImageUrl extends ImageField
{

    /**
     * @inheritDoc
     */
    public function label()
    {
        return 'Metabox Field (Image URL)';
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
        return 'metabox_image_url';
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
     * @inheritDoc
     */
    public function handler($attributes): ImageData
    {
        global $single_category_item;

        if (empty($attributes['field_name']) || !$single_category_item) {
            return ImageData::emptyImage();
        }

        $field_name = sanitize_text_field($attributes['field_name']);
        
        if (function_exists('rwmb_meta')) {
            $images = rwmb_meta($field_name, ['object_type' => 'term'], $single_category_item->term_id);
        }

        if (!empty($images) && is_array($images)) {
            // Sprawdzenie, czy pierwszy element jest obrazem
            if (isset($images[0]) && is_array($images[0]) && isset($images[0]['ID'])) {
                $image_id = $images[0]['ID'];
            } elseif (isset($images['ID'])) {
                $image_id = $images['ID'];
            } else {
                return ImageData::emptyImage();
            }

            $image_url = wp_get_attachment_url($image_id);
            if ($image_url) {
                return ImageData::fromUrl($image_url);
            }
        }

        return ImageData::emptyImage();
    }
}
