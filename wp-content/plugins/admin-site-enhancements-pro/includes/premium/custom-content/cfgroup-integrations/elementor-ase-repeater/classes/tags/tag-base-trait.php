<?php

namespace ElementorAseRepeater\DynamicTags;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once ELEMENTOR_ASE_REPEATER_PATH . 'classes/data/repeater-data-trait.php';

trait TagBaseTrait {
    use \ElementorAseRepeater\Data\RepeaterDataTrait;
    protected $configurator;
    protected $controls;

    public function __construct( $data = [] ) {
        parent::__construct( $data );
        $this->configurator = \ElementorAseRepeater\Configurator::instance();
        $this->controls = \ElementorAseRepeater\Controls\DynamicTagControls::instance();
    }
    
    protected function log_settings() {
        $settings = $this->get_settings();
    }

    protected function debug_loop_context() {
        $document = \Elementor\Plugin::$instance->documents->get_current();
    
        if ( $document instanceof \ElementorPro\Modules\LoopBuilder\Documents\Loop ) {
            $settings = $document->get_settings();
    
            $loop_settings = $settings['loop'] ?? null;
    
            $current_item = $loop_settings['current_item'] ?? null;
        }
    
        $current_post = get_post();
    }
}

abstract class AseRepeaterTagBase extends \Elementor\Core\DynamicTags\Data_Tag {
    use TagBaseTrait;
}