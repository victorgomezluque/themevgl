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
	$the_theme = wp_get_theme();
	wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . '/scss/css/styles.css', array(), $the_theme->get('1.x'));
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

	wp_enqueue_script(
		'options-value-script',
		get_stylesheet_directory_uri() . '/widgets-gutenberg/options-value/editor.js',
		array('wp-blocks', 'wp-editor', 'wp-element'),
		filemtime(get_stylesheet_directory() . '/widgets-gutenberg/options-value/editor.js'),
		true
	);
}
add_action('enqueue_block_editor_assets', 'enqueue_custom_block');