<?php
/**
 * Template Name: Homepage Parallax
 *
 * @package bluu
 */

get_header(); ?>

		</div><!-- end .inside -->

	<?php if ( get_theme_mod( 'bluu_customizer_homepage_pitch' ) ) : ?>
	<div id="pitch">
		<div class="inside">

			<?php if ( get_theme_mod( 'bluu_customizer_homepage_pitch' ) ) : ?>
			<h2 class="pitch-main">
				<?php echo '' . get_theme_mod( 'bluu_customizer_homepage_pitch', '' ) ."\n"; ?>
			</h2><!-- end .pitch-main -->
			<?php endif; ?>

			<div class="pitch-sep"></div>

		</div><!-- end .inside -->
	</div><!-- end #pitch -->
	<?php endif; ?>

	<main id="main" class="site-main" role="main">

		<?php $big = new WP_Query( array(
			'post_type' => 'portfolio-items',
			'showposts' => 4
		) ); ?>

		<?php while( $big->have_posts() ) : $big->the_post(); ?>

		<?php bluu_parallax_bg_image(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'parallax-post' ); ?>>

			<?php

				if( wp_is_mobile() ) {
					$parallax = 'project-scroll-mobile';
				} else {
					$parallax = 'project-scroll';
				}

			?>

			<div class="<?php echo $parallax; ?>">
				<div class="inside big-thumb-cta">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div><!-- end .inside .big-thumb-cta -->
			</div><!-- end .project-scroll -->

		</article><!-- end #post-## -->

		<?php endwhile; wp_reset_postdata(); ?>

	</main><!-- end #main -->

	<div class="inside">

<?php get_footer(); ?>