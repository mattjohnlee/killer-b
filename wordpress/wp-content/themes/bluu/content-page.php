<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package bluu
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>
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

</article><!-- end #post-## -->
