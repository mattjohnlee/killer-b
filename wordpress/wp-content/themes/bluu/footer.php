<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package bluu
 */
?>

		</div><!-- end .inside -->
	</div><!-- end #content -->

	<footer id="footer" class="site-footer" role="contentinfo">

		<section id="footer-widgets">
			<div class="inside clearfix">

				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
				</div><!-- end .footer-column -->

				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
				</div><!-- end .footer-column -->

				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
				</div><!-- end .footer-column -->

				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
				</div><!-- end .footer-column -->

			</div><!-- end .inside -->
		</section><!-- end #footer-widgets -->

		<section id="credits">
			<div class="inside">

				<p class="credits">&copy; <?php echo the_time( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'Powered by', 'bluu' ); ?> <a href="http://wordpress.org">WordPress</a></p>

			</div><!-- end .inside -->
		</section><!-- end #credits -->

	</footer><!-- end #footer -->
	
</div><!-- end #page -->

<a id="to-top"><i class="icon-angle-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>