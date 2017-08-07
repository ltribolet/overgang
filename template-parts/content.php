<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package overgang
 */


$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
$featured_image = reset( $featured_image );
$color          = get_field( 'color_selector', get_the_ID() );
$subtitle       = get_field( 'subtitle', get_the_ID() );
$excerpt        = get_the_excerpt( get_the_ID() );
$tags           = wp_get_post_tags( get_the_ID() );

$post_content = apply_filters( 'the_content', get_the_content() );
$post_content = str_replace( [ "\r\n", "\n", "\r" ], "", $post_content );


$re = '/<h1>(.*?)<\/h1>/';
preg_match_all( $re, $post_content, $summary_titles, PREG_SET_ORDER, 0 );

/**
 * @param $post_content
 * @param $toBeReplaced
 * @param $replacement
 *
 * @return mixed
 */
function replaceBody( $post_content, $toBeReplaced, $replacement ) {
	return preg_replace( '/\{\{' . $toBeReplaced . '\}\}/', $replacement, $post_content );
}

$modified = $post_content;
$modified = replaceBody( $modified, 'column_style', '<div class="row">' );
$modified = replaceBody( $modified, 'column_style_centered', '<div class="row align-items-center justify-content-between">' );
$modified = replaceBody( $modified, 'column_1', '<div class="col-5 offset-1">' );
$modified = replaceBody( $modified, '\/column_1', '</div>' );
$modified = replaceBody( $modified, 'column_2', '<div class="col-5">' );
$modified = replaceBody( $modified, '\/column_2', '</div>' );

$modified = replaceBody( $modified, 'column_stretch_left', '<div class="col-6 pad0"><div class="wrapper">' );
$modified = replaceBody( $modified, 'column_stretch_right', '<div class="col-6 pad0"><div class="wrapper">' );
$modified = replaceBody( $modified, 'column_left', '<div class="col-6">' );
$modified = replaceBody( $modified, 'column_right', '<div class="col-6">' );
$modified = replaceBody( $modified, '\/column_stretch_left', '</div></div>' );
$modified = replaceBody( $modified, '\/column_stretch_right', '</div></div>' );
$modified = replaceBody( $modified, '\/column_left', '</div>' );
$modified = replaceBody( $modified, '\/column_right', '</div>' );
$modified = replaceBody( $modified, '\/column_style', '</div>' );

?>
    <section id="introduction" class="sub_header" style="background: <?= $color ?>">
        <div class="pushed__left hero-holder d-flex justify-content-start">
            <div class="hero-caption">
                <h3>Numéro 1</h3>
                <h3>_ <?= date( 'M Y' ) ?></h3>
                <h1 class="hero-title"><?= $latest_post->post_title ?></h1>
                <h2 class="hero-subtitle"><?= $subtitle ?></h2>
            </div>
            <div class="ml-auto intro__cover"><img class="" src="<?= $featured_image ?>" alt=""></div>
        </div>
        <div class="container excerpt">
            <div class="row">
                <div class="col-9">
                    <h3>Introduction</h3>
					<?= $excerpt ?>
                </div>
                <div class="col-3">
                    <h3>En quelques mots</h3>
                    <ul class="list-unstyled">
						<?php foreach ( $tags as $tag ) { ?>
                            <li><a href="<?= get_tag_link( $tag->term_id ) ?>"><?= $tag->name ?></a></li>
						<?php } ?>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- #primary -->
    <section id="summary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>sommaire</h3>
                    <ul class="list-unstyled">
						<?php $i = 1;
						foreach ( $summary_titles as $summary_title ) { ?>
                            <li><a href=""><?= sprintf( "%02s", $i ) ?> <?= $summary_title[1] ?></a></li>
							<?php ++ $i;
						} ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="post_body">
        <div class="container">
			<?= $modified ?>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <hr class="delimiter">
                </div>
            </div>
        </div>
    </section>

    <section id="related">
        <div class="container">
            <div class="row">
                <div class="col-12"><h3>Pour aller plus loin</h3></div>
            </div>
            <div class="row">

                <div class="col-3">

                </div>
                <div class="col-3">

                </div>
                <div class="col-3">

                </div>
                <div class="col-3">

                </div>
            </div>
        </div>
    </section>
    <section id="about">
		<?php
		$thumbnail_vcard = get_field( 'thumbnail_vcard', $latest_post );
		$content_vcard   = get_field( 'content_vcard', $latest_post );
		$credit_vcard    = get_field( 'credit_vcard', $latest_post );
		?>
        <div class="row marg0">
            <div class="col-6 pad0"><img class="about__cover" src="<?= $thumbnail_vcard["url"] ?>" alt=""></div>
            <div class="col-6 pad0" style="background: <?= $color ?>">
                <div class="vcard_content"><?= $content_vcard ?><?= $credit_vcard ?></div>
            </div>
        </div>
    </section>
    <section id="archives">
        <div class="d-flex justify-content-center">
            <a style="bold" href="<?= get_post_type_archive_link( 'post' ); ?>">Tous les magazines</a>
        </div>
    </section>
<?php
