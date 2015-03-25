<?php
/**
 * @package bluu
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( get_post_format() == 'video' ) : ?>

		<?php if( get_post_meta( $post->ID, 'bluu-video', true ) ) : ?>
		<div class="entry-media">
			<?php echo get_post_meta( $post->ID, 'bluu-video', true ); ?>
		</div><!-- end .entry-media -->
		<?php endif; ?>

	<?php elseif( get_post_format() == 'image' ) : ?>

		<?php if( has_post_thumbnail() ) : ?>
		<div class="entry-media">
			<?php the_post_thumbnail( 'image-format' ); ?>
		</div><!-- end .entry-media -->
		<?php endif; ?>

	<?php else : ?>

		<?php if( has_post_thumbnail() ) : ?>
		<div class="entry-media">
			<?php the_post_thumbnail( 'standard-format' ); ?>
		</div><!-- end .entry-media -->
		<?php endif; ?>

	<?php endif; ?>

	<div class="entry-core">

		<header class="entry-header">

			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2><!-- end .entry-title -->

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php the_time( 'd-m-y' ); ?><span class="meta-sep">/</span><?php the_category( ', ', '', '' ); ?><span class="meta-sep">/</span><?php if( has_tag() ) : the_tags( '', ', ', '' ); ?><span class="meta-sep">/</span><?php endif; ?><a href="<?php the_permalink(); ?>#comments" title="Comments on '<?php the_title(); ?>'"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a>
			</div><!-- end .entry-meta -->
			<?php endif; ?>

		</header><!-- end .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'bluu' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- end .entry-content -->

	</div><!-- end .entry-core -->

</article><!-- end #post-## -->
