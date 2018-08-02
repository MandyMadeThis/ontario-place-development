<?php
require_once __DIR__ . '/lib/acf.php';

if (class_exists('Timber')) {
    require_once __DIR__ . '/lib/site.php';
}

add_theme_support('menus');
add_theme_support('post-thumbnails');

add_filter('timber_context', function ($data) {
    $data['menu'] = new TimberMenu('primary');
    $data['sidebar_menu'] = new TimberMenu('sidebar');
    $data['social_nav'] = new TimberMenu('social-menu');
    $data['legal_nav'] = new TimberMenu('legal');
    $data['footer_nav'] = new TimberMenu('footer');

    $data['options'] = get_fields('options');
    $data['is_front_page'] = is_front_page();

    $data['before_content'] = Timber::get_widgets('before_content');
    $data['after_content'] = Timber::get_widgets('after_content');
    $data['page_sidebar'] = Timber::get_widgets('page_sidebar');

    // Filters out the proper icon for the social media link.
    foreach ($data['social_nav']->items as $key => $nav_item) {
        if (preg_match('/twitter\.com/', $nav_item->url)) {
            $data['social_nav']->items[$key]->socialProvider = 'twitter';
        } elseif (preg_match('/facebook\.com/', $nav_item->url)) {
            $data['social_nav']->items[$key]->socialProvider = 'facebook';
        } elseif (preg_match('/soundcloud\.com/', $nav_item->url)) {
            $data['social_nav']->items[$key]->socialProvider = 'cloud';
        } elseif (preg_match('/instagram\.com/', $nav_item->url)) {
            $data['social_nav']->items[$key]->socialProvider = 'instagram';
        } elseif (preg_match('/youtube\.com/', $nav_item->url)) {
            $data['social_nav']->items[$key]->socialProvider = 'youtube';
        }
    }

    $languageSwitch = pll_the_languages(array('raw' => 1));
    $data['menu_language_switch'] = array();
    foreach ($languageSwitch as $language) {
        $data['menu_language_switch'][$language['slug']] = array(
            'url'       => $language['url'],
            'active'    => $language['current_lang'],
            'name'      => strtoupper($language['slug'])
        );
    }

    $tmpPostTypes = array();
    if ($data['options'] && array_key_exists('post_type_homes', $data['options'])) {
        foreach ($data['options']['post_type_homes'] as $home) {
            $tmpPostTypes[$home['post_type']] = $home['home_location'];
        }
    }
    $data['options']['post_type_homes'] = $tmpPostTypes;
    $data['sidebar_menu'] = get_page_sidebar($data['options']['post_type_homes'], $data['sidebar_menu']);

    global $post;
    $data['has_calendar'] = false;
    if ($post) {
        $data['has_calendar'] = strpos($post->post_content, '[tribe_events') !== false;
    }
    $data['post_parent'] = new TimberPost($data['options']['post_type_homes'][$post->post_type]->ID);
    $data['post'] = new TimberPost($post->ID);

    return $data;
});

function get_page_sidebar($homes, $menu) {
    global $post;
    if (!$post) {
        return null;
    }
    if ($post->post_type == 'page') {
        foreach ($menu->items as $index => $menuItem) {
            if (strpos(get_permalink($post), $menuItem->url) !== false) {
                return $menuItem;
            }
        }
    }
    foreach ($homes as $home) {
        if ($home->post_type == $post->post_type) {
            $location = $home->home_location;
            foreach ($menu->items as $index => $menuItem) {
                if (strpos(get_permalink($location), $menuItem->url) !== false) {
                    return $menuItem;
                }
            }
        }
    }
    return null;
}

function get_breadcrumbs($post, $post_homes) {
    if (pll_current_language('slug') === 'en') {
        $breadcrumbs = array(
        array(
            'title' => 'Home',
            'url'   => '/'
        )
    );
    } elseif (pll_current_language('slug') === 'fr') {
        $breadcrumbs = array(
        array(
            'title' => 'Accueil',
            'url'   => '/'
        )
    );
    }
    $postId = $post->ID;
    if ($post->post_type !== 'page' && isset($post_homes[$post->post_type])) {
        $parent = $post_homes[$post->post_type];
        if ($parent) {
            $postId = $parent->ID;
        }
    }
    foreach (array_reverse(get_ancestors($postId, 'page')) as $pageId) {
        $page = get_post($pageId);
        $breadcrumbs[] = array(
            'title'  => $page->post_title,
            'url'    => get_permalink($pageId)
        );
    }
    if ($post->ID != $postId) {
        $breadcrumbs[] = array(
            'title' => $post_homes[$post->post_type]->post_title,
            'url'    => get_permalink($postId)
        );
    }
    $breadcrumbs[] = array(
        'title'   => $post->post_title
    );
    return $breadcrumbs;
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page('Site Info');
}

function load_script($name, $src, $footer = true) {
    wp_register_script($name, $src, array(), null, $footer);
    wp_enqueue_script($name);
}

function load_style($name, $src, $media = 'all') {
    wp_register_style($name, $src, false, null, $media);
    wp_enqueue_style($name);
}
add_action('admin_enqueue_scripts', 'load_admin_assets');

function load_styles() {
  load_style('ontario-place', get_stylesheet_directory_uri() . '/assets/css/style.min.css');
}
add_action('wp_enqueue_scripts', 'load_styles');

function load_scripts() {
  wp_register_script('jquery', false, array('jquery-core', 'jquery-migrate'), false, true);
  wp_register_script('jquery-core', '/wp/wp-includes/js/jquery/jquery.js', array(), false, 0);
  wp_register_script('jquery-migrate', '/wp/wp-includes/js/jquery/jquery-migrate.js', array(), false, 0);

  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-core');
  wp_enqueue_script('jquery-migrate');
}
add_action('wp_enqueue_scripts', 'load_scripts');

function load_footer_scripts() {
  load_script('ontario-place', get_stylesheet_directory_uri() . '/assets/js/script.min.js', true);
}

function wp_trim_content($title, $append, $size = 110) {
    $title = wp_trim_words($title);
    if (strlen($title) > $size) {
        return substr($title, 0, $size).$append;
    }
    return $title;
}

function asset_path($path) {
    return get_stylesheet_directory_uri() . '/assets/' . $path;
}

add_shortcode('widget', 'widget');

function widget($atts) {
    global $wp_widget_factory;

    extract(shortcode_atts(array(
    'widget_name'   => false,
    'use_page_args' => false,
    'post'          => 0,
    'index'         => 0,
    'offset'        => '',
    'ignore_load_more'  => ''
  ), $atts));

    $widget_name = wp_specialchars($widget_name);

    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')) {
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')) {
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"), '<strong>'.$class.'</strong>').'</p>';
        } else {
            $class = $wp_class;
        }
    }

    ob_start();
    the_widget($widget_name, array(), array('use_page_args' => $use_page_args, 'index' => $index, 'offset' => $offset, 'ignore_load_more' => $ignore_load_more, 'post' => $post));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

function localize_date($date, $format) {
    if (pll_current_language('slug') == 'fr') {
        setlocale(LC_ALL, 'fr_FR');
    }
    return strftime($format, strtotime($date));
}

function get_page_slider($post_id = null) {
    global $post;

    if (!$post_id && $post) {
        $post_id = $post->ID;
    }
    if (!$post_id) {
        return;
    }

    $slider = get_post_meta($post_id, '_slider', true);

    $ret = false;
    if ($slider) {
        $term = get_term($slider, 'slider');
        if (isset($term->slug)) {
            $ret = $term->slug;
        }
    }

    return $ret;
}

if (class_exists('Site')) {
    Site::register_sidebars();
    if (function_exists('pll_register_string')) {
        pll_register_string('menu', "MENU", false);
        pll_register_string('email', "Email", false);
        pll_register_string('tel', "Tel", false);
        pll_register_string('view_map', "View Map", false);
        pll_register_string('copyright', "All Rights Reserved &copy; 2017", false);
        pll_register_string('expand', "Expand", false);
        pll_register_string('404_message', "Sorry, we couldn't find what you're looking for.", false);
        pll_register_string('password', "Password", false);
        pll_register_string('submit', "Submit", false);
        pll_register_string('read_more', "Read More", false);

        pll_register_string('subscribe_whats_going_on', "Always know what's going on", false);
        pll_register_string('subscribe_close_form', "Close Subscribe Form", false);
        pll_register_string('subscribe_sign_up', "Sign-up for our newsletter", false);
        pll_register_string('subscribe_open', "Open Subscribe Form", false);
        pll_register_string('subscribe_first_name', "First Name", false);

        pll_register_string('subscribe_last_name', "Last Name", false);
        pll_register_string('subscribe_email', "Email Address", false);
        pll_register_string('subscribe_submit', "Subscribe", false);
        pll_register_string('export_events', "Export Events", false);

        pll_register_string('date_1', "Monday", false);
        pll_register_string('date_2', "Tuesday", false);
        pll_register_string('date_3', "Wednesday", false);
        pll_register_string('date_4', "Thursday", false);
        pll_register_string('date_5', "Friday", false);
        pll_register_string('date_6', "Saturday", false);
        pll_register_string('date_7', "Sunday", false);

        pll_register_string('date__d1', "Mon", false);
        pll_register_string('date__d2', "Tue", false);
        pll_register_string('date__d3', "Wed", false);
        pll_register_string('date__d4', "Thu", false);
        pll_register_string('date__d5', "Fri", false);
        pll_register_string('date__d6', "Sat", false);
        pll_register_string('date__d7', "Sun", false);

        pll_register_string('date_m_1', "January", false);
        pll_register_string('date_m_2', "February", false);
        pll_register_string('date_m_3', "March", false);
        pll_register_string('date_m_4', "April", false);
        pll_register_string('date_m_5', "May", false);
        pll_register_string('date_m_6', "June", false);
        pll_register_string('date_m_7', "July", false);
        pll_register_string('date_m_8', "August", false);
        pll_register_string('date_m_9', "September", false);
        pll_register_string('date_m_10', "October", false);
        pll_register_string('date_m_11', "November", false);
        pll_register_string('date_m_12', "December", false);

        pll_register_string('date_m_s_1', "Jan", false);
        pll_register_string('date_m_s_2', "Feb", false);
        pll_register_string('date_m_s_3', "Mar", false);
        pll_register_string('date_m_s_4', "Apr", false);
        pll_register_string('date_m_s_5', "May", false);
        pll_register_string('date_m_s_6', "Jun", false);
        pll_register_string('date_m_s_7', "Jul", false);
        pll_register_string('date_m_s_8', "Aug", false);
        pll_register_string('date_m_s_9', "Sep", false);
        pll_register_string('date_m_s_10', "Oct", false);
        pll_register_string('date_m_s_11', "Nov", false);
        pll_register_string('date_m_s_12', "Dec", false);
        pll_register_string('for', "for", false);
        pll_register_string('week', "Week", false);
        pll_register_string('of', "of", false);
        pll_register_string('next_week', "Next Week", false);
        pll_register_string('previousweek', "Previous Week", false);
        pll_register_string('allday', "All Day", false);

        pll_register_string('calendar_google', "Google Calendar", false);
        pll_register_string('calendar_ical', "iCal Export", false);
        pll_register_string('date', "Date", false);
        pll_register_string('time', "Time", false);
        pll_register_string('location', "Location", false);
        pll_register_string('share_facebook', "Share on Facebook", false);
        pll_register_string('share_twitter', "Share on Twitter", false);
        pll_register_string('event_dates', "Event Dates", false);
        pll_register_string('event_url', "Event URL", false);
        pll_register_string('event', "Events", false);
		pll_register_string('event-details', "Event Details", false);


    }

    add_action('init', function () {
        Site::register_menus();
        Site::add_image_sizes();
        Site::register_post_types();
    });

    add_action('widgets_init', function () {
        Site::register_widgets();
    });
}
