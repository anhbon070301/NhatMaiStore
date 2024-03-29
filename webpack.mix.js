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

// Publish tất cả các tệp trong thư mục "resources/css" và các thư mục con
mix.copyDirectory('resources/css', 'public/css');

// Publish tất cả các tệp trong thư mục "resources/js" và các thư mục con
mix.copyDirectory('resources/js', 'public/js');
