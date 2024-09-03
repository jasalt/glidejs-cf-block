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


add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Block::make( __( 'GlideJS Block' ) )
	->add_fields( array(
		Field::make( 'text', 'heading', __( 'Block Heading' ) ),
		Field::make( 'image', 'image', __( 'Block Image' ) ),
		Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
	) )
	->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
		?>

		<div class="block">
			<div class="block__heading">
				<h1><?php echo esc_html( $fields['heading'] ); ?></h1>
			</div><!-- /.block__heading -->

			<div class="block__image">
				<?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
			</div><!-- /.block__image -->

			<div class="block__content">
				<?php echo apply_filters( 'the_content', $fields['content'] ); ?>
			</div><!-- /.block__content -->
		</div><!-- /.block -->

		<?php
	} );

}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
