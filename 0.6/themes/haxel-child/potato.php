<?php
/**
 * The front page template file.
 *
 * @package haxel
 */

get_header('front'); ?>


	<div id="primary" class="content-areas">
		<main id="main" class="site-main" role="main">
			<h1>pick1pack1.com version 0.2:</h1>
			<div><h4>
				Now includes booster selection by set.<br><br>
				Records statistics about cards picked and unpicked.<br><br>
				User registration available for tracking individual picks.<br><br>
			</div></h4>
			<h1>Welcome to Pick 1 Pack 1</h1>
				<div id="homepage-text">
				Pick 1 Pack 1 is a first-pick draft simulator that lets you make first picks and 			explore statistics about other first picks from every set ever printed. Login or Register to see personalized stats; an account is not required to submit picks.
				</div>
				<br><br><br>
				<div>
			

			<h3><?php $potato = $wpdb->get_var('SELECT COUNT(*) FROM pack_15 WHERE pick IS NOT NULL;')?>
				<?php $potato = number_format ( $potato);?>
				<?php echo '   ' . $potato . ' Picks So Far';?></h3>
				</div>
			<ul>

<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
<li><?php the_excerpt(__('(more…)')); ?></li>
<?php
endwhile;
wp_reset_postdata();
?>
</ul>

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
