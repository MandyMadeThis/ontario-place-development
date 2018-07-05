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
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package     WordPress
 * @subpackage  Ontario Place
 * @since       Ontario Place 1.0.0
 */

if (!class_exists('Timber')) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp/wp-admin/plugins.php#timber">/wp/wp-admin/plugins.php</a>';
    return;
}

$templates = array('archive.twig', 'index.twig');

$data = Timber::get_context();

$data['title'] = 'Archive';
if (is_day()) {
    $data['title'] = 'Archive: '.get_the_date('D M Y');
} elseif (is_month()) {
    $data['title'] = 'Archive: '.get_the_date('M Y');
} elseif (is_year()) {
    $data['title'] = 'Archive: '.get_the_date('Y');
} elseif (is_tag()) {
    $data['title'] = single_tag_title('', false);
} elseif (is_category()) {
    $data['title'] = single_cat_title('', false);
    array_unshift($templates, 'archive-' . get_query_var('cat') . '.twig');
} elseif (is_post_type_archive()) {
    $data['title'] = post_type_archive_title('', false);
    array_unshift($templates, 'archive-' . get_post_type() . '.twig');
}
$data['posts'] = Timber::get_posts();

$blog_ID = get_option('page_for_posts');
$data['blog_page'] = new TimberPost($blog_ID);

Timber::render($templates, $data);
