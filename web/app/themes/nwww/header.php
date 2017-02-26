<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nwww
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php global $app; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<nav class="main__menu top__menu text-center" id="menu">
    <?php wp_nav_menu([
        'menu' => 'Top',
        'menu_class' => 'menu',
        'container' => false
    ]); ?>
</nav>
<!--<div class="top__social text-right">-->
<!---->
<!--    --><?php //$app->get_social(); ?>
<!---->
<!---->
<!--</div>-->

<button class="btn c__w  menu__toggle">MENU</button>
