<?php
/**
 * Template Name: Blog Full-Width
 *
 * @package bluu
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<?php
			$count = 1;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1 );

			query_posts( array(
				'post_type' => 'post',
				'paged' => $paged,
			) );
		?>

		<?php if( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while( have_posts() ) : the_post(); ?>

			<?php
				// Allows the <!--more--> tag to be used in a page template
				global $more;
				$more = 0;
			?>

				<?php
					if( get_post_format() == 'video' ) {
						get_template_part( 'content-video' );
					} else {
						get_template_part( 'content-fullwidth' );
					}
				?>

			<?php $count++; endwhile; wp_reset_postdata(); ?>

			<?php if( function_exists('wp_pagenavi') ) { wp_pagenavi(); } else { ?>
				<?php bluu_content_nav( 'nav-below' ); ?>
			<?php } ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'index' ); ?>

		<?php endif; ?>

	</main><!-- end #main -->

<?php get_footer(); ?>