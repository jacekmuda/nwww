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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php global $app; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="header__wrapper">
<header class="page__header container c__w" id="banner">
<div class="c__w padded">

    <div class="row is-flex">
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 text-left">
            <a href="<?php echo home_url(); ?>">
                <img class="logo" src="<?php $app->_eImg('logo.png'); ?>">
            </a>
        </div>
        <div class="col-xs-6 text-right hidden-sm hidden-lg menu__toggle hidden-md">
            <?php echo file_get_contents($app->_imgr('hamburger.svg')); ?>
        </div>
        <div class="col-xs-12 col-md-9 col-sm-9 hidden-xs  col-lg-9 navbar__right self-end">
            <div class="navbar__links text-right">

                <?php $app->get_social();?>

                <a class="btn btn-default btn-sm btn-black" href="#" role="button">dopisz się</a>
            </div>


            <nav class="main__menu text-right" id="menu">
            <?php wp_nav_menu([
                'menu' => 'Top',
                'menu_class' => 'nav navbar-nav navbar-right',
                'container' => false
            ]); ?>
            </nav>
        </div>

    </div>

</div>
</header>
</div>
