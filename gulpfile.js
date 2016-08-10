var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.scripts([
        '../../../node_modules/jquery/dist/jquery.js',
        '../../../node_modules/bootstrap/dist/js/bootstrap.js',
        'louis.js'
    ], 'public/js/louis.js');

    mix.styles([
        '../../../node_modules/bootstrap/dist/css/bootstrap.css',
        '../../../node_modules/font-awesome/css/font-awesome.css',
        'louis.css'
    ], 'public/css/louis.css');

    mix.copy('node_modules/font-awesome/fonts', 'public/fonts');
});





