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

mix.scripts('node_modules/jquery/dist/jquery.js', 'public/assets/js/jquery.js')
    .scripts('resources/js/app.js', 'public/assets/js/script.js')
    .scripts('resources/materialize/js/bin/materialize.js', 'public/assets/js/materialize.js')
    .scripts('resources/js/jquery.dataTables.js', 'public/assets/js/jquery.datatable.js')
    .scripts('resources/js/dataTables.dataTables.js', 'public/assets/js/datatable.js')
    .sass('resources/materialize/sass/materialize.scss', 'public/assets/css/materialize.css')
    .styles('resources/css/app.css', 'public/assets/css/styles.css')
    .styles('resources/css/jquery.dataTables.css', 'public/assets/css/datatable.css');
