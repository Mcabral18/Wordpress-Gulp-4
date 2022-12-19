<?php

/**
 * Template Name: Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr(get_theme_mod('understrap_container_type')); ?>" id="content">

        <div class="main text-center">
            <h1 class="mb-4">Development Boilerplate</h1>
            <p class="mb-2">Sass/JS and Gulp 4</p>
            <p>Run: 'Gulp dev' - Start the compiler</p>
        </div>

    </div>

</div>

<?php get_footer(); ?>