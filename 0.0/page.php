<?php get_header(); ?>

<?php $nonce = wp_create_nonce("my_draft_pick_nonce"); ?>

<?php

for ($i = 1; $i <= 15; $i++) {
    $num = sprintf(rand(1, 16324), $i);
    $link = admin_url('admin-ajax.php?action=my_card_pick&nonce='.$nonce.'&choice='.$num);
    echo '<a class="card' . $i . '" data-nonce="' . $nonce . '" data-choice="' . $num . '" 
    href ="' . $link . '"
> <img  src="http://pick1pack1.com/wp-content/uploads/2017/02/' . $num . '.jpg">';
}

?>


	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



				<?php the_content(); ?>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
