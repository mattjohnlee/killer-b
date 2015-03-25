<?php
/**
 * Template Name: Blog Masonry 2-Column
 *
 * @package bluu
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<div id="masonry-2col" class="masonry-blog">

			<?php
				$count = 1;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1 );

				query_posts( array(
					'post_type' => 'post',
					'paged' => $paged,
				) );
			?>

			<?php if( have_posts() ) : ?>

			<div class="gutter-sizer"></div>

				<?php /* Start the Loop */ ?>
				<?php while( have_posts() ) : the_post(); ?>

				<?php
					// Allows the <!--more--> tag to be used in a page template
					global $more;
					$more = 0;
				?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php $count++; endwhile; wp_reset_postdata(); ?>

				<?php if( function_exists('wp_pagenavi') ) { wp_pagenavi(); } else { ?>
					<?php bluu_content_nav( 'nav-below' ); ?>
				<?php } ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'index' ); ?>

			<?php endif; ?>

		</div><!-- end #masonry -->

	</main><!-- end #main -->

<?php get_footer(); ?>