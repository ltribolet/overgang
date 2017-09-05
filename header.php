<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package overgang
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<title>{{title}}</title>

<?php 
    $title = 'Övergång Magazine';
    $description = 'Övergång est un magazine bi-mensuel qui donne la voix aux acteurs d\'un mouvement éco-responsable';
    $img = get_template_directory_uri().'/img/share.jpg';
?>

<meta name="description" content="<?php echo $description; ?>"/>

<!-- FB OPENGRAPH -->
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="<?php echo $title; ?>"/>
<meta property="og:title" content="<?php echo $title; ?>"/>
<meta property="og:description" content="<?php echo $description; ?>"/>
<meta property="og:image" content="<?php echo $img; ?>"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>

<!-- TWITTER CARD -->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="<?php echo $title; ?>"/>
<meta name="twitter:image" content="<?php echo $img; ?>"/>

<!-- GOOGLE PLUS -->
<meta itemprop="name" content="<?php echo $title; ?>"/>
<meta itemprop="description" content="<?php echo $description; ?>"/>

</head>

<body <?php body_class(); ?>>

<?php if (is_home()) {?>
    <div id="loader-wrapper" class="">
        <div class="loader-section">
            <div class="loader-text">
                <p>
                    Faire autrement
                </p>
            </div>
            <div class="logo">
                <img class="img-fluid" src="<?= get_template_directory_uri() ?>/img/logo-overgang-white.svg" alt="Overgang">
            </div>
        </div>
    </div>
<?php }?>

<div class="<?php if (is_home() || is_single() || is_page('archives')) {?>root<?php }?>">

<div class="site-wrapper">
	<div id="content" class="site-content">
        <nav class="pushed__left navbar navbar-toggleable-sm navbar-light">
            <!-- <div class="drop_menu_container hidden-md-up">
                <a href="#" class="drop_menu" id="drop_menu">Menu <span class="caret"></span></a>
	            <div id="drop_menu_list" class="invisible"><?php
	            $args = [
		            'menu' => 'top-menu',
		            'menu_class' => 'navbar-nav ml-auto',
		            'container' => ''
	            ];
	            wp_nav_menu($args);
	            ?></div>
            </div> -->
            <a class="navbar-brand" href="#">
                <img src="<?= get_template_directory_uri() ?>/img/logo-overgang-white.svg" width="150" height="auto" alt="">
            </a>
            <!-- <div class="collapse navbar-collapse overgang_nav" id="navbarSupportedContent">
	            <?php
                $args = [
                    'menu' => 'top-menu',
                    'menu_class' => 'navbar-nav ml-auto',
                    'container' => ''
                ];
                wp_nav_menu($args);
                ?>
            </div> -->
        </nav>
