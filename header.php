<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafish
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="profile" href="http://gmpg.org/xfn/11"> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-big-counter.min.css"> -->
	<style>
		/*Pace.js theme*/
		.pace{-webkit-pointer-events:none;pointer-events:none;-webkit-user-select:none;-moz-user-select:none;user-select:none}.pace.pace-inactive .pace-progress{display:none}.pace .pace-progress{position:fixed;z-index:2000;top:0;right:0;height:5rem;width:5rem;-webkit-transform:translate3d(0,0,0)!important;-ms-transform:translate3d(0,0,0)!important;transform:translate3d(0,0,0)!important}.pace .pace-progress:after{display:block;position:absolute;top:0;right:.5rem;content:attr(data-progress-text);font-family:"Helvetica Neue",sans-serif;font-weight:100;font-size:5rem;line-height:1;text-align:right;color:rgba(0,0,0,.19999999999999996)}
	</style>
	
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".menu-portfolio-container" style="position: relative;">
<div id="page" class="site">
	<header id="masthead" class="container-fluid site-header">
		<div class="row">
			<div class="site-branding col-6 col-md-6 col-lg-1 pl-4">
				
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<!--<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>-->
					<?php
				else :
					?>
					<!--<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>-->
					<?php
				endif;
				$mediafish_description = get_bloginfo( 'description', 'display' );
				if ( $mediafish_description || is_customize_preview() ) :
					?>
					<!--<p class="site-description"><?php echo $mediafish_description; /* WPCS: xss ok. */ ?></p>-->
				<?php endif; ?>
			</div><!-- .site-branding -->
			</div>
			
		</div>
	
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
