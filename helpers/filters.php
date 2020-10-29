<?php

/* Include SVG support */
function add_svg_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'add_svg_mime_types');

/* Add custom template */
function add_page_template ($templates) {
  $templates['sections-template.twig'] = 'Sectiosn page';
  return $templates;
}
add_filter ('theme_page_templates', 'add_page_template');