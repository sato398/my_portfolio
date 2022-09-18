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

mix.js('resources/js/site/app.js', 'public/js')
.css('resources/css/Navbar-Right-Links-icons.css', 'public/css/app.css')
.css('resources/css/bootstrap.min.css', 'public/css/app.css')
.sass('resources/sass/site/app.scss', 'public/css')
.version()
