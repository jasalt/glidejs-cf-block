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
		Field::make( 'text', 'heading', __( 'Block Heading' ) ),
		Field::make( 'image', 'image', __( 'Block Image' ) ),
		Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
	) )
		->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			$context = Timber::get_context();
			$context['fields'] = $fields;
			// $context['image'] = get_image($context['fields']['image']);
			$context['attributes'] = $attributes;

			echo Timber::render('glidejs-cf-block.twig', $context);
	} );
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
