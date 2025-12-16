<?php

class cfgroup_time extends cfgroup_field
{

    function __construct() {
        $this->name = 'time';
        $this->label = __( 'Time', 'admin-site-enhancements' );
    }

    function options_html( $key, $field ) {
    ?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e( 'Step', 'admin-site-enhancements' ); ?></label>
            </td>
            <td>
                <?php
                    CFG()->create_field( [
                        'type' => 'select',
                        'input_name' => "cfgroup[fields][$key][options][step]",
                        'options' => [
                            'choices' => [
                                '1'  => __( '1 minute', 'admin-site-enhancements' ),
                                '5'  => __( '5 minutes', 'admin-site-enhancements' ),
                                '10'  => __( '10 minutes', 'admin-site-enhancements' ),
                                '15'  => __( '15 minutes', 'admin-site-enhancements' ),
                                '20'  => __( '20 minutes', 'admin-site-enhancements' ),
                                '30'  => __( '30 minutes', 'admin-site-enhancements' ),
                                '60'  => __( '60 minutes', 'admin-site-enhancements' ),
                            ],
                            'force_single' => true,
                        ],
                        'value' => $this->get_option( $field, 'step', 'time' ),
                    ] );
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e( 'Minimum Time', 'admin-site-enhancements' ); ?></label>
            </td>
            <td>
                <?php
                    CFG()->create_field( [
                        'type' => 'select',
                        'input_name' => "cfgroup[fields][$key][options][minimum_time]",
                        'options' => [
                            'choices' => [
                                '00:00'  => '00:00',
                                '01:00'  => '01:00',
                                '02:00'  => '02:00',
                                '03:00'  => '03:00',
                                '04:00'  => '04:00',
                                '05:00'  => '05:00',
                                '06:00'  => '06:00',
                                '07:00'  => '07:00',
                                '08:00'  => '08:00',
                                '09:00'  => '09:00',
                                '10:00'  => '10:00',
                                '11:00'  => '11:00',
                                '12:00'  => '12:00',
                                '13:00'  => '13:00',
                                '14:00'  => '14:00',
                                '15:00'  => '15:00',
                                '16:00'  => '16:00',
                                '17:00'  => '17:00',
                                '18:00'  => '18:00',
                                '19:00'  => '19:00',
                                '20:00'  => '20:00',
                                '21:00'  => '21:00',
                                '22:00'  => '22:00',
                                '23:00'  => '23:00',
                            ],
                            'force_single' => true,
                        ],
                        'value' => $this->get_option( $field, 'minimum_time', 'time' ),
                    ] );
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e( 'Maximum Time', 'admin-site-enhancements' ); ?></label>
            </td>
            <td>
                <?php
                    CFG()->create_field( [
                        'type' => 'select',
                        'input_name' => "cfgroup[fields][$key][options][maximum_time]",
                        'options' => [
                            'choices' => [
                                '01:00'  => '01:00',
                                '02:00'  => '02:00',
                                '03:00'  => '03:00',
                                '04:00'  => '04:00',
                                '05:00'  => '05:00',
                                '06:00'  => '06:00',
                                '07:00'  => '07:00',
                                '08:00'  => '08:00',
                                '09:00'  => '09:00',
                                '10:00'  => '10:00',
                                '11:00'  => '11:00',
                                '12:00'  => '12:00',
                                '13:00'  => '13:00',
                                '14:00'  => '14:00',
                                '15:00'  => '15:00',
                                '16:00'  => '16:00',
                                '17:00'  => '17:00',
                                '18:00'  => '18:00',
                                '19:00'  => '19:00',
                                '20:00'  => '20:00',
                                '21:00'  => '21:00',
                                '22:00'  => '22:00',
                                '23:00'  => '23:00',
                                '24:00'  => '24:00',
                            ],
                            'force_single' => true,
                        ],
                        'value' => $this->get_option( $field, 'maximum_time', 'time' ),
                    ] );
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e( 'Output Format', 'admin-site-enhancements' ); ?></label>
            </td>
            <td>
                <?php
                    CFG()->create_field( [
                        'type' => 'select',
                        'input_name' => "cfgroup[fields][$key][options][frontend_display_format]",
                        'options' => [
                            'choices' => [
                                'G:i'  => 'G:i - 9:30, 19:45',
                                'H:i'  => 'H:i - 09:30, 19:45',
                                'g:i a'  => 'g:i a - 9:30 am, 7:45 pm',
                                'g:i A'  => 'g:i A - 9:30 AM, 7:45 PM',
                                'h:i a'  => 'h:i a - 09:30 am, 07:45 pm',
                                'h:i A'  => 'h:i A - 09:30 AM, 07:45 PM',
                            ],
                            'force_single' => true,
                        ],
                        'value' => $this->get_option( $field, 'frontend_display_format', 'G:i' ),
                    ] );
                ?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label validation-label">
                <label><?php _e( 'Validation', 'admin-site-enhancements' ); ?></label>
            </td>
            <td>
                <?php
                    CFG()->create_field( [
                        'type' => 'true_false',
                        'input_name' => "cfgroup[fields][$key][options][required]",
                        'input_class' => 'true_false',
                        'value' => $this->get_option( $field, 'required' ),
                        'options' => [ 'message' => __( 'This is a required field', 'admin-site-enhancements' ) ],
                    ] );
                ?>
            </td>
        </tr>
    <?php
    }

    function input_head( $field = null ) {
        $this->load_assets();
        // $time_format = $this->get_option( $field, 'time_format', 'time' );
        $step = intval( $this->get_option( $field, 'step', 'time' ) );
        $minimum_time = intval( $this->get_option( $field, 'minimum_time', 'time' ) );
        $maximum_time = intval( $this->get_option( $field, 'maximum_time', 'time' ) );
        $choose_one = __( 'Choose one', 'admin-site-enhancements' );
    ?>
        <link rel="stylesheet" type="text/css" href="<?php echo CFG_URL; ?>/includes/fields/time/jquery.timepicker.css" />
        <script>
        (function($) {
            $(function() {
                $(document).on('cfgroup/ready', '.cfgroup_add_field', function() {
                    $('.cfgroup_time:not(.ready)').init_time();
                });
                $('.cfgroup_time').init_time();
            });

            $.fn.init_time = function() {
                this.each(function() {
                    // Options and demo: https://www.jonthornton.com/jquery-timepicker/ || https://github.com/jonthornton/jquery-timepicker
                    $(this).find('input.time').timepicker({
                        'useSelect': true,
                        'noneOption': '<?php echo esc_js( $choose_one ); ?>',
                        'show2400': true,
                        'timeFormat': 'G:i',
                        'step': <?php echo esc_js( $step ); ?>,
                        'minTime': '<?php echo esc_js( $minimum_time ); ?>',
                        'maxTime': '<?php echo esc_js( $maximum_time ); ?>'
                    });
                    $(this).addClass('ready');
                });
            };
        })(jQuery);
        </script>
    <?php
    }

    function load_assets() {
        wp_register_script( 'asenha-jquery-ui-timepicker', CFG_URL . '/includes/fields/time/jquery.timepicker.js', [ 'jquery', 'jquery-ui-core' ] );
        wp_enqueue_script( 'asenha-jquery-ui-timepicker' );        
    }

    function format_value_for_api( $value, $field = null ) {
        $output_format = isset( $field->options['frontend_display_format'] ) ? $field->options['frontend_display_format'] : 'G:i';
        return get_cf_time( $value, $output_format );
    }

    function format_value_for_display( $value, $field = null ) {
        return $this->format_value_for_api( $value, $field );
    }
}
