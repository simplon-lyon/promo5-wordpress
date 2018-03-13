<?php
/*
Template Name: Mon Modèle de Page
*/


get_header();
?>

<?php

the_title();

echo '<p class="maClasse">';
the_field("champ_perso");
echo '</p>';

?>


<?php get_footer(); ?>
