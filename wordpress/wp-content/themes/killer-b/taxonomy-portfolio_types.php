<?php
/**
 *
 * @package bluu
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

		<h1 class="page-title">
			<?php _e( 'All projects in ', 'bluu' ); echo $term->name; ?>
		</h1><!-- end .page-title -->

		<div id="portfolio-squares-three" class="clearfix">

			<?php
			$count = 1;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1 );

			query_posts( array(
				'post_type' => 'portfolio-items',
				'portfolio_types' => $term->slug,
                'posts_per_page' => 9999,
                'paged' => $paged,
			) );
			?>

			<?php while( have_posts() ) : the_post(); ?>

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

			<?php $count++; endwhile; wp_reset_postdata(); ?>

		</div><!-- end #portfolio-squares -->

		<div class="clearfix">
			<?php if( function_exists('wp_pagenavi') ) : wp_pagenavi(); endif; ?>
		</div><!-- end .clearfix -->

	</main><!-- end #main -->

<?php get_footer(); ?>