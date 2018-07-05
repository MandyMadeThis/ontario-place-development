<?php
/**
 * The Template for displaying all single posts
 *
 *
 * @package     WordPress
 * @subpackage  Ontario Place
 * @since       Ontario Place 1.0.0
 */

if (!class_exists('Timber')) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp/wp-admin/plugins.php#timber">/wp/wp-admin/plugins.php</a>';
    return;
}

Timber::render(array('sidebar.twig'), $data);
