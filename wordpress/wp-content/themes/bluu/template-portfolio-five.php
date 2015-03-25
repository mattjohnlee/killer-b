<?php
/**
 * Template Name: Portfolio 5-Column
 *
 * @package bluu
 */

get_header(); ?>

	<main id="main" class="site-main" role="main">

		<ul id="sort-by" class="clearfix">
			<li><a href="#all" data-filter="type-portfolio-items" class="active"><?php _e('All', 'bluu'); ?></a></li>
			<?php wp_list_categories( array('title_li' => '', 'taxonomy' => 'portfolio_types', 'walker' => new Portfolio_Walker() ) ); ?>
		</ul><!-- end #sort-by -->

		<div id="portfolio-squares-five" class="clearfix isotope">

			<?php 
			$count = 1;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1 );
	
			query_posts( array(
				'post_type' => 'portfolio-items',
                'paged' => $paged,
                'posts_per_page' => 15
			) );
			?>

			<?php while( have_posts() ) : the_post(); ?>

			<?php 
				$terms =  get_the_terms( $post->ID, 'portfolio_types' ); 
				$term_list = '';
					if( is_array($terms) ) {
						foreach( $terms as $term ) {
							$term_list .= urldecode($term->slug);
							$term_list .= ' ';
						}
					}
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( "portfolio-square $term_list isotope-item" ); ?>>

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

		</div><!-- end #portfolio-squares-five -->

		<div class="clearfix">
			<?php if( function_exists('wp_pagenavi') ) : wp_pagenavi(); endif; ?>
		</div><!-- end .clearfix -->

	</main><!-- end #main -->

<?php get_footer(); ?>