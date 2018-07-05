<?php
/*
 * Third party plugins that hijack the theme will call wp_head() to get the header template.
 * We use this to start our output buffer and render into the view/page-plugin.twig template in footer.php
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

$GLOBALS['timberContext'] = Timber::get_context();
ob_start();
