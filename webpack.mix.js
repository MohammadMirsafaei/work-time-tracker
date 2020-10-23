const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles('resources/css/styles.min.css', 'public/css/main.min.css')
    .styles('resources/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
    .styles('resources/fonts/fontawesome5-overrides.min.css', 'public/fonts/fontawesome5-overrides.min.css')
    .copyDirectory('resources/images', 'public/images')
    .copy('resources/js/script.min.js', 'public/js/script.min.js');

