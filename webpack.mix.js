const { mix } = require('laravel-mix');

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

mix
    // Layout
    .combine([
        'resources/assets/inspinia/css/bootstrap.min.css',
        'node_modules/mdi/css/materialdesignicons.min.css',
        'resources/assets/inspinia/css/toastr.min.css',
        'resources/assets/inspinia/css/animate.css',
        'resources/assets/inspinia/css/style.css',
        'resources/assets/custom/css/custom-layout.css'
    ], 'public/css/layout.css')

    .scripts([
        'resources/assets/inspinia/js/jquery-2.1.1.js',
        'resources/assets/inspinia/js/bootstrap.min.js',
        'resources/assets/inspinia/js/jquery.metisMenu.js',
        'resources/assets/inspinia/js/jquery.slimscroll.js',
        'resources/assets/inspinia/js/inspinia.js',
        'resources/assets/inspinia/js/pace.min.js',
        'resources/assets/inspinia/js/toastr.min.js',
        'resources/assets/custom/js/custom-layout.js'
    ], 'public/js/layout.js')

    .copy('node_modules/mdi/fonts', 'public/fonts')

    .copy([
        'resources/assets/inspinia/img/a4.jpg',
        'resources/assets/inspinia/img/a7.jpg',
        'resources/assets/inspinia/img/profile.jpg',
        'resources/assets/inspinia/img/header-profile.png',
        'resources/assets/inspinia/img/profile_small.jpg'
    ], 'public/img')


    // Create Common
    .scripts([
        'resources/assets/corner-studio/utilities/submit-form.js'
    ], 'public/js/create-edit-common.js');


