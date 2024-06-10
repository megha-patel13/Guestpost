<?php
/*
Plugin Name: Guest Posts Plugin
Description: A plugin to allow users to submit and manage guest posts.
Version: 1.0

*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Hook for adding admin menus
add_action('admin_menu', 'guest_posts_menu');

// Hook for registering custom post type
add_action('init', 'register_guest_post_type');

// Hook for adding meta boxes
add_action('add_meta_boxes', 'add_guest_post_meta_boxes');

// Hook for saving post metadata
add_action('save_post', 'save_guest_post_meta', 10, 2);


// Register activation hook
register_activation_hook(__FILE__, 'guest_posts_plugin_activation');

// Register deactivation hook
register_deactivation_hook(__FILE__, 'guest_posts_plugin_deactivation');

// Include the files
include(plugin_dir_path(__FILE__) . 'guest-custom-post.php');
include(plugin_dir_path(__FILE__) . 'guest-form-post.php');
include(plugin_dir_path(__FILE__) . 'guest-meta-box.php');
include(plugin_dir_path(__FILE__) . 'admin-dashboard-guest-post.php');
?>



<?php
//crete page guests post page
function create_guest_page() {
    $page_title = 'Guests FOrm Page';
    $page_content = '[guest_form]'; 
    $page_template = ''; 
    $page = get_page_by_title($page_title);

    if (!$page) {
        
        $page_data = array(
            'post_title'     => $page_title,
            'post_content'   => $page_content,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'post_author'    => 1,
            'post_template'  => $page_template
        );
        wp_insert_post($page_data);
    }
}

register_activation_hook(__FILE__, 'create_guest_page');

?>

<?php
//create new database for guest post meta 
function guest_posts_plugin_activation() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'guest_post_meta';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        post_id bigint(20) NOT NULL,
        meta_key varchar(255) DEFAULT '' NOT NULL,
        meta_value longtext NOT NULL,
        PRIMARY KEY  (id),
        KEY post_id (post_id),
        KEY meta_key (meta_key)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
?>