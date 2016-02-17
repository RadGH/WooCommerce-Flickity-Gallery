<?php
if( !defined( 'ABSPATH' ) ) exit;

?>
<div class="images">
	<?php
	foreach( $slider_images as $img ) {
		echo sprintf(
			'<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto[product-gallery]"><img src="%s" alt="%s" width="%s" height="%s"></a>',
			esc_attr( $img['large'][0] ),
			esc_attr( $img['caption'] ),
			esc_attr( $img['medium'][0] ),
			esc_attr( $img['alt'] ),
			esc_attr( $img['medium'][1] ),
			esc_attr( $img['medium'][2] )
		);
	}
	?>
</div>