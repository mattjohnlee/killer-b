<?php
/**
 * Template Name: Slider Page
 *
 * @package bluu
 */

get_header(); ?>

	</div><!-- end .inside -->

	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'slider-page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- end #main -->

	<div class="inside">

<?php get_footer(); ?>
