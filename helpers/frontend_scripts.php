<?php

function enqueue_js() { 
	wp_enqueue_script(
		'slick', 
		get_template_directory_uri().'/node_modules/slick-carousel/slick/slick.js', 
		array(), 
		1.8, 
		true
	);

	wp_enqueue_script(
		'sticky', 
		get_template_directory_uri().'/node_modules/jquery-sticky/jquery.sticky.js', 
		array('jquery'), 
		1.0, 
		true
	);

	wp_enqueue_script(
		'main', 
		get_template_directory_uri().'/public/js/main.js', 
		array('jquery', 'slick', 'sticky'), 
		1.0, 
		true
	);
}

function enqueue_css() {
	wp_enqueue_style( 
		'theme-css', 
		get_template_directory_uri().'/public/css/app.css'
	);
}