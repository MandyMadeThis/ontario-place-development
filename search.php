<?php
/**
 * Search results page
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

$templates = array('search.twig', 'archive.twig', 'index.twig');
$context = Timber::get_context();

$context['title'] = pll_e('Search results for'). ' '.get_search_query();
$context['posts'] = Timber::get_posts();

Timber::render($templates, $context);
