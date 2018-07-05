<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
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
if (function_exists('pll_current_language') && pll_current_language('slug') === 'fr') {
    Timber::render('404-fr.twig', $context);
} else {
    Timber::render('404.twig', $context);
}
