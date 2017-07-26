<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses twentyseventeen_header_style()
 */
function custom_header_setup() {

	/**
	 * Filter Twenty Seventeen custom-header support arguments.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image     		Default image of the header.
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 *     @type string $flex-height     		Flex support for height of header.
	 * }
	 */
	$props = [
        'default-image'      => get_parent_theme_file_uri( '/assets/images/default-image.jpg' ),
        'width'              => 2000,
        'height'             => 1200,
        'flex-height'        => false,
        'video'              => false,
    ];
	add_theme_support( 'custom-header', $props);

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/default-image.jpg',
			'thumbnail_url' => '%s/assets/images/default-image.jpg',
			'description'   => __( 'Default image' ),
		),
	) );
}
add_action( 'after_setup_theme', 'custom_header_setup' );
