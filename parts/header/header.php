<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uncgonline
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'uncgonline' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-header-inner">
            <div class="site-branding">
                <p class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </p>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php
                include( __DIR__ . '/navigation/navigation.php' );
                include( __DIR__ . '/search/search.php' );
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
