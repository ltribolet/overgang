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
    <section id="archives_page">

		<?php
		$posts = get_posts();
		$i = 0;
		$postLeft = $columnRight = [];
		foreach ( $posts as $post ) {
			if ($i % 2 === 0) {
                $columnLeft[] = $post;
			} else {
			    $columnRight[] = $post;
            }
            ++$i;
		}
		?>
        <div class="container">
            <div class="row">
                <div class="column-left col-4 offset-1">
	                <?php
	                foreach ( $columnLeft as $postLeft ) {
		                $featured_image  = wp_get_attachment_image_src( get_post_thumbnail_id( $postLeft->ID ), 'full' );
		                $featured_image  = reset( $featured_image );
	                    ?>
                    <a class="archive_item inactive_item big-spacing" href="<?= esc_url( get_permalink($postLeft->ID) )?>" data-bgcolor-begin="<?= get_field( 'color_selector_begin', $postLeft->ID ) ?>" data-bgcolor-end="<?= get_field( 'color_selector_end', $postLeft->ID ) ?>">
                        <div class="row">
                            <div class="col-12">
                                <img class="img-fluid" src="<?= $featured_image ?>" alt="">
                            </div>
                            <div class="col-12 archive_content">
                                <h4><?= get_field( 'magazine_number', $postLeft->ID ) ?> _ <?= date('M Y') ?></h4>
                                <h4><?= get_field( 'location', $postLeft->ID ) ?></h4>
		                        <h2><?= get_the_title($postLeft->ID) ?></h2>
                                <h3><?= get_field( 'subtitle', $postLeft->ID ); ?></h3>
                            </div>
                        </div>
                    </a>
	                <?php } ?>
                </div>
                <div class="column-right col-4 offset-2">
	                <?php
	                foreach ( $columnRight as $postRight ) {
		                $featured_image  = wp_get_attachment_image_src( get_post_thumbnail_id( $postRight->ID ), 'full' );
		                $featured_image  = reset( $featured_image );
		                ?>
                        <a class="archive_item inactive_item" href="<?= esc_url( get_permalink($postRight->ID) )?>" data-bgcolor="<?= get_field( 'color_selector', $postRight->ID ) ?>">
                            <div class="row">
                                <div class="col-12">
                                    <img class="img-fluid" src="<?= $featured_image ?>" alt="">
                                </div>
                                <div class="col-12 archive_content">
                                    <h4><?= get_field( 'magazine_number', $postRight->ID ) ?> _ <?= date('M Y') ?></h4>
                                    <h4><?= get_field( 'location', $postRight->ID ) ?></h4>
                                    <h2><?= get_the_title($postRight->ID) ?></h2>
                                    <h3><?= get_field( 'subtitle', $postRight->ID ); ?></h3>
                                </div>
                            </div>
                        </a>
	                <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php

get_footer();
