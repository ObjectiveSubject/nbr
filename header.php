<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package nbr
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="google-site-verification" content="_ABcKAXYpXY8R5wZid8MT6eVzu4v4eyy98PZfrLZzUo" />
<meta name="google-site-verification" content="V3PYRWtjXfq8szNB35MDhy6kjyDxNrTpHKdcwf8qyNg" />
<title><?php if (is_home()) { wp_title('', true, 'right'); } else { wp_title( '|', true, 'right' ); } ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" type="image/x-icon" href="<?php echo site_url(); ?>/favicon.ico"/>
<!--
/* @license
 * MyFonts Webfont Build ID 2628776, 2013-08-23T16:50:35-0400
 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s).
 * 
 * You may obtain a valid license at the URLs below.
 * 
 * Webfont: Avenir Next Pro Italic by Linotype
 * URL: http://www.myfonts.com/fonts/linotype/avenir-next-pro/pro-italic/
 * Licensed pageviews: 500,000
 * 
 * Webfont: Avenir Next Pro Regular by Linotype
 * URL: http://www.myfonts.com/fonts/linotype/avenir-next-pro/pro-regular/
 * Licensed pageviews: 250,000
 *
 * Webfont: Avenir Next Pro Medium by Linotype
 * URL: http://www.myfonts.com/fonts/linotype/avenir-next-pro/pro-medium/
 * Licensed pageviews: 250,000
 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=2628776
 * Webfonts copyright: Copyright &#x00A9; 2004 - 2007 Linotype GmbH, www.linotype.com.
 * All rights reserved. This font software may not be reproduced, modified, disclosed or
 * transferred without the express written approval of Linotype GmbH. Avenir is a
 * trademark of Linotype GmbH
 * 
 * © 2013 MyFonts Inc
*/

-->
<link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri().'/css/MyFontsWebfontsKit.css'); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo(get_template_directory_uri().'/css/jquery.mCustomScrollbar.css'); ?>">
<!--[if lt IE 9]>
<script src="<?php echo(get_template_directory_uri().'/js/html5shiv.js'); ?>"></script>
<![endif]-->
</head>

<body <?php body_class('bg-90'); ?>>

<div id="page" class="hfeed site">
	<!--[if lt IE 9]>
	<div class="browsehappy">
		<p>Welcome to the National Board of Review's website. You are using a browser that is <strong>outdated</strong>.To improve your experience on our site please <strong><a href="http://browsehappy.com/" target="_blank">upgrade your browser &raquo; </a></strong></p>
	</div>
	<![endif]-->
	
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo(get_template_directory_uri() . '/images/nbr-logo.png'); ?>" title="<?php bloginfo( 'name' ); ?>" /></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>

		<nav id="site-navigation" class="nav navigation-main" role="navigation">
			<h1 class="menu-toggle"><a href="#page" alt="Menu">Menu</a></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'nbr' ); ?>"><?php _e( 'Skip to content', 'nbr' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'column_one' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'column_two' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'column_three' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
		
	<div id="search-dropdown" data-selector="search">
		<?php get_search_form(); ?>
	</div>

	<div id="main" class="site-main bg-88">