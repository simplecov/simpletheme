<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <? body_class(); ?>>
    <div class="body-wrapper">

        <header class="site-header" role="banner">
            <? get_template_part( 'template-parts/header/header', 'content' ); ?>
            <? get_template_part( 'template-parts/header/header', 'media' ); ?>
        </header>

        <div class="container page-content">
            <div class="row">