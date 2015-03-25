<?php
/**
 * The Template for displaying all single posts.
 *
 * @package bluu
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<div class="post-sharing clearfix">

				<p class="share-heading"><?php _e( 'Share this post &rarr;', 'bluu' ); ?></p>

				<div class="share-icons clearfix">

					<p>
						<a class="share-fb" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;">
							<?php _e( 'Facebook', 'bluu' ); ?>
						</a>
					</p><!-- end .share-fb -->

					<p>
						<a class="share-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo urlencode(get_the_title()); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false">
							<?php _e( 'Twitter', 'bluu' ); ?>
						</a>
					</p><!-- end .share-fb -->

					<p>
						<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<?php _e( 'GooglePlus', 'bluu' ); ?>
						</a>
					</p><!-- end .share-fb -->

				</div><!-- end .share-icons -->

			</div><!-- end .post-sharing -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- end #main -->
	</div><!-- end #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>