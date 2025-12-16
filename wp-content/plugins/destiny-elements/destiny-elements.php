<?php
/**
 * Plugin Name: Destiny Elements
 * Plugin URI: https://destiny.ie/
 * Description: The #1 Element Addon for Breakdance
 * Author: Digital Destiny
 * Author URI: https://destiny.ie/
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * License: GPLv2
 * Text Domain: de-breakdance
 * Domain Path: /languages/
 * Version: 1.9.1
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'breakdance/plugin.php' ) || defined('__BREAKDANCE_PLUGIN_FILE__') ) {
    
    require_once __DIR__ . '/elements/elements.php';
    require_once __DIR__ . '/includes/data.php';
    require_once __DIR__ . '/includes/register-category.php';
    require_once __DIR__ . '/includes/destiny-options.php';
    require_once __DIR__ . '/includes/element-extensions/page-views.php';
    require __DIR__ . '/includes/element-extensions/get-taxonomie-list.php';
    require_once __DIR__ . '/includes/apis.php';
    require __DIR__ . '/includes/dynamic-data/fluent-forms.php';
    
    if (class_exists('GFAPI')) {
        $gravity_forms_data = GFAPI::get_forms();
    }
    require __DIR__ . '/includes/dynamic-data/contact-form-7.php';
    require __DIR__ . '/includes/dynamic-data/gravity-forms.php';
    require __DIR__ . '/includes/dynamic-data/formidable-forms.php';
    require __DIR__ . '/includes/dynamic-data/translation-plugins.php';
    require __DIR__ . '/includes/dynamic-data/ajax-search.php';
    //require __DIR__ . '/includes/dynamic-data/ajax-filter.php';
    require __DIR__ . '/includes/dynamic-data/taxonomies.php';
    require __DIR__ . '/includes/dynamic-data/posts.php';
    require __DIR__ . '/includes/dynamic-data/preloaders.php';
    require __DIR__ . '/includes/dynamic-data/active-languages.php';
    require __DIR__ . '/includes/preloader.php';
    require __DIR__ . '/includes/register-dynamic-fields.php';

    // Ajax Filter 
    require __DIR__ . '/includes/dynamic-data/author.php';
    require __DIR__ . '/includes/element-extensions/filters/inputs.php';
    require __DIR__ . '/includes/element-extensions/filters/query-support.php';
    require __DIR__ . '/includes/dynamic-data/acf-meta-fields.php';
    require __DIR__ . '/includes/dynamic-data/meta-box-fields.php';
    require __DIR__ . '/includes/dynamic-data/ajax-filter-types.php';

    // WPML - Multilingual CMS
    require __DIR__ . '/includes/wpml-conditions.php';
 
    // Quickview 
    require __DIR__ . '/includes/quickview.php';

    // Helpers
    require __DIR__ . '/includes/helpers/remove-class-from-div.php';

    // Add To Cart

    require __DIR__ . '/includes/add-to-cart.php';

    // It's not path but URL. Would be good to create both
    define("DESTINY_ELEMENTS_PLUGIN_URL", plugin_dir_url(__FILE__));
    define("DESTINY_ELEMENTS_PLUGIN_PATH", plugin_dir_path(__FILE__));
    
    // Add custom placeholder to the Breakdance reusable dependencies
    add_filter('breakdance_reusable_dependencies_urls', function ($urls) {
        $urls['destinyPluginUrl'] = plugin_dir_url(__FILE__); // This will replace %%BREAKDANCE_REUSABLE_DESTINY_PLUGIN_URL%%
        return $urls;
    });

    // Create a function to modify dependencies before Breakdance processes them
    add_filter('breakdance_local_dependency_files', function ($dependencies) {
        return array_map('replaceDestinyPlaceholders', $dependencies);
    });

    /**
     * Replace %%BREAKDANCE_REUSABLE_DESTINY_PLUGIN_URL%% with the actual plugin URL
     *
     * @param string $dependency
     * @return string
     */
    function replaceDestinyPlaceholders($dependency)
    {
        $pluginUrl = plugin_dir_url(__FILE__);
        return str_replace('%%BREAKDANCE_REUSABLE_DESTINY_PLUGIN_URL%%', $pluginUrl, $dependency);
    }
     

    /**
     * Initialize the appsero
     * @return void;
     */


    function appsero_init_tracker_destiny_elements() {

        if ( ! class_exists( 'Appsero\Client' ) ) {
            require __DIR__ . '/appsero/src/Client.php';
        }

        $client = new Appsero\Client( '30fbea5e-530d-4ce4-8b0a-3ee731adf06d', 'Destiny Elements', __FILE__ );

        // Active insights
        $client->insights()->init();

        // Active automatic updater
        if (! class_exists('Appsero\Updater')) {
            require __DIR__ . '/updater/src/Updater.php';
        }
      
      Appsero\Updater::init($client);

        // Active license page and checker
        $args = array(
            'type'       => 'submenu',
            'menu_title' => 'License',
            'page_title' => 'Destiny Elements License',
            'menu_slug'  => 'destiny_elements_license',
            'parent_slug' => 'destiny-elements.php',
        );
        $client->license()->add_settings_page( $args );

    }

    appsero_init_tracker_destiny_elements();
    
} else {
    add_action('admin_notices', 'custom_admin_notice');

    function custom_admin_notice() {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Destiny Elements</strong> could not find Breakdance Website Builder activated. If Breakdance is activated and you still see this message, please email support@destiny.ie for support. Apologies for any inconvenience.</p>
        </div>
        <?php
    }

}
 