<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package overgang
 */

?>

<?php
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
$featured_image = reset( $featured_image );
?>

<a class="archive_item" href="<?= esc_url( get_permalink() )?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="media">
                    <img class="d-flex archive__media" src="<?= $featured_image ?>" alt="Generic placeholder image">
                    <div class="media-body align-self-center">
                        <h4>Numéro 1 _ <?= date('M Y')?></h4>
						<?php the_title( '<h2 class="bold">', '</h2>' ); ?>
                        <h3><?= get_field( 'subtitle', get_the_ID() ); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>