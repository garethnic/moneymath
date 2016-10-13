const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.styles([
        'app.css'
    ], 'public/css/app.css')
       .webpack('app.js');

    mix.copy('resources/assets/js/slicknav/jquery.slicknav.min.js', 'public/js/jquery.slicknav.min.js');
    mix.copy('resources/assets/js/slicknav/slicknav.min.css', 'public/css/slicknav.min.css');
    mix.copy('resources/assets/js/notify/notify.min.js', 'public/js/notify.min.js');
    mix.copy('resources/assets/css/bootstrap', 'public/css/bootstrap');
});
