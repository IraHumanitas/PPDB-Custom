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
    // .js('resources/js/map.js', 'public/js')  // Add this line
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .styles([
        'public/css/app.css',
        'node_modules/leaflet/dist/leaflet.css',
    ], 'public/css/all.css');

    
mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.json', '*']
    }
});