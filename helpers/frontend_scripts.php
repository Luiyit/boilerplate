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
		'bootstrap', 
		get_template_directory_uri().'/node_modules/bootstrap/dist/js/bootstrap.js', 
		array('jquery'), 
		1.0, 
		true
	);

	wp_enqueue_script(
		'imagesloaded.pkgd', 
		get_template_directory_uri().'/node_modules/imagesloaded/imagesloaded.pkgd.min.js', 
		array('jquery'), 
		1.0, 
		true
	);

	wp_enqueue_script(
		'masonry-layou', 
		get_template_directory_uri().'/node_modules/masonry-layout/dist/masonry.pkgd.min.js', 
		array('jquery', 'imagesloaded.pkgd'), 
		4.2,
		true
	);

	wp_enqueue_script(
		'dhakar-lightbox', 
		get_template_directory_uri().'/node_modules/lightbox2/dist/js/lightbox.min.js', 
		array('jquery'), 
		2.1, 
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