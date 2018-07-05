<?php
if (!class_exists('Upcoming_Posts_Widget')) {
  class Upcoming_Posts_Widget extends WPH_Widget {
    function __construct() {
      $args = array(
        'label' => __('Upcoming Posts', 'faculty-of-information'),
        'description' => __('Shows a list of upcoming posts', 'faculty-of-information'),
      );
      $this->create_widget($args);
    }

    function widget($args, $instance) {
      $template = locate_template('widget--upcoming_posts.php');
      include $template;
    }

    function register_acf() {
      if( function_exists('acf_add_local_field_group') ):
      acf_add_local_field_group(array (
        'key' => 'group_58313d6558d0e',
        'title' => 'Upcoming Posts',
        'fields' => array (
          array (
            'key' => 'field_583202e3c3cdd',
            'label' => 'Post Types',
            'name' => 'post_types',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'choices' => array (
              'page' => 'Page',
              'artist' => 'Artist',
              'download' => 'Download',
              'news' => 'News',
              'partner' => 'Partner',
            ),
            'default_value' => array (
            ),
            'allow_null' => 0,
            'multiple' => 1,
            'ui' => 1,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
          ),
          array (
            'key' => 'field_583204884b025',
            'label' => 'Number Of Items To load',
            'name' => 'num_listing_items',
            'type' => 'number',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => 3,
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => '',
            'max' => '',
            'step' => '',
          ),
          array (
            'key' => 'field_583204a84b026',
            'label' => 'Widget Title',
            'name' => 'label',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_583204db4b027',
            'label' => 'Button Label',
            'name' => 'button_label',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_583204e54b028',
            'label' => 'Button Link',
            'name' => 'button_link',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array (
            'key' => 'field_5832055cfc41f',
            'label' => 'Filter By Terms',
            'name' => 'filter_by_terms',
            'type' => 'repeater',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'collapsed' => '',
            'min' => '',
            'max' => '',
            'layout' => 'row',
            'button_label' => 'OR',
            'sub_fields' => array (
              array (
                'key' => 'field_58320575fc420',
                'label' => 'Taxonomy',
                'name' => 'taxonomy_sublist',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array (
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'collapsed' => '',
                'min' => '',
                'max' => '',
                'layout' => 'block',
                'button_label' => 'AND',
                'sub_fields' => array (
                  array (
                    'key' => 'field_583205a5fc421',
                    'label' => 'Taxonomy',
                    'name' => 'def_tax_sublist__taxonomy',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'choices' => array (
                      'slider' => 'Sliders',
                      'course_categories' => 'Course Categories',
                      'event_topics' => 'Event Topics',
                      'event_categories' => 'Event Categories',
                      'news_topics' => 'News Topics',
                      'news_categories' => 'News Categories',
                    ),
                    'default_value' => array (
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                  ),
                  array (
                    'key' => 'field_583208b5fc422',
                    'label' => 'Operator',
                    'name' => 'taxonomy_equal',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'choices' => array (
                      'not' => 'NOT IN',
                      'in' => 'IN',
                    ),
                    'default_value' => array (
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                  ),
                  array (
                    'key' => 'field_583208f0fc423',
                    'label' => 'Terms',
                    'name' => 'def_tax_sublist__term',
                    'type' => 'select',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                      'width' => '',
                      'class' => '',
                      'id' => '',
                    ),
                    'choices' => array (
                      'homepage' => 'Homepage',
                      'testing' => 'Testing',
                    ),
                    'default_value' => array (
                    ),
                    'allow_null' => 0,
                    'multiple' => 1,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                  ),
                ),
              ),
            ),
          ),
        ),
        'location' => array (
          array (
            array (
              'param' => 'widget',
              'operator' => '==',
              'value' => 'upcoming-posts',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
      ));

      endif;
    }
  }
}
