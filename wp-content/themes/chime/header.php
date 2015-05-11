<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Sparxoo BP
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<?php // force Internet Explorer to use the latest rendering engine available ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php // mobile meta ?>
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-icon-touch.png">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">

<!--[if IE]>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<![endif]-->
<?php // or, set /favicon.ico for IE10 win ?>
<meta name="msapplication-TileColor" content="#f01d4f">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php // drop Google Analytics Here ?>

<?php // end analytics ?>

</head>

<body <?php body_class(); ?>>
<div class="mobile-menu-wrap">
<?php 
				//add the main menu that is defined in the funcitons.php file
				bp_main_mobile_nav(); 
			?>
</div>
<div class="mobile-slide">
<header id="masthead" class="site-header pull-left" role="banner">
	<div class="container">
		<div class="row">			
			<a id="logo" href="<?php echo home_url(); ?>" rel="nofollow">	
				<?php
					//uses the svg_png_backup function defined in inc/extras.php.  The first paramater is the image file name and the second paramater is the alt title text.  Use this funciton for all SVG img tags.
					//svg_png_backup('logo', 'The Gathering Spot');	
				?>	
				<img src="<?php bloginfo('template_url');?>/images/logo.png" alt="">
			</a>
		<div class="visible-sm-block visible-xs-block pull-right">
				<i id="mobile-toggle" class="menu-icon fa fa-align-justify"></i>
				<!--<i id="mobile-toggle" class="menu-icon"></i>-->

			</div>
			<?php 
				//add the main menu that is defined in the funcitons.php file
				bp_main_top_nav(); 
			?>					
		</div>
	</div>
</header><!-- #masthead -->

	<div id="content" class="site-content pull-left">