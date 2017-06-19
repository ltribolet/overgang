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

//get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) :

                /*
                 * GET MAGAZINE
                 */
				$magazine = get_terms( [ 'taxonomy' => 'magazine' ], [
					'orderby' => 'none',
					'order'   => 'DESC',
					'number'  => 1
				] );
				$latest_magazine = reset( $magazine );

				/*
				 * GET POSTS BY CATEGORIES
				 */
				$args = [
					'tax_query'     => [
						[
							$latest_magazine->slug
						]
					],
					'category_name' => 'interview'
				];

				$wp_query = new WP_Query( $args );
				/* Start the Loop */
				while ( $wp_query->have_posts() ) : $wp_query->the_post();
					the_title();
				endwhile;


			else :

				//get_template_part( 'template-parts/content', 'none' );

			endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
//get_footer();
