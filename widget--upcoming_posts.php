<?php
/**
 * The template for displaying a upcoming post.
 *
 * @package     WordPress
 * @subpackage  Faculty of Information
 * @since       Faculty of Information 1.0.0
 */

if (!class_exists('Timber')) {
  echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
  return;
}

global $paged;
global $params;
global $post;

if (!isset($paged) || !$paged){
    $paged = 1;
}

$context = Timber::get_context();
$context['upcoming_tax_query'] = array();
$context['upcoming_active_filters'] = array();

if (!$args['use_page_args']) {
  $context['upcoming_post_types'] = get_field("post_types", "widget_{$this->id}");

  $context['upcoming_label'] = get_field("label", "widget_{$this->id}");
  $context['upcoming_button_label'] = get_field("button_label", "widget_{$this->id}");
  $context['num_listing_items'] = get_field("per_page", "widget_{$this->id}");
  $tax_query = array();
} else if (isset($args['post']) && $args['post'] > 0){
  $listing_widget = get_field("listing_widget", $args['post']);
  $listing_widget = $listing_widget[$args['index']];

  $context['upcoming_post_types'] = $listing_widget['post_types'];

  $context['upcoming_label'] = $listing_widget["label"];
  $context['upcoming_button_label'] = $listing_widget["button_label"];
  $context['num_listing_items'] = $listing_widget["per_page"];

  $tax_query = array();
}

if (!is_array($context['upcoming_post_types'])) { $context['upcoming_post_types'] = array($context['upcoming_post_types']); }

if (!empty($tax_query)) {
    if (sizeof($tax_query) > 1) {
        $context['upcoming_tax_query']['relation'] = 'OR';
    }
    foreach ($tax_query as $tax) {
        $tax = $tax['taxonomy_sublist'];
        if (empty($tax)) { continue; }
        $innerTax = array();

        if (sizeof($tax) > 1) {
            $innerTax['relation'] = 'AND';
        }
        foreach ($tax as $t) {
            if (empty($t)) { continue; }
            $innerTax[] = array(
                'taxonomy'  => $t['def_tax_sublist__taxonomy'],
                'field'     => 'slug',
                'terms'     => (is_array($t['def_tax_sublist__term']) ? $t['def_tax_sublist__term'] : array($t['def_tax_sublist__term'])),
                'operator'  => (strpos($t['taxonomy_equal'], 'not') !== FALSE ? 'NOT IN' : 'IN')
            );
        }
        $context['upcoming_tax_query'][] = $innerTax;
    }
}

$args = array(
    'post_type'         => $context['upcoming_post_types'],
    'posts_per_page'    => $context['num_listing_items'],
    'paged'             => $paged,
    'tax_query'         => $context['upcoming_tax_query'],
    'lang'              => pll_current_language('slug')
);

query_posts($args);

$context['upcoming_posts'] = Timber::get_posts();

$templates = 'widget--upcoming-posts.twig';
Timber::render($templates, $context);
