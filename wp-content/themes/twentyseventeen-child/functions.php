<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    wp_enqueue_style('bloup', get_stylesheet_directory_uri() . '/assets/css/bloup.css');

}

function page_widget_init() {

	register_sidebar( array(
		'name'          => 'Page Bottom Widget',
		'id'            => 'widget_page_bottom',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'page_widget_init' );

function liste_widget_register() {
    include 'widgets/liste-projet.php';
    register_widget( 'Liste_Projet' );
}

add_action('widgets_init', 'liste_widget_register');

?>