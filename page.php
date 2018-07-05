<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
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
$post = new TimberPost();
$context['post'] = $post;

$templates = array('detail-views/' . $post->post_type . '.twig', 'page-'.$post->post_name.'.twig', 'page.twig');
if (is_front_page()) {
    array_unshift($templates, 'front.twig');
}

if (function_exists('pll_current_language') && pll_current_language('slug') === 'fr') {
    setlocale(LC_ALL, 'fr_FR');
}

Timber::render($templates, $context);
