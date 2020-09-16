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
    $wp_customize->add_setting('bt_instagram', array(
      'default' => 'https://instagram.com',
      'type'    => 'theme_mod'
    ));
    $wp_customize->add_setting('bt_facebook', array(
      'default' => 'https://facebook.com',
      'type'    => 'theme_mod'
    ));
    $wp_customize->add_setting('bt_twitter', array(
      'default' => 'https://twitter.com',
      'type'    => 'theme_mod'
    ));
    $wp_customize->add_setting('bt_youtube', array(
      'default' => 'https://youtube.com',
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
    $wp_customize->add_control('bt_instagram', array(
      'label'   => 'Instagram URL',
      'section' => 'theme_setup',
      'type'    => 'text',
    ));
    $wp_customize->add_control('bt_facebook', array(
      'label'   => 'Facebook URL',
      'section' => 'theme_setup',
      'type'    => 'text',
    ));
    $wp_customize->add_control('bt_twitter', array(
      'label'   => 'Twitter URL',
      'section' => 'theme_setup',
      'type'    => 'text',
    ));
    $wp_customize->add_control('bt_youtube', array(
      'label'   => 'Youtube URL',
      'section' => 'theme_setup',
      'type'    => 'text',
    ));
  }
  add_action('customize_register','my_customize_register');