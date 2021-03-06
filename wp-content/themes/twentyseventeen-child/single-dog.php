<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				$date = new DateTime(get_field('birthdate'));

				echo '<h1>';
				the_field('name');
				echo '</h1>';

				echo '<p>Race : ';
				the_field('race');
				echo '</p>';

				echo '<p>Birthdate : ';
				echo $date->format(get_option('date_format'));
				echo '</p>';


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
