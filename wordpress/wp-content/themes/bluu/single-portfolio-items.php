<?php
/**
 * The Template for displaying all single portfolio posts.
 *
 * @package bluu
 */

get_header(); ?>

	<div class="portfolio-paging clearfix">
		<span class="prev-project"><?php previous_post_link( '%link', __( '%title', 'bluu' ) ) ?></span>
		<span class="all-projects">
			<a href="<?php echo '' . get_theme_mod( 'bluu_customizer_portfolio_url', '' ) ."\n"; ?>"><?php _e( 'All Projects', 'bluu' ); ?></a>
		</span><!-- end .all-projects -->
		<span class="next-project"><?php next_post_link( '%link', __( '%title', 'bluu' ) ) ?></span>
	</div><!-- end .portfolio-paging -->

	<?php if( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php // Check if user wants full-width portfolio display
			if( get_post_meta( $post->ID, 'portfolio-full', true ) ) :
		?>

			<div class="project-full">

				<div class="project-media">

					<?php if( get_post_meta( $post->ID, 'bluu-video', true ) ) : ?>
						<div class="entry-media">
							<?php echo get_post_meta( $post->ID, 'bluu-video', true ); ?>
						</div><!-- end .entry-media -->
					<?php else : ?>
						
						<?php the_post_thumbnail( 'portfolio-full' ); ?>

						<?php

							// If there are more images, show them here

							$attachments = get_posts( array(
								'post_type' => 'attachment',
								'posts_per_page' => -1,
								'post_parent' => $post->ID,
								'exclude'     => get_post_thumbnail_id()
							) );

							if ( $attachments ) {
								foreach ( $attachments as $attachment ) {
									$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
									$thumbimg = wp_get_attachment_link( $attachment->ID, 'portfolio-full', true );
									echo $thumbimg;
								}
								
							}

						?>

					<?php endif; ?>

				</div><!-- end .project-media -->

				<?php include( 'inc/project-details.php' ); ?>

			</div><!-- end .project-full -->

		<?php // Otherwise display the standard two-column layout 
			else :
		?>

			<div class="project-small clearfix">

				<div class="project-media">

					<?php if( get_post_meta( $post->ID, 'bluu-video', true ) ) : ?>
						<div class="entry-media">
							<?php echo get_post_meta( $post->ID, 'bluu-video', true ); ?>
						</div><!-- end .entry-media -->
					<?php else : ?>
						
						<?php the_post_thumbnail( 'portfolio-small' ); ?>

						<?php

							// If there are more images, show them here

							$attachments = get_posts( array(
								'post_type' => 'attachment',
								'posts_per_page' => -1,
								'post_parent' => $post->ID,
								'exclude'     => get_post_thumbnail_id()
							) );

							if ( $attachments ) {
								foreach ( $attachments as $attachment ) {
									$class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
									$thumbimg = wp_get_attachment_link( $attachment->ID, 'portfolio-full', true );
									echo $thumbimg;
								}
								
							}

						?>

					<?php endif; ?>

				</div><!-- end .project-media -->

				<?php include( 'inc/project-details.php' ); ?>

			</div><!-- end .project-small -->

		<?php endif; ?>

		</article>

	<?php endif; ?>

<?php get_footer(); ?>