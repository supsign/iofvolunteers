const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copy('resources/js/','public/js/')

mix.copy('resources/css/bootstrap.min.css', 'public/css/');
mix.copy('resources/css/datepicker.min.css', 'public/css/');
mix.copy('resources/css/local.css', 'public/css/');
mix.copy('resources/css/media.css', 'public/css/');
mix.copy('resources/css/style.css', 'public/css/');

mix.copy('resources/images/', 'public/images/')
mix.copy('resources/fonts/', 'public/fonts/')