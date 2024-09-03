Experimental image carousel block plugin...

# Installation

Clone repo into `wp-content/plugins/` and:
```
cd glidejs-cf-block
composer install
npm install
```

Enable plugin in WordPress and add block "GlideJS CF Block" in Gutenberg editor.

# TODO

It is quite hacky at the moment but should work for adding a single instance on the template...
Works on my computer at least, almost!

## Load GlideJS assets and initialize properly

- Currently loads scripts & styles for every block instance.
- Initialization won't work if block is used multiple times in same view.

## Evaluate Timber\render fn use
It does enqueue styles etc extra stuff, not necessarily correct function to render this.

Ref https://github.com/timber/timber/discussions/3035

## Correct Carbon Fields init in plugin context?

Does `\Carbon_Fields\Carbon_Fields::boot();` fail if called multiple times?
