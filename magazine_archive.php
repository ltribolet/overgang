<?php
/**
 * Template Name: Magazine Archive
 *
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package overgang
 */

get_header(); ?>

    <section class="sub_header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section><!-- #primary -->
    <section>

		<?php
		$posts = get_posts();
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', 'magazine_archive' );

		endwhile; // End of the loop.
		?>
    </section>
<?php

get_footer();
