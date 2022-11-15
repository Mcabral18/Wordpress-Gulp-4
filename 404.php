<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$sidebar_pos = get_theme_mod('understrap_sidebar_position');

?>

<div class="wrapper" id="404-wrapper">

	<div class="<?php echo esc_html(get_theme_mod('understrap_container_type')); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<section class="error-404 not-found">

						<h4>Error 404</h4>

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>