const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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
    .js('resources/js/slideshow.js', 'public/js')
    .js('resources/js/donate.js', 'public/js')
    .js('resources/js/partners.js', 'public/js')
    .sass('resources/css/app.scss', 'public/css')
    .sass('resources/css/newsItem.scss', 'public/css')
    .sass('resources/css/slideshow.scss', 'public/css')
    .sass('resources/css/donate.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .copyDirectory('resources/img', 'public/img');

mix.disableSuccessNotifications();
