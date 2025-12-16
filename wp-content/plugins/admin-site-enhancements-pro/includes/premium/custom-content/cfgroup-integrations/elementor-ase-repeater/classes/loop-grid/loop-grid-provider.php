<?php

namespace ElementorAseRepeater\LoopGrid;

use ElementorAseRepeater\Controls\LoopGridControlsBase;
use ElementorAseRepeater\Configurator;

class LoopGridProvider {
    protected static $instance = null;

    protected $configurator;

    protected $controls;

    protected static $constructor_called = false;

    public static function instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    protected function __construct() {
        $this->configurator = \ElementorAseRepeater\Configurator::instance();
        $this->init_controls();
        $this->register_controls();
        // Add debug hooks
        // add_filter('elementor/document/wrapper_attributes', [$this, 'debug_wrapper_attributes'], 10, 2);
        // add_filter('elementor/frontend/builder_content_data', [$this, 'debug_builder_content'], 10, 2);
        // add_filter('elementor/widget/render_content', [$this, 'debug_widget_render'], 10, 2);
        // Add filter for virtual post classes
        add_filter( 'post_class', [ $this, 'add_virtual_post_classes' ], 10, 3 );
    }

    protected function init_controls() {
        $this->controls = new \ElementorAseRepeater\Controls\LoopGridControlsBase( $this->configurator, $this );
    }

    protected function register_controls() {
        add_action(
            'elementor/element/loop-grid/section_query/after_section_start',
            [ $this->controls, 'register_query_controls' ],
            10,
            2
        );
    }

    public function add_virtual_posts( $posts, $query ) {
        if ( ! isset( $query->query_vars['asenha_virtual_posts'] ) || $query->query_vars['asenha_virtual_posts'] !== true ) {
            return $posts;
        }

        $repeater_field = $query->get( 'ase_repeater_field' ); // e.g. 'movie_scenes'

        if ( ! $repeater_field ) {
            return $posts;
        }

        $virtual_posts = [];

        foreach ( $posts as $post ) {
            $repeater_data = get_cf( $repeater_field, 'raw', $post->ID );

            if ( ! $repeater_data || is_null( $repeater_data ) || ! is_array( $repeater_data ) ) {
                continue;
            }

            foreach ( $repeater_data as $index => $row ) {
                $virtual_post = new \stdClass();
                $virtual_post->ID = -1 * ($post->ID . $this->configurator::VIRTUAL_POST_ID_SEPARATOR . $index);
                $virtual_post->post_parent = $post->ID;
                $virtual_post->post_title = $post->post_title . ' - ' . $repeater_field . ' ' . ($index + 1);
                $virtual_post->post_status = 'publish';
                $virtual_post->post_type = $post->post_type;
                // Use parent's post type instead of creating new one
                $virtual_post->filter = 'raw';
                // Add our custom data
                $virtual_post->ase_repeater_data = $row;
                $virtual_post->asenha_loop_index = $index;
                $virtual_posts[] = $virtual_post;
            }
        }

        return $virtual_posts;
    }

    public function filter_elementor_query_args( $query_args, $widget ) {
        $settings = $widget->get_settings();
        if ( isset( $settings['use_ase_repeater'] ) && $settings['use_ase_repeater'] === 'yes' ) {
            $query_args['asenha_virtual_posts'] = true;
            $query_args['ase_repeater_field'] = $settings['ase_repeater_field'];
        }
        return $query_args;
    }

    public function get_ase_repeater_fields() {
        $repeater_fields = [];

        try {
            $repeater_fields_raw = find_cf( array( 'field_type' => 'repeater' ) );
            if ( ! empty( $repeater_fields_raw ) && is_array( $repeater_fields_raw ) ) {
                foreach ( $repeater_fields_raw as $field_name => $field_info ) {
                    $repeater_fields[$field_name] = $field_info['label'] . ' (' . $field_name . ')';
                }
            }
        } catch ( \Exception $e ) {
            // Silently handle any exceptions
        }

        return $repeater_fields;
    }

    // private function process_fields( $fields, &$result, $parent = '' ) {
    //     foreach ( $fields as $field ) {
    //         if ( $field['type'] === 'repeater' ) {
    //             $key = ( $parent ? $parent . '_' . $field['name'] : $field['name'] );
    //             $result[$key] = $field['label'];
    //         } elseif ( $field['type'] === 'group' && !empty( $field['sub_fields'] ) ) {
    //             $this->process_fields( $field['sub_fields'], $result, $field['name'] );
    //         }
    //     }
    // }

    public function get_original_post_title( $post_id ) {
        if ( $post_id < 0 ) {
            // This is a virtual post
            $original_post_id = abs( $post_id );
            $original_post_id = explode( $this->configurator::VIRTUAL_POST_ID_SEPARATOR, $original_post_id )[0];
            $post = get_post( $original_post_id );
        } else {
            $post = get_post( $post_id );
        }
        if ( !$post ) {
            return '';
        }
        return get_the_title( $post->ID );
    }

    // /**
    //  * Checks if the current query is an ACF repeater query.
    //  * Note: This method is currently unused but kept for potential future implementation.
    //  *
    //  * @param WP_Query $query The query object to check.
    //  * @return bool Whether the query is an ACF repeater query.
    //  */
    // private function is_ase_repeater_query( $query ) {
    //     $is_repeater = isset( $query->query_vars['ase_repeater_query'] ) && $query->query_vars['ase_repeater_query'] === true;
    //     return $is_repeater;
    // }

    public function debug_wrapper_attributes( $attributes, $document ) {
        error_log( "\n=== ELEMENTOR WRAPPER ATTRIBUTES ===" );
        error_log( "Document ID: " . $document->get_main_id() );
        error_log( "Document Type: " . $document->get_name() );
        error_log( "Attributes: " . print_r( $attributes, true ) );
        error_log( "=== END WRAPPER ATTRIBUTES ===\n" );
        return $attributes;
    }

    public function debug_builder_content( $data, $post_id ) {
        global $post;
        error_log( "\n=== ELEMENTOR BUILDER CONTENT ===" );
        error_log( "Post ID: " . $post_id );
        error_log( "Current Post: " . (( $post ? $post->ID : 'none' )) );
        error_log( "Is Virtual: " . (( isset( $post ) && strpos( $post->ID, '-' ) === 0 ? 'yes' : 'no' )) );
        if ( isset( $post ) && strpos( $post->ID, '-' ) === 0 ) {
            error_log( "Virtual Post Data: " . print_r( get_object_vars( $post ), true ) );
        }
        error_log( "=== END BUILDER CONTENT ===\n" );
        return $data;
    }

    public function debug_widget_render( $content, $widget ) {
        if ( $widget->get_name() === 'loop-grid' ) {
            global $post;
            error_log( "\n=== LOOP GRID WIDGET RENDER ===" );
            error_log( "Widget Name: " . $widget->get_name() );
            error_log( "Widget ID: " . $widget->get_id() );
            error_log( "Current Post: " . (( $post ? $post->ID : 'none' )) );
            error_log( "Settings: " . print_r( $widget->get_settings(), true ) );
            error_log( "=== END WIDGET RENDER ===\n" );
        }
        return $content;
    }

    public function add_virtual_post_classes( $classes, $class, $post_id ) {
        if ( is_string( $post_id ) && strpos( $post_id, '-' ) === 0 ) {
            error_log( "\n=== VIRTUAL POST CLASS GENERATION ===" );
            error_log( "Post ID: " . $post_id );
            // Add standard WordPress classes
            $classes[] = 'post-' . abs( $post_id );
            $classes[] = 'type-repeater-field-post';
            $classes[] = 'status-publish';
            $classes[] = 'hentry';
            error_log( "Generated Classes: " . print_r( $classes, true ) );
            error_log( "=== END VIRTUAL POST CLASS GENERATION ===\n" );
        }
        return $classes;
    }

}
