let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('resources/js/app.js','public/css/').sass("resources/sass/app.scss",'resources/admin/vendor/linearicons/style.css');

mix.js('resources/js/app.js', 'public/js').js('resources/admin/vendor/bootstrap/js/bootstrap.min.js','public/js/');
