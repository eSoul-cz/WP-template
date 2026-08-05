<?php

namespace ElementorAseRepeater\Data;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * This trait is used to get the repeater field value and each sub-field's value for a given post ID
 */
trait RepeaterDataTrait {
    /**
     * Get the value of the repeater sub-field
     */
    public function get_repeater_value( $subfield_name, $output_format = 'raw' ) {
        $current_index = $this->get_current_item_index();
        $post_id = get_the_ID();

        // Handle virtual post IDs. Let's find the actual post ID.
        if ( $post_id < 0 ) {
            $abs_id = abs( $post_id );
            $id_str = (string) $abs_id;
            
            // Extract the last digit as index
            $current_index = (int) substr( $id_str, -1 );
            
            // Remove the last digit and the 999999 separator
            $parent_post_id = (int) substr( $id_str, 0, -7 );
            
            $post_id = $parent_post_id;
        }

        $repeater_field = get_parent_repeater_cf( $subfield_name );
            
        if ( ! $repeater_field ) {
            return null;
        }
        
        switch ( $output_format ) {
            case 'raw':
                $repeater_data = get_cf( $repeater_field['name'], 'raw', $post_id );
                // if ( 'some_repeater_field_name' == $repeater_field['name'] ) {
                //     vi( $repeater_data, '', $repeater_field['name'] . ' - raw - ' . $post_id );
                // }
                break;
                
            case 'display':
                $repeater_data = get_cf( $repeater_field['name'], 'display', $post_id );
                // if ( 'some_repeater_field_name' == $repeater_field['name'] && '10233' == $post_id ) {
                //     vi( $repeater_data, '', $repeater_field['name'] . ' - display - ' . $post_id );
                // }            
                break;
        }

        if ( ! $repeater_data || ! is_array( $repeater_data ) ) {
            return null;
        }

        if ( ! isset( $repeater_data[$current_index][$subfield_name] ) ) {
            return null;
        }
        
        $subfield_value = $repeater_data[$current_index][$subfield_name];

        return $subfield_value;
    }

    private function get_current_item_index() {
        $document = \Elementor\Plugin::$instance->documents->get_current();
        if ( $document instanceof \ElementorPro\Modules\LoopBuilder\Documents\Loop ) {
            $loop_settings = $document->get_settings( 'loop' );
            return $loop_settings['index'] ?? 0;
        }
        return 0;
    }
}