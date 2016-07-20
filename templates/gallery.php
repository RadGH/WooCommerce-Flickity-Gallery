<?php
if( !defined( 'ABSPATH' ) ) exit;

global $post, $woocommerce, $product;

$image_ids = array();

// Featured image as the first item
if ( has_post_thumbnail() && get_post_thumbnail_id() ) {
	$image_ids[get_post_thumbnail_id()] = get_post_thumbnail_id();
}

// Gallery images afterwards
if ( $attachment_ids = $product->get_gallery_attachment_ids() ) foreach( $attachment_ids as $id ) {
	$image_ids[$id] = $id;
}

// Get URLs and <img> codes
$slider_images = array();

foreach( $image_ids as $id ) {
	if ( get_post_type( $id ) !== 'attachment' ) continue;

	$args = array( 'title' => get_the_title( $id ) );

	$caption = get_post( $id )->post_excerpt;
	$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );

	$large = wp_get_attachment_image_src( $id, 'full', false );
	$medium = wp_get_attachment_image_src( $id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), false );
	$small = wp_get_attachment_image_src( $id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), false );

	// Fallbacks in case woocommerce sizes aren't set.
	if ( !$medium || $medium === $large[0] ) $medium = wp_get_attachment_image_src( $id, 'medium', false );
	if ( !$small || $small === $large[0] ) $small = wp_get_attachment_image_src( $id, 'thumbnail', false );

	$slider_images[$id] = array(
		'caption' => $caption,
		'alt' => $alt,
		'large' => $large,
		'medium' => $medium,
		'small' => $small,
	);
}

// No photos? Pull in a placeholder, based on the original product-image.php.
if ( empty($slider_images) ) {
	include( WCFG_PATH . '/templates/gallery-empty.php' );
	return;
}

// Just one photo? Pull in the single template instead
if ( count($slider_images) === 1 ) {
	include( WCFG_PATH . '/templates/gallery-single.php' );
	return;
}

?>
<div class="images">

	<div class="<?php echo ( count($slider_images) > 1 ) ? 'wcfg-primary-gallery' : 'wcfg-single-image'; ?>">
	<?php
	foreach( $slider_images as $img ) {
		echo sprintf(
			'<a href="%s" itemprop="image" class="woocommerce-main-image wcfg-primary-image" title="%s"><img src="%s" width="%s" height="%s" alt="%s"></a>',
			esc_attr( $img['large'][0] ),
			esc_attr( $img['caption'] ),
			esc_attr( $img['medium'][0] ),
			esc_attr( $img['medium'][1] ),
			esc_attr( $img['medium'][2] ),
			esc_attr( $img['alt'] )
		);
	}
	?>
	</div>

	<?php if ( count($slider_images) > 1 ) { ?>
	<div class="wcfg-nav-gallery">
		<?php
		foreach( $slider_images as $img ) {
			// We'll use Flickity to lazy load the images and serve the thumbnails until they have loaded.
			echo sprintf(
				'<a href="#" class="wcfg-nav-image" title="%s"><img src="%s" width="%s" height="%s" alt="%s"></a>',
				esc_attr( $img['caption'] ),
				esc_attr( $img['small'][0] ),
				esc_attr( $img['small'][1] ),
				esc_attr( $img['small'][2] ),
				esc_attr( $img['alt'] )
			);
		}
		?>
	</div>
	<?php } ?>

</div>
