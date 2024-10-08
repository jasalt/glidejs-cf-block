<?php

/**
 * Plugin Name: GlideJS CF Block
 * Description: A custom block for the Gutenberg editor that displays a carousel of images using GlideJS.
 * Version: 1.0
 */

// composer require htmlburger/carbon-fields
// https://docs.carbonfields.net/quickstart.html

// npm install @glidejs/glide
// https://glidejs.com/docs/setup/

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Timber\Timber;


add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Block::make( __( 'GlideJS Block' ) )
	->add_fields( array(
		Field::make( 'media_gallery', 'crb_slider_medias', __( 'Slider Medias' ) ),
	) )
		->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			$context = Timber::context();
			$context['fields'] = $fields;
			$context['attributes'] = $attributes;

			$context['images'] = [];

			foreach ($fields['crb_slider_medias'] as $image_id) {
				$context['images'][] = wp_get_attachment_image_src($image_id, 'full')[0];
			}

			// Get relative path to the plugin
			// TODO __FILE__ not accessible in Twig, workaround
			$context['plugin_path'] = plugin_dir_url( __FILE__ );

			echo Timber::render('glidejs-cf-block.twig', $context);
	} );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
