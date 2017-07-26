<?php
get_template_part('Common.class');
get_template_part('Shortcodes.class');

/**
 * Styles and Scripts
 */
add_action('wp_enqueue_scripts', 'scriptsStyles');
function scriptsStyles()
{
    /**
     * Styles
     */
    wp_enqueue_style( 'styles', get_stylesheet_uri() );

    /**
     * Common scripts
     */
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.2.0.js', array(), '1.0.0', true );
    wp_enqueue_script( 'tether', get_template_directory_uri() . '/assets/js/tether.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery'), '1.0.0', true );

    /**
     * Special scripts
     */
    wp_enqueue_script( 'cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/js/jquery.imageScroll.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'slider-slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'blueimp-gallery', get_template_directory_uri() . '/assets/js/blueimp-gallery.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-image-gallery', get_template_directory_uri() . '/assets/js/bootstrap-image-gallery.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'parallax2', get_template_directory_uri() . '/assets/js/jquery.parallax.js', array('jquery'), '1.0.0', true );

    /**
     * Custom scripts
     */
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '3.0.0', true );
}
/**
 * Custom header
 */
require get_parent_theme_file_path( '/include/custom-header.php' );

/**
 * Setups new features
 */
function theme_setup() {

    load_theme_textdomain( 'simpletheme' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'top'    => __( 'Top Menu' ),
        'social' => __( 'Social Links Menu'),
    ) );

    /**
     * HTML5 for appropriate things
     */
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    /**
     * Custom logo
     */
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

    /**
     * Add additional content to theme options
     */
    $starter_content = array(

        'nav_menus' => array(
            'top' => array(
                'name' => __( 'Simple menu' ),
                'items' => array(
                    'link_home',
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),
        ),
    );

    /**
     * Magic is here
     */
    $starter_content = apply_filters( 'starter_content', $starter_content );

    add_theme_support( 'starter-content', $starter_content );
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'theme_setup' );

function excerpt( $link ) {
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">Узнать больше</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'excerpt' );