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

	<div id="primary" class="row">
		<div class="col-11" role="main">

			<?php

				/*
				 * GET MAGAZINE
				 */
				$magazine = get_terms( [ 'taxonomy' => 'magazine' ], [
					'orderby' => 'none',
					'order'   => 'DESC',
					'number'  => 1
				] );
				$latest_magazine = reset( $magazine );

				// Get the cover image to display
				$cover = get_field('magazine_cover', $latest_magazine);
				$subtitle = get_field('magazine_subtitle', $latest_magazine);

				//get_template_part( 'template-parts/content', 'none' );

			?>
			<div class="hero-holder">
				<img src="<?= $cover['url']?>" alt="">
				<div class="hero-caption">
					<h2 class="hero-subtitle"><?= $subtitle?></h2>
					<h1 class="hero-title"><?= $latest_magazine->name?></h1>
				</div>
			</div>

		</div>
		<div class="col-1"></div>
	</div><!-- #primary -->
	<div class="row">
		<div class="col-7">
			<div class="cover-description">
				<?= $latest_magazine->description?>
			</div>
		</div>
		<div class="col-4"></div>
		<div class="col-1"></div>
	</div>
	<div class="row">
		<?php
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
				$title = the_title('', '', false);
				$contentTeaser = get_the_excerpt();
				$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
				$featured_image = reset($featured_image);
				$date = get_the_time('d / m / Y');
			endwhile;
		?>
		<div class="col-11 cover-portrait">
			<div class="media">
				<span class="d-flex align-self-center mr-5" style="width:420px"></span>
				<div class="media-body">
					<h3 class="mt-0 mb-5">Portrait</h3>
				</div>
			</div>
			<div class="media">
				<img class="d-flex align-self-center mr-5" src="<?= $featured_image; ?>" alt="" width="420">
				<div class="media-body">
					<p class="teaser-title mt-4"><?= $title; ?></p>
					<p class="teaser-utilities">Paris - <?= $date; ?></p>
					<p class="my-5"><?= $contentTeaser; ?></p>
					<p class="teaser-catch-phrase"></p>
					<div class="teaser-call_to_action d-flex justify-content-center">
						<button type="button" class="btn btn-primary mr-3">Voir la suite</button>
						<button type="button" class="btn btn-secondary">Les autres interviews</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-1"></div>
	</div>
	<div class="row cover-recipes pt-5">
		<div class="col-2">
			<h3>Recettes</h3>
			<p>En 15 minutes</p>
			<p>5 ingrédients</p>
			<p>Pour 4 personnes</p>
			<button type="button" class="btn btn-secondary">Les autres recettes</button>
		</div>
		<div class="col-9">
			<div class="col">
				<?php
				/*
					 * GET POSTS BY CATEGORIES
					 */
				$args = [
					'tax_query'     => [
						[
							$latest_magazine->slug
						]
					],
					'category_name' => 'recette'
				];

				$wp_query = new WP_Query( $args );
				/* Start the Loop */
				$nbRecipes = 0;
				while ( $wp_query->have_posts() && $nbRecipes < 3) : $wp_query->the_post();
					$title = the_title('', '', false);
					$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
					$featured_image = reset($featured_image);

				?>
					<div class="col-4">
						<img class="d-flex align-self-center mr-5" src="<?= $featured_image; ?>" alt="" width="280" height="280">
						<p><?= $title; ?></p>
					</div>
				<?php
				endwhile;
				?>
			</div>
		</div>
		<div class="col-1"></div>
	</div>
	<div class="row cover-diy pt-5 mb-5">
		<div class="col-2">
			<h3>DIY</h3>
			<p>En 15 minutes</p>
			<p>5 ingrédients</p>
			<p>Pour 4 personnes</p>
			<button type="button" class="btn btn-secondary">Les autres diy</button>
		</div>
		<div class="col-9">
			<div class="col">
				<?php
				/*
					 * GET POSTS BY CATEGORIES
					 */
				$args = [
					'tax_query'     => [
						[
							$latest_magazine->slug
						]
					],
					'category_name' => 'diy'
				];

				$wp_query = new WP_Query( $args );
				/* Start the Loop */
				$nbDiy = 0;
				while ( $wp_query->have_posts() && $nbDiy < 3) : $wp_query->the_post();
					$title = the_title('', '', false);
					$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
					$featured_image = reset($featured_image);

					?>
					<div class="col-4">
						<img class="d-flex align-self-center mr-5" src="<?= $featured_image; ?>" alt="" width="480" height="480">
						<p><?= $title; ?></p>
					</div>
					<?php
				endwhile;
				?>
			</div>
		</div>
		<div class="col-1"></div>
	</div>
	<div class="row">
		<div class="col-11 cover-cliche p-5">
            <h3>Cliché ou « saviez-vous ? »</h3>

            <?php
			/*
				 * GET POSTS BY CATEGORIES
				 */
			$args = [
				'tax_query'     => [
					[
						$latest_magazine->slug
					]
				],
				'category_name' => 'cliches'
			];

			$wp_query = new WP_Query( $args );
			/* Start the Loop */
			$nbCliche = 0;
			while ( $wp_query->have_posts() && $nbCliche < 1) : $wp_query->the_post();
				$title = the_title('', '', false);
				$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
				$featured_image = reset($featured_image);

				?>
                <p><?= $title; ?></p>
                <button type="button" class="btn btn-primary">en savoir plus</button>
				<?php
			endwhile;
			?>
            <p></p>
		</div>
		<div class="col-1">
		</div>
	</div>
	<div class="row cover-other">
		<div class="col-6">

		</div>
		<div class="col-6">
			<h3>Portrait</h3>
		</div>
	</div>
	<div class="row cover-older">
		<div class="col-6">

		</div>
		<div class="col-6">
			<h3>Portrait</h3>
		</div>
	</div>
<?php
//get_sidebar();
get_footer();
