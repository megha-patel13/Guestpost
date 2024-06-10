<?php
function guest_posts_menu() {
    add_menu_page(
        'Guest Posts Listing',
        'Guest Posts Listing',
        'manage_options',
        'guest-posts-admin',
        'guest_posts_admin_page',
        'dashicons-admin-post',
        6
    );
}

function guest_posts_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'posts';
    $guest_posts = $wpdb->get_results("SELECT * FROM $table_name WHERE post_type = 'guest_post'");

    echo '<div class="wrap">';
    echo '<h1>Guest Posts Listing</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>Title</th><th>Author</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>';
    echo '<tbody>';
    foreach ($guest_posts as $post) {
        $author_name = get_post_meta($post->ID, 'guest_post_author_name', true);
        echo '<tr>';
        echo '<td>' . esc_html($post->post_title) . '</td>';
        echo '<td>' . esc_html($author_name) . '</td>';
        echo '<td>' . esc_html($post->post_date) . '</td>';
        echo '<td>' . esc_html($post->post_status) . '</td>';
        echo '<td><a href="' . admin_url('post.php?post=' . $post->ID . '&action=edit') . '">Edit</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
