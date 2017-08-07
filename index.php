<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package overgang
 */

get_header(); ?>

<?php

/*
 * GET LATEST POST
 */
$args = array(
	'numberposts' => 1,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
);

$latest_post = wp_get_recent_posts( $args, OBJECT );

// Hate this but couldnt find another way to pass the post to get_template_part
global $post;
foreach ($latest_post as $post) {
	setup_postdata($post);
	get_template_part( 'template-parts/content', get_post_format() );
}


get_footer();
