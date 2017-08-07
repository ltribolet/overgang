<?php
/**
 * Template Name: Simple Page
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

get_header();

?>
    <div class="bg-light-grey">
        <section class="sub_header <?php the_ID(); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </section><!-- #primary -->
        <section>

            <div class="container">
                <div class="row">
                    <div class="col-12 simple_page <?= implode( " ", get_post_class() ) ?>">
						<?php
						while ( have_posts() ) : the_post();

							$post_content = '<div>' . apply_filters( 'the_content', get_the_content() ) . '</div>';

							$dom           = new DOMDocument();
							$dom->encoding = 'utf-8';
							$dom->loadHTML( utf8_decode( $post_content ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

							$images = $dom->getElementsByTagName( 'img' );

							/*
							 * If we have some images we have to ordinate them two by two with on offset for the odd one.
							 * So we will wrap them and add column classes to them.
							 */
							if ( $images->length > 0 ) {
								//Create new wrapper div
								$new_div = $dom->createElement( 'div' );
								$new_div->setAttribute( 'class', 'wrapper mb100' );

								//Find all images

								$i = 0;
								//Iterate though images
								/** @var DOMElement $image */
								foreach ( $images AS $image ) {
									//Replace image with this wrapper div
									// p > img >>> p > div.wrapper > img
									$image->parentNode->replaceChild( $new_div, $image );
									$classes = $i % 2 === 0 ? 'col-5 offset-1 img-responsive' : 'col-5 img-responsive';
									$image->setAttribute( 'class', $classes );
									$image->removeAttribute( 'height' );
									$image->removeAttribute( 'width' );
									//Append this image to wrapper div
									$new_div->appendChild( $image );
									++ $i;
								}

								// div > p > div.wrapper >>> div > div.wrapper
								$new_div->parentNode->parentNode->replaceChild( $new_div, $new_div->parentNode );
							}

							echo $dom->saveHTML();

						endwhile; // End of the loop.
						?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php

get_footer();
