<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bluu
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php if( wp_is_mobile() ) { echo 'class="silky-smooth"'; } ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo '' .get_theme_mod( 'bluu_customizer_favicon', '' )."\n";?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-smooth-scrolling="1">

<div id="page" class="hfeed site">
	
	<?php
		if ( get_theme_mod( 'bluu_customizer_header_template' ) ) {
			include( 'inc/headers/header-'. get_theme_mod( 'bluu_customizer_header_template' ) .'.php' );
		} else {
			include( 'inc/headers/header-one.php' );
		}
	?>

	<div id="content" class="site-content">
		<div class="inside clearfix">
