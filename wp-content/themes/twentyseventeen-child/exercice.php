<?php
/*
Template Name: Exercice
*/
get_header();


while ( have_posts() ) : the_post();
$img = get_field('illustration');
?>


<h1 class="left-side"><?php the_title(); ?></h1>
<img class="right-side" alt="<?php echo $img['alt'] ?>"
    src="<?php echo $img['url'] ?>" />

<section>
    <?php the_content(); ?>

    <div>
        <?php the_field('carte'); ?>
    </div>
</section>




<?php
endwhile;

get_footer(); 
?>
