<?php
function register_guest_post_type() {
    $labels = array(
        'name' => 'Guest Posts',
        'singular_name' => 'Guest Post',
        'menu_name' => 'Guest Posts',
        'name_admin_bar' => 'Guest Post',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Guest Post',
        'new_item' => 'New Guest Post',
        'edit_item' => 'Edit Guest Post',
        'view_item' => 'View Guest Post',
        'all_items' => 'All Guest Posts',
        'search_items' => 'Search Guest Posts',
        'not_found' => 'No guest posts found.',
        'not_found_in_trash' => 'No guest posts found in Trash.',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'guest-posts'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor'),
    );

    register_post_type('guest_post', $args);
}
?>