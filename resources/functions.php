<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin', 'cpt']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

    function create_nav_menu_object_tree( $nav_menu_items_array ) {
        foreach ( $nav_menu_items_array as $key => $value ) {
            $value->children = array();
            $nav_menu_items_array[ $key ] = $value;
        }
    
        $nav_menu_levels = array();
        $index = 0;
        if ( ! empty( $nav_menu_items_array ) ) do {
            if ( $index == 0 ) {
                foreach ( $nav_menu_items_array as $key => $obj ) {
                    if ( $obj->menu_item_parent == 0 ) {
                        $nav_menu_levels[ $index ][] = $obj;
                        unset( $nav_menu_items_array[ $key ] );
                    }
                }
            } else {
                foreach ( $nav_menu_items_array as $key => $obj ) {
                    if ( in_array( $obj->menu_item_parent, $last_level_ids ) ) {
                        $nav_menu_levels[ $index ][] = $obj;
                        unset( $nav_menu_items_array[ $key ] );
                    }
                }
            }
            $last_level_ids = wp_list_pluck( $nav_menu_levels[ $index ], 'db_id' );
            $index++;
        } while ( ! empty( $nav_menu_items_array ) );
    
        $nav_menu_levels_reverse = array_reverse( $nav_menu_levels );
    
        $nav_menu_tree_build = array();
        $index = 0;
        if ( ! empty( $nav_menu_levels_reverse ) ) do {
            if ( count( $nav_menu_levels_reverse ) == 1 ) {
                $nav_menu_tree_build = $nav_menu_levels_reverse;
            }
            $current_level = array_shift( $nav_menu_levels_reverse );
            if ( isset( $nav_menu_levels_reverse[ $index ] ) ) {
                $next_level = $nav_menu_levels_reverse[ $index ];
                foreach ( $next_level as $nkey => $nval ) {
                    foreach ( $current_level as $ckey => $cval ) {
                        if ( $nval->db_id == $cval->menu_item_parent ) {
                            $nval->children[] = $cval;
                        }
                    }
                }
            }
        } while ( ! empty( $nav_menu_levels_reverse ) );
    
        $nav_menu_object_tree = $nav_menu_tree_build[ 0 ];
        return $nav_menu_object_tree;
    }

    //*** Tidy Excerpts ***/
    
    function wpshout_change_and_link_excerpt( $more ) {
        if ( is_admin() ) {
            return $more;
        }
    
        // Change text, make it link, and return change
        return ' &hellip;';
     }
     add_filter( 'excerpt_more', 'wpshout_change_and_link_excerpt', 999 );

     function wpshout_longer_excerpts( $length ) {
        // Don't change anything inside /wp-admin/
        if ( is_admin() ) {
            return $length;
        }
        // Set excerpt length to 32 words
        return 32;
    }
    // "999" priority makes this run last of all the functions hooked to this filter, meaning it overrides them
    add_filter( 'excerpt_length', 'wpshout_longer_excerpts', 999 );