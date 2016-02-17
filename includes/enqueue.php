<?php
if( !defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'wcfg_enqueue_scripts', 12 );

function wcfg_enqueue_scripts() {
	if ( !is_admin() && is_singular('product') ) {
		wp_enqueue_script( 'flickity', WCFG_URL . '/assets/flickity.pkgd.min.js', array( 'jquery' ), '1.1.1' );
		wp_enqueue_style( 'flickity', WCFG_URL . '/assets/flickity.css', array(), '1.1.1' );

		wp_enqueue_script( 'wc-flickity', WCFG_URL . '/assets/wc-flickity.js', array( 'jquery' ), WCFG_VERSION );
		wp_enqueue_style( 'wc-flickity', WCFG_URL . '/assets/wc-flickity.css', array(), WCFG_VERSION );
	}
}