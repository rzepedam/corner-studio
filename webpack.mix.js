const { mix } = require('laravel-mix');

mix
    .combine([
        'resources/assets/inspinia/css/bootstrap.min.css',
        'node_modules/mdi/css/materialdesignicons.min.css',
        'resources/assets/custom/css/font-awesome.min.css',
        'resources/assets/inspinia/css/toastr.min.css',
        'node_modules/sweetalert/dist/sweetalert.css',
        'node_modules/node-waves/dist/waves.min.css',
        'resources/assets/inspinia/css/animate.css',
        'resources/assets/inspinia/css/style.css',
        'resources/assets/custom/css/custom-layout.css'
    ], 'public/css/layout.css')

    // Images to copy
        .copy('resources/assets/inspinia/img/header-profile.png', 'public/css/patterns')
        .copy('resources/assets/inspinia/img/header-profile-skin-1.png', 'public/css/patterns')
        .copy('resources/assets/custom/img/logo.png', 'public/img')
        .copy('resources/assets/custom/img/logo_full.png', 'public/img')
        .copy('resources/assets/custom/img/profile.png', 'public/img')
        .copy('resources/assets/inspinia/img/profile_small.jpg', 'public/img')
        .copy('node_modules/chosen-js/chosen-sprite.png', 'public/css')
        .copy('node_modules/chosen-js/chosen-sprite@2x.png', 'public/css')

    // Layout JS
        .scripts([
            'resources/assets/inspinia/js/jquery-2.1.1.js',
            'resources/assets/inspinia/js/bootstrap.min.js',
            'resources/assets/inspinia/js/jquery.metisMenu.js',
            'resources/assets/inspinia/js/jquery.slimscroll.js',
            'resources/assets/inspinia/js/inspinia.js',
            'resources/assets/inspinia/js/pace.min.js',
            'resources/assets/inspinia/js/toastr.min.js',
            'node_modules/sweetalert/dist/sweetalert.min.js',
            'node_modules/node-waves/dist/waves.min.js'
        ], 'public/js/layout.js')

    // Fonts
        .copy('node_modules/mdi/fonts', 'public/fonts')
        .copy('resources/assets/custom/fonts', 'public/fonts')
        .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.woff2', 'public/fonts')

    // Login
        .combine([
            'resources/assets/inspinia/css/bootstrap.min.css',
            'resources/assets/custom/css/font-awesome.min.css',
            'resources/assets/inspinia/css/animate.css',
            'resources/assets/inspinia/css/style.css',
        ], 'public/css/login.css')
        .scripts([
            'resources/assets/inspinia/js/jquery-2.1.1.js',
            'resources/assets/inspinia/js/bootstrap.min.js'
        ], 'public/js/login.js')

    // Index Common
        .scripts('resources/assets/corner-studio/utilities/delete.js', 'public/js/index-common.js')

    // Create Edit Common
        .scripts([
            'resources/assets/corner-studio/utilities/submit-form.js'
        ], 'public/js/create-edit-common.js')


    // Clients
        // Create Edit
            .combine([
                'resources/assets/inspinia/css/datepicker3.css'
            ], 'public/css/create-custom-client.css')

            .scripts([
                'node_modules/jquery.rut/jquery.rut.js',
                'resources/assets/corner-studio/utilities/valida_rut.js',
                'resources/assets/corner-studio/utilities/valida_email.js',
                'resources/assets/corner-studio/utilities/change_region_province.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.es.min.js',
                'resources/assets/corner-studio/utilities/config-datepicker.js'
            ], 'public/js/create-custom-client.js')

    // Professionals
        // Create Edit
            .combine([
                'resources/assets/inspinia/css/datepicker3.css'
            ], 'public/css/create-custom-professional.css')

            .scripts([
                'node_modules/jquery.rut/jquery.rut.js',
                'resources/assets/corner-studio/utilities/valida_rut.js',
                'resources/assets/corner-studio/utilities/valida_email.js',
                'resources/assets/corner-studio/utilities/change_region_province.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.es.min.js',
                'resources/assets/corner-studio/utilities/config-datepicker.js'
            ], 'public/js/create-custom-professional.js')

    // Assistances
        // Index
            .combine([
                'resources/assets/custom/css/datatables.min.css',
                'resources/assets/custom/css/datatables-custom.css'
            ], 'public/css/assistances/index.css')
            .scripts([
                'node_modules/moment/moment.js',
                'node_modules/moment/locale/es.js',
                'resources/assets/custom/js/datatables.min.js',
            ], 'public/js/assistances/index.js')

    // Activities
        // Create Edit
            .combine([
                'resources/assets/inspinia/css/datepicker3.css'
            ], 'public/css/create-custom-activity.css')

            .scripts([
                'node_modules/autonumeric/autoNumeric-min.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.es.min.js',
                'resources/assets/corner-studio/utilities/config-datepicker.js'
            ], 'public/js/create-custom-activity.js')

    // Subscriptions
        // Create Edit
            .combine([
                'resources/assets/custom/css/bootstrap-chosen.css',
                'resources/assets/inspinia/css/datepicker3.css',
                'resources/assets/inspinia/css/style.css'
            ], 'public/css/create-custom-subscription.css')
            .scripts([
                'node_modules/chosen-js/chosen.jquery.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.js',
                'resources/assets/inspinia/js/bootstrap-datepicker.es.min.js',
                'resources/assets/corner-studio/utilities/config-datepicker.js'
            ], 'public/js/create-custom-subscription.js')

    // Schedules
        // Index
            .combine([
                'node_modules/fullcalendar/dist/fullcalendar.min.css',
            ], 'public/css/schedules.css')
            .scripts([
                'node_modules/moment/moment.js',
                'node_modules/fullcalendar/dist/fullcalendar.min.js',
                'resources/assets/inspinia/js/fullcalendar.es.js'
            ], 'public/js/schedules.js')

    // Incomes
        // Index
            .scripts([
                'node_modules/chart.js/dist/Chart.js',
            ], 'public/js/incomes.js');

    // Users
        // Create Edit
            mix.scripts('resources/assets/utilities/valida_email.js', 'public/js/users/create-edit.js');

        // Edit
            mix.combine('node_modules/cropper/dist/cropper.min.css', 'public/css/users/edit.css')
                .scripts('node_modules/cropper/dist/cropper.min.js', 'public/js/users/edit.js')

    // Passport
        // Index
            mix.copy('resources/assets/passport/app.css', 'public/css/passport.css');
            mix.copy('resources/assets/passport/app.js', 'public/js/passport.js');


// Versioning
    mix.version();