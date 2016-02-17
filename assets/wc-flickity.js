jQuery(function() {
	var $slider_primary = jQuery('.wcfg-primary-gallery');
	if ( $slider_primary.length < 1 ) return;

	$slider_primary.flickity({
		pageDots: false,
		imagesLoaded: true,
		draggable: false,
		selectedAttraction: 0.01,
		friction: 0.15,
		arrowShape: {
			x0: 0,
			x1: 60, y1: 50,
			x2: 70, y2: 45,
			x3: 15
		}
	});

	// ---

	var $slider_nav = jQuery('.wcfg-nav-gallery');
	if ( $slider_nav.length < 1 ) return;

	$slider_nav.flickity({
		asNavFor: $slider_primary[0],
		contain: true,
		pageDots: false,
		imagesLoaded: true,
		freeScroll: true,
		prevNextButtons: false
	});
});