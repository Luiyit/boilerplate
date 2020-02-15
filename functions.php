<?php
include "inc/TGM-Plugin-Activation-develop/class-tgm-plugin-activation.php";
include "helpers/theme_plugins.php";
include "helpers/frontend_scripts.php";
include "helpers/timber_setup.php";
include "helpers/timber_site.php";
include "helpers/filters.php";
include "helpers/utils.php";
include "helpers/customization.php";
include "helpers/basic_actions.php";

/** Create timber site */
new StarterSite();

/** Enqueue */
add_action( 'wp_enqueue_scripts', 'enqueue_css' );
add_action( 'wp_enqueue_scripts', 'enqueue_js' );