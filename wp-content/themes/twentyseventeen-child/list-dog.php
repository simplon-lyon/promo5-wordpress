<?php
/*
Template Name: Liste Dog
*/
get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

            <section class="dog-list">
            <?php
            $query = new WP_Query( array( 'post_type' => 'dog' ) );
            while($query->have_posts()) : $query->the_post();
                $date = new DateTime(get_field('birthdate'));
                
                echo '<article>';
                echo '<a href="';
                the_permalink();
                echo'" class="name">';
                the_field('name'); 
                echo'</a>';
                echo '<p class="race">' . get_field('race') . '</p>';
                echo '<p class="birthdate">';
				echo $date->format(get_option('date_format'));
                echo'</p>';

                echo '</article>';

            endwhile;
            wp_reset_postdata();
            ?>


            
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
