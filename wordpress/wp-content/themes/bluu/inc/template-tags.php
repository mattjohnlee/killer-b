<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package bluu
 */

if ( ! function_exists( 'bluu_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function bluu_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bluu' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bluu' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bluu' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bluu' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // end check for bluu_content_nav


/**
 * Markup for comments
 */
if ( ! function_exists( 'bluu_comment' ) ) :
function bluu_comment( $comment, $args, $depth ) {
	
	$GLOBALS['comment'] = $comment; ?>
	<?php $add_below = ''; ?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	
		<div class="the-comment clearfix">

			<div class="comment-avatar">
				<?php echo get_avatar($comment, 45); ?>
			</div><!-- end .comment-avatar -->
			
			<div class="comment-box">
				<div class="comment-inside">
			
					<div class="comment-author meta">
						<strong><?php echo get_comment_author_link() ?></strong>
						<?php printf(__('%1$s at %2$s', 'bluu'), get_comment_date(),  get_comment_time()) ?></a> <?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'bluu'), 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
				
					<div class="comment-text">
						<?php if ($comment->comment_approved == '0') : ?>
						<em><?php echo __('Your comment is awaiting moderation.', 'bluu') ?></em>
						<br />
						<?php endif; ?>
						<?php comment_text() ?>
					</div><!-- end .comment-text -->
			
				</div><!-- end .comment-inside -->
			</div><!-- end .comment-box -->
			
		</div><!-- end .the-comment -->

<?php }
endif; // end check for bluu_comment()


if ( ! function_exists( 'bluu_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function bluu_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'bluu_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;


/**
 * Returns true if a blog has more than 1 category
 */
function bluu_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so bluu_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so bluu_categorized_blog should return false
		return false;
	}
}


/**
 * Flush out the transients used in bluu_categorized_blog
 */
function bluu_category_transient_flusher() {

	delete_transient( 'all_the_cool_cats' );
	
}
add_action( 'edit_category', 'bluu_category_transient_flusher' );
add_action( 'save_post',     'bluu_category_transient_flusher' );
