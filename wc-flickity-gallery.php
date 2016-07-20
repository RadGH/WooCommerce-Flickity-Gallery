<?php
/*
Plugin Name: WooCommerce - Flickity Gallery
Version:     1.0.1
Plugin URI:  http://radgh.com/
Description: Turn your WooCommerce featured image and gallery photos into an interactive image carousel using Flickity.
Author:      Radley Sustaire
Author URI:  mailto:radleygh@gmail.com
License:     GPLv3
*/

/*
GNU GENERAL PUBLIC LICENSE

A plugin for WooCommerce to turn product photos into a Flickity gallery.

Copyright (C) 2016 Radley Sustaire

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if( !defined( 'ABSPATH' ) ) exit;

define( 'WCFG_URL', untrailingslashit(plugin_dir_url( __FILE__ )) );
define( 'WCFG_PATH', dirname(__FILE__) );
define( 'WCFG_VERSION', '1.0.1' );

add_action( 'plugins_loaded', 'wcfg_init_plugin' );

function wcfg_init_plugin() {
	if ( !class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'wcfg_woocommerce_not_found' );
		return;
	}

	include( WCFG_PATH . '/includes/enqueue.php' );
	include( WCFG_PATH . '/includes/woocommerce.php' );
}

function wcfg_woocommerce_not_found() {
	?>
	<div class="error">
		<p><strong>WooCommerce - Flickity Gallery: Error</strong></p>
		<p>The required plugin <strong>WooCommerce</strong> is not running. Please activate this required plugin, or disable WooCommerce - Flickity Gallery.</p>
	</div>
	<?php
}