<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
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

$context = Timber::get_context();

print_r($context);
exit;
$context['posts'] = Timber::get_posts();
$templates = array( 'index.twig' );
if (is_home()) {
    $post = new TimberPost();
    $context['post'] = $post;

    array_unshift($templates, 'home.twig');
}
Timber::render($templates, $context);
