<?php
function guest_submit_form() {
    ob_start();
    ?>

    <form action="" method="post">
        <label for="guest_post_title">Title</label>
        <input type="text" id="guest_post_title" name="guest_post_title" required><br>
        
        <label for="guest_post_content">Content</label>
        <textarea id="guest_post_content" name="guest_post_content" required></textarea><br>
        
        <label for="guest_post_author_name">Author Name</label>
        <input type="text" id="guest_post_author_name" name="guest_post_author_name" required><br>
        
        <label for="guest_post_author_email">Author Email</label>
        <input type="email" id="guest_post_author_email" name="guest_post_author_email" required><br>
        
        <input type="submit" name="submit_guest_post" value="Submit">
    </form>

    <?php
    return ob_get_clean();
}

add_shortcode('guest_form', 'guest_submit_form');



function handle_guest_post_submission() {
    if (isset($_POST['submit_guest_post'])) {
        $title = sanitize_text_field($_POST['guest_post_title']);
        $content = sanitize_textarea_field($_POST['guest_post_content']);
        $author_name = sanitize_text_field($_POST['guest_post_author_name']);
        $author_email = sanitize_email($_POST['guest_post_author_email']);

        $post_data = array(
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'pending',
            'post_type' => 'guest_post',
            'meta_input' => array(
                'guest_post_author_name' => $author_name,
                'guest_post_author_email' => $author_email,
            ),
        );

        $post_id = wp_insert_post($post_data);

        if ($post_id) {
            echo '<div class="success-message" style="color:green;text-align:center;font-weight: bold;font-size:40px;padding-top: 50px;">Thank you for your submission!</div>';
        } else {
            echo 'An error occurred. Please try again.';
        }
    }
}

add_action('init', 'handle_guest_post_submission');

