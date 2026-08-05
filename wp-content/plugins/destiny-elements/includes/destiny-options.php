<?php

/**
 * Register a custom menu page.
 *
 * @return void
 */
function destiny_elements_menu()
{
    add_menu_page(
        __('Destiny Elements', 'textdomain'),
        'Destiny Elements',
        'manage_options',
        'destiny-elements.php',
        'destiny_elements',
        'dashicons-welcome-widgets-menus',
        100
    );
}
add_action('admin_menu', 'destiny_elements_menu');

/**
 * Initializes Destiny Elements settings.
 *
 * @return void
 */
function destiny_elements_settings_init()
{
    // Register 'Preloader Activation' settings
    register_setting('destiny_elements', 'destiny_preloader_enabled');
    register_setting('destiny_elements', 'destiny_preloader_id');
}
add_action('admin_init', 'destiny_elements_settings_init');

/**
 * Enqueue the required JavaScript for the Destiny Elements settings page.
 *
 * @return void
 */
function destiny_enqueue_scripts()
{
    // Register the script
    wp_register_script('de-script', DESTINY_ELEMENTS_PLUGIN_URL . '/includes/assets/js/destiny-options.js', array('jquery'), '1.0.0', true);

    // Pass the WordPress AJAX URL to the script
    wp_localize_script('de-script', 'deScript', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('de-nonce'),
		'baseurl' => get_site_url(),
	));

    // Enqueue the script
    wp_enqueue_script('de-script');
}
add_action('admin_enqueue_scripts', 'destiny_enqueue_scripts');

/**
 * Renders the Destiny Elements settings page.
 *
 * @return void
 */
function destiny_elements()
{
	?>
	<style>
		.destiny-loading {
			margin: 0 12px;
			color: orange
		}

		.destiny-success {
			margin: 0 12px;
			color: green;
		}

		.preloader-settings {
			margin-bottom: 8px;
		}
		.de-settings-wrapper {
			margin-top: 15px;
			padding: 10px 15px;
			border-radius: 3px;
			background: white;
			border: 1px solid grey;
		}
	</style>
	<div class="wrap">
		<h1>Destiny Elements</h1>
		<div class="de-settings-wrapper">
			<h2>Destiny License</h2>
			<p><strong>Manage your license: <a href="/wp-admin/admin.php?page=destiny_elements_license">License</a></strong></p>
			<hr>
			<p>With activated license, you'll be glad to know that your plugins are being monitored for updates by an automated
				system in the WordPress dashboard! And you will also get premium support.</p>
		</div>
		<?php
		if (isset($_GET['settings-updated'])) {
			add_settings_error('destiny_elements', 'de_message', __('Destiny Elements settings updated', 'de'), 'updated');
		} // show error/update messages
		settings_errors('destiny_elements');
		?>
		<form action="options.php" method="post">
			<?php settings_fields('destiny_elements'); ?>
			<?php do_settings_sections('destiny_elements'); ?>
			<div class="de-settings-wrapper">
				<h2>APIs</h2>
				<h3>Google Places</h3>
				<label for="destiny_places_api">Google Places API</label>
				<br>
				<input style="border-radius: 0;  padding: 3px 10px; width: 400px;" type="text" id="destiny_places_api"
					name="destiny_places_api" value="<?php echo esc_attr(get_option('destiny_places_api')); ?>"><br><br>
				<label for="destiny_places_api_required_date_updated">Frequncy to Get Data from Google Places API (in
					seconds)</label><br>
				<input style="border-radius: 0;  padding: 3px 10px; width: 160px;" type="number" id="destiny_places_api"
					name="destiny_places_api_required_date_updated"
					value="<?php echo esc_attr(get_option('destiny_places_api_required_date_updated')); ?>"><br><br>
				<h3 class="de-settings-button" >Google Maps JavaScript</h3>
				<label for="destiny_maps_javascript_api">Google Maps JavaScript API</label>
				<br>
				<input style="border-radius: 0;  padding: 3px 10px; width: 400px;" type="text" id="destiny_maps_javascript_api"
					name="destiny_maps_javascript_api"
					value="<?php echo esc_attr(get_option('destiny_maps_javascript_api')); ?>"><br><br>
			</div>
			<div class="de-settings-wrapper">
			<h3 class="de-settings-button">Preloader Settings</h3>
			<p>
				<?php echo sprintf(
					__('For detailed information on implementing a preloader using Destiny Elements, we invite you to familiarize yourself with %sour documentation%s.', 'destiny-elements'),
					'<a href="https://destiny.ie/documentation/preloader/">',
					'</a>'
				); ?>
			</p>			
			<div class="preloader-settings" style="display: flex; align-items: center;">
				<input type="checkbox" id="destiny_preloader_enabled" name="destiny_preloader_enabled" style="margin: 0;" value="1" <?php checked(1, get_option('destiny_preloader_enabled'), true); ?> />
				<label for="destiny_preloader_enabled" style="margin-left: 6px;">Activate Preloader</label>
				<input type="hidden" id="destiny_preloader_id" name="destiny_preloader_id" value="<?php echo get_option('destiny_preloader_id'); ?>">
			</div>
			<div id="global-block-select"></div>
			</div>
			<?php submit_button(); ?>
		</form>
	</div>

   <?php
}

if (!get_option('destiny_places_api_required_date_updated')) {
	update_option('destiny_places_api_required_date_updated', 60 * 60 * 24);
}