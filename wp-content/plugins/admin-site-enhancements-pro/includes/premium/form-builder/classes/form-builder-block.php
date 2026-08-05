<?php

defined( 'ABSPATH' ) || die();

class Form_Builder_Block {

    public function __construct() {
        add_action( 'init', array( $this, 'register_block' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
    }

    public function register_block() {
        if ( ! function_exists( 'register_block_type' ) ) {
            return;
        }

        register_block_type( 'form-builder/form-selector', array(
            'attributes' => array(
                'formId' => array(
                    'type' => 'string',
                )
            ),
            'editor_style' => 'form-builder-block-editor',
            'editor_script' => 'form-builder-block-editor',
            'render_callback' => array( $this, 'get_form_html' ),
        ) );
    }

    public function enqueue_block_editor_assets() {
        wp_register_style( 'form-builder-block-editor', FORMBUILDER_URL . 'assets/css/form-block.css', array( 'wp-edit-blocks' ), FORMBUILDER_VERSION);
        wp_register_script( 'form-builder-block-editor', FORMBUILDER_URL . 'assets/js/form-block.min.js', array( 'wp-blocks', 'wp-element', 'wp-i18n', 'wp-components' ), FORMBUILDER_VERSION, true );

        $all_forms = Form_Builder_Helper::get_all_forms_list_options();
        unset( $all_forms[''] );

        $form_block_data = array(
            'forms' => $all_forms,
            'i18n' => array(
                'title' => esc_html__( 'Form Builder', 'admin-site-enhancements' ),
                'description' => esc_html__( 'Select and display one of your forms.', 'admin-site-enhancements' ),
                'form_keywords' => array(
                    esc_html__( 'form', 'admin-site-enhancements' ),
                    esc_html__( 'contact', 'admin-site-enhancements' ),
                ),
                'form_select' => esc_html__( 'Select a Form', 'admin-site-enhancements' ),
                'form_settings' => esc_html__( 'Form Settings', 'admin-site-enhancements' ),
                'form_selected' => esc_html__( 'Form', 'admin-site-enhancements' ),
            ),
        );
        wp_localize_script( 'form-builder-block-editor', 'form_builder_block_data', $form_block_data );
    }

    public function get_form_html( $attr ) {
        $form_id = ! empty( $attr['formId'] ) ? absint( $attr['formId'] ) : 0;
        if ( empty( $form_id ) ) {
            return '';
        }

        ob_start();
        Form_Builder_Preview::show_form( $form_id );
        return ob_get_clean();
    }

}

new Form_Builder_Block();
