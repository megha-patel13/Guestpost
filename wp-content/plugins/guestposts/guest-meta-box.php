<?php
function add_guest_post_meta_boxes() {
    add_meta_box(
        'guest_post_author_meta',
        'Guest Post Author Details',
        'guest_post_author_meta_box_callback',
        'guest_post',
        'side',
        'default'
    );
}

function guest_post_author_meta_box_callback($post) {
    wp_nonce_field('save_guest_post_meta', 'guest_post_meta_nonce');
    
    $author_name = get_post_meta($post->ID, 'guest_post_author_name', true);
    $author_email = get_post_meta($post->ID, 'guest_post_author_email', true);

    echo '<label for="guest_post_author_name">Author Name</label>';
    echo '<input type="text" id="guest_post_author_name" name="guest_post_author_name" value="' . esc_attr($author_name) . '"><br>';
    
    echo '<br><label for="guest_post_author_email">Author Email</label>';
    echo '<input type="email" id="guest_post_author_email" name="guest_post_author_email" value="' . esc_attr($author_email) . '">';
}

function save_guest_post_meta($post_id, $post) {
    if (!isset($_POST['guest_post_meta_nonce']) || !wp_verify_nonce($_POST['guest_post_meta_nonce'], 'save_guest_post_meta')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('guest_post' !== $post->post_type) {
        return $post_id;
    }

    $author_name = sanitize_text_field($_POST['guest_post_author_name']);
    $author_email = sanitize_email($_POST['guest_post_author_email']);

    update_post_meta($post_id, 'guest_post_author_name', $author_name);
    update_post_meta($post_id, 'guest_post_author_email', $author_email);
}
