<?php
if (function_exists('acf_add_local_field_group')):
    acf_add_local_field_group(array(
        'key' => 'group_583722525f1ab',
        'title' => 'Details',
        'fields' => array(
            array(
                'key' => 'field_583b9d350f644',
                'label' => 'Accordion',
                'name' => 'accordion',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'collapsed' => 'field_583b9d430f645',
                'min' => '',
                'max' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
                'sub_fields' => array(
                    array(
                        'key' => 'field_583b9d430f645',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => ''
                    ),
                    array(
                        'key' => 'field_583b9d4a91gvahjk6',
                        'label' => 'Excerpt',
                        'name' => 'excerpt',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => ''
                    ),
                    array(
                        'key' => 'field_583b9d4a0dsahjk6',
                        'label' => 'Content',
                        'name' => 'content',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1
                    ),
                    array(
                        'key' => 'field_5940044d981g6',
                        'label' => 'Background Color',
                        'name' => 'color',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'choices' => array(
                            '#0c0935' => 'Dark Blue',
                            '#0f5169' => 'Blue',
                            '#179d9a' => 'Teal',
                            '#58b884' => 'Green'
                        ),
                        'default_value' => array(
                            0 => '#0c0834'
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => ''
                    )
                )
            ),
            array(
                'key' => 'field_59400426c3d43',
                'label' => 'Colored Content Block',
                'name' => 'colored_content_block',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'collapsed' => 'field_59400435c3d44',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_59400435c3d44',
                        'label' => 'Title',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => ''
                    ),
                    array(
                        'key' => 'field_59400444c3d45',
                        'label' => 'Body',
                        'name' => 'body',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'full',
                        'media_upload' => 1,
                        'delay' => 0
                    ),
                    array(
                        'key' => 'field_5940044dc3d46',
                        'label' => 'Background Color',
                        'name' => 'color',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'choices' => array(
                            '#0c0834' => 'Dark Blue',
                            '#115168' => 'Blue',
                            '#1b9c9a' => 'Teal',
                            '#58b884' => 'Green'
                        ),
                        'default_value' => array(
                            0 => '#0c0834'
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => ''
                    )
                )
            ),
            array(
                'key' => 'field_581js9sb6673a',
                'label' => 'Listing Widget',
                'name' => 'listing_widget',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'collapsed' => 'field_58176a066673b',
                'min' => '',
                'max' => '',
                'layout' => 'row',
                'button_label' => 'Add New Listing Widget',
                'sub_fields' => array(
                    array(
                        'key' => 'field_56eaf92b2d7e2',
                        'label' => 'Post Type',
                        'name' => 'post_types',
                        'type' => 'select',
                        'instructions' => 'Choose the type of post to display on this page',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'choices' => array(
                            'page' => 'Page',
                            'post' => 'News',
                            'tribe_events' => 'Events',
                            'careers' => 'Careers',
                            'resource' => 'Resource',
                            'festivals' => 'Festivals'
                        ),
                        'default_value' => array(),
                        'allow_null' => 0,
                        'multiple' => 1,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'disabled' => 0,
                        'readonly' => 0
                    ),
                    array(
                        'key' => 'field_584e426d49ebc',
                        'label' => 'Load More',
                        'name' => 'load_more',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'message' => '',
                        'default_value' => 0
                    ),
                    array(
                        'key' => 'field_583hs7s4ks99361',
                        'label' => 'Label',
                        'name' => 'label',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => ''
                    ),
                    array(
                        'key' => 'field_588261s4k926261',
                        'label' => 'Item Labels',
                        'name' => 'button_label',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_584e426d49ebc',
                                    'operator' => '==',
                                    'value' => '1'
                                )
                            )
                        ),
                        'wrapper' => array(
                            'width' => '50',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => ''
                    ),
                    array(
                        'key' => 'field_5819s9bc9f69f',
                        'label' => 'Link',
                        'name' => 'link',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => ''
                    ),
                    array(
                        'key' => 'field_58110js79f6a0',
                        'label' => 'Link Label',
                        'name' => 'link_label',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => 30,
                        'readonly' => 0,
                        'disabled' => 0
                    ),
                    array(
                        'key' => 'field_570bba382b24e3',
                        'label' => 'Per Page',
                        'name' => 'per_page',
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => 10,
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                        'readonly' => 0,
                        'disabled' => 0
                    ),
                    array(
                        'key' => 'field_5832s7s8c421',
                        'label' => 'Select a taxonomy to show filters for',
                        'name' => 'visible_filters',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_584e426d49ebc',
                                    'operator' => '!=',
                                    'value' => '1'
                                )
                            )
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'choices' => array(
                            'category' => 'Categories',
                            'topic' => 'Topics'
                        ),
                        'default_value' => array(),
                        'allow_null' => 0,
                        'multiple' => 1,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => ''
                    ),
                    array(
                        'key' => 'field_583hs7sjs8a361',
                        'label' => 'Extra Query Options',
                        'name' => 'extra_query',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => ''
                    )
                )
            )
        ),
        
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => ''
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_593992184c6f9',
        'title' => 'Footer Address',
        'fields' => array(
            array(
                'key' => 'field_5939922444c83',
                'label' => 'English Formatted Address',
                'name' => 'english_formatted_address',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0
            ),
            array(
                'key' => 'field_5939931944c84',
                'label' => 'French Formatted Address',
                'name' => 'french_formatted_address',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-site-info'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => ''
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_5939ab602826c',
        'title' => 'Subscribe Panel',
        'fields' => array(
            array(
                'key' => 'field_5939ab7f9e622',
                'label' => 'English Subscription Blurb',
                'name' => 'english_subscription_blurb',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0
            ),
            array(
                'key' => 'field_5939abaa9e623',
                'label' => 'French Subscription Blurb',
                'name' => 'french_subscription_blurb',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0
            ),
            array(
                'key' => 'field_5939abbb9e624',
                'label' => 'English Mailchimp Subscription Link',
                'name' => 'english_mailchimp_subscription_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => ''
            ),
            array(
                'key' => 'field_5939abd29e625',
                'label' => 'French Mailchimp Subscription Link',
                'name' => 'french_mailchimp_subscription_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => ''
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-site-info'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => ''
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_5939b2d5b5197',
        'title' => 'Details',
        'fields' => array(
            array(
                'key' => 'field_5939b2e31e934',
                'label' => 'Show Subscription Details',
                'name' => 'show_subscription',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => ''
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => ''
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_5815d536b8377',
        'title' => 'Post Type Homes',
        'fields' => array(
            array(
                'key' => 'field_581769db6673a',
                'label' => 'Post Type Homes',
                'name' => 'post_type_homes',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => ''
                ),
                'collapsed' => 'field_58176a066673b',
                'min' => '',
                'max' => '',
                'layout' => 'table',
                'button_label' => 'Add Row',
                'sub_fields' => array(
                    array(
                        'key' => 'field_58176a066673b',
                        'label' => 'Post Type',
                        'name' => 'post_type',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'choices' => array(
                            'tribe_events' => "Events"
                        ),
                        'default_value' => array(),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'placeholder' => '',
                        'disabled' => 0,
                        'readonly' => 0
                    ),
                    array(
                        'key' => 'field_58176a1c6673c',
                        'label' => 'Home Location',
                        'name' => 'home_location',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => ''
                        ),
                        'post_type' => array(
                            0 => 'page'
                        ),
                        'taxonomy' => array(),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'ui' => 1
                    )
                )
            )
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-site-info'
                )
            )
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => ''
    ));
endif;