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
<div class="root">

<div class="site-wrapper">
	<div id="content" class="site-content">
        <nav class="pushed__left navbar navbar-toggleable-md navbar-light">
            <a class="navbar-brand" href="#">
                <img src="<?= get_template_directory_uri() ?>/img/logo-overgang.png" alt="">
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
