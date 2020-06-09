const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
    'resources/assets/font-awesome/css/font-awesome.min.css',
    'resources/assets/css/simple-sidebar.css',
    'resources/assets/css/bootstrap.min.css'
], 'public/css/all.css');
