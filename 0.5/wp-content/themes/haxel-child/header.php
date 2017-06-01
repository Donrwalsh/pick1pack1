<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package haxel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php $site_url = get_site_url();?>
<?php wp_head(); //Runs the function wp_head() in wp_includes/general-template.php ?> 
</head>


<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header other" role="banner">
		<div>
			<div id="slickmenu"></div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<div class="navbar-header">
					<a href = "<?php echo get_home_url(); ?>"> <img src="<?php echo $site_url;?>/wp-content/uploads/core_images/Logo.png"></a>
				</div>
					<?php
						  //Display the Menu.
						
						  	if (has_nav_menu('primary')) {							
						  			wp_nav_menu( array( 'menu' => 'Sub_Page Primary', 'theme_location' => 'primary', 'walker' => new Haxel_Menu_With_Icon) );
						  	} else {
								  	wp_nav_menu( array( 'menu' => 'Sub_Page Primary', 'theme_location' => 'primary') );
						  	}
						  
						   ?>
			</nav><!-- #site-navigation -->
		


			
			<div class="social-icons">
				<?php get_template_part('social', 'fa'); ?>
			</div>
				
		</div>
		<div class="set-branding">
				<h1 class="set-title"><?php wp_title(''); ?></h1>
		</div>
	</header><!-- #masthead -->
	<div class="primary-box mega-container">
	
		<div id="content" class="site-content">