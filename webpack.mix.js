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
    // Layout CSS
    .combine([
        'resources/assets/inspinia/css/bootstrap.min.css',
        'node_modules/mdi/css/materialdesignicons.min.css',
        'resources/assets/custom/css/font-awesome.min.css',
        'resources/assets/inspinia/css/toastr.min.css',
        'resources/assets/inspinia/css/animate.css',
        'resources/assets/inspinia/css/style.css',
        'resources/assets/custom/css/custom-layout.css'
    ], 'public/css/layout.css')

    // Layout JS
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

    // Files to copy
    .copy('node_modules/mdi/fonts', 'public/fonts')
    .copy('resources/assets/custom/fonts', 'public/fonts')

    .copy([
        'resources/assets/inspinia/img/a4.jpg',
        'resources/assets/inspinia/img/a7.jpg',
        'resources/assets/inspinia/img/profile.jpg',
        'resources/assets/inspinia/img/header-profile.png',
        'resources/assets/inspinia/img/profile_small.jpg',
        'resources/assets/inspinia/img/chosen-sprite.png',
        'resources/assets/inspinia/img/chosen-sprite@2x.png'
    ], 'public/img')


    // Create Common
    .scripts([
        'resources/assets/corner-studio/utilities/submit-form.js'
    ], 'public/js/create-edit-common.js')

    // Create custom Activity
    .combine([
        'resources/assets/inspinia/css/datepicker3.css'
    ], 'public/css/create-custom-activity.css')

    .scripts([
        'resources/assets/inspinia/js/bootstrap-datepicker.js',
        'resources/assets/inspinia/js/bootstrap-datepicker.es.min.js',
        'resources/assets/corner-studio/utilities/config-datepicker.js'
    ], 'public/js/create-custom-activity.js')

    // Create custom Subscription
    .combine([
        'resources/assets/inspinia/css/chosen.css',
        'resources/assets/custom/css/chosen.css',
        'resources/assets/inspinia/css/datepicker3.css',
        'resources/assets/inspinia/css/style.css'
    ], 'public/css/create-custom-subscription.css')

    .scripts([
        'resources/assets/inspinia/js/chosen.jquery.js',
        'resources/assets/inspinia/js/bootstrap-datepicker.js',
        'resources/assets/inspinia/js/bootstrap-datepicker.es.min.js',
        'resources/assets/corner-studio/utilities/config-datepicker.js'
    ], 'public/js/create-custom-subscription.js')

    // Schedules
    .combine([
        'node_modules/fullcalendar/dist/fullcalendar.min.css',
        'node_modules/sweetalert/dist/sweetalert.css'
    ], 'public/css/schedules.css')

    .scripts([
        'node_modules/moment/moment.js',
        'node_modules/fullcalendar/dist/fullcalendar.min.js',
        'resources/assets/inspinia/js/fullcalendar.es.js',
        'node_modules/sweetalert/dist/sweetalert.min.js'
    ], 'public/js/schedules.js');

