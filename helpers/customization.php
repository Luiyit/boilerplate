<?php

  function my_customize_register( $wp_customize ) {

    // Adding section in wordpress customizer   
    $wp_customize->add_section('theme_setup', array(
      'title' => 'Theme setup'
    ));

    // Add setting
    $wp_customize->add_setting('copyright', array(
        'default' => 'All rights reserved',
        'type'    => 'theme_mod'
    ));

    // Add control
    $wp_customize->add_control('copyright', array(
        'label'   => 'Copyright text',
        'section' => 'theme_setup',
        'type'    => 'text',
    ));
  }
  add_action('customize_register','my_customize_register');