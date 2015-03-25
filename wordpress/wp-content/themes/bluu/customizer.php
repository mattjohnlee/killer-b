<?php

function bluu_customizer_register( $wp_customize ) {

	/*---------------------------------------------------------------------------------------

		Bluu Options

	---------------------------------------------------------------------------------------*/

	$wp_customize->add_section( 'bluu_customizer_options', array(
		'title' => __( 'General Options', 'bluu' ),
		'priority' => 10
	) );

	// Logo Upload
	$wp_customize->add_setting( 'bluu_customizer_logo', array(
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bluu_customizer_logo', array(
		'label' => __( 'Logo Upload', 'bluu' ),
		'section' => 'bluu_customizer_options',
		'settings' => 'bluu_customizer_logo',
		'priority' => 10
	) ) );

	// Logo Padding
	$wp_customize->add_setting( 'bluu_customizer_logo_padding', array(
        'default' => '20',
    ) );
 
    $wp_customize->add_control( 'bluu_customizer_logo_padding', array(
        'label'   => __( 'Logo Top Padding', 'bluu' ),
        'section' => 'bluu_customizer_options',
        'type'    => 'text',
        'priority' => 20
    ) );

	// Favicon Upload
	$wp_customize->add_setting( 'bluu_customizer_favicon', array(
	) );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bluu_customizer_favicon', array(
		'label' => __( 'Favicon Upload', 'bluu' ),
		'section' => 'bluu_customizer_options',
		'settings' => 'bluu_customizer_favicon',
        'priority' => 30
	) ) );

	// Header Template
	$wp_customize->add_setting( 'bluu_customizer_header_template', array(
        'default' => 'one',
    ) );
 
    $wp_customize->add_control( 'bluu_customizer_header_template', array(
        'label'   => 'Header Template',
        'section' => 'bluu_customizer_options',
        'type'    => 'select',
        'choices' => array(
        	'one' => 'Default Header',
        	'two' => 'Top Menu Header',
        	'three' => 'Full-Width Menu Header'
        ),
        'priority' => 40
    ) );

	// Homepage Pitch
	$wp_customize->add_setting( 'bluu_customizer_homepage_pitch', array(
        'default' => '',
    ) );
 
    $wp_customize->add_control( 'bluu_customizer_homepage_pitch', array(
        'label'   => __( 'Homepage Pitch', 'bluu' ),
        'section' => 'bluu_customizer_options',
        'type'    => 'text',
        'priority' => 50
    ) );

    // Portfolio URL
	$wp_customize->add_setting( 'bluu_customizer_portfolio_url', array(
        'default' => '',
    ) );
 
    $wp_customize->add_control( 'bluu_customizer_portfolio_url', array(
        'label'   => __( 'Portfolio Page URL', 'bluu' ),
        'section' => 'bluu_customizer_options',
        'type'    => 'text',
        'priority' => 60
    ) );

	// Primary colour
	$wp_customize->add_setting( 'bluu_customizer_primary_color', array(
		'default' => '#ff1d4d'
	) );
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bluu_customizer_primary_color', array(
		'label'   => __( 'Primary Color', 'bluu' ),
		'section' => 'colors',
		'settings'   => 'bluu_customizer_primary_color'
	) ) );

	
}
add_action( 'customize_register', 'bluu_customizer_register' );


function bluu_customizer_css() {
    ?>
		<style type="text/css">

			/*-----------------------------------------------
				Header Options
			-----------------------------------------------*/
			.site-branding {
				padding-top: <?php echo get_theme_mod('bluu_customizer_logo_padding'); ?>px;
			}

			/*-----------------------------------------------
				Primary Colour
			-----------------------------------------------*/
			a:hover,
			a:focus,
			a:active,
			.main-navigation ul li a:hover,
			.main-navigation ul li.current-menu-item a,
			#footer a:link,
			#footer a:visited,
			.contact-info p span,
			.project-list li span,
			.icon-color-primary,
			a.more-link,
			.tagcloud a {
				color: <?php echo get_theme_mod('bluu_customizer_primary_color'); ?>;
			}

			button:hover,
			html input[type="button"]:hover,
			input[type="reset"]:hover,
			input[type="submit"]:hover,
			.big-thumb-cta a,
			.portfolio-thumb-overlay,
			.wp-pagenavi .current,
			.pitch-sep,
			#sort-by li a.active,
			a.more-link:hover,
			.button-color-primary,
			.section-heading-sep,
			a.more-link:hover,
			.tagcloud a:hover {
				background: <?php echo get_theme_mod('bluu_customizer_primary_color'); ?>;
			}

			.wp-pagenavi .current,
			#sort-by li a.active,
			a.more-link,
			.tagcloud a {
				border-color: <?php echo get_theme_mod('bluu_customizer_primary_color'); ?>;
			}

		</style>
    <?php
}
add_action( 'wp_head', 'bluu_customizer_css');