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

mix.js('resources/js/app.js', 'public/js')
mix.js('resources/js/admin.js', 'public/js')
mix.js('resources/js/firstpage.js', 'public/js')
mix.js('resources/js/login.js', 'public/js')
//mix.js('resources/js/customer.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/login.scss', 'public/css')
   .sass('resources/sass/admin.scss', 'public/css')
   .sass('resources/sass/firstpage.scss', 'public/css')
   .sass('resources/sass/videocenter.scss', 'public/css')
   .sass('resources/sass/store.scss', 'public/css')

