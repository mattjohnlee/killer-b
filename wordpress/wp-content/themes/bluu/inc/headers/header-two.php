	<header id="header" class="site-header header-two" role="banner">

		<div id="header-top">
			<div class="inside clearfix">

				<nav id="top-navigation">

					<?php wp_nav_menu( array( 
						'theme_location' => 'top',
						'container' => false,
						'menu_id' => 'top-menu',
						'menu_class' => 'clearfix',
						'fallback_cb' => ''
					) ); ?>

				</nav><!-- end #top-navigation -->

				<div class="header-top-widget">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div><!-- end .header-top-widget -->

			</div><!-- end .inside -->
		</div><!-- end #header-top -->

		<div class="inside clearfix">

			<div class="site-branding">
				<?php if ( get_theme_mod('bluu_customizer_logo') ) { ?>
					<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo '' .get_theme_mod( 'bluu_customizer_logo', '' )."\n";?>" alt="<?php the_title(); ?>" /></a>
				<?php } else { ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } ?>
			</div><!-- end .site-branding -->	

			<nav id="site-navigation" class="main-navigation" role="navigation">

				<?php wp_nav_menu( array( 
					'theme_location' => 'primary',
					'container' => false,
					'menu_id' => 'primary-menu',
					'menu_class' => 'sf-menu clearfix',
					'fallback_cb' => ''
				) ); ?>

			</nav><!-- end #site-navigation -->		

		</div><!-- end .inside -->
	</header><!-- end #header -->