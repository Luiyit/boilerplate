<?php

function add_theme_plugins(){
  $plugins = array(

		array(
			'name'     => 'Timber',
			'slug'     => 'timber-library',
			'required' => true,
		),
		array(
			'name'     => 'iThemes Security',
			'slug'     => 'better-wp-security',
			'required' => false,
		),
		array(
			'name'     => 'Yoast SEO',
			'slug'     => 'wordpress-seo',
			'required' => false,
		),
		array(
			'name'     => 'Disable Gutenberg',
			'slug'     => 'disable-gutenberg',
			'required' => false,
		),
		array(
			'name'     => 'MC4WP: Mailchimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),
		array(
			'name'               => 'Advanced Custom Fields PRO', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro-master', // The plugin slug (typically the folder name).
			'source'             => __DIR__.'/inc/advanced-custom-fields-pro-master.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.8.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
  );

  /*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.s
	);

	tgmpa( $plugins, $config );
}

add_action('tgmpa_register', 'add_theme_plugins');