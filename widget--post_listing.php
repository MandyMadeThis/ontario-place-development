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

$context['widget_tax_query'] = array();
$context['widget_meta_query'] = array();
$context['widget_active_filters'] = array();
$context['widget_search_query'] = (isset($_GET['search']) ? $_GET['search'] : '');
$disabled_terms = array();
$valid_taxonomies = null;
$tax_query = array();
$offset = $args['offset'];
$ignore_load_more = $args['ignore_load_more'];

if (!$args['use_page_args']) {
  $context['widget_can_search'] = get_field("can_search", "widget_{$this->id}");
  $context['widget_label'] = get_field("label", "widget_{$this->id}");

  $context['widget_num_listing_items'] = get_field("num_listing_items", "widget_{$this->id}");
  $context['widget_post_types'] = get_field("post_types", "widget_{$this->id}");
  $context['widget_show_ctas'] = get_field("show_ctas", "widget_{$this->id}");

  $tax_query = get_field("filter_by_terms", "widget_{$this->id}");
  $meta_query = get_field("extra_query", "widget_{$this->id}");

  $valid_taxonomies = get_field("visible_filters", "widget_{$this->id}");
} else if (isset($post) && $post->ID > 0) {
  $listing_widget = get_field("listing_widget", $post->ID);
  $listing_widget = $listing_widget[$args['index']];
  $context['widget_can_search'] = $listing_widget["can_search"];
  $context['widget_label'] = $listing_widget["label"];

  $context['widget_num_listing_items'] = $listing_widget["num_listing_items"];
  $context['widget_post_types'] = $listing_widget["post_types"];
  $context['widget_show_ctas'] = $listing_widget["show_ctas"];

  $meta_query = $listing_widget['extra_query'];
  $tax_query = $listing_widget["filter_by_terms"];
  $valid_taxonomies = $listing_widget["visible_filters"];
}

if (!empty($tax_query)) {
    if (sizeof($tax_query) > 1) {
        $context['widget_tax_query']['relation'] = 'OR';
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
            $query_term = array(
                'taxonomy'  => $t['def_tax_sublist__taxonomy'],
                'field'     => 'slug',
                'terms'     => (is_array($t['def_tax_sublist__term']) ? $t['def_tax_sublist__term'] : array($t['def_tax_sublist__term'])),
                'operator'  => (strpos($t['taxonomy_equal'], 'not') !== FALSE ? 'NOT IN' : 'IN')
            );
            if ($query_term['operator'] == 'NOT IN') {
              foreach ($query_term['terms'] as $term) {
                $disabled_terms[] = $query_term['taxonomy'].'='.$term;
              }
            }
            $innerTax[] = $query_term;
        }
        $context['widget_tax_query'][] = $innerTax;
    }
}

if (!empty($meta_query)) {
    $meta_query = explode('&', $meta_query);
    if (sizeof($meta_query) > 1) {
        $context['widget_meta_query']['relation'] = 'OR';
    }
    foreach ($meta_query as $query) {
      if (strpos($query, '!=') !== FALSE) {
        $query = explode('!=', $query);
        $context['widget_meta_query'][] = array(
          'key' => $query[0],
          'value' => $query[1],
          'compare' => '!=',
        );
      } else {
        $query = explode('=', $query);
        $context['widget_meta_query'][] = array(
          'key' => $query[0],
          'value' => $query[1],
          'compare' => '=',
        );
      }
    }
}
if ($valid_taxonomies) {
  foreach ($valid_taxonomies as $tax) {
    $taxonomyFilter = array();
    foreach(get_terms($tax, array('hide_empty' => true, 'lang' => 'en')) as $term) {
      if (in_array($tax.'='.$term->slug, $disabled_terms)) { continue; }
      $taxonomyFilter[] = array(
        'term_id'   => $term->term_id,
        'slug'      => $term->slug,
        'name'      => $term->name,
        'active'    => (isset($_GET[$tax]) && in_array($term->slug, explode(',', $_GET[$tax])))
      );
    }
    if (!empty($taxonomyFilter)) {
      $context['widget_filter_terms'][$tax] = $taxonomyFilter;
    }

    if (isset($_GET[$tax])) {
      if (sizeof($context['widget_tax_query']) > 0) {
        $tmp_tax_query = $context['widget_tax_query'];
        $context['widget_tax_query'] = array(
          'relation' => 'AND',
          $tmp_tax_query,
        );
      }
      $context['widget_tax_query'][] =array(
        'taxonomy'  => $tax,
        'field'     => 'slug',
        'terms'     => explode(',', $_GET[$tax]),
        'operator'  => 'IN'
      );
    }
  }
}

if (!is_array($context['widget_post_types'])) { $context['widget_post_types'] = array($context['widget_post_types']); }
$args = array(
  'post_type'         => $context['widget_post_types'],
  'posts_per_page'    => $context['widget_num_listing_items'],
  'paged'             => $paged,
  'tax_query'         => $context['widget_tax_query'],
  'meta_query'        => $context['widget_meta_query'],
  'post_status'       => array('publish', 'future', 'inherit')
);

if (isset($context['widget_search_query'])) {
  $args['s'] = $context['widget_search_query'];
}
if (!pll_is_translated_post_type($args['post_type'])) {
    $args['lang'] = '';
}

$events_query = '';
if (!empty($offset)) {
  $args['offset'] = $offset;
}
query_posts($args);

$context['widget_posts'] = Timber::get_posts();
$context['widget_pagination'] = Timber::get_pagination();

$load_more_text = pll__('Load More');
$loading_text = pll__('Loading');
$load_more = "[ajax_load_more
  post_type=\"".(implode($context['widget_post_types'], ','))."\"
  posts_per_page=\"{$context['widget_num_listing_items']}\"
  offset=\"{$context['widget_num_listing_items']}\"
  scroll=\"false\"
  pause=\"true\"
  transition=\"slide\"
  button_label=\"".$load_more_text."\"
  button_loading_label=\"".$loading_text."\"
  css_classes=\"grid\"
  transition_container=\"true\"
  ".(!empty($context['widget_tax_query']) ? "taxonomy=\"".htmlspecialchars(serialize($context['widget_tax_query']))."\"" : "")."
  ".(isset($context['widget_search_query']) && !empty($context['widget_search_query']) ? "search=\"{$context['widget_search_query']}\"" : "")."
 ]";

if (empty($ignore_load_more)) {
  $context['widget_load_more'] = do_shortcode($load_more);
}
$templates = 'widget--post-listing.twig';
Timber::render($templates, $context);
