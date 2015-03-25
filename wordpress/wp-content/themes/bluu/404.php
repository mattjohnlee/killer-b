<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package bluu
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'bluu' ); ?></h1>
				</header><!-- end .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location.', 'bluu' ); ?></p>
				</div><!-- end .page-content -->

			</section><!-- end .error-404 -->

		</main><!-- end #main -->
	</div><!-- end #primary -->

<?php get_sidebar( 'page' ); ?>
<?php get_footer(); ?>