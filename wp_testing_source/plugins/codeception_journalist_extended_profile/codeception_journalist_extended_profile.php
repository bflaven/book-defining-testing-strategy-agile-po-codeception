<?php
/**
 * @package codeception_journalist_extended_profile
 * @version 1.0
 */
/*
Plugin Name: codeception_journalist_extended_profile
Plugin URI: http://flaven.fr/
Description: Create a post_type named journalists with 2 attached taxonomies: expertises, languages. This plugin is part of the book package: "Defining a test strategy for a P.O? Introduction to a "testing" framework CODECEPTION_. Usecase with WordPress."
Author: Bruno Flaven
Version: 3.0
Author URI: http://flaven.fr/
*/

/*
**
 * Create a taxonomy expertises for the post_type journalists
 */

function journalist_taxonomy_expertises() {
$labels = array(
        'name'              => __( 'Expertises', 'codeception_journalist_extended_profile'),
        'singular_name'     => __( 'Expertise', 'codeception_journalist_extended_profile'),
        'search_items'      => __( 'Search Expertises', 'codeception_journalist_extended_profile'),
        'all_items'         => __( 'All Expertises' , 'codeception_journalist_extended_profile'),
        'parent_item'       => __( 'Parent Expertises', 'codeception_journalist_extended_profile' ),
        'parent_item_colon' => __( 'Parent Expertises:' , 'codeception_journalist_extended_profile'),
        'edit_item'         => __( 'Edit Expertise' , 'codeception_journalist_extended_profile'), 
        'update_item'       => __( 'Update Expertise', 'codeception_journalist_extended_profile' ),
        'add_new_item'      => __( 'Add Expertises' , 'codeception_journalist_extended_profile'),
        'new_item_name'     => __( 'New Expertises', 'codeception_journalist_extended_profile' ),
        'menu_name'         => __( 'Expertises' , 'codeception_journalist_extended_profile'),
    ); 

       $args = array(
        'labels'            => $labels,
        'public'            =>  true,
        'show_in_rest'      => true,
        'has_archive'       =>  true,
        'hierarchical'      =>  true, 
        'query_var'         => 'expertises',
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_tagcloud'     => true,
        'show_in_nav_menus' =>  true,
        'rewrite'           =>  array('slug' => '/expertises', 'with_front' => true, 'hierarchical' => true),
    );
       // taxonomy-journalists-expertises.php

      $post_types = array("journalists");
  register_taxonomy( 'expertises', $post_types, $args );
}
add_action( 'init', 'journalist_taxonomy_expertises');
  
/*
**
 * Create a taxonomy languages for the post_type journalists
 */
function journalist_taxonomy_languages() {
$labels = array(
        'name'              => __( 'Languages' , 'codeception_journalist_extended_profile'),
        'singular_name'     => __( 'Language', 'codeception_journalist_extended_profile' ),
        'search_items'      => __( 'Search Languages', 'codeception_journalist_extended_profile' ),
        'all_items'         => __( 'All Languages', 'codeception_journalist_extended_profile' ),
        'parent_item'       => __( 'Parent Languages' , 'codeception_journalist_extended_profile'),
        'parent_item_colon' => __( 'Parent Languages:', 'codeception_journalist_extended_profile' ),
        'edit_item'         => __( 'Edit Language', 'codeception_journalist_extended_profile' ), 
        'update_item'       => __( 'Update Language' , 'codeception_journalist_extended_profile'),
        'add_new_item'      => __( 'Add Languages', 'codeception_journalist_extended_profile'),
        'new_item_name'     => __( 'New Languages' , 'codeception_journalist_extended_profile'),
        'menu_name'         => __( 'Languages' , 'codeception_journalist_extended_profile'),
    ); 

       $args = array(
        'labels'            => $labels,
        'public'            =>  true,
        'show_in_rest'      => true,
        'has_archive'       =>  true,
        'hierarchical'      =>  true, 
        'query_var'         => 'languages',
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_tagcloud'     => true,
        'show_in_nav_menus' =>  true,
        'rewrite'           =>  array('slug' => '/languages', 'with_front' => true, 'hierarchical' => true),
    );
    // taxonomy-journalists-languages.php
  $post_types = array("journalists");
  register_taxonomy( 'languages', $post_types, $args );
}
add_action( 'init', 'journalist_taxonomy_languages');


/*
**
 * Create the post_type journalists
 */



function custom_post_type_journalist() {

// Set UI labels for Custom Post Type
$labels = array(
        'name'                => _x( 'Journalists', 'Post Type General Name', 'codeception_journalist_extended_profile' ),
        'singular_name'       => _x( 'Journalist', 'Post Type Singular Name', 'codeception_journalist_extended_profile' ),
        'menu_name'           => __( 'Journalists', 'codeception_journalist_extended_profile' ),
        'name_admin_bar' => __( 'Journalists', 'codeception_journalist_extended_profile'),
        'parent_item_colon'   => __( 'Parent Journalist', 'codeception_journalist_extended_profile' ),
        'all_items'           => __( 'All Journalists', 'codeception_journalist_extended_profile' ),
        'view_item'           => __( 'View Journalist', 'codeception_journalist_extended_profile' ),
        'add_new_item'        => __( 'Add New Journalist', 'codeception_journalist_extended_profile' ),
        'add_new'             => __( 'Add New Journalist', 'codeception_journalist_extended_profile' ),
        'edit_item'           => __( 'Edit Journalist', 'codeception_journalist_extended_profile' ),
        'update_item'         => __( 'Update Journalist', 'codeception_journalist_extended_profile' ),
        'search_items'        => __( 'Search Journalist', 'codeception_journalist_extended_profile' ),
        'not_found'           => __( 'Not Found', 'codeception_journalist_extended_profile' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'codeception_journalist_extended_profile' )
  );

// Set specifications for Custom Post Type
$args = array(
    'label' => 'Journalists',
    'description' => 'This is a journalist content type. ',
    'labels' => $labels,

    /* define the settings for the post_type's edition journalists */
    'supports' => array('title','editor','author', 'excerpt', 'custom-fields', 'revisions', 'thumbnail','taxonomies'),
    'hierarchical' => false,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,      
    'exclude_from_search' => false,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'capabilities' => array( 'read_post' => 'read_post'),
    // 'query_var' => 'journalists',
    'query_var' => true,
    'map_meta_cap' => true,
    'show_in_rest' => true,
    // wp-menu-image dashicons-before dashicons-admin-users
    'menu_icon' => 'dashicons-admin-users',
    'rewrite' =>  array('slug' => 'journalists', 'with_front' => true, 'hierarchical' => true),
    );
  register_post_type( 'journalists', $args );

}
add_action( 'init', 'custom_post_type_journalist', 0 );
      





