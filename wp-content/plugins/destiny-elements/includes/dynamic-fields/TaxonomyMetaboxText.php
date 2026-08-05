<?php

use Breakdance\DynamicData\StringField;
use Breakdance\DynamicData\StringData;

class TaxonomyMetaboxText extends StringField
{

    /**
     * @inheritDoc
     */
    public function label()
    {
        return 'Taxonomy Metabox Text';
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
        return 'taxonomy_metabox_text';
    }

    /**
     * @inheritDoc
     */
    public function handler($attributes): StringData
    {
        global $single_category_item;

        if(!$single_category_item){
            // Get random category
            $args = array(
                'taxonomy'      => 'category',
                'order'         => 'ASC',
                'orderby'       => 'rand',
                'show_count'    => 0,
                'pad_counts'    => 0,
                'hierarchical'  => 1,
                'title_li'      => '',
                'hide_empty'    => 0
            );
            $product_categories = get_categories( $args );
            $single_category_item = $product_categories[0];
        }
        return StringData::fromString($single_category_item->name);
    }

    
}