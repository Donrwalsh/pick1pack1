<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->

<?php

   $num = $wpdb->get_var('SELECT MAX(picks) from wp_master');
   $count = 0;

while ($count < 100 and $num > 0){

   $votedon = $wpdb->get_results('SELECT ID FROM wp_master WHERE picks = ' . $num);
   
if ($num == 1) {
    echo "<center><h1>Cards with 1 pick:<br></h1></center>";
} else {
if (!empty($votedon))
{
    echo "<center><h1>Cards with " . $num . " picks:<br></h1></center>";
}
}

foreach( $votedon as $results ) {

	echo '<img  src="http://pick1pack1.com/wp-content/uploads/2017/02/' . $results->ID . '.jpg">';
	$count = $count + 1;
    }
$num = $num -1;

}
		
?>
	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
