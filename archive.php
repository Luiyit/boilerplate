<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'archive.twig', 'index.twig' );
$context = Timber::context();

$context['title'] = 'Archive';
if ( is_day() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'D M Y' );
} elseif ( is_month() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'M Y' );
} elseif ( is_year() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'Y' );
} elseif ( is_tag() ) {
	$context['title'] = single_tag_title( '', false );
} elseif ( is_category() ) {
	$context['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} elseif ( is_post_type_archive() ) {
	$context['title'] = false;
	$context['type_title_name'] = get_post_type();
	$context['post_type_title'] = post_type_archive_title('', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );

	if($context['type_title_name'] == 'projects'){
		$context['grid'] = array();

		foreach ($context['posts'] as $key => $post) {
			array_push($context['grid'], array(
				'title' => $post->post_title,
				'image' => get_the_post_thumbnail_url($post),
				'link' => $post->link,
			));
		}
	}
}

$context['page'] = get_fields_by_page_id(105);
$context['instagram'] = get_fields_by_page_id(38);
$context['contact'] = get_fields_by_page_id(30);
$context['posts'] = new Timber\PostQuery();
Timber::render( $templates, $context );
