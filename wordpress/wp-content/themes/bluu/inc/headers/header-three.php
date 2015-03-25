	<header id="header" class="site-header header-three" role="banner">

		<div class="inside clearfix">

			<div class="site-branding">
				<?php if ( get_theme_mod('bluu_customizer_logo') ) { ?>
					<a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo '' .get_theme_mod( 'bluu_customizer_logo', '' )."\n";?>" alt="<?php the_title(); ?>" /></a>
				<?php } else { ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } ?>
			</div><!-- end .site-branding -->	

		</div><!-- end .inside -->

		<div id="full-navigation">
			<div class="inside">

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
		</div><!-- end #full-navigation -->

	</header><!-- end #header -->