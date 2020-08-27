<?php

/**
 * About page
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context          = Timber::context();
$timber_post      = new Timber\Post();

$context['posts'] = $timber_post;
$context['contact'] = get_fields_by_page_id(30);
$context['instagram'] = get_fields_by_page_id(38);
$context['page'] = get_fields_by_page_id(48);

Timber::render($timber_post->post_name.'.twig', $context );
