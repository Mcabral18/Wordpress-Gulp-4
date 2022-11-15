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

        <div class="row">

            <div class="col-md-12 content-area" id="primary">

                <main class="container" id="main" role="main">

                    <section class="my-5">
                        <h1>Front-end Boilerplate</h1>
                        <h2>Using Sass and Gulp</h2>
                    </section>
                </main>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
