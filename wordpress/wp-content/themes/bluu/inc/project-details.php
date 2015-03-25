<?php
/**
 * The project-details section of the single-portfolio-items posts
 *
 * @package bluu
 */
?>

<div class="project-details">

	<h3 class="project-title"><?php the_title(); ?></h3>

	<?php the_content(); ?>

	<ul class="project-list">
		<?php if( get_post_meta( $post->ID, 'portfolio-client', true ) ) : ?>
		<li><span><?php _e( 'Client: ', 'bluu' ); ?></span><?php echo get_post_meta( $post->ID, 'portfolio-client', true ); ?></li>
		<?php endif; ?>
		<?php if( get_post_meta( $post->ID, 'portfolio-date', true ) ) : ?>
		<li><span><?php _e( 'Date: ', 'bluu' ); ?></span><?php echo get_post_meta( $post->ID, 'portfolio-date', true ); ?></li>
		<?php endif; ?>
	</ul><!-- end project-list -->

	<div class="portfolio-types">
		<?php
		$terms = get_the_terms( get_the_ID(), 'portfolio_types' );
		if( $terms ) :
			foreach( $terms as $term ) : ?>
				<span><a href="<?php echo get_term_link( $term->slug, 'portfolio_types' ); ?>"><?php echo $term->name; ?></a></span>
			<?php endforeach; ?>
		<?php endif; ?>
	</div><!-- end .portfolio-types -->

	<?php if( get_post_meta( $post->ID, 'portfolio-url', true ) ) : ?>
	<a class="button-cta" href="<?php echo get_post_meta( $post->ID, 'portfolio-url', true ); ?>"><?php _e( 'View Project &rarr;', 'bluu' ); ?></a>
	<?php endif; ?>

	<div class="post-sharing clearfix">
		<div class="share-icons clearfix">

			<p>
				<a class="share-fb" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;">
					<?php _e( 'Facebook', 'bluu' ); ?>
				</a><!-- end .share-fb -->
			</p>

			<p>
				<a class="share-twitter" href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo urlencode(get_the_title()); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false">
					<?php _e( 'Twitter', 'bluu' ); ?>
				</a><!-- end .share-fb -->
			</p>

			<p>
				<a class="share-google" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
					<?php _e( 'GooglePlus', 'bluu' ); ?>
				</a><!-- end .share-fb -->
			</p>

		</div><!-- end .share-icons -->
	</div><!-- end .post-sharing -->

</div><!-- end .project-details -->