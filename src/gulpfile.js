var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.copy(
        'node_modules/bootstrap/dist/fonts',
        'public/fonts'
    );

    mix.copy(
        'node_modules/font-awesome/fonts',
        'public/fonts'
    );

    mix.copy(
        'node_modules/ionicons/dist/fonts',
        'public/fonts'
    );

    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.min.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.min.js'
    ], 'public/js/vendor.js');

    mix.scripts([
        'app.js'
    ], 'public/js/app.js');

    mix.less([
        '../../../node_modules/bootstrap/less/bootstrap.less',
        '../../../node_modules/font-awesome/less/font-awesome.less',
        '../../../node_modules/ionicons/dist/css/ionicons.min.css',
        'admin-lte/AdminLTE.less',
        'admin-lte/skins/_all-skins.less'
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