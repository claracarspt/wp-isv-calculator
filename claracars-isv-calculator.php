<?php
/**
 * Plugin Name:       Clara Cars ISV & IUC Calculator
 * Plugin URI:        https://claracars.pt/en/api
 * Description:       Embed a free Portuguese car-tax calculator — ISV (import tax) + IUC (annual road tax) — via the [claracars_isv] shortcode or a block. Maintained estimate, open source, no API key.
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Clara Cars
 * Author URI:        https://claracars.pt
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       claracars-isv-calculator
 *
 * The calculator itself is served from claracars.pt (open source: github.com/claracarspt/calcs).
 * This plugin renders a lightweight, responsive iframe with the attribution link baked in.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

const CLARACARS_ISV_ALLOWED_LANGS = array( 'pt', 'en', 'ru', 'ua' );

/**
 * Build the widget iframe markup.
 *
 * @param string $lang   One of pt|en|ru|ua.
 * @param int    $height Iframe height in px.
 * @param int    $width  Iframe width in px.
 * @return string Safe HTML.
 */
function claracars_isv_iframe( $lang, $height, $width ) {
	$lang   = in_array( $lang, CLARACARS_ISV_ALLOWED_LANGS, true ) ? $lang : 'pt';
	$height = max( 300, min( 900, (int) $height ) );
	$width  = max( 240, min( 1200, (int) $width ) );
	$src    = 'https://claracars.pt/embed-isv?lang=' . rawurlencode( $lang );

	// Load the resize helper only on pages that actually render the widget.
	wp_enqueue_script( 'claracars-isv-resize' );

	return sprintf(
		'<iframe src="%s" width="%d" height="%d" style="border:0;max-width:100%%" loading="lazy" title="%s"></iframe>',
		esc_url( $src ),
		$width,
		$height,
		esc_attr__( 'ISV + IUC calculator', 'claracars-isv-calculator' )
	);
}

/**
 * Shortcode: [claracars_isv lang="pt" height="380" width="360"]
 */
function claracars_isv_shortcode( $atts ) {
	$a = shortcode_atts(
		array(
			'lang'   => 'pt',
			'height' => 480,
			'width'  => 360,
		),
		$atts,
		'claracars_isv'
	);

	return claracars_isv_iframe( $a['lang'], $a['height'], $a['width'] );
}
add_shortcode( 'claracars_isv', 'claracars_isv_shortcode' );

/**
 * Front-end helper that auto-fits the iframe height to the widget content
 * (the widget posts its height via postMessage). Registered here; enqueued
 * only when the shortcode/block actually renders an iframe.
 */
function claracars_isv_register_scripts() {
	wp_register_script(
		'claracars-isv-resize',
		plugins_url( 'resize.js', __FILE__ ),
		array(),
		'1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'claracars_isv_register_scripts' );

/**
 * Register the block (server-rendered → reuses the same iframe output as the shortcode).
 */
function claracars_isv_register_block() {
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	register_block_type(
		__DIR__ . '/block.json',
		array(
			'render_callback' => function ( $attributes ) {
				return claracars_isv_iframe(
					isset( $attributes['lang'] ) ? $attributes['lang'] : 'pt',
					isset( $attributes['height'] ) ? $attributes['height'] : 480,
					360
				);
			},
		)
	);
}
add_action( 'init', 'claracars_isv_register_block' );
