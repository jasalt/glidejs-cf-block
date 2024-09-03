Experimenting...

# Installation

Clone repo into `wp-content/plugins/` and:
```
cd glidejs-cf-block
composer install
npm install
```

Enable plugin in WordPress and add block "GlideJS CF Block" in Gutenberg editor.

# TODO

## Correct Carbon Fields init in plugin context?

Does `\Carbon_Fields\Carbon_Fields::boot();` fail if called multiple times?
