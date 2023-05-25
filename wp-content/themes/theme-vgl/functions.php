<?php
/**
 * Theme-vgl Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-vgl
 */

add_action('wp_enqueue_scripts', 'understrap_parent_theme_enqueue_styles');

/**
 * Enqueue scripts and styles.
 */
function understrap_parent_theme_enqueue_styles()
{
	wp_enqueue_style('understrap-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style(
		'theme-vgl-style',
		get_stylesheet_directory_uri() . '/style.css',
		['understrap-style']
	);
}

function enqueue_custom_block()
{
	wp_enqueue_script(
		'image-text-script',
		get_stylesheet_directory_uri() . '/widgets-gutenberg/image-text/editor.js',
		array('wp-blocks', 'wp-editor', 'wp-element'),
		filemtime(get_stylesheet_directory() . '/widgets-gutenberg/image-text/editor.js'),
		true
	);

	wp_enqueue_style(
		'image-text-style',
		get_stylesheet_directory_uri() . '/widgets-gutenberg/image-text/style.css',
		array(),
		filemtime(get_stylesheet_directory() . '/widgets-gutenberg/image-text/style.css')
	);

	wp_enqueue_script(
		'banner-script',
		get_stylesheet_directory_uri() . '/widgets-gutenberg/banner/editor.js',
		array('wp-blocks', 'wp-editor', 'wp-element'),
		filemtime(get_stylesheet_directory() . '/widgets-gutenberg/banner/editor.js'),
		true
	);

	wp_enqueue_style(
		'banner-style',
		get_stylesheet_directory_uri() . '/widgets-gutenberg/banner/style.css',
		array(),
		filemtime(get_stylesheet_directory() . '/widgets-gutenberg/banner/style.css')
	);
}
add_action('enqueue_block_editor_assets', 'enqueue_custom_block');

