<?php

/**
 * Understrap Theme functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$essential_includes = array(
    '/enqueue.php',
    '/reset.php',
    '/setup.php',
    // '/register-post-type.php',              // Load post type register functions.
    // '/register-taxonomy.php',              // Load post taxonomy register functions.
);

foreach ($essential_includes as $file) {
    $filepath = locate_template('inc' . $file);
    if (!$filepath) {
        trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
    }
    require_once $filepath;
}
