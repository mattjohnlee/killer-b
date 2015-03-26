<?php
/**
 * Template Name: Homepage Killer B
 *
 * @package bluu
 */

get_header(); ?>

		</div><!-- end .inside -->

	<main id="main" class="site-main" role="main">

		<article id="killerb-home">

			<?php

				if( wp_is_mobile() ) {
					$parallax = 'project-scroll-mobile';
				} else {
					$parallax = 'project-scroll';
				}

			?>

			<div class="<?php echo $parallax; ?>">
			</div><!-- end .project-scroll -->

		</article><!-- end #post-## -->


		<div id="portfolio-squares-full-four" class="clearfix">

			<?php $thumb = new WP_Query( array(
				'post_type' => 'portfolio-items',
				'showposts' => 12
			) ); ?>

			<?php while( $thumb->have_posts() ) : $thumb->the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-square' ); ?>>

				<div class="project-media">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<span class="portfolio-thumb-overlay">
							<div class="overlay-inner">
								<h3><?php the_title(); ?><br /><span><?php _e( 'View Project', 'bluu' ); ?></span></h3>
							</div><!-- end .overlay-inner -->
						</span>
						<?php the_post_thumbnail( 'portfolio-small' ); ?>
					</a>
				</div><!-- end .project-media -->

			</article><!-- end #post-## -->

			<?php endwhile; wp_reset_postdata(); ?>

		</div><!-- end #portfolio-squares -->

	</main><!-- end #main -->

	<div class="inside">

<?php get_footer(); ?>