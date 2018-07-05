<?php
/**
 * The template for displaying Author Archive pages
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

global $wp_query;

$data = Timber::get_context();
$data['posts'] = Timber::get_posts();
if (isset($wp_query->query_vars['author'])) {
    $author = new TimberUser($wp_query->query_vars['author']);
    $data['author'] = $author;
    $data['title'] = 'Author Archives: ' . $author->name();
}

$blog_ID = get_option('page_for_posts');
$data['blog_page'] = new TimberPost($blog_ID);

Timber::render(array('author.twig', 'archive.twig'), $data);
