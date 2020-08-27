<?php

  function my_customize_register( $wp_customize ) {

    // Adding section in wordpress customizer   
    $wp_customize->add_section('theme_setup', array(
      'title' => 'Theme setup'
    ));

    // Add settings
    $wp_customize->add_setting('bt_copyright', array(
        'default' => 'All rights reserved',
        'type'    => 'theme_mod'
    ));
    $wp_customize->add_setting('bt_ga_traking_id', array(
      'default' => '',
      'type'    => 'theme_mod'
  ));

    // Add controls
    $wp_customize->add_control('bt_copyright', array(
        'label'   => 'Copyright text',
        'section' => 'theme_setup',
        'type'    => 'textarea',
    ));
    $wp_customize->add_control('bt_ga_traking_id', array(
      'label'   => 'Google Analytics Tracking ID',
      'section' => 'theme_setup',
      'type'    => 'text',
    ));
  }
  add_action('customize_register','my_customize_register');