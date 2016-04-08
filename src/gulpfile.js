var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.copy(
        'node_modules/bootstrap/dist/fonts',
        'public/build/fonts'
    );

    mix.copy(
        'node_modules/font-awesome/fonts',
        'public/build/fonts'
    );

    mix.copy(
        'node_modules/ionicons/dist/fonts',
        'public/build/fonts'
    );

    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js'
    ], 'public/js/vendor.js');

    mix.scripts([
        'app.js'
    ], 'public/js/app.js');

    mix.less([
        '../../../vendor/twbs/bootstrap/less/bootstrap.less',
        '../../../node_modules/font-awesome/less/font-awesome.less',
        '../../../node_modules/ionicons/dist/css/ionicons.min.css',
        'adminlte/AdminLTE.less',
        'adminlte/skins/_all-skins.less'
    ], 'public/css/vendor.css');

    mix.less([
        'app.less'
    ], 'public/css/app.css');

    mix.less([
        'welcome.less'
    ], 'public/css/welcome.css');

    mix.version([
        'public/css/app.css',
        'public/css/welcome.css',
        'public/css/vendor.css',
        'public/js/app.js',
        'public/js/vendor.js'
    ]);

});