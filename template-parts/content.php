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
$color_begin          = get_field( 'color_selector_begin', get_the_ID() );
$color_end          = get_field( 'color_selector_end', get_the_ID() );
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

// must do otherwise DOMDocument does not have a root and add one by itself but not the way we want it.
$post_content = '<div>' . $post_content . '</div>';

$dom           = new DOMDocument();
$dom->encoding = 'utf-8';
$dom->loadHTML( utf8_decode( $post_content ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

$h2s = $dom->getElementsByTagName( 'h2' );

if ( $h2s->length > 0 ) {
	//Iterate though ps
    /** @var DOMElement $h2 */
	foreach ( $h2s AS $h2 ) {
		$h2->setAttribute( 'class', 'bold text tiny-spacing' );
	}
}

$modified = $dom->saveHTML();
?>
    <section id="introduction" class="sub_header" style="background-image: linear-gradient(to left top, <?= $color_end ?>, <?= $color_begin ?>);">
        <div class="container hero-holder d-flex justify-content-start">
            <div class="row align-items-center justify-content-between">
                <div class="col-5">
                    <h3 class="information light-grey"><?= get_field( 'magazine_number', get_the_ID() ) ?> _ <?= date('M Y') ?></h3>
                    <h3 class="information light-grey"><?= get_field( 'location', get_the_ID() ) ?></h3>
                    <h1 class="h1 bold"><?php the_title() ?></h1>
                    <h2 class="h1"><?= $subtitle ?></h2>
                </div>
                <div class="offset-1 col-6 p-0">
                    <div class="wrapper"><img class="" src="<?= $featured_image ?>" alt=""></div>
                </div>
            </div>
        </div>
        <div class="container excerpt">
            <div class="row">
                <div class="col-9">
                    <h3 class="information light-grey">Édito</h3>
					<p class="h2"><?= $excerpt ?></p>
                </div>
                <div class="col-2 offset-1">
                    <h3 class="information light-grey">En quelques mots</h3>
                    <ul class="list-unstyled">
						<?php foreach ( $tags as $tag ) { ?>
                            <li><?= $tag->name ?></li>
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
                    <h3 class="information light-grey">Sommaire</h3>
                    <ul class="list-unstyled">
						<?php $i = 1;
						foreach ( $summary_titles as $summary_title ) { ?>
                            <li><a href="" class="unstyled-link"><span><?= sprintf( "%02s", $i ) ?></span> <span class="h2 pl-2"><?= $summary_title[1] ?></span></a></li>
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
                <div class="col-12"><h3 class="information light-grey">Pour aller plus loin</h3></div>
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
        <div class="row m-0">
            <div class="col-6 p-0"><img class="about__cover" src="<?= $thumbnail_vcard["url"] ?>" alt=""></div>
            <div class="col-6 p-0" style="background-image: linear-gradient(to left top, <?= $color_end ?>, <?= $color_begin ?>);">
                <div class="vcard_content"><?= $content_vcard ?><?= $credit_vcard ?></div>
            </div>
        </div>
    </section>
    <section id="archives">
        <div class="d-flex justify-content-center">
            <a style="bold" href="<?= get_page_link( get_page_by_path( 'archives' )->ID ); ?>">Tous les magazines</a>
        </div>
    </section>
<?php
