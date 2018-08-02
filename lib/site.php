<?php
class Site extends TimberSite{
    public static function register_post_types() {
    }

    public static function register_menus() {
        register_nav_menus(array(
            'primary' => 'Primary Menu',
            'sidebar' => 'Sidebar Menu',
            'legal' => 'Legal Menu',
            'social' => 'Social Menu',
            'footer' => 'Footer Menu'
        ));
    }

    public static function register_sidebars() {
        $before_title = '<h2 class="widget-title">';
        $after_title = '</h2>';
        $before_widget = '<div class="widget widget-type-%2$s">';
        $after_widget = '</div>';

        $sidebars = array(
            array(
                'name' => __('Before Content', 'ontario-place'),
                'id' => 'before_content',
                'description' => __('', 'ontario-place'),
                'before_title' => $before_title,
                'after_title' => $after_title,
                'before_widget' => $before_widget,
                'after_widget' => $after_widget,
            ),
            array(
                'name' => __('After Content', 'ontario-place'),
                'id' => 'after_content',
                'description' => __('', 'ontario-place'),
                'before_title' => $before_title,
                'after_title' => $after_title,
                'before_widget' => $before_widget,
                'after_widget' => $after_widget,
            ),
            array(
                'name' => __('Page Sidebar', 'ontario-place'),
                'id' => 'page_sidebar',
                'before_title' => $before_title,
                'after_title' => $after_title,
                'before_widget' => $before_widget,
                  'after_widget' => $after_widget,
            ),
            array(
                'name' => __('Post Sidebar', 'ontario-place'),
                'id' => 'post_sidebar',
                'before_title' => $before_title,
                'after_title' => $after_title,
                'before_widget' => $before_widget,
                'after_widget' => $after_widget,
            ),
        );

        foreach ($sidebars as $sidebar) {
            register_sidebar($sidebar);
        }
    }

    public static function register_widgets() {
        $widgets = array(
            'widget' => 'WPH_Widget',
            'post_listing' => 'Post_Listing_Widget',
            'upcoming_posts' => 'Upcoming_Posts_Widget'
          );

        foreach ($widgets as $slug => $classname) {
            require(__DIR__ . '/widgets/' . $slug . '.php');
            if ($slug != 'widget') {
                register_widget($classname);
            }
        }
    }

    public static function add_image_sizes() {
        add_image_size('recent_post_large', 679, 342, $crop = true); // Posts in recent posts widget
        add_image_size('recent_post_small', 284, 189, $crop = true); // Posts in recent posts widget
        add_image_size('recent_post', 430, 322, $crop = true);       // Posts in recent posts listing
        add_image_size('body', 1040, 460, $crop = true);             // Image in page/post body
    }
}
