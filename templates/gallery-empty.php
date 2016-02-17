<?php
if( !defined( 'ABSPATH' ) ) exit;

global $post, $woocommerce, $product;

?>
<div class="images">
	<?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID ); ?>
</div>
