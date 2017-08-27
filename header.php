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
</head>

<body <?php body_class(); ?>>

<?php if (is_home()) {?>
    <div id="loader-wrapper" class="">
        <div class="loader-section">
            <div class="loader-text">
                <p>
                    Magazine qui engage l'action
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
            <div class="drop_menu_container hidden-md-up">
                <a href="#" class="drop_menu" id="drop_menu">Menu <span class="caret"></span></a>
	            <div id="drop_menu_list" class="invisible"><?php
	            $args = [
		            'menu' => 'top-menu',
		            'menu_class' => 'navbar-nav ml-auto',
		            'container' => ''
	            ];
	            wp_nav_menu($args);
	            ?></div>
            </div>
            <a class="navbar-brand" href="#">
                <img src="<?= get_template_directory_uri() ?>/img/logo-overgang.svg" alt="">
            </a>
            <div class="collapse navbar-collapse overgang_nav" id="navbarSupportedContent">
	            <?php
                $args = [
                    'menu' => 'top-menu',
                    'menu_class' => 'navbar-nav ml-auto',
                    'container' => ''
                ];
                wp_nav_menu($args);
                ?>
            </div>
        </nav>
