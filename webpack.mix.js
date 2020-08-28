const mix = require('laravel-mix');
require('laravel-mix-alias');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', {
        precision : 5
    });

mix.browserSync({
  //  proxy:'',
});

mix.alias({
    '@': '/resources/js',
    '~': '/resources/sass',
    '@components': '/resources/js/components',
    '@pages': '/resources/js/pages',
    '@modules' : '/node_modules',
    '@assets' : '/resources/js/assets'
});
