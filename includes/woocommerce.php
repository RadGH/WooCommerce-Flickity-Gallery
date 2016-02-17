<?php
if( !defined( 'ABSPATH' ) ) exit;

add_filter( 'wc_get_template', 'wcfg_replace_image_and_thumb_with_gallery', 20, 5 );

function wcfg_replace_image_and_thumb_with_gallery( $located, $template_name, $args, $template_path, $default_path ) {
	if ( $template_name === 'single-product/product-image.php' ) {
		return WCFG_PATH . '/templates/gallery.php';
	}

	return $located;
}