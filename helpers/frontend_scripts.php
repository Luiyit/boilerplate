<?php

function enqueue_js() { 
	wp_enqueue_script('jquery');
	
	wp_enqueue_script(
		'jquery', 
		get_template_directory_uri().'/boilerplate/node_modules/slick-carousel/slick/slick.js?v=1.8.1', 
		false,
		1.8, 
		true
	);
	
	wp_enqueue_script(
		'slick', 
		get_template_directory_uri().'/boilerplate/node_modules/slick-carousel/slick/slick.js?v=1.8.1', 
		false,
		1.8, 
		true
	);
	// array('jquery'),

	wp_enqueue_script(
		'sticky', 
		get_template_directory_uri().'/boilerplate/node_modules/jquery-sticky/jquery.sticky.js', 
		false,
		1.0, 
		true
	);
	// array('jquery'), 

	wp_enqueue_script(
		'bootstrap', 
		get_template_directory_uri().'/boilerplate/node_modules/bootstrap/dist/js/bootstrap.js', 
		false, 
		1.0, 
		true
	);
	// array('jquery'), 

	wp_enqueue_script(
		'imagesloaded.pkgd', 
		get_template_directory_uri().'/boilerplate/node_modules/imagesloaded/imagesloaded.pkgd.min.js', 
		false, 
		1.0, 
		true
	);
	// array('jquery'), 

	wp_enqueue_script(
		'masonry-layou', 
		get_template_directory_uri().'/boilerplate/node_modules/masonry-layout/dist/masonry.pkgd.min.js', 
		false, 
		4.2,
		true
	);
	// array('jquery', 'imagesloaded.pkgd'), 

	wp_enqueue_script(
		'dhakar-lightbox', 
		get_template_directory_uri().'/boilerplate/node_modules/lightbox2/dist/js/lightbox.min.js', 
		false, 
		2.1, 
		true
	);
	// array('jquery'), 

	wp_enqueue_script(
		'scrollreveal', 
		get_template_directory_uri().'/boilerplate/node_modules/scrollreveal/dist/scrollreveal.min.js', 
		false, 
		4.0, 
		true
	);

	wp_enqueue_script(
		'main', 
		get_template_directory_uri().'/boilerplate/public/js/main.js?ver=1.32', 
		false, 
		1.1, 
		true
	);
	// array('jquery', 'slick', 'sticky', 'scrollreveal'), 
}

function enqueue_css() {
	wp_enqueue_style( 
		'dhakar-lightbox',
		get_template_directory_uri().'/boilerplate/node_modules/lightbox2/dist/css/lightbox.min.css'
	);

	wp_enqueue_style( 
		'theme-css', 
		get_template_directory_uri().'/boilerplate/public/css/app.css?ver=1.3'
	);
}