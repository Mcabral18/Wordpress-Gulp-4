<?php
// Example

// Exit if accessed directly.
defined('ABSPATH') || exit;

//remove wp emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//remove json
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);


//Remove oEmbed discovery links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

//remove xml-rpc
remove_action('wp_head', 'rsd_link');

//remove wp version
function crunchify_remove_version()
{
  return '';
}
add_filter('the_generator', 'crunchify_remove_version');

//remove wlmanifest
remove_action('wp_head', 'wlwmanifest_link');

//Remove query strings from all static resources
function crunchify_cleanup_query_string($src)
{
  $parts = explode('?', $src);
  return $parts[0];
}
add_filter('script_loader_src', 'crunchify_cleanup_query_string', 15, 1);
add_filter('style_loader_src', 'crunchify_cleanup_query_string', 15, 1);


//allow svg
function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


//remove wp-embed.js
function my_deregister_scripts()
{
  wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');


//remove comments
add_action('admin_init', function () {
  global $pagenow;
  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url());
    exit;
  }
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
});

add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
  remove_menu_page('edit-comments.php');
});
add_action('init', function () {
  if (is_admin_bar_showing()) {
    remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
  }
});


if (!defined('WP_ENV')) {
  // Fallback if WP_ENV isn't defined in your WordPress config
  // Used to check for 'development' or 'production'
  define('WP_ENV', 'development');
}


//CREATE ROOT PATHS
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMG', THEMEROOT . '/img');
