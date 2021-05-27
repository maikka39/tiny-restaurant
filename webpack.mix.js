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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/donate.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    .sass('resources/css/pages/home.scss', 'public/css')
    .sass('resources/css/pages/news.scss', 'public/css')
    .sass('resources/css/pages/projects.scss', 'public/css')
    .sass('resources/css/pages/donate.scss', 'public/css')
    .sass('resources/css/pages/farmer.scss', 'public/css')
    .sass('resources/css/pages/project_individual.scss', 'public/css')
    .copyDirectory('resources/img', 'public/img');

mix.disableSuccessNotifications();
