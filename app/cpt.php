<?php

namespace App;

/**
 * Register custom post types
 */

add_action('init', 
  function (){

    register_post_type('people',
        array(
          'labels' => array(
            'name' 				=> __('People'),
            'singular_name' 	=> __('Person'),
            'add_new'           => _x('Add New', 'people'),
              'add_new_item'      => __('Add New Person'),
              'edit_item'         => __('Edit Person'),
              'new_item'          => __('New Person'),
              'all_items'         => __('All People'),
              'view_item'         => __('View People'),
              'search_items'      => __('Search People'),
              'not_found'         => __('No people found'),
              'not_found_in_trash'=> __('No people found in the Trash'), 
              'parent_item_colon' => '',
              'menu_name'         => 'People'
          ),
          'description' => 'People',
          'public' => true,
          'has_archive' => true,
          'menu_icon' => 'dashicons-groups',
          'rewrite' => array('slug' => 'people'),
          'supports' => array('title', 'editor', 'excerpt')
        )
      );

    register_post_type('resource',
        array(
          'labels' => array(
            'name' 				=> __('Resources'),
            'singular_name' 	=> __('Resource'),
            'add_new'           => _x('Add New', 'resource'),
              'add_new_item'      => __('Add New Resource'),
              'edit_item'         => __('Edit Resource'),
              'new_item'          => __('New Resource'),
              'all_items'         => __('All Resources'),
              'view_item'         => __('View Resource'),
              'search_items'      => __('Search Resources'),
              'not_found'         => __('No resources found'),
              'not_found_in_trash'=> __('No resources found in the Trash'), 
              'parent_item_colon' => '',
              'menu_name'         => 'Resources'
          ),
          'taxonomies' => array('category'),
          'description' => 'Resources',
          'public' => true,
          'has_archive' => true,
          'menu_icon' => 'dashicons-analytics',
          'rewrite' => array('slug' => 'resource'),
          'supports' => array('title', 'editor', 'excerpt')
        )
      );

      register_post_type('event',
      array(
        'labels' => array(
          'name' 				=> __('Events'),
          'singular_name' 	=> __('Event'),
          'add_new'           => _x('Add New', 'event'),
            'add_new_item'      => __('Add New Event'),
            'edit_item'         => __('Edit Event'),
            'new_item'          => __('New Event'),
            'all_items'         => __('All Events'),
            'view_item'         => __('View Event'),
            'search_items'      => __('Search Events'),
            'not_found'         => __('No events found'),
            'not_found_in_trash'=> __('No events found in the Trash'), 
            'parent_item_colon' => '',
            'menu_name'         => 'Events'
        ),
        'taxonomies' => array('category'),
        'description' => 'Events',
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'event'),
        'supports' => array('title', 'editor', 'excerpt')
      )
    ); 

    // Add new taxonomy, NOT hierarchical (like tags)
    register_taxonomy('person-type','people',array(
      'hierarchical' => true,
      'labels' => array(
        'name' => _x( 'Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Type', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Types' ),
        'popular_items' => __( 'Popular Types' ),
        'all_items' => __( 'All Types' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Type' ), 
        'update_item' => __( 'Update Type' ),
        'add_new_item' => __( 'Add New Type' ),
        'new_item_name' => __( 'New Type Name' ),
        'separate_items_with_commas' => __( 'Separate types with commas' ),
        'add_or_remove_items' => __( 'Add or remove types' ),
        'choose_from_most_used' => __( 'Choose from the most used types' ),
        'menu_name' => __( 'Types' ),
      ),
      'show_ui' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array( 'slug' => 'person-type' ),
    ));

    // Add new taxonomy, NOT hierarchical (like tags)
    register_taxonomy('resource-topic','resource',array(
      'hierarchical' => true,
      'labels' => array(
        'name' => _x( 'Topics', 'taxonomy general name' ),
        'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Topic' ),
        'popular_items' => __( 'Popular Topics' ),
        'all_items' => __( 'All Topics' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Topic' ), 
        'update_item' => __( 'Update Topic' ),
        'add_new_item' => __( 'Add New Topic' ),
        'new_item_name' => __( 'New Topic Name' ),
        'separate_items_with_commas' => __( 'Separate topics with commas' ),
        'add_or_remove_items' => __( 'Add or remove topics' ),
        'choose_from_most_used' => __( 'Choose from the most used topics' ),
        'menu_name' => __( 'Topics' ),
      ),
      'show_ui' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array( 'slug' => 'resource-topic' ),
    ));

    // Add new taxonomy, NOT hierarchical (like tags)
    register_taxonomy('resource-type','resource',array(
      'hierarchical' => true,
      'labels' => array(
        'name' => _x( 'Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Type', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Types' ),
        'popular_items' => __( 'Popular Types' ),
        'all_items' => __( 'All Types' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Type' ), 
        'update_item' => __( 'Update Type' ),
        'add_new_item' => __( 'Add New Type' ),
        'new_item_name' => __( 'New Type Name' ),
        'separate_items_with_commas' => __( 'Separate types with commas' ),
        'add_or_remove_items' => __( 'Add or remove types' ),
        'choose_from_most_used' => __( 'Choose from the most used types' ),
        'menu_name' => __( 'Types' ),
      ),
      'show_ui' => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var' => true,
      'rewrite' => array( 'slug' => 'resource-type' ),
    ));


      flush_rewrite_rules();
    }
);
