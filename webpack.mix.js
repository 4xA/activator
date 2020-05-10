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

 mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/packages/jquery/js')
    .copy('node_modules/uikit/dist/css', 'public/packages/uikit/css')
    .copy('node_modules/uikit/dist/js', 'public/packages/uikit/js')
    .copy('node_modules/uikit/dist/fonts', 'public/packages/uikit/fonts')
    .copy('resources/fonts/Inconsolata.otf', 'public/fonts')
    .copy('resources/img', 'public/img')
    .styles(['resources/css/main.css'], 'public/css/main.min.css')
    .styles(['resources/css/auth.css'], 'public/css/auth.min.css')
    .styles(['resources/css/boxes.css'], 'public/css/boxes.min.css')
    .styles([
       'node_modules/jquery-toggles/css/toggles.css',
       'node_modules/jquery-toggles/css/themes/toggles-modern.css'
    ], 'public/packages/jquery-toggles/css/toggles.min.css')
    .copy('node_modules/jquery-toggles/toggles.min.js', 'public/packages/jquery-toggles/js');