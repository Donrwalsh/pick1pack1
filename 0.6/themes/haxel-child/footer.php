<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package haxel
 */
?>

	</div><!-- #content -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php printf('Wizards of the Coast, Magic: The Gathering, and their logos are trademarks 
			of Wizards of the Coast LLC. © 2017 Wizards. All rights reserved. Pick1Pack1 
			is not affiliated with Wizards of the Coast LLC. The copyright for Magic: the Gathering 
			and all associated card names and card images is held by Wizards of the Coast. ');?>
			<br>
			<?php printf( __( 'Theme Designed by %1$s.', 'haxel' ), '<a href="'.esc_url("http://inkhive.com/").'" rel="nofollow">InkHive</a>' ); ?>
			<span class="sep"></span>
			<?php echo ( get_theme_mod('haxel_footer_text') == '' ) ? ('This site &copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','haxel')) : get_theme_mod('haxel_footer_text'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
