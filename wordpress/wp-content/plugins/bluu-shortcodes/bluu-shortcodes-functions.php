<?php
/**
 * Register the shortcodes
 */


/*--------------------------------------------------*/
/* Text widget filters
/*--------------------------------------------------*/

add_filter( 'widget_text', 'shortcode_unautop', 10 );
add_filter( 'widget_text', 'do_shortcode', 10 );


/*--------------------------------------------------*/
/* The shortcodes
/*--------------------------------------------------*/

/* Clearing */
if( !function_exists( 'bluu_clear' ) ) {

	function bluu_clear( $atts ) {
		return '<div class="clearfix"></div>';
	}

	add_shortcode( 'clear', 'bluu_clear' );
	add_shortcode( 'clearfix', 'bluu_clear' );

}


/* Icon Clearing */
if( !function_exists( 'bluu_icon_clear' ) ) {

	function bluu_icon_clear( $atts ) {
		return '<div class="icon-clear"></div>';
	}

	add_shortcode( 'icon_clear', 'bluu_icon_clear' );

}


/* Inside Container */
if( !function_exists( 'bluu_container' ) ) {

	function bluu_container( $atts, $content = null ) {
		return '<div class="inside">'.do_shortcode( $content ).'</div>';
	}

	add_shortcode( 'container', 'bluu_container' );

}


/* Spacing */
if( !function_exists( 'bluu_spacing_50' ) ) {

	function bluu_spacing_50( $atts ) {
		return '<div class="spacing-fifty"></div>';
	}

	add_shortcode( 'spacing_50', 'bluu_spacing_50' );

}
if( !function_exists( 'bluu_spacing_40' ) ) {

	function bluu_spacing_40( $atts ) {
		return '<div class="spacing-fourty"></div>';
	}

	add_shortcode( 'spacing_40', 'bluu_spacing_40' );

}
if( !function_exists( 'bluu_spacing_30' ) ) {

	function bluu_spacing_30( $atts ) {
		return '<div class="spacing-thirty"></div>';
	}

	add_shortcode( 'spacing_30', 'bluu_spacing_30' );

}
if( !function_exists( 'bluu_spacing_20' ) ) {

	function bluu_spacing_20( $atts ) {
		return '<div class="spacing-twenty"></div>';
	}

	add_shortcode( 'spacing_20', 'bluu_spacing_20' );

}
if( !function_exists( 'bluu_spacing_10' ) ) {

	function bluu_spacing_10( $atts ) {
		return '<div class="spacing-ten"></div>';
	}

	add_shortcode( 'spacing_10', 'bluu_spacing_10' );

}


/* FontAwesome icon */
if( !function_exists( 'bluu_fa_icon' ) ) {

	function bluu_fa_icon( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'icon' => 'heart',
			'size' => 'medium',
			'color' => 'dark'
		), $atts ) );

		$output = null;
		$output .= '<div class="single-icon icon-'.$icon.' icon-color-'.$color.' icon-size-'.$size.' "></div>';

		return $output;

	}

	add_shortcode( 'fa_icon', 'bluu_fa_icon' );

}


/* FontAwesome icon with text */
if( !function_exists( 'bluu_fa_icon_text' ) ) {

	function bluu_fa_icon_text( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'icon' => 'heart',
			'size' => 'small',
			'color' => 'dark'
		), $atts ) );

		$output = null;
		$output .= '<div class="icon-with-text icon-'.$icon.' icon-color-'.$color.' icon-size-'.$size.' "><span>'.do_shortcode( $content ).'</span></div>';

		return $output;

	}

	add_shortcode( 'fa_icon_text', 'bluu_fa_icon_text' );

}


/* FontAwesome icon with headings & text */
if( !function_exists( 'bluu_fa_icon_heading' ) ) {

	function bluu_fa_icon_heading( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'icon' => 'heart',
			'size' => 'medium',
			'color' => 'dark',
			'heading' => 'Nam dignissim pulvinar'
		), $atts ) );

		$output = null;

		$output .= '<div class="icon-with-heading icon-'.$icon.' icon-color-'.$color.' icon-size-'.$size.' ">';
		$output .= '<h3 class="icon-heading">'.$heading.'</h3>';
		$output .= '<p>'.do_shortcode( $content ).'</p>';
		$output .= '</div>';

		return $output;

	}

	add_shortcode( 'fa_icon_heading', 'bluu_fa_icon_heading' );

}


/* Column Containers */
if( !function_exists( 'bluu_column_container_half' ) ) {
	function bluu_column_container_half( $atts, $content = null ) {
		return '<div class="bluu-columns-half clearfix">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_container_half', 'bluu_column_container_half' );
}

if( !function_exists( 'bluu_column_container_thirds' ) ) {
	function bluu_column_container_thirds( $atts, $content = null ) {
		return '<div class="bluu-columns-thirds clearfix">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_container_thirds', 'bluu_column_container_thirds' );
}

if( !function_exists( 'bluu_column_container_quarters' ) ) {
	function bluu_column_container_quarters( $atts, $content = null ) {
		return '<div class="bluu-columns-quarters clearfix">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_container_quarters', 'bluu_column_container_quarters' );
}

if( !function_exists( 'bluu_column_container_fifths' ) ) {
	function bluu_column_container_fifths( $atts, $content = null ) {
		return '<div class="bluu-columns-fifths clearfix">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_container_fifths', 'bluu_column_container_fifths' );
}


/* Columns */
if( !function_exists( 'bluu_column_half' ) ) {
	function bluu_column_half( $atts, $content = null ) {
		return '<div class="bluu-column bluu-column-half">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_half', 'bluu_column_half' );
}

if( !function_exists( 'bluu_column_third' ) ) {
	function bluu_column_third( $atts, $content = null ) {
		return '<div class="bluu-column bluu-column-third">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_third', 'bluu_column_third' );
}

if( !function_exists( 'bluu_column_fourth' ) ) {
	function bluu_column_fourth( $atts, $content = null ) {
		return '<div class="bluu-column bluu-column-fourth">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_fourth', 'bluu_column_fourth' );
}

if( !function_exists( 'bluu_column_fifth' ) ) {
	function bluu_column_fifth( $atts, $content = null ) {
		return '<div class="bluu-column bluu-column-fifth">'.do_shortcode( $content ).'</div>';
	}
	add_shortcode( 'column_fifth', 'bluu_column_fifth' );
}


/* Button */
if( !function_exists( 'bluu_button' ) ) {

	function bluu_button( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'size' => 'medium',
			'color' => 'primary',
			'link' => '#',

		), $atts ) );

		$output = null;
		$output .= '<a href="'.$link.'" class="bluu-button button-'.$size.' button-color-'.$color.' button-size-'.$size.'">'.do_shortcode( $content ).'</a>';

		return $output;

	}

	add_shortcode( 'button', 'bluu_button' );

}


/* Full-Width Portfolio 3-Column */
if( !function_exists( 'bluu_portfolio_full_three_column' ) ) {

	function bluu_portfolio_full_three_column( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'count' => 6
		), $atts ) );

		?>

		<div class="sc-portfolio">

			<div id="portfolio-squares-full-three" class="clearfix">

				<?php

				$sc_posts_three = new WP_Query( array(
					'post_type' => 'portfolio-items',
					'showposts' => $count
				) );

				ob_start();

				?>

				<?php while( $sc_posts_three->have_posts() ) : $sc_posts_three->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( "portfolio-square" ); ?>>

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

				<?php endwhile; wp_reset_postdata(); ?>

			</div><!-- end #portfolio-squares-full -->

		</div><!-- end .sc-portfolio -->

		<?php

		$portfolio_loop_three = ob_get_contents();

		ob_end_clean();

		return $portfolio_loop_three;

	}

	add_shortcode( 'portfolio_three_column', 'bluu_portfolio_full_three_column' );

}


/* Full-Width Portfolio 4-Column */
if( !function_exists( 'bluu_portfolio_full_four_column' ) ) {

	function bluu_portfolio_full_four_column( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'count' => 8
		), $atts ) );

		?>

		<div class="sc-portfolio">

			<div id="portfolio-squares-full-four" class="clearfix">

				<?php

				$sc_posts_four = new WP_Query( array(
					'post_type' => 'portfolio-items',
					'showposts' => $count
				) );

				ob_start();

				?>

				<?php while( $sc_posts_four->have_posts() ) : $sc_posts_four->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( "portfolio-square" ); ?>>

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

				<?php endwhile; wp_reset_postdata(); ?>

			</div><!-- end #portfolio-squares-full -->

		</div><!-- end .sc-portfolio -->

		<?php

		$portfolio_loop_four = ob_get_contents();

		ob_end_clean();

		return $portfolio_loop_four;

	}

	add_shortcode( 'portfolio_four_column', 'bluu_portfolio_full_four_column' );

}


/* Full-Width Portfolio 5-Column */
if( !function_exists( 'bluu_portfolio_full_five_column' ) ) {

	function bluu_portfolio_full_five_column( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'count' => 15
		), $atts ) );

		?>

		<div class="sc-portfolio">

			<div id="portfolio-squares-full-five" class="clearfix">

				<?php

				$sc_posts_five = new WP_Query( array(
					'post_type' => 'portfolio-items',
					'showposts' => $count
				) );

				ob_start();

				?>

				<?php while( $sc_posts_five->have_posts() ) : $sc_posts_five->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( "portfolio-square" ); ?>>

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

				<?php endwhile; wp_reset_postdata(); ?>

			</div><!-- end #portfolio-squares-full -->

		</div><!-- end .sc-portfolio -->

		<?php

		$portfolio_loop_five = ob_get_contents();

		ob_end_clean();

		return $portfolio_loop_five;

	}

	add_shortcode( 'portfolio_five_column', 'bluu_portfolio_full_five_column' );

}


/* Section Heading */
if( !function_exists( 'bluu_section_heading' ) ) {

	function bluu_section_heading( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'title' => 'Welcome',
		), $atts ) );

		$output = null;
		$output .= '<div class="section-heading">';
		$output .= '<h3 class="section-heading-title">'.$title.'</h3>';
		$output .= '<div class="section-heading-sep"></div>';
		$output .= '<p>'.do_shortcode( $content ).'</p>';
		$output .= '</div>';

		return $output;

	}

	add_shortcode( 'section_heading', 'bluu_section_heading' );

}